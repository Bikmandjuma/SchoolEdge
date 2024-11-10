<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;  

class SchoolEmployee extends Authenticatable
{
    use HasFactory;
    protected $fillable=[
        'school_fk_id',
        'firstname',
        'middle_name',
        'lastname',
        'gender',
        'phone',
        'email',
        'dob',
        'role_fk_id',
        'username',
        'password',
        'image',
        'last_active_at',
    ];

    // Relationship with UserRole
    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_fk_id');
    }

    public function school()
    {
        return $this->belongsTo(Customer::class, 'school_fk_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(PermissionData::class, 'user_permissions', 'user_fk_id', 'permission_fk_id');
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('name', $permission);
    }


}
