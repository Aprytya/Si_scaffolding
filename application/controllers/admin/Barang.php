<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

  public function index()
   {
		$data['judul']	='Data Scaffolding';
		$data['total'] 	= $this->M_sewa->getCount();
		$data['list'] 	= $this->M_sewa->getList();
		$data['barang']	=$this->M_sewa->get_data('barang')->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_barang');
		$this->load->view('templates_admin/footer');
  }
  Public function tambah_barang()
  {
	$data['judul']='Halaman Tambah Barang';
	$data['barang'] = $this->M_sewa->get_data('barang')->result();
	$this->load->view('templates_admin/header',$data);
	$this->load->view('templates_admin/sidebar');
	$this->load->view('admin/tambah_barang',$data);
	$this->load->view('templates_admin/footer');
  }
  public function proses_tambah_barang()
  {
	$this->_rules();
	if($this->form_validation->run()==false){
	$this->tambah_barang();
	}else{
		$kode=$this->input->post('kode_barang');
		$nama=$this->input->post('nama_barang');
		$satuan=$this->input->post('satuan');
		$harga=$this->input->post('harga_barang');
		$ukuran =$this->input->post('ukuran');
		$stok=$this->input->post('stok');
		$gambar=$_files['gambar']['name'];
		if( $gambar=''){}else{
	$config['upload_path']          = './assets/upload';
	$config['allowed_types']        = 'gif|jpg|png|jpeg';

	$this->load->library('upload', $config);
	if ( ! $this->upload->do_upload('gambar'))
	{
	    $error = array('error' => $this->upload->display_errors());
	    $this->load->view('upload_form', $error);
	}else{
	$gambar=$this->upload->data('file_name');
	}
	$data = array(
		'kode_barang' => $kode,
		'nama_barang' => $nama,
		'satuan' => $satuan,
		'ukuran'=>$ukuran,
		'harga_barang' => $harga,
		'stok' => $stok,
		'gambar' => $gambar,
	);
	$this->M_sewa->insert_data($data, 'barang');
	$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
	Data Barang Berhasil Ditambahkan.
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	</div>');
	redirect('admin/barang');
	}}
  }

  public function update_barang($id)
  {
  	$data['judul']='Halaman Edit Barang';
	$where = array('id_barang' => $id);
	$data['barang']= $this->db->query("SELECT * FROM barang WHERE id_barang ='$id'")->result();
	$this->load->view('templates_admin/header',$data);
	$this->load->view('templates_admin/sidebar');
	$this->load->view('admin/edit_barang',$data);
	$this->load->view('templates_admin/footer');
  }

   public function proses_update_barang()
  {
	$this->_rules();

	if($this->form_validation->run()==false)
	{
	   $this->update_barang();
	}else{
		$id=$this->input->post('id_barang');
		$kode=$this->input->post('kode_barang');
		$nama=$this->input->post('nama_barang');
		$satuan=$this->input->post('satuan');
		$harga=$this->input->post('harga_barang');
		$ukuran =$this->input->post('ukuran');
		$stok=$this->input->post('stok');
		$gambar=$_FILES['gambar']['name'];
		if($gambar){
			$config['upload_path']          = './assets/upload';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('gambar')){
				$gambar=$this->upload->data('file_name');
				$this->db->set('gambar',$gambar);
			}else{
				echo $this->upload->display_errors; 
			}
			}
		$data = array(
					'kode_barang' => $kode,
					'nama_barang' => $nama,
					'satuan' => $satuan,
					'ukuran'=>$ukuran,
					'harga_barang' => $harga,
					'stok' => $stok,
	             );

		 $where = array('id_barang' => $id );
		 
		 $this->M_sewa->update_data('barang',$data,$where);
		 $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data barang Berhasil Diupdate.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			  </div>');
	 	 redirect('admin/barang');

        }
    }

  public function _rules()
  {
	$this->form_validation->set_rules('kode_barang','Kode','required');
	$this->form_validation->set_rules('nama_barang','Nama','required');
	$this->form_validation->set_rules('satuan','Satuan','required');
	$this->form_validation->set_rules('ukuran','Ukuran','required');
	$this->form_validation->set_rules('harga_barang','Harga Sewa','required');
	$this->form_validation->set_rules('stok','stok','required');
	$this->form_validation->set_message('required', ' %s Tidak Boleh Kosong, Silahkan diisi!');
  }

  public function detail_barang($id)
  {
  	$data['judul']='Detail Sacffolding';
	$data['detail']= $this->M_sewa->ambil_id_barang($id);
	$this->load->view('templates_admin/header',$data);
	$this->load->view('templates_admin/sidebar');
	$this->load->view('admin/detail_barang',$data);
	$this->load->view('templates_admin/footer');
  }
   public function hapus_barang($id)
  {
  	$where = array('id_barang'=>$id);
  	$this->M_sewa->delete_data($where,'barang');
    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Barang Berhasil Dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	redirect('admin/barang');
  }
}?>