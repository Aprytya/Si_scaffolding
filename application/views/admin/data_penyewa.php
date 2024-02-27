<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Penyewa</h1>
      </div>
      <a href="<?php echo base_url('admin/penyewa/tambah_penyewa') ?>" class="btn btn-primary btn-sm fas fa-plus mb-3">Tambah Penyewa</a>
      <?php echo $this->session->flashdata('pesan')?>
      <table class="table table-striped table-responsive table-borderd">
      	<tr>
      		<th>No</th>
      		<th>Nama</th>
          <th>Username</th>
      		<th>Pekerjaan</th>
    			<th>No Hp</th>
          <th>No KTP</th>
    			<th>Opsi</th>
      	</tr>
      	<?php $no=1; foreach ($penyewa as $p) :?>
      		<tr>
      			<td><?php echo $no++ ?></td>
      			<td><?php echo $p->nama_penyewa ?></td>
            <td><?php echo $p->username ?></td>
      			<td><?php echo $p->pekerjaan ?></td>
      			<td><?php echo $p->no_hp ?></td>
            <td><?php echo $p->no_ktp; ?></td>
      			<td>
      			  <div class="row">	    
      			  <a href="<?php echo base_url('admin/penyewa/detail_penyewa/').$p->id_penyewa ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
  				  <a href="<?php echo base_url('admin/penyewa/delete_penyewa/').$p->id_penyewa ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
  			   	  <a href="<?php echo base_url('admin/penyewa/update_penyewa/').$p->id_penyewa?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
  				  </div>
      			</td>
      		</tr>
     	<?php endforeach ?>
      </table>
  </section>
</div>