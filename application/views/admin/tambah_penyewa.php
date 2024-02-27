<div class="main-content">
<section class="section">
  <div class="section-header">
    <h1>Input Data Penyewa</h1>
  </div>
    <div class="card">
      <div class="card-body">
        <form method="post" action="<?php echo base_url('admin/penyewa/proses_tambah_penyewa') ?>" enctype="multipart/form-data">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama_penyewa" class="form-control">
          <?php echo form_error('nama_penyewa','<div class="text-small text-danger">','</div>') ?>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control">
          <?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" class="form-control">
          <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
        </div>
        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control">
            <?php echo form_error('pekerjaan','<div class="text-small text-danger">','</div>') ?>
        </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
          <label>No HP</label>
          <input type="number" name="no_hp" class="form-control">
          <?php echo form_error('no_hp','<div class="text-small text-danger">','</div>') ?>
        </div>
        <div class="form-group">
          <label>No KTP</label>
          <input type="number" name="no_ktp" class="form-control">
          <?php echo form_error('no_ktp','<div class="text-small text-danger">','</div>') ?>
        </div>
         <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Batal</button>
        </div>
      </div>
      </form>
    </div>
</div>
</section>
</div>
