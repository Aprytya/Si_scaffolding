
<div style="margin-top:65px">
	<table style="width:80%;text-align: center">
	<h2 class="mt-3 ml-4">Faktur Transaksi Sewa Scaffolding</h2>
	<table class="ml-4">
			<tr>
				<td><strong>No Faktur</strong></td>
				<td></td>
				<td>:</td>
				<td><?php echo $transaksi->no_faktur ?></td>
			</tr>
			<tr>
				<td><strong>Nama Penyewa</strong></td>
				<td></td>
				<td>:</td>
				<td><?php echo $transaksi->nama_penyewa ?></td>
			</tr>
			<tr>
				<td><strong>Tanggal Sewa</strong></td>
				<td></td>
				<td>:</td>
				<td><?php echo $transaksi->tgl_sewa ?></td>
			</tr>
			<tr>
				<td><strong>Tanggal Kembali</strong></td>
				<td></td>
				<td>:</td>
				<td><?php echo $transaksi->tgl_kembali ?></td>
			</tr>
			<tr>
				<td><strong>Lokasi Tujuan</strong></td>
				<td></td>
				<td>:</td>
				<td><?php echo $transaksi->lokasi ?></td>
			</tr>
		</table>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		<table class="mx-auto" style="width: 95%" border="1">
			<thead>
				<tr class="text-center">
					<th>No</th>
					<th>Nama Barang</th>
					<th>Harga Barang</th>
					<th>Jumlah</th>
					<th>Sub Total</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no=1;
				foreach ($detail as $dt): ?>
					<tr>
						<td style="text-align: center"><?php echo $no++ ?></td>
						<td class="ml-2"><?php echo $dt->nama_barang ?></td>
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
</table>
</div>
<script type="text/javascript">
	window.print();
</script>