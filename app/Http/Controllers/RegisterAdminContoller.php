<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterAdminContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getRegister()
    {
        return view('pages.registeradmin');
    }

    public function postregister(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'string', 'email', 'max:70', 'min:10', 'unique:users'],
            'tgl_lahir' => ['required', 'string', 'max:20'],
            'jk' => ['required', 'string', 'max:20'],
            'no_wa' => ['required', 'string', 'max:15'],
            'no_hp' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'max:100', 'confirmed'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tgl_lahir' => $request->tgl_lahir,
            'jk' => $request->jk,
            'no_wa' => $request->no_wa,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'is_admin' => 1,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Hallo Admin Silahkan Login');
    }
}
