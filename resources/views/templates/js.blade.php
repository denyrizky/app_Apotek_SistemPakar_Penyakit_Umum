<script type="text/javascript">

	// PASIEN CRUD
	$(function(){
		$('.toolEditPasien').attr('hidden',true);
		$('.holderToolEditPasien').attr('hidden',true);

		$('#dataPasien').dataTable();

		$('#keteranganDataPasien').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');

		function bersihFORMPasien(){
			$('#nama_pasien').val('');
			$('#alamat_pasien').val('');
			$('#telp_pasien').val('');
			$('#tglLahir_pasien').val('');
			$('#jenisKel_pasien').val('Laki-Laki');
			$('#konfirmasi_daftar').attr('hidden',true);
			$('#konfirmasi_daftar').fadeOut();
			$('#konfirmasi_daftarPasien').attr('hidden',true);
			$('#konfirmasi_daftarPasien').fadeOut();
		}
		
		$('.addPasien').click(function(){
			$('#tableAddPasien').attr('hidden',false);
			$('#tableAddPasien').fadeOut();
			$('#keteranganDataPasien').html('Isi form dibawah setelah selesai, tekan tanda <i class="fa fa-check"></i> dibawah. Jika tidak jadi menambah tekan tanda <i class="fa fa-close"></i> dibawah.');

			bersihFORMPasien();

			$('#tableAddPasien').fadeIn();
		});

		$('.cancelPasien').click(function(){
			$('#tableAddPasien').fadeOut();
			bersihFORMPasien();
			$('#keteranganDataPasien').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');
			$('#tableAddPasien').attr('hidden',true);

		});

		function data_pasien_refresh(){
			var url = '{{ url("pasien/ambil") }}';
			$.get(url,function(res){
				$('#showPasien').html('');

				$('#showPasien').append(res);

				$('.toolPasien').fadeOut();
				$('.toolPasien').fadeIn();

				$('.toolPasien').html('');

				$('.toolPasien').html(
					'<button type="button" class="btn btn-info btn-s editPasien">'+
					'<i class="fa fa-edit"></i></button>'+
					'<button type="button" class="btn btn-danger btn-s deletePasien">'+
					'<i class="fa fa-trash"></i></button>');
			});
		}

		$('.savePasien').click(function(e){
			e.preventDefault();

			if($('#nama_pasien').val() == '' || $('#alamat_pasien').val() == '' || $('#telp_pasien').val() == '' || $('#tglLahir_pasien').val() == ''){

				

				 		new PNotify({
                                  title: 'Information',
                                  text: 'Tidak ada data yang diinput!',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });



			}else{

				$('#konfirmasi_daftar').attr('hidden',false);
				$('#konfirmasi_daftar').fadeOut();
				$('#konfirmasi_daftar').fadeIn();

			}

		});

		var kodePasien = '';

		$('#showPasien').on('click','.daftarkanPasien',function(){
			var kode = $(this).closest('tr').find('td:eq(1)').text();

			var url = '{{ url("pasien/cekDaftar") }}/'+kode;

			$.get(url,function(res){
				$('.keteranganDaftar').html(res);
			});

			$('#konfirmasi_daftarPasien').attr('hidden',false);
			$('#konfirmasi_daftarPasien').fadeOut();
			$('#konfirmasi_daftarPasien').fadeIn();
			kodePasien = kode;
		});

		$('#executeDaftarPasien').click(function(){
			
			var kode = kodePasien;
			var url = '{{ url("pasien/daftarkanNow") }}/'+kode;
			$.get(url,function(res){

				if(res != 'Gagal Mendaftarkan Pasien ke daftar tunggu.'){
						new PNotify({
                            title: 'Information',
                            text: res,
                            hide: false,
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

				$('#konfirmasi_daftarPasien').attr('hidden',true);
				$('#konfirmasi_daftarPasien').fadeOut();

			});

		});

		$('#tidakJadiDaftarPasien').click(function(){
			$('#konfirmasi_daftarPasien').attr('hidden',true);
			$('#konfirmasi_daftarPasien').fadeOut();
		});

		$('#executeBiasa').click(function(){
			var dataPasien = $('#formADDPasien').serializeArray();
			var urlSimpan = '{{ url("pasien/simpan") }}';

			$.post(urlSimpan,dataPasien,function(res){

					if(res = 'Berhasil Menyimpan Data Pasien'){
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
							

				bersihFORMPasien();
				data_pasien_refresh();
			});
		});

		$('#executeDaftar').click(function(){
			var dataPasien = $('#formADDPasien').serializeArray();
			var urlSimpan = '{{ url("pasien/simpanDaftar") }}';

			$.post(urlSimpan,dataPasien,function(res){

					if(res = 'Berhasil Menyimpan Data dan Mendaftarkan Pasien.'){
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
							

				bersihFORMPasien();
				data_pasien_refresh();
			});
		});

		$('#showPasien').on('click','.editPasien',function(){
			var nopasien = $(this).closest('tr').find('td:eq(1)').text();
			var nama = $(this).closest('tr').find('td:eq(2)').text();
			var alamat = $(this).closest('tr').find('td:eq(3)').text();
			var telp = $(this).closest('tr').find('td:eq(4)').text();
			var tglLahir = $(this).closest('tr').find('td:eq(5)').text();
			var jk = $(this).closest('tr').find('td:eq(6)').text();
			var tglReg = $(this).closest('tr').find('td:eq(7)').text();

			$(this).closest('tr').find('td:eq(1)').html('<input type="hidden" name="noPasienEdit" class="form-control nopasEdit" value = "'+nopasien+'" readonly /></input><center><b>HIDDEN</b></center>');
			$(this).closest('tr').find('td:eq(2)').html('<input type="text" name="namaEdit" class="form-control namapasEdit" value = "'+nama+'" /></input>');
			$(this).closest('tr').find('td:eq(3)').html('<input type="text" name="alamatEdit" class="form-control alamatPasEdit" value = "'+alamat+'" /></input>');
			$(this).closest('tr').find('td:eq(4)').html('<input type="text" name="telpEdit" class="form-control telpPasEdit" value = "'+telp+'" /></input>');
			$(this).closest('tr').find('td:eq(5)').html('<input type="date" name="tglLahirEdit" class="form-control tglLahirPasEdit" value = "'+tglLahir+'" /></input>');

			if(jk == 'Laki-Laki'){
				$(this).closest('tr').find('td:eq(6)').html('<select name="jkEdit" class="form-control jkPasEdit"><option value="Laki-Laki" selected="true">Laki-Laki</option><option value="Perempuan">Perempuan</option></select>');
			}else{
				$(this).closest('tr').find('td:eq(6)').html('<select name="jkEdit" class="form-control jkPasEdit"><option value="Laki-Laki">Laki-Laki</option><option value="Perempuan" selected="true">Perempuan</option></select>');
			}
			
			$(this).closest('tr').find('td:eq(7)').html('<input type="date" name="tglReg" class="form-control tglRegEdit" value = "'+tglReg+'" readonly /></input>');

			$(this).closest('tr').find('.toolPasien').fadeOut();
			$(this).closest('tr').find('.toolPasien').fadeIn();

			$(this).closest('tr').find('.toolPasien').html(
				'<button type="button" class="btn btn-success btn-s simpanEdit">'+
				'<i class="fa fa-check"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s gagalEdit">'+
				'<i class="fa fa-close"></i></button>');   

			$('#konfirmasi_daftar').attr('hidden',true);
			$('#konfirmasi_daftar').fadeOut();    
			$('#konfirmasi_daftarPasien').attr('hidden',true);
			$('#konfirmasi_daftarPasien').fadeOut();               

		});


		$('#showPasien').on('click','.gagalEdit',function(){
			var nopasien = $(this).closest('tr').find('.nopasEdit').val();
			var nama = $(this).closest('tr').find('.namapasEdit').val();
			var alamat = $(this).closest('tr').find('.alamatPasEdit').val();
			var telp = $(this).closest('tr').find('.telpPasEdit').val();
			var tglLahir = $(this).closest('tr').find('.tglLahirPasEdit').val();
			var jk = $(this).closest('tr').find('.jkPasEdit').val();
			var tglReg = $(this).closest('tr').find('.tglRegEdit').val();

			$(this).closest('tr').find('td:eq(1)').html(nopasien);
			$(this).closest('tr').find('td:eq(2)').html(nama);
			$(this).closest('tr').find('td:eq(3)').html(alamat);
			$(this).closest('tr').find('td:eq(4)').html(telp);
			$(this).closest('tr').find('td:eq(5)').html(tglLahir);
			$(this).closest('tr').find('td:eq(6)').html(jk);
			$(this).closest('tr').find('td:eq(7)').html(tglReg);

			$(this).closest('tr').find('.toolPasien').fadeOut();
			$(this).closest('tr').find('.toolPasien').fadeIn();

			$(this).closest('tr').find('.toolPasien').html(
				'<button type="button" class="btn btn-info btn-s editPasien">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deletePasien">'+
				'<i class="fa fa-trash"></i></button>');

			$('#konfirmasi_daftar').attr('hidden',true);
			$('#konfirmasi_daftar').fadeOut();
			$('#konfirmasi_daftarPasien').attr('hidden',true);
			$('#konfirmasi_daftarPasien').fadeOut();
			
		});


		$('#showPasien').on('click','.simpanEdit',function(){
			var urlEdit = '{{ url("pasien/edit") }}';
			var data = $('#formEditPasien').serializeArray();

			$.post(urlEdit,data,function(res){
				if(res = 'Berhasil Mengubah Data Pasien'){
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
							

				bersihFORMPasien();
				data_pasien_refresh();
			});
		});


		$('#showPasien').on('click','.deletePasien',function(){

			$(this).closest('tr').find('.toolPasien').fadeOut();
			$(this).closest('tr').find('.toolPasien').fadeIn();

			$(this).closest('tr').find('.toolPasien').html(
				'<center><b>DELETE RECORD ?</b>'+
				'<button type="button" class="btn btn-danger btn-s executePasien">'+
				'<i>Y</i></button>'+
				'<button type="button" class="btn btn-info btn-s cancelHapusPasien">'+
				'<i>N</i></button></center>');

			$('#konfirmasi_daftar').attr('hidden',true);
			$('#konfirmasi_daftar').fadeOut();
			$('#konfirmasi_daftarPasien').attr('hidden',true);
			$('#konfirmasi_daftarPasien').fadeOut();

		});


		$('#showPasien').on('click','.executePasien',function(){
			var ini = $(this).closest('tr');
			var primary = $(this).closest('tr').find('td:eq(1)').text();
			var url = '{{ url("pasien/delete") }}/'+primary;

			$.get(url,function(res){
				if(res = 'Berhasil Menghapus Data Pasien'){
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'success',
                            styling: 'bootstrap3'
                        });

						ini.remove();

					}else{
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'error',
                            styling: 'bootstrap3'
                        });
					}
			});

			$('#konfirmasi_daftar').attr('hidden',true);
			$('#konfirmasi_daftar').fadeOut();
			$('#konfirmasi_daftarPasien').attr('hidden',true);
			$('#konfirmasi_daftarPasien').fadeOut();
			
		});


		$('#showPasien').on('click','.cancelHapusPasien',function(){
			$(this).closest('tr').find('.toolPasien').fadeOut();
			$(this).closest('tr').find('.toolPasien').fadeIn();

			$(this).closest('tr').find('.toolPasien').html(
				'<button type="button" class="btn btn-info btn-s editPasien">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deletePasien">'+
				'<i class="fa fa-trash"></i></button>');

			$('#konfirmasi_daftar').attr('hidden',true);
			$('#konfirmasi_daftar').fadeOut();
			$('#konfirmasi_daftarPasien').attr('hidden',true);
			$('#konfirmasi_daftarPasien').fadeOut();
		});
                                    

	});
	// END OF PASIEN CRUD
</script>

<script type="text/javascript">
	// Penyakit CRUD
	$(function(){
		$('#dataPenyakit').dataTable();

		function data_penyakit_refresh(){
			var url = '{{ url("penyakit/ambil") }}';

			$.get(url,function(res){
				$('#showPenyakit').html(res);
			});
		}

		$('.addPenyakit').click(function(){
			$('#formAddPenyakit').fadeOut();
			$('#formAddPenyakit').attr('hidden',false);
			$('#formAddPenyakit').fadeIn();
		});

		$('#batalkanPenyakit').click(function(){
			$('#formAddPenyakit').fadeOut();
			$('#formAddPenyakit').attr('hidden',true);
			berihkan_form_penyakit();
		});

		function berihkan_form_penyakit(){
			$('#nama_penyakit').val('');
			$('#alamat_penyakit').val('');
			$('#jenisKelPenyakit').val('');
			$('#cek').attr('checked', true);
			$('#cek input[type="checkbox"]').prop('checked', false);
			$('#tel_penyakit').val('');
			$('#poliPenyakit').val('');
		}

		$('#showPenyakit').on('click','.editPenyakit',function(){
			var kode = $(this).closest('tr').find('td:eq(1)').text();
			var nama = $(this).closest('tr').find('td:eq(2)').text();
			var alamat = $(this).closest('tr').find('td:eq(3)').text();
			var jk = $(this).closest('tr').find('td:eq(4)').text();
			var telp = $(this).closest('tr').find('td:eq(5)').text();
			var poli = $(this).closest('tr').find('td:eq(6)').text();
			console.log(poli);
			var strArray = poli.split(" ");
			// Display array values on page
			// for(var i = 0; i < strArray.length; i++){
			// 	document.write("<p>" + strArray[i] + "</p>");
			// 	console.log(strArray[i]);
			// }
			$('#edit_kode_penyakit').val(kode);
			$('#edit_nama_penyakit').val(nama);
			$('#edit_alamat_penyakit').val(alamat);
			$('#edit_jenisKelPenyakit').val(jk);
			$('#edit_tel_penyakit').val(telp);
			$('#edit_poliPenyakit').val(poli);
		});

		$('#showPenyakit').on('click','.deletePenyakit',function(){
			var kode = $(this).closest('tr').find('td:eq(1)').text();
			$('#delete_kodePenyakit').val(kode);
			$('.showKodePenyakit').html(kode);
		});

		$('#executeDeleteDataPenyakit').click(function() {
			var url = '{{ url("penyakit/delete") }}';
			var data = $('#formDeletePenyakit').serializeArray();

			$.post(url,data,function(res){
						if(res == 'Berhasil Menghapus Data Penyakit'){
							new PNotify({
	                            title: 'Information',
	                            text: res,
	                            type: 'success',
	                            styling: 'bootstrap3'
	                        });
							data_penyakit_refresh();
						}else{
							new PNotify({
	                            title: 'Information',
	                            text: res,
	                            type: 'error',
	                            styling: 'bootstrap3'
	                        });
						}
				data_penyakit_refresh();
			});
			
		});

		$('#simpanPenyakit').click(function(e){
			e.preventDefault();

			if($('#nama_penyakit').val() == '' || $('#alamat_penyakit').val() == '' || $('#jenisKelPenyakit').val() == ''){
				new PNotify({
	                            title: 'Information',
	                            text: 'Tidak ada yang di input',
	                            type: 'error',
	                            styling: 'bootstrap3'
	                        });
			}else{

				var url = '{{ url("penyakit/simpan") }}';
				var data = $('#formNambahPenyakit').serializeArray();

				$.post(url,data,function(res){
					if(res == 'Berhasil Menyimpan Data Penyakit'){
							new PNotify({
	                            title: 'Information',
	                            text: res,
	                            type: 'success',
	                            styling: 'bootstrap3'
	                        });
							window.location.reload();
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

		

	});
	// END OF Penyakit CRUD
</script>

<script type="text/javascript">
	// Dokter CRUD
	$(function(){
		$('#dataDokter').dataTable();

		function data_dokter_refresh(){
			var url = '{{ url("dokter/ambil") }}';

			$.get(url,function(res){
				$('#showDokter').html(res);
			});
		}

		$('.addDokter').click(function(){
			$('#formAddDokter').fadeOut();
			$('#formAddDokter').attr('hidden',false);
			$('#formAddDokter').fadeIn();
		});

		$('#batalkanDokter').click(function(){
			$('#formAddDokter').fadeOut();
			$('#formAddDokter').attr('hidden',true);
			berihkan_form_dokter();
		});

		function berihkan_form_dokter(){
			$('#nama_dokter').val('');
			$('#alamat_dokter').val('');
			$('#jenisKelDokter').val('');
			$('#tel_dokter').val('');
			$('#poliDokter').val('');
		}

		$('#showDokter').on('click','.editDokter',function(){
			var kode = $(this).closest('tr').find('td:eq(1)').text();
			var nama = $(this).closest('tr').find('td:eq(2)').text();
			var alamat = $(this).closest('tr').find('td:eq(3)').text();
			var jk = $(this).closest('tr').find('td:eq(4)').text();
			var telp = $(this).closest('tr').find('td:eq(5)').text();
			var poli = $(this).closest('tr').find('td:eq(6)').text();

			$('#edit_kode_dokter').val(kode);
			$('#edit_nama_dokter').val(nama);
			$('#edit_alamat_dokter').val(alamat);
			$('#edit_jenisKelDokter').val(jk);
			$('#edit_tel_dokter').val(telp);
			$('#edit_poliDokter').val(poli);
		});

		$('#simpanEditanDokter').click(function(){
			var url = '{{ url("dokter/edit") }}';
			var data = $('#formEditDokter').serializeArray();

			$.post(url,data,function(res){
						if(res == 'Berhasil Mengubah Data Dokter'){
							new PNotify({
	                            title: 'Information',
	                            text: res,
	                            type: 'success',
	                            styling: 'bootstrap3'
	                        });
							data_dokter_refresh();
						}else{
							new PNotify({
	                            title: 'Information',
	                            text: res,
	                            type: 'error',
	                            styling: 'bootstrap3'
	                        });
						}
				data_dokter_refresh();
			});
			
		});

		$('#showDokter').on('click','.deleteDokter',function(){
			var kode = $(this).closest('tr').find('td:eq(1)').text();
			$('#delete_kodeDokter').val(kode);
			$('.showKodeDokter').html(kode);
		});

		$('#executeDeleteDataDokter').click(function() {
			var url = '{{ url("dokter/delete") }}';
			var data = $('#formDeleteDokter').serializeArray();

			$.post(url,data,function(res){
						if(res == 'Berhasil Menghapus Data Dokter'){
							new PNotify({
	                            title: 'Information',
	                            text: res,
	                            type: 'success',
	                            styling: 'bootstrap3'
	                        });
							data_dokter_refresh();
						}else{
							new PNotify({
	                            title: 'Information',
	                            text: res,
	                            type: 'error',
	                            styling: 'bootstrap3'
	                        });
						}
				data_dokter_refresh();
			});
			
		});

		$('#simpanDokter').click(function(e){
			e.preventDefault();

			if($('#nama_dokter').val() == '' || $('#alamat_dokter').val() == '' || $('#jenisKelDokter').val() == '' || $('#tel_dokter').val() == '' || $('#poliDokter').val() == ''){
				new PNotify({
	                            title: 'Information',
	                            text: 'Tidak ada yang di input',
	                            type: 'error',
	                            styling: 'bootstrap3'
	                        });
			}else{

				var url = '{{ url("dokter/simpan") }}';
				var data = $('#formNambahDokter').serializeArray();

				$.post(url,data,function(res){

					if(res == 'Berhasil Mendaftarkan Dokter Baru'){
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

					berihkan_form_dokter();
					data_dokter_refresh();

				});

			}

			
		});

	});
	// END OF Dokter CRUD
</script>


<script type="text/javascript">
	// Jquery CRUD OBAT
	
	$(function(){

		$('#formDeleteObat').fadeOut();
		$('#formEditObat').fadeOut();
		$('#tableObat').dataTable();

		function bersihkan_form_input_obat(){
			$('#nama_obat').val('');
			$('#merk_obat').val('');
			$('#harga_jual').val('');
			$('#satuan').val('');
		}

		function refresh_data_obat(){
			var url = '{{ url("obat/ambil") }}';
			$.get(url,function(res){
				$('#showDataObat').html(res);
			});
		}

		$('#simpanOBAT').click(function(e){
			e.preventDefault();
			if($('#nama_obat').val() == '' || $('#merk_obat').val() == '' || $('#harga_jual').val() == '' || $('#satuan').val() == ''){

				new PNotify({
	                            title: 'Information',
	                            text: 'Tidak ada yang di input',
	                            type: 'error',
	                            styling: 'bootstrap3'
	                        });

			}else{

				var url = '{{ url("obat/simpan") }}';
				var data = $('#formInputObat').serializeArray();

				$.post(url,data,function(res){
					if(res == 'Berhasil Menambahkan Obat Baru'){
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

						bersihkan_form_input_obat();
						refresh_data_obat();
				});

			}

			
		});

		$('#batalkanSimpanOBAT').click(function(){
			bersihkan_form_input_obat();
		});

		function bersihkan_form_edit_obat(){
			$('#edit_kodeObat').val('');
			$('#edit_namaObat').val('');
			$('#edit_merkObat').val('');
			$('#edit_satuan').val('');
			$('#edit_hargaJual').val('');
		}

		$('#showDataObat').on('click','.editDataObat',function(){
			var kode = $(this).closest('tr').find('td:eq(1)').text();
			var nama = $(this).closest('tr').find('td:eq(2)').text();
			var merk = $(this).closest('tr').find('td:eq(3)').text();
			var satuan = $(this).closest('tr').find('td:eq(4)').text();
			var hargaJual = $(this).closest('tr').find('td:eq(5)').text();

			$('#edit_kodeObat').val(kode);
			$('#edit_namaObat').val(nama);
			$('#edit_merkObat').val(merk);
			$('#edit_satuan').val(satuan);
			$('#edit_hargaJual').val(hargaJual);

			$('#formEditObat').fadeOut();
			$('#formEditObat').attr('hidden',false);
			$('#formEditObat').fadeIn();

			$('#formDeleteObat').fadeOut();
			$('#formDeleteObat').attr('hidden',true);
		});

		$('#showDataObat').on('click','.deleteDataObat',function(){

			$('#formDeleteObat').fadeOut();
			$('#formDeleteObat').attr('hidden',false);

			var kode = $(this).closest('tr').find('td:eq(1)').text();
			$('#kodeDeleteObat').html(kode);
			$('#delete_KodeObat').val(kode);
			$('#formDeleteObat').fadeIn();

			$('#formEditObat').fadeOut();
			$('#formEditObat').attr('hidden',true);
		});


		$('#abortPerubahanObat').click(function(){
			bersihkan_form_edit_obat();
			$('#formEditObat').fadeOut();
			$('#formEditObat').attr('hidden',true);
		});

		$('#tidakJadiHapusObat').click(function(){
			$('#formDeleteObat').fadeOut();
			$('#formDeleteObat').attr('hidden',true);
			$('#formEditObat').fadeOut();
			$('#formEditObat').attr('hidden',true);
		});

		$('#executeHapusObat').click(function(){
			var url = '{{ url("obat/delete") }}';
			var data = $('#formDeleteObat').serializeArray();

			$.post(url,data,function(res){
				if(res == 'Berhasil Menghapus Data Obat'){
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

						refresh_data_obat();

						$('#formDeleteObat').fadeOut();
						$('#formDeleteObat').attr('hidden',true);
						$('#formEditObat').fadeOut();
						$('#formEditObat').attr('hidden',true);
			});

		});


		$('#simpanPerubahanObat').click(function(e){

			e.preventDefault();

			if($('#edit_kodeObat').val() == '' || $('#edit_namaObat').val() == '' || $('#edit_merkObat').val() == '' || $('#edit_satuan').val() == '' || $('#edit_hargaJual').val() == '')
			{
				new PNotify({
	                            title: 'Information',
	                            text: 'Tidak ada yang di input',
	                            type: 'error',
	                            styling: 'bootstrap3'
	                        });
			}else{

				var url = '{{ url("obat/edit") }}';
				var data = $('#formEditObat').serializeArray();

				$.post(url,data,function(res){
					if(res == 'Berhasil Mengubah Data Obat'){
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

						bersihkan_form_edit_obat();
						refresh_data_obat();
						$('#formEditObat').fadeOut();
						$('#formEditObat').attr('hidden',true);
				});

			}

		});

		

	});

	// END OF OBAT CRUD
</script>

<script type="text/javascript">
	// Jquery FOR Gejala
		
		$(function(){

		$('.toolEditGejala').attr('hidden',true);
		$('.holderToolEditGejala').attr('hidden',true);

		$('#dataGejala').dataTable();

		$('#keteranganDataGejala').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');

		function bersihFORMGejala(){
			$('#nama_gejala').val('');
		}
		
		$('.addGejala').click(function(){
			$('#tableAddGejala').attr('hidden',false);
			$('#tableAddGejala').fadeOut();
			$('#keteranganDataGejala').html('Isi form dibawah setelah selesai, tekan tanda <i class="fa fa-check"></i> dibawah. Jika tidak jadi menambah tekan tanda <i class="fa fa-close"></i> dibawah.');

			bersihFORMGejala();

			$('#tableAddGejala').fadeIn();
		});

		$('.cancelGejala').click(function(){
			$('#tableAddGejala').fadeOut();
			bersihFORMGejala();
			$('#keteranganDataGejala').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');
			$('#tableAddGejala').attr('hidden',true);
		});

		function data_Gejala_refresh(){
			var url = '{{ url("gejala/ambil") }}';
			$.get(url,function(res){
				$('#showGejala').html('');
				
				$('#showGejala').append(res);

				$('.toolGejala').fadeOut();
				$('.toolGejala').fadeIn();

				$('.toolGejala').html('');

				$('.toolGejala').html(
					'<button type="button" class="btn btn-info btn-s editGejala">'+
					'<i class="fa fa-edit"></i></button>'+
					'<button type="button" class="btn btn-danger btn-s deleteGejala">'+
					'<i class="fa fa-trash"></i></button>');
			});
		}

		$('.saveGejala').click(function(e){
			e.preventDefault();

			if( $('#nama_gejala').val() == '' ){

				 		new PNotify({
                                  title: 'Information',
                                  text: 'Tidak ada data yang diinput!',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });

			}else{

			var dataGejala = $('#formADDGejala').serializeArray();
			var urlSimpan = '{{ url("gejala/simpan") }}';

			$.post(urlSimpan,dataGejala,function(res){

					if(res = 'Berhasil Menyimpan Data Gejala'){
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
							

				bersihFORMGejala();
				data_Gejala_refresh();
			});

			}

		});

		$('#showGejala').on('click','.editGejala',function(){
			var kode = $(this).closest('tr').find('td:eq(1)').text();
			var gejala = $(this).closest('tr').find('td:eq(2)').text();
			

			$(this).closest('tr').find('td:eq(1)').html('<input type="hidden" name="kode" class="form-control noGejalaEdit" value = "'+kode+'" readonly /></input><center><b>HIDDEN</b></center>');
			$(this).closest('tr').find('td:eq(2)').html('<input type="text" name="nama_gejala" class="form-control namaPegEdit" value = "'+gejala+'" /></input>');

			

			$(this).closest('tr').find('.toolGejala').fadeOut();
			$(this).closest('tr').find('.toolGejala').fadeIn();

			$(this).closest('tr').find('.toolGejala').html(
				'<button type="button" class="btn btn-success btn-s simpanEditGejala">'+
				'<i class="fa fa-check"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s gagalEditGejala">'+
				'<i class="fa fa-close"></i></button>');                      

		});


		$('#showGejala').on('click','.gagalEditGejala',function(){
			var kode = $(this).closest('tr').find('.noGejalaEdit').val();
			var gejala = $(this).closest('tr').find('.namaPegEdit').val();
		

			$(this).closest('tr').find('td:eq(1)').html(kode);
			$(this).closest('tr').find('td:eq(2)').html(gejala);

			$(this).closest('tr').find('.toolGejala').fadeOut();
			$(this).closest('tr').find('.toolGejala').fadeIn();

			$(this).closest('tr').find('.toolGejala').html(
				'<button type="button" class="btn btn-info btn-s editGejala">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deleteGejala">'+
				'<i class="fa fa-trash"></i></button>');
			
		});


		$('#showGejala').on('click','.simpanEditGejala',function(){
			var urlEdit = '{{ url("gejala/edit") }}';
			var data = $('#formEditGejala').serializeArray();

			$.post(urlEdit,data,function(res){
				if(res = 'Berhasil Mengubah Data Gejala'){
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
							

				bersihFORMGejala();
				data_Gejala_refresh();
			});
		});


		$('#showGejala').on('click','.deleteGejala',function(){

			$(this).closest('tr').find('.toolGejala').fadeOut();
			$(this).closest('tr').find('.toolGejala').fadeIn();

			$(this).closest('tr').find('.toolGejala').html(
				'<center><b>DELETE RECORD ?</b>'+
				'<button type="button" class="btn btn-danger btn-s executeGejala">'+
				'<i>Y</i></button>'+
				'<button type="button" class="btn btn-info btn-s cancelHapusGejala">'+
				'<i>N</i></button></center>');

		});


		$('#showGejala').on('click','.executeGejala',function(){
			var ini = $(this).closest('tr');
			var primary = $(this).closest('tr').find('td:eq(1)').text();
			var url = '{{ url("gejala/delete") }}/'+primary;

			$.get(url,function(res){
				if(res = 'Berhasil Menghapus Data Gejala'){
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'success',
                            styling: 'bootstrap3'
                        });

						ini.remove();

					}else{
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'error',
                            styling: 'bootstrap3'
                        });
					}
			});
			
		});


		$('#showGejala').on('click','.cancelHapusGejala',function(){
			$(this).closest('tr').find('.toolGejala').fadeOut();
			$(this).closest('tr').find('.toolGejala').fadeIn();

			$(this).closest('tr').find('.toolGejala').html(
				'<button type="button" class="btn btn-info btn-s editGejala">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deleteGejala">'+
				'<i class="fa fa-trash"></i></button>');
		});

		});

	// END OF Gejala CRUD
</script>

<script type="text/javascript">
	// Jquery FOR PEGAWAI
		
		$(function(){

		$('.toolEditPegawai').attr('hidden',true);
		$('.holderToolEditPegawai').attr('hidden',true);

		$('#dataPegawai').dataTable();

		$('#keteranganDataPegawai').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');

		function bersihFORMPegawai(){
			$('#nama_Pegawai').val('');
			$('#alamat_Pegawai').val('');
			$('#telp_Pegawai').val('');
			$('#tglLahir_Pegawai').val('');
			$('#jenisKel_Pegawai').val('Laki-Laki');
		}
		
		$('.addPegawai').click(function(){
			$('#tableAddPegawai').attr('hidden',false);
			$('#tableAddPegawai').fadeOut();
			$('#keteranganDataPegawai').html('Isi form dibawah setelah selesai, tekan tanda <i class="fa fa-check"></i> dibawah. Jika tidak jadi menambah tekan tanda <i class="fa fa-close"></i> dibawah.');

			bersihFORMPegawai();

			$('#tableAddPegawai').fadeIn();
		});

		$('.cancelPegawai').click(function(){
			$('#tableAddPegawai').fadeOut();
			bersihFORMPegawai();
			$('#keteranganDataPegawai').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');
			$('#tableAddPegawai').attr('hidden',true);
		});

		function data_Pegawai_refresh(){
			var url = '{{ url("pegawai/ambil") }}';
			$.get(url,function(res){
				$('#showPegawai').html('');

				$('#showPegawai').append(res);

				$('.toolPegawai').fadeOut();
				$('.toolPegawai').fadeIn();

				$('.toolPegawai').html('');

				$('.toolPegawai').html(
					'<button type="button" class="btn btn-info btn-s editPegawai">'+
					'<i class="fa fa-edit"></i></button>'+
					'<button type="button" class="btn btn-danger btn-s deletePegawai">'+
					'<i class="fa fa-trash"></i></button>');
			});
		}

		$('.savePegawai').click(function(e){
			e.preventDefault();

			if($('#nama_Pegawai').val() == '' || $('#alamat_Pegawai').val() == '' || $('#telp_Pegawai').val() == '' || $('#tglLahir_Pegawai').val() == ''){

				

				 		new PNotify({
                                  title: 'Information',
                                  text: 'Tidak ada data yang diinput!',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });



			}else{

			var dataPegawai = $('#formADDPegawai').serializeArray();
			var urlSimpan = '{{ url("pegawai/simpan") }}';

			$.post(urlSimpan,dataPegawai,function(res){

					if(res = 'Berhasil Menyimpan Data Pegawai'){
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
							

				bersihFORMPegawai();
				data_Pegawai_refresh();
			});

			}

		});

		$('#showPegawai').on('click','.editPegawai',function(){
			var noPegawai = $(this).closest('tr').find('td:eq(1)').text();
			var nama = $(this).closest('tr').find('td:eq(2)').text();
			var alamat = $(this).closest('tr').find('td:eq(3)').text();
			var telp = $(this).closest('tr').find('td:eq(4)').text();
			var tglLahir = $(this).closest('tr').find('td:eq(5)').text();
			var jk = $(this).closest('tr').find('td:eq(6)').text();
			var tglReg = $(this).closest('tr').find('td:eq(7)').text();

			$(this).closest('tr').find('td:eq(1)').html('<input type="hidden" name="noPegawaiEdit" class="form-control noPegawaiEdit" value = "'+noPegawai+'" readonly /></input><center><b>HIDDEN</b></center>');
			$(this).closest('tr').find('td:eq(2)').html('<input type="text" name="namaEdit" class="form-control namaPegEdit" value = "'+nama+'" /></input>');
			$(this).closest('tr').find('td:eq(3)').html('<input type="text" name="alamatEdit" class="form-control alamatPegEdit" value = "'+alamat+'" /></input>');
			$(this).closest('tr').find('td:eq(4)').html('<input type="text" name="telpEdit" class="form-control telpPegEdit" value = "'+telp+'" /></input>');
			$(this).closest('tr').find('td:eq(5)').html('<input type="date" name="tglLahirEdit" class="form-control tglLahirPegEdit" value = "'+tglLahir+'" /></input>');

			if(jk == 'Laki-Laki'){
				$(this).closest('tr').find('td:eq(6)').html('<select name="jkEdit" class="form-control jkPegEdit"><option value="Laki-Laki" selected="true">Laki-Laki</option><option value="Perempuan">Perempuan</option></select>');
			}else{
				$(this).closest('tr').find('td:eq(6)').html('<select name="jkEdit" class="form-control jkPegEdit"><option value="Laki-Laki">Laki-Laki</option><option value="Perempuan" selected="true">Perempuan</option></select>');
			}
			
			$(this).closest('tr').find('td:eq(7)').html('<input type="date" name="tglReg" class="form-control tglRegEdit" value = "'+tglReg+'" readonly /></input>');

			$(this).closest('tr').find('.toolPegawai').fadeOut();
			$(this).closest('tr').find('.toolPegawai').fadeIn();

			$(this).closest('tr').find('.toolPegawai').html(
				'<button type="button" class="btn btn-success btn-s simpanEditPegawai">'+
				'<i class="fa fa-check"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s gagalEditPegawai">'+
				'<i class="fa fa-close"></i></button>');                      

		});


		$('#showPegawai').on('click','.gagalEditPegawai',function(){
			var noPegawai = $(this).closest('tr').find('.noPegawaiEdit').val();
			var nama = $(this).closest('tr').find('.namaPegEdit').val();
			var alamat = $(this).closest('tr').find('.alamatPegEdit').val();
			var telp = $(this).closest('tr').find('.telpPegEdit').val();
			var tglLahir = $(this).closest('tr').find('.tglLahirPegEdit').val();
			var jk = $(this).closest('tr').find('.jkPegEdit').val();

			$(this).closest('tr').find('td:eq(1)').html(noPegawai);
			$(this).closest('tr').find('td:eq(2)').html(nama);
			$(this).closest('tr').find('td:eq(3)').html(alamat);
			$(this).closest('tr').find('td:eq(4)').html(telp);
			$(this).closest('tr').find('td:eq(5)').html(tglLahir);
			$(this).closest('tr').find('td:eq(6)').html(jk);

			$(this).closest('tr').find('.toolPegawai').fadeOut();
			$(this).closest('tr').find('.toolPegawai').fadeIn();

			$(this).closest('tr').find('.toolPegawai').html(
				'<button type="button" class="btn btn-info btn-s editPegawai">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deletePegawai">'+
				'<i class="fa fa-trash"></i></button>');
			
		});


		$('#showPegawai').on('click','.simpanEditPegawai',function(){
			var urlEdit = '{{ url("pegawai/edit") }}';
			var data = $('#formEditPegawai').serializeArray();

			$.post(urlEdit,data,function(res){
				if(res = 'Berhasil Mengubah Data Pegawai'){
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
							

				bersihFORMPegawai();
				data_Pegawai_refresh();
			});
		});


		$('#showPegawai').on('click','.deletePegawai',function(){

			$(this).closest('tr').find('.toolPegawai').fadeOut();
			$(this).closest('tr').find('.toolPegawai').fadeIn();

			$(this).closest('tr').find('.toolPegawai').html(
				'<center><b>DELETE RECORD ?</b>'+
				'<button type="button" class="btn btn-danger btn-s executePegawai">'+
				'<i>Y</i></button>'+
				'<button type="button" class="btn btn-info btn-s cancelHapusPegawai">'+
				'<i>N</i></button></center>');

		});


		$('#showPegawai').on('click','.executePegawai',function(){
			var ini = $(this).closest('tr');
			var primary = $(this).closest('tr').find('td:eq(1)').text();
			var url = '{{ url("pegawai/delete") }}/'+primary;

			$.get(url,function(res){
				if(res = 'Berhasil Menghapus Data Pegawai'){
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'success',
                            styling: 'bootstrap3'
                        });

						ini.remove();

					}else{
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'error',
                            styling: 'bootstrap3'
                        });
					}
			});
			
		});


		$('#showPegawai').on('click','.cancelHapusPegawai',function(){
			$(this).closest('tr').find('.toolPegawai').fadeOut();
			$(this).closest('tr').find('.toolPegawai').fadeIn();

			$(this).closest('tr').find('.toolPegawai').html(
				'<button type="button" class="btn btn-info btn-s editPegawai">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deletePegawai">'+
				'<i class="fa fa-trash"></i></button>');
		});

		});

	// END OF PEGAWAI CRUD
</script>


<script type="text/javascript">
	// JENIS BIAYA CRUD
		
	$(function(){

		$('.toolEditJenisBiaya').attr('hidden',true);
		$('.holderToolEditJenisBiaya').attr('hidden',true);

		$('#dataJenisBiaya').dataTable();

		$('#keteranganDataJenisBiaya').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');

		function bersihFORMJenisBiaya(){
			$('#nama_JenisBiaya').val('');
			$('#tarif').val('');
		}
		
		$('.addJenisBiaya').click(function(){
			$('#tableAddJenisBiaya').attr('hidden',false);
			$('#tableAddJenisBiaya').fadeOut();
			$('#keteranganDataJenisBiaya').html('Isi form dibawah setelah selesai, tekan tanda <i class="fa fa-check"></i> dibawah. Jika tidak jadi menambah tekan tanda <i class="fa fa-close"></i> dibawah.');

			bersihFORMJenisBiaya();

			$('#tableAddJenisBiaya').fadeIn();
		});

		$('.cancelJenisBiaya').click(function(){
			$('#tableAddJenisBiaya').fadeOut();
			bersihFORMJenisBiaya();
			$('#keteranganDataJenisBiaya').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');
			$('#tableAddJenisBiaya').attr('hidden',true);
		});

		function data_JenisBiaya_refresh(){
			var url = '{{ url("jenis_biaya/ambil") }}';
			$.get(url,function(res){
				$('#showJenisBiaya').html('');

				$('#showJenisBiaya').append(res);

				$('.toolJenisBiaya').fadeOut();
				$('.toolJenisBiaya').fadeIn();

				$('.toolJenisBiaya').html('');

				$('.toolJenisBiaya').html(
					'<button type="button" class="btn btn-info btn-s editJenisBiaya">'+
					'<i class="fa fa-edit"></i></button>'+
					'<button type="button" class="btn btn-danger btn-s deleteJenisBiaya">'+
					'<i class="fa fa-trash"></i></button>');
			});
		}

		$('.saveJenisBiaya').click(function(e){
			e.preventDefault();

			if($('#nama_JenisBiaya').val() == '' || $('#tarif').val() == ''){

				

				 		new PNotify({
                                  title: 'Information',
                                  text: 'Tidak ada data yang diinput!',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });



			}else{

			var dataJenisBiaya = $('#formADDJenisBiaya').serializeArray();
			var urlSimpan = '{{ url("jenis_biaya/simpan") }}';

			$.post(urlSimpan,dataJenisBiaya,function(res){

					if(res = 'Berhasil Menyimpan Data JenisBiaya'){
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
							

				bersihFORMJenisBiaya();
				data_JenisBiaya_refresh();
			});

			}

		});

		$('#showJenisBiaya').on('click','.editJenisBiaya',function(){
			var noJenisBiaya = $(this).closest('tr').find('td:eq(1)').text();
			var nama = $(this).closest('tr').find('td:eq(2)').text();
			var tarif = $(this).closest('tr').find('td:eq(3)').text();

			$(this).closest('tr').find('td:eq(1)').html('<input type="hidden" name="noJenisBiayaEdit" class="form-control noJenisBiayaEdit" value = "'+noJenisBiaya+'" readonly /></input><center><b>HIDDEN</b></center>');
			$(this).closest('tr').find('td:eq(2)').html('<input type="text" name="namaEdit" class="form-control namaBiayaEdit" value = "'+nama+'" /></input>');
			$(this).closest('tr').find('td:eq(3)').html('<input type="text" name="tarifEdit" class="form-control tarifBiayaEdit" value = "'+tarif+'" /></input>');
	

			$(this).closest('tr').find('.toolJenisBiaya').fadeOut();
			$(this).closest('tr').find('.toolJenisBiaya').fadeIn();

			$(this).closest('tr').find('.toolJenisBiaya').html(
				'<button type="button" class="btn btn-success btn-s simpanEditJenisBiaya">'+
				'<i class="fa fa-check"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s gagalEditJenisBiaya">'+
				'<i class="fa fa-close"></i></button>');                      

		});


		$('#showJenisBiaya').on('click','.gagalEditJenisBiaya',function(){
			var noJenisBiaya = $(this).closest('tr').find('.noJenisBiayaEdit').val();
			var nama = $(this).closest('tr').find('.namaBiayaEdit').val();
			var tarif = $(this).closest('tr').find('.tarifBiayaEdit').val();

			$(this).closest('tr').find('td:eq(1)').html(noJenisBiaya);
			$(this).closest('tr').find('td:eq(2)').html(nama);
			$(this).closest('tr').find('td:eq(3)').html(tarif);

			$(this).closest('tr').find('.toolJenisBiaya').fadeOut();
			$(this).closest('tr').find('.toolJenisBiaya').fadeIn();

			$(this).closest('tr').find('.toolJenisBiaya').html(
				'<button type="button" class="btn btn-info btn-s editJenisBiaya">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deleteJenisBiaya">'+
				'<i class="fa fa-trash"></i></button>');
			
		});


		$('#showJenisBiaya').on('click','.simpanEditJenisBiaya',function(){
			var urlEdit = '{{ url("jenis_biaya/edit") }}';
			var data = $('#formEditJenisBiaya').serializeArray();

			$.post(urlEdit,data,function(res){
				if(res = 'Berhasil Mengubah Data JenisBiaya'){
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
							

				bersihFORMJenisBiaya();
				data_JenisBiaya_refresh();
			});
		});


		$('#showJenisBiaya').on('click','.deleteJenisBiaya',function(){

			$(this).closest('tr').find('.toolJenisBiaya').fadeOut();
			$(this).closest('tr').find('.toolJenisBiaya').fadeIn();

			$(this).closest('tr').find('.toolJenisBiaya').html(
				'<center><b>DELETE RECORD ?</b>'+
				'<button type="button" class="btn btn-danger btn-s executeJenisBiaya">'+
				'<i>Y</i></button>'+
				'<button type="button" class="btn btn-info btn-s cancelHapusJenisBiaya">'+
				'<i>N</i></button></center>');

		});


		$('#showJenisBiaya').on('click','.executeJenisBiaya',function(){
			var ini = $(this).closest('tr');
			var primary = $(this).closest('tr').find('td:eq(1)').text();
			var url = '{{ url("jenis_biaya/delete") }}/'+primary;

			$.get(url,function(res){
				if(res = 'Berhasil Menghapus Data JenisBiaya'){
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'success',
                            styling: 'bootstrap3'
                        });

						ini.remove();

					}else{
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'error',
                            styling: 'bootstrap3'
                        });
					}
			});
			
		});


		$('#showJenisBiaya').on('click','.cancelHapusJenisBiaya',function(){
			$(this).closest('tr').find('.toolJenisBiaya').fadeOut();
			$(this).closest('tr').find('.toolJenisBiaya').fadeIn();

			$(this).closest('tr').find('.toolJenisBiaya').html(
				'<button type="button" class="btn btn-info btn-s editJenisBiaya">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deleteJenisBiaya">'+
				'<i class="fa fa-trash"></i></button>');
		});

	});

	// END OF JENIS BIAYA CRUD
</script>


<script type="text/javascript">
	// CRUD FOR POLIKLINIK
	
	$(function(){

		$('.toolEditPoliklinik').attr('hidden',true);
		$('.holderToolEditPoliklinik').attr('hidden',true);

		$('#dataPoliklinik').dataTable();

		$('#keteranganDataPoliklinik').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');

		function bersihFORMPoliklinik(){
			$('#nama_Poliklinik').val('');
			$('#alamat_Poliklinik').val('');
		}
		
		$('.addPoliklinik').click(function(){
			$('#tableAddPoliklinik').attr('hidden',false);
			$('#tableAddPoliklinik').fadeOut();
			$('#keteranganDataPoliklinik').html('Isi form dibawah setelah selesai, tekan tanda <i class="fa fa-check"></i> dibawah. Jika tidak jadi menambah tekan tanda <i class="fa fa-close"></i> dibawah.');

			bersihFORMPoliklinik();

			$('#tableAddPoliklinik').fadeIn();
		});

		$('.cancelPoliklinik').click(function(){
			$('#tableAddPoliklinik').fadeOut();
			bersihFORMPoliklinik();
			$('#keteranganDataPoliklinik').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');
			$('#tableAddPoliklinik').attr('hidden',true);
		});

		function data_Poliklinik_refresh(){
			var url = '{{ url("poliklinik/ambil") }}';
			$.get(url,function(res){
				$('#showPoliklinik').html('');

				$('#showPoliklinik').append(res);

				$('.toolPoliklinik').fadeOut();
				$('.toolPoliklinik').fadeIn();

				$('.toolPoliklinik').html('');

				$('.toolPoliklinik').html(
					'<button type="button" class="btn btn-info btn-s editPoliklinik">'+
					'<i class="fa fa-edit"></i></button>'+
					'<button type="button" class="btn btn-danger btn-s deletePoliklinik">'+
					'<i class="fa fa-trash"></i></button>');
			});
		}

		$('.savePoliklinik').click(function(e){
			e.preventDefault();

			if($('#nama_Poliklinik').val() == '' || $('#tarif').val() == ''){

				

				 		new PNotify({
                                  title: 'Information',
                                  text: 'Tidak ada data yang diinput!',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });



			}else{

			var dataPoliklinik = $('#formADDPoliklinik').serializeArray();
			var urlSimpan = '{{ url("poliklinik/simpan") }}';

			$.post(urlSimpan,dataPoliklinik,function(res){

					if(res = 'Berhasil Menyimpan Data Poliklinik'){
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
							

				bersihFORMPoliklinik();
				data_Poliklinik_refresh();
			});

			}

		});

		$('#showPoliklinik').on('click','.editPoliklinik',function(){
			var noPoliklinik = $(this).closest('tr').find('td:eq(1)').text();
			var nama = $(this).closest('tr').find('td:eq(2)').text();
			var alamat = $(this).closest('tr').find('td:eq(3)').text();

			$(this).closest('tr').find('td:eq(1)').html('<input type="hidden" name="noPoliklinikEdit" class="form-control noPoliklinikEdit" value = "'+noPoliklinik+'" readonly /></input><center><b>HIDDEN</b></center>');
			$(this).closest('tr').find('td:eq(2)').html('<input type="text" name="namaEdit" class="form-control namaPoliEdit" value = "'+nama+'" /></input>');
			$(this).closest('tr').find('td:eq(3)').html('<input type="text" name="alamatEdit" class="form-control alamatPoliEdit" value = "'+alamat+'" /></input>');
	

			$(this).closest('tr').find('.toolPoliklinik').fadeOut();
			$(this).closest('tr').find('.toolPoliklinik').fadeIn();

			$(this).closest('tr').find('.toolPoliklinik').html(
				'<button type="button" class="btn btn-success btn-s simpanEditPoliklinik">'+
				'<i class="fa fa-check"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s gagalEditPoliklinik">'+
				'<i class="fa fa-close"></i></button>');                      

		});


		$('#showPoliklinik').on('click','.gagalEditPoliklinik',function(){
			var noPoliklinik = $(this).closest('tr').find('.noPoliklinikEdit').val();
			var nama = $(this).closest('tr').find('.namaPoliEdit').val();
			var alamat = $(this).closest('tr').find('.alamatPoliEdit').val();

			$(this).closest('tr').find('td:eq(1)').html(noPoliklinik);
			$(this).closest('tr').find('td:eq(2)').html(nama);
			$(this).closest('tr').find('td:eq(3)').html(alamat);

			$(this).closest('tr').find('.toolPoliklinik').fadeOut();
			$(this).closest('tr').find('.toolPoliklinik').fadeIn();

			$(this).closest('tr').find('.toolPoliklinik').html(
				'<button type="button" class="btn btn-info btn-s editPoliklinik">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deletePoliklinik">'+
				'<i class="fa fa-trash"></i></button>');
			
		});


		$('#showPoliklinik').on('click','.simpanEditPoliklinik',function(){
			var urlEdit = '{{ url("poliklinik/edit") }}';
			var data = $('#formEditPoliklinik').serializeArray();

			$.post(urlEdit,data,function(res){
				if(res = 'Berhasil Mengubah Data Poliklinik'){
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
							

				bersihFORMPoliklinik();
				data_Poliklinik_refresh();
			});
		});


		$('#showPoliklinik').on('click','.deletePoliklinik',function(){

			$(this).closest('tr').find('.toolPoliklinik').fadeOut();
			$(this).closest('tr').find('.toolPoliklinik').fadeIn();

			$(this).closest('tr').find('.toolPoliklinik').html(
				'<center><b>DELETE RECORD ?</b>'+
				'<button type="button" class="btn btn-danger btn-s executePoliklinik">'+
				'<i>Y</i></button>'+
				'<button type="button" class="btn btn-info btn-s cancelHapusPoliklinik">'+
				'<i>N</i></button></center>');

		});


		$('#showPoliklinik').on('click','.executePoliklinik',function(){
			var ini = $(this).closest('tr');
			var primary = $(this).closest('tr').find('td:eq(1)').text();
			var url = '{{ url("poliklinik/delete") }}/'+primary;

			$.get(url,function(res){
				if(res = 'Berhasil Menghapus Data Poliklinik'){
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'success',
                            styling: 'bootstrap3'
                        });

						ini.remove();

					}else{
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'error',
                            styling: 'bootstrap3'
                        });
					}
			});
			
		});


		$('#showPoliklinik').on('click','.cancelHapusPoliklinik',function(){
			$(this).closest('tr').find('.toolPoliklinik').fadeOut();
			$(this).closest('tr').find('.toolPoliklinik').fadeIn();

			$(this).closest('tr').find('.toolPoliklinik').html(
				'<button type="button" class="btn btn-info btn-s editPoliklinik">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deletePoliklinik">'+
				'<i class="fa fa-trash"></i></button>');
		});

	});

	// END OF CRUD POLIKLINIK
</script>



<script type="text/javascript">
	// JADWAL PRAKTEK CRUD
	
	$(function(){

		$('.toolEditJadwal_praktek').attr('hidden',true);
		$('.holderToolEditJadwal_praktek').attr('hidden',true);

		$('#dataJadwal_praktek').dataTable();

		$('#keteranganDataJadwal_praktek').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');

		function bersihFORMJadwal_praktek(){
			$('#hari').val('');
			$('#jam_mulai').val('');
			$('#jam_selesai').val('');
			$('#kodeDokter').val('');
		}
		
		$('.addJadwal_praktek').click(function(){
			$('#tableAddJadwal_praktek').attr('hidden',false);
			$('#tableAddJadwal_praktek').fadeOut();
			$('#keteranganDataJadwal_praktek').html('Isi form dibawah setelah selesai, tekan tanda <i class="fa fa-check"></i> dibawah. Jika tidak jadi menambah tekan tanda <i class="fa fa-close"></i> dibawah.');

			bersihFORMJadwal_praktek();

			$('#tableAddJadwal_praktek').fadeIn();
		});

		$('.cancelJadwal_praktek').click(function(){
			$('#tableAddJadwal_praktek').fadeOut();
			bersihFORMJadwal_praktek();
			$('#keteranganDataJadwal_praktek').html('Untuk menambah data, tekan tanda <i class="fa fa-plus"></i> dibawah.');
			$('#tableAddJadwal_praktek').attr('hidden',true);
		});

		function data_Jadwal_praktek_refresh(){
			var url = '{{ url("jadwal_praktek/ambil") }}';
			$.get(url,function(res){
				$('#showJadwal_praktek').html('');

				$('#showJadwal_praktek').append(res);

				$('.toolJadwal_praktek').fadeOut();
				$('.toolJadwal_praktek').fadeIn();

				$('.toolJadwal_praktek').html('');

				$('.toolJadwal_praktek').html(
					'<button type="button" class="btn btn-info btn-s editJadwal_praktek">'+
					'<i class="fa fa-edit"></i></button>'+
					'<button type="button" class="btn btn-danger btn-s deleteJadwal_praktek">'+
					'<i class="fa fa-trash"></i></button>');
			});
		}

		$('.saveJadwal_praktek').click(function(e){
			e.preventDefault();

			if($('#hari').val() == '' || $('#jam_mulai').val() == '' || $('#jam_selesai').val() == '' || $('#kodeDokter').val() == ''){

				

				 		new PNotify({
                                  title: 'Information',
                                  text: 'Tidak ada data yang diinput!',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });



			}else{

			var dataJadwal_praktek = $('#formADDJadwal_praktek').serializeArray();
			var urlSimpan = '{{ url("jadwal_praktek/simpan") }}';

			$.post(urlSimpan,dataJadwal_praktek,function(res){

					if(res = 'Berhasil Menyimpan Data Jadwal Praktek'){
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
							

				bersihFORMJadwal_praktek();
				data_Jadwal_praktek_refresh();
			});

			}

		});

		$('#showJadwal_praktek').on('click','.editJadwal_praktek',function(){
			var noJadwal_praktek = $(this).closest('tr').find('td:eq(1)').text();
			var hari = $(this).closest('tr').find('td:eq(2)').text();
			var jam_mulai = $(this).closest('tr').find('td:eq(3)').text();
			var jam_selesai = $(this).closest('tr').find('td:eq(4)').text();
			var kodeDokter = $(this).closest('tr').find('td:eq(5)').text();

			$(this).closest('tr').find('td:eq(1)').html('<input type="hidden" name="noJadwal_praktekEdit" class="form-control noJadwal_praktekEdit" value = "'+noJadwal_praktek+'" readonly /></input><center><b>HIDDEN</b></center>');
			
			var hari_hari = '';

			if(hari == 'Senin'){
				hari_hari = 
				'<select name="hariEdit" id="hariEdit" class="form-control hariEdit">'+
				'<option value=""></option>'+
				'<option value="Senin" selected="true">Senin</option>'+
				'<option value="Selasa">Selasa</option>'+
				'<option value="Rabu">Rabu</option>'+
				'<option value="Kamis">Kamis</option>'+
				'<option value="Jumat">Jumat</option>'+
				'<option value="Sabtu">Sabtu</option>'+
				'<option value="Minggu">Minggu</option>'+
				'</select>';
			}else if(hari == 'Selasa'){
				hari_hari = 
				'<select name="hariEdit" id="hariEdit" class="form-control hariEdit">'+
				'<option value=""></option>'+
				'<option value="Senin">Senin</option>'+
				'<option value="Selasa" selected="true">Selasa</option>'+
				'<option value="Rabu">Rabu</option>'+
				'<option value="Kamis">Kamis</option>'+
				'<option value="Jumat">Jumat</option>'+
				'<option value="Sabtu">Sabtu</option>'+
				'<option value="Minggu">Minggu</option>'+
				'</select>';
			}else if(hari == 'Rabu'){
				hari_hari = 
				'<select name="hariEdit" id="hariEdit" class="form-control hariEdit">'+
				'<option value=""></option>'+
				'<option value="Senin">Senin</option>'+
				'<option value="Selasa">Selasa</option>'+
				'<option value="Rabu" selected="true">Rabu</option>'+
				'<option value="Kamis">Kamis</option>'+
				'<option value="Jumat">Jumat</option>'+
				'<option value="Sabtu">Sabtu</option>'+
				'<option value="Minggu">Minggu</option>'+
				'</select>';
			}else if(hari == 'Kamis'){
				hari_hari = 
				'<select name="hariEdit" id="hariEdit" class="form-control hariEdit">'+
				'<option value=""></option>'+
				'<option value="Senin">Senin</option>'+
				'<option value="Selasa">Selasa</option>'+
				'<option value="Rabu">Rabu</option>'+
				'<option value="Kamis" selected="true">Kamis</option>'+
				'<option value="Jumat">Jumat</option>'+
				'<option value="Sabtu">Sabtu</option>'+
				'<option value="Minggu">Minggu</option>'+
				'</select>';
			}else if(hari == 'Jumat'){
				hari_hari = 
				'<select name="hariEdit" id="hariEdit" class="form-control hariEdit">'+
				'<option value=""></option>'+
				'<option value="Senin">Senin</option>'+
				'<option value="Selasa">Selasa</option>'+
				'<option value="Rabu">Rabu</option>'+
				'<option value="Kamis">Kamis</option>'+
				'<option value="Jumat" selected="true">Jumat</option>'+
				'<option value="Sabtu">Sabtu</option>'+
				'<option value="Minggu">Minggu</option>'+
				'</select>';
			}else if(hari == 'Sabtu'){
				hari_hari = 
				'<select name="hariEdit" id="hariEdit" class="form-control hariEdit">'+
				'<option value=""></option>'+
				'<option value="Senin">Senin</option>'+
				'<option value="Selasa">Selasa</option>'+
				'<option value="Rabu">Rabu</option>'+
				'<option value="Kamis">Kamis</option>'+
				'<option value="Jumat">Jumat</option>'+
				'<option value="Sabtu" selected="true">Sabtu</option>'+
				'<option value="Minggu">Minggu</option>'+
				'</select>';
			}else if(hari == 'Minggu'){
				hari_hari = 
				'<select name="hariEdit" id="hariEdit" class="form-control hariEdit">'+
				'<option value=""></option>'+
				'<option value="Senin">Senin</option>'+
				'<option value="Selasa">Selasa</option>'+
				'<option value="Rabu">Rabu</option>'+
				'<option value="Kamis">Kamis</option>'+
				'<option value="Jumat">Jumat</option>'+
				'<option value="Sabtu">Sabtu</option>'+
				'<option value="Minggu" selected="true">Minggu</option>'+
				'</select>';
			}

			$(this).closest('tr').find('td:eq(2)').html(hari_hari);

			$(this).closest('tr').find('td:eq(3)').html('<input type="time" name="jam_mulaiEdit" class="form-control jam_mulaiEdit" value = "'+jam_mulai+'" /></input>');

			$(this).closest('tr').find('td:eq(4)').html('<input type="time" name="jam_selesaiEdit" class="form-control jam_selesaiEdit" value = "'+jam_selesai+'" /></input>');

			var kodeDokterSpan = 
			'<select name="kodeDokterEdit" id="kodeDokterEdit" class="form-control kodeDokterEdit">'+
			'<option value="'+kodeDokter+'">'+kodeDokter+'</option>'+
			'<?php $data = \App\modelMaster::getListDokter(); foreach ($data as $key => $value) { ?>'+
			'<option value="{{ $value->KodeDokter }}">{{ $value->nmDokter }}</option>' +
			'<?php } ?>' +
			'</select>';

			$(this).closest('tr').find('td:eq(5)').html(kodeDokterSpan);
	

			$(this).closest('tr').find('.toolJadwal_praktek').fadeOut();
			$(this).closest('tr').find('.toolJadwal_praktek').fadeIn();

			$(this).closest('tr').find('.toolJadwal_praktek').html(
				'<button type="button" class="btn btn-success btn-s simpanEditJadwal_praktek">'+
				'<i class="fa fa-check"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s gagalEditJadwal_praktek">'+
				'<i class="fa fa-close"></i></button>');                      

		});


		$('#showJadwal_praktek').on('click','.gagalEditJadwal_praktek',function(){
			var noJadwal_praktek = $(this).closest('tr').find('.noJadwal_praktekEdit').val();
			var hari = $(this).closest('tr').find('.hariEdit').val();
			var mulai = $(this).closest('tr').find('.jam_mulaiEdit').val();
			var selesai = $(this).closest('tr').find('.jam_selesaiEdit').val();
			var kodeDokter = $(this).closest('tr').find('.kodeDokterEdit').val();

			$(this).closest('tr').find('td:eq(1)').html(noJadwal_praktek);
			$(this).closest('tr').find('td:eq(2)').html(hari);
			$(this).closest('tr').find('td:eq(3)').html(mulai);
			$(this).closest('tr').find('td:eq(4)').html(selesai);
			$(this).closest('tr').find('td:eq(5)').html(kodeDokter);

			$(this).closest('tr').find('.toolJadwal_praktek').fadeOut();
			$(this).closest('tr').find('.toolJadwal_praktek').fadeIn();

			$(this).closest('tr').find('.toolJadwal_praktek').html(
				'<button type="button" class="btn btn-info btn-s editJadwal_praktek">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deleteJadwal_praktek">'+
				'<i class="fa fa-trash"></i></button>');
			
		});


		$('#showJadwal_praktek').on('click','.simpanEditJadwal_praktek',function(){
			var urlEdit = '{{ url("jadwal_praktek/edit") }}';
			var data = $('#formEditJadwal_praktek').serializeArray();

			$.post(urlEdit,data,function(res){
				if(res = 'Berhasil Mengubah Data Jadwal Praktek'){
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
							

				bersihFORMJadwal_praktek();
				data_Jadwal_praktek_refresh();
			});
		});


		$('#showJadwal_praktek').on('click','.deleteJadwal_praktek',function(){

			$(this).closest('tr').find('.toolJadwal_praktek').fadeOut();
			$(this).closest('tr').find('.toolJadwal_praktek').fadeIn();

			$(this).closest('tr').find('.toolJadwal_praktek').html(
				'<center><b>DELETE RECORD ?</b>'+
				'<button type="button" class="btn btn-danger btn-s executeJadwal_praktek">'+
				'<i>Y</i></button>'+
				'<button type="button" class="btn btn-info btn-s cancelHapusJadwal_praktek">'+
				'<i>N</i></button></center>');

		});


		$('#showJadwal_praktek').on('click','.executeJadwal_praktek',function(){
			var ini = $(this).closest('tr');
			var primary = $(this).closest('tr').find('td:eq(1)').text();
			var url = '{{ url("jadwal_praktek/delete") }}/'+primary;

			$.get(url,function(res){
				if(res = 'Berhasil Menghapus Data Jadwal Praktek'){
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'success',
                            styling: 'bootstrap3'
                        });

						ini.remove();

					}else{
						new PNotify({
                            title: 'Information',
                            text: res,
                            type: 'error',
                            styling: 'bootstrap3'
                        });
					}
			});
			
		});


		$('#showJadwal_praktek').on('click','.cancelHapusJadwal_praktek',function(){
			$(this).closest('tr').find('.toolJadwal_praktek').fadeOut();
			$(this).closest('tr').find('.toolJadwal_praktek').fadeIn();

			$(this).closest('tr').find('.toolJadwal_praktek').html(
				'<button type="button" class="btn btn-info btn-s editJadwal_praktek">'+
				'<i class="fa fa-edit"></i></button>'+
				'<button type="button" class="btn btn-danger btn-s deleteJadwal_praktek">'+
				'<i class="fa fa-trash"></i></button>');
		});

	});

	// END OF JADWAL PRAKTEK CRUD
</script>

<!-- BEGIN TRANSACTION -->

<script type="text/javascript">
	// JS PENDAFTARAN
		
	$(function(){
		$('#tablePasienDaftar').dataTable();

		$('#showPasienDaftar').on('click','.pilihPendaftaran',function(e){
			e.preventDefault();

			var nopen = $(this).closest('tr').find('td:eq(0)').text();
			var tgl = $(this).closest('tr').find('td:eq(1)').text();
			var urut = $(this).closest('tr').find('td:eq(2)').text();
			var nopas = $(this).closest('tr').find('td:eq(3)').text();
			var napas = $(this).closest('tr').find('td:eq(4)').text();

			if($('#'+nopen).length == 0){

				var appendThere = 
				'<tr id="'+nopen+'">'+
				'<td><input type="hidden" name="nopen[]" value="'+nopen+'">'+nopen+'</td>'+
				'<td>'+tgl+'</td>'+
				'<td>'+urut+'</td>'+
				'<td>'+nopas+'</td>'+
				'<td>'+napas+'</td>'+
				'<td><center><button type="button" class="btn btn-danger btn-xs hapusAppendNoPen"><i class="fa fa-close"></i> Hapus </button></center></td>'+
				'</tr>';

				$('#appendPasienHere').append(appendThere);
			}else{

				new PNotify({
                            title: 'Information',
                            text: 'Sudah ada',
                            type: 'danger',
                            styling: 'bootstrap3'
                        });

			}

		});

		$('#appendPasienHere').on('click','.hapusAppendNoPen',function(){
			var close = $(this).closest('tr');
			close.remove();
		});

		$('.simpanPendaftaran').click(function(){

			if($('#pilihDokter').val() == ''){
				new PNotify({
                            title: 'Information',
                            text: 'Tidak ada yang di input',
                            type: 'danger',
                            styling: 'bootstrap3'
                        });
			}else{

				var url = '{{ url("pendaftaran/simpan") }}';
				var data = $('#formPilihDokter').serializeArray();

				$.post(url,data,function(res){

					if(res != 'Gagal Menyimpan Data Pendaftaran.'){
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

				});

				$('#pilihDokter').val('');
				$('#appendPasienHere').html('');
			}

		});

	});

	// END OF PENDAFTARAN JS
</script>

<script type="text/javascript">
	// BEGIN TRANSACTION PEMERIKSAAN
	
	$(function(){

		$('#tablePendaftarHariIni').dataTable();
		$('#tableJenisBiaya').dataTable();
		$('#tableObat').dataTable();

		function bersihkan_form(){
			$('#NoPendaftaran').val('');
			$('#keluhan').val('');
			$('#diagnosa').val('');
			$('#perawatan').val('');
			$('#tindakan').val('');
			$('#berat_badan').val('');
			$('#tensiDiastolik').val('');
			$('#tensiSistolik').val('');

			$('#appendBiayaHere').html('');
			$('#appendObatHere').html('');
		}

		$('#listPendaftarHariIni').on('click','.pilihNoPendaftaranHariIni',function(){
			var kode = $(this).closest('tr').find('td:eq(1)').text();
			$('#NoPendaftaran').val(kode);
		});

		$('#listJenisBiaya').on('click','.pilihJenisBiaya',function(e){
			e.preventDefault();

			var kode = $(this).closest('tr').find('td:eq(0)').text();
			var nama = $(this).closest('tr').find('td:eq(1)').text();
			var tarif = $(this).closest('tr').find('td:eq(2)').text();

			if($('#'+kode).length == 0){

				var appendData = 
				'<tr id="'+kode+'">'+
				'<td><input type="hidden" name="idJenis[]" value="'+kode+'">'+kode+'</td>'+
				'<td>'+nama+'</td>'+
				'<td>'+tarif+'</td>'+
				'<td><center><button type="button" class="btn btn-danger btn-xs deleteBarisBiaya"><i class="fa fa-close"></i></button></center></td>'+
				'</tr>';

				$('#appendBiayaHere').append(appendData);

			}else{

			}

		});

		$('#appendBiayaHere').on('click','.deleteBarisBiaya',function(){
			$(this).closest('tr').remove();
		});

		$('#listObat').on('click','.pilihObat',function(e){

			e.preventDefault();

			var kode = $(this).closest('tr').find('td:eq(0)').text();
			var nama = $(this).closest('tr').find('td:eq(1)').text();
			var merk = $(this).closest('tr').find('td:eq(2)').text();
			var satuan = $(this).closest('tr').find('td:eq(3)').text();
			var h_jual = $(this).closest('tr').find('td:eq(4)').text();

			if($('#'+kode).length == 0){

				var appendHere = 
				'<tr id="'+kode+'">'+
				'<td><input type="hidden" name="kodeObat[]" value="'+kode+'">'+kode+'</td>'+
				'<td>'+nama+'</td>'+
				'<td><input type="text" name="dosis[]" placeholder="Masukkan Dosis" class="form-control"></td>'+
				'<td><input type="number" name="jmlObat[]" value="0" min="0" class="form-control"></td>'+
				'<td><center><button type="button" class="btn btn-danger btn-xs deleteObat"><i class="fa fa-close"></i></button></center></td>'+
				'</tr>';

				$('#appendObatHere').append(appendHere);	

			}else{

			}

		});

		$('#appendObatHere').on('click','.deleteObat',function(){
			$(this).closest('tr').remove();
		});

		$('#tidakJadiPemeriksaan').click(function(){
			bersihkan_form();
		});

		$('#executePemeriksaan').click(function(e){
			e.preventDefault();

			if($('#NoPendaftaran').val() == '' || $('#keluhan').val() == '' || $('#diagnosa').val() == '' || $('#perawatan').val() == '' || $('#tindakan').val() == '' || $('#berat_badan').val() == '' || $('#tensiDiastolik').val() == '' || $('#tensiSistolik').val() == '' || $('#appendBiayaHere').html() == '' || $('#appendObatHere').html() == ''){

					new PNotify({
                            title: 'Information',
                            text: 'Tidak ada yang di input',
                            type: 'danger',
                            styling: 'bootstrap3'
                        });

				}else{

					var url = '{{ url("pemeriksaan/simpan") }}';
					var data = $('#fpemeriksaan').serializeArray();

					$.post(url,data,function(res){

					if(res != 'Gagal menyimpan data pemeriksaan.'){
						new PNotify({
                            title: 'Information',
                            text: res,
                            hide: false,
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

					bersihkan_form();

					var url3 = '{{ url("ambilDataPendaftar") }}';

					$.get(url3,function(res){
						$('#listPendaftarHariIni').html(res);
					});

					});

				}

		});

	});

	// END OF PEMERIKSAAN JS
</script>


<script type="text/javascript">
	// RESEP JS
	
	$(function(){

		var kode_pemeriksaan_global = '';

		$('#tableListPemeriksaan').dataTable();

		function bersihkan_semua(){
			$('#noPenKet').html('');
			$('#noPerKet').html('');
			$('#noPasienKet').html('');
			$('#naPasKet').html('');
			$('#alPasKet').html('');
			$('#tePasKet').html('');
			$('#tglPasKet').html('');
			$('#jkPasKet').html('');
			$('#keluKet').html('');
			$('#diagKet').html('');
			$('#perKet').html('');
			$('#tinKet').html('');
			$('#berKet').html('');
			$('#tensiDiaKet').html('');
			$('#tensiSisKet').html('');
			$('#TotalBayarPemeriksaan').html('');
			$('#TotalBayarObat').html('');
			$('#subTotalBayar').html('');
			$('#listResepObat').html('');
			$('#munculTombol').html('');

			var urlAmbil = '{{ url("ambilDataPemeriksaanALL") }}';

			$.get(urlAmbil,function(res){
				$('#showListPemeriksaan').html(res);
			});

		}

		$('#tableListPemeriksaan').on('click','.pilihPemeriksaan',function(){
			var kode_pemeriksaan = $(this).closest('tr').find('td:eq(0)').text();
			var kode_pendaftaran = $(this).closest('tr').find('td:eq(1)').text();
			var no_pasien = $(this).closest('tr').find('td:eq(2)').text();
			var nama_pasien = $(this).closest('tr').find('td:eq(3)').text();

			kode_pemeriksaan_global = kode_pemeriksaan;

			$('#noPenKet').html(kode_pendaftaran);
			$('#noPerKet').html(kode_pemeriksaan);
			$('#noPasienKet').html(no_pasien);
			$('#naPasKet').html(nama_pasien);

			var url1 = '{{ url("ambilAlamat_pasien") }}/'+no_pasien;
			$.get(url1,function(res){
				$('#alPasKet').html(res);
			});

			var url2 = '{{ url("ambilTelp_pasien") }}/'+no_pasien;
			$.get(url2,function(res){
				$('#tePasKet').html(res);
			});

			var url3 = '{{ url("ambilTglLahir_pasien") }}/'+no_pasien;
			$.get(url3,function(res){
				$('#tglPasKet').html(res);
			});

			var url4 = '{{ url("ambilJk_pasien") }}/'+no_pasien;
			$.get(url4,function(res){
				$('#jkPasKet').html(res);
			});

			// KELUHAN
			
			var url5 = '{{ url("ambilKeluhan") }}/'+kode_pemeriksaan;
			$.get(url5,function(res){
				$('#keluKet').html(res);
			});

			var url6 = '{{ url("ambilDiagnosa") }}/'+kode_pemeriksaan;
			$.get(url6,function(res){
				$('#diagKet').html(res);
			});

			var url7 = '{{ url("ambilPerawatan") }}/'+kode_pemeriksaan;
			$.get(url7,function(res){
				$('#perKet').html(res);
			});

			var url8 = '{{ url("ambilTindakan") }}/'+kode_pemeriksaan;
			$.get(url8,function(res){
				$('#tinKet').html(res);
			});

			var url9 = '{{ url("ambilBeratBedan") }}/'+kode_pemeriksaan;
			$.get(url9,function(res){
				$('#berKet').html(res+' Kg.');
			});

			var url10 = '{{ url("ambilDiastolik") }}/'+kode_pemeriksaan;
			$.get(url10,function(res){
				$('#tensiDiaKet').html(res+' mmHg.');
			});

			var url11 = '{{ url("ambilSistolik") }}/'+kode_pemeriksaan;
			$.get(url11,function(res){
				$('#tensiSisKet').html(res+' mmHg.');
			});


			var url12 = '{{ url("totalBayarPemeriksaan") }}/'+kode_pendaftaran;
			$.get(url12,function(res){
				$('#TotalBayarPemeriksaan').html(res);
			});

			var url13 = '{{ url("totalBayarObat") }}/'+kode_pemeriksaan;
			$.get(url13,function(res){
				$('#TotalBayarObat').html(res);

				var tambahkan = parseFloat($("#TotalBayarPemeriksaan").html()) + parseFloat($("#TotalBayarObat").html());
			
				$('#subTotalBayar').html(tambahkan);
			});

			var url14 = '{{ url("ambilListObat") }}/'+kode_pemeriksaan;
			$.get(url14,function(res){
				$('#listResepObat').html(res);

				$('#munculTombol').html('<button type="button" class="btn btn-primary btn-s" data-toggle="modal" data-target=".modal_konfirmasiResep"><i class="fa fa-check"> Simpan</i></button>');
			});

		});

		$('.simpanDataResep').click(function(){
			var kodeNya = kode_pemeriksaan_global;
			var urlnya = '{{ url("simpanDataResep") }}/'+kodeNya;

			$.get(urlnya,function(res){

				if(res = 'Proses Selesai'){
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

				bersihkan_semua();

			});

		});



	});

	// END OF RESEP JS
</script>



<script type="text/javascript">
	// REPORT JS
	$(function(){

		$('.filterJadwal').change(function(){
			var hari = $('.filterJadwal').val();
			var url = '{{ url("cetakJadwalID") }}/'+hari;
			$('.cetakFilterJadwal').attr('href',url);
		});

		var tglAwal = '';
		var tglAkhir = '';

		$('#tglAwalPasienSudah').change(function(){
			tglAwal = $(this).val();
			var url = '{{ url("cetakPasienSudahID") }}/'+tglAwal+'/'+tglAkhir;
			$('.cetakBerdasarTglPasienSudah').attr('href',url);
		});

		$('#tglAkhirPasienSudah').change(function(){
			tglAkhir = $(this).val();
			var url = '{{ url("cetakPasienSudahID") }}/'+tglAwal+'/'+tglAkhir;
			$('.cetakBerdasarTglPasienSudah').attr('href',url);
		});



		$('#tglAwalPasienBelum').change(function(){
			tglAwal = $(this).val();
			var url = '{{ url("cetakPasienBelumID") }}/'+tglAwal+'/'+tglAkhir;
			$('.cetakBerdasarTglPasienBelum').attr('href',url);
		});

		$('#tglAkhirPasienBelum').change(function(){
			tglAkhir = $(this).val();
			var url = '{{ url("cetakPasienBelumID") }}/'+tglAwal+'/'+tglAkhir;
			$('.cetakBerdasarTglPasienBelum').attr('href',url);
		});



		$('#tglAwalPendapatanPemeriksaan').change(function(){
			tglAwal = $(this).val();
			var url = '{{ url("cetakPemasukanPemeriksaaanALLByID") }}/'+tglAwal+'/'+tglAkhir;
			$('.cetakBerdasarTglTransaksiPendapatan_pemeriksaan').attr('href',url);
		});

		$('#tglAkhirPendapatanPemeriksaan').change(function(){
			tglAkhir = $(this).val();
			var url = '{{ url("cetakPemasukanPemeriksaaanALLByID") }}/'+tglAwal+'/'+tglAkhir;
			$('.cetakBerdasarTglTransaksiPendapatan_pemeriksaan').attr('href',url);
		});


		$('#tglAwalPendapatanObat').change(function(){
			tglAwal = $(this).val();
			var url = '{{ url("cetakPemasukanObatALLByID") }}/'+tglAwal+'/'+tglAkhir;
			$('.cetakBerdasarTglTransaksiPendapatan_obat').attr('href',url);
		});

		$('#tglAkhirPendapatanObat').change(function(){
			tglAkhir = $(this).val();
			var url = '{{ url("cetakPemasukanObatALLByID") }}/'+tglAwal+'/'+tglAkhir;
			$('.cetakBerdasarTglTransaksiPendapatan_obat').attr('href',url);
		});


	});
	// END OF REPORT JS
</script>

<script type="text/javascript">
	$(function(){

		function bersihkan(){
			$('#uname').val('');
			$('#pswd').val('');
			$('#k_pswd').val('');
		}

		$('.execute_simpan_now').click(function(e){

			if($('#uname').val() == '' || $('#pswd').val() == '' || $('#k_pswd').val() == ''){

				new PNotify({
                            title: 'Information',
                            text: 'Tidak ada yang di input.',
                            type: 'danger',
                            styling: 'bootstrap3'
                        });

			}else{

				if($('#k_pswd').val() == $('#pswd').val()){

					var url = '{{ url("simpanAkun") }}';
					var data = $('#dataAkun').serializeArray();

					$.post(url,data,function(res){

						if(res = 'Berhasil mengubah user.'){

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

						bersihkan();

					});

				}else{

					new PNotify({
                            title: 'Information',
                            text: 'Password dan Konfirmasi tidak sama.',
                            type: 'danger',
                            styling: 'bootstrap3'
                        });
					bersihkan();

				}

				bersihkan();

			}

		});

	});
</script>