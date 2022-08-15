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


    @can('user')
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
                    <img src="{{ asset('images/image/images1.jpg') }}" class="w-100">
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
                        <span>{{ $listHari[$haris] }}, {{ date('d')}} {{ date('F') }} {{ date('Y') }}</span><span><span class="float-end px-3" id="date-time"></span><span class="">{{ __('WIB') }}</span></span>
                    </div><br>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <div id="routing" class="card-body" style="height: 445px;"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-start">
              <div class="col-md-3">
                    <div class="card border shadow p-2 mb-5 bg-body rounded">
                        <div class="card-body">
                            <i class="bi bi-box-arrow-in-right"></i> Jam Masuk<br><strong class="px-3">07.00 WIB</strong>
                        </div>
                    </div>
              </div>
              <div class="col-md-3">
                    <div class="card border shadow p-2 mb-5 bg-body rounded">
                        <div class="card-body">
                            <i class="bi bi-box-arrow-right"></i> Jam Pulang<br><strong class="px-3">15.00 WIB</strong>
                        </div>
                    </div>
              </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <h1 class="display-6">Hadir</h1><br><h1 class="display-3">{{ $totalHadir }}<p class="lead">Kali</p></h1> <br>Selama bulan {{ date('F') }}
                </div>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a onclick="cek();" href="{{ route('hadir') }}"
                    class="btn btn-outline-primary">Hadir</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <h1 class="display-6">Sakit</h1><br><h1 class="display-3">{{ $totalSakit }}<p class="lead">Kali</p></h1> <br>Selama bulan {{ date('F') }}
                </div>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="{{ route('sakit') }}"
                    onclick="event.preventDefault();
                    document.getElementById('sakit-form').submit();"
                    class="btn btn-outline-primary">Sakit</a>
                    <form id="sakit-form" action="{{ route('sakit') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a href="{{ route("suratsakit") }}" class="btn btn-outline-info">PDF</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <h1 class="display-6">Izin</h1><br><h1 class="display-3">{{ $totalIzin }}<p class="lead">Kali</p></h1> <br>Selama bulan {{ date('F') }}
                </div>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    <a href="{{ route('izin') }}"
                    onclick="event.preventDefault();
                    document.getElementById('izin-form').submit();"
                    class="btn btn-outline-primary">Izin</a>
                    <form id="izin-form" action="{{ route('izin') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a href="{{ route("suratizin") }}" class="btn btn-outline-info">PDF</a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
                <div class="card-body">
                    <h1 class="display-6">Alfa</h1><br><h1 class="display-3">{{ $totalAlfa }}<p class="lead">Kali</p></h1> <br>Selama bulan {{ date('F') }}
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 my-3">
            <div class="card border shadow p-2 mb-5 bg-body rounded">
              <div class="card-body">
                <div class="mb-4">
                  <h4 class="d-inline ">Statistik
                </div>
                <div class="">
                    <div class="" id="chart">
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endcan

@can('admin')
<livewire:home-admin></livewire:home-admin>
@endcan
@endsection


@push("js")

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

{{-- apex chart --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script>
    // script getlatlng
    function cek()
    {
        if(navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(function(position){
                let lat = position.coords.latitude;
                let long = position.coords.longitude;

                // script ukur jarak antara 2 titik kordinat
                getDistanceFromLatLonInKm(-7.0108599, 107.5477708,lat,long).toFixed(1);

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

                // kondisi dimana ketika siswa berada diluar zona maka akan di direct ke home
                if(d >= 100)
                {
                    window.location = '{{ route("home")}}';
                }

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


    // script getlatlng
    getLocation();

    setInterval(() => {
        getLocation()
    }, 3000)

    function getLocation()
    {
        if(navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(function(position){
                let lat = position.coords.latitude;
                let long = position.coords.longitude;

                var routing = L.map('routing').setView([lat, long], 13);

                var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(routing);

                L.Routing.control({
                waypoints: [
                    L.latLng([lat, long]),
                    L.latLng(-7.0108599, 107.5477708)
                ]
                }).addTo(routing);


                // =============================================================================

                var map = L.map('map').setView([lat, long], 13);

                var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                var marker = L.marker([lat, long]).addTo(map).bindPopup('you location');

                var circle = L.circle([-7.0108599, 107.5477708], {
                color: 'blue',
                fillColor: '#0000FF',
                fillOpacity: 0.5,
                radius: 100
                }).addTo(map).bindPopup('Zona Absen');

                var polygon = L.polygon([
                    [lat, long],
                    [-7.0108599, 107.5477708]
                ]).addTo(map).bindPopup('Line');

                var popup = L.popup()
                    .setLatLng([-7.0108599, 107.5477708])

                function onMapClick(e) {
                    popup
                        .setLatLng(e.latlng)
                        .setContent(e.latlng.toString())
                        .openOn(map);
                }

                map.on('click', onMapClick);

                window.onload=document.getElementById("lat");
                let latitude = document.getElementById("lat");
                latitude.value = lat;

                window.onload=document.getElementById("lng");
                let longitude = document.getElementById("lng");
                longitude.value = long;

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

<script>
    var options = {
          series: [{
          name: 'Hadir',
          type: 'column',
          data: [
            parseInt({{ $totalHadirJ }}),
            parseInt({{ $totalHadirF }}),
            parseInt({{ $totalHadirMR }}),
            parseInt({{ $totalHadirAP }}),
            parseInt({{ $totalHadirMY }}),
            parseInt({{ $totalHadirJN }}),
            parseInt({{ $totalHadirJL }}),
            parseInt({{ $totalHadirAG }}),
            parseInt({{ $totalHadirS }}),
            parseInt({{ $totalHadirO }}),
            parseInt({{ $totalHadirN }}),
            parseInt({{ $totalHadirD }})
          ]
        }, {
          name: 'Alfa',
          type: 'line',
          data: [
            parseInt({{ $totalAlfaJ }}),
            parseInt({{ $totalAlfaF }}),
            parseInt({{ $totalAlfaMR }}),
            parseInt({{ $totalAlfaAP }}),
            parseInt({{ $totalAlfaMY }}),
            parseInt({{ $totalAlfaJN }}),
            parseInt({{ $totalAlfaJL }}),
            parseInt({{ $totalAlfaAG }}),
            parseInt({{ $totalAlfaS }}),
            parseInt({{ $totalAlfaO }}),
            parseInt({{ $totalAlfaN }}),
            parseInt({{ $totalAlfaD }})
          ]
        },],
        chart: {
        height: 350,
        type: 'line',
        stacked: false,
        },
        stroke: {
        width: [0, 2, 5]
        },
        title: {
          text: 'Data Absen Siswa Tahun ajaran 2021-2022'
        },
        plotOptions: {
        bar: {
            columnWidth: '50%'
        }
        },

        fill: {
        opacity: [0.85, 0.25, 1],
        gradient: {
            inverseColors: false,
            shade: 'light',
            type: "vertical",
            opacityFrom: 0.85,
            opacityTo: 0.55,
            stops: [0, 100, 100, 100]
        }
        },
        dataLabels: {
          enabled: true,
          enabledOnSeries: [1]
        },
        labels: ['01 Jan 2022', '02 Jan 2022', '03 Jan 2022', '04 Jan 2022', '05 Jan 2022', '06 Jan 2022', '07 Jan 2022', '08 Jan 2022', '09 Jan 2022', '10 Jan 2022', '11 Jan 2022', '12 Jan 2022'],
        markers: {
        size: 0
        },
        xaxis: {
        type: 'datetime'
        },
        yaxis: {
        title: {
            text: 'Points',
        },
        max: 31
        },
        tooltip: {
        shared: true,
        intersect: false,
        y: {
            formatter: function (y) {
            if (typeof y !== "undefined") {
                return y.toFixed(0) + " points";
            }
            return y;

            }
        }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
</script>

@endpush
