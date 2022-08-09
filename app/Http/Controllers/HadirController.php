<?php

namespace App\Http\Controllers;

use App\Models\dataAbsenSiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HadirController extends Controller
{
    public $hadir;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function hadir()
    {
        $sakit = DB::table('sakits')
        ->where('date_absen', date('Y-m-d'))
        ->where('user_id', auth()->user()->id)
        ->where('sakit', true)
        ->get();
        $sakitCount = count($sakit);

        $izin = DB::table('izins')
        ->where('user_id', auth()->user()->id)
        ->where('date_absen', date('Y-m-d'))
        ->where('izin', true)
        ->get();
        $izinCount = count($izin);

        $alfa = DB::table('alfas')
        ->where('user_id', auth()->user()->id)
        ->where('date_absen', date('Y-m-d'))
        ->where('alfa', true)
        ->get();
        $alfaCount = count($alfa);

        if($sakitCount >= 0 && $izinCount >= 0 && $alfaCount >= 0)
        {
            return redirect()->route('home')->with('error', 'Data Absen anda hari ini sudah tercatat.');
        }

        $cek = DB::table('hadirs')
        ->where('date_absen', date('Y-m-d'))
        ->where('user_id', auth()->user()->id)
        ->where('hadir', true)
        ->get();
        $jum = count($cek);

        if($jum >= 1)
        {
            return redirect()->route('home')->with('error', 'Hadir hanya dapat dilakukan 1 kali dalam 1 hari');
        }
        $userId = Auth::user()->id;
        DB::table('hadirs')
        ->insert([
            'user_id' => $userId,
            'hadir' => true,
            'date_absen' => date('Y-m-d'),
            'jam_absen' => date('G:i:s')
        ]);

        return redirect()->route('home')->with('success', 'Data hadir anda hari ini berhasil dicatat.');
    }

    public function kodeHadir()
    {
        return view('kodehadir');
    }
}
