<div class="main-content">
  <section class="section">
	<div class="section-header">
	<h1>Detail Penyewa</h1>
	</div>
  </section>
  <?php foreach ($detail as $dt): ?>
  <div class="card">
  <div class="card-body">
	<div class="row">
	<table class="table" colspan="2">
	<tr>
	  <td>Nama Penyewa </td>
	  <td><?php echo  $dt->nama_penyewa?></td>
	</tr>
	<tr>
	  <td>Username Penyewa </td>
	  <td><?php echo  $dt->username ?></td>
	</tr>
	<tr>
	  <td>Alamat Penyewa</td>
	  <td><?php echo $dt->alamat ?></td>
	</tr>
	<tr>
	  <td>Pekerjaan</td>
	  <td><?php echo  $dt->pekerjaan ?></td>
	</tr>
	<tr>
	  <td>No HP Penyewa</td>
	  <td><?php echo  $dt->no_hp ?></td>
	</tr>
	<tr>
	  <td>No KTP Penyewa</td>
	  <td><?php echo  $dt->no_ktp ?></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/penyewa') ?>">Kembali</a>
			<a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/penyewa/update_penyewa/'). $dt->id_penyewa?>">Update</a>
		</td>
	</tr>
	</table>
	</div>
  </div>
  </div>
  <?php endforeach; ?>	
</div>
