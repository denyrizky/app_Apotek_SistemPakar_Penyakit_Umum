

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pemasukan Pemeriksaan</title>
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
                          <td>No Pendaftaran</td>
                          <td>Tanggal</td>
                          <td>No Urut</td>
                          <td>No Pasien</td>
                          <td>Nama Pasien</td>
                          <td>Biaya</td>
                        </tr>

					   <?php
                        $subTotal = 0;
                          foreach ($semuaListPendapatan_pemeriksaan as $key => $value) {
                            ?>
                              <tr>
                                <td>{{ $value->NoPendaftaran }}</td>
                                <td>{{ $value->tglPendaftaran }}</td>
                                <td>{{ $value->noUrut }}</td>
                                <td>{{ $value->NoPasien }}</td>
                                <td>{{ $value->namaPas }}</td>
                                <td>{{ $value->jumlah }}</td>
                              </tr>
                            <?php
                            $subTotal += $value->jumlah;
                          }
                        ?>
                        <tr>
                          <td colspan="5">Total Biaya</td>
                          <td><b><?php echo $subTotal ?></b></td>
                        </tr>
		
		<tr>
			<td colspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="6"><center><small>Pemasukan Dari Pemeriksaan</small></center></td>
		</tr>
	</table>
</body>
</html>