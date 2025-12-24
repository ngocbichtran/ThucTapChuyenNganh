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
        'ACTIVE_FLAG',
        'CREATE_DATE',
        'UPDATE_DATE',
        'google_id',
        'role',
    ];

    //Ẩn mật khẩu cho an toàn
    protected $hidden = [
        'PASSWORD',
    ];

    // Lấy đúng cột mật khẩu từ DB
    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }

}