<?php

namespace App\Http\Livewire;

use App\Models\Alfa;
use App\Models\User;
use App\Models\Hadir;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class DataSiswaAlfa extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $kelas = 10;
    public $jurusan = 'rpl';
    public $jurusan_berapa = 1;
    public $search;
    public $delete_id;
    protected $queryString = ['search'];

    protected $listeners = [
        'ChangeAlfa' => 'handleChangeAlfa',
        'deleteCustomAlfaCorfirmed' => 'handleDeleteCustomAlfa'
    ];

    public function render()
    {
        return view('livewire.data-siswa-alfa', [
            'siswas' => $this->search == null ?
            User::join('alfas', 'alfas.user_id', '=', 'users.id')
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where('is_admin', 0)
            ->where('alfa', true)
            ->where('date_absen', date('Y-m-d'))
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->paginate($this->paginate) :
            User::join('alfas', 'alfas.user_id', '=', 'users.id')
            ->latest('alfas.date_absen')
            ->where('alfas.date_absen', 'like', '%' . $this->search . '%')
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->where('is_admin', 0)
            ->where('alfa', true)
            ->paginate($this->paginate)
        ]);
    }

    // ======================================================================
    // delete custom alfa
    public function deleteCustomAlfa($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('delete-custom-alfa-confirmation');
    }

    public function handleDeleteCustomAlfa()
    {
        DB::table('alfas')
        ->where('id', $this->delete_id)
        ->where('alfa', true)
        ->delete();
        $this->dispatchBrowserEvent('deleteCustomAlfaSuccess');
    }
}
