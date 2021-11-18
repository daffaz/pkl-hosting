<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Ebook extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = ['judul', 'slug', 'deskripsi', 'quantity', 'penerbit', 'kategori', 'tahun', 'issn', 'bahasa', 'tempat_terbit', 'volume', 'edisi', 'penulis', 'gambar', 'pdf'];
    public $sortable = ['judul', 'kategori', 'penulis', 'penerbit'];
}
