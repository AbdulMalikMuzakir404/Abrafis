<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Xiirpl1 extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $kelas = 10;
    public $jurusan = 'rpl';
    public $jurusan_berapa = 1;
    public $search;
    public $statusUpdate = false;
    protected $queryString = ['search'];
    public $delete_id;

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    protected $listeners = [
        'dataUpdate' => 'handleUser',
        'deleteCorfirmed' => 'deleteUser',
        'totalHadirCorfirmed' => 'deleteHadir',
        'totalSakitCorfirmed' => 'deleteSakit',
        'totalIzinCorfirmed' => 'deleteIzin',
        'totalAlfaCorfirmed' => 'deleteAlfa',
        'hiddenUpdate' => 'updateHidden'
    ];

    public function render()
    {
        return view('livewire.xiirpl1', [
            'datas' => $this->search == null ?
            User::withCount(['hadir' => function($query) {
                $query->where('hadir', true);
            }, 'sakit' => function($query) {
                $query->where('sakit', true);
            }, 'izin' => function($query) {
                $query->where('izin', true);
            }, 'alfa' => function($query) {
                $query->where('alfa', true);
            }])
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where('is_admin', 0)
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->paginate($this->paginate) :
            User::withCount(['hadir' => function($query) {
                $query->where('hadir', true);
            }, 'sakit' => function($query) {
                $query->where('sakit', true);
            }, 'izin' => function($query) {
                $query->where('izin', true);
            }, 'alfa' => function($query) {
                $query->where('alfa', true);
            }])
            ->where('name', 'like', '%' . $this->search . '%')
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->where('is_admin', 0)
            ->paginate($this->paginate)
        ]);
    }

    // ======================================================================

    public function getUser($id)
    {
        $this->statusUpdate = true;
        $user = User::find($id);
        $this->emit('getUser', $user);
    }

    public function handleUser($user)
    {
        $this->dispatchBrowserEvent('messageUpdate');
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteUser()
    {
        $aa = User::where('id', $this->delete_id);
        $aa->delete();

        $this->dispatchBrowserEvent('userDeleted');
    }

    // ======================================================================
    // total hadir
    public function deleteTotalHadir($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('delete-total-hadir-confirmation');
    }

    public function deleteHadir()
    {
        DB::table('hadirs')
        ->where('user_id', $this->delete_id)
        ->where('hadir', true)
        ->delete();

        $this->dispatchBrowserEvent('hadirDelete');
    }

    // total sakit
    public function deleteTotalSakit($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('delete-total-sakit-confirmation');
    }

    public function deleteSakit()
    {
        DB::table('sakits')
        ->where('user_id', $this->delete_id)
        ->where('sakit', true)
        ->delete();

        $this->dispatchBrowserEvent('sakitDelete');
    }

    // total izin
    public function deleteTotalIzin($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('delete-total-izin-confirmation');
    }

    public function deleteIzin()
    {
        DB::table('izins')
        ->where('user_id', $this->delete_id)
        ->where('izin', true)
        ->delete();

        $this->dispatchBrowserEvent('izinDelete');
    }

    // total alfa
    public function deleteTotalAlfa($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('delete-total-alfa-confirmation');
    }

    public function deleteAlfa()
    {
        DB::table('alfas')
        ->where('user_id', $this->delete_id)
        ->where('alfa', true)
        ->delete();

        $this->dispatchBrowserEvent('alfaDelete');
    }

    // ======================================================================

    public function updateHidden()
    {
        $this->statusUpdate = false;
    }
}
