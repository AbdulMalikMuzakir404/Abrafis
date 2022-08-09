<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataTableAlfa extends Component
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

        return view('livewire.data-table-alfa', [
            'datas' => $this->search == null ?
            DB::table('users')
            ->join('alfas', 'alfas.user_id', 'users.id')
            ->where('user_id', $user)
            ->where('alfa', true)
            ->whereMonth('date_absen', $bulan)
            ->paginate($this->paginate) :
            DB::table('users')
            ->join('alfas', 'alfas.user_id', 'users.id')
            ->where('alfas.date_absen', 'like', '%' . $this->search . '%')
            ->where('user_id', $user)
            ->where('alfa', true)
            ->whereMonth('date_absen', $bulan)
            ->paginate($this->paginate)
        ]);
    }
}
