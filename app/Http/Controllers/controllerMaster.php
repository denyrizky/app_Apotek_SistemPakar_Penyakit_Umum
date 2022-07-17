<?php

namespace App\Http\Controllers;
use App\Models\Flight;
use Illuminate\Http\Request;
use DB;
class controllerMaster extends Controller
{
	public function penyakitDelete(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::deletePenyakit($input);

    	if($execute){
    		echo "Berhasil Menghapus Data Penyakit";
    	}else{
    		echo "Gagal Menghapus Data Penyakit";
    	}
    }

	public function penyakitupdate(Request $request){
    	$input = $request->all();
		// $data['penyakit'] = \App\modelMaster::getDataPenyakit();
		// $data['DataDiagnosa'] = \App\modelTransaksi::getDataDiagnosa();
    	$execute = \App\modelMaster::editPenyakit($input);
    	if($execute){
			return redirect('master/penyakit')->with('status', 'Profile updated!');
    	}else{
			return redirect('master/penyakit')->with('status', 'Profile updated!');
    	}

    }

	public function penyakitedit($id){
		$data['DataDiagnosa'] = \App\modelTransaksi::getDataDiagnosa();
		$query = DB::table('tb_penyakit')
				 ->select('*')
    			 ->where('id',$id)
    			 ->get();
		return view('master/editpenyakit',['users'=>$query])->with($data);
	}

	

	public function penyakit(){
    	$data['penyakit'] = \App\modelMaster::getDataPenyakit();
		$data['DataDiagnosa'] = \App\modelTransaksi::getDataDiagnosa();
		$data['notip'] =  "input";
    	return view('master/penyakit')->with($data);
    }

	public function penyakitSimpan(Request $request){
    	$input = $request->all();
    	
    	$execute = \App\modelMaster::simpanPenyakit($input);

    	if($execute){
    		echo 'Berhasil Menyimpan Data Penyakit';
    	}else{
    		echo 'Gagal Menyimpan Data Penyakit';
    	}

    }

	public function allRecordGejala(){
    	$data = \App\modelMaster::getDataDiagnosa();

    	foreach ($data as $key => $value) {
    		?>
				
				<tr>
					<td style="width: 100px;" class="toolGejala">
                       
                    </td>
                    <td><?php echo $value->kode ?></td>
                    <td><?php echo $value->gejala ?></td>

                </tr>

    		<?php
    	}
    }

	public function gejalaDelete($id){
    	$execute = \App\modelMaster::deleteGejalaById($id);

    	if($execute){
    		echo 'Berhasil Menghapus Data Gejala';
    	}else{
    		echo 'Gagal Menghapus Data Gejala';
    	}
    }

	public function gejalaEdit(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::editGejala($input);

    	if($execute){
    		echo "Berhasil Mengubah Data Gejala";
    	}else{
    		echo "Gagal Mengubah Data Gejala";
    	}

    }

	public function gejalaSimpan(Request $request){
    	$input = $request->all();
    	
    	$execute = \App\modelMaster::simpangejala($input);

    	if($execute){
    		echo 'Berhasil Menyimpan Data Gejala';
    	}else{
    		echo 'Gagal Menyimpan Data Gejala';
    	}

    }

	public function gejala(){
    	$data['gejala'] = \App\modelMaster::getDataDiagnosa();
    	return view('master/gejala')->with($data);
    }

    public function pasien(){
    	$data['Listpasien'] = \App\modelMaster::getDataPasien();
    	return view('master/pasien')->with($data);
    }

    public function pasienSimpan(Request $request){
    	$input = $request->all();
    	
    	$execute = \App\modelMaster::simpanPasien($input);

    	if($execute){
    		echo 'Berhasil Menyimpan Data Pasien';
    	}else{
    		echo 'Gagal Menyimpan Data Pasien';
    	}

    }

