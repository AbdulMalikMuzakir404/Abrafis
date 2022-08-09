<?php

namespace App\Http\Livewire;

use App\Models\Alfa;
use App\Models\User;
use App\Models\Hadir;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TanpaKeteranganRpl extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $kelas = 10;
    public $jurusan = 'rpl';
    public $jurusan_berapa = 1;
    public $search;
    public $delete_id;
    public $userId;
    protected $queryString = ['search'];

    protected $listeners = [
        'approveTanpaKeterangan' => 'handleTanpaKeterangan',
        'hadirApprove' => 'handleHadirApprove',
        'emitApproveAllHadir' => 'handleApproveAllHadir',
        'emitDecliningAllHadir' => 'handleDecliningAllHadir'
    ];


    public function mount()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function render()
    {
        return view('livewire.tanpa-keterangan-rpl', [
            'siswas' => $this->search == null ?
            User::join('hadirs', 'hadirs.user_id', '=', 'users.id')
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where('is_admin', 0)
            ->where('hadir', false)
            ->where('date_absen', date('Y-m-d'))
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->paginate($this->paginate) :
            User::join('hadirs', 'hadirs.user_id', '=', 'users.id')
            ->where('name', 'like', '%' . $this->search . '%')
            ->where('kelas', $this->kelas)
            ->where('jurusan', $this->jurusan)
            ->where("jurusan_berapa", $this->jurusan_berapa)
            ->where('is_admin', 0)
            ->where('hadir', false)
            ->paginate($this->paginate)
        ]);
    }

    // ======================================================================

    public function tanpaKeterangan($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('tanpa-keterangan-confirmation');
    }

    public function handleTanpaKeterangan()
    {
        $data = User::join('hadirs', 'hadirs.user_id', 'users.id')
        ->where('hadirs.id', $this->delete_id)
        ->where('hadir', true)
        ->get();


        $user = [];

        foreach($data as $item)
        {
            array_push($user, $item->user_id);
        }

        foreach($user as $jkl)
        {
            DB::table('alfas')
            ->create([
                'user_id' => $jkl,
                'alfa' => true,
                'date_alfa' => date('Y-m-d'),
                'jam_alfa' => date('G:i:s')
            ]);
        }

        DB::table('hadirs')
        ->where('hadir', true)
        ->where('id', $this->delete_id)
        ->delete();

        $this->dispatchBrowserEvent('changeTanpaKeterangan');
    }
}
