<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicTerm extends Model
{
    use HasFactory;
    protected $fillable = [
        'term_name',
        'academic_year_fk_id',
        'start_date',
        'end_date'
    ];
}
