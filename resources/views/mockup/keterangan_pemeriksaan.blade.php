<?php
	
	foreach ($KeteranganPemeriksaan as $key => $value) {
		$noPer = $value->NoPemeriksaan;
		$keluhan = $value->keluhan;
		$diagnosa = $value->diagnosa;
		$perawatan = $value->perawatan;
		$tindakan = $value->tindakan;
		$beratBadan = $value->beratBadan;
		$tensiDiastolik = $value->tensiDiastolik;
		$tensiSistolik = $value->tensiSistolik;
		$NoPendaftaran = $value->NoPendaftaran;
	}

	$cekPendaftar = \App\modelTransaksi::cekPendaftarByID($NoPendaftaran);

	foreach ($cekPendaftar as $key => $value) {
		$tglDaftar = $value->tglPendaftaran;
		$pas = $value->NoPasien;
	}

	$cekPasien = \App\modelTransaksi::getDataPasienByID($pas);

	foreach ($cekPasien as $key => $value) {
		$namaPas = $value->namaPas;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Keterangan Pemeriksaan</title>
</head>
<body onload="window.print()">
	<table border="1">
		<tr>
			<td colspan="6"><h3><center>POLIKLINIK CENTRAL</center></h3>
				<h5><center>Lead the rest of sick people</center></h5>
			</td>
		</tr>
		<tr>
			<td><b>No Pemeriksaan :</b></td>
			<td colspan="5"><i>{{ $noPer }}</i></td>
		</tr>
		<tr>
			<td><b>No Pendaftaran :</b></td>
			<td colspan="5"><i>{{ $NoPendaftaran }}</i></td>
		</tr>
		<tr>
			<td><b>Tanggal Pendaftaran :</b></td>
			<td colspan="5"><i><?php echo date('d/m/Y',strtotime($tglDaftar)) ?></i></td>
		</tr>
		<tr>
			<td colspan="6"><hr></td>
		</tr>
		<tr>
			<td colspan="6"><center><i>Keterangan Pasien</i></center></td>
		</tr>
		<tr>
			<td colspan="6"><hr></td>
		</tr>
		<tr>
			<td><b>Nama Pasien :</b></td>
			<td colspan="5"><b>{{ $namaPas }}</b></td>
		</tr>
		<tr>
			<td>Keluhan :</td>
			<td colspan="5">{{ $keluhan }}</td>
		</tr>
		<tr>
			<td>Diagnosa :</td>
			<td colspan="5">{{ $diagnosa }}</td>
		</tr>
		<tr>
			<td>Perawatan :</td>
			<td colspan="5">{{ $perawatan }}</td>
		</tr>
		<tr>
			<td>Tindakan :</td>
			<td colspan="5">{{ $tindakan }}</td>
		</tr>
		<tr>
			<td>Berat Badan :</td>
			<td colspan="5">{{ $beratBadan }} Kg.</td>
		</tr>
		<tr>
			<td>Tensi Diastolik :</td>
			<td colspan="5">{{ $tensiDiastolik }} mmHg.</td>
		</tr>
		<tr>
			<td>Tensi Sistolik :</td>
			<td colspan="5">{{ $tensiSistolik }} mmHg.</td>
		</tr>
		<tr>
			<td colspan="6"><hr></td>
		</tr>
		<tr>
			<td colspan="6"><center><i>Biaya</i></center></td>
		</tr>
		<tr>
			<td colspan="6"><hr></td>
		</tr>
		<tr>
			<td><center>Nama Biaya</center></td>
			<td colspan="5"><center>Tarif</center></td>
		</tr>
		<?php
			$cekJenisBiaya = \App\modelTransaksi::getDataJenisBiayaByID($NoPendaftaran);


			foreach ($cekJenisBiaya as $key => $value) {
				
				$cekDataBiaya = \App\modelTransaksi::getJenisBiayaExecuteByID($value->IDJenisBiaya);

				foreach ($cekDataBiaya as $key => $value2) {
					?>
						<tr>
							<td>{{ $value2->namaBiaya }}</td>
							<td colspan="5">Rp. {{ $value2->tarif }}</td>
						</tr>
					<?php
					
				}

			}
		?>
		<tr>
			<td colspan="6"><hr></td>
		</tr>
		<tr>
			<td colspan="6"><center><i>Resep Obat</i></center></td>
		</tr>
		<tr>
			<td>Kode Obat</td>
			<td>Nama Obat</td>
			<td>Dosis</td>
			<td>Jumlah Obat</td>
			<td>Harga Satuan</td>
			<td>SubTotal</td>
		</tr>
		<?php
			$cekResep = \App\modelTransaksi::getDataResep($noPer);

			foreach ($cekResep as $key => $data1) {
				$noResep = $data1->NoResep;
				$proses = $data1->proses;

				$cekObat = \App\modelTransaksi::getDataResepDetail($noResep);
				foreach ($cekObat as $key => $data2) {
					?>
					<tr>
						<td>{{ $data2->KodeObat }}</td>
						<td>{{ $data2->nmObat }}</td>
						<td>{{ $data2->dosis }}</td>
						<td>{{ $data2->jumlahObat }}</td>
						<td>{{ $data2->hargaJual }}</td>
						<td><?php echo $data2->jumlahObat * $data2->hargaJual ?></td>
					</tr>
					<?php
				}

			}
		?>
		<tr>
			<td colspan="6"><hr></td>
		</tr>
		<tr>
			<td colspan="6"><center><small>Segera menuju apoteker untuk mengambil obat dan membayar.</small></center></td>
		</tr>
	</table>
</body>
</html>