<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Barang</h1>
      </div>
      <a href="<?php echo base_url('admin/barang/tambah_barang') ?>" class="btn btn-primary btn-sm fas fa-plus mb-3">Tambah Data</a>
      <?php echo $this->session->flashdata('pesan')?>
      <table class="table table-hover table-striped table-borderd text-small text-center mb-3">
      <thead>
      	<tr>
      	<th>No</th>
  		<th>Gambar</th>
  		<th>Nama Barang</th>
  		<th>Jumlah</th>
  		<th>Opsi</th>
      	</tr>
      </thead>
      <tbody>
  		<?php  
  		$no=1;
  		foreach($barang as $brg): ?>
  			<tr>
  			<td><?php echo $no++ ?></td>
  			<td><img src="<?php echo base_url().'assets/upload/'.$brg->gambar ?>" width="100px"></td>
  			<td><?php echo $brg->nama_barang ?></td>
  			<td><?php echo $brg->stok ?></td>
  			<td>
  				<a href="<?php echo base_url('admin/barang/detail_barang/').$brg->id_barang ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
  				<a href="<?php echo base_url('admin/barang/hapus_barang/').$brg->id_barang ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
  				<a href="<?php echo base_url('admin/barang/update_barang/').$brg->id_barang?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
  			</td>
  			</tr>
      		<?php endforeach ?>
      	</tbody>

      </table>


 	</section>
</div>