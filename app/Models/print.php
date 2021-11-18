<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Pegawai extends Model
{
    protected $table = "bukus";
 
    protected $fillable = ['id','judul','penerbit'];
}