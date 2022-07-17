@extends('templates/header')
@section('content')
<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            @include('templates/navigation')


<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Laporan <small>Create</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>
			<form method="POST" action="{{ url('pemeriksaan/simpan') }}" class="form-horizontal form-label-left" id="fpemeriksaan">
			{{ csrf_field() }}
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pemasukan Dari Pembelian Obat</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <p>Tentukan tanggal awal dan akhir transaksi atau cetak semua.</p>

                    <a class="btn btn-primary btn-s" href="{{ url('cetakPemasukanObatALL') }}" target="_blank">CETAK SEMUA</a>
                    <a class="btn btn-info btn-s cetakBerdasarTglTransaksiPendapatan_obat" href="#" target="_blank">CETAK BERDASAR TANGGAL</a><br/>
                    <span>Tanggal Awal</span>
                    <input type="date" class="form-control" id="tglAwalPendapatanObat">
                    <span>Tanggal Akhir</span>
                    <input type="date" class="form-control" id="tglAkhirPendapatanObat">

                    <hr>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <td>No Resep</td>
                          <td>No Pasien</td>
                          <td>Nama Pasien</td>
                          <td>Nama Obat</td>
                          <td>Jumlah Obat</td>
                          <td>Harga Jual</td>
                          <td>Total</td>
                        </tr>
                      </thead>
                      <tbody>
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
                      </tbody>
                    </table>
                    
                            
				
              
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
       


@endsection


