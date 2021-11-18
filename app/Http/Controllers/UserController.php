<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        // VALIDASI TERLEBIH DAHULU INPUT DARI REQUEST
        $data = request()->validate([
            'title' => 'required',
        ]);

        // $data = request()->all();
        // dd($user);

        // dd($data['title']);
        switch ($data['title']) {
            case 'Admin':
                $status = 1;
                break;
            case 'Dosen':
                $status = 2;
                break;
            case 'Mahasiswa Akhir':
                $status = 3;
                break;
            case 'Mahasiswa':
                $status = '4';
                break;
            default:
                $status = $user->civitas_id;
                break;
        }
        // $user->update($data);
        DB::table('users')->where('id', $user->id)->update(
            ['civitas_id' => $status,
            'name' => $request->name,
            'nim' => $request->nim
            ]);

        session()->flash('success', 'User berhasil diupdate');

        return redirect()->to('/administrator/user');
    }

    public function delete(User $user)
    {
        $user->delete();
        session()->flash('success', 'Berhasil menghapus user');
        return redirect()->back();
    }

    public function registrasiUser()
    {
        return view('admin.user.regis', [
            'user' => User::where('status', '0')->latest()->get()
        ]);
    }

    public function acceptRegis(User $user)
    {
        $dataUser = User::find($user->id);
        $dataUser->status = '1';
        $dataUser->save();

        Mail::to($user->email)->send(new WelcomeMail());
        session()->flash('success', 'Berhasil verifikasi user');
        return redirect()->back();
    }

    public function countUser()
    {
        return response()->json([
            'data' => User::where('status', '0')->count()
        ]);
    }
}
