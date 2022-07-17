<?php

foreach ($dataNoUrut as $key => $value) {
	$noUrut = $value->noUrut;
	$namaPas = $value->namaPas;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CETAK No URUT</title>
</head>
<!--  -->
<body onload="window.print();">
	<table border="1">
		<tr>
			<td><h3><center>POLIKLINIK CENTRAL</center></h3>
				<h5><center>Lead the rest of sick people</center></h5>
			</td>
		</tr>
		<tr>
			<td>Tanggal : <?php
				date_default_timezone_set('Asia/Jakarta');
			 echo date('d-m-Y'); ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><b style="font-size: 30px;"><center>NO URUT</center></b></td>
		</tr>

		<tr>
			<td><b style="font-size: 35px;"><center>{{ $noUrut }}</center></b></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><center>Nama Pasien : {{ $namaPas }}</center></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><center><small>Mohon menunggu</small></center></td>
		</tr>
	</table>
</body>
</html>