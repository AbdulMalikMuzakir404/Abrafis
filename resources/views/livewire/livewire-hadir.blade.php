<div>
    <div class="card">
    <div class="card-header">
        <div class="row mt-3">
            <div class="col">
                <select wire:model="paginate" class="form-control-sm w-auto">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
            </div>
            <div class="col">
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
                <th scope="col">Status Hadir</th>
                <th scope="col">Jam Hadir</th>
                <th scope="col">Date Hadir</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=0;
        @endphp
        @foreach($datas as $data)
        @php
        if($data->hadir == true)
        {
            $hadir = 'hadir';
        }
        $no++;
        @endphp
            <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ auth()->user()->name }}</td>
                <td>{{ $data->nis }}</td>
                <td>{{ $hadir }}</td>
                <td>{{ $data->jam_absen }}</td>
                <td>{{ $data->date_absen }}</td>
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
