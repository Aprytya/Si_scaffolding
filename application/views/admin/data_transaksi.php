<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Transaksi</h1>
      </div>
    <div class="table-responsive">   
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
          <th>Status Pengembalian</th>
          <th>Status Sewa</th>
          <th>Cek Pembayaran</th>
          <th>Opsi</th>
          <th>Print</th>
      	</tr>
      	<?php $no=1; foreach ($transaksi as $tr) :?>
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
            <td><?php echo $tr->status_pengembalian ?></td>
            <td><?php echo $tr->status_sewa ?></td>
            <td>
              <center>
                <?php if (empty($tr->bukti_pembayaran)) { ?>
                <button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>
              <?php }else{ ?>
                <a class="btn btn-sm btn-primary " href="<?php echo base_url('admin/transaksi/pembayaran/'. $tr->no_faktur) ?>"><i class="fa  fa-check-circle"></i></a>
              <?php } ?>
              </center>
            </td>
      			<td>
      			   <?php if ($tr->status_sewa=="Selesai"){
                    echo "-";
               } else { ?>
                <div class="row">
                  <a class="btn btn-sm btn-success mr-1" href="<?php echo base_url('admin/transaksi/transaksi_selesai/'.$tr->no_faktur) ?>"><i class="fas fa-check"></i></a>
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/transaksi/transaksi_batal/'.$tr->no_faktur) ?>"><i class="fas fa-times"></i></a>
              </div>
               <?php } ?>
      			</td>
            <td>
              <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/transaksi/print_transaksi/'.$tr->no_faktur) ?>"><i class="fas fa-print"></i></a>
            </td>
      		</tr>
     	<?php endforeach ?>
      </table>
    </div>
  </section>
</div>