    public function pasienSimpanDaftar(Request $request){
    	$input = $request->all();
    	
    	$execute = \App\modelMaster::simpanPasienDaftar($input);

    	if($execute){
    		echo 'Berhasil Menyimpan Data dan Mendaftarkan Pasien.';
    	}else{
    		echo 'Gagal Menyimpan Data dan Mendaftarkan Pasien.';
    	}

    }

    public function pasienEdit(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::editPasien($input);

    	if($execute){
    		echo 'Berhasil Mengubah Data Pasien';
    	}else{
    		echo 'Gagal Mengubah Data Pasien';
    	}

    }

    public function pasienDelete($id){
    	$execute = \App\modelMaster::deletePasienById($id);

    	if($execute){
    		echo 'Berhasil Menghapus Data Pasien';
    	}else{
    		echo 'Gagal Menghapus Data Pasien';
    	}
    }

    public function cekPasienDaftar($id){
    	$execute = \App\modelMaster::getPasienPendaftaranStatusByID($id);

    	if($execute == 0){
    		echo "Pasien ini belum mendaftar hari ini.";
    	}else{
    		echo "Pasien ini sudah mendaftar sebanyak <b>".$execute." kali</b> untuk hari ini.";
    	}
    }

    public function daftarkanPasienNow($id){
    	$execute = \App\modelMaster::simpanPasienTunggu($id);

    	if($execute != 'zero'){
    		$link = url('pendaftaran/cetaknoUrut').'/'.$execute;
    		echo "Berhasil Mendaftarkan Pasien ke daftar tunggu. Tentukan jadwal dokter nya di form transaksi. <br/><a class='btn btn-info btn-xs' target='_blank' href='".$link."'>Cetak No Urut</a>";
    	}else{
    		echo "Gagal Mendaftarkan Pasien ke daftar tunggu.";
    	}
    }

    public function allRecordPasien(){
    	$data = \App\modelMaster::getAllRecordPasien();

    	foreach ($data as $key => $value) {
    		?>
				<tr>
                    <td style="width: 100px;" class="toolPasien">
                       
                    </td>
                    <td><?php echo $value->NoPasien ?></td>
                    <td><?php echo $value->namaPas ?></td>
                    <td><?php echo $value->almPas ?></td>
                    <td><?php echo $value->telpPas ?></td>
                    <td><?php echo $value->tglLahirPas ?></td>
                    <td><?php echo $value->jenisKelPas ?></td>
                    <td><?php echo $value->tglRegistrasi ?></td>
                    <td><center><button type="button" class="btn btn-info btn-xs daftarkanPasien">Daftar</button></center></td>
                </tr>
    		<?php
    	}

    }

    public function allRecordDokter(){
    	$data = \App\modelMaster::getListDokter();

    	foreach ($data as $key => $value) {
    		?>
				
				<tr>
                    <td>
                       <center>
                          <button type="button" class="btn btn-info btn-s editDokter" data-toggle="modal" data-target=".modal_editDokter"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-warning btn-s deleteDokter" data-toggle="modal" data-target=".modal_deleteDokter"><i class="fa fa-trash"></i></button>
                        </center>
                    </td>
                    <td><?php echo $value->KodeDokter ?></td>
                    <td><?php echo $value->nmDokter ?></td>
                    <td><?php echo $value->almDokter ?></td>
                    <td><?php echo $value->jnsKelDokter ?></td>
                    <td><?php echo $value->telpDokter ?></td>
                    <td><?php echo $value->KodePoli ?></td>
                </tr>

    		<?php
    	}
    }


    public function dokter(){
    	$data['showDokter'] = \App\modelMaster::getListDokter();
    	return view('master/dokter')->with($data);
    }

    public function dokterSimpan(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::simpanDokter($input);

    	if($execute){
    		echo "Berhasil Mendaftarkan Dokter Baru";
    	}else{
    		echo "Gagal Mendaftarkan Dokter Baru";
    	}

    }

    public function dokterEdit(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::editDokter($input);

    	if($execute){
    		echo "Berhasil Mengubah Data Dokter";
    	}else{
    		echo "Gagal Mengubah Data Dokter";
    	}

    }

