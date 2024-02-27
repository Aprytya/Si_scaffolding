<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Detail Barang</h1>
		</div>
	</section>
	<?php foreach ($detail as $dt): ?>
		<div class="card">
	<div class="card-body">
	<div class="row">
		<div class="col-md-5">
			<img width="300px"src="<?php echo base_url().'assets/upload/'. $dt->gambar ?>">
		</div>
		<div class="col-md-7">
			<table class="table" colspan="2">
				<tr>
					<td>Kode Barang </td>
					<td>
					<?php echo  $dt->kode_barang?>
					</td>
				</tr>
				<tr>
					<td>Nama Barang </td>
					<td><?php echo  $dt->nama_barang ?></td>
				</tr>
					<tr>
					<td>Satuan </td>
					<td><?php echo $dt->satuan ?></td>
				</tr>
				<tr>
					<td>Harga Sewa Perbulan </td>
					<td>Rp. <?php echo  number_format($dt->harga_barang, 0, ',', '.') ?></td>
				</tr>
				<tr>
					<td>Ukuran</td>
					<td><?php echo  $dt->ukuran ?></td>
				</tr>
				<tr>
					<td>Jumlah Barang</td>
					<td><?php echo  $dt->stok ?></td>
				</tr>
			</table>
		<a href="<?php echo base_url('admin/barang')?>" class="btn btn-sm btn-danger ml-4">Kembali</a>
		<a href="<?php echo base_url('admin/barang/update_barang/').$dt->id_barang?>" class="btn btn-sm btn-primary">Update</a>
		</div>
	</div>
	</div>
	</div>
	<?php endforeach; ?>	
</div>