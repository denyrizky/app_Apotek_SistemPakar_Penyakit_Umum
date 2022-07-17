

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pasien Sudah Periksa</title>
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
                        <th>No Pendaftaran</th>
                        <th>Tanggal</th>
                        <th>No Urut</th>
                        <th>No Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Alamat</th>
                      </tr>

					   <?php
                        foreach ($dataPasien as $key => $value) {
                          ?>
                            <tr>
                              <td>{{ $value->NoPendaftaran }}</td>
                              <td>{{ $value->tglPendaftaran }}</td>
                              <td>{{ $value->noUrut }}</td>
                              <td>{{ $value->NoPasien }}</td>
                              <td>{{ $value->namaPas }}</td>
                              <td>{{ $value->almPas }}</td>
                            </tr>
                          <?php
                        }
                      ?>
		
		<tr>
			<td colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="6"><center><small><?php if($asalole == 'zero') echo 'Pasien Yang Sudah Di Periksa'; else echo 'Pasien Yang Belum Di Periksa' ?></small></center></td>
		</tr>
	</table>
</body>
</html>