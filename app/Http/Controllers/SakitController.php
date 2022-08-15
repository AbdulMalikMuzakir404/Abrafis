<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\sakit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SakitController extends Controller
{
    public $sakit;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }
    public function generateSakit()
    {
        $user = User::find(auth()->user()->id);
        view()->share('user', $user);
        $customPaper = array(0,0,450,550);
        $pdf = PDF::loadView('pdf.sakit')->setPaper($customPaper);
        return $pdf->download('surat-sakit.pdf');

    }

    public function sakit()
    {
        $hadir = DB::table('hadirs')
        ->where('date_absen', date('Y-m-d'))
        ->where('user_id', auth()->user()->id)
        ->where('hadir', true)
        ->get();
        $hadirCount = count($hadir);

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

        if($izinCount >= 1 && $hadirCount >= 1 && $alfaCount >= 1)
        {
            return redirect()->route('home')->with('error', 'Data Absen anda hari ini sudah tercatat.');
        }
        $cek = DB::table('sakits')
        ->where('date_absen', date('Y-m-d'))
        ->where('user_id', auth()->user()->id)
        ->where('sakit', true)
        ->get();
        $jum = count($cek);

        if($jum >= 1)
        {
            return redirect()->route('home')->with('error', 'Sakit hanya dapat dilakukan 1 kali dalam 1 hari');
        }
        $userId = Auth::user()->id;
        DB::table('sakits')
        ->insert([
            'user_id' => $userId,
            'sakit' => true,
            'date_absen' => date('Y-m-d'),
            'jam_absen' => date('G:i:s')
        ]);

        return redirect()->route('home')->with('success', 'Data sakit anda hari ini sudah behasil dicatat.');
    }

    public function kodeSakit()
    {
        return view('kodesakit');
    }
}
