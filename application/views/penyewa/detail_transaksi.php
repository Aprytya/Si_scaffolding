<body id="page-top">
<div id="wrapper">
<div id="content-wrapper" class="d-flex flex-column">
<div id="content" data-url="<?php echo base_url('penyewa/transaksi') ?>">
	<div class="container-fluid" style="margin-top: 100px;margin-bottom: 100px">
	<div class="clearfix">
		<div class="float-left">
			<h1 class="h3 m-0 text-gray-800"><?php echo $judul ?></h1>
		</div>
		<div class="float-right">
			<a href="<?php echo base_url('penyewa/transaksi/print_detail/' . $transaksi->no_faktur) ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>Print</a>
			<a href="<?php echo base_url('penyewa/transaksi') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>Kembali</a>
		</div>
	</div>
	<hr>
	<div class="card shadow">
		<div class="card-header"><strong>Detail Transaksi - <?php echo $transaksi->no_faktur ?></strong></div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<table class="table table-borderless">
						<tr>
							<td><strong>No Faktur</strong></td>
							<td>:</td>
							<td><?php echo $transaksi->no_faktur ?></td>
						</tr>
						<tr>
							<td><strong>Nama Penyewa</strong></td>
							<td>:</td>
							<td><?php echo $transaksi->nama_penyewa ?></td>
						</tr>
						<tr>
							<td><strong>Tanggal Sewa</strong></td>
							<td>:</td>
							<td><?php echo $transaksi->tgl_sewa ?></td>
						</tr>
						<tr>
							<td><strong>Tanggal Kembali</strong></td>
							<td>:</td>
							<td><?php echo $transaksi->tgl_kembali ?></td>
						</tr>
						<tr>
							<td><strong>Lokasi Tujuan</strong></td>
							<td>:</td>
							<td><?php echo $transaksi->lokasi ?></td>
						</tr>
					</table>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered">
						<thead>
							<tr>
								<td><strong>No</strong></td>
								<td><strong>Nama Barang</strong></td>
								<td><strong>Harga Barang</strong></td>
								<td><strong>Jumlah</strong></td>
								<td><strong>Sub Total</strong></td>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no=1;
							foreach ($detail as $dt): ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $dt->nama_barang ?></td>
									<td>Rp <?php echo number_format($dt->harga_barang, 0, ',', '.') ?></td>
									<td><?php echo $dt->jumlah ?> <?php echo strtoupper($dt->satuan) ?></td>
									<td>Rp <?php echo number_format($dt->sub_total, 0, ',', '.') ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"><strong>Total : </strong></td>
								<td>Rp <?php echo number_format($transaksi->total, 0, ',', '.') ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
</div>
</div>
</body>

