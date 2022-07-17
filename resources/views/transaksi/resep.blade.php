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
                <h3>Transaksi <small>Resep</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List Data Pemeriksaan</h2>
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

                    <p>Tekan <i>Cek</i> untuk melihat resep dan keterangan.</p>

                    <!-- start project list -->
                    <table class="table table-bordered" id="tableListPemeriksaan">
                      <thead>
                        <th>No Pemeriksaan</th>
                        <th>No Pendaftaran</th>
                        <th>No Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Alat</th>
                      </thead>
                      <tbody id="showListPemeriksaan">
                        <?php
                          foreach ($listPemeriksaan as $key => $value) {
                            ?>
                              <tr>
                                <td>{{ $value->NoPemeriksaan }}</td>
                                <td>{{ $value->NoPendaftaran }}</td>
                                <td>{{ $value->NoPasien }}</td>
                                <td>{{ $value->namaPas }}</td>
                                <td>
                                  <center>
                                    <button type="button" class="btn btn-primary btn-xs pilihPemeriksaan"><i class="fa fa-check"></i> Cek </button>
                                  </center>
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
                
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Resep</h2>
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
                  
                  <ul class="list-unstyled msg_list" id="listResepObat">

                    
                    
                  </ul>
      
                  </div>
                </div>

              </div>

              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Keterangan</h2>
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
                  <center><i>Keterangan Pasien</i></center>
                  <table class="table table-stripped">
                    <tr>
                      <td>No Pasien : <b id="noPasienKet"></b></td>
                    </tr>
                    <tr>
                      <td>Nama Pasien : <b id="naPasKet"></b></td>
                    </tr>
                    <tr>
                      <td>Alamat Pasien : <b id="alPasKet"></b></td>
                    </tr>
                    <tr>
                      <td>Telp Pasien : <b id="tePasKet"></b></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir Pasien : <b id="tglPasKet"></b></td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin Pasien : <b id="jkPasKet"></b></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>

                  <center><i>Keterangan Pemeriksaan</i></center>
                  <table class="table table-stripped">
                    <tr>
                      <td>No Pendaftaran : <b id="noPenKet"></b></td>
                    </tr>
                    <tr>
                      <td>No Pemeriksaan : <b id="noPerKet"></b></td>
                    </tr>
                    <tr>
                      <td>Keluhan : <b id="keluKet"></b></td>
                    </tr>
                    <tr>
                      <td>Diagnosa : <b id="diagKet"></b></td>
                    </tr>
                    <tr>
                      <td>Perawatan : <b id="perKet"></b></td>
                    </tr>
                    <tr>
                      <td>Tindakan : <b id="tinKet"></b></td>
                    </tr>
                    <tr>
                      <td>Berat Badan : <b id="berKet"></b></td>
                    </tr>
                    <tr>
                      <td>Tensi Diastolik : <b id="tensiDiaKet"></b></td>
                    </tr>
                    <tr>
                      <td>Tensi Sistolik : <b id="tensiSisKet"></b></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>

                  <center><i>Keterangan Biaya</i></center>
                  <table class="table table-stripped">
                    <tr>
                      <td>Total Bayar Pemeriksaan : Rp. <b id="TotalBayarPemeriksaan"></b></td>
                    </tr>
                    <tr>
                      <td>Total Bayar Obat : Rp. <b id="TotalBayarObat"></b></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><i>SubTotal : Rp. <b id="subTotalBayar"></b></i></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr id="munculTombol">
                      
                    </tr>
                  </table>
  
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>

        <div class="modal fade modal_konfirmasiResep" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                       
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Konfirmasi Transaksi</h4>
                        </div>
                        <div class="modal-body">
                          <h4><center>Yakin ? </center></h4>
                          
                          <p>
                          <center>
                            <button type="button" class="btn btn-success simpanDataResep" data-dismiss="modal">Ya</button>
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


