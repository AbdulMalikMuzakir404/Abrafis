<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\dataAbsenSiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    public $sakit;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    public function generateIzin()
    {
        $user = User::find(auth()->user()->id);
        view()->share('user', $user);
        $customPaper = array(0,0,450,560);
        $pdf = PDF::loadView('pdf.izin')->setPaper($customPaper);
        return $pdf->download('surat-izin.pdf');

    }

    public function izin()
    {
        $hadir = DB::table('hadirs')
        ->where('date_absen', date('Y-m-d'))
        ->where('user_id', auth()->user()->id)
        ->where('hadir', true)
        ->get();
        $hadirCount = count($hadir);

        $sakit = DB::table('sakits')
        ->where('user_id', auth()->user()->id)
        ->where('date_absen', date('Y-m-d'))
        ->where('sakit', true)
        ->get();
        $sakitCount = count($sakit);

        $alfa = DB::table('alfas')
        ->where('user_id', auth()->user()->id)
        ->where('date_absen', date('Y-m-d'))
        ->where('alfa', true)
        ->get();
        $alfaCount = count($alfa);


        if($sakitCount == 1 || $hadirCount == 1 || $alfaCount == 1)
        {
            return redirect()->route('home')->with('error', 'Data Absen anda hari ini sudah tercatat.');
        }

        $cek = DB::table('izins')
        ->where('date_absen', date('Y-m-d'))
        ->where('user_id', auth()->user()->id)
        ->where('izin', true)
        ->get();
        $jum = count($cek);

        if($jum >= 1)
        {
            return redirect()->route('home')->with('error', 'Izin hanya dapat dilakukan 1 kali dalam 1 hari');
        }
        $userId = Auth::user()->id;
        DB::table('izins')
        ->insert([
            'user_id' => $userId,
            'izin' => true,
            'date_absen' => date('Y-m-d'),
            'jam_absen' => date('G:i:s')
        ]);

        return redirect()->route('home')->with('success', 'Data izin anda hari ini berhasil dicatat');
    }

    public function kodeIzin()
    {
        return view('kodeizin');
    }
}
