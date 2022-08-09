<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
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
            'name' => ['required', 'string', 'max:50', 'min:5'],
            'email' => ['required', 'string', 'email', 'max:70', 'min:10', 'unique:users'],
            'nis' => ['required', 'string', 'max:20', 'min:7'],
            'tgl_lahir' => ['required', 'string', 'max:20'],
            'jk' => ['required', 'string', 'max:20'],
            'jurusan' => ['required', 'string', 'max:50'],
            'jurusan_berapa' => ['required', 'string', 'max:5'],
            'kelas' => ['required', 'string', 'max:5'],
            'nama_ortu' => ['required', 'string', 'max:50', 'min:5'],
            'no_wa' => ['required', 'string', 'max:20'],
            'no_hp' => ['required', 'string', 'max:20'],
            'alamat' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'max:100', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'nis' => $data['nis'],
            'tgl_lahir' => $data['tgl_lahir'],
            'jk' => $data['jk'],
            'jurusan' => $data['jurusan'],
            'jurusan_berapa' => $data['jurusan_berapa'],
            'kelas' => $data['kelas'],
            'nama_ortu' => $data['nama_ortu'],
            'no_wa' => $data['no_wa'],
            'no_hp' => $data['no_hp'],
            'alamat' => $data['alamat'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
