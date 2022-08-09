<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $admin = User::where('is_admin' , 1)->get();
        return view('contact', compact('admin'));
    }
}
