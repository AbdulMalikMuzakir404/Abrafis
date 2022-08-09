<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class DataUpdate extends Component
{
    public $kelas;
    public $jurusan;
    public $jurusan_berapa;
    public $userId;
    public $name;

    protected $listeners = [
        'getUser' => 'showUser'
    ];

    public function render()
    {
        return view('livewire.data-update');
    }

    public function showUser($user)
    {
        $this->name = $user['name'];
        $this->kelas = $user['kelas'];
        $this->jurusan = $user['jurusan'];
        $this->jurusan_berapa = $user['jurusan_berapa'];
        $this->userId = $user['id'];
    }

    public function dataUpdate()
    {
        $this->validate([
            'kelas' => 'required|max:5',
            'jurusan' => ['required', 'in:"rpl", "mm", "elektro"'],
            'jurusan_berapa' => 'required|max:2'
        ]);

        if($this->userId != null) {
            $user = User::find($this->userId);
            $user->update([
                'kelas' => $this->kelas,
                'jurusan' => $this->jurusan,
                'jurusan_berapa' => $this->jurusan_berapa
            ]);

            $this->resetInput();

            $this->emit('dataUpdate', $user);
        }
    }

    private function resetInput()
    {
        $this->userId = null;
        $this->kelas = null;
        $this->jurusan = null;
        $this->jurusan_berapa = null;
        $this->name = null;
    }

    public function hidden()
    {
        $this->emit('hiddenUpdate');
    }
}
