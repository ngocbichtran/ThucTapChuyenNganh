<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportReceiptDetail extends Model
{
    protected $table = 'import_receipt_details';

    protected $fillable = [
        'import_receipt_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'ID');
    }
}
