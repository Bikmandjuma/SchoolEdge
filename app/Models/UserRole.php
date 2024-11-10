<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class UserRole extends Model
{
    use HasFactory;
    protected $fillable = ['role_name', 'school_fk_id'];

    // Relationship with SchoolEmployee
    public function employees()
    {
        return $this->hasMany(SchoolEmployee::class, 'role_fk_id');
    }

    // Relationship with School
    public function school()
    {
        return $this->belongsTo(Customer::class, 'school_fk_id');
    }

    // Relationship: A role can have many permissions
    public function permissions()
    {
        return $this->belongsToMany(PermissionData::class, 'role_permissions', 'role_fk_id', 'permission_fk_id');
    }

    // Relationship: A role can be assigned to many users
    public function users()
    {
        return $this->belongsToMany(SchoolEmployee::class, 'user_roles', 'role_fk_id', 'user_fk_id');
    }
}
