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
                    <h2>Jenis Biaya <small>Data</small></h2>
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
                    <p class="text-muted font-13 m-b-30" id="keteranganDataJenisBiaya">
                      Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.
                    </p>
                    
                    <table class="table table-bordered" hidden="true" id="tableAddJenisBiaya">

                      <thead>
                        <tr>
                          <th></th>
                          <th>Nama Jenis Biaya</th>
                          <th>Tarif</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <form action="{{ url('jenis_biaya/simpan') }}" method="POST" id="formADDJenisBiaya">
                          {{ csrf_field() }}
                        <tr id="tableADDJenisBiaya">
                          <td style="width: 110px;">
                              <button type="button" class="btn btn-success btn-s saveJenisBiaya"><i class="fa fa-check"></i></button>
                              <button type="button" class="btn btn-warning btn-s cancelJenisBiaya"><i class="fa fa-close"></i></button>
                          </td>
                          <td><input type="text" name="nama_JenisBiaya" class="form-control" placeholder="Nama JenisBiaya" id="nama_JenisBiaya"></td>
                          <td><input type="number" min="0" name="tarif" class="form-control" placeholder="Tarif" id="tarif"></td>
                        </tr>
                        </form>

                      </tbody>

                    </table>
                    
                    <hr>
                    <form action="{{ url('jenis_biaya/edit') }}" method="POST" id="formEditJenisBiaya">
                          {{ csrf_field() }}
                    <table id="dataJenisBiaya" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th colspan="9">
                            <button type="button" class="btn btn-success btn-s addJenisBiaya"><i class="fa fa-plus"></i></button> Tambah JenisBiaya
                          </th>
                        </tr>
                        

                        <tr>
                          <th class="holderToolJenisBiaya"></th>
                          <th>ID Jenis Biaya</th>
                          <th>Nama Jenis Biaya</th>
                          <th>Tarif</th>
                        </tr>
                        
                      </thead>
                
                      <tbody id="showJenisBiaya">
                         
                         <?php
                            foreach ($Listjenisbiaya as $key => $value) {
                              ?>
                                <tr>
                                  <td style="width: 100px;" class="toolJenisBiaya">
                                    <button type="button" class="btn btn-info btn-s editJenisBiaya"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-s deleteJenisBiaya"><i class="fa fa-trash"></i></button>
                                  </td>
                                  <td>{{ $value->IDJenisBiaya }}</td>
                                  <td>{{ $value->namaBiaya }}</td>
                                  <td>{{ $value->tarif }}</td>
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


