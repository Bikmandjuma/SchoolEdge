<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    use HasFactory;
    protected $fillable = [
        'classCourse_fk_id',
        'schoolEmployee_fk_id',
        
    ];

    public function classCourseFn()
    {
        return $this->belongsTo(ClassCourse::class, 'classCourse_fk_id');
    }

    public function SchoolEmployeeFn()
    {
        return $this->belongsTo(SchoolEmployee::class, 'schoolEmployee_fk_id');
    }
}
