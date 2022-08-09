<div>
    <div class="card">
        <div class="card-header bg-black">
            <h3 class="text-white">Table Tanpa Keterangan Siswa</h3>
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
            <div class="container">
                <div class="row mt-3">
                    <div class="col">
                        <a wire:click.prevent="approveAll" class="btn btn-primary btn-sm">Approve All</a>
                    </div>
                </div>
            </div>
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
                    <th scope="col">Status Hadir</th>
                    <th scope="col">Pesan</th>
                    <th scope="col">Kode Hadir</th>
                    <th scope="col">Date Hadir</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=0;
            @endphp
            @foreach($siswas as $data)
            @php
            $notifikasi = $data->notifikasi;
            if($notifikasi == 1)
            {
                $pesan = 'sudah dibaca';
            }
            elseif($notifikasi == 0)
            {
                $pesan = 'belum dibaca';
            }
            $no++;
            @endphp
                <tr>
                    <th scope="row">{{ $no }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->nis  }}</td>
                    <td>{{ $data->kelas  }}</td>
                    <td>{{ $data->jurusan . " " . $data->jurusan_berapa  }}</td>
                    <td>{{ $data->status_hadir  }}</td>
                    <td>{{ $pesan }}</td>
                    <td>{{ $data->kode_hadir  }}</td>
                    <td>{{ $data->date_hadir  }}</td>
                    <td>
                        <a wire:click.prevent="approveHadir({{ $data->id }})" class="btn bg-blue btn-sm">approve</a>                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
            <br>
            {{ $siswas->links() }}
        </div>
        <!-- /.card-body -->
        </div>
</div>
