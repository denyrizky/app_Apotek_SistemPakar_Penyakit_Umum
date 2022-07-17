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
                    <h2>Pegawai <small>Data</small></h2>
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
                    <p class="text-muted font-13 m-b-30" id="keteranganDataPegawai">
                      Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.
                    </p>
                    
                    <table class="table table-bordered" hidden="true" id="tableAddPegawai">

                      <thead>
                        <tr>
                          <th></th>
                          <th>Nama Pegawai</th>
                          <th>Alamat</th>
                          <th>Telp</th>
                          <th>Tgl Lahir</th>
                          <th>Jenis Kelamin</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <form action="{{ url('pegawai/simpan') }}" method="POST" id="formADDPegawai">
                          {{ csrf_field() }}
                        <tr id="tableADDPegawai">
                          <td style="width: 110px;">
                              <button type="button" class="btn btn-success btn-s savePegawai"><i class="fa fa-check"></i></button>
                              <button type="button" class="btn btn-warning btn-s cancelPegawai"><i class="fa fa-close"></i></button>
                          </td>
                          <td><input type="text" name="nama_Pegawai" class="form-control" placeholder="Nama pegawai" id="nama_Pegawai"></td>
                          <td><input type="text" name="alamat_Pegawai" class="form-control" placeholder="Alamat pegawai" id="alamat_Pegawai"></td>
                          <td><input type="text" name="telp_Pegawai" class="form-control" placeholder="Telp pegawai" id="telp_Pegawai"></td>
                          <td><input type="date" name="tglLahir_Pegawai" class="form-control" id="tglLahir_Pegawai"></td>
                          <td>
                            <select name="jenisKel_Pegawai" id="jenisKel_Pegawai" class="form-control">
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                          </td>
                        </tr>
                        </form>

                      </tbody>

                    </table>
                    
                    <hr>
                    <form action="{{ url('pegawai/edit') }}" method="POST" id="formEditPegawai">
                          {{ csrf_field() }}
                    <table id="dataPegawai" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th colspan="9">
                            <button type="button" class="btn btn-success btn-s addPegawai"><i class="fa fa-plus"></i></button> Tambah Pegawai
                          </th>
                        </tr>
                        

                        <tr>
                          <th class="holderToolPegawai"></th>
                          <th>NIP</th>
                          <th>Nama Pegawai</th>
                          <th>Alamat</th>
                          <th>Telp</th>
                          <th>Tgl Lahir</th>
                          <th>Jenis Kelamin</th>
                        </tr>
                        
                      </thead>
                
                      <tbody id="showPegawai">
                         
                         <?php
                            foreach ($Listpegawai as $key => $value) {
                              ?>
                                <tr>
                                  <td style="width: 100px;" class="toolPegawai">
                                    <button type="button" class="btn btn-info btn-s editPegawai"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-s deletePegawai"><i class="fa fa-trash"></i></button>
                                  </td>
                                  <td>{{ $value->NIP }}</td>
                                  <td>{{ $value->namaPeg }}</td>
                                  <td>{{ $value->almPeg }}</td>
                                  <td>{{ $value->telpPeg }}</td>
                                  <td>{{ $value->tglLahirPeg }}</td>
                                  <td>{{ $value->jnsKelPeg }}</td>
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


