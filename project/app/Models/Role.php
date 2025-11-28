<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
class Role extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'role';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'ROLE_NAME',
        'DESCRIPTION',
        'ACTIVE_FLAG',
        'CREATE_DATE',
        'UPDATE_DATE',
    ];
        protected $casts = [
        'CREATE_DATE' => 'datetime',
        'UPDATE_DATE' => 'datetime',
    ];
}
