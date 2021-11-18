<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritEbook extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'ebook_id', 'user_id'];
    
    public function ebook()
    {
        return $this->belongsTo(Ebook::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
