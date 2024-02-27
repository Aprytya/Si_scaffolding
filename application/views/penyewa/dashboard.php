<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <div class="carousel-item active">
  <img class="d-block w-100" src="<?php echo base_url('assets/homepage/')?>img/home.jpg">
  </div>
  </div>
</div>
<!--TENTANG KAMI-->
<section class="page-section my-5 p-4" id="tentang_kami">
  <div class="card">
    <div class="card-header">
      <h2 class="section-heading text-uppercase text-center">Tentang Kami</h2>
    </div>
    <div class="card-body">
      <p>Didirikan sejak tahun 2013 merupakan salah satu usaha dibidang jasa dan dagang. Kami menyewakan scaffolding untuk Wilayah Bukittinggi dan sekitarnya</p>
      <h6>Kantor :</h6>
       <p>Jalan Bypass Koto Bawah, Pulai Anak Air, Bukittinggi</p>
      <h6>Kontak :</h6>
       <p> Hp/WA : 082169648888 <br> Email : anggunbkt@gmail.com</p>
    </div>
  </div>
</section>
<!--KETENTUAN SEWA-->
<section class="page-section my-5 p-4" id="ketentuan_sewa">
  <div class="card">
    <div class="card-header">
      <h2 class="section-heading text-uppercase text-center">Syarat & Ketentuan Sewa Scaffolding</h2>
    </div>
    <div class="card-body">
      <h5>Cara Sewa Scaffolding</h5>
       <ol>
           <li>Melakukan Regitrasi </li>
           <li>Isi data barang yang akan disewa, lokasi tujuan dan lama waktu sewa pada halaman yang telah disediakan</li>
           <li>Admin akan mengkonfiramsi penyewaan kepada anda</li>
           <li>Apabila harga sudah OK, admin akan mengatur pengiriman ke lokasi anda</li>
           <li>Untuk pembayaran bisa DITRANSFER sebelum armada kami berangkat atau bisa bayar TUNAI di LOKASI</li> 
        </ol>
        <h5>Ketentuan Sewa Scaffolding</h5>
        <ol>  
           <li>Jangka waktu sewa scaffolding Minimal 7 Hari</li>
           <li>Barang yang hilang dan rusak menjadi tanggung jawab penyewa</li>
           <li>Belum termasuk uang transort ke LOKASI YG SAMA</li>
           <li>Tidak termasuk JASA BONGKAR PASANG</li>
           <li>Untuk pengambilan barang mohon bisa diinfo 1 hari sebelumnya, pastikan scaffolding sudah dalam kondisi TERBONGKAR, sudah berada di LUAR Rumah/Ruko dan siap DIANGKUT. Untuk jadwal pengambilan barang PALING SORE jam 14.00, hari MINGGU kami LIBUR.</li>
           <li>Pelanggan wajib MENGECEK kelengkapan jumlah barang yang dikirim sudah sesuai dengan SURAT JALAN pada saat DITERIMA. Kami Tidak menerima COMPLAIN setelah mobil kami meninggalkan lokasi, Terima kasih</li>
        </ol>
    </div>
  </div>
</section>
<!--PRODUK-->
<section class="page-section my-5 px-4" id="produk">
  <div class="card">
    <div class="card-header">
      <h2 class="section-heading text-uppercase text-center">produk</h2>
    </div> 
    <div class="card-body">
    <div class="row justify-content-center">
      <?php foreach ($barang as $brg): ?>
      <div class="col-sm-3 my-3">
      <div class="card h-100">
        <img class="card-img-top" src="<?php echo base_url('assets/upload/'. $brg->gambar) ?>">
        <div class="card-body">
        <div class="text-center">
          <h5 class="fw-bolder"><?php echo $brg->nama_barang ?></h5>
          <label>Harga Sewa : </label> Rp. <?php echo number_format($brg->harga_barang,0,',','.') ?> <label>/Hari</label>
        </div>
        </div>
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
          <a href="<?php echo base_url('penyewa/dashboard/detail_barang/').$brg->id_barang?>" class="btn btn-info">Detail</a>
        </div>
      </div>
      </div>
      <?php endforeach ;?>
    </div>  
    </div>
  </div>
</section>

