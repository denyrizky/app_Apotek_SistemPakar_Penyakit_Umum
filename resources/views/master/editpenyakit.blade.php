@extends('templates/header')
@section('content')
<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            @include('templates/navigation')
                                                         
<!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
                <div class="title_left">
                    <h3>Data <small>Edit Penyakit</small></h3>
                </div>
            </div>

            
           
                    <form class="form-horizontal form-label-left" id="formNambahPenyakitedit" action="{{ url('penyakit/edit') }}" method="POST" novalidate>
                      {{ csrf_field() }}
                     <br>
                     <br><br><br><br>
                     <?php
                    foreach ($users as $key => $d) {
                ?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode Penyakit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="kode" class="form-control col-md-7 col-xs-12" value="{{ $d->kode_pen }}" name="kode" placeholder="Kode Penyakit" required="required" type="text" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Penyakit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nama_penyakit" class="form-control col-md-7 col-xs-12" value="{{ $d->penyakit }}" name="nama_penyakit" placeholder="Nama Penyakit" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat_penyakit">Informasi Penyakit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="alamat_penyakit" required="required" value="" name="alamat_penyakit" class="form-control col-md-7 col-xs-12">{{ $d->info }}</textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenisKelPenyakit">Solusi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="jenisKelPenyakit" required="required" value="" name="jenisKelPenyakit" class="form-control col-md-7 col-xs-12">{{ $d->solusi }}</textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel_penyakit">Gejala<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div style="overflow: scroll; height: 367px;">
                                <?php
                                  $duaarr = explode(",",$d->gejala);

                                    foreach ($DataDiagnosa as $key => $dd) {
                                ?>
                                <div class="input-group md-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <ul id="cek">
                                            <li>
                                              <input type="checkbox" aria-label="Checkbox for following text input" value="{{ $dd->kode }}" name="isi[]" {{ (in_array($dd->kode,$duaarr)?'checked':'') }}>
                                              <label for="checkbox">{{ $dd->gejala }}</label>
                                            </li>
                                          </ul>
                                        </div>
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
                          <a type="button" href="{{ url('master/penyakit') }}"  class="btn btn-primary" id="batalkanPenyakit">Cancel</a>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                    <?php
                    }
                                ?>
            <div class="clearfix"></div>
        </div>


        <script type="text/javascript">
        $('#editPenyakit').click(function(e){
			e.preventDefault();

			if($('#nama_penyakit').val() == '' || $('#alamat_penyakit').val() == '' || $('#jenisKelPenyakit').val() == '' || $('#isi').prop(unchecked) == ''$('#kode').val() == '' ){
				new PNotify({
	                            title: 'Information',
	                            text: 'Tidak ada yang di input',
	                            type: 'error',
	                            styling: 'bootstrap3'
	                        });
			}else{

				var url = '{{ url("penyakit/edit") }}';
				var data = $('#formNambahPenyakitedit').serializeArray();

				$.post(url,data,function(res){

					if(res == 'Berhasil Mengubah Data Penyakit'){
							new PNotify({
	                            title: 'Information',
	                            text: res,
	                            type: 'success',
	                            styling: 'bootstrap3'
	                        });

						}else{
							new PNotify({
	                            title: 'Information',
	                            text: res,
	                            type: 'error',
	                            styling: 'bootstrap3'
	                        });
						}

					berihkan_form_penyakit();
					data_penyakit_refresh();

				});

			}

			
		});
    </script>
@endsection


