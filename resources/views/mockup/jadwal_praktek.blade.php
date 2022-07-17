

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Jadwal Praktek Dokter ALL</title>
</head>
<body onload="window.print();">
	<table border="1">
		<tr>
			<td colspan="6"><h3><center>POLIKLINIK CENTRAL</center></h3>
				<h5><center>Lead the rest of sick people</center></h5>
			</td>
		</tr>
		<tr>
			<td colspan="6">&nbsp;</td>
		</tr>

					  <tr>
                        <th>Kode Jadwal</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Kode Dokter</th>
                        <th>Nama Dokter</th>
                      </tr>

		<?php
			foreach ($dataPraktek as $key => $value) {
				?>
							<tr>
                              <td>{{ $value->KodeJadwal }}</td>
                              <td>{{ $value->hari }}</td>
                              <td>{{ $value->jamMulai }}</td>
                              <td>{{ $value->jamSelesai }}</td>
                              <td>{{ $value->KodeDokter }}</td>
                              <td>{{ $value->nmDokter }}</td>
                            </tr>
				<?php
			}
		?>
		
		<tr>
			<td colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="6"><center><small>Jadwal Praktek Dokter</small></center></td>
		</tr>
	</table>
</body>
</html>