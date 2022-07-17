

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pemasukan Obat</title>
</head>
<body onload="window.print();">
	<table border="1">
		<tr>
			<td colspan="7"><h3><center>POLIKLINIK CENTRAL</center></h3>
				<h5><center>Lead the rest of sick people</center></h5>
			</td>
		</tr>
		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>


					  <tr>
                          <td>No Resep</td>
                          <td>No Pasien</td>
                          <td>Nama Pasien</td>
                          <td>Nama Obat</td>
                          <td>Jumlah Obat</td>
                          <td>Harga Jual</td>
                          <td>Total</td>
                        </tr>

					  <?php
                        $subTotal = 0;
                          foreach ($semuaListPendapatan_obat as $key => $value) {
                            ?>
                              <tr>
                                <td>{{ $value->NoResep }}</td>
                                <td>{{ $value->NoPasien }}</td>
                                <td>{{ $value->namaPas }}</td>
                                <td>{{ $value->nmObat }}</td>
                                <td>{{ $value->jumlahObat }}</td>
                                <td>{{ $value->hargaJual }}</td>
                                <td>{{ $value->Total }}</td>
                              </tr>
                            <?php
                            $subTotal += $value->Total;
                          }
                        ?>
                        <tr>
                          <td colspan="6">Sub Total</td>
                          <td><b><?php echo $subTotal ?></b></td>
                        </tr>
		
		<tr>
			<td colspan="7">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="7"><center><small>Pemasukan Dari Penjualan Obat</small></center></td>
		</tr>
	</table>
</body>
</html>