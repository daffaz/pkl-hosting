<?php

namespace App\Http\Controllers;

use App\Models\FavoritEbook;
use Illuminate\Http\Request;

class FavoritEbookController extends Controller
{
    public function index()
    {
        return view('favorit', [
            'favorit' => FavoritEbook::with('ebook')->where(['user_id' => request()->user()->id, 'status' => '1'])->latest()->get()
        ]);
    }
}
