<tr class="row-keranjang_sewa">
	<td class="nama_barang">
		<?php echo $this->input->post('nama_barang') ?>
		<input type="hidden" name="nama_barang_hidden[]" value="<?php echo $this->input->post('nama_barang') ?>">
	</td>
	<td class="harga_barang">
		<?php echo $this->input->post('harga_barang') ?>
		<input type="hidden" name="harga_barang_hidden[]" value="<?php echo $this->input->post('harga_barang') ?>">
	</td>
	<td class="jumlah">
		<?php echo $this->input->post('jumlah') ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?php echo $this->input->post('jumlah') ?>">
	</td>
	<td class="satuan">
		<?php echo strtoupper($this->input->post('satuan')) ?>
		<input type="hidden" name="satuan_hidden[]" value="<?php echo $this->input->post('satuan') ?>">
	</td>
	<td class="sub_total">
		<?php echo $this->input->post('sub_total') ?>
		<input type="hidden" name="sub_total_hidden[]" value="<?php echo $this->input->post('sub_total') ?>">
	</td>
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama_barang-barang="<?php echo $this->input->post('nama_barang') ?>">Hapus</button>
	</td>
</tr>