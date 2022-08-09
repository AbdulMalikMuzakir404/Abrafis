<div>
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="text-white">Table Alfa Siswa</h3>
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
                    <th scope="col">Status Alfa</th>
                    <th scope="col">Jam Alfa</th>
                    <th scope="col">Date Alfa</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=0;
            @endphp
            @foreach($siswas as $data)
            @php
                $no++;
            @endphp
                <tr>
                    <th scope="row">{{ $no }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->nis  }}</td>
                    <td>{{ $data->kelas  }}</td>
                    <td>{{ $data->jurusan . " " . $data->jurusan_berapa  }}</td>
                    <td>{{ $data->alfa  }}</td>
                    <td>{{ $data->jam_absen  }}</td>
                    <td>{{ $data->date_absen  }}</td>
                    <td>
                        <a wire:click.prevent="deleteCustomAlfa({{ $data->id }})" class="btn bg-red btn-sm"><i class="bi bi-trash3-fill"></i></a>
                    </td>
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
