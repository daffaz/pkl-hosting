<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class PegawaiController extends Controller
{
	public function index()
	{
		// mengambil data dari table pegawai
		$pegawai = DB::table('ebooks')->paginate(10);
 
		// mengirim data pegawai ke view index
		return view('admin.ebook.ebook',['ebook' => $pegawai]);
 
	}
 
	public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
		// mengambil data dari table pegawai sesuai pencarian data
		$pegawai = DB::table('ebooks')
		->where('ebook_judul','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('admin.ebook.ebook',['ebook' => $pegawai]);
 
	}
 
}