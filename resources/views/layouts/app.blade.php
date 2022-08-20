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



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Abrafis</title>

  {{-- icon web app --}}
  <link rel="shortcut icon" href="{{ asset("images/image/logo.png") }}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

   {{-- Link CSS Toastr --}}
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   @livewireStyles()

   @stack('css')

   {{-- Plugin JqueryCDN --}}
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   {{-- Plugin Toastr --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset("images/image/logo.png") }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ __('Abrafis SMKN 01') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if (Auth::user()->images == null)
            <img src="{{ $images }}" class="img-circle elevation-2" alt="User Image">
            @endif
            @if (Auth::user()->images != null)
            <img src="{{ asset('storage/profile/' . Auth::user()->images) }}" class="img-circle elevation-2" alt="User Image">
            @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          {{-- public --}}
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon bi bi-house-fill"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('changepass') }}" class="nav-link">
              <i class="nav-icon bi bi-person-square"></i>
              <p>
                Profile
              </p>
            </a>
          </li>



          {{-- start admin sidebar --}}
          @can('admin')

          <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="bi bi-table"></i>
                <p>
                  Data Siswa
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{ route('xiirpl1') }}" class="nav-link">
                        <i class="nav-icon bi bi-pc-display-horizontal"></i>
                        <p>
                          RPL
                        </p>
                      </a>
                  </li>
              </ul>

              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{ route('multimedia') }}" class="nav-link">
                        <i class="bi bi-camera-reels"></i>
                        <p>
                          MultiMedia
                        </p>
                      </a>
                  </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('elektro') }}" class="nav-link">
                        <i class="bi bi-robot"></i>
                      <p>
                        Elektro
                      </p>
                    </a>
                </li>
            </ul>
          </li>

          @endcan
        {{-- end admin sedebar --}}



          {{-- start user seleder --}}
          @can('user')
          <li class="nav-item">
            <a href="{{ route('rekapabsen') }}" class="nav-link">
              <i class="nav-icon bi bi-card-checklist"></i>
              <p>
                Rekap Absen
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="bi bi-table"></i>
              <p>
                Data Table
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route("kodehadir") }}" class="nav-link">
                      <i class="nav-icon bi bi-box-arrow-in-right"></i>
                      <p>
                        Table Hadir
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route("kodesakit") }}" class="nav-link">
                      <i class="nav-icon bi bi-heart-pulse fs-2"></i>
                      <p>
                        Table Sakit
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route("kodeizin") }}" class="nav-link">
                      <i class="nav-icon bi bi-activity fs-2"></i>
                      <p>
                        Table Izin
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route("alfa") }}" class="nav-link">
                      <i class="bi bi-x-circle"></i>
                      <p>
                        Table Alfa
                      </p>
                    </a>
                  </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{ route('peringkat') }}" class="nav-link">
              <i class="bi bi-trophy"></i>
              <p>
                Peringkat
              </p>
            </a>
          </li>
        @endcan

          <li class="nav-item">
            <a href="{{ route('faq') }}" class="nav-link">
              <i class="nav-icon bi bi-question-square-fill"></i>
              <p>
                Bantuan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('about') }}" class="nav-link">
              <i class="nav-icon bi bi-grid-fill"></i>
              <p>
                Tentang
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('chatting') }}" class="nav-link">
              <i class="nav-icon bi bi-chat-left-text"></i>
              <p>
                Chatting
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <i class="nav-icon bi bi-box-arrow-right"></i>
              <p>
                Keluar
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    @yield("content")
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 RPL 1 Abrafis</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>

@livewireScripts()

@stack('js')

<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('template/dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('template/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('template/dist/js/pages/dashboard3.js') }}"></script>


<script>
    setInterval(() => {
        let today = new Date();
        let myToday = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 11, 0, 0);
        let patokan = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 11, 0, 3);

        let awal = Date.parse(myToday);
        let akhir = Date.parse(Date());
        let patokaC = Date.parse(patokan);

        let converseAwal = awal/1000;
        let converseAkhir = akhir/1000;
        let conversePatoka = patokaC/1000;

        if(converseAwal <= converseAkhir && conversePatoka >= converseAkhir)
        {
            window.location = '{{ route("home") }}';
        }
    }, 1000)
</script>

</body>
</html>
