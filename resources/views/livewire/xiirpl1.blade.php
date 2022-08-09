<div>
    @if ($statusUpdate)
        <livewire:data-update></livewire:data-update>
    @endif
    <div class="card">
    <div class="card-header bg-primary">
        <h3 class="text-white">Data Siswa</h3>
    </div>
    <div class="card-header">
        <div class="row mt-3">
            <div class="col-2">
                <select wire:model="paginate" class="form-control-sm w-auto">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
            </div>
            <div class="col-2">
                <select wire:model="kelas" class="form-control-sm w-auto">
                    <option disabled="disabled" selected="selected">Level</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="col-2">
                <select wire:model="jurusan_berapa" class="form-control-sm w-auto">
                    <option disabled="disabled" selected="selected">rpl</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="col-5">
                <input wire:model="search" type="text" class="form-control w-auto" placeholder="Seacrh">
            </div>
        </div>
    </div>
    <div class="card-header">
        <p class="text-red fs-3">Description</p>
        <button class="btn btn-sm text-white bg-blue">Update Data Siswa</button>
        <button class="btn btn-sm text-white bg-green">Delete Total Hadir</button>
        <button class="btn btn-sm text-white bg-yellow">Delete Total Sakit</button>
        <button class="btn btn-sm text-white bg-orange">Delete Total Izin</button>
        <button class="btn btn-sm text-white bg-black">Delete Total Alfa</button>
        <button class="btn btn-sm text-white bg-red">Delete Data Siswa</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIS</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Total Hadir</th>
                <th scope="col">Total Sakit</th>
                <th scope="col">Total Izin</th>
                <th scope="col">Total Alfa</th>
                <th scope="col-5">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=0;
        @endphp
        @foreach($datas as $data)
        @php
            $no++;
        @endphp
            <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ $data->name }}</td>
                <td>{{ $data->nis  }}</td>
                <td>{{ $data->kelas  }}</td>
                <td>{{ $data->jurusan . " " . $data->jurusan_berapa  }}</td>
                <td>{{ $data->hadir_count  }}</td>
                <td>{{ $data->sakit_count  }}</td>
                <td>{{ $data->izin_count  }}</td>
                <td>{{ $data->alfa_count  }}</td>
                <td>
                    <a wire:click="getUser({{ $data->id }});" class="btn bg-blue btn-sm"></a>
                    <a wire:click.prevent="deleteTotalHadir({{ $data->id }})" class="btn bg-green btn-sm"></a>
                    <a wire:click.prevent="deleteTotalSakit({{ $data->id }})" class="btn bg-yellow btn-sm"></a>
                    <a wire:click.prevent="deleteTotalIzin({{ $data->id }})" class="btn bg-orange btn-sm"></a>
                    <a wire:click.prevent="deleteTotalAlfa({{ $data->id }})" class="btn bg-black btn-sm"></a>
                    <a wire:click.prevent="deleteConfirmation({{ $data->id }})" class="btn bg-red btn-sm"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
        <br>
        {{ $datas->links() }}
    </div>
    <!-- /.card-body -->
    </div>
</div>
