<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Laporan Transaksi</h1>
      </div>
  	</section>
  	<form method="post" action="<?php echo base_url('admin/laporan/transaksi') ?>">
  		<div class="form-group">
  			<label>Dari Tanggal</label>
  			<input type="date" name="dari" class="form-control">
  			<?php echo form_error('dari','<Span class="text-small text-danger">','</span>') ?>
  		</div>
  		<div class="form-group">
  			<label>Sampai Tanggal</label>
  			<input type="date" name="sampai" class="form-control">
  			<?php echo form_error('sampai','<Span class="text-small text-danger">','</span>') ?>
  		</div>
  		<button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Tampilkan Data</button>
  	</form><hr>
    <div class="btn-group">
      <a href="<?php echo base_url().'admin/laporan/print_laporan/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-print"></i> Print</a>
    </div>
  	<div class="table-responsive mt-3">   
      <table class="table table-bordered table-striped">
      	<tr>
      		<th>No</th>
      		<th>No Faktur</th>
          <th>Nama Penyewa</th>
      		<th>Tanggal Sewa</th>
    			<th>Tanggal Kembali</th>
          <th>Tanggal Dikembalikan</th>
          <th>Denda</th>
    			<th>Lokasi</th>
          <th>Total</th>
          <th>Status Pengembalian</th>
          <th>Status Sewa</th>
      	</tr>
      	<?php $no=1; foreach ($laporan as $tr) :?>
      		<tr>
      			<td><?php echo $no++ ?></td>
            <td><?php echo $tr->no_faktur ?></td>
      			<td><?php echo $tr->nama_penyewa ?></td>
            <td><?php echo date('d-m-Y',strtotime($tr->tgl_sewa)) ?></td>
      			<td><?php echo date('d-m-Y',strtotime($tr->tgl_kembali)) ?></td>
            <td>
              <?php if ($tr->tgl_pengembalian=="0000-00-00") {
                echo "-";
              }else {
                echo date('d-m-Y',strtotime($tr->tgl_pengembalian));
              } ?>
            </td>
            <td>Rp <?php echo number_format($tr->denda, 0, ',', '.') ?></td>
      			<td><?php echo $tr->lokasi ?></td>
            <td><?php echo $tr->denda ?></td>
            <td><?php echo $tr->status_pengembalian ?></td>
            <td><?php echo $tr->status_sewa ?></td>
     	<?php endforeach ?>
      </table>
    </div>
</div>
