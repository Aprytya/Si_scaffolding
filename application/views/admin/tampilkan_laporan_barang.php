<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Laporan Barang</h1>
    </div>
    <div class="btn-group">
     <a href="<?php echo base_url().'admin/laporan/print_laporan_barang/'?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-print"></i> Print</a>
    </div>
    <div class="table-responsive mt-3">   
      <table class="table table-bordered table-striped">
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Satuan</th>
          <th>Harga Sewa</th>
          <th>Ukuran</th>
          <th>Stok</th>
          <th>Disewa</th>
        </tr>
        <?php $no=1; foreach ($laporan as $tr) :?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $tr->nama_barang ?></td>
            <td><?php echo $tr->satuan ?></td>
            <td>Rp <?php echo number_format($tr->harga_barang, 0, ',', '.') ?></td>
            <td><?php echo $tr->ukuran ?></td>
            <td><?php echo $tr->stok ?></td>
            <td><?php echo $tr->keluar ?></td>
      <?php endforeach ?>
      </table>
    </div>
  </section>
</div>

