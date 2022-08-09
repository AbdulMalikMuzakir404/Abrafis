<div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="bi bi-box-arrow-in-right"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Siswa Masuk Hari Ini</span>
              <span class="info-box-number">{{ $dataHadir }}<strong> orang</strong></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="bi bi-heart-pulse"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Siswa Sakit Hari Ini</span>
              <span class="info-box-number">{{ $dataSakit }}<strong> orang</strong></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="bi bi-activity"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Siswa Izin Hari Ini</span>
              <span class="info-box-number">{{ $dataIzin }}<strong> orang</strong></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="bi bi-x-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Siswa Alfa Hari Ini</span>
              <span class="info-box-number">{{ $dataAlfa }}<strong> orang</strong></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="col-12 col-sm-6 col-md-12">
          <div class="info-box">

            <div class="info-box-content">
                <div class="" id="adminchart1"></div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="col-11 col-sm-6 col-md-6">
          <div class="info-box">

            <div class="info-box-content">
                <div class="" id="adminchart2"></div>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-11 col-sm-6 col-md-6">
            <div class="info-box">

              <div class="info-box-content" style="height: 386px;">
                  <div class="" id="adminchart3"></div>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        <!-- /.col -->
      </div>
</div>


@push('js')
    {{-- apex chart --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        // ==============================================================================
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
        max: {{ $persenUser }}
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

        var chart = new ApexCharts(document.querySelector("#adminchart1"), options);
        chart.render();


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

        var chart = new ApexCharts(document.querySelector("#adminchart2"), options);
        chart.render();


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

        var chart = new ApexCharts(document.querySelector("#adminchart3"), options);
        chart.render();
    </script>
@endpush
