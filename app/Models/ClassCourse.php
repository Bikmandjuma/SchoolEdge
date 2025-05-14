<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'levelClass_fk_id',
        'course_name',
        'quiz_mark_total',
        'exam_total',
        'total_mark',
    ];

    public function studentMarks()
    {
        return $this->hasMany(StudentMark::class, 'classCourse_fk_id');
    }

    public function totalResults()
    {
        return $this->hasMany(TotalResult::class, 'classCourse_fk_id');
    }

    public function levelClassFn()
    {
        return $this->belongsTo(LevelClass::class, 'levelClass_fk_id');
    }

}
