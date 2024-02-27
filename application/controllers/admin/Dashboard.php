<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index ()
 	{
 		$data['judul']='Dashboard Admin';
 		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, penyewa p WHERE tr.id_penyewa=p.id_penyewa ORDER BY no_faktur DESC limit 10")->result();
		$data['penyewa'] = $this->db->query("SELECT * FROM penyewa ORDER BY id_penyewa DESC limit 10")->result();
		$data['barang'] = $this->db->query("SELECT * FROM barang ORDER BY id_barang DESC limit 10")->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('templates_admin/footer');
 	}
}?>