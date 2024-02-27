 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1>Update Data Barang</h1>
  </div>
</section>
    <div class="card">
      <div class="card-body">
        <?php foreach ($barang as $brg):?>
            <form method="post" action="<?php echo base_url('admin/barang/proses_update_barang') ?>" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Kode</label>
                <input type="hidden" name="id_barang" value="<?php echo $brg->id_barang ?>">
                <input type="text" name="kode_barang" class="form-control"  value="<?php echo $brg->kode_barang ?>">
                <?php echo form_error('kode_barang','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama_barang" class="form-control"  value="<?php echo $brg->nama_barang ?>">
                <?php echo form_error('nama_barang','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control"  value="<?php echo $brg->satuan ?>">
                <?php echo form_error('satuan','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group">
                <label>Ukuran</label>
                <input type="text" name="ukuran" class="form-control" value="<?php echo $brg->ukuran ?>">
                <?php echo form_error('ukuran','<div class="text-small text-danger">','</div>') ?>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label>Harga Sewa</label>
                <input type="number" name="harga_barang" class="form-control"  value="<?php echo $brg->harga_barang ?>">
                <?php echo form_error('harga_barang','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control"  value="<?php echo $brg->stok ?>">
                <?php echo form_error('stok','<div class="text-small text-danger">','</div>') ?>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control">
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