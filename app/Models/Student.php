<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_number',
        'firstname',
        'middle_name',
        'lastname',
        'province',
        'district',
        'sector',
        'cell',
        'village',
        'gender',
        'dob',
        'image',
        'father_names',
        'father_phone',
        'mother_names',
        'mother_phone',
        'guardian_names',
        'guardian_phone',
        'school_fk_id',
    ];


    public function school()
    {
        return $this->belongsTo(School::class, 'school_fk_id');
    }


}
