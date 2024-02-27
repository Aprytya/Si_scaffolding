<?php 

class Transaksi extends CI_Controller
{
  
  public function index()
 	{
 		$data['judul']='Data Sewa Scaffolding';
 		$penyewa =$this->session->userdata('nama_penyewa');
 		$data['transaksi'] =$this->db->query("SELECT * FROM transaksi tr, penyewa p WHERE tr.id_penyewa =p.id_penyewa AND p.nama_penyewa='$penyewa' ORDER BY no_faktur DESC")->result();
 		$this->load->view('templates_penyewa/header',$data);
		$this->load->view('penyewa/data_sewa', $data);
		$this->load->view('templates_penyewa/footer');
 	}
 	public function pembayaran($id)
 	{
 	  $data['judul']='Invoice Pembayaran';
 	  $data['transaksi'] =$this->db->query("SELECT * FROM transaksi tr, penyewa p WHERE tr.id_penyewa =p.id_penyewa AND tr.no_faktur ='$id' ORDER BY no_faktur DESC")->result();
 	  $this->load->view('templates_penyewa/header',$data);
		$this->load->view('penyewa/pembayaran', $data);
		$this->load->view('templates_penyewa/footer');
 	}

 	public function proses_pembayaran()
 	{
 		$id 				= $this->input->post('no_faktur');
 		$bukti_pembayaran=$_FILES['bukti_pembayaran']['name'];
		if($bukti_pembayaran){
			$config['upload_path']          = './assets/upload';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('bukti_pembayaran')){
				$bukti_pembayaran=$this->upload->data('file_name');
				$this->db->set('bukti_pembayaran',$bukti_pembayaran);
			}else{
				echo $this->upload->display_errors; 
			}
			}
		$data = array(
					'bukti_pembayaran' => $bukti_pembayaran,
	             );

		 $where = array('no_faktur' => $id );
		 $this->M_sewa->update_data('transaksi',$data,$where);
		 $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			  Bukti Pembayaran Anda Berhasil dikirim.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button>
			  </div>');
	 	 redirect('penyewa/transaksi');

        }

    public function cetak_invoice($id)
    {
    	$data['judul']  ='Invoice Pembayaran Sewa';
    	$data['transaksi'] =$this->db->query("SELECT * FROM transaksi tr, penyewa p WHERE tr.id_penyewa =p.id_penyewa AND tr.no_faktur ='$id' ORDER BY no_faktur DESC")->result();
    	$this->load->view('templates_penyewa/header',$data);
    	$this->load->view('penyewa/cetak_invoice',$data);
    }

    public function batal_transaksi($id)
    {
    	$where = array('no_faktur' => $id);
    	$data=$this->M_sewa->get_where($where,'transaksi')->row();
    	$this->M_sewa->delete_data($where,'transaksi');
    	$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		 Transaksi Berhasil dibatalkan
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		  </button>
		  </div>');
    	redirect('penyewa/transaksi');
    }

    public function detail_transaksi($no_faktur)
    {
    	$data['judul'] = 'Detail Penyewaan';
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, penyewa p WHERE tr.id_penyewa =p.id_penyewa AND tr.no_faktur ='$no_faktur'")->row();
		$data['detail'] = $this->M_sewa->lihat_no_faktur($no_faktur);
		$this->load->view('templates_penyewa/header',$data);
		$this->load->view('penyewa/detail_transaksi', $data);
		$this->load->view('templates_penyewa/footer');
    }

    public function print_detail($no_faktur)
    {
    	$data['judul'] = 'Cetak Faktur';
    	$data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, penyewa p WHERE tr.id_penyewa =p.id_penyewa AND tr.no_faktur ='$no_faktur'")->row();
		$data['detail'] = $this->M_sewa->lihat_no_faktur($no_faktur);
		$this->load->view('templates_penyewa/header',$data);
		$this->load->view('penyewa/cetak_faktur', $data);
    }


 }?>