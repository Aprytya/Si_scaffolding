<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewa extends CI_Controller
 {
  public function index()
  {
   	$data['judul']='Data Penyewa';
	$data['penyewa']=$this->M_sewa->get_data('penyewa')->result();
	$this->load->view('templates_admin/header',$data);
	$this->load->view('templates_admin/sidebar');
	$this->load->view('admin/data_penyewa',$data);
	$this->load->view('templates_admin/footer');
  }
  public function tambah_penyewa()
  {
   	$data['judul']='Halaman Tambah Penyewa';
	$data['penyewa'] = $this->M_sewa->get_data('penyewa')->result();
	$this->load->view('templates_admin/header',$data);
	$this->load->view('templates_admin/sidebar');
	$this->load->view('admin/tambah_penyewa',$data);
	$this->load->view('templates_admin/footer');
  }

  public function proses_tambah_penyewa()
  {
	$this->_rules();
	if($this->form_validation->run()==false){
	$this->tambah_penyewa();
	}else{
	  $nama_penyewa=$this->input->post('nama_penyewa');
	  $username=$this->input->post('username');
	  $alamat=$this->input->post('alamat');
	  $pekerjaan=$this->input->post('pekerjaan');
	  $no_hp =$this->input->post('no_hp');
	  $no_ktp=$this->input->post('no_ktp');
	  $password=md5($this->input->post('password'));
	
		$data = array(
				'nama_penyewa' => $nama_penyewa,
				'username' => $username,
				'alamat' => $alamat,
				'pekerjaan' => $pekerjaan,
				'no_hp'=>$no_hp,
				'no_ktp' => $no_ktp,
				'password'=>$password
				);

	  $this->M_sewa->insert_data($data, 'penyewa');
	  $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
	  Data Penyewa Berhasil Ditambahkan.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	  </button>
	  </div>');
	  redirect('admin/penyewa');
       }
  }

  public function update_penyewa($id)
  {
  	$data['judul']='Halaman Edit Penyewa';
	$where = array('id_penyewa' => $id);
	$data['penyewa']= $this->db->query("SELECT * FROM penyewa WHERE id_penyewa ='$id'")->result();
	$this->load->view('templates_admin/header',$data);
	$this->load->view('templates_admin/sidebar');
	$this->load->view('admin/edit_penyewa',$data);
	$this->load->view('templates_admin/footer');
  }

  public function proses_update_penyewa()
  {
	$this->_rules();
	if($this->form_validation->run()==false)
	{
	   $this->update_penyewa($id);
	}else{
		 $id =$this->input->post('id_penyewa');
		 $nama_penyewa=$this->input->post('nama_penyewa');
		 $username=$this->input->post('username');
		 $alamat=$this->input->post('alamat');
		 $pekerjaan=$this->input->post('pekerjaan');
		 $no_hp =$this->input->post('no_hp');
		 $no_ktp=$this->input->post('no_ktp');
		 $password=md5($this->input->post('password'));
		 $data = array(
				'nama_penyewa' => $nama_penyewa,
				'username' => $username,
				'alamat' => $alamat,
				'pekerjaan' => $pekerjaan,
				'no_hp'=>$no_hp,
				'no_ktp' => $no_ktp,
				'password'=>$password
	             );
		 $where = array('id_penyewa' => $id );
		 $this->M_sewa->update_data('penyewa',$data,$where);
		 $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Penyewa Berhasil Diupdate.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			  </div>');
	 	 redirect('admin/penyewa');

        }
  }

  public function delete_penyewa($id)
  {
  	$where=array('id_penyewa'=>$id);
  	$this->M_sewa->delete_data($where,'penyewa');
  	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data Penyewa Berhasil Dihapus.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>');
	  redirect('admin/penyewa');
  }

  public function detail_penyewa($id)
  {
  	$data['judul']='Halaman Detail Penyewa';
	$data['detail']= $this->M_sewa->ambil_id_penyewa($id);
	$this->load->view('templates_admin/header',$data);
	$this->load->view('templates_admin/sidebar');
	$this->load->view('admin/detail_penyewa',$data);
	$this->load->view('templates_admin/footer');
	}

  public function _rules()
  {
	$this->form_validation->set_rules('nama_penyewa','Nama','required');
	$this->form_validation->set_rules('username','Username','required');
	$this->form_validation->set_rules('alamat','Alamat','required');
	$this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
	$this->form_validation->set_rules('no_hp','No HP','required');
	$this->form_validation->set_rules('no_ktp','No KTP','required');
	$this->form_validation->set_rules('password','Password','required|trim|min_length[5]');


	$this->form_validation->set_message('required', ' %s Tidak Boleh Kosong, Silahkan diisi!');
	$this->form_validation->set_message('min_length', ' %s Minimal 5 Karakter');
  }


 }?>
