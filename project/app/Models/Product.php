<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use HasFactory;

    protected $table = 'product_info';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'CATE_ID',
        'TYPE',
        'NAME',
        'DESCRIPTION',
        'IMG_URL',
        'ACTIVE_FLAG',
        'CREATE_DATE',
        'UPDATE_DATE',
    ];

    protected $casts = [
        'CREATE_DATE' => 'datetime',
        'UPDATE_DATE' => 'datetime',
    ];

    // Liên kết với Category (FK CATE_ID)
    public function category()
    {
        return $this->belongsTo(Category::class, 'CATE_ID', 'ID');
    }
}
