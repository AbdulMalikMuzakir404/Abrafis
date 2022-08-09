<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class xiirpl1Contoller extends Controller
{
    public function index()
    {
        return view('admin.xiirpl1');
    }

    public function multimedia()
    {
        return view('admin.multimedia');
    }

    public function elektro()
    {
        return view('admin.elektro');
    }
}
