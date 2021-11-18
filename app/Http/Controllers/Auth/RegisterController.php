<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'nim' => ['required', 'string', 'max:100', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function store(Request $request)
    {
        $tempMail = $request['email'];
        if(strpos($tempMail, "@") !== false) {
            $email = $request['email'];
        }else {
            // $tempMail = substr($request['email'], 0, strpos($request['email'], "@"));
            $email = $request['email']."@apps.ipb.ac.id";
        }
        
        // Get the value from the form
        $mail['email'] = $email;
        
        // Must not already exist in the `email` column of `users` table
        $rules = array('email' => 'unique:users,email');
        
        $validator = Validator::make($mail, $rules);
        
        if($validator->fails()) {
            session()->flash('error', 'Email yang digunakan telah terdaftar');
            return redirect()->to('/login');
        }
        
        $username = substr($email, 0, strpos($email, '@'));
        $civitas_id = strtoupper($request['nim'][0]) == 'J' ? '4' : '2';
        // dd($request['nim'][5]);
        if (is_numeric($request['nim'][0])) {
            $civitas_id = '2';
        }else {
            $civitas_id = '4';
        }
        if ($request['nim'][5] == '8') {
            $civitas_id = '3';
        }
        $daftar = User::create([
            'name' => $request['name'],
            'nim' => strtoupper($request['nim']),
            'email' => $email,
            'prodi' => $request['prodi'],
            'password' => Hash::make($request['password']),
            'username' => $username,
            'allowed' => '0',
            'civitas_id' => $civitas_id,
            // 'civitas_id' => $data['civitas_id'],
        ]);
        session()->flash('success', 'Berhasil registrasi akun, silahkan menunggu sampai akun anda disetujui oleh petugas perpustakaan');
        return redirect()->to('/login');
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nim' => $data['nim'],
            'prodi' => $data['prodi'],
            'civitas_id' => $data['civitas_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
