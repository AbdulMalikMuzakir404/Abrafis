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
                <span class="fas fa-lock"></span>
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
