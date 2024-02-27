<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function index()
  {
   	$data['judul']='Data Admin';
	$data['admin']=$this->M_sewa->get_data('admin')->result();
	$this->load->view('templates_admin/header',$data);
	$this->load->view('templates_admin/sidebar');
	$this->load->view('admin/data_admin',$data);
	$this->load->view('templates_admin/footer');
  }


  public function tambah_admin()
  {
   	$data['judul']='Halaman Tambah Admin';
	$data['admin'] = $this->M_sewa->get_data('admin')->result();
	$this->load->view('templates_admin/header',$data);
	$this->load->view('templates_admin/sidebar');
	$this->load->view('admin/tambah_admin',$data);
	$this->load->view('templates_admin/footer');
  }

  public function proses_tambah_admin()
  {
	$this->_rules();
	if($this->form_validation->run()==false){
	$this->tambah_admin();
	}else{
	  $nama_admin=$this->input->post('nama_admin');
	  $username=$this->input->post('username');
	  $password=md5($this->input->post('password'));
	  $role='1';
	  $data = array(
				'nama_admin' => $nama_admin,
				'username' => $username,
				'password'=>$password,
				'role_id' => $role,
				);

	  $this->M_sewa->insert_data($data, 'admin');
	  $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
	  Data Admin Berhasil Ditambahkan.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	  </button>
	  </div>');
	  redirect('admin/admin');
       }
  }

  public function update_admin($id)
  {
  	$data['judul']='Halaman Edit Admin';
	$where = array('id_admin' => $id);
	$data['admin']= $this->db->query("SELECT * FROM admin WHERE id_admin ='$id'")->result();
	$this->load->view('templates_admin/header',$data);
	$this->load->view('templates_admin/sidebar');
	$this->load->view('admin/edit_admin',$data);
	$this->load->view('templates_admin/footer');
  }

  public function proses_update_admin()
  {
	$this->_rules();
	if($this->form_validation->run()==false)
	{
	   $this->update_admin($id);
	}else{
		 $id =$this->input->post('id_admin');
		 $nama_admin=$this->input->post('nama_admin');
		 $username=$this->input->post('username');
		 $password=md5($this->input->post('password'));
		 $data = array(
				'nama_admin' => $nama_admin,
				'username' => $username,
				'password'=>$password
	             );
		 $where = array('id_admin' => $id );
		 $this->M_sewa->update_data('admin',$data,$where);
		 $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Data Admin Berhasil Diupdate.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			  </div>');
	 	 redirect('admin/admin');

        }
  }

  public function delete_admin($id)
  {
  	$where=array('id_admin'=>$id);
  	$this->M_sewa->delete_data($where,'admin');
  	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data admin Berhasil Dihapus.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>');
	  redirect('admin/admin');
  }

  public function _rules()
  {
	$this->form_validation->set_rules('nama_admin','Nama','required');
	$this->form_validation->set_rules('username','Username','required');
	$this->form_validation->set_rules('password','Password','required|trim|min_length[5]');
	$this->form_validation->set_message('required', ' %s Tidak Boleh Kosong, Silahkan diisi!');
	$this->form_validation->set_message('min_length', ' %s Minimal 5 Karakter');
  }
}?>