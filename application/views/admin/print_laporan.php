<h3 class="mt-4" style="text-align: center;">LAPORAN TRANSAKSI SEWA SCAFFOLDING <br>TOKO ANGGUN
</h3>
 <table>
  <tr>
    <td>Dari</td>
    <td>:</td>
    <td><?php echo date('d-M-Y',strtotime($_GET['dari'])) ?></td>
  </tr>
  <tr>
    <td>Sampai</td>
    <td>:</td>
    <td><?php echo date('d-M-Y',strtotime($_GET['sampai'])) ?></td>
  </tr>
 </table>
 <table class="table table-bordered table-striped mt-4">
	<tr>
		<th>No</th>
		<th>No Faktur</th>
    <th>Nama Penyewa</th>
		<th>Tanggal Sewa</th>
    <th>Tanggal Kembali</th>
    <th>Denda</th>
		<th>Lokasi</th>
    <th>Total</th>
    <th>Status Pengembalian</th>
	</tr>
	<?php $no=1; foreach ($laporan as $tr) :?>
		<tr>
			<td class="text-center"><?php echo $no++ ?></td>
      <td><?php echo $tr->no_faktur ?></td>
			<td><?php echo $tr->nama_penyewa ?></td>
      <td><?php echo date('d-m-Y',strtotime($tr->tgl_sewa)) ?></td>
      <td><?php echo date('d-m-Y',strtotime($tr->tgl_kembali)) ?></td>
      <td>Rp <?php echo number_format($tr->denda, 0, ',', '.') ?></td>
			<td><?php echo $tr->lokasi ?></td>
      <td>Rp <?php echo number_format($tr->total, 0, ',', '.') ?></td>
      <td><?php echo $tr->status_pengembalian ?></td>
    </tr>
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