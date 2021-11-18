<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ebook;
use App\Models\FavoritEbook;
use App\Models\Peminjaman;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalDenda = Peminjaman::where(['user_id' => request()->user()->id, 'status' => 'Denda'])->get();
        $total = 0;
        $date2 = new DateTime(date('y-m-d'));
        foreach ($totalDenda as $d) {
            $date1 = new DateTime(date('y-m-d', strtotime($d->lastreturn)));
            $interval = $date1->diff($date2);
            // dd($totalDenda);
            $total += $interval->d + 1;
        }
        // dd(request()->buku());
        return view('home', [
            'peminjaman' => Peminjaman::with('buku')->where(['status' => 'Pinjam', 'allowed' => 1, 'user_id' => request()->user()->id])->orderBy('id', 'DESC')->first(),
            'dipinjam' => Peminjaman::where(['user_id' => request()->user()->id, 'allowed' => 1])->count(),
            'dikembalikan' => Peminjaman::with('buku')->where(['user_id' => request()->user()->id, 'status' => 'Dikembalikan'])->get(),
            'buku' => Buku::latest()->paginate(4),
            "ebook" => Ebook::latest()->paginate(4),
            'denda' => Peminjaman::with('buku')->where(['status' => 'Denda', 'user_id' => request()->user()->id])->get(),
            'totalDenda' => $total,
            'favorit' => FavoritEbook::with('ebook')->where(['user_id' => request()->user()->id, 'status' => '1'])->latest()->get()
        ]);
    }
}
