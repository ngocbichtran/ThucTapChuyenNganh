<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'USER_NAME',
        'PASSWORD',
        'EMAIL',
        'NAME',
        'ACTIVE_FLAG',
        'CREATE_DATE',
        'UPDATE_DATE',
        'google_id',
        'role',
    ];

    // Lấy đúng cột mật khẩu từ DB
    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }

     // Liên kết với Role (FK ROLE_ID)
    public function user()
    {
        return $this->belongsTo(Role::class, 'ROLE_ID', 'ID');
    }
        protected $casts = [
        'CREATE_DATE' => 'datetime',
        'UPDATE_DATE' => 'datetime',
    ];
}