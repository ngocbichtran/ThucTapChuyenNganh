<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportReceiptDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'export_receipt_id',
        'product_id',
        'quantity',
        'price',
    ];

    /* ================= RELATIONSHIPS ================= */

    // Phiếu xuất
    public function receipt()
    {
        return $this->belongsTo(
            ExportReceipt::class,
            'export_receipt_id',
            'id'
        );
    }

    // Sản phẩm
    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'product_id',
            'ID'
        );
    }
}
