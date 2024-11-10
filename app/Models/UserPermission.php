<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserPermission extends Pivot
{
    use HasFactory;
    protected $table = 'user_permissions'; // Custom pivot table name
    protected $fillable = ['user_fk_id', 'permission_fk_id'];
}