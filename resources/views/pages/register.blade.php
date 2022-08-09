<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Title Page-->
    <title>Register</title>

    {{-- icon web app --}}
    <link rel="shortcut icon" href="{{ asset("images/image/logo.png") }}">

    {{-- Link CSS Toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Plugin JqueryCDN --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- Plugin Toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Icons font CSS-->
    <link href="{{ asset("bb/vendor/mdi-font/css/material-design-iconic-font.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ asset("bb/vendor/font-awesome-4.7/css/font-awesome.min.css") }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset("bb/vendor/select2/select2.min.css") }}" rel="stylesheet" media="all">
    <link href="{{ asset("bb/vendor/datepicker/daterangepicker.css") }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset("bb/css/main.css") }}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration</h2>
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Full Name</label>
                                    <input type="text" class="input--style-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>
                                    @error('name')
                                        <script>toastr.error("{{ $message }}")</script>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email Address</label>
                                    <input type="email" class="input--style-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                                    @error('email')
                                        <script>toastr.error("{{ $message }}")</script>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date of Birth</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker  @error('tgl_lahir') is-invalid @enderror" type="text" name="tgl_lahir" value="{{ old('tgl_lahir') }}" placeholder="{{ date('d/m/Y') }}" required>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        @error('tgl_lahir')
                                            <script>toastr.error("{{ $message }}")</script>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" class="@error('jk') is-invalid @enderror" name="jk" value="laki-laki">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="jk" class="@error('jk') is-invalid @enderror" value="perempuan">
                                            <span class="checkmark"></span>
                                        </label>
                                        @error('jk')
                                            <script>toastr.error("{{ $message }}")</script>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Areas of Expertise</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="jurusan" class="@error('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value="rpl">Rekayasa Perangkat Lunak</option>
                                            <option value="mm">Multi Media</option>
                                            <option avlue="elektro">Elektro</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                        @error('jurusan')
                                            <script>toastr.error("{{ $message }}")</script>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">What Area of ​​Expertise</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="jurusan_berapa" class="@error('jurusan_berapa') is-invalid @enderror" value="{{ old('jurusan_berapa') }}" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value="1">Ke 1</option>
                                            <option value="2">Ke 2</option>
                                            <option value="3">Ke 3</option>
                                            <option value="4">Ke 4</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                        @error('jurusan_berapa')
                                            <script>toastr.error("{{ $message }}")</script>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Which grade are you</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="kelas" class="@error('kelas') is-invalid @enderror" value="{{ old('kelas') }}" required>
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                        @error('kelas')
                                            <script>toastr.error("{{ $message }}")</script>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Parents' Name</label>
                                    <input type="text" class="input--style-4 @error('nama_ortu') is-invalid @enderror" name="nama_ortu" value="{{ old('nama_ortu') }}" placeholder="Parent' Name" required>
                                    @error('nama_ortu')
                                        <script>toastr.error("{{ $message }}")</script>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input type="password" class="input--style-4 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                                    @error('password')
                                        <script>toastr.error("{{ $message }}")</script>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password Confirm</label>
                                    <input type="password" class="input--style-4" name="password_confirmation" placeholder="Confir Password" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">WhatsApp Number</label>
                                    <input type="text" class="input--style-4 @error('no_wa') is-invalid @enderror" name="no_wa" value="{{ old('no_wa') }}" placeholder="WhatsApp Number" required>
                                    @error('no_wa')
                                        <script>toastr.error("{{ $message }}")</script>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input type="text" class="input--style-4 @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" name="no_hp" placeholder="+62 xxxx" required>
                                    @error('no_hp')
                                        <script>toastr.error("{{ $message }}")</script>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NIS</label>
                                    <input type="text" class="input--style-4 @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" placeholder="NIS" required>
                                    @error('nis')
                                        <script>toastr.error("{{ $message }}")</script>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="form-floating rs-select2 js-select-simple select--no-search">
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="You Address" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Address</label>
                                @error('alamat')
                                    <script>toastr.error("{{ $message }}")</script>
                                @enderror
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{ asset("bb/vendor/jquery/jquery.min.js") }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset("bb/vendor/select2/select2.min.js") }}"></script>
    <script src="{{ asset("bb/vendor/datepicker/moment.min.js") }}"></script>
    <script src="{{ asset("bb/vendor/datepicker/daterangepicker.js") }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Main JS-->
    <script src="{{ asset("bb/js/global.js") }}"></script>

    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>

</body>
</html>
