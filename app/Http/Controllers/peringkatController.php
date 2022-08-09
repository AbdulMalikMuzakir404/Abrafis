<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class peringkatController extends Controller
{
    public function showPeringkat()
    {
        $data = User::withCount(['hadir' => function($query) {
            $query->where('hadir', true);
            $query->whereMonth('date_absen', date('m'));
        }])
        ->where('is_admin', 0)
        ->offset(0)
        ->limit(10)
        ->get();

        return view('Peringkat.peringkat', compact('data'));
    }
}
