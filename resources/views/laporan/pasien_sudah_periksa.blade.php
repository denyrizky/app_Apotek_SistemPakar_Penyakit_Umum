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

                    <p>Tentukan tanggal awal dan akhir transaksi atau cetak semua.</p>

                    <a class="btn btn-primary btn-s" href="{{ url('cetakPasienSudah') }}" target="_blank">CETAK SEMUA</a>
                    <a class="btn btn-info btn-s cetakBerdasarTglPasienSudah" href="#" target="_blank">CETAK BERDASAR TANGGAL</a><br/>
                    <span>Tanggal Awal</span>
                    <input type="date" class="form-control" id="tglAwalPasienSudah">
                    <span>Tanggal Akhir</span>
                    <input type="date" class="form-control" id="tglAkhirPasienSudah">
                    

                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Pasien Sudah Di Periksa</h2>
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
                        <th>No Pendaftaran</th>
                        <th>Tanggal</th>
                        <th>No Urut</th>
                        <th>No Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Alamat</th>
                      </tr>
                    </thead>
                    <tbody id="showPasienSudahHeree">
                      <?php
                        foreach ($dataPasien as $key => $value) {
                          ?>
                            <tr>
                              <td>{{ $value->NoPendaftaran }}</td>
                              <td>{{ $value->tglPendaftaran }}</td>
                              <td>{{ $value->noUrut }}</td>
                              <td>{{ $value->NoPasien }}</td>
                              <td>{{ $value->namaPas }}</td>
                              <td>{{ $value->almPas }}</td>
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


