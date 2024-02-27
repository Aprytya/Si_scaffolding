<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Pengembalian Sewa</h1>
    </div>
  </section>
  <?php foreach ($transaksi as $tr): ?>
  	<form method="POST" action="<?php echo base_url('admin/transaksi/proses_transaksi_selesai') ?>">
  		<input type="hidden" name="no_faktur" value="<?php echo $tr->no_faktur ?>">
  		<div class="form-group">
  			<label>Tanggal Pengembalian</label>
  			<input type="date" name="tgl_pengembalian" class="form-control" value="<?php echo $tr->tgl_pengembalian ?>">
  		</div>
      <div class="form-group">
        <label>Denda</label>
        <input type="number" name="denda" class="form-control" value="">
      </div>
  		<div class="form-group">
  			<label>Status Pengembalian</label>
  			<select name="status_pengembalian" class="form-control">
  				<option value="<?php echo $tr->status_pengembalian ?>">Pilih Status Pengembalian</option>
  				<option value="Kembali">Kembali</option>
  				<option value="Belum Kembali">Belum Kembali</option>
  			</select>
  		</div>
  		<div class="form-group">
  			<label>Status Sewa</label>
  			<select name="status_sewa" class="form-control">
  				<option value="<?php echo $tr->status_sewa ?>">Pilih Status Sewa</option>
  				<option value="Selesai">Selesai</option>
  				<option value="Belum Selesai">Belum Selesai</option>
  			</select>
  		</div>
  		<button type="submit" class="btn btn-primary">Simpan</button>
      <a class="btn btn-warning" href="<?php echo base_url('admin/transaksi') ?>">Kembali</a>
  	</form>
  <?php endforeach ?>
</div>