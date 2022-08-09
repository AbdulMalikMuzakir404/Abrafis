<?php

namespace App\Http\Livewire;

use App\Models\Alfa;
use App\Models\Izin;
use App\Models\Sakit;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Chart1 extends Component
{
    public $alfa;
    protected $listeners = ['ubahData' => 'changeData'];

    public function mount()
    {
        $alfa = Izin::where('user_id', Auth::user()->id)
        ->get();

        foreach($alfa as $item)
        {
            $data['label'][] = $item->date_izin;
            $dataa['data'][] = (int) $item->status_izin;
            $data['data'][] = count($dataa);
        }
        $this->alfa = json_encode($data);
        // dd($this->alfa);
    }
    public function render()
    {
        return view('livewire.chart1');
    }

    public function changeData()
    {
        $alfa = Izin::
        where('user_id', auth()->user()->id)
        ->get();

        foreach($alfa as $item)
        {
            $data['label'][] = $item->date_izin;
            $dataa['data'][] = (int) $item->status_izin;
            $data['data'][] = count($dataa);
        }
        $this->alfa = json_encode($data);
        $this->emit('berhasilUpdate', ['data' => $this->alfa]);
    }
}
