<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use Illuminate\Http\Request;

class BantuanController extends Controller
{
    public function index()
    {
        return view('admin.admin_bantuan', [
            'bantuan' => Bantuan::latest()->get()
        ]);
    }
    public function store(Request $request)
    {
        $bantuan = $request->all();
        $bantuan['pengirim'] = $request->user()->name;
        $bantuan['email'] = $request->user()->email;
        $bantuan['emailAlt'] = $request->email;
        // dd($bantuan['emailAlt']);
        Bantuan::create($bantuan);
        session()->flash('success', 'Terima kasih atas saran dan komentar anda');
        return redirect()->back();
    }
}
