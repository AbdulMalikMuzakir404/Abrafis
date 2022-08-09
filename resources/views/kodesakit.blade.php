@extends('layouts.app')


@section("content")
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Table sakit</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Data Table Sakit</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

    <livewire:livewire-sakit></livewire:livewire-sakit>

@endsection

@push('js')
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif

    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}")
    @endif
</script>

@endpush
