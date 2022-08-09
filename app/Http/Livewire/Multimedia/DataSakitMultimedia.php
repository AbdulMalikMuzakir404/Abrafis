<?php

namespace App\Http\Livewire\Multimedia;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class DataSakitMultimedia extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $kelas = 10;
    public $jurusan = 'mm';
    public $jurusan_berapa = 1;
    public $search;
    public $delete_id;
    protected $queryString = ['search'];

    protected $listeners = [
        'ApproveSakit' => 'handleApprove',
        'deleteCustomSakitCorfirmed' => 'handleDeleteCustomSakit'
    ];

    public function render()
    {
        return view('livewire.multimedia.data-sakit-multimedia', [
            'siswas' => $this->search == null ?
            User::join('sakits', 'sakits.user_id', '=', 'users.id')
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where('is_admin', 0)
            ->where('sakit', true)
            ->where('date_absen', date('Y-m-d'))
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->paginate($this->paginate) :
            User::join('sakits', 'sakits.user_id', '=', 'users.id')
            ->latest('sakits.date_absen')
            ->where('sakits.date_absen', 'like', '%' . $this->search . '%')
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->where('is_admin', 0)
            ->where('sakit', true)
            ->paginate($this->paginate)
        ]);
    }

    // ======================================================================
    // delete custom sakit
    public function deleteCustomSakit($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('delete-custom-sakit-confirmation');
    }

    public function handleDeleteCustomSakit()
    {
        DB::table('sakits')
        ->where('id', $this->delete_id)
        ->where('sakit', true)
        ->delete();
        $this->dispatchBrowserEvent('deleteCustomSakitSuccess');
    }
}
