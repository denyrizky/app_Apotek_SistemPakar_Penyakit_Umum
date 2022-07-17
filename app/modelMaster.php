<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class modelMaster extends Model
{	
	static function deletePenyakit($input){
    	$query = DB::table('tb_penyakit')
    			 ->where('kode_pen',$input['delete_kodePenyakit'])
    			 ->delete();

    	if($query) return true; else return false;
    }

	static function editPenyakit($input){
		$duar =  implode(',',$input['isi']);
    	$query = DB::table('tb_penyakit')
    			 ->where('kode_pen',$input['kode'])
    			 ->update([
    			 	'penyakit' => $input['nama_penyakit'],
					'info' => $input['alamat_penyakit'],
					'solusi' => $input['jenisKelPenyakit'],
					'gejala' => $duar,
    			 ]);

    	if($query) return true; else return false;
    }

	static function editpenyakitcek($id){
    	$query = DB::table('tb_penyakit')
				 ->select('*')
    			 ->where('id',$id)
    			 ->get();
				 
    	if($query) return true; else return false;
    }

	static function joinpenyakit(){
    	$query = DB::select(DB::raw(" 
		SELECT *
		FROM tb_penyakit
		INNER JOIN tb_gejala_1
		ON FIND_IN_SET(tb_gejala_1.kode, tb_penyakit.gejala) > 0
		"
	));
		return $query;
		
    }

	static function simpanPenyakit($input){
		$noOtomatis = \App\modelMaster::getnopenyakit();
		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		$duar =  implode(',',$input['isi']);
    	$query = DB::table('tb_penyakit')
    			 ->insert([
    			 	'kode_pen' => $noOtomatis,
    			 	'penyakit' => $input['nama_penyakit'],
					'info' => $input['alamat_penyakit'],
					'solusi' => $input['jenisKelPenyakit'],
					'gejala' => $duar,
    			 ]);
		
    	if($query) return true; else return false;
	}

	static function getnopenyakit(){
    	$kodeAkhir = '';
    	$inisial = 'S';
    	$data = DB::table('tb_penyakit')->select('*')->get();
    	foreach ($data as $key => $value) {
    		$kodeAkhir = $value->kode_pen;
    	}
    	$break = substr($kodeAkhir,1,4);
    	$breakAdd = $break+1;
    	$arr = $inisial.sprintf('%03d',$breakAdd);
    	return $arr;
    }

	static function getDataPenyakit(){
    	$query = DB::table('tb_penyakit')
    			 ->select('*')
    			 ->get();
    	return $query->toArray();
    }

	static function getnogejala(){
    	$kodeAkhir = '';
    	$inisial = 'G';
    	$data = DB::table('tb_gejala_1')->select('*')->get();
    	foreach ($data as $key => $value) {
    		$kodeAkhir = $value->kode;
    	}
    	$break = substr($kodeAkhir,1,4);
    	$breakAdd = $break+1;
    	$arr = $inisial.sprintf('%03d',$breakAdd);
    	return $arr;
    }

	static function deleteGejalaById($id){
    	$query = DB::table('tb_gejala_1')
    			 ->where('kode',$id)
    			 ->delete();

    	if($query) return true; else return false;
    }

	static function editGejala($input){
    	$query = DB::table('tb_gejala_1')
    			 ->where('kode',$input['kode'])
    			 ->update([
    			 	'gejala' => $input['nama_gejala'],
    			 ]);

    	if($query) return true; else return false;
    }

	static function simpangejala($input){
		$noOtomatis = \App\modelMaster::getnogejala();
    	$query = DB::table('tb_gejala_1')
    			 ->insert([
    			 	'kode' => $noOtomatis,
    			 	'gejala' => $input['nama_gejala'],
    			 ]);

    	if($query) return true; else return false;
	}

	static function getDataDiagnosa(){
    	$query = DB::table('tb_gejala_1')
    			 ->select('*')
    			 ->get();
    	return $query->toArray();
    }

	static function cariDataDiagnosa($kode){
    	$query = DB::table('tb_gejala_1')
    			 ->select('*')
				 ->where('kode',$kode)
    			 ->get();
    	return $query->first();
    }

	static function getKodePoli(){
		$kode = '';
		$query = DB::table('poliklinik')
				 ->select('*')
				 ->limit('1')
				 ->get();

		foreach ($query->toArray() as $key => $value) {
			$kode = $value->KodePoli;
		}

		return $kode;
	}

	static function getUser(){
		$id = AUTH::id();
		$user = '';
		$query = DB::table('login')
				 ->where('noUser',$id)
				 ->get();
		foreach ($query->toArray() as $key => $value) {
			$user = $value->NIP;
		}
		return $user;
	}
    
    static function getDataPasien(){
    	$query = DB::table('pasien')
    			 ->select('*')
    			 ->get();

    	return $query->toArray();
    }

    static function getPasienPendaftaranStatusByID($id){
    	date_default_timezone_set('Asia/Jakarta');
    	$tglSekarang = date('Y-m-d');
    	$query = DB::table('pendaftaran')
    			 	 ->select('*')
    			 	 ->where('tglPendaftaran',$tglSekarang)
    			 	 ->where('NoPasien',$id)
    			 	 ->get();

    	return count($query);
    }

    static function getNoUrut(){
    	date_default_timezone_set('Asia/Jakarta');
    	$tglSekarang = date('Y-m-d');
    	$akhir = 0;
    	$data = DB::table('pendaftaran')->select('*')->where('tglPendaftaran',$tglSekarang)->get();
    	$arr = $data->toArray();
    	foreach ($arr as $key => $value) {
    		$akhir = $value->noUrut;
    	}
    	$tambahkan = $akhir + 1;
    	$susun = sprintf('%03d',$tambahkan);

    	return $susun;
    }

    static function getNoOtomatisPendaftaran(){
    	date_default_timezone_set('Asia/Jakarta');
    	$akhir = '';
    	$inisial = date('Ymd');
    	$data = DB::table('pendaftaran')->select('*')->get();
    	$arr = $data->toArray();
    	foreach ($arr as $key => $value) {
    		$akhir = $value->NoPendaftaran;
    	}
    	$trim = substr($akhir,8,12);
    	$tambahkan = $trim + 1;
    	$susun = $inisial.sprintf('%04d',$tambahkan);
    	return $susun;
    }

    static function getNoOtomatisPasien(){
    	$kodeAkhir = '';
    	$inisial = 'P';
    	$data = DB::table('pasien')
    			->select('NoPasien')
    			->get();
    	$arr = $data->toArray();

    	foreach ($arr as $key => $value) {
    		$kodeAkhir = $value->NoPasien;
    	}

    	$lastDBUrut = substr($kodeAkhir,1,4);
    	$tambahkan = $lastDBUrut+1;
    	$NoUrutArr = $inisial.sprintf('%04d',$tambahkan);

    	return $NoUrutArr;
    }

    static function simpanPasien($input){
    	date_default_timezone_set('Asia/Jakarta');
    	$noOtomatis = \App\modelMaster::getNoOtomatisPasien();
    	
    	$query = DB::table('pasien')
    			 ->insert([
    			 	'NoPasien' => $noOtomatis,
    			 	'namaPas' => $input['nama_pasien'],
    			 	'almPas' => $input['alamat_pasien'],
    			 	'telpPas' => $input['telp_pasien'],
    			 	'tglLahirPas' => $input['tglLahir_pasien'],
    			 	'jenisKelPas' => $input['jenisKel_pasien'],
    			 	'tglRegistrasi' => date('Y-m-d')
    			 ]);

    	if($query) return true; else return false;
    }

    static function simpanPasienDaftar($input){

    	try {

    		date_default_timezone_set('Asia/Jakarta');
	    	$noOtomatis = \App\modelMaster::getNoOtomatisPasien();
	    	$NoOtomatisPendaftaran = \App\modelMaster::getNoOtomatisPendaftaran();
	    	$noUrut = \App\modelMaster::getNoUrut();
	    	$nip = \App\modelMaster::getUser();

	    	$query = DB::table('pasien')
	    			 ->insert([
	    			 	'NoPasien' => $noOtomatis,
	    			 	'namaPas' => $input['nama_pasien'],
	    			 	'almPas' => $input['alamat_pasien'],
	    			 	'telpPas' => $input['telp_pasien'],
	    			 	'tglLahirPas' => $input['tglLahir_pasien'],
	    			 	'jenisKelPas' => $input['jenisKel_pasien'],
	    			 	'tglRegistrasi' => date('Y-m-d')
	    			 ]);

	    	$query2 = DB::table('pendaftaran')
	    			  ->insert([
	    			  	'NoPendaftaran' => $NoOtomatisPendaftaran,
	    			  	'tglPendaftaran' => date('Y-m-d'),
	    			  	'noUrut' => $noUrut,
	    			  	'NIP' => $nip,
	    			  	'NoPasien' => $noOtomatis,
	    			  	'KodeJadwal' => 'NOTHING'
	    			  ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}


    }

    static function simpanPasienTunggu($id){
    		date_default_timezone_set('Asia/Jakarta');
			$NoOtomatisPendaftaran = \App\modelMaster::getNoOtomatisPendaftaran();
	    	$noUrut = \App\modelMaster::getNoUrut();
	    	$nip = \App\modelMaster::getUser();

	    $query2 = DB::table('pendaftaran')
	    			  ->insert([
	    			  	'NoPendaftaran' => $NoOtomatisPendaftaran,
	    			  	'tglPendaftaran' => date('Y-m-d'),
	    			  	'noUrut' => $noUrut,
	    			  	'NIP' => $nip,
	    			  	'NoPasien' => $id,
	    			  	'KodeJadwal' => 'NOTHING'
	    			  ]);

	    if($query2) return $NoOtomatisPendaftaran; else return 'zero';
    }

    static function editPasien($input){
    	$query = DB::table('pasien')
    			 ->where('NoPasien',$input['noPasienEdit'])
    			 ->update([
    			 	'namaPas' => $input['namaEdit'],
    			 	'almPas' => $input['alamatEdit'],
    			 	'telpPas' => $input['telpEdit'],
    			 	'tglLahirPas' => $input['tglLahirEdit'],
    			 	'jenisKelPas' => $input['jkEdit'],
    			 ]);

    	if($query) return true; else return false;
    }

    static function deletePasienById($id){
    	$query = DB::table('pasien')
    			 ->where('NoPasien',$id)
    			 ->delete();

    	if($query) return true; else return false;
    }

    static function getAllRecordPasien(){
    	$query = DB::table('pasien')
    			 ->select('*')
    			 ->get();

    	return $query->toArray();
    }

    static function getListDokter(){
    	$query = DB::table('dokter')
    			 ->select('*')
    			 ->get();

    	return $query->toArray();
    }

    static function getNoOtomatisDokter(){
    	$kodeAkhir = '';
    	$inisial = 'D';
    	$data = DB::table('dokter')->select('*')->get();
    	foreach ($data as $key => $value) {
    		$kodeAkhir = $value->KodeDokter;
    	}
    	$break = substr($kodeAkhir,1,4);
    	$breakAdd = $break+1;
    	$arr = $inisial.sprintf('%04d',$breakAdd);
    	return $arr;
    }

    static function simpanDokter($input){
    	$noOtomatis = \App\modelMaster::getNoOtomatisDokter();
    	$query = DB::table('dokter')
    			 ->insert([
    			 	'KodeDokter' => $noOtomatis,
    			 	'nmDokter' => $input['nama_dokter'],
    			 	'almDokter' => $input['alamat_dokter'],
    			 	'jnsKelDokter' => $input['jenisKelDokter'],
    			 	'telpDokter' => $input['tel_dokter'],
    			 	'KodePoli' => $input['poliDokter'],
    			 ]);

    	if($query) return true; else return false;
    }

    static function editDokter($input){
    	$query = DB::table('dokter')
    			 ->where('KodeDokter',$input['edit_kode_dokter'])
    			 ->update([
    			 	'nmDokter' => $input['edit_nama_dokter'],
    			 	'almDokter' => $input['edit_alamat_dokter'],
    			 	'jnsKelDokter' => $input['edit_jenisKelDokter'],
    			 	'telpDokter' => $input['edit_tel_dokter'],
    			 	'KodePoli' => $input['edit_poliDokter'],
    			 ]);

    	if($query) return true; else return false;
    }

    static function deleteDokter($input){
    	$query = DB::table('dokter')
    			 ->where('KodeDokter',$input['delete_kodeDokter'])
    			 ->delete();

    	if($query) return true; else return false;
    }

    static function getListDataObat(){
    	$query = DB::table('obat')
    			 ->select('*')
    			 ->get();
    	return $query->toArray();
    }

    static function getJumlahObat(){
    	$query = DB::table('obat')
    			 ->select('*')
    			 ->get();
    	return count($query->toArray());		
    }

    static function getJumlahObat50k(){
    	$query = DB::table('obat')
    			 ->select('*')
    			 ->whereRaw('hargaJual > 50000')
    			 ->get();
    	return count($query->toArray());
    }

    static function getJumlahObat10kMinus(){
    	$query = DB::table('obat')
    			 ->select('*')
    			 ->whereRaw('hargaJual < 10000')
    			 ->get();
    	return count($query->toArray());
    }

    static function getNoOtomatisObat(){
    	$akhir = '';
    	$inisial = 'B';
    	$data = DB::table('obat')->select('*')->get();
    	$res = $data->toArray();
    	foreach ($res as $key => $value) {
    		$akhir = $value->KodeObat;
    	}
    	$trim = substr($akhir,1,4);
    	$tambahkan = $trim+1;
    	$arr = $inisial.sprintf('%04d',$tambahkan);
    	return $arr;
    }

    static function simpaObat($input){
    	$noOtomatis = \App\modelMaster::getNoOtomatisObat();
    	$query = DB::table('obat')
    			 ->insert([
    			 	'KodeObat' => $noOtomatis, 
    			 	'nmObat' => $input['nama_obat'],
    			 	'merk' => $input['merk_obat'],
    			 	'satuan' => $input['satuan'],
    			 	'hargaJual' => $input['harga_jual'],
    			 ]);

    	if($query) return true;else return false;
    }

    static function simpanEditObat($input){
    	$query = DB::table('obat')
    			 ->where('KodeObat',$input['edit_kodeObat'])
    			 ->update([
    			 	'nmObat' => $input['edit_namaObat'],
    			 	'merk' => $input['edit_merkObat'],
    			 	'satuan' => $input['edit_satuan'],
    			 	'hargaJual' => $input['edit_hargaJual'],
    			 ]);

    	if($query) return true;else return false;

    }

    static function hapusObat($input){
    	$query = DB::table('obat')
    			 ->where('KodeObat',$input['delete_KodeObat'])
    			 ->delete();

    	if($query) return true; else return false;
    }

    static function getDataPegawai(){
    	$query = DB::table('pegawai')
    			 ->select('*')
    			 ->get();
    	return $query->toArray();
    }

    static function getNoOtomatisPegawai(){
    	$akhir = '';
    	$inisial = 'K';
    	$data = DB::table('pegawai')->select('*')->get();
    	$change = $data->toArray();
    	foreach ($change as $key => $value) {
    		$akhir = $value->NIP;
    	}
    	$trim = substr($akhir,1,4);
    	$tambahkan = $trim+1;
    	$satukan = $inisial.sprintf('%04d',$tambahkan);
    	return $satukan;
    }

    static function simpanPegawai($input){
    	try {
        
        $noOtomatis = \App\modelMaster::getNoOtomatisPegawai();
        $query = DB::table('pegawai')
                 ->insert([
                    'NIP' => $noOtomatis,
                    'namaPeg' => $input['nama_Pegawai'],
                    'almPeg' => $input['alamat_Pegawai'],
                    'telpPeg' => $input['telp_Pegawai'],
                    'tglLahirPeg' => $input['tglLahir_Pegawai'],
                    'jnsKelPeg' => $input['jenisKel_Pegawai']
                 ]);

                 $queryCHECK = DB::table('login')
                               ->where('NIP',$noOtomatis)
                               ->orderBy('noUser','DESC')
                               ->limit('1')
                               ->get();

                $noUser = '';
                foreach ($queryCHECK->toArray() as $key => $value) {
                    $noUser = $value->noUser;
                }

                $queryUPD = DB::table('login')
                            ->where('noUser',$noUser)
                            ->update([
                                'password' => bcrypt($input['tglLahir_Pegawai'])
                            ]);
                return true;
        } catch (Exception $e) {
                return false;
        }

    	// if($query) return true;else return false;
    }

    static function simpanPerubahanPegawai($input){
    	$query = DB::table('pegawai')
    			 ->where('NIP',$input['noPegawaiEdit'])
    			 ->update([
    			 	'namaPeg' => $input['namaEdit'],
    			 	'almPeg' => $input['alamatEdit'],
    			 	'telpPeg' => $input['telpEdit'],
    			 	'tglLahirPeg' => $input['tglLahirEdit'],
    			 	'jnsKelPeg' => $input['jkEdit']
    			 ]);

    	if($query) return true;else return false;
    }

    static function deletePegawaiByID($id){
    	$query = DB::table('pegawai')
    			 ->where('NIP',$id)
    			 ->delete();

    	if($query) return true;else return false;
    }

    static function getListJenisBiaya(){
    	$query = DB::table('jenisbiaya')
    			 ->select('*')
    			 ->get();

    	return $query->toArray();
    }

    static function deleteBiayaByID($id){
    	$query = DB::table('jenisbiaya')
    			 ->where('IDJenisBiaya',$id)
    			 ->delete();

    	if($query) return true;else return false;
    }

    static function getNoOtomatisJenisBiaya(){
    	$akhir = '';
    	$inisial = 'BY';
    	$data = DB::table('jenisbiaya')->select('*')->get();
    	$res = $data->toArray();
    	foreach ($res as $key => $value) {
    		$akhir = $value->IDJenisBiaya;
    	}
    	$trim = substr($akhir,2,5);
    	$tambahkan = $trim+1;
    	$susun = $inisial.sprintf('%04d',$tambahkan);
    	return $susun;
    }

    static function simpanJenisBiaya($input){
    	$noOtomatis = \App\modelMaster::getNoOtomatisJenisBiaya();
    	$query = DB::table('jenisbiaya')
    			 ->insert([
    			 	'IDJenisBiaya' => $noOtomatis,
    			 	'namaBiaya' => $input['nama_JenisBiaya'],
    			 	'tarif' => $input['tarif'],
    			 ]);

    	if($query) return true; else return false;
    }

    static function simpanPerubahanJenisBiaya($input){
    	$query = DB::table('jenisbiaya')
    			 ->where('IDJenisBiaya',$input['noJenisBiayaEdit'])
    			 ->update([
    			 	'namaBiaya' => $input['namaEdit'],
    			 	'tarif' => $input['tarifEdit'],
    			 ]);

    	if($query) return true; else return false;
    }

    static function getAllDataPoli(){
    	$query = DB::table('poliklinik')
    			 ->select('*')
    			 ->get();
    	return $query->toArray();
    }

    static function getNoOtomatisPoli(){
    	$akhir = '';
    	$inisial = 'POLI';
    	
    	$data = DB::table('poliklinik')->select('*')->get();
    	$arr = $data->toArray();
    	foreach ($arr as $key => $value) {
    		$akhir = $value->KodePoli;
    	}
    	$trim = substr($akhir,4,8);
    	$tambahkan = $trim+1;
    	$satukan = $inisial.sprintf('%04d',$tambahkan);
    	return $satukan;
    }

    static function simpanPoliklinik($input){
    	$noOtomatis = \App\modelMaster::getNoOtomatisPoli();
    	$query = DB::table('poliklinik')
    			 ->insert([
    			 	'KodePoli' => $noOtomatis,
    			 	'namaPoli' => $input['nama_Poliklinik'],
    			 	'alamatPoli' => $input['alamat_Poliklinik'],
    			 ]);

    	if($query) return true;else return false;
    }

    static function simpanPerubahanPoliklinik($input){
    	$query = DB::table('poliklinik')
    	   		 ->where('KodePoli',$input['noPoliklinikEdit'])
    			 ->update([
    			 	'namaPoli' => $input['namaEdit'],
    			 	'alamatPoli' => $input['alamatEdit'],
    			 ]);

    	if($query) return true;else return false;
    }

    static function deletePoliByID($id){
    	$query = DB::table('poliklinik')
    	   		 ->where('KodePoli',$id)
    			 ->delete();

    	if($query) return true;else return false;
    }

    static function getNoOtomatisJadwal(){
    	$akhir = '';
    	$inisial = 'J';
    	$data = DB::table('jadwalpraktek')->select('*')->get();
    	$arr = $data->toArray();
    	foreach ($arr as $key => $value) {
    		$akhir = $value->KodeJadwal;
    	}
    	$trim = substr($akhir,1,4);
    	$tambahkan = $trim+1;
    	$satukan = $inisial.sprintf('%04d',$tambahkan);
    	return $satukan;
    }

    static function simpanJadwal_praktek($input){
    	$noOtomatis = \App\modelMaster::getNoOtomatisJadwal();
    	$query = DB::table('jadwalpraktek')
    			 ->insert([
    			 	'KodeJadwal' => $noOtomatis,
    			 	'hari' => $input['hari'],
    			 	'jamMulai' => $input['jam_mulai'],
    			 	'jamSelesai' => $input['jam_selesai'],
    			 	'KodeDokter' => $input['kodeDokter']
    			 ]);

    	if($query) return true; else return false;
    }

    static function getAllDataJadwal(){
    	$query = DB::table('jadwalpraktek')
    			 ->select('*')
    			 ->get();
    	return $query->toArray();
    }

    static function simpanPerubahanJadwal_praktek($input){
    	$query = DB::table('jadwalpraktek')
    			 ->where('KodeJadwal',$input['noJadwal_praktekEdit'])
    			 ->update([
    			 	'hari' => $input['hariEdit'],
    			 	'jamMulai' => $input['jam_mulaiEdit'],
    			 	'jamSelesai' => $input['jam_selesaiEdit'],
    			 	'KodeDokter' => $input['kodeDokterEdit']
    			 ]);

    	if($query) return true; else return false;
    }

    static function deleteJadwalPraktekByID($id){
    	$query = DB::table('jadwalpraktek')
    			 ->where('KodeJadwal',$id)
    			 ->delete();

    	if($query) return true; else return false;
    }


}
