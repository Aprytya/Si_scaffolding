<div class="main-content">
<section class="section">
  <div class="section-header">
    <h1>Input Data Admin</h1>
  </div>
    <div class="card">
      <div class="card-body">
        <form method="post" action="<?php echo base_url('admin/admin/proses_tambah_admin') ?>">
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama_admin" class="form-control">
          <?php echo form_error('nama_admin','<div class="text-small text-danger">','</div>') ?>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control">
          <?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
        </div>
         <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Batal</button>
        </div>
      </form>
    </div>
  </div>
</section>
</div>