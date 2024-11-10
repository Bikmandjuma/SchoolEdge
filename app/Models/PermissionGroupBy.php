<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionGroupBy extends Model
{
    use HasFactory;

    protected $table = 'permission_group_bies'; // Custom table name
    protected $fillable = ['name'];

    // Relationship: A permission group can have many permissions
    public function permissions()
    {
        return $this->hasMany(PermissionData::class, 'permissiongroupBy_fk_id');
    }
}
