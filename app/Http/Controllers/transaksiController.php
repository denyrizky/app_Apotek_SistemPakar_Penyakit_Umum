<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class transaksiController extends Controller
{
	public function hasil(){
		$data['DataDiagnosa'] = \App\modelTransaksi::getDataDiagnosa();
		return view('transaksi/cekdiagnosa')->with($data);
	}

	public function prosesdiagnosa(Request $request){
		$kon=mysqli_connect("localhost","root","","poliklinik",3306);
		if(mysqli_connect_errno()){
			echo "Failed to Connect to Mysql : ".mysqli_connect_error();
		}
		$value = $request->get('isi');
		
		foreach($value as $v){
			// echo $v;
		  }
		$qry='select id from tb_gejala where ';

		$rule_input=array();
		foreach ($value as $where) {
			$qry.=$where."=1 and ";
			array_push($rule_input,$where);
		}
		$qry.="1=1";
		$data=mysqli_query($kon,$qry);
		$id='';
		$rule = DB::table('tb_penyakit')
    			 ->select('gejala')
    			 ->get();
				 
		$temp = array();
		foreach ($rule as $value){
			$bom = explode(",",$value->gejala);
			array_push($temp,$bom);
		}
			
		$status=false;
		for ($i=0; $i <1 ; $i++) {
			$result=($rule_input==$temp[$i]);
			if ($result) {
				$status=true;
			}
		}
		
		if($status==true){
			while ($d=mysqli_fetch_array($data)) {
				$id=$d['id'];
			}
			$cari_penyakit="select * from tb_penyakit where id=$id";
			$db=mysqli_query($kon,$cari_penyakit);
			while ($d=mysqli_fetch_array($db)) {
				$penyakit=$d['penyakit'];
				$info=$d['info'];
				$solusi=$d['solusi'];
				return view('transaksi/hasil')->with(array("penyakit"=>$penyakit,"info"=>$info,"solusi"=>$solusi));
			}

		}else{
			return view('transaksi/error');
		}
	}

	public function diagnosa(){
		$data['DataDiagnosa'] = \App\modelTransaksi::getDataDiagnosa();
		return view('transaksi/cekdiagnosa')->with($data);
	}

    public function noUrut_cetak($id){
    	$data['dataNoUrut'] = \App\modelTransaksi::getAllDataPendaftaranPasienByID($id);
    	return view('mockup/cetakNoUrut')->with($data);
    }

    public function pendaftaran(){
    	$data['getDataPendaftaran'] = \App\modelTransaksi::getAllDataPendaftaranPasien();
    	return view('transaksi/pendaftaran')->with($data);
    }

    public function pendaftaran_simpan(Request $request){
    	$input = $request->all();

    	$data = \App\modelTransaksi::cekJam($input['pilihDokter']);

    	$jamMulai = '';
    	$jamSelesai = '';

    	foreach ($data as $key => $value) {
    		$jamMulai = $value->jamMulai;
    		$jamSelesai = $value->jamSelesai;
    	}

    	date_default_timezone_set('Asia/Jakarta');

    	$jam_sekarang = date('H:m:s');

    	if($jam_sekarang < $jamMulai || $jam_sekarang > $jamSelesai){
    		echo "Jam praktek sudah terlewati atau belum mulai untuk dokter tersebut.";
    	}else{

    		$execute = \App\modelTransaksi::simpanPendaftaran($input);

	    	if($execute){
	    		echo "Berhasil Menyimpan Data Pendaftaran.";
	    	}else{
	    		echo "Gagal Menyimpan Data Pendaftaran.";
	    	}

    	}

    }

    public function pemeriksaan(){
    	date_default_timezone_set('Asia/Jakarta');
    	$hari_ini = date('Y-m-d');
    	$data['listObat'] = \App\modelMaster::getListDataObat();
    	$data['listJenisBiaya'] = \App\modelMaster::getListJenisBiaya();
    	$data['listPendaftar'] = \App\modelTransaksi::getListPendaftarHariIni($hari_ini);
    	return view('transaksi/pemeriksaan')->with($data);
    }

    public function cetakPemeriksaan($id){
    	$data['KeteranganPemeriksaan'] = \App\modelTransaksi::getPemeriksaanByID($id);
    	return view('mockup/keterangan_pemeriksaan')->with($data);
    }

    public function pemeriksaan_simpan(Request $request){
    	$input = $request->all();

    	$execute = \App\modelTransaksi::transaksiPemeriksaanSimpan($input);

    	if($execute == 'zero'){
    		echo 'Gagal menyimpan data pemeriksaan.';
    	}else{
    		$link = url('pemeriksaan/cetak').'/'.$execute;
    		echo 'Berhasil menyimpan data pemeriksaan.<br/><a class="btn btn-primary btn-xs" target="_blank" href="'.$link.'"><i class="fa fa-print"></i> Cetak Keterangan </a>';
    	}

    }

    public function cekPendaftar(){
    	date_default_timezone_set('Asia/Jakarta');
    	$hari_ini = date('Y-m-d');
		$listPendaftar = \App\modelTransaksi::getListPendaftarHariIni($hari_ini);


			foreach ($listPendaftar as $key => $value) {
		?>   
				<tr>
					<td><?php echo $value->noUrut ?></td>
					<td><?php echo $value->NoPendaftaran ?></td>
					<td>
					<?php 						
						echo date('d/m/Y',strtotime($value->tglPendaftaran));
					 ?>									
					</td>
					<td><?php echo $value->NoPasien ?></td>
					<td><?php echo $value->namaPas ?></td>
					<td>
						<center>
						<button type="button" class="btn btn-primary btn-xs pilihNoPendaftaranHariIni" data-dismiss="modal"><i class="fa fa-check"> Pilih </i></button>
						</center>
					</td>
				</tr>
			<?php
			                   	
			}
    }


    public function resep(){
    	$data['listPemeriksaan'] = \App\modelTransaksi::getAllDataPemeriksaanJoin();
    	return view('transaksi/resep')->with($data);
    }


    // PENGAMBILAN DATA
    public function ambilAlamatPasien($id){
    	$execute = \App\modelTransaksi::getAlamatPasienByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}

    }
    public function ambilTelpPasien($id){
    	$execute = \App\modelTransaksi::getTelpPasienByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}

    }
    public function ambilTglLahirPasien($id){
    	$execute = \App\modelTransaksi::getTglLahirPasByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}

    }
    public function ambilJkPasien($id){
    	$execute = \App\modelTransaksi::getJkByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}

    }

    // KELUHAN
    
    public function ambil_Keluhan($id){
    	$execute = \App\modelTransaksi::getKeluhanByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}

    }

    public function ambil_Diagnosa($id){
    	$execute = \App\modelTransaksi::getDiagnosaByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}

    }

    public function ambil_Perawatan($id){
    	$execute = \App\modelTransaksi::getPerawatanByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}

    }

    public function ambil_Tindakan($id){
    	$execute = \App\modelTransaksi::getTindakanByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}

    }

    public function ambil_BeratBedan($id){
    	$execute = \App\modelTransaksi::getBeratBadanByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}

    }

    public function ambil_Diastolik($id){
    	$execute = \App\modelTransaksi::getDiastolikByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}

    }

    public function ambil_Sistolik($id){
    	$execute = \App\modelTransaksi::getSistolikByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}

    }

    // END OF PENGAMBILAN DATA SATU PER SATU

    public function ambilTotalBayarPemeriksaan($id){
    	$execute = \App\modelTransaksi::getTotalBayarPemeriksaanByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}
    }

    public function ambilTotalBayarObat($id){
    	$execute = \App\modelTransaksi::getTotalBayarObatByID($id);

    	if ($execute == 'zero') {
    		echo "NOTHING";
    	}else{
    		echo $execute;
    	}
    }

    public function ambilResep($id){
    	$idResep = \App\modelTransaksi::ambilIDResep($id);
    	$execute = \App\modelTransaksi::getAllDataFromRESEPByID($idResep);

    	foreach ($execute as $key => $value) {
    		?>
				
				<li>
                      <a>
                        <span class="image">
                          <img src="<?php echo asset('Assets') ?>/images/potion.png" alt="img" />
                        </span>
                        <span>
                          <span>Nama : <b><?php echo $value->nmObat ?></b></span><br/>
                          <span class="time"><b><?php echo $value->jumlahObat ?></b> <i><?php echo $value->satuan ?></i></span>
                          <span>Merk : <i><?php echo $value->merk ?></i></span><br/>
                        </span>
                        <span class="message">
                          Dosis : <?php echo $value->dosis ?>
                        </span>
                      </a>
                </li>

    		<?php	
    	}

    }

    public function simpanResepUpdate($id){
    	$idResep = \App\modelTransaksi::ambilIDResep($id);
    	$execute = \App\modelTransaksi::simpanResepUpdateResep($idResep);

    	if($execute){
    		echo "Proses Selesai";
    	}else{
    		echo "Proses Gagal";
    	}

    }

    public function ambilDataPemeriksaanALLINONE(){

    	$execute = \App\modelTransaksi::getAllDataPemeriksaanJoin();

    	foreach ($execute as $key => $value) {
    		?>
				<tr>
                    <td><?php echo $value->NoPemeriksaan ?></td>
                    <td><?php echo $value->NoPendaftaran ?></td>
                    <td><?php echo $value->NoPasien ?></td>
                    <td><?php echo $value->namaPas ?></td>
                    <td>
                        <center>
                        <button type="button" class="btn btn-primary btn-xs pilihPemeriksaan"><i class="fa fa-check"></i> Cek </button>
                        </center>
                    </td>
                </tr>		
    		<?php
    	}


    }


}

?>