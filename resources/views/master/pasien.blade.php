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
                    <h2>Pasien <small>Data</small></h2>
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
                    
                    <table class="table table-bordered" hidden="true" id="tableAddPasien">

                      <thead>
                        <tr>
                          <th></th>
                          <th>Nama Pasien</th>
                          <th>Alamat</th>
                          <th>Telp</th>
                          <th>Tgl Lahir</th>
                          <th>Jenis Kelamin</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <form action="{{ url('pasien/simpan') }}" method="POST" id="formADDPasien">
                          {{ csrf_field() }}
                        <tr id="tableADDPasien">
                          <td style="width: 110px;">
                              <button type="button" class="btn btn-success btn-s savePasien"><i class="fa fa-check"></i></button>
                              <button type="button" class="btn btn-warning btn-s cancelPasien"><i class="fa fa-close"></i></button>
                          </td>
                          <td><input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" id="nama_pasien"></td>
                          <td><input type="text" name="alamat_pasien" class="form-control" placeholder="Alamat Pasien" id="alamat_pasien"></td>
                          <td><input type="text" name="telp_pasien" class="form-control" placeholder="Telp Pasien" id="telp_pasien"></td>
                          <td><input type="date" name="tglLahir_pasien" class="form-control" id="tglLahir_pasien"></td>
                          <td>
                            <select name="jenisKel_pasien" id="jenisKel_pasien" class="form-control">
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                          </td>
                        </tr>
                        </form>

                      </tbody>

                    </table>
                    
                    <hr>
                    <table id="konfirmasi_daftar" class="table table-bordered" hidden="true">
                      <thead>
                        <tr style="text-align: center;">
                          <th colspan="2"><i class="fa fa-question-circle"></i> Input biasa atau sekalian di daftarkan ?</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="width: 50%"><center><button type="button" class="btn btn-success" style="width: 40%" id="executeDaftar">DAFTARKAN</button></center></td>
                          <td style="width: 50%"><center><button type="button" class="btn btn-info" style="width: 40%" id="executeBiasa">BIASA</button></center></td>
                          
                        </tr>
                      </tbody>
                    </table>
                    
                    <table id="konfirmasi_daftarPasien" class="table table-bordered" hidden="true">
                      <thead>
                        <tr style="text-align: center;">
                          <th colspan="2"><i class="fa fa-question-circle"></i> Daftarkan pasien dan cetak No Urut ? <b><i class="keteranganDaftar"></i></b></th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="width: 50%"><center><button type="button" class="btn btn-success" style="width: 40%" id="executeDaftarPasien">YA</button></center></td>
                          <td style="width: 50%"><center><button type="button" class="btn btn-info" style="width: 40%" id="tidakJadiDaftarPasien">TIDAK</button></center></td>
                          
                        </tr>
                      </tbody>
                    </table>

                    <hr>
                    <form action="{{ url('pasien/edit') }}" method="POST" id="formEditPasien">
                          {{ csrf_field() }}
                    <table id="dataPasien" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th colspan="9">
                            <button type="button" class="btn btn-success btn-s addPasien"><i class="fa fa-plus"></i></button> Tambah Pasien
                          </th>
                        </tr>
                        

                        <tr>
                          <th class="holderToolPasien"></th>
                          <th>No Pasien</th>
                          <th>Nama Pasien</th>
                          <th>Alamat</th>
                          <th>Telp</th>
                          <th>Tgl Lahir</th>
                          <th>Jenis Kelamin</th>
                          <th>Tanggal Reg</th>
                          <th>Tools</th>
                        </tr>
                        
                      </thead>
                
                      <tbody id="showPasien">
                          <?php
                            foreach ($Listpasien as $key => $value) {
                              ?>
                                <tr>
                                  <td style="width: 100px;" class="toolPasien">
                                    <button type="button" class="btn btn-info btn-s editPasien"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-s deletePasien"><i class="fa fa-trash"></i></button>
                                  </td>
                                  <td>{{ $value->NoPasien }}</td>
                                  <td>{{ $value->namaPas }}</td>
                                  <td>{{ $value->almPas }}</td>
                                  <td>{{ $value->telpPas }}</td>
                                  <td>{{ $value->tglLahirPas }}</td>
                                  <td>{{ $value->jenisKelPas }}</td>
                                  <td>{{ $value->tglRegistrasi }}</td>
                                  <td><center><button type="button" class="btn btn-info btn-xs daftarkanPasien">Daftar</button></center></td>
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


