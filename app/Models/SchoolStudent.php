<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolStudent extends Model
{
    use HasFactory;
    protected $fillable=[
        'school_fk_id',
        'firstname',
        'middle_name',
        'lastname',
        'gender',
        'dob',
        'province',
        'district',
        'sector',
        'cell',
        'village',
        'father_names',
        'father_phone',
        'mather_names',
        'mather_phone',
        'guardian_names',
        'guardian_phone',
        'image',
    ];

    public function school_studentFN(){
        return $this->belongTo(Customer::class,'school_fk_id');
    }

    // A student can belong to many senior classes (pivot table)
    public function seniorClasses()
    {
        return $this->belongsToMany(LevelClass::class, 'student_class');
    }

    // A student can have many subjects
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    // A student can have many teachers (through subjects)
    public function teachers()
    {
        return $this->belongsToMany(SchoolEmployee::class, 'student_teacher');
    }
}
