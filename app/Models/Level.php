<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_name',
        'term_fk_id',
        'school_fk_id',
    ];

    // A Level has many classes
    // public function levelClasses()
    // {
    //     return $this->hasMany(LevelClass::class, 'level_fk_id');
    // }

    public function levelClasses()
    {
        return $this->hasMany(LevelClass::class, 'level_fk_id');
    }


    // A Level belongs to a term (optional based on your DB structure)
    public function term()
    {
        return $this->belongsTo(Term::class, 'term_fk_id');
    }

    // A Level belongs to a school (optional based on your DB structure)
    public function school()
    {
        return $this->belongsTo(School::class, 'school_fk_id');
    }
}
