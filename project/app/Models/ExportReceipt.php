<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportReceipt extends Model
{
    use HasFactory;
    protected $table = 'export_receipts';

    protected $fillable = [
        'receiptCode',
        'createdBy',
        'customer',
        'note',
        'status',
        'totals',
    ];

    /* ================= RELATIONSHIPS ================= */

    // Chi tiết phiếu xuất
    public function details()
    {
        return $this->hasMany(
            ExportReceiptDetail::class,
            'export_receipt_id',
            'id'
        );
    }

    // Người tạo
    public function creator()
    {
        return $this->belongsTo(User::class, 'createdBy', 'ID');
    }
}
