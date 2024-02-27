<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function index ()
 	{
 		$data['judul']='Sewa Scaffolding';
 		$data['barang']=$this->M_sewa->get_data('barang')->result();
		$this->load->view('templates_penyewa/header',$data);
		$this->load->view('penyewa/dashboard',$data);
		$this->load->view('templates_penyewa/footer');
 	}
  public function detail_barang($id)
 	{
 		$data['judul']='Detail Scaffolding';
 		$data['detail']=$this->M_sewa->ambil_id_barang($id);
		$this->load->view('templates_penyewa/header', $data);
		$this->load->view('penyewa/detail_barang',$data);
		$this->load->view('templates_penyewa/footer');
 	}

 }
 ?>