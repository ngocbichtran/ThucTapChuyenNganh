<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExportReceipt;
use App\Models\ExportReceiptDetail;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;
class XuatController extends Controller
{
    /**
     * Danh sách phiếu xuất kho
     */
    public function index()
    {
        $receipts = ExportReceipt::orderBy('created_at', 'desc')->get();
        return view('admin.storage.xuatkho-list', compact('receipts'));
    }

    /**
     * Form tạo phiếu xuất kho
     */
    public function create()
    {
        $products = Product::where('ACTIVE_FLAG', 1)->get();
        return view('admin.storage.xuatkho-create', compact('products'));
    }

    /**
     * Lưu phiếu xuất kho (chưa trừ kho)
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required|string|max:255',
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:product_info,ID',
            'products.*.quantity'   => 'required|integer|min:1',
            'products.*.price'      => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {

            // 1️⃣ Tạo phiếu xuất
            $receipt = ExportReceipt::create([
                'receiptCode' => 'PX' . strtoupper(Str::random(8)),
                'createdBy'   => Auth::id(),
                'customer'    => $request->customer,
                'note'        => $request->note,
                'status'      => 'pending',
                'totals'      => 0,
            ]);

            // 2️⃣ Lưu chi tiết + tính tổng
            $total = 0;

            foreach ($request->products as $item) {
                ExportReceiptDetail::create([
                    'export_receipt_id' => $receipt->id,
                    'product_id'        => $item['product_id'],
                    'quantity'          => $item['quantity'],
                    'price'             => $item['price'],
                ]);

                $total += $item['quantity'] * $item['price'];
            }

            // 3️⃣ Update tổng tiền
            $receipt->update([
                'totals' => $total
            ]);
        });

        return redirect()->route('admin.xuat.index')
            ->with('success', 'Tạo phiếu xuất kho thành công');
    }

    /**
     * Xem chi tiết phiếu xuất
     */
    public function show(ExportReceipt $xuat)
    {
        $xuat->load('details.product');

        return view('admin.storage.xuatkho-details', [
            'receipt' => $xuat
        ]);
    }

    /**
     * Duyệt phiếu xuất → trừ tồn kho
     */
    public function update(Request $request, string $id)
    {
        DB::transaction(function () use ($id) {

            $receipt = ExportReceipt::with('details')->findOrFail($id);

            if ($receipt->status !== 'pending') {
                abort(403, 'Phiếu xuất đã được xử lý');
            }

            // 🔴 Kiểm tra tồn kho trước khi trừ
            foreach ($receipt->details as $detail) {
                $inventory = Inventory::where('product_id', $detail->product_id)->first();

                if (!$inventory || $inventory->quantity < $detail->quantity) {
                    throw new Exception('Không đủ tồn kho cho sản phẩm: ' . $detail->product_id);
                }
            }

            // ✅ Trừ kho
            foreach ($receipt->details as $detail) {
                $inventory = Inventory::where('product_id', $detail->product_id)->first();
                $inventory->quantity -= $detail->quantity;
                $inventory->save();
            }

            // Cập nhật trạng thái
            $receipt->update([
                'status' => 'completed'
            ]);
        });

        return redirect()->back()
            ->with('success', 'Duyệt phiếu xuất kho thành công');
    }

    /**
     * Xóa phiếu xuất (chỉ khi chưa duyệt)
     */
    public function destroy(string $id)
    {
        $receipt = ExportReceipt::findOrFail($id);

        if ($receipt->status !== 'pending') {
            return back()->with('error', 'Không thể xóa phiếu đã duyệt');
        }

        $receipt->delete();

        return back()->with('success', 'Đã xóa phiếu xuất kho');
    }
}
