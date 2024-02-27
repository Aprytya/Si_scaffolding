<?php 
  class sewa extends CI_Controller
  { 
  
  public function tambah_sewa(){
    $data['judul']    = 'Tambah sewa';
    $data['barang']   = $this->M_sewa->lihat_stok();
    $data['penyewa']  = $this->M_sewa->getpenyewa();
    $this->load->view('templates_penyewa/header', $data);
    $this->load->view('penyewa/tambah_sewa', $data);
    $this->load->view('templates_penyewa/footer');
  }

  public function proses_tambah_sewa(){
    $jumlah_barang_disewa = count($this->input->post('nama_barang_hidden'));
    
    $data_penjualan = [
      'no_faktur' => $this->input->post('no_faktur'),
      'id_penyewa' => $this->M_sewa->getpnyID(),
      'tgl_sewa' => $this->input->post('tgl_sewa'),
      'tgl_kembali' => $this->input->post('tgl_kembali'),
      'lokasi'  => $this->input->post('lokasi'),
      'denda'=> '0',
      'total' => $this->input->post('total_hidden'),
      'status_sewa'=>'Belum selesai',
      'status_pengembalian'=>'Belum Kembali'
    ];

    $this->M_sewa->insert_data($data_penjualan, 'transaksi');
    $data_detail_penyewaan = [];
    for ($i=0; $i < $jumlah_barang_disewa ; $i++) { 
      array_push($data_detail_penyewaan, ['nama_barang' => $this->input->post('nama_barang_hidden')[$i]]);
      $data_detail_penyewaan[$i]['no_faktur'] = $this->input->post('no_faktur');
      $data_detail_penyewaan[$i]['harga_barang'] = $this->input->post('harga_barang_hidden')[$i];
      $data_detail_penyewaan[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
      $data_detail_penyewaan[$i]['satuan'] = $this->input->post('satuan_hidden')[$i];
      $data_detail_penyewaan[$i]['sub_total'] = $this->input->post('sub_total_hidden')[$i];
    }

    $this->M_sewa->tambah($data_detail_penyewaan,'detail_transaksi');
      for ($i=0; $i < $jumlah_barang_disewa ; $i++) { 
        $this->M_sewa->min_stok($data_detail_penyewaan[$i]['jumlah'], $data_detail_penyewaan[$i]['nama_barang'],'barang') or die('gagal min stok');
      }

      $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Sewa Scaffolding Berhasil Dilakukan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
      redirect('penyewa/transaksi');
      
  }

  public function get_barang(){
    $data = $this->M_sewa->lihat_nama_barang($_POST['nama_barang']);
    echo json_encode($data);
  }

  public function keranjang_sewa_barang(){
    $this->load->view('penyewa/keranjang_sewa');
  }


  public function detail_transaksi($no_faktur)
  {
  $data['judul']='Detail Transaksi Sewa';
  $data['transaksi']= $this->db->query("SELECT * FROM transaksi tr, penyewa p WHERE tr.id_penyewa=p.id_penyewa AND tr.no_faktur='$no_faktur'" )->row() ;
  $data['detail']= $this->M_sewa->lihat_no_faktur($no_faktur);
  $this->load->view('templates_penyewa/header',$data);
  $this->load->view('penyewa/detail_sewa', $data);
  $this->load->view('templates_penyewa/footer');
  }

}?>