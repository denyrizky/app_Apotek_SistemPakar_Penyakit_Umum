<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    
    public function laporan_jadwal_praktek(){
    	$data['dataPraktek'] = \App\laporanModel::getDataJadwalPraktek();
    	return view('laporan/jadwal_praktek')->with($data);
    }

    public function jadwal_execute_single(){
    	$data['dataPraktek'] = \App\laporanModel::getDataJadwalPraktek();
    	return view('mockup/jadwal_praktek')->with($data);
    }

    public function jadwal_execute_hari($hari){
    	$data['dataPraktek'] = \App\laporanModel::getDataJadwalPraktekByHari($hari);
    	return view('mockup/jadwal_praktek')->with($data);
    }

    public function laporan_pasien_sudahPeriksa(){
    	$data['dataPasien'] = \App\laporanModel::getDataPasienSudahPeriksa();
    	return view('laporan/pasien_sudah_periksa')->with($data);
    }

    public function pasienSudah_execute_single(){
    	$data['asalole'] = 'zero';
    	$data['dataPasien'] = \App\laporanModel::getDataPasienSudahPeriksa();
    	return view('mockup/pasien_sudah_periksa')->with($data);
    }

    public function pasienSudah_execute_tgl($event1,$event2){
    	$data['asalole'] = 'zero';
    	$data['dataPasien'] = \App\laporanModel::getDataPasienSudahPeriksaTGL($event1,$event2);
    	return view('mockup/pasien_sudah_periksa')->with($data);
    }

    public function laporan_pasien_belumPeriksa(){
    	$data['dataPasien'] = \App\laporanModel::getDataPasienBelumPeriksa();
    	return view('laporan/pasien_belum_periksa')->with($data);
    }

    public function pasienBelum_execute_single(){
    	$data['asalole'] = 'one';
    	$data['dataPasien'] = \App\laporanModel::getDataPasienBelumPeriksa();
    	return view('mockup/pasien_sudah_periksa')->with($data);
    }

    public function pasienBelum_execute_tgl($event1,$event2){
    	$data['asalole'] = 'one';
    	$data['dataPasien'] = \App\laporanModel::getDataPasienBelumPeriksaTGL($event1,$event2);
    	return view('mockup/pasien_sudah_periksa')->with($data);
    }

    public function total_pemasukan_pemeriksaan(){
    	$data['semuaListPendapatan_pemeriksaan'] = \App\viewPemeriksaan::all();
    	return view('laporan/total_pemasukan_pemeriksaan')->with($data);
    }

    public function pemasukan_pendapatan_execute(){
    	$data['semuaListPendapatan_pemeriksaan'] = \App\viewPemeriksaan::all();
    	return view('mockup/total_pemasukan_pemeriksaan')->with($data);
    }

    public function pemasukan_pendapatan_execute_tgl($tgl1,$tgl2){
    	$data['semuaListPendapatan_pemeriksaan'] = DB::table('v_pemasukan_pemeriksaan')->whereBetween('tglPendaftaran', [$tgl1,$tgl2])->get();
    	return view('mockup/total_pemasukan_pemeriksaan')->with($data);
    }

    public function total_pemasukan_obat(){
    	$data['semuaListPendapatan_obat'] = \App\viewObat::all();
    	return view('laporan/total_pemasukan_obat')->with($data);
    }

    public function pemasukan_pendapatan_obat_execute(){
    	$data['semuaListPendapatan_obat'] = \App\viewObat::all();
    	return view('mockup/total_pemasukan_obat')->with($data);
    }

    public function pemasukan_obat_execute_tgl($tgl1,$tgl2){
    	$data['semuaListPendapatan_obat'] = DB::table('v_pemasukan_obat')->whereBetween('tglPendaftaran', [$tgl1,$tgl2])->get();
    	return view('mockup/total_pemasukan_obat')->with($data);
    }


}
