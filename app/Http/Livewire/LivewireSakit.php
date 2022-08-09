<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LivewireSakit extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $search;
    public $statusUpdate = false;
    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }


    public function render()
    {
        $bulan = date('m');
        $user = Auth::user()->id;

        return view('livewire.livewire-sakit', [
            'datas' => $this->search == null ?
            DB::table('users')
            ->join('sakits', 'sakits.user_id', 'users.id')
            ->where('user_id', $user)
            ->where('sakit', true)
            ->whereMonth('date_absen', $bulan)
            ->paginate($this->paginate) :
            DB::table('users')
            ->join('sakits', 'sakits.user_id', 'users.id')
            ->where('sakits.date_absen', 'like', '%' . $this->search . '%')
            ->where('user_id', $user)
            ->where('sakit', true)
            ->whereMonth('date_absen', $bulan)
            ->paginate($this->paginate)
        ]);
    }
}
