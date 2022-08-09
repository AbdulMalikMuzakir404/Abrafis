<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\assertTrue;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $dfg = DB::table('alfas')
        ->whereDay('date_absen', date('d'))
        ->where('user_id', auth()->user()->id)
        ->where('alfa', true)
        ->get();

        $gfd = count($dfg);

        $hadir = DB::table('hadirs')
        ->where('user_id', auth()->user()->id)
        ->where('hadir', true)
        ->where('date_absen', date('Y-m-d'))
        ->get()
        ->toArray();
        $countHadir = count($hadir);

        $sakit = DB::table('sakits')
        ->where('user_id', '=', auth()->user()->id)
        ->where('sakit', true)
        ->where('date_absen', date('Y-m-d'))
        ->get()
        ->toArray();
        $countSakit = count($sakit);

        $izin = DB::table('izins')
        ->where('user_id', auth()->user()->id)
        ->where('izin', true)
        ->where('date_absen', date('Y-m-d'))
        ->get()
        ->toArray();
        $countIzin = count($izin);


        $cek = User::where('id', auth()->user()->id)->where('is_admin', 0)->get();
        $countCek = count($cek);


        $awal = strtotime('08:00:00');
        $akhir = strtotime(date('G:i:s'));

        if($awal <= $akhir)
        {
            if($countHadir == 0 && $countSakit == 0 && $countIzin == 0 && $gfd == 0)
            {
                if($countCek == 1)
                {
                    DB::table('alfas')
                    ->insert([
                        'user_id' => auth()->user()->id,
                        'alfa' => true,
                        'date_absen' => date('Y-m-d'),
                        'jam_absen' => date('G:i:s')
                    ]);
                }
            }
        }


        $bulan = date('m');
        $user = Auth::user()->id;

        // ===========================================
        // Hadir January 1
        $hadirJ = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '01')
        ->get();
        $totalHadirJ = count($hadirJ);

        // Hadir February 2
        $hadirF = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '02')
        ->get();

        $totalHadirF = count($hadirF);

        // Hadir Maret 3
        $hadirMR = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '03')
        ->get();

        $totalHadirMR = count($hadirMR);

        // Hadir April 4
        $hadirAP = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '04')
        ->get();

        $totalHadirAP = count($hadirAP);

        // Hadir May 5
        $hadirMY = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '05')
        ->get();

        $totalHadirMY = count($hadirMY);

        // Hadir Juni 6
        $hadirJN = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '06')
        ->get();

        $totalHadirJN = count($hadirJN);

        // Hadir Juli 7
        $hadirJL = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '07')
        ->get();

        $totalHadirJL = count($hadirJL);

        // Hadir Agustus 8
        $hadirAG = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '08')
        ->get();

        $totalHadirAG = count($hadirAG);

        // Hadir September 9
        $hadirS = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '09')
        ->get();

        $totalHadirS = count($hadirS);

        // Hadir Oktober 10
        $hadirO = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '10')
        ->get();

        $totalHadirO = count($hadirO);

        // Hadir November 11
        $hadirN = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '11')
        ->get();

        $totalHadirN = count($hadirN);

        // Hadir Desember 12
        $hadirD = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', '12')
        ->get();

        $totalHadirD = count($hadirD);

        // ===========================================

        // ===========================================
        // alfa January 1
        $alfaJ = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '01')
        ->get();

        $totalAlfaJ = count($alfaJ);

        // alfa February 2
        $alfaF = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '02')
        ->get();

        $totalAlfaF = count($alfaF);

        // alfa Maret 3
        $alfaMR = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '03')
        ->get();

        $totalAlfaMR = count($alfaMR);

        // alfa April 4
        $alfaAP = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '04')
        ->get();

        $totalAlfaAP = count($alfaAP);

        // alfa May 5
        $alfaMY = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '05')
        ->get();

        $totalAlfaMY = count($alfaMY);

        // alfa Juni 6
        $alfaJN = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '06')
        ->get();

        $totalAlfaJN = count($alfaJN);

        // alfa Juli 7
        $alfaJL = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '07')
        ->get();

        $totalAlfaJL = count($alfaJL);

        // alfa Agustus 8
        $alfaAG = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '08')
        ->get();

        $totalAlfaAG = count($alfaAG);

        // alfa September 9
        $alfaS = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '09')
        ->get();

        $totalAlfaS = count($alfaS);

        // alfa Oktober 10
        $alfaO = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '10')
        ->get();

        $totalAlfaO = count($alfaO);

        // alfa November 11
        $alfaN = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '11')
        ->get();

        $totalAlfaN = count($alfaN);

        // alfa Desember 12
        $alfaD = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->whereMonth('date_absen', '12')
        ->get();

        $totalAlfaD = count($alfaD);

        // ===========================================

        // ===========================================
        // kode hitung hadir
        $hadir = DB::table('hadirs')
        ->where('user_id', $user)
        ->where('hadir', true)
        ->whereMonth('date_absen', $bulan)
        ->get();
        $totalHadir = count($hadir);

        // kode hitung sakit
        $sakit = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', $bulan)
        ->get();
        $totalSakit = count($sakit);

        // ===========================================

        // kode hitung izin
        $izin = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', $bulan)
        ->get();
        $totalIzin = count($izin);

        // ===========================================

         // kode hitung alfa
         $alfa = DB::table('alfas')
         ->where('user_id', $user)
         ->where('alfa', true)
         ->whereMonth('date_absen', $bulan)
         ->get();
         $totalAlfa = count($alfa);



        return view('home', compact([
            'totalHadir',
            'totalSakit',
            'totalIzin',
            'totalAlfa',

            'totalHadirJ',
            'totalHadirF',
            'totalHadirMR',
            'totalHadirAP',
            'totalHadirMY',
            'totalHadirJN',
            'totalHadirJL',
            'totalHadirAG',
            'totalHadirS',
            'totalHadirO',
            'totalHadirN',
            'totalHadirD',

            'totalAlfaJ',
            'totalAlfaF',
            'totalAlfaMR',
            'totalAlfaAP',
            'totalAlfaMY',
            'totalAlfaJN',
            'totalAlfaJL',
            'totalAlfaAG',
            'totalAlfaS',
            'totalAlfaO',
            'totalAlfaN',
            'totalAlfaD'
        ]));
    }
}
