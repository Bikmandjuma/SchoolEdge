<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level_fk_id',
        'term_fk_id',
        'school_fk_id'
    ];

     // A senior class belongs to a level
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // A senior class can have many students (via a pivot table)
    public function students()
    {
        return $this->belongsToMany(SchoolStudent::class, 'student_class');
    }
    
    // A senior class can have many subjects
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'class_subject');
    }

    // A senior class can have many teachers
    public function teachers()
    {
        return $this->belongsToMany(SchoolEmployee::class, 'class_teacher');
    }
}
