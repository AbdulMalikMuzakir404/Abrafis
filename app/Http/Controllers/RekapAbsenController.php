<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RekapAbsenController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = User::find($user_id);
        $user = Auth::user()->id;
        $bulan = date('m');

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
        // sakit January 1
        $sakitJ = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '01')
        ->get();
        $totalSakitJ = count($sakitJ);

        // sakit February 2
        $sakitF = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '02')
        ->get();

        $totalSakitF = count($sakitF);

        // sakit Maret 3
        $sakitMR = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '03')
        ->get();

        $totalSakitMR = count($sakitMR);

        // sakit April 4
        $sakitAP = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '04')
        ->get();

        $totalSakitAP = count($sakitAP);

        // sakit May 5
        $sakitMY = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '05')
        ->get();

        $totalSakitMY = count($sakitMY);

        // sakit Juni 6
        $sakitJN = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '06')
        ->get();

        $totalSakitJN = count($sakitJN);

        // sakit Juli 7
        $sakitJL = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '07')
        ->get();

        $totalSakitJL = count($sakitJL);

        // sakit Agustus 8
        $sakitAG = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '08')
        ->get();

        $totalSakitAG = count($sakitAG);

        // sakit September 9
        $sakitS = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '09')
        ->get();

        $totalSakitS = count($sakitS);

        // sakit Oktober 10
        $sakitO = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '10')
        ->get();

        $totalSakitO = count($sakitO);

        // sakit November 11
        $sakitN = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '11')
        ->get();

        $totalSakitN = count($sakitN);

        // sakit Desember 12
        $sakitD = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->whereMonth('date_absen', '12')
        ->get();

        $totalSakitD = count($sakitD);

        // ===========================================

        // ===========================================
        // izin January 1
        $izinJ = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '01')
        ->get();
        $totalIzinJ = count($izinJ);

        // izin February 2
        $izinF = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '02')
        ->get();

        $totalIzinF = count($izinF);

        // izin Maret 3
        $izinMR = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '03')
        ->get();

        $totalIzinMR = count($izinMR);

        // izin April 4
        $izinAP = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '04')
        ->get();

        $totalIzinAP = count($izinAP);

        // izin May 5
        $izinMY = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '05')
        ->get();

        $totalIzinMY = count($izinMY);

        // izin Juni 6
        $izinJN = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '06')
        ->get();

        $totalIzinJN = count($izinJN);

        // izin Juli 7
        $izinJL = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '07')
        ->get();

        $totalIzinJL = count($izinJL);

        // izin Agustus 8
        $izinAG = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '08')
        ->get();

        $totalIzinAG = count($izinAG);

        // izin September 9
        $izinS = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '09')
        ->get();

        $totalIzinS = count($izinS);

        // izin Oktober 10
        $izinO = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '10')
        ->get();

        $totalIzinO = count($izinO);

        // izin November 11
        $izinN = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '11')
        ->get();

        $totalIzinN = count($izinN);

        // izin Desember 12
        $izinD = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->whereMonth('date_absen', '12')
        ->get();

        $totalIzinD = count($izinD);

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
        ->get();
        $totalHadir = count($hadir);

        // kode hitung sakit
        $sakit = DB::table('sakits')
        ->where('user_id', $user)
        ->where('sakit', true)
        ->get();
        $totalSakit = count($sakit);

        // ===========================================

        // kode hitung izin
        $izin = DB::table('izins')
        ->where('user_id', $user)
        ->where('izin', true)
        ->get();
        $totalIzin = count($izin);

        // ===========================================

        // kode hitung alfa
        $alfa = DB::table('alfas')
        ->where('user_id', $user)
        ->where('alfa', true)
        ->get();
        $totalAlfa = count($alfa);

        // persentase hadir
        $persentaseHadir = floor(($totalHadir/date('t'))*100);

        // persentase sakit
        $persentaseSakit = floor(($totalSakit/date('t'))*100);

        // persentase alfa
        $persentaseAlfa = floor(($totalAlfa/date('t'))*100);

        // persentase izin
        $persentaseIzin = floor(($totalIzin/date('t'))*100);

        return view('rekapabsen', compact(
            'data',
            'totalHadir',
            'totalSakit',
            'totalIzin',
            'totalAlfa',

            'persentaseHadir',
            'persentaseSakit',
            'persentaseIzin',
            'persentaseAlfa',

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

            'totalSakitJ',
            'totalSakitF',
            'totalSakitMR',
            'totalSakitAP',
            'totalSakitMY',
            'totalSakitJN',
            'totalSakitJL',
            'totalSakitAG',
            'totalSakitS',
            'totalSakitO',
            'totalSakitN',
            'totalSakitD',

            'totalIzinJ',
            'totalIzinF',
            'totalIzinMR',
            'totalIzinAP',
            'totalIzinMY',
            'totalIzinJN',
            'totalIzinJL',
            'totalIzinAG',
            'totalIzinS',
            'totalIzinO',
            'totalIzinN',
            'totalIzinD',

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
        ));
    }
}
