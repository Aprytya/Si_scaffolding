<body id="page-top">
<div id="wrapper">
<div id="content-wrapper" class="d-flex flex-column">
<div id="content" data-url="<?php echo base_url('penyewa/sewa') ?>">
<div class="container-fluid" style="margin-top: 100px;margin-bottom: 100px">
<div class="row">
  <div class="col">
	<div class="card shadow">
	  <div class="card-header"><strong>Penyewaan Scaffolding</strong>
		<a href="<?php echo base_url('penyewa/transaksi') ?>" class="btn btn-secondary btn-sm float-right">Kembali</a>
	  </div>
	  <div class="card-body">
		<form action="<?php echo base_url('penyewa/sewa/proses_tambah_sewa') ?>" id="form-tambah" method="POST">
		  <div class="form-row">
			<div class="form-group col-2">
			  <label>No. Faktur</label>
			  <input type="text" name="no_faktur" value="SS-<?php echo time() ?>" readonly class="form-control">
			</div>
			<div class="form-group col-2">
			  <label>Nama Penyewa</label>
			  <input type="text" name="id_penyewa" value="<?php echo $penyewa ?>" readonly class="form-control">
			</div>
			<div class="form-group col-2">
       		  <label>Tanggal Sewa</label>
              <input type="date" name="tgl_sewa" class="form-control" >                
            </div>
        	<div class="form-group col-2">
              <label >Tanggal Kembali</label>                         
              <input type="date" name="tgl_kembali" class="form-control">
       		</div>
			<div class="form-group col-4">
		      <label>Lokasi Tujuan</label>
			  <input type="text" name="lokasi" value=""  class="form-control">
			</div>
		  </div>
		  <h6>Data Barang</h6>
		  <hr>
		  <div class="form-row">
			<div class="form-group col-3">
			  <label for="nama_barang">Nama Barang</label>
			  <select name="nama_barang" id="nama_barang" class="form-control">
				<option value="">Pilih Barang</option>
				<?php foreach ($barang as $brg): ?>
				<option value="<?= $brg->nama_barang ?>"><?= $brg->nama_barang ?></option>
				<?php endforeach ?>
			  </select>
			</div>
			<div class="form-group col-2">
			  <label>Kode Barang</label>
			  <input type="text" name="kode_barang" value="" readonly class="form-control">
			</div>
			<div class="form-group col-2">
			  <label>Harga Barang</label>
			  <input type="text" name="harga_barang" value="" readonly class="form-control">
			</div>
			<div class="form-group col-2">
			  <label>Jumlah</label>
			  <input type="number" name="jumlah" value="" class="form-control" readonly min='1'>
			</div>
			<div class="form-group col-2">
			  <label>Sub Total</label>
			  <input type="number" name="sub_total" value="" class="form-control" readonly>
			</div>
			<div class="form-group col-1">
			  <label for="">&nbsp;</label>
			  <button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i>Tambah</button>
			</div>
			<input type="hidden" name="satuan" value="">
		  </div>
		  <div class="keranjang_sewa">
		  <h6>Detail Penyewaan</h6>
		  <hr>
			<table class="table table-bordered text-center" id="keranjang_sewa">
			  <thead>
				<tr>
				  <td width="35%">Nama Barang</td>
				  <td width="15%">Harga barang</td>
				  <td width="15%">Jumlah</td>
				  <td width="10%">Satuan</td>
				  <td width="10%">Sub Total</td>
				  <td width="15%">Aksi</td>
				</tr>
			  </thead>
			  <tbody>
					
			  </tbody>
			  <tfoot>
				<tr>
				  <td colspan="4" align="right"><strong>Total : </strong></td>
				  <td id="total"></td>					
				  <td>
					<input type="hidden" name="total_hidden" value="">
					<input type="hidden" name="max_hidden" value="">
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Simpan</button>
				  </td>
				</tr>
			  </tfoot>
			</table>
		  </div>
		</form>
</div>				
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php $this->load->view('templates_penyewa/js.php') ?>
<script>
	$(document).ready(function(){
		$('tfoot').hide()

		$(document).keypress(function(event){
	    	if (event.which == '13') {
	      		event.preventDefault();
		   	}
		})
	
		$('#nama_barang').on('change', function(){

			if($(this).val() == '') reset()
			else {
				const url_get_barang = $('#content').data('url') + '/get_barang'
				$.ajax({
					url: url_get_barang,
					type: 'POST',
					dataType: 'json',
					data: {nama_barang: $(this).val()},
					success: function(data){
						$('input[name="kode_barang"]').val(data.kode_barang)
						$('input[name="harga_barang"]').val(data.harga_barang)
						$('input[name="jumlah"]').val(1)
						$('input[name="satuan"]').val(data.satuan)
						$('input[name="max_hidden"]').val(data.stock)
						$('input[name="jumlah"]').prop('readonly', false)
						$('button#tambah').prop('disabled', false)

						$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
						
						$('input[name="jumlah"]').on('keydown keyup change blur', function(){
							$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
						})
					}
				})
			}
		})

		$(document).on('click', '#tambah', function(e){
			const url_keranjang_sewa_barang = $('#content').data('url') + '/keranjang_sewa_barang'
			const data_keranjang_sewa = {
				nama_barang: $('select[name="nama_barang"]').val(),
				harga_barang: $('input[name="harga_barang"]').val(),
				jumlah: $('input[name="jumlah"]').val(),
				satuan: $('input[name="satuan"]').val(),
				sub_total: $('input[name="sub_total"]').val(),
			}

			if(parseInt($('input[name="max_hidden"]').val()) <= parseInt(data_keranjang_sewa.jumlah)) {
				alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="max_hidden"]').val()))	
			} else {
				$.ajax({
					url: url_keranjang_sewa_barang,
					type: 'POST',
					data: data_keranjang_sewa,
					success: function(data){
						if($('select[name="nama_barang"]').val() == data_keranjang_sewa.nama_barang) $('option[value="' + data_keranjang_sewa.nama_barang + '"]').hide()
						reset()

						$('table#keranjang_sewa tbody').append(data)
						$('tfoot').show()

						$('#total').html('<strong>' + hitung_total() + '</strong>')
						$('input[name="total_hidden"]').val(hitung_total())
					}
				})
			}

		})


		$(document).on('click', '#tombol-hapus', function(){
			$(this).closest('.row-keranjang_sewa').remove()

			$('option[value="' + $(this).data('nama_barang-barang') + '"]').show()

			if($('tbody').children().length == 0) $('tfoot').hide()
		})


		$('button[type="submit"]').on('click', function(){
			$('input[name="kode_barang"]').prop('disabled', true)
			$('select[name="nama_barang"]').prop('disabled', true)
			$('input[name="harga_barang"]').prop('disabled', true)
			$('input[name="jumlah"]').prop('disabled', true)
			$('input[name="sub_total"]').prop('disabled', true)
		})

		function hitung_total(){
			let total = 0;
			$('.sub_total').each(function(){
				total += parseInt($(this).text())
			})
			return total;
		}

		function reset(){
			$('#nama_barang').val('')
			$('input[name="kode_barang"]').val('')
			$('input[name="harga_barang"]').val('')
			$('input[name="jumlah"]').val('')
			$('input[name="sub_total"]').val('')
			$('input[name="jumlah"]').prop('readonly', true)
			$('button#tambah').prop('disabled', true)
		}
	})

	
</script>
</body>