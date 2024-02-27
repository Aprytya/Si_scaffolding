<table>
  <h2>Faktur Sewa Scaffolding</h2>
	  <table class="table" style="width:75%;height:20px">
		<tr>
		  <td><strong>No Faktur</strong></td>
		  <td>: <?php echo $transaksi->no_faktur ?></td>
		  <td></td>
		  <td></td>
		  <td><strong>Tanggal Sewa</strong></td>
		  <td>: <?php echo date('d-m-Y',strtotime($transaksi->tgl_sewa))?></td>
		 </tr>
	    <tr>
		  <td><strong>Nama Penyewa</strong></td>
		  <td>: <?php echo $transaksi->nama_penyewa ?></td>
		  <td></td>
		  <td></td>
		  <td><strong>Tanggal Kembali</strong></td>
		  <td>: <?php echo date('d-m-Y',strtotime($transaksi->tgl_kembali)) ?></td>
	    </tr>	
	    <tr>
	      <td><strong>No Hp</strong></td>
		  <td>: <?php echo $transaksi->no_hp ?></td>
		  <td></td>
		  <td></td>
		  <td><strong>Lokasi Tujuan</strong></td>
		  <td>: <?php echo $transaksi->lokasi ?></td>
	    </tr>	
	  </table>
  <hr>
  <div class="row">
	<div class="col-md-12">
	  <table style="width: 100%" class="table table-bordered table-striped">
		<thead class="text-center">
		  <tr>
			<th><strong>No</strong></th>
			<th><strong>Nama Barang</strong></th>
			<th><strong>Harga Barang</strong></th>
			<th><strong>Jumlah</strong></th>
			<th><strong>Sub Total</strong></th>
		  </tr>
		</thead>
		<tbody>
		<?php 
		$no=1;
		foreach ($detail as $dt): ?>
		  <tr>
			<td style="text-align: center"><?php echo $no++ ?></td>
			<td><?php echo $dt->nama_barang ?></td>
			<td>Rp <?php echo number_format($dt->harga_barang, 0, ',', '.') ?></td>
			<td><?php echo $dt->jumlah ?> <?php echo strtoupper($dt->satuan) ?></td>
			<td>Rp <?php echo number_format($dt->sub_total, 0, ',', '.') ?></td>
		  </tr>
		<?php endforeach ?>
		</tbody>
		<tfoot>
		  <tr>
			<td colspan="4" align="right"><strong>Total : </strong></td>
			<td>Rp <?php echo number_format($transaksi->total, 0, ',', '.') ?></td>
		  </tr>
		</tfoot>
	  </table>
	  <table class="table mt-5 text-center">
		<tr>
		  <td></td>
		  <td>Admin</td>
		  <td></td>
		  <td>Pengantar</td>
		  <td></td>
		  <td>Penerima</td>
		</tr>
		<tr>
		  <td></td>
		  <td>( _____________ )</td>
		  <td></td>
		  <td>( ______________ )</td>
		  <td></td>
		  <td>( ______________ )</td>
		</tr>
	  </table>
	</div>
  </div>
</table>
<script type="text/javascript">
	window.print();
</script>