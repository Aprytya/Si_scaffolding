<div style="margin-top:65px">
<table>
	<h2>Invoice Pembayaran</h2>
<?php foreach ($transaksi as $tr): ?>
	<tr>
		<td>Nama Penyewa</td>
		<td>:</td>
		<td><?php echo $tr->nama_penyewa ?></td>
	</tr>
	<tr>
		<td>No Faktur</td>
		<td>:</td>
		<td> <?php echo $tr->no_faktur ?></td>
	</tr>
	<tr>
		<td>Tanggal Sewa</td>
		<td>:</td>
		<td> <?php echo date('d-m-Y',strtotime($tr->tgl_sewa))?></td>
	</tr>
	<tr>
		<td>Tanggal Kembali</td>
		<td>:</td>
		<td> <?php echo date('d-m-Y',strtotime($tr->tgl_kembali))?></td>
	</tr>
	<tr>
		<td>Total Harga</td>
		<td>:</td>
		<td> Rp <?php echo number_format($tr->total, 0, ',', '.') ?></td>
	</tr>
	<tr>
		<?php 
		$x=strtotime($tr->tgl_kembali);
		$y=strtotime($tr->tgl_sewa);
		$jh=abs(($x-$y)/(60*60*24));
		 ?>
		<td>Jumlah Hari Sewa</td>
		<td>:</td>
		<td> <?php echo $jh ?> Hari</td>
	</tr>
	<tr>
		<td>Status Pembayaran</td>
		<td>:</td>
		<td> <?php if ($tr->status_pembayaran=='0') {
			echo "Belum Lunas";
		}else{
			echo "Lunas";
		} ?></td>
	</tr>
	
	<tr style="font-weight: bold; color:blue">
		<td>TOTAL PEMBAYARAN</td>
		<td>:</td>
		<td> Rp. <?php echo number_format($tr->total * $jh,0,',','.')?></td>
	</tr>
	<tr>
		<td>Rekening Pembayaran</td>
		<td>:</td>
		<td>
			 <strong>Bank BCA</strong> 8125-0988-82 <br>
			 <strong>Bank BNI</strong> 0448-8266-85 <br>
			 <strong>Bank BRI</strong> 0617-0100-0199-561 <br>
			 <strong>Bank Mandiri</strong> 111-000-768-784-7 <br>
			 <strong>Bank Nagari</strong> 0207-0231-0000-13			
		</td>
	</tr>
<?php endforeach ?>
</table>
</div>
<script type="text/javascript">
	window.print();
</script>