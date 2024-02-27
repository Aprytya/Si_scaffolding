<div class="main-wrapper">
<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
    <div class="search-element">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
      <button class="btn" type="submit"><i class="fas fa-search"></i></button>
      <div class="search-backdrop"></div>
    </div>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" class="nav-link nav-link-lg nav-link-user">
     <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('nama_admin')?></div></a>
    </li>
  </ul>
</nav>
<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">SEWA SCAFFOLDING</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">SS</a>
    </div>
    <ul class="sidebar-menu">  
        <li><a class="nav-link" href="<?php echo base_url('admin/dashboard')?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
        <li><a class="nav-link" href="<?php echo base_url('admin/admin')?>"><i class="fas fa-user"></i> <span>Data Admin</span></a></li>
        <li><a class="nav-link" href="<?php echo base_url('admin/barang')?>"><i class="fas fa-archive"></i> <span>Data Barang</span></a></li>
        <li><a class="nav-link" href="<?php echo base_url('admin/penyewa')?>"><i class="fas fa-users"></i> <span>Data Penyewa</span></a></li>
        <li><a class="nav-link" href="<?php echo base_url('admin/transaksi')?>"><i class="fas fa-random"></i> <span>Transaksi</span></a></li>
        <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo base_url('admin/laporan/transaksi')?>">Transaksi</a></li>
            <li><a class="nav-link" href="<?php echo base_url('admin/laporan/barang')?>">Barang</a></li>
          </ul>
        </li>
       <li><a class="nav-link" href="<?php echo base_url('auth/logout')?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li> 
       <li><a class="nav-link" href="<?php echo base_url('auth/ganti_password')?>"><i class="fas fa-lock"></i> <span>Ganti Password</span></a></li> 
      </ul>
  </aside>
</div>