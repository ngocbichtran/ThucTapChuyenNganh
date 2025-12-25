<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportReceipt;
use App\Models\ImportReceiptDetail;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NhapController extends Controller
{
    /**
     * Danh sách phiếu nhập kho
     */
    public function index()
    {
        $receipts = ImportReceipt::orderBy('created_at', 'desc')->get();

        return view('admin.storage.nhapkho-list', compact('receipts'));
    }

    /**
     * Form tạo phiếu nhập kho
     */
    public function create()
    {
        $products = Product::where('ACTIVE_FLAG', 1)->get();

        return view('admin.storage.nhapkho-create', compact('products'));
    }

    /**
     * Lưu phiếu nhập kho (chưa duyệt)
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier'              => 'required|string|max:255',
            'products'              => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:product_info,ID',
            'products.*.quantity'   => 'required|integer|min:1',
            'products.*.price'      => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {

            //Tạo phiếu nhập
            $receipt = ImportReceipt::create([
                'receiptCode' => Str::upper(Str::random(8)),
                'createdBy'   => Auth::id(),
                'supplier'    => $request->supplier,
                'note'        => $request->note,
                'status'      => 'pending',
                'totals'      => 0,
            ]);

            //Lưu chi tiết + tính tổng tiền
            $total = 0;

            foreach ($request->products as $item) {
                ImportReceiptDetail::create([
                    'import_receipt_id' => $receipt->id,
                    'product_id'        => $item['product_id'],
                    'quantity'          => $item['quantity'],
                    'price'             => $item['price'],
                ]);

                $total += $item['quantity'] * $item['price'];
            }

            //Cập nhật tổng tiền
            $receipt->update([
                'totals' => $total,
            ]);
        });

        return redirect()
            ->route('admin.nhap.index')
            ->with('success', 'Tạo phiếu nhập kho thành công');
    }

    /**
     * Xem chi tiết phiếu nhập
     */
    public function show(ImportReceipt $nhap)
    {
        $nhap->load('details.product');

        return view('admin.storage.nhapkho-details', [
            'receipt' => $nhap,
        ]);
    }

    /**
     * Duyệt phiếu nhập → cập nhật tồn kho
     */
    public function update(Request $request, string $id)
    {
        DB::transaction(function () use ($id) {

            $receipt = ImportReceipt::with('details')->findOrFail($id);

            if ($receipt->status !== 'pending') {
                abort(403, 'Phiếu nhập đã được xử lý');
            }

            foreach ($receipt->details as $detail) {

                $inventory = Inventory::firstOrCreate(
                    ['product_id' => $detail->product_id],
                    [
                        'quantity'         => 0,
                        'initial_quantity' => 0,
                    ]
                );

                $inventory->quantity += $detail->quantity;
                $inventory->initial_quantity += $detail->quantity;
                $inventory->save();
            }

            $receipt->update([
                'status' => 'completed',
            ]);
        });

        return redirect()
            ->back()
            ->with('success', 'Duyệt phiếu nhập kho thành công');
    }

    /**
     * Xóa phiếu nhập (chỉ khi chưa duyệt)
     */
    public function destroy(string $id)
    {
        $receipt = ImportReceipt::findOrFail($id);

        if ($receipt->status !== 'pending') {
            return back()->with('error', 'Không thể xóa phiếu đã duyệt');
        }

        $receipt->delete();

        return back()->with('success', 'Đã xóa phiếu nhập kho');
    }
}
