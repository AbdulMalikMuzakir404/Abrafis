@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-12 my-3">
        <div class="card border  shadow p-2 mb-5 bg-body rounded">
          <div class="card-body">
            <div class="mb-4">
              <h4 class="d-inline">Data Siswa/i
            </div>
            <div class="">
              <div class="row">
                <div class="col-5"><img src="/assets/img/3x4.png" style="width:150px;;height: 200px;">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-2">
                  <div class="table-responsive" style="font-size:12px">
                    <table class="">
                      <tr>
                        <td>Nama Lengkap</td>
                        <td class="px-2">:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Nickname</td>
                        <td class="px-2">:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir</td>
                        <td class="px-2">:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir</td>
                        <td class="px-2">:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td class="px-2">:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>NIK</td>
                        <td class="px-2">:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Jabatan</td>
                        <td class="px-2">:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Menikah</td>
                        <td class="px-2">:</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Pendidikan Terakhir</td>
                        <td class="px-2">:</td>
                        <td></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 my-3">
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
                          <span class="fw-bold"></span>
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
                          <span class="fw-bold"></span>
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
                          <span class="fw-bold"></span>
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
                          <span class="fw-bold"></span>
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
    </div>
  </div>
@endsection
