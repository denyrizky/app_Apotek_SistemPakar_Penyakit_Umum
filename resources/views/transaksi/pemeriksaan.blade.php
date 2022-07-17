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
			<form method="POST" action="{{ url('pemeriksaan/simpan') }}" class="form-horizontal form-label-left" id="fpemeriksaan">
			{{ csrf_field() }}
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pemeriksaan</h2>
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
					
                    <p>Tekan <i>Cari No Pendaftaran</i> untuk mencari pasien hari ini.</p>
                    <button type="button" class="btn btn-info btn-s pull-right cari_nopendaftaran" data-toggle="modal" data-target=".modal_cari_nopen"><i class="fa fa-database"></i> Cari No Pendaftaran </button>
                    <p>
                            <label class="control-label" for="NoPendaftaran">No Pendaftaran <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                              <input type="text" id="NoPendaftaran" name="NoPendaftaran" required="required" class="form-control col-md-7 col-xs-12" readonly="true">

                            </div>
                          </p>
					
					<div class="modal fade modal_cari_nopen" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">List Daftar Pasien Hari Ini dan Belum Diperiksa.</h4>
                        </div>
                        <div class="modal-body">

                        	<table class="table table-bordered" id="tablePendaftarHariIni">
                        		<thead>
                        			<tr>
                        				<th>No Urut</th>
                        				<th>No Pendaftaran</th>
                        				<th>Tanggal Pendaftaran</th>
                        				<th>No Pasien</th>
                        				<th>Nama Pasien</th>
                        				<th>Alat</th>
                        			</tr>
                        		</thead>
                        		<tbody id="listPendaftarHariIni">
                        			<?php
			                          	foreach ($listPendaftar as $key => $value) {
			                          		?>
												<tr>
													<td>{{ $value->noUrut }}</td>
													<td>{{ $value->NoPendaftaran }}</td>
													<td>
														<?php
														 echo date('d/m/Y',strtotime($value->tglPendaftaran));
														?>
													</td>
													<td>{{ $value->NoPasien }}</td>
													<td>{{ $value->namaPas }}</td>
													<td>
														<center>
														<button type="button" class="btn btn-primary btn-xs pilihNoPendaftaranHariIni" data-dismiss="modal"><i class="fa fa-check"> Pilih </i></button>
														</center>
													</td>
												</tr>
			                          		<?php
			                          	}
			                          ?>
                        		</tbody>
                        	</table>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        </div>

                      </div>
                    </div>
                  </div>

                    <div class="clearfix"></div>
                    <hr/>

                    <!-- start project list -->
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Step 1 Pemeriksaan</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Step 2 Tentukan Jenis Biaya</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>Step 3 Pembuatan Resep</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Step 4<br />
                                              <small>Step 4 Konfirmasi</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keluhan">Keluhan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea name="keluhan" id="keluhan" placeholder="Keluhan" class="form-control col-md-7 col-xs-12" cols="30" rows="2"></textarea>
                             

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keluhan">Diagnosa <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea name="diagnosa" id="diagnosa" placeholder="Diagnosa" class="form-control col-md-7 col-xs-12" cols="30" rows="2"></textarea>
                             

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keluhan">Perawatan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea name="perawatan" id="perawatan" placeholder="Perawatan" class="form-control col-md-7 col-xs-12" cols="30" rows="2"></textarea>
                             

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keluhan">Tindakan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea name="tindakan" id="tindakan" placeholder="Tindakan" class="form-control col-md-7 col-xs-12" cols="30" rows="2"></textarea>
                             

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Berat Badan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="input-group">
                            <input type="number" min="0" name="berat_badan" id="berat_badan" class="form-control" placeholder="Berat Badan">
                            <span class="input-group-btn">
                                              <i class="btn btn-primary">KG</i>
                                          </span>
                          </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tensi Diastolik <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="input-group">
                            <input type="number" min="0" name="tensiDiastolik" id="tensiDiastolik" class="form-control" placeholder="Tensi Diastolik">
                            <span class="input-group-btn">
                                              <i class="btn btn-primary">mmHg</i>
                                          </span>
                          </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tensi Sistolik <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <div class="input-group">
                            <input type="number" min="0" name="tensiSistolik" id="tensiSistolik" class="form-control" placeholder="Tensi Sistolik">
                            <span class="input-group-btn">
                                              <i class="btn btn-primary">mmHg</i>
                                          </span>
                          </div>
                            </div>
                          </div>
		 				  
                        

                      </div>
                      <div id="step-2">
                        <h2 class="StepTitle">Step 2 Tentukan Jenis Biaya</h2>
                        <hr>
                        <button type="button" class="btn btn-info btn-s" data-toggle="modal" data-target=".modal_cari_jBiaya"><i class="fa fa-dollar"></i> Cari Jenis Biaya</button>

                        <div class="modal fade modal_cari_jBiaya" tabindex="-1" role="dialog" aria-hidden="true">

	                    <div class="modal-dialog modal-lg">
	                      <div class="modal-content">

	                        <div class="modal-header">
	                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
	                          </button>
	                          <h4 class="modal-title" id="myModalLabel">List Jenis Biaya.</h4>
	                        </div>
	                        <div class="modal-body">

	                        	<table class="table table-bordered" id="tableJenisBiaya">
	                        		<thead>
	                        			<tr>
	                        				<th>ID Jenis Biaya</th>
	                        				<th>Nama Biaya</th>
	                        				<th>Tarif</th>
	                        				<th>Alat</th>
	                        			</tr>
	                        		</thead>
	                        		<tbody id="listJenisBiaya">
	                        			<?php
				                          	foreach ($listJenisBiaya as $key => $value) {
				                          		?>
													<tr>
														<td>{{ $value->IDJenisBiaya }}</td>
														<td>{{ $value->namaBiaya }}</td>
														<td>{{ $value->tarif }}</td>
														<td>
															<center>
															<button type="button" class="btn btn-primary btn-xs pilihJenisBiaya" data-dismiss="modal"><i class="fa fa-check"> Pilih </i></button>
															</center>
														</td>
													</tr>
				                          		<?php
				                          	}
				                          ?>
	                        		</tbody>
	                        	</table>

	                        </div>

	                        <div class="modal-footer">
	                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
	                        </div>

	                      </div>
	                    </div>
	                  </div>

                        <p>
                          <table class="table table-bordered" id="tableBiayaAppend">
                          	<thead>
                          		<tr>
                          			<th>ID Jenis Biaya</th>
                          			<th>Nama Biaya</th>
                          			<th>Tarif</th>
                          			<th>Alat</th>
                          		</tr>
                          	</thead>
                          	<tbody id="appendBiayaHere">
                          		
                          	</tbody>
                          </table>
                        </p>
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                      </div>
                      <div id="step-3">
                        <h2 class="StepTitle">Step 3 Pembuatan Resep</h2>
                        <hr>
                        <button type="button" class="btn btn-info btn-s" data-toggle="modal" data-target=".modal_cari_obat"><i class="fa fa-medkit"></i> Cari Obat</button>
						
						<div class="modal fade modal_cari_obat" tabindex="-1" role="dialog" aria-hidden="true">

	                    <div class="modal-dialog modal-lg">
	                      <div class="modal-content">

	                        <div class="modal-header">
	                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
	                          </button>
	                          <h4 class="modal-title" id="myModalLabel">List Data Obat.</h4>
	                        </div>
	                        <div class="modal-body">

	                        	<table class="table table-bordered" id="tableObat">
	                        		<thead>
	                        			<tr>
	                        				<th>Kode Obat</th>
	                        				<th>Nama Obat</th>
	                        				<th>Merk</th>
	                        				<th>Satuan</th>
	                        				<th>Harga Jual</th>
	                        				<th>Alat</th>
	                        			</tr>
	                        		</thead>
	                        		<tbody id="listObat">
	                        			<?php
				                          	foreach ($listObat as $key => $value) {
				                          		?>
													<tr>
														<td>{{ $value->KodeObat }}</td>
														<td>{{ $value->nmObat }}</td>
														<td>{{ $value->merk }}</td>
														<td>{{ $value->satuan }}</td>
														<td>{{ $value->hargaJual }}</td>
														<td>
															<center>
															<button type="button" class="btn btn-primary btn-xs pilihObat" data-dismiss="modal"><i class="fa fa-check"> Pilih </i></button>
															</center>
														</td>
													</tr>
				                          		<?php
				                          	}
				                          ?>
	                        		</tbody>
	                        	</table>

	                        </div>

	                        <div class="modal-footer">
	                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
	                        </div>

	                      </div>
	                    </div>
	                  </div>

                        <p>
                         <table class="table table-bordered" id="tableResepAppend">
                          	<thead>
                          		<tr>
                          			<th>Kode Obat</th>
                          			<th>Nama Obat</th>
                          			<th>Dosis</th>
                          			<th>Jumlah Obat</th>
                          			<th>Alat</th>
                          		</tr>
                          	</thead>
                          	<tbody id="appendObatHere">
                          		
                          	</tbody>
                          </table>
                        </p>
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                        <br />
                      </div>
                      <div id="step-4">
                        <p>
                        <center>
                        	<h4>Data sudah benar ?	</h4>
                        	<button type="button" class="btn btn-success btn-s" id="executePemeriksaan"><i class="fa fa-check"></i></button>
                        	<button type="button" class="btn btn-danger btn-s" id="tidakJadiPemeriksaan"><i class="fa fa-close"></i></button>
                        </center>
                        </p>
                      </div>

                    </div>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
				
              
            </div>
          </div>
        </div>

        </form>


@endsection


