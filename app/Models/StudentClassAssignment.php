<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClassAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['student_fk_id', 'levelClass_fk_id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function levelClassFn()
    {
        return $this->belongsTo(levelClass::class, 'levelClass_fk_id');
    }
}
