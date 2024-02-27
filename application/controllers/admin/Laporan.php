<?php 
  class Laporan extends CI_Controller
  { 
  	public function transaksi()
  	{
  		$data['judul']='Laporan';
  		$dari=$this->input->post('dari');
  		$sampai=$this->input->post('sampai');

  		$this->_rules();
  		if ($this->form_validation->run()==FALSE) {
  		$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/filter_laporan');
			$this->load->view('templates_admin/footer');
  		}else{ 
  			$data['laporan'] =$this->db->query("SELECT * FROM transaksi tr, penyewa p WHERE tr.id_penyewa=p.id_penyewa AND date(tgl_sewa)>='$dari' AND date(tgl_sewa)<='$sampai'")->result();
  		$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/tampilkan_laporan',$data);
			$this->load->view('templates_admin/footer');
  		} 		
  	}

    public function print_laporan()
    {
      $dari=$this->input->get('dari');
      $sampai=$this->input->get('sampai');
      $data['judul']='Print Laporan Transaksi';
      $data['laporan'] =$this->db->query("SELECT * FROM transaksi tr, penyewa p WHERE tr.id_penyewa=p.id_penyewa AND date(tgl_sewa)>='$dari' AND date(tgl_sewa)<='$sampai'")->result();
      $this->load->view('templates_admin/header',$data);
      $this->load->view('admin/print_laporan',$data);
    }

    public function barang()
    {
      $data['judul']='Laporan Stok Barang';
      $data['laporan'] = $this->M_sewa->get_data('barang')->result();
      $this->load->view('templates_admin/header',$data);
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/tampilkan_laporan_barang',$data);
      $this->load->view('templates_admin/footer');
      }

    public function print_laporan_barang()
    {
      $data['judul']='Print Laporan Barang';
      $data['laporan'] =$this->M_sewa->get_data('barang')->result();
      $this->load->view('templates_admin/header',$data);
      $this->load->view('admin/print_laporan_barang',$data);
    }

  	public function _rules()
  	{
  		$this->form_validation->set_rules('dari','Dari Tanggal','required');
  		$this->form_validation->set_rules('sampai','Sampai Tanggal','required');
  		$this->form_validation->set_message('required', ' %s Tidak Boleh Kosong, Silahkan diisi!');

  	}
  }?>