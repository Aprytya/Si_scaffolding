<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Auth extends CI_Controller
 {
 	
 	public function login()
 	{
 		$data['judul']='Halaman Login';
 		$this->_rules();

 		if ($this->form_validation->run()==FALSE) {
 			$this->load->view('templates_admin/header',$data);
	 		$this->load->view('admin/login');
	 		$this->load->view('templates_admin/footer');
 		}else{
 			$username = $this->input->post('username');
 			$password = md5($this->input->post('password'));
 			$cek=$this->M_sewa->cek_login_admin($username, $password);
 			
 			if($cek==FALSE){
 				 $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 Username atau Password Salah!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					  </button>
					  </div>');
			  redirect('admin/auth/login');
 			}else{
 				$this->session->set_userdata('username',$cek->username);
 				$this->session->set_userdata('role_id',$cek->role_id);
 				$this->session->set_userdata('nama_admin',$cek->nama_admin);


 				switch ($cek->role_id) {
 					case 1 : redirect('admin/dashboard');
 						break;
 					case 2 : redirect('penyewa/dashboard');
 						break;
 					
 					default:
 						break;
 				}
 			}
 		}
 		
 	}
 	public function _rules()
 	{
 		$this->form_validation->set_rules('username','Username','required');
 		$this->form_validation->set_rules('password','Password','required');
 	}
 	
 	public function logout()
 	{
 		$this->session->sess_destroy();
 		redirect('penyewa/dashboard');
 	}

 	public function ganti_password()
 	{
 		$data['judul']='Halaman Ganti Password';
 		$this->load->view('templates_admin/header',$data);
 		$this->load->view('admin/ganti_password');
 		$this->load->view('templates_admin/footer');
 	}

 	public function proses_ganti_password()
 	{
 		$pass_baru=$this->input->post('pass_baru');
 		$pass_ulang=$this->input->post('pass_ulang');
 		$this->form_validation->set_rules('pass_baru', 'Password Baru','required|matches[pass_ulang]');
		$this->form_validation->set_rules('pass_ulang', 'Ulangi Password','required'); 
		$this->form_validation->set_message('required', ' %s Tidak Boleh Kosong, Silahkan diisi!');
		$this->form_validation->set_message('matches', ' %s Tidak Sama, Silahkan Diperiksa Kembali!');		
		if($this->form_validation->run()!=false){
			$data = array('password' => md5($pass_baru));
			$id = array('id_admin' => $this->session->userdata('id_admin'));
			$this->M_sewa->update_password($id, $data,'penyewa');
			 $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
					Password Berhasil Diganti,Silahkan Login!.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					  </button>
					  </div>');
			  redirect('admin/auth/login');
		}
 	}
 } ?>