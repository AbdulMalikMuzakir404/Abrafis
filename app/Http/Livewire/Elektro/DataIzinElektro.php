<?php

namespace App\Http\Livewire\Elektro;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class DataIzinElektro extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $kelas = 10;
    public $jurusan = 'elektro';
    public $jurusan_berapa = 1;
    public $search;
    protected $queryString = ['search'];

    protected $listeners = [
        'ApproveIzin' => 'handleApprove',
        'deleteCustomIzinCorfirmed' => 'handleDeleteCustomIzin'
    ];

    public function render()
    {
        return view('livewire.elektro.data-izin-elektro', [
            'siswas' => $this->search == null ?
            User::join('izins', 'izins.user_id', '=', 'users.id')
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where('is_admin', 0)
            ->where('izin', true)
            ->where('date_absen', date('Y-m-d'))
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->paginate($this->paginate) :
            User::join('izins', 'izins.user_id', '=', 'users.id')
            ->latest('izins.date_absen')
            ->where('date_absen', 'like', '%' . $this->search . '%')
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->where('is_admin', 0)
            ->where('izin', true)
            ->paginate($this->paginate)
        ]);
    }

    // ======================================================================
    // delete custom izin
    public function deleteCustomIzin($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('delete-custom-izin-confirmation');
    }

    public function handleDeleteCustomIzin()
    {
        DB::table('izins')
        ->where('id', $this->delete_id)
        ->where('izin', true)
        ->delete();
        $this->dispatchBrowserEvent('deleteCustomIzinSuccess');
    }
}
