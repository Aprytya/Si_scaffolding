<div class="container"  style="margin-top: 100px;margin-bottom: 100px">
<div class="card">
<div class="card-body">
<?php foreach ($detail as $dt): ?>
	<div class="row">
		<div class="col-md-6">
			<img style="width:90%" src="<?php echo base_url('assets/upload/'.$dt->gambar) ?>">
		</div>
		<div class="col-md-5">
			<table class="table">
				<tr>
					<th>Nama</th>
					<td><?php echo $dt->nama_barang ?></td>
				</tr>
				<tr>
					<th>Satuan</th>
					<td><?php echo $dt->satuan ?></td>
				</tr>
				<tr>
					<th>Harga Sewa Perhari</th>
					<td>Rp. <?php echo  number_format($dt->harga_barang, 0, ',', '.') ?></td>
				</tr>
				<tr>
					<th>Ukuran</th>
					<td><?php 
					echo $dt->ukuran ?></td>
				</tr>
				<tr>
					<th>Quantity</th>
					<td><?php echo $dt->stok ?></td>
				</tr>
				<tr>
				<td></td>
				<td>
					<a href="<?php echo base_url('penyewa/dashboard/')?>" class="btn btn-success btn-secondary">Kembali</a></td>
				</tr>
			</table>
		</div>
	</div>
<?php endforeach ;?>
</div>
</div>
</div>