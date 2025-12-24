<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiptCode',
        'createdBy',
        'supplier',
        'note',
        'status',
        'totals'
    ];

    public function details()
    {
        return $this->hasMany(ImportReceiptDetail::class);
    }
}
