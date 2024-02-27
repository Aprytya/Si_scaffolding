<div class="main-content">
<section class="section">
  <div class="section-header">
    <h1>Update Data Admin</h1>
  </div>
</section>
    <div class="card">
      <div class="card-body">
        <?php foreach ($admin as $p):?>
            <form method="post" action="<?php echo base_url('admin/admin/proses_update_admin') ?>" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-6">   
            <div class="form-group">
                <label>Nama</label>
                <input type="hidden" name="id_admin" value="<?php echo $p->id_admin ?>">
                <input type="text" name="nama_admin" class="form-control"  value="<?php echo $p->nama_admin ?>">
                <?php echo form_error('nama_admin','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group">
                <label>username</label> 
                <input type="text" name="username" class="form-control"  value="<?php echo $p->username ?>">
                <?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control"  value="<?php echo $p->password ?>" readonly>
                <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-danger">Batal</button>
            </div>
            </div>
          </form> 
        <?php endforeach ;?>
      </div>
    </div>
  </div>

     
  

