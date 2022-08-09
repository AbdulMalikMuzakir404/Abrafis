@extends("layouts.app")

@section("content")
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Profile</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->

  @php
    // image jenis kelamin
    $jenis_kelaminl = DB::table('users')
    ->where('id', auth()->user()->id)
    ->where('jk', 'laki-laki')
    ->get();

    $jkl = count($jenis_kelaminl);

    $jenis_kelaminp = DB::table('users')
    ->where('id', auth()->user()->id)
    ->where('jk', 'perempuan')
    ->get();

    $jkp = count($jenis_kelaminp);

    if ($jkl == 1)
    {
        $images = asset('imageProfile/boy.png');
    }
    elseif ($jkp == 1)
    {
        $images = asset('imageProfile/girl.png');
    }
    elseif ($jkl == 0 && $jkp == 0)
    {

        $images = asset('imageProfile/error.png');
    }
  @endphp


    @if (Session::has('successci'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('successci') }}
        <button type="button" class="close" data-dismis="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (Session::has('errorci'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('errorci') }}
        <button type="button" class="close" data-dismis="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


  <form action="{{ route('changeimage') }}" method="post" enctype="multipart/form-data" class="border p-3 rounded mb-5">
    @csrf
    <div class="row">
        <div class="col-sm-3">
            @if(Auth::user()->images == null)
            <img src="{{ $images }}" class="img-thumbnail" alt="user images">
            @endif
            @if(Auth::user()->images != null)
            <img src="{{ asset('storage/profile/'. Auth::user()->images) }}" class="img-thumbnail" style="max-height: 500px;" alt="user images">
            @endif
        </div>
    </div>
    <div class="row mt-3 mb-3">
        <div class="col-sm-3">
            <div class="input-group mb-3">
                <div class="mb-3">
                    <input class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" type="file" required accept=".png, .jpg, .jpeg" multiple>
                  </div>
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-block">
        <button type="submit" class="btn btn-sm btn-primary">
            {{ __('Save') }}
        </button>
        <button class="btn btn-sm btn-danger delete">
            Delete
        </button>
      </div>
</form>


  @if (Session::has('successce'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('successce') }}
        <button type="button" class="close" data-dismis="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (Session::has('errorce'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('errorce') }}
        <button type="button" class="close" data-dismis="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <form action="{{ route('changeemailproses') }}" method="post" class="border p-3 rounded mb-5">
        @csrf
        <div class="input-group mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ Auth::user()->email }}" required autocomplete="email">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="bi bi-envelope"></span>
                </div>
            </div>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>

    @if (Session::has('successcp'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('successcp') }}
        <button type="button" class="close" data-dismis="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (Session::has('errorcp'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('errorcp') }}
        <button type="button" class="close" data-dismis="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <form action="{{ route('changepassproses') }}" method="post" class="border p-3 rounded">
    @csrf
    <div class="input-group mb-3">
    <input type="text" class="form-control @error('old_password') is-invalid @enderror" name="old_password" placeholder="Password Lama" required autocomplete="current-password">
    <div class="input-group-append">
        <div class="input-group-text">
        <span class="fas fa-lock"></span>
        </div>
    </div>
    @error('old_password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password Baru" required autocomplete="current-password">
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-lock"></span>
            </div>
        </div>
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirme Password" required autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>

    <div class="row">
    <div class="col-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
    </div>
</form>
@endsection


@push('js')

<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif

    @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}")
    @endif

    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}")
    @endif
</script>

{{-- Plugin SweetAlert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- Plugin JqueryCDN --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $('.delete').click( function(){
      swal({
          title: "Apa Kamu Yakin?",
          text: "Ingin menghapus gambar ini",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              window.location = "{{ route('deleteimage') }}"
              swal("Gambar berhasil dihapus!", {
              icon: "success",
              });
          } else {
              swal("Gambar tidak jadi di hapus!");
          }
      });
    });

</script>
@endpush
