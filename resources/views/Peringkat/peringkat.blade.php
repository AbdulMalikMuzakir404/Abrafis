@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Peringkat siswa</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Peringkat siswa</li>
        </ol>
    </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

<div class="row text-center">
@foreach ($data as $peringkat)
@php
    $patokan = $peringkat->hadir_count;
@endphp
@if ($peringkat->hadir_count >= 0)
<div class="col-xl-3 col-sm-6 mb-5">
@if ($peringkat->images == null)
<div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
@endif
@if ($peringkat->images != null)
<div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{ asset('storage/profile/' . $peringkat->images) }}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
@endif
<h5 class="mb-0">{{ $peringkat->name }}</h5>
</h5><span class="small text-uppercase text-muted">{{ $peringkat->kelas . " " . $peringkat->jurusan . " " . $peringkat->jurusan_berapa }}</span><br>
<span class="small text-uppercase text-muted">Jumlah hadir</span><br>
</h5><span class="small text-uppercase text-muted">{{ $peringkat->hadir_count . " kali" }}</span>
</div>
</div>
@endif
@endforeach
</div>
@endsection
