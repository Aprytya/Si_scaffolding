<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Register extends CI_Controller
 {
  
  public function index()
  {
    $data['judul']='Halaman Regitrasi Penyewa';
    $this->_rules();
    if($this->form_validation->run()==FALSE){
      $this->load->view('templates_admin/header',$data);
      $this->load->view('registrasi');
      $this->load->view('templates_admin/footer');  
    }else{
      $nama_penyewa=$this->input->post('nama_penyewa');
        $username=$this->input->post('username');
        $alamat=$this->input->post('alamat');
        $pekerjaan=$this->input->post('pekerjaan');
        $no_hp =$this->input->post('no_hp');
        $no_ktp=$this->input->post('no_ktp');
        $password=md5($this->input->post('password'));
        $role_id = '2';
    
      $data = array(
          'nama_penyewa' => $nama_penyewa,
          'username' => $username,
          'alamat' => $alamat,
          'pekerjaan' => $pekerjaan,
          'no_hp'=>$no_hp,
          'no_ktp' => $no_ktp,
          'password'=>$password,
          'role_id'=>$role_id
      );

      $this->M_sewa->insert_data($data, 'penyewa');
      $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Register, Silahkan Login!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    redirect('auth/login');
    }
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
 } ?>