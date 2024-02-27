<?php 

class Transaksi extends CI_Controller
{
  public function index()
  {
  	$data['judul']='Data Sewa Scaffolding';
  	$data['transaksi'] =$this->db->query("SELECT * FROM transaksi tr, penyewa p WHERE tr.id_penyewa =p.id_penyewa")->result();
  	$this->load->view('templates_admin/header',$data);
  	$this->load->view('templates_admin/sidebar');
  	$this->load->view('admin/data_transaksi',$data);
  	$this->load->view('templates_admin/footer');
  }

  public function pembayaran($id)
  {
  	$data['judul']='Konfirmasi Pembayaran';
  	$where = array('no_faktur' => $id);
  	$data['pembayaran']=$this->db->query("SELECT * FROM transaksi WHERE no_faktur='$id'")->result();
  	$this->load->view('templates_admin/header',$data);
  	$this->load->view('templates_admin/sidebar');
  	$this->load->view('admin/konfirmasi_pembayaran',$data);
  	$this->load->view('templates_admin/footer');
  }

  public function cek_pembayaran()
  {
  	$id = $this->input->post('no_faktur');
  	$status_pembayaran =$this->input->post('status_pembayaran');
  	$data = array('status_pembayaran' => $status_pembayaran);
  	$where = array('no_faktur' => $id );

  	$this->M_sewa->update_data('transaksi',$data,$where);
  	redirect('admin/transaksi');
  }

  public function download_pembayaran($id)
  {
  	$this->load->helper('download');
  	$filepemabayaran=$this->M_sewa->downloadpembayaran($id);
  	$file = 'assets/upload/'.$filepemabayaran['bukti_pembayaran'];
  	force_download($file,NULL);	
  }

  public function transaksi_selesai($id)
  {
    $data['judul']='Transaksi Selesai';
    $where = array('no_faktur' => $id );
    $data['transaksi'] =$this->db->query("SELECT * FROM transaksi WHERE no_faktur ='$id'")->result();
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/transaksi_selesai',$data);
    $this->load->view('templates_admin/footer');
  }

  public function proses_transaksi_selesai()
  {
    $id=$this->input->post('no_faktur');
    $tgl_pengembalian=$this->input->post('tgl_pengembalian');
    $denda=$this->input->post('denda');
    $status_pengembalian=$this->input->post('status_pengembalian');
    $status_sewa=$this->input->post('status_sewa');
    $data = array(
        'tgl_pengembalian' => $tgl_pengembalian,
        'denda' => $denda,
        'status_pengembalian' => $status_pengembalian, 
        'status_sewa' => $status_sewa
      );
  
    $where = array('no_faktur' => $id );
    $this->M_sewa->update_data('transaksi',$data,$where);
    $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
       Transaksi diUpdate.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    redirect('admin/transaksi');
  }

   public function transaksi_batal($id)
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
      redirect('admin/transaksi');
    }

  public function print_transaksi($no_faktur)
    {
      $data['judul']  ='Faktur Sewa';
      $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, penyewa p WHERE tr.id_penyewa =p.id_penyewa AND tr.no_faktur ='$no_faktur'")->row();
      $data['detail'] = $this->M_sewa->lihat_no_faktur($no_faktur);
      $this->load->view('templates_admin/header',$data);
      $this->load->view('admin/cetak_faktur', $data);
    }


 }?>