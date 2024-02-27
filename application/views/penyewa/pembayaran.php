<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-8">
<div class="card" style="margin-top: 100px">
	<div class="card-header alert alert-success">
		Invoice Pembayaran Anda
	</div>
	<div class="card-body">
		<table class="table">
		<?php foreach ($transaksi as $tr): ?>
			<tr>
				<th>No Faktur</th>
				<td>:</td>
				<td><?php echo $tr->no_faktur ?></td>
			</tr>
			<tr>
				<th>Tanggal Sewa</th>
				<td>:</td>
				<td><?php echo date('d-m-Y',strtotime($tr->tgl_sewa))?></td>
			</tr>
			<tr>
				<th>Tanggal Kembali</th>
				<td>:</td>
				<td><?php echo date('d-m-Y',strtotime($tr->tgl_kembali))?></td>
			</tr>
			<tr>
				<th>Total Harga</th>
				<td>:</td>
				<td>Rp <?php echo number_format($tr->total, 0, ',', '.') ?></td>
			</tr>
			<tr>
				<?php 
				$x=strtotime($tr->tgl_kembali);
				$y=strtotime($tr->tgl_sewa);
				$jh=abs(($x-$y)/(60*60*24));
				 ?>
				<th>Jumlah Hari Sewa</th>
				<td>:</td>
				<td><?php echo $jh ?> Hari</td>
			</tr>
			<tr class="text-success">
				<th>TOTAL PEMBAYARAN</th>
				<td>:</td>
				<td><button class="btn btn-sm btn-success">Rp. <?php echo number_format($tr->total * $jh,0,',','.')?></button></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><a href="<?php echo base_url('penyewa/transaksi/cetak_invoice/'.$tr->no_faktur) ?>" class="btn btn-sm btn-secondary">Print Invoice</a></td>
			</tr>
		<?php endforeach ?>
		</table>
	</div>
</div>
</div>
<div class="col-md-4">
	<div class="card" style="margin-top: 100px">
	<div class="card-header alert alert-primary">
		Informasi Pembayaran
	</div>
	<div class="card-body">
		<p class="mb-3">Silahkan Melakukan Pembayaran Melalui Nomor Rekening di Bawah Ini :</p>

		<ul class="list-group list-group-flush">
		  <li class="list-group-item"><strong>Bank BCA</strong> 8125-0988-82</li>
		  <li class="list-group-item"><strong>Bank BNI</strong> 0448-8266-85</li>
		  <li class="list-group-item"><strong>Bank BRI</strong> 0617-0100-0199-561</li>
		  <li class="list-group-item"><strong>Bank Mandiri</strong> 111-000-768-784-7</li>
		  <li class="list-group-item"><strong>Bank Nagari</strong> 0207-0231-0000-13</li>
		</ul>

		<?php if (empty($tr->bukti_pembayaran)) { ?>
			<button style="width: 100%" type="button" class="btn btn-sm btn-danger mt-3" data-toggle="modal" data-target="#exampleModal">Upload Bukti Pembayaran
</button>
		<?php }elseif ($tr->status_pembayaran=='0') 
		{ ?>
			<button style="width: 100%"  class="btn btn-sm btn-warning mt-3">Menunggu Konfirmasi </button>
		<?php }elseif ($tr->status_pembayaran=='1') 
		{ ?>
			<button style="width: 100%"  class="btn btn-sm btn-success mt-3">Pembayaran Selesai </button>
		<?php } ?>
	</div>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form method="post" action="<?php echo base_url('penyewa/transaksi/proses_pembayaran') ?>" enctype="multipart/form-data">
      <div class="modal-body">
       <div class="form-group">
       	<label>Upload Pembayaran</label>
       	 <input type="hidden" name="no_faktur" value="<?php echo $tr->no_faktur ?>">
       	<input type="file" name="bukti_pembayaran" class="form-control">
       </div>
      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-success">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>