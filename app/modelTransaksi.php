<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class modelTransaksi extends Model
{
	static function getDataPenyakit(){
    	$query = DB::table('tb_penyakit')
    			 ->select('*')
    			 ->get();
    	return $query->toArray();
    }

	static function getDataDiagnosa(){
    	$query = DB::table('tb_gejala_1')
    			 ->select('*')
    			 ->get();
    	return $query->toArray();
    }

    static function getAllDataPendaftaranPasienByID($id){
    	$query = DB::table('pendaftaran')
    			 ->selectRaw('pendaftaran.*,pasien.namaPas')
    			 ->where('pendaftaran.NoPendaftaran',$id)
    			 ->join('pasien','pendaftaran.NoPasien','=','pasien.NoPasien')
    			 ->get();

    	return $query->toArray();
    }

    static function getAllDataPendaftaranPasien(){
    	date_default_timezone_set('Asia/Jakarta');
    	$query = DB::table('pendaftaran')
    			 ->selectRaw('pendaftaran.*,pasien.namaPas')
    			 ->join('pasien','pendaftaran.NoPasien','=','pasien.NoPasien')
    			 ->whereRaw('pendaftaran.tglPendaftaran = "'.date('Y-m-d').'" AND pasien.NoPasien IN(SELECT NoPasien FROM pendaftaran)')
    			 ->orderBy('noUrut','ASC')
    			 ->get();

    	return $query->toArray();
    }

    static function getAllDokterSameAsDay(){
    	date_default_timezone_set('Asia/Jakarta');
    	$now = date('D-m-Y');
    	$trim = substr($now, 0,3);

    	$hari = '';

    	if($trim == 'Mon'){
    		$hari = 'Senin';
    	}else if($trim == 'Tue'){
    		$hari = 'Selasa';
    	}else if($trim == 'Wed'){
    		$hari = 'Rabu';
    	}else if($trim == 'Thu'){
    		$hari = 'Kamis';
    	}else if($trim == 'Fri'){
    		$hari = 'Jumat';
    	}else if($trim == 'Sat'){
    		$hari = 'Sabtu';
    	}else if($trim == 'Sun'){
    		$hari = 'Minggu';
    	}

    	$query = DB::table('jadwalpraktek')
    			 ->selectRaw('jadwalpraktek.*,dokter.nmDokter')
    			 ->join('dokter','jadwalpraktek.KodeDokter','=','dokter.KodeDokter')
    			 ->whereRaw('jadwalpraktek.hari = "'.$hari.'"')
    			 ->get();

    	return $query->toArray();
    }

    static function simpanPendaftaran($input){
    	try {
    		
    		foreach ($input['nopen'] as $key => $value) {
    			
    			$query = DB::table('pendaftaran')
    					 ->where('NoPendaftaran',$value)
    					 ->update([
    					 	'KodeJadwal' => $input['pilihDokter']
    					 ]);

    		}

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

    static function cekJam($id){
    	$query = DB::table('jadwalpraktek')
    			 ->select('*')
    			 ->where('KodeJadwal',$id)
    			 ->get();

    	return $query->toArray();
    }

    static function getListPendaftarHariIni($hari){
    	$query = DB::table('pendaftaran')
    			 ->selectRaw('pendaftaran.*,pasien.namaPas')
    			 ->join('pasien','pendaftaran.NoPasien','=','pasien.NoPasien')
    			 ->whereRaw('pendaftaran.tglPendaftaran = "'.$hari.'" AND pendaftaran.KodeJadwal != "NOTHING" AND pendaftaran.NoPendaftaran NOT IN(SELECT NoPendaftaran FROM pemeriksaan)')
    			 ->orderBy('pendaftaran.noUrut','ASC')
    			 ->get();
    	return $query->toArray();
    }

    static function getNoOtomatisPemeriksaan(){
    	$akhir = '';
    	date_default_timezone_set('Asia/Jakarta');
    	$inisial = 'PM';
    	$insial2 = date('Ymd');
    	$data = DB::table('pemeriksaan')->select('*')->get();
    	$arr = $data->toArray();
    	foreach ($arr as $key => $value) {
    		$akhir = $value->NoPemeriksaan;
    	}
    	$trim = substr($akhir,10,14);
    	$tambahkan = $trim+1;
    	$susun = $inisial.$insial2.sprintf('%04d',$tambahkan);
    	return $susun;
    }

    static function getNoOtomatisResep(){
    	$akhir = '';
    	date_default_timezone_set('Asia/Jakarta');
    	$inisial = 'RE';
    	$insial2 = date('Ymd');
    	$data = DB::table('resep')->select('*')->get();
    	$arr = $data->toArray();
    	foreach ($arr as $key => $value) {
    		$akhir = $value->NoResep;
    	}
    	$trim = substr($akhir,10,14);
    	$tambahkan = $trim+1;
    	$susun = $inisial.$insial2.sprintf('%04d',$tambahkan);
    	return $susun;
    }

    static function transaksiPemeriksaanSimpan($input){

    	try {
    		
    		$noOtomatis_pemeriksaan = \App\modelTransaksi::getNoOtomatisPemeriksaan();
    		$noOtomatis_resep = \App\modelTransaksi::getNoOtomatisResep();

    		$query_1 = DB::table('pemeriksaan')
    				   ->insert([
    				   	'NoPemeriksaan' => $noOtomatis_pemeriksaan,
    				   	'keluhan' => $input['keluhan'],
    				   	'diagnosa' => $input['diagnosa'],
    				   	'perawatan' => $input['perawatan'],
    				   	'tindakan' => $input['tindakan'],
    				   	'beratBadan' => $input['berat_badan'],
    				   	'tensiDiastolik' => $input['tensiDiastolik'],
    				   	'tensiSistolik' => $input['tensiSistolik'],
    				   	'NoPendaftaran' => $input['NoPendaftaran']
    				   ]);

    		foreach ($input['idJenis'] as $key => $jb) {
    			$query_2 = DB::table('det_pendaftaran')
    				   ->insert([
    				   	'NoPendaftaran' => $input['NoPendaftaran'],
    				   	'IDJenisBiaya' => $jb,
    				   ]);
    		}

    		$query_3 = DB::table('resep')
    				   ->insert([
    				   	'NoResep' => $noOtomatis_resep,
    				   	'NoPemeriksaan' => $noOtomatis_pemeriksaan,
    				   	'proses' => 'Menuju Apoteker'
    				   ]);

    		foreach ($input['kodeObat'] as $key => $ko) {
    			$query_4 = DB::table('det_resep')
    					   ->insert([
    					   	'NoResep' => $noOtomatis_resep,
    					   	'KodeObat' => $ko,
    					   	'dosis' => $input['dosis'][$key],
    					   	'jumlahObat' => $input['jmlObat'][$key]
    					   ]);
    		}

    		return $noOtomatis_pemeriksaan;
    	} catch (Exception $e) {
    		return 'zero';
    	}

    }

    static function getPemeriksaanByID($id){
    	$query = DB::table('pemeriksaan')
    			 ->select('*')
    			 ->where('NoPemeriksaan',$id)
    			 ->get();

    	return $query->toArray();
    }

    static function cekPendaftarByID($id){
    	$query = DB::table('pendaftaran')
    			 ->select('*')
    			 ->where('NoPendaftaran',$id)
    			 ->get();

    	return $query->toArray();
    }

    static function getDataPasienByID($id){
    	$query = DB::table('pasien')
    			 ->select('*')
    			 ->where('NoPasien',$id)
    			 ->get();

    	return $query->toArray();
    }

    static function getDataJenisBiayaByID($id){
    	$query = DB::table('det_pendaftaran')
    			 ->select('*')
    			 ->where('NoPendaftaran',$id)
    			 ->get();

    	return $query->toArray();
    }

    static function getJenisBiayaExecuteByID($id){
    	$query = DB::table('jenisbiaya')
    			 ->select('*')
    			 ->where('IDJenisBiaya',$id)
    			 ->get();

    	return $query->toArray();
    }

    static function getDataResep($id){
    	$query = DB::table('resep')
    			 ->select('*')
    			 ->where('NoPemeriksaan',$id)
    			 ->get();

    	return $query->toArray();
    }

    static function getDataResepDetail($id){
    	$query = DB::table('det_resep')
    			 ->selectRaw('det_resep.*,obat.nmObat,obat.hargaJual')
    			 ->join('obat','det_resep.KodeObat','=','obat.KodeObat')
    			 ->where('det_resep.NoResep',$id)
    			 ->get();

    	return $query->toArray();
    }

    static function getAllDataPemeriksaanJoin(){
    	$query = DB::table('pemeriksaan')
    			 ->selectRaw('pemeriksaan.NoPemeriksaan,pemeriksaan.NoPendaftaran,pendaftaran.NoPasien,pasien.namaPas')
    			 ->join('pendaftaran','pemeriksaan.NoPendaftaran','=','pendaftaran.NoPendaftaran')
    			 ->join('pasien','pendaftaran.NoPasien','=','pasien.NoPasien')
    			 ->join('resep','pemeriksaan.NoPemeriksaan','=','resep.NoPemeriksaan')
    			 ->where('resep.proses','Menuju Apoteker')
    			 ->get();
    	return $query->toArray();
    }

    // PENGAMBILAN DATA SATU PER SATU
    static function getAlamatPasienByID($id){
    	try {
    	
    		$query = DB::table('pasien')
    			 ->where('NoPasien',$id)
    			 ->get();
	    	$data = $query->toArray();

	    	foreach ($data as $key => $value) {
	    		$kode = $value->almPas;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getTelpPasienByID($id){
    	try {
    	
    		$query = DB::table('pasien')
    			 ->where('NoPasien',$id)
    			 ->get();
	    	$data = $query->toArray();

	    	foreach ($data as $key => $value) {
	    		$kode = $value->telpPas;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getTglLahirPasByID($id){
    	try {
    	
    		$query = DB::table('pasien')
    			 ->where('NoPasien',$id)
    			 ->get();
	    	$data = $query->toArray();

	    	foreach ($data as $key => $value) {
	    		$kode = $value->tglLahirPas;
	    	}
    	
    	return date('d/m/Y',strtotime($kode));

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getJkByID($id){
    	try {
    	
    		$query = DB::table('pasien')
    			 ->where('NoPasien',$id)
    			 ->get();
	    	$data = $query->toArray();

	    	foreach ($data as $key => $value) {
	    		$kode = $value->jenisKelPas;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getKeluhanByID($id){
    	try {
    	
    		$query = DB::table('pemeriksaan')
    			 ->where('NoPemeriksaan',$id)
    			 ->get();
	    	$data = $query->toArray();

	    	foreach ($data as $key => $value) {
	    		$kode = $value->keluhan;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getDiagnosaByID($id){
    	try {
    	
    		$query = DB::table('pemeriksaan')
    			 ->where('NoPemeriksaan',$id)
    			 ->get();
	    	$data = $query->toArray();

	    	foreach ($data as $key => $value) {
	    		$kode = $value->diagnosa;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getPerawatanByID($id){
    	try {
    	
    		$query = DB::table('pemeriksaan')
    			 ->where('NoPemeriksaan',$id)
    			 ->get();
	    	$data = $query->toArray();

	    	foreach ($data as $key => $value) {
	    		$kode = $value->perawatan;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getTindakanByID($id){
    	try {
    	
    		$query = DB::table('pemeriksaan')
    			 ->where('NoPemeriksaan',$id)
    			 ->get();
	    	$data = $query->toArray();

	    	foreach ($data as $key => $value) {
	    		$kode = $value->tindakan;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getBeratBadanByID($id){
    	try {
    	
    		$query = DB::table('pemeriksaan')
    			 ->where('NoPemeriksaan',$id)
    			 ->get();
	    	$data = $query->toArray();

	    	foreach ($data as $key => $value) {
	    		$kode = $value->beratBadan;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getDiastolikByID($id){
    	try {
    	
    		$query = DB::table('pemeriksaan')
    			 ->where('NoPemeriksaan',$id)
    			 ->get();
	    	$data = $query->toArray();

	    	foreach ($data as $key => $value) {
	    		$kode = $value->tensiDiastolik;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getSistolikByID($id){
    	try {
    	
    		$query = DB::table('pemeriksaan')
    			 ->where('NoPemeriksaan',$id)
    			 ->get();
	    	$data = $query->toArray();

	    	foreach ($data as $key => $value) {
	    		$kode = $value->tensiSistolik;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getTotalBayarPemeriksaanByID($id){
    	try {
    	
    		$query = DB::select("SELECT pendaftaran.NoPendaftaran,sum(jenisbiaya.tarif) as `BayarPemeriksaan` FROM pendaftaran JOIN det_pendaftaran ON(pendaftaran.NoPendaftaran = det_pendaftaran.NoPendaftaran) JOIN jenisbiaya ON(det_pendaftaran.IDJenisBiaya = jenisbiaya.IDJenisBiaya) WHERE pendaftaran.NoPendaftaran = :id GROUP BY pendaftaran.NoPendaftaran", ['id' => $id]);

	    	

	    	foreach ($query as $key => $value) {
	    		$kode = $value->BayarPemeriksaan;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function getTotalBayarObatByID($id){
    	try {
    	
    		// $query = DB::select("SELECT pemeriksaan.NoPemeriksaan,MIN(resep.NoResep),sum(obat.hargaJual * det_resep.jumlahObat) as `TotalBayarObat` FROM pemeriksaan JOIN resep ON(pemeriksaan.NoPemeriksaan = resep.NoPemeriksaan) JOIN det_resep ON(resep.NoResep = det_resep.NoResep) JOIN obat ON(det_resep.KodeObat = obat.KodeObat) WHERE pemeriksaan.NoPemeriksaan = :id GROUP BY pemeriksaan.NoPemeriksaan", ['id' => $id]);

			$query = \App\bayarModel::where('NoPemeriksaan',$id)
					 ->get();	    	

	    	foreach ($query as $key => $value) {
	    		$kode = $value->TotalBayarObat;
	    	}
    	
    	return $kode;

    	} catch (Exception $e) {
    		return 'zero';
    	}
    }

    static function ambilIDResep($id){
    	$query = DB::table('resep')
    			 ->where('NoPemeriksaan',$id)
    			 ->get();

    	foreach ($query->toArray() as $key => $value) {
    		$kode = $value->NoResep;
    	}

    	return $kode;
    }

    static function getAllDataFromRESEPByID($id){
    	$query = DB::select('SELECT det_resep.*,obat.nmObat,obat.merk,obat.satuan FROM det_resep JOIN obat ON(det_resep.KodeObat = obat.KodeObat) WHERE det_resep.NoResep = :id',['id' => $id]);
 
    	return $query;
    }

    // END OF PENGAMBILAN DATA

    static function simpanResepUpdateResep($id){
    	try {

    		$query = DB::table('resep')
    				 ->where('NoResep',$id)
    				 ->update([
    				 	'proses' => 'Selesai'
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

}
