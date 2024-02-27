<h3 class="mt-4" style="text-align: center;">LAPORAN SCAFFOLDING <br>TOKO ANGGUN</h3>
 <table class="table table-bordered table-striped mt-4">
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
            <td class="text-center"><?php echo $no++ ?></td>
            <td><?php echo $tr->nama_barang ?></td>
            <td><?php echo $tr->satuan ?></td>
            <td >Rp <?php echo number_format($tr->harga_barang, 0, ',', '.') ?></td>
            <td><?php echo $tr->ukuran ?></td>
            <td><?php echo $tr->stok ?></td>
            <td><?php echo $tr->keluar ?></td>
      <?php endforeach ?>
 </table>
 <table class="table">
   <tr>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td>Bukittinggi, <?php echo date('d-m-Y') ?></td> 
   </tr>
   <tr></tr>
   <tr></tr>
   <tr></tr>
   <td>
     <tr>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td>( <?php echo $this->session->userdata('nama_admin')?> )</td> 
   </tr>
   </td>
 </table>
<script type="text/javascript">
	window.print();
</script>