<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class DataSiswa extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $kelas = 10;
    public $jurusan = 'rpl';
    public $jurusan_berapa = 1;
    public $search;
    protected $queryString = ['search'];

    protected $listeners = [
        'deleteHadirCorfirmed' => 'handleDeleteHadir'
    ];

    public function render()
    {
        return view('livewire.data-siswa', [
            'siswas' => $this->search == null ?
            User::join('hadirs', 'hadirs.user_id', '=', 'users.id')
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where('is_admin', 0)
            ->where('hadir', true)
            ->where('date_absen', date('Y-m-d'))
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->paginate($this->paginate) :
            User::join('hadirs', 'hadirs.user_id', '=', 'users.id')
            ->latest('hadirs.date_absen')
            ->where('hadirs.date_absen', 'like', '%' . $this->search . '%')
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->where('is_admin', 0)
            ->where('hadir', true)
            ->paginate($this->paginate)
        ]);
    }

    // ======================================================================
    // delete custom hadir
    public function deleteHadir($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('delete-hadir-confirmation');
    }

    public function handleDeleteHadir()
    {
        DB::table('hadirs')
        ->where('id', $this->delete_id)
        ->where('hadir', true)
        ->delete();
        $this->dispatchBrowserEvent('deleteHadirSuccess');
    }
}
