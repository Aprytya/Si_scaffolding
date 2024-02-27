<div class="main-content">
<section class="section">
  <div class="section-header">
    <h1>Update Data Penyewa</h1>
  </div>
</section>
    <div class="card">
      <div class="card-body">
        <?php foreach ($penyewa as $p):?>
            <form method="post" action="<?php echo base_url('admin/penyewa/proses_update_penyewa') ?>" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-6">   
            <div class="form-group">
                <label>Nama</label>
                <input type="hidden" name="id_penyewa" value="<?php echo $p->id_penyewa ?>">
                <input type="text" name="nama_penyewa" class="form-control"  value="<?php echo $p->nama_penyewa ?>">
                <?php echo form_error('nama_penyewa','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group">
                <label>username</label> 
                <input type="text" name="username" class="form-control"  value="<?php echo $p->username ?>">
                <?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control"  value="<?php echo $p->alamat ?>">
                <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
            </div>
             <div class="form-group">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" value="<?php echo $p->pekerjaan ?>">
                <?php echo form_error('pekerjaan','<div class="text-small text-danger">','</div>') ?>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label>No Hp</label>
                <input type="number" name="no_hp" class="form-control"  value="<?php echo $p->no_hp ?>">
                <?php echo form_error('no_hp','<div class="text-small text-danger">','</div>') ?>
            </div>      
            <div class="form-group">
                <label>No KTP</label>
                <input type="number" name="no_ktp" class="form-control"  value="<?php echo $p->no_ktp ?>">
                <?php echo form_error('no_ktp','<div class="text-small text-danger">','</div>') ?>
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

     
  

