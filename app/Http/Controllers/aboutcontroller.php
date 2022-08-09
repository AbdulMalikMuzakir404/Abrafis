<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class aboutcontroller extends Controller
{
    public function showAbout()
    {
        $admin = User::where('is_admin' , 1)->get();
        return view('About.about', compact('admin'));
    }
}
