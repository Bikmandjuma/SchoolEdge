<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $fillable =[
        'academic_year_name',
        'school_fk_id',
        'start_date',
        'end_date'
    ];

    public function terms()
    {
        return $this->hasMany(AcademicTerm::class);
    }
}
