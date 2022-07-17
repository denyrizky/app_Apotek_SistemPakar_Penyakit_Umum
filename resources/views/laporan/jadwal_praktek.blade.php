@extends('templates/header')
@section('content')
<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            @include('templates/navigation')


<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Laporan <small>Create</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Filter Cetak</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Pilih hari praktek atau cetak semua.</p>

                    <a class="btn btn-primary btn-s" href="{{ url('cetakJadwal') }}" target="_blank">CETAK SEMUA</a>
                    <a class="btn btn-info btn-s cetakFilterJadwal" href="#" target="_blank">CETAK BERDASAR HARI</a>
                    <select class="form-control filterJadwal">
                      <option value="">-</option>
                      <option value="Senin">Senin</option>
                      <option value="Selasa">Selasa</option>
                      <option value="Rabu">Rabu</option>
                      <option value="Kamis">Kamis</option>
                      <option value="Jumat">Jumat</option>
                      <option value="Sabtu">Sabtu</option>
                      <option value="Minggu">Minggu</option>
                    </select>

                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Jadwal Praktek</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                  <table class="table table-stripped">
                    <thead>
                      <tr>
                        <th>Kode Jadwal</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Kode Dokter</th>
                        <th>Nama Dokter</th>
                      </tr>
                    </thead>
                    <tbody id="showJadwalPraktekHeree">
                      <?php
                      foreach ($dataPraktek as $key => $value) {
                        ?>
                            <tr>
                              <td>{{ $value->KodeJadwal }}</td>
                              <td>{{ $value->hari }}</td>
                              <td>{{ $value->jamMulai }}</td>
                              <td>{{ $value->jamSelesai }}</td>
                              <td>{{ $value->KodeDokter }}</td>
                              <td>{{ $value->nmDokter }}</td>
                            </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>
  
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>


@endsection