    public function dokterDelete(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::deleteDokter($input);

    	if($execute){
    		echo "Berhasil Menghapus Data Dokter";
    	}else{
    		echo "Gagal Menghapus Data Dokter";
    	}
    }

    public function obat(){
    	$data['listObat'] = \App\modelMaster::getListDataObat();
    	return view('master/obat')->with($data);
    }

    public function obatSimpan(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::simpaObat($input);

    	if($execute){
    		echo "Berhasil Menambahkan Obat Baru";
    	}else{
    		echo "Gagal Menambahkan Obat Baru";
    	}


    }

    public function obatEdit(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::simpanEditObat($input);

    	if($execute){
    		echo "Berhasil Mengubah Data Obat";
    	}else{
    		echo "Gagal Mengubah Data Obat";
    	}

    }

    public function obatDelete(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::hapusObat($input);

    	if($execute){
    		echo "Berhasil Menghapus Data Obat";
    	}else{
    		echo "Gagal Menghapus Data Obat";
    	}


    }

    public function allRecordObat(){
    	$data = \App\modelMaster::getListDataObat();

    		$x = 1;
            foreach ($data as $key => $value) {
            $angka = rand(1, 100);
    		?>
			
                              <tr>
                                <td><b><?php echo $x ?>. </b></td>
                                <td><?php echo $value->KodeObat; ?></td>
                                <td><?php echo $value->nmObat; ?></td>
                                <td><?php echo $value->merk; ?></td>
                                <td><?php echo $value->satuan; ?></td>
                                <td><?php echo $value->hargaJual; ?></td>
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

    }


    public function pegawai(){
    	$data['Listpegawai'] = \App\modelMaster::getDataPegawai();
    	return view('master/pegawai')->with($data);
    }

    public function pegawaiSimpan(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::simpanPegawai($input);

    	if($execute){
    		echo "Berhasil Menyimpan Data Pegawai";
    	}else{
    		echo "Gagal Menyimpan Data Pegawai";
    	}

    }

    public function pegawaiEdit(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::simpanPerubahanPegawai($input);

    	if($execute){
    		echo "Berhasil Mengubah Data Pegawai";
    	}else{
    		echo "Gagal Mengubah Data Pegawai";
    	}

    }

    public function pegawaiDelete($id){
    	$execute = \App\modelMaster::deletePegawaiByID($id);

    	if($execute){
    		echo 'Berhasil Menghapus Data Pegawai';
    	}else{
    		echo 'Gagal Menghapus Data Pegawai';
    	}
    }

    public function allRecordPegawai(){
    	$data = \App\modelMaster::getDataPegawai();

    	foreach ($data as $key => $value) {
    		?>
				<tr>
                    <td style="width: 100px;" class="toolPegawai">
                       
                    </td>
                    <td><?php echo $value->NIP ?></td>
                    <td><?php echo $value->namaPeg ?></td>
                    <td><?php echo $value->almPeg ?></td>
                    <td><?php echo $value->telpPeg ?></td>
                    <td><?php echo $value->tglLahirPeg ?></td>
                    <td><?php echo $value->jnsKelPeg ?></td>
                </tr>
    		<?php
    	}

    }

    public function jenis_biaya(){
    	$data['Listjenisbiaya'] = \App\modelMaster::getListJenisBiaya();
    	return view('master/jenis_biaya')->with($data);
    }

    public function jenis_biayaSimpan(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::simpanJenisBiaya($input);

    	if($execute){
    		echo "Berhasil Menyimpan Data JenisBiaya";
    	}else{
    		echo "Gagal Menyimpan Data JenisBiaya";
    	}

    }

    public function jenis_biayaEdit(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::simpanPerubahanJenisBiaya($input);

    	if($execute){
    		echo "Berhasil Mengubah Data JenisBiaya";
    	}else{
    		echo "Gagal Mengubah Data JenisBiaya";
    	}

    }

    public function jenis_biayaDelete($id){
    	$execute = \App\modelMaster::deleteBiayaByID($id);

    	if($execute){
    		echo 'Berhasil Menghapus Data JenisBiaya';
    	}else{
    		echo 'Gagal Menghapus Data JenisBiaya';
    	}
    }


    public function allRecordJenis_biaya(){
    	$data = \App\modelMaster::getListJenisBiaya();

    	foreach ($data as $key => $value) {
    		?>
				<tr>
                    <td style="width: 100px;" class="toolJenisBiaya">
                       
                    </td>
                    <td><?php echo $value->IDJenisBiaya ?></td>
                    <td><?php echo $value->namaBiaya ?></td>
                    <td><?php echo $value->tarif ?></td>
                </tr>
    		<?php
    	}
    }

    public function poliklinik(){
    	$data['Listpoliklinik'] = \App\modelMaster::getAllDataPoli();
    	return view('master/poliklinik')->with($data);
    }

    public function poliklinikSimpan(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::simpanPoliklinik($input);

    	if($execute){
    		echo "Berhasil Menyimpan Data Poliklinik";
    	}else{
    		echo "Gagal Menyimpan Data Poliklinik";
    	}
    	
    }

	public function allRecordPoliklinik(){
    	$data = \App\modelMaster::getAllDataPoli();

    	foreach ($data as $key => $value) {
    		?>
				<tr>
                    <td style="width: 100px;" class="toolPoliklinik">
                       
                    </td>
                    <td><?php echo $value->KodePoli ?></td>
                    <td><?php echo $value->namaPoli ?></td>
                    <td><?php echo $value->alamatPoli ?></td>
                </tr>
    		<?php
    	}
    }

    public function poliklinikEdit(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::simpanPerubahanPoliklinik($input);

    	if($execute){
    		echo "Berhasil Mengubah Data Poliklinik";
    	}else{
    		echo "Gagal Mengubah Data Poliklinik";
    	}
    }

    public function poliklinikDelete($id){
    	$execute = \App\modelMaster::deletePoliByID($id);

    	if($execute){
    		echo 'Berhasil Menghapus Data Poliklinik';
    	}else{
    		echo 'Gagal Menghapus Data Poliklinik';
    	}
    }

    public function jadwal_praktek(){
    	$data['Listjadwalpraktek'] = \App\modelMaster::getAllDataJadwal();
    	return view('master/jadwal_praktek')->with($data);
    }

    public function jadwal_praktekSimpan(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::simpanJadwal_praktek($input);

    	if($execute){
    		echo "Berhasil Menyimpan Data Jadwal Praktek";
    	}else{
    		echo "Gagal Menyimpan Data Jadwal Praktek";
    	}
    }

    public function jadwal_praktekEdit(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::simpanPerubahanJadwal_praktek($input);

    	if($execute){
    		echo "Berhasil Mengubah Data Jadwal Praktek";
    	}else{
    		echo "Gagal Mengubah Data Jadwal Praktek";
    	}
    }

    public function jadwal_praktekDelete($id){
    	$execute = \App\modelMaster::deleteJadwalPraktekByID($id);

    	if($execute){
    		echo 'Berhasil Menghapus Data Jadwal Praktek';
    	}else{
    		echo 'Gagal Menghapus Data Jadwal Praktek';
    	}
    }

    public function allRecordjadwal_praktek(){
    	$data = \App\modelMaster::getAllDataJadwal();

    	foreach ($data as $key => $value) {
    		?>
				<tr>
                    <td style="width: 100px;" class="toolJadwal_praktek">
                       
                    </td>
                    <td><?php echo $value->KodeJadwal ?></td>
                    <td><?php echo $value->hari ?></td>
                    <td><?php echo $value->jamMulai ?></td>
                    <td><?php echo $value->jamSelesai ?></td>
                    <td><?php echo $value->KodeDokter ?></td>
                </tr>
    		<?php
    	}
    }


}
?>