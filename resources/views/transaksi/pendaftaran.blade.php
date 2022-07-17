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
                <h3>Transaksi <small>Create</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List Pasien Yang Sudah Daftar</h2>
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

                    <p>Tekan Pilih untuk menambahkan data ke table di samping.</p>

                    <!-- start project list -->
                    <table class="table table-striped projects" id="tablePasienDaftar">
                      <thead>
                        <tr>
                          <th style="width: 1%">No Pendaftaran</th>
                          <th style="width: 20%">Tgl Pendaftaran</th>
                          <th>No Urut</th>
                          <th>No Pasien</th>
                          <th>Nama Pasien</th>
                          <th style="width: 20%">Alat</th>
                        </tr>
                      </thead>
                      <tbody id="showPasienDaftar">
                        <?php
                          foreach ($getDataPendaftaran as $key => $value) {
                            ?>
                              <tr>
                                <td>{{ $value->NoPendaftaran }}</td>
                                <td>{{ $value->tglPendaftaran }}</td>
                                <td>{{ $value->noUrut }}</td>
                                <td>{{ $value->NoPasien }}</td>
                                <td>{{ $value->namaPas }}</td>
                                <td>
                                  <button type="button" class="btn btn-primary btn-xs pilihPendaftaran"><i class="fa fa-check"></i> Pilih </button>
                                </td>
                              </tr>
                            <?php
                          }
                        ?>
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tentukan Dokter</h2>
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
                  <form action="{{ url('pendaftaran/simpan') }}" method="POST" id="formPilihDokter">
                    {{ csrf_field() }}
                     <?php
                      date_default_timezone_set('Asia/Jakarta');
                      $now = date('D-m-Y');
                      $trim = substr($now, 0,3);

                      $hari = '';

                      if($trim == 'Mon'){
                        $hari = 'Senin';
                      }else if($trim == 'Tue'){
                        $hari = 'Selasa';
                      }else if($trim == 'Wed'){
                        $hari = 'Rabu';
                      }else if($trim == 'Thu'){
                        $hari = 'Kamis';
                      }else if($trim == 'Fri'){
                        $hari = 'Jumat';
                      }else if($trim == 'Sat'){
                        $hari = 'Sabtu';
                      }else if($trim == 'Sun'){
                        $hari = 'Minggu';
                      }
                     ?>
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target=".modal_konfirmasi"><i class="fa fa-save"></i> Proses </button>
                    <p>Cari Data Dokter Yang Di Inginkan sesuai jadwal Praktek. Lalu tekan Proses untuk memproses.</p>
                    <span><b>Pilih Dokter ( Dokter yang ada jadwal di hari <i><?php echo $hari ?></i> )</b></span>
                    <select name="pilihDokter" id="pilihDokter" class="form-control">
                      <option value="">-</option>
                      <?php
                        $data2 = \App\modelTransaksi::getAllDokterSameAsDay();
                        foreach ($data2 as $key => $value) {
                          ?>
                            <option value="{{ $value->KodeJadwal }}">{{ $value->nmDokter }}</option>
                          <?php
                        }
                      ?>
                    </select>
                    <hr>
                    <!-- start project list -->
                    <table class="table table-bordered projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">No Pendaftaran</th>
                          <th style="width: 20%">Tgl Pendaftaran</th>
                          <th>No Urut</th>
                          <th>No Pasien</th>
                          <th>Nama Pasien</th>
                          <th style="width: 20%">Alat</th>
                        </tr>
                      </thead>
                      <tbody id="appendPasienHere">
                        
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade modal_konfirmasi" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                       
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Konfirmasi Transaksi</h4>
                        </div>
                        <div class="modal-body">
                          <h4><center>Sudah Benar ? </center></h4>
                          
                          <p>
                          <center>
                            <button type="button" class="btn btn-success simpanPendaftaran" data-dismiss="modal">Ya</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                          </center>
                          </p>

                        </div>
                        <div class="modal-footer">
                          <small>KEFKA</small>
                        </div>
                     
                      </div>
                    </div>
                  </div>


@endsection


