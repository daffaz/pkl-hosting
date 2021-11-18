<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Kyslik\ColumnSortable\Sortable;

class Peminjaman extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'peminjamen';

    public $fillable = ['civitas_id', 'buku_id', 'user_id', 'status', 'lastreturn'];
    public $sortable = ['judul', 'kategori', 'penulis', 'status', 'quantity'];

    public function civitas()
    {
        return $this->belongsTo(Civitas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
