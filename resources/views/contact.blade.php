@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body pb-0">
            <div class="row">

                @foreach ($admin as $data)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            Abrafis
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>{{ $data->name }}</b></h2>
                                <p class="text-muted text-sm"><b>admin : </b> Admin Abrafis </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{ $data->alamat }}</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : {{ $data->no_hp }}</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                @if ($data->images == null)
                                <img src="{{ asset("imageProfile/support.png") }}" alt="user-avatar" class="img-circle img-fluid">
                                @endif
                                @if ($data->images != null)
                                <img src="{{ asset("storage/profile/" . $data->images) }}" alt="user-avatar" class="img-circle img-fluid">
                                @endif
                            </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                            <a href="https://api.whatsapp.com/send?phone={{ $data->no_hp }}&text=Hallo, {{ $data->name }} Saya Butuh Bantuan Anda." class="btn btn-sm bg-teal">
                                <i class="fas fa-comments"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-primary">
                                Show
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach

            </div>
          </div>

      </section>
@endsection
