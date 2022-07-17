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
              
              <div class="row" id="formAddDokter" hidden="true">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 id="judulFormDokter">Form Pendaftaran Dokter <small>CREATE</small></h2>
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

                    <form class="form-horizontal form-label-left" id="formNambahDokter" action="{{ url('dokter/simpan') }}" method="POST" novalidate>
                      {{ csrf_field() }}
                      <p>Isi semua data data dokter dibawah ini. Lalu tekan submit untuk memperoses.</a>
                      </p>
                      <span class="section">Personal Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Dokter <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_dokter" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama_dokter" placeholder="Nama Lengkap" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat_dokter">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="alamat_dokter" required="required" name="alamat_dokter" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenisKelDokter">Jenis Kelamin <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="jenisKelDokter" name="jenisKelDokter" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="">-</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel_dokter">Telephone Dokter<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="tel_dokter" name="tel_dokter" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="poliDokter">Poliklinik <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="poliDokter" name="poliDokter" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="">-</option>
                            <?php
                            $data = \App\modelMaster::getAllDataPoli();
                            foreach ($data as $key => $value) {
                              ?>
                                <option value="{{ $value->KodePoli }}">{{ $value->namaPoli }}</option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-primary" id="batalkanDokter">Cancel</button>
                          <button id="simpanDokter" type="button" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                
                <div class="showTooltips">
                  
                </div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dokter <small>Data</small></h2>
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
                    <p class="text-muted font-13 m-b-30" id="keteranganDataPasien">
                      Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.
                    </p>
                    
                  
                    <table id="dataDokter" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th colspan="9">
                            <button type="button" class="btn btn-success btn-s addDokter"><i class="fa fa-plus"></i></button> Tambah Dokter
                          </th>
                        </tr>
                        

                        <tr>
                          <th>&nbsp;</th>
                          <th>Kode Dokter</th>
                          <th>Nama Dokter</th>
                          <th>Alamat</th>
                          <th>Jenis Kelamin</th>
                          <th>Telp</th>
                          <th>Kode Poliklinik</th>
                        </tr>
                        
                      </thead>
                
                      <tbody id="showDokter">
                        
                        <?php
                          foreach ($showDokter as $key => $value) {
                            ?>
                              <tr>
                                <td>
                                  <center>
                                  <button type="button" class="btn btn-info btn-s editDokter" data-toggle="modal" data-target=".modal_editDokter"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-warning btn-s deleteDokter" data-toggle="modal" data-target=".modal_deleteDokter"><i class="fa fa-trash"></i></button>
                                  </center>
                                </td>
                                <td>{{ $value->KodeDokter }}</td>
                                <td>{{ $value->nmDokter }}</td>
                                <td>{{ $value->almDokter }}</td>
                                <td>{{ $value->jnsKelDokter }}</td>
                                <td>{{ $value->telpDokter }}</td>
                                <td>{{ $value->KodePoli }}</td>
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


                  <div class="modal fade modal_editDokter" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Edit Data Dokter</h4>
                        </div>
                        <div class="modal-body">
                          <p>
                            <form class="form-horizontal form-label-left" id="formEditDokter" action="{{ url('dokter/edit') }}" method="POST" novalidate>
                              {{ csrf_field() }}
                              <span class="section">Personal Info</span>
                              <input type="hidden" name="edit_kode_dokter" id="edit_kode_dokter">
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_nama_dokter">Nama Dokter <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="edit_nama_dokter" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="edit_nama_dokter" placeholder="Nama Lengkap" required="required" type="text">
                                </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_alamat_dokter">Alamat <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <textarea id="edit_alamat_dokter" required="required" name="edit_alamat_dokter" class="form-control col-md-7 col-xs-12"></textarea>
                                </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_jenisKelDokter">Jenis Kelamin <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select id="edit_jenisKelDokter" name="edit_jenisKelDokter" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="">-</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                  </select>
                                </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_tel_dokter">Telephone Dokter<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="tel" id="edit_tel_dokter" name="edit_tel_dokter" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                              <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_poliDokter">Poliklinik <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="edit_poliDokter" name="edit_poliDokter" required="required" class="form-control col-md-7 col-xs-12">
                                  <option value="">-</option>
                                  <?php
                                  $data = \App\modelMaster::getAllDataPoli();
                                  foreach ($data as $key => $value) {
                                    ?>
                                      <option value="{{ $value->KodePoli }}">{{ $value->namaPoli }}</option>
                                    <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                             
                          
                            </form>
                          </p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" id="simpanEditanDokter" data-dismiss="modal">Save changes</button>
                        </div>

                      </div>
                    </div>
                  </div>




                  <div class="modal fade modal_deleteDokter" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <form action="{{ url('dokter/delete') }}" method="post" id="formDeleteDokter">
                          {{ csrf_field() }}
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Delete Data</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Kode Dokter : <i class="showKodeDokter"></i></h4>
                          <input type="hidden" name="delete_kodeDokter" id="delete_kodeDokter">
                          <p>Yakin akan di hapus ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal" id="executeDeleteDataDokter">Ya</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
      



@endsection


