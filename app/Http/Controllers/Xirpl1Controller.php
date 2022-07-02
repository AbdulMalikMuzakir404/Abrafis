<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Xirpl1Controller extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('datasiswas.xirpl1.xirpl1', compact('data'));
    }
}
