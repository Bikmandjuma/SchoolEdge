<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['course_name', 'school_fk_id'];

    public function school()
    {
        return $this->belongsTo(Customer::class, 'school_fk_id');
    }
    
}
