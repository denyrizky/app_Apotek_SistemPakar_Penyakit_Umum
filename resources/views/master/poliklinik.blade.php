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
                    <h2>Poliklinik <small>Data</small></h2>
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
                    <p class="text-muted font-13 m-b-30" id="keteranganDataPoliklinik">
                      Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.
                    </p>
                    
                    <table class="table table-bordered" hidden="true" id="tableAddPoliklinik">

                      <thead>
                        <tr>
                          <th></th>
                          <th>Nama Poliklinik</th>
                          <th>Alamat</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <form action="{{ url('poliklinik/simpan') }}" method="POST" id="formADDPoliklinik">
                          {{ csrf_field() }}
                        <tr id="tableADDPoliklinik">
                          <td style="width: 110px;">
                              <button type="button" class="btn btn-success btn-s savePoliklinik"><i class="fa fa-check"></i></button>
                              <button type="button" class="btn btn-warning btn-s cancelPoliklinik"><i class="fa fa-close"></i></button>
                          </td>
                          <td><input type="text" name="nama_Poliklinik" class="form-control" placeholder="Nama Poliklinik" id="nama_Poliklinik"></td>
                          <td><input type="text" name="alamat_Poliklinik" class="form-control" placeholder="Alamat Poliklinik" id="alamat_Poliklinik"></td>
                        </tr>
                        </form>

                      </tbody>

                    </table>
                    
                    <hr>
                    <form action="{{ url('poliklinik/edit') }}" method="POST" id="formEditPoliklinik">
                          {{ csrf_field() }}
                    <table id="dataPoliklinik" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th colspan="9">
                            <button type="button" class="btn btn-success btn-s addPoliklinik"><i class="fa fa-plus"></i></button> Tambah Poliklinik
                          </th>
                        </tr>
                        

                        <tr>
                          <th class="holderToolPoliklinik"></th>
                          <th>ID Poliklinik</th>
                          <th>Nama Poliklinik</th>
                          <th>Alamat</th>
                        </tr>
                        
                      </thead>
                
                      <tbody id="showPoliklinik">
                         
                         <?php
                            foreach ($Listpoliklinik as $key => $value) {
                              ?>
                                <tr>
                                  <td style="width: 100px;" class="toolPoliklinik">
                                    <button type="button" class="btn btn-info btn-s editPoliklinik"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-s deletePoliklinik"><i class="fa fa-trash"></i></button>
                                  </td>
                                  <td>{{ $value->KodePoli }}</td>
                                  <td>{{ $value->namaPoli }}</td>
                                  <td>{{ $value->alamatPoli }}</td>
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


