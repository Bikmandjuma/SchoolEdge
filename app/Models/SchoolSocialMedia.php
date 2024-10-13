<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_fk_id',
        'phone',
        'email',
        'address',
        'facebook_link',
        'whatsapp_no',
        'instagram_link',
        'linkedin_link',
        'twitter_link',
    ];

    public function School_social_media_fn(){
        return $this->belongTo(Customer::class,'school_fk_id');
    }
    
}
