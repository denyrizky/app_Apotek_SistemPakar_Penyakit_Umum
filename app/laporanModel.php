<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class laporanModel extends Model
{
    
    static function getDataJadwalPraktek(){
    	$query = DB::table('jadwalpraktek')
    			 ->selectRaw('jadwalpraktek.*,dokter.nmDokter')
    			 ->join('dokter','jadwalpraktek.KodeDokter','=','dokter.KodeDokter')
    			 ->get();
    	return $query->toArray();
    }

    static function getDataJadwalPraktekByHari($hari){
    	$query = DB::table('jadwalpraktek')
    			 ->selectRaw('jadwalpraktek.*,dokter.nmDokter')
    			 ->join('dokter','jadwalpraktek.KodeDokter','=','dokter.KodeDokter')
    			 ->where('jadwalpraktek.hari',$hari)
    			 ->get();
    	return $query->toArray();
    }

    static function getDataPasienSudahPeriksa(){
    	$query = DB::table('pendaftaran')
    			 ->selectRaw('pendaftaran.*,pasien.namaPas,pasien.almPas')
    			 ->join('pasien','pendaftaran.NoPasien','=','pasien.NoPasien')
    			 ->whereRaw('pendaftaran.NoPendaftaran IN(SELECT NoPendaftaran FROM pemeriksaan)')
    			 ->get();

    	return $query->toArray();
    }

    static function getDataPasienSudahPeriksaTGL($tgl1,$tgl2){
    	$query = DB::table('pendaftaran')
    			 ->selectRaw('pendaftaran.*,pasien.namaPas,pasien.almPas')
    			 ->join('pasien','pendaftaran.NoPasien','=','pasien.NoPasien')
    			 ->whereRaw('pendaftaran.tglPendaftaran BETWEEN "'.$tgl1.'" AND "'.$tgl2.'" AND pendaftaran.NoPendaftaran IN(SELECT NoPendaftaran FROM pemeriksaan)')
    			 ->get();

    	return $query->toArray();
    }

    static function getDataPasienBelumPeriksa(){
    	$query = DB::table('pendaftaran')
    			 ->selectRaw('pendaftaran.*,pasien.namaPas,pasien.almPas')
    			 ->join('pasien','pendaftaran.NoPasien','=','pasien.NoPasien')
    			 ->whereRaw('pendaftaran.NoPendaftaran NOT IN(SELECT NoPendaftaran FROM pemeriksaan)')
    			 ->get();

    	return $query->toArray();
    }

    static function getDataPasienBelumPeriksaTGL($tgl1,$tgl2){
    	$query = DB::table('pendaftaran')
    			 ->selectRaw('pendaftaran.*,pasien.namaPas,pasien.almPas')
    			 ->join('pasien','pendaftaran.NoPasien','=','pasien.NoPasien')
    			 ->whereRaw('pendaftaran.tglPendaftaran BETWEEN "'.$tgl1.'" AND "'.$tgl2.'" AND pendaftaran.NoPendaftaran NOT IN(SELECT NoPendaftaran FROM pemeriksaan)')
    			 ->get();

    	return $query->toArray();
    }


}
