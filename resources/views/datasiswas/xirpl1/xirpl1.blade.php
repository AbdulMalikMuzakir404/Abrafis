@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="">
                <table class="table table-bordered table-responsive table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Email</th>
                          <th scope="col">Status</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->is_admin }}</td>
                            <td>
                                <a href="" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <a href="" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection
