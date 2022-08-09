@extends('layouts.app')

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

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-12 my-3">
        <div class="card border  shadow p-2 mb-5 bg-body rounded">
          <div class="card-body">
            <div class="mb-4">
              <h4 class="d-inline">Data Siswa/i
            </div>
            <div class="">
              <div class="row">
                @if (Auth::user()->images == null)
                <div class="col-5"><img src="{{ $images }}" style="width:150px;height: 200px;">
                @endif
                @if (Auth::user()->images != null)
                <div class="col-5"><img src="{{ asset('storage/profile/' . Auth::user()->images) }}" style="width:150px;height: 200px;">
                @endif
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                  <div class="table-responsive" style="font-size:12px">
                    <table class="">
                      <tr>
                        <td>Nama Lengkap</td>
                        <td class="px-2">:</td>
                        <td>{{ $data->name }}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td class="px-2">:</td>
                        <td>{{ $data->email }}</td>
                      </tr>
                      <tr>
                        <td>NIS</td>
                        <td class="px-2">:</td>
                        <td>{{ $data->nis }}</td>
                      </tr>
                      <tr>
                        <td>Kelas</td>
                        <td class="px-2">:</td>
                        <td>{{ $data->kelas }}</td>
                      </tr>
                      <tr>
                        <td>Jurusan</td>
                        <td class="px-2">:</td>
                        <td>{{ $data->jurusan . " " . $data->jurusan_berapa }}</td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir</td>
                        <td class="px-2">:</td>
                        <td>{{ $data->tgl_lahir }}</td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td class="px-2">:</td>
                        <td>{{ $data->jk }}</td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td class="px-2">:</td>
                        <td>{{ $data->alamat }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-5 col-sm-12 my-3">
        <div class="card border shadow p-2 mb-5 bg-body rounded">
          <div class="card-body">
            <div class="mb-4">
              <h4 class="d-inline ">Rekap Absen
            </div>
            <div class="">
              <div class="row">
                <div class="col-4">
                  <div class="row">
                    <div class="col-12">
                      <div class="row">
                        <div class="col-3">
                          <i class="bi bi-box-arrow-in-right fs-2"></i>
                        </div> <br>
                        <div class="col-9 ">
                          <span style="font-size: 10px " class="d-block">Total Hadir :</span>
                          <span class="fw-bold">{{ $totalHadir }}</span>
                          <span style="font-size: 11px">Hari</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-3">
                          <i class="bi bi-x-circle fs-2"></i>
                        </div>
                        <div class="col-9 ">
                          <span style="font-size: 10px" class="d-block">Total Alfa :</span>
                          <span class="fw-bold">{{ $totalAlfa }}</span>
                          <span style="font-size: 11px">Hari</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-4">
                  <div class="row">
                    <div class="col-12">
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-3">
                          <i class="bi bi-heart-pulse fs-2"></i>
                        </div>
                        <div class="col-9 ">
                          <span style="font-size: 10px" class="d-block">Total Sakit :</span>
                          <span class="fw-bold">{{ $totalSakit }}</span>
                          <span style="font-size: 11px">Hari</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-3">
                          <i class="bi bi-activity fs-2"></i>
                        </div>
                        <div class="col-9 ">
                          <span style="font-size: 10px" class="d-block">Total Izin :</span>
                          <span class="fw-bold">{{ $totalIzin }}</span>
                          <span style="font-size: 11px">Hari</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12 my-3">
        <div class="card border shadow p-2 mb-5 bg-body rounded">
          <div class="card-body">
            <div class="mb-4">
              <h4 class="d-inline ">Performa siswa
            </div>
            <div class="">
                <div class="" id="chart1">
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-12 my-3">
        <div class="card border shadow p-2 mb-5 bg-body rounded">
          <div class="card-body">
            <div class="mb-4">
              <h4 class="d-inline ">Performa siswa
            </div>
            <div class="">
                <div class="" id="chart2">
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-12 my-3">
        <div class="card border shadow p-2 mb-5 bg-body rounded">
          <div class="card-body">
            <div class="mb-4">
              <h4 class="d-inline ">Performa siswa
            </div>
            <div class="">
                <div class="" id="chart3">
                </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection

@push('js')
{{-- apex chart --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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

        var chart = new ApexCharts(document.querySelector("#chart1"), options);
        chart.render();

        // chart 2 ======================================
        var options = {
        series: [
            parseInt({{ $persentaseHadir }}),
            parseInt({{ $persentaseSakit }}),
            parseInt({{ $persentaseIzin }}),
            parseInt({{ $persentaseAlfa }})
        ],
        chart: {
        type: 'donut',
        },
        labels: ['Hadir', 'Sakit', 'Izin', 'Alfa'],
        responsive: [{
        breakpoint: 480,
        options: {
            chart: {
            width: 200
            },
            legend: {
            position: 'bottom'
            }
        }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart2"), options);
        chart.render();

        // chart 3 ======================================
    var options = {
        series: [
            parseInt({{ $persentaseHadir }}),
            parseInt({{ $persentaseSakit }}),
            parseInt({{ $persentaseIzin }}),
            parseInt({{ $persentaseAlfa }})
        ],
        chart: {
        height: 350,
        type: 'radialBar',
        },
        plotOptions: {
        radialBar: {
            dataLabels: {
            name: {
                fontSize: '22px',
            },
            value: {
                fontSize: '16px',
            },
            total: {
                show: true,
                label: 'Total',
                formatter: function (w) {
                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                return {{ $persentaseHadir }} + {{ $persentaseSakit }} + {{ $persentaseIzin }}
                }
            }
            }
        }
        },
        labels: ['Hadir', 'Sakit', 'Izin', 'Alfa'],
        };

        var chart = new ApexCharts(document.querySelector("#chart3"), options);
        chart.render();
</script>
@endpush
