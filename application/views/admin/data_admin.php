<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Admin</h1>
      </div>
      <a href="<?php echo base_url('admin/admin/tambah_admin') ?>" class="btn btn-primary btn-sm fas fa-plus mb-3">Tambah Admin</a>
      <?php echo $this->session->flashdata('pesan')?>
      <table class="table table-striped table-responsive table-borderd">
      	<tr>
      		<th>No</th>
      		<th>Nama</th>
          <th>Username</th>
    			<th>Opsi</th>
      	</tr>
      	<?php $no=1; foreach ($admin as $ad) :?>
      		<tr>
      			<td><?php echo $no++ ?></td>
      			<td><?php echo $ad->nama_admin ?></td>
            <td><?php echo $ad->username ?></td>
      			<td>
      			 <div class="row">	    
  				  <a href="<?php echo base_url('admin/admin/delete_admin/').$ad->id_admin ?>" class="btn btn-sm btn-danger  mx-2"><i class="fas fa-trash"></i></a>
  			   	  <a href="<?php echo base_url('admin/admin/update_admin/').$ad->id_admin?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
  				  </div>
      			</td>
      		</tr>
     	<?php endforeach ?>
      </table>
  </section>
</div>