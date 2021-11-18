<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekues extends Model
{
    use HasFactory;

    protected $table = 'request_tables';

    public $fillable = ['requester', 'status', 'requesting', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
