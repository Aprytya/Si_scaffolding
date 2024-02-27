
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/homepage/')?>img/logo.jpg" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="<?php echo base_url('assets/homepage/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <title><?php echo $judul ?></title>
</head>
<body> 

 <!-- Navigation-->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">TOKO ANGGUN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link mr-3" href="<?php echo base_url('penyewa/dashboard') ?>">Beranda<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-3" href="#tentang_kami">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-3" href="#ketentuan_sewa">Syarat & Ketentuan Sewa Scaffolding</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-3" href="#produk">Produk</a>
        </li>
        <li class="btn btn-sm btn-outline-primary dropdown mr-3">
          <?php if ($this->session->userdata('nama_penyewa')) { ?>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hai, <?php echo $this->session->userdata('nama_penyewa')?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url('penyewa/sewa/tambah_sewa')?>">Sewa</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('penyewa/transaksi')?>">Transaksi</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('auth/ganti_password') ?>">Ubah Password</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">Logout</a>
          </div>
          <?php } else { ?>
          <a class="nav-link text-" href="<?php echo base_url('auth/login') ?>"> <span>Login/Registrasi</span></a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </div>
  </nav>

