<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShareHolderFile extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'file_path', 'shareHolder_fk_id'];

    public function shareholder()
    {
        return $this->belongsTo(ShareHolder::class, 'shareHolder_fk_id');
    }
}
