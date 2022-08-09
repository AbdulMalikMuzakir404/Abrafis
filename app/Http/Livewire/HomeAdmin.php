<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class HomeAdmin extends Component
{
    public $totalHadirHariIni;
    public $totalSakitHariIni;
    public $totalIzinHariIni;
    public $totalAlfaHariIni;

    public $totalHadirJ;
    public $totalHadirF;
    public $totalHadirMR;
    public $totalHadirAP;
    public $totalHadirMY;
    public $totalHadirJN;
    public $totalHadirJL;
    public $totalHadirAG;
    public $totalHadirS;
    public $totalHadirO;
    public $totalHadirN;
    public $totalHadirD;

    public $totalAlfaJ;
    public $totalAlfaF;
    public $totalAlfaMR;
    public $totalAlfaAP;
    public $totalAlfaMY;
    public $totalAlfaJN;
    public $totalAlfaJL;
    public $totalAlfaAG;
    public $totalAlfaS;
    public $totalAlfaO;
    public $totalAlfaN;
    public $totalAlfaD;

    public $persentaseHadir;
    public $persentaseSakit;
    public $persentaseIzin;
    public $persentaseAlfa;

    public $persenUser;


    public function render()
    {
        $hadir = DB::table('hadirs')
        ->where('hadir', true)
        ->where('date_absen', date('Y-m-d'))
        ->get();

        $this->dataHadir = count($hadir);

        $sakit = DB::table('sakits')
        ->where('sakit', true)
        ->where('date_absen', date('Y-m-d'))
        ->get();

        $this->dataSakit = count($sakit);

        $izin = DB::table('izins')
        ->where('izin', true)
        ->where('date_absen', date('Y-m-d'))
        ->get();

        $this->dataIzin = count($izin);

        $alfa = DB::table('alfas')
        ->where('alfa', true)
        ->where('date_absen', date('Y-m-d'))
        ->get();

        $this->dataAlfa = count($alfa);

        // ===========================================
        // Hadir January 1
        $hadirJ = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '01')
        ->get();
        $this->totalHadiJ = count($hadirJ);

        // Hadir February 2
        $hadirF = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '02')
        ->get();

        $this->totalHadirF = count($hadirF);

        // Hadir Maret 3
        $hadirMR = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '03')
        ->get();

        $this->totalHadirMR = count($hadirMR);

        // Hadir April 4
        $hadirAP = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '04')
        ->get();

        $this->totalHadirAP = count($hadirAP);

        // Hadir May 5
        $hadirMY = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '05')
        ->get();

        $this->totalHadirMY = count($hadirMY);

        // Hadir Juni 6
        $hadirJN = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '06')
        ->get();

        $this->totalHadirJN = count($hadirJN);

        // Hadir Juli 7
        $hadirJL = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '07')
        ->get();

        $this->totalHadirJL = count($hadirJL);

        // Hadir Agustus 8
        $hadirAG = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '08')
        ->get();

        $this->totalHadirAG = count($hadirAG);

        // Hadir September 9
        $hadirS = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '09')
        ->get();

        $this->totalHadirS = count($hadirS);

        // Hadir Oktober 10
        $hadirO = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '10')
        ->get();

        $this->totalHadirO = count($hadirO);

        // Hadir November 11
        $hadirN = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '11')
        ->get();

        $this->totalHadirN = count($hadirN);

        // Hadir Desember 12
        $hadirD = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', '12')
        ->get();

        $this->totalHadirD = count($hadirD);

        // ===========================================

        // ===========================================
        // alfa January 1
        $alfaJ = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '01')
        ->get();

        $this->totalAlfaJ = count($alfaJ);

        // alfa February 2
        $alfaF = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '02')
        ->get();

        $this->totalAlfaF = count($alfaF);

        // alfa Maret 3
        $alfaMR = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '03')
        ->get();

        $this->totalAlfaMR = count($alfaMR);

        // alfa April 4
        $alfaAP = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '04')
        ->get();

        $this->totalAlfaAP = count($alfaAP);

        // alfa May 5
        $alfaMY = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '05')
        ->get();

        $this->totalAlfaMY = count($alfaMY);

        // alfa Juni 6
        $alfaJN = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '06')
        ->get();

        $this->totalAlfaJN = count($alfaJN);

        // alfa Juli 7
        $alfaJL = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '07')
        ->get();

        $this->totalAlfaJL = count($alfaJL);

        // alfa Agustus 8
        $alfaAG = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '08')
        ->get();

        $this->totalAlfaAG = count($alfaAG);

        // alfa September 9
        $alfaS = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '09')
        ->get();

        $this->totalAlfaS = count($alfaS);

        // alfa Oktober 10
        $alfaO = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '10')
        ->get();

        $this->totalAlfaO = count($alfaO);

        // alfa November 11
        $alfaN = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '11')
        ->get();

        $this->totalAlfaN = count($alfaN);

        // alfa Desember 12
        $alfaD = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', '12')
        ->get();

        $this->totalAlfaD = count($alfaD);

        // ===========================================

        $jumlahUser = DB::table('users')
        ->where('is_admin', 0)
        ->get();

        $this->persenUser = count($jumlahUser)*date('t');

        $grafikHadir = DB::table('hadirs')
        ->where('hadir', true)
        ->whereMonth('date_absen', date('m'))
        ->get();

        $persenHadir = count($grafikHadir);

        $this->persentaseHadir = floor(($persenHadir/$this->persenUser)*100);

        $grafikSakit = DB::table('sakits')
        ->where('sakit', true)
        ->whereMonth('date_absen', date('m'))
        ->get();

        $persenSakit = count($grafikSakit);

        $this->persentaseSakit = floor(($persenSakit/$this->persenUser)*100);

        $grafikIzin = DB::table('izins')
        ->where('izin', true)
        ->whereMonth('date_absen', date('m'))
        ->get();

        $persenIzin = count($grafikIzin);

        $this->persentaseIzin = floor(($persenIzin/$this->persenUser)*100);

        $grafikAlfa = DB::table('alfas')
        ->where('alfa', true)
        ->whereMonth('date_absen', date('m'))
        ->get();

        $persenAlfa = count($grafikAlfa);

        $this->persentaseAlfa = floor(($persenAlfa/$this->persenUser)*100);

        return view('livewire.home-admin');
    }
}
