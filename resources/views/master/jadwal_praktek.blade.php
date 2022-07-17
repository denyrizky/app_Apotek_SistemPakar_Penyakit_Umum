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
                <h3>Data <small>CRUD</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                
                <div class="showTooltips">
                  
                </div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jadwal Praktek <small>Data</small></h2>
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
                    <p class="text-muted font-13 m-b-30" id="keteranganDataJadwal_praktek">
                      Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.
                    </p>
                    
                    <table class="table table-bordered" hidden="true" id="tableAddJadwal_praktek">

                      <thead>
                        <tr>
                          <th></th>
                          <th>Hari</th>
                          <th>Jam Mulai</th>
                          <th>Jam Selesai</th>
                          <th>Dokter</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <form action="{{ url('jadwal_praktek/simpan') }}" method="POST" id="formADDJadwal_praktek">
                          {{ csrf_field() }}
                        <tr id="tableADDJadwal_praktek">
                          <td style="width: 110px;">
                              <button type="button" class="btn btn-success btn-s saveJadwal_praktek"><i class="fa fa-check"></i></button>
                              <button type="button" class="btn btn-warning btn-s cancelJadwal_praktek"><i class="fa fa-close"></i></button>
                          </td>
                          <td>
                            <select name="hari" id="hari" class="form-control">
                              <option value=""></option>
                              <option value="Senin">Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jumat">Jumat</option>
                              <option value="Sabtu">Sabtu</option>
                              <option value="Minggu">Minggu</option>
                            </select>
                          </td>
                          <td><input type="time" name="jam_mulai" class="form-control" id="jam_mulai"></td>
                          <td><input type="time" name="jam_selesai" class="form-control" id="jam_selesai"></td>
                          <td>
                            <select name="kodeDokter" id="kodeDokter" class="form-control">
                              <option value=""></option>
                              <?php
                              $data = \App\modelMaster::getListDokter();
                                foreach ($data as $key => $value) {
                                  ?>
                                    <option value="{{ $value->KodeDokter }}">{{ $value->nmDokter }}</option>
                                  <?php
                                }
                              ?>
                            </select>
                          </td>
                          
                        </tr>
                        </form>

                      </tbody>

                    </table>
                    
                    <hr>
                    <form action="{{ url('jadwal_praktek/edit') }}" method="POST" id="formEditJadwal_praktek">
                          {{ csrf_field() }}
                    <table id="dataJadwal_praktek" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th colspan="9">
                            <button type="button" class="btn btn-success btn-s addJadwal_praktek"><i class="fa fa-plus"></i></button> Tambah Jadwal Praktek
                          </th>
                        </tr>
                        

                        <tr>
                          <th class="holderToolJadwal_praktek"></th>
                          <th>Kode Jadwal</th>
                          <th>Hari</th>
                          <th>Jam Mulai</th>
                          <th>Jam Selesai</th>
                          <th>Kode Dokter</th>
                        </tr>
                        
                      </thead>
                
                      <tbody id="showJadwal_praktek">
                         
                         <?php
                            foreach ($Listjadwalpraktek as $key => $value) {
                              ?>
                                <tr>
                                  <td style="width: 100px;" class="toolJadwal_praktek">
                                    <button type="button" class="btn btn-info btn-s editJadwal_praktek"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-s deleteJadwal_praktek"><i class="fa fa-trash"></i></button>
                                  </td>
                                  <td>{{ $value->KodeJadwal }}</td>
                                  <td>{{ $value->hari }}</td>
                                  <td>{{ $value->jamMulai }}</td>
                                  <td>{{ $value->jamSelesai }}</td>
                                  <td>{{ $value->KodeDokter }}</td>
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
</form>


@endsection


