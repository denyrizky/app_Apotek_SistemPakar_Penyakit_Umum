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
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              Data Penyakit Berhasil Diubah
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            @endif
              <div class="row" id="formAddPenyakit" hidden="true">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 id="judulFormPenyakit">Form Pendaftaran Penyakit <small>CREATE</small></h2>
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
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> -->
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" id="formNambahPenyakit" action="{{ url('penyakit/simpan') }}" method="POST" novalidate>
                      {{ csrf_field() }}
                      <p>Isi semua data data penyakit dibawah ini. Lalu tekan submit untuk memperoses.</a>
                      </p>
                      <span class="section">Personal Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Penyakit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_penyakit" class="form-control col-md-7 col-xs-12" name="nama_penyakit" placeholder="Nama Penyakit" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat_penyakit">Informasi Penyakit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="alamat_penyakit" required="required" name="alamat_penyakit" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenisKelPenyakit">Solusi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="jenisKelPenyakit" required="required" name="jenisKelPenyakit" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel_penyakit">Gejala<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div style="overflow: scroll; height: 467px;">
                                <?php
                                    foreach ($DataDiagnosa as $key => $d) {
                                ?>
                                <div class="input-group md-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <ul id="cek">
                                            <li>
                                              <input type="checkbox" aria-label="Checkbox for following text input" value="{{ $d->kode }}" name="isi[]">
                                              <label for="checkbox">{{ $d->gejala }}</label>
                                            </li>
                                          </ul>
                                        </div>
                                        <!-- <input type="text" class="form-control" aria-label="Text input with checkbox" value="{{ $d->gejala }}"> -->
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="button" class="btn btn-primary" id="batalkanPenyakit">Cancel</button>
                          <button id="simpanPenyakit" type="button" class="btn btn-success">Submit</button>
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
                    <h2>Penyakit <small>Data</small></h2>
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
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> -->
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30" id="keteranganDataPasien">
                      Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.
                    </p>
                    
                  
                    <table id="dataPenyakit" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th colspan="9">
                            <button type="button" class="btn btn-success btn-s addPenyakit"><i class="fa fa-plus"></i></button> Tambah Penyakit
                          </th>
                        </tr>
                        

                        <tr>
                          <th>&nbsp;</th>
                          <th>Kode Penyakit</th>
                          <th style="width:120px;">Nama Penyakit</th>
                          <th style="width:320px;">Informasi Penyakit</th>
                          <th>Solusi Penyakit</th>
                          <th>Kode Gejala</th>
                        </tr>
                        
                      </thead>
                
                      <tbody id="showPenyakit">
                        
                        <?php
                        
                        
                          foreach ($penyakit as $key => $value) {
                            $gejala = '';
                            $bom = explode(",",$value->gejala);
                            foreach ($bom as $gj){
                                $getgejala = \App\modelMaster::cariDataDiagnosa($gj);
                                if(null !== $getgejala){
                                    $gejala .= '-'.$getgejala->gejala.'<br>';
                                    
                                }
                            }
                            ?>
                              <tr>
                                <td>
                                  <center>
                                  <a type="button" class="btn btn-info btn-s" href="{{ url('master/penyakit',$id=$value->id) }}"><i class="fa fa-edit"></i></a> <button type="button" class="btn btn-danger btn-s deletePenyakit" data-toggle="modal" data-target=".modal_deletePenyakit"><i class="fa fa-trash"></i></button>
                                  </center>
                                </td>
                                <td>{{ $value->kode_pen }}</td>
                                <td>{{ $value->penyakit }}</td>
                                <td style="text-align: justify;">{{ $value->info }}</td>
                                <td style="text-align: justify;">{{ $value->solusi }}</td>
                                <td>{!! $gejala !!}</td>
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

                  <div class="modal fade modal_deletePenyakit" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <form action="{{ url('penyakit/delete') }}" method="post" id="formDeletePenyakit">
                          {{ csrf_field() }}
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Delete Data</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Kode Penyakit : <i class="showKodePenyakit"></i></h4>
                          <input type="hidden" name="delete_kodePenyakit" id="delete_kodePenyakit">
                          <p>Yakin akan di hapus ?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal" id="executeDeleteDataPenyakit">Ya</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
      



@endsection


