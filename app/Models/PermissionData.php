<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionData extends Model
{
    use HasFactory;

    protected $table = 'permission_data'; // Custom table name
    protected $fillable = ['name', 'slang', 'permissiongroupBy_fk_id'];

    public function users()
    {
        return $this->belongsToMany(SchoolEmployee::class, 'user_permissions', 'permission_fk_id', 'user_fk_id');
    }

    // Relationship: A permission can belong to many roles
    public function roles()
    {
        return $this->belongsToMany(UserRole::class, 'role_permissions', 'permission_fk_id', 'role_fk_id');
    }

    public function group()
    {
        return $this->belongsTo(PermissionGroupBy::class, 'permissiongroupBy_fk_id');
    }

}
