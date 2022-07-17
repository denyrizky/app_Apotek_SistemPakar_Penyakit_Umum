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
                  <div class="col-md-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Obat</h2>
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

                        <div class="col-md-9 col-sm-9 col-xs-12">

                          <ul class="stats-overview">
                            <li>
                              <span class="name"> Jumlah Obat Yang Dimiliki </span>
                              <span class="value text-success"> <?php
                                $takeJumlah = \App\modelMaster::getJumlahObat();
                                echo $takeJumlah;
                              ?> </span>
                            </li>
                            <li>
                              <span class="name"> Jumlah Obat Yang Harga > 50000 </span>
                              <span class="value text-success"> <?php
                                $takeJumlah2 = \App\modelMaster::getJumlahObat50k();
                                echo $takeJumlah2;
                              ?> </span>
                            </li>
                            <li class="hidden-phone">
                              <span class="name"> Jumlah Obat Yang Harga < 10000 </span>
                              <span class="value text-success"> <?php
                                $takeJumlah3 = \App\modelMaster::getJumlahObat10kMinus();
                                echo $takeJumlah3;
                              ?> </span>
                            </li>
                          </ul>
                          <br />

                          <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Input Obat <small>CREATE</small></h2>
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


                    <!-- Smart Wizard -->
                    <p>Isi semua data diform dibawah Lalu tekan Simpan di Step 2.</p>
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Step 1 Isi Field</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Step 2 Konfirmasi</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        <form class="form-horizontal form-label-left" action="{{ url('obat/simpan') }}" method="POST" id="formInputObat">
                          {{ csrf_field() }}
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_obat">Nama Obat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="nama_obat" name="nama_obat" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="merk_obat">Merk Obat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="merk_obat" name="merk_obat" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="satuan" class="control-label col-md-3 col-sm-3 col-xs-12">Satuan  <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="satuan" class="form-control col-md-7 col-xs-12" type="text" name="satuan">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Jual <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="harga_jual" name="harga_jual" class="date-picker form-control col-md-7 col-xs-12" required="required" type="number" min="0">
                            </div>
                          </div>

                        

                      </div>
                      <div id="step-2">
                        <center><h2 class="StepTitle">Step 2 Konfirmasi</h2>
                        <p>
                          Anda sudah yakin dengan obat tersebut ?
                        </p>
                        <p>
                        <button type="button" class="btn btn-success" id="simpanOBAT">SIMPAN</button>
                        <button type="button" class="btn btn-danger" id="batalkanSimpanOBAT">BATALKAN</button>
                        </p>
                        </center>
                      </div>
                      

                    </div>
                  </div>
                </div>
                </div>
              </div>

              </form>


                        </div>

                        <!-- start project-detail sidebar -->
                        <div class="col-md-3 col-sm-3 col-xs-12">

                          <section class="panel">

                            <div class="x_title">
                              <h2>Potion Progress</h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                              <h3 class="green"><i class="fa fa-medkit"></i> Random Potion Progress</h3>

                              
                                <br/>
                                <?php 

                                for($x=1;$x<=5;$x++){
                                  ?>

                              <?php
                                $angka1 = rand(1, 100);
                                ?>

                              <p>
                                <?php if($angka1 < 40){ ?>
                                  <div class="progress progress_sm">
                                    <div class="progress-bar bg-red" role="progressbar" data-transitiongoal="<?php echo $angka1 ?>"></div>
                                  </div>
                                  <small><?php echo $angka1; ?>% Complete</small>
                                <?php }else{ ?>
                                  <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $angka1 ?>"></div>
                                  </div>
                                  <small><?php echo $angka1; ?>% Complete</small>
                                <?php } ?>
                              </p>
                              <br />

                                  <?php
                                } ?>

                                

                            </div>

                          </section>

                        </div>
                        <!-- end project-detail sidebar -->




                      </div>
                    </div>
                  </div>
                </div>
                  

                  <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List Record Data Obat</h2>
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

                    <p>List Data Data Obat.</p>
                  <form action="{{ url('obat/edit') }}" method="POST" id="formEditObat" hidden="true">
                    {{ csrf_field() }}
                    <table id="khususEditObat" class="table table-bordered">
                      <thead>
                        <tr style="text-align: center;">
                          <th style="width: 17%" hidden="true">Kode Obat</th>
                          <th style="width: 17%">Nama Obat</th>
                          <th style="width: 17%">Merk Obat</th>
                          <th style="width: 17%">Satuan</th>
                          <th style="width: 16%">Harga Jual</th>
                          <th style="width: 18%">Tools</th>
                        </tr>
                      </thead>
                      <tbody id="mulaiEditObat">
                        <tr>
                          <td hidden="true"><input type="text" name="edit_kodeObat" id="edit_kodeObat" class="form-control"></td>
                          <td><input type="text" name="edit_namaObat" id="edit_namaObat" class="form-control"></td>
                          <td><input type="text" name="edit_merkObat" id="edit_merkObat" class="form-control"></td>
                          <td><input type="text" name="edit_satuan" id="edit_satuan" class="form-control"></td>
                          <td><input type="text" name="edit_hargaJual" id="edit_hargaJual" class="form-control"></td>
                          <td style="text-align: center">
                            <button type="button" class="btn btn-success btn-xs" id="simpanPerubahanObat"><i class="fa fa-check"></i> Simpan </button><button type="button" class="btn btn-warning btn-xs" id="abortPerubahanObat"><i class="fa fa-close"></i> Cancel </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </form>

                  <form action="{{ url('obat/delete') }}" method="POST" id="formDeleteObat" hidden="true">
                    {{ csrf_field() }}
                    <table id="khususDeleteObat" class="table table-bordered">
                      <thead>
                        <tr style="text-align: center;">
                          <th colspan="2"><i class="fa fa-question-circle"></i> Yakin menghapus data Obat dengan kode <b><i style="color: red;" id="kodeDeleteObat"></i></b> ?</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td hidden="true"><input type="text" name="delete_KodeObat" id="delete_KodeObat" class="form-control"></td>
                          <td style="width: 50%"><center><button type="button" class="btn btn-danger" style="width: 40%" id="executeHapusObat">YA</button></center></td>
                          <td style="width: 50%"><center><button type="button" class="btn btn-info" style="width: 40%" id="tidakJadiHapusObat">TIDAK</button></center></td>
                          
                        </tr>
                      </tbody>
                    </table>
                  </form>

                    <!-- start project list -->
                    <table class="table table-striped projects" id="tableObat">
                      <thead>
                        <tr>
                          <th style="width: 1%">No. </th>
                          <th style="width: 10%">Kode Obat</th>
                          <th style="width: 12%">Nama Obat</th>
                          <th style="width: 10%">Merk Obat</th>
                          <th style="width: 10%">Satuan</th>
                          <th style="width: 10%">Harga Jual</th>
                          <th style="width: 15%">Progress</th>
                          <th>Status</th>
                          <th style="width: 20%">#Edit</th>
                        </tr>
                      </thead>
                      <tbody id="showDataObat">
                        <?php
                        $x = 1;
                          foreach ($listObat as $key => $value) {
                            $angka = rand(1, 100);
                            ?>
                              
                              <tr>
                                <td><b><?php echo $x ?>. </b></td>
                                <td>{{ $value->KodeObat }}</td>
                                <td>{{ $value->nmObat }}</td>
                                <td>{{ $value->merk }}</td>
                                <td>{{ $value->satuan }}</td>
                                <td>{{ $value->hargaJual }}</td>
                                <td class="project_progress">
                                  <div class="progress progress_sm">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $angka ?>"></div>
                                  </div>
                                  <small><?php echo $angka; ?>% Complete</small>
                                </td>
                                <td>
                                  <?php
                                    if($angka < 50){
                                      echo '<button type="button" class="btn btn-danger btn-xs">Failed</button>';
                                    }else{
                                      echo '<button type="button" class="btn btn-success btn-xs">Success</button>';
                                    }
                                  ?>
                                </td>
                                <td>
                                  <button type="button" class="btn btn-info btn-xs editDataObat"><i class="fa fa-pencil"></i> Edit </button><button type="button" class="btn btn-danger btn-xs deleteDataObat"><i class="fa fa-trash-o"></i> Delete </button>
                                </td>
                              </tr>

                            <?php
                            $x++;
                          }
                        ?>
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>  
              </div>

                </div>
              </div>
            </div>




@endsection


