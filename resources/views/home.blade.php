@extends('layouts.app')

@push('css')
  <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

@endpush

@section("content")
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->


  <div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div id="map" class="card-body" style="height: 500px"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12 my-3">
        <div class="card border shadow p-2 mb-5 bg-body rounded">
    <div class="card-body">
        <img src="{{ asset('images/image/image1.png') }}" class="w-50">
        <div class="float-end">Selamat Belajar Sobat SMKN 01 KATAPANG</p>
            <p class="lead">
                {{ Auth::user()->name }}
            </p>
            <p id="demo"></p>
            @php
                $haris = date('D');
                $listHari = array(
                    'Sun' => 'Minggu',
                    'Mon' => 'Senin',
                    'Tue' => 'Selasa',
                    'Wed' => 'Rabu',
                    'Thu' => 'Kamis',
                    'Fri' => 'Jumat',
                    'Sat' => 'Sabtu'
                );
            @endphp
            <span>{{ $listHari[$haris] }}, {{ date('d')}} {{ date('F') }} {{ date('Y') }}</span><span><span class="float-end px-3" id="date-time"></span><span class="">{{ __('WIB') }}</span></span></div><br>
        </div>
    </div>
        </div>

        <div class="col-md-3 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <i class="bi bi-box-arrow-in-right"></i> Jam Masuk<br><strong class="px-3">07.00 WIB</strong>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <i class="bi bi-box-arrow-right"></i> Jam Pulang<br><strong class="px-3">15.00 WIB</strong>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <h1 class="display-6">Hadir</h1><br><h1 class="display-3">0<p class="lead">Kali</p></h1> <br>Selama bulan {{ date('F') }}
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <h1 class="display-6">Sakit</h1><br><h1 class="display-3">0<p class="lead">Kali</p></h1> <br>Selama bulan {{ date('F') }}
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <h1 class="display-6">Izin</h1><br><h1 class="display-3">0<p class="lead">Kali</p></h1> <br>Selama bulan {{ date('F') }}
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <h1 class="display-6">Alfa</h1><br><h1 class="display-3">0<p class="lead">Kali</p></h1> <br>Selama bulan {{ date('F') }}
                </div>
            </div>
        </div>
        <p id="demo"></p>
    </div>
</div>
@endsection

@push("js")
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script>
    // script getlatlng
    getLocation();

    setInterval(() => {
        getLocation();
    }, 3000);
    function getLocation()
    {
        if(navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(function(position){
                let lat = position.coords.latitude;
                let long = position.coords.longitude;

                console.log(lat, long);

                var map = L.map('map').setView([lat, long], 13);

                var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                var marker = L.marker([lat, long]).addTo(map).bindPopup('you location');

                var circle = L.circle([-7.009147922210896, 107.5472541664973], {
                color: 'blue',
                fillColor: '#0000FF',
                fillOpacity: 0.5,
                radius: 30
                }).addTo(map).bindPopup('Zona Absen');

                var polygon = L.polygon([
                    [lat, long],
                    [-7.009147922210896, 107.5472541664973]
                ]).addTo(map).bindPopup('Line');

                var popup = L.popup()
                    .setLatLng([-7.009147922210896, 107.5472541664973])

                function onMapClick(e) {
                    popup
                        .setLatLng(e.latlng)
                        .setContent(e.latlng.toString())
                        .openOn(map);
                }

                map.on('click', onMapClick);

                // script ukur jarak antara 2 titik kordinat
                getDistanceFromLatLonInKm(-7.009147922210896, 107.5472541664973,lat,long).toFixed(1);

                function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
                var R = 6371; // Radius of the earth in km
                var dLat = deg2rad(lat2-lat1);  // deg2rad below
                var dLon = deg2rad(lon2-lon1);
                var a =
                    Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                    Math.sin(dLon/2) * Math.sin(dLon/2)
                    ;
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                var d = R * c * 1000; // Distance in m
                // if(d <= 30)
                // {
                //     alert('dalam');
                // } else {
                //     alert('luar');
                // }
                return d;
                }


                function deg2rad(deg) {
                return deg * (Math.PI/180)
                }

            });
        } else {
            alert('browser anda mungkin tidak kompatible dengan aplikasi ini atau anda menolak akses lokasi dari kami');
        }
    }



    // ================= script realtime timer =================
    // Function to format 1 in 01
    const zeroFill = n => {
        return ('0' + n).slice(-2);
    }

    // Creates interval
    const interval = setInterval(() => {
        // Get current time
        const now = new Date();

        // Format date as in hh:ii:ss
        const dateTime = zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

        // Display the date and time on the screen using div#date-time
        document.getElementById('date-time').innerHTML = dateTime;
    }, 1000);

</script>

@endpush
