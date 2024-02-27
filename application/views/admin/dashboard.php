<div class="main-content">
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
<div class="row">
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-primary">
      <i class="fas fa-archive"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Jumlah Scaffolding</h4>
      </div>
      <div class="card-body">
        <?php echo $this->M_sewa->get_data('barang')->num_rows(); ?>
      </div>
      <div class="card-footer">
      <a href="<?php echo base_url().'admin/barang' ?>"><span class="pull-left">Klik Lebih Rinci</span></a>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-danger">
      <i class="fas fa-user"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Jumlah Penyewa</h4>
      </div>
      <div class="card-body">
       <?php echo $this->M_sewa->get_data('penyewa')->num_rows(); ?>
      </div>
      <div class="card-footer">
      <a href="<?php echo base_url().'admin/penyewa' ?>"><span class="pull-left">Klik Lebih Rinci</span></a>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-warning">
      <i class="fas fa-circle"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Sewa Belum Selesai</h4>
      </div>
      <div class="card-body">
      <b><?php echo $this->M_sewa->edit_data(array('status_sewa'=>'Belum Selesai'),'transaksi')->num_rows(); ?>
      </div>
      <div class="card-footer">
     <a href="<?php echo base_url().'admin/transaksi'; ?>"><span class="pull-left">Klik Lebih Rinci</span></a>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
    <div class="card-icon bg-success">
      <i class="fas fa-check"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4>Sewa Sudah Selesai</h4>
      </div>
      <div class="card-body">
      <?php echo $this->M_sewa->edit_data(array('status_sewa'=>'Selesai'),'transaksi')->num_rows(); ?></b>
      </div>
      <div class="card-footer">
     <a href="<?php echo base_url().'admin/transaksi'; ?>"><span class="pull-left">Klik Lebih Rinci</span></a>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="row">
<div class="col-lg-6 col-md-10 col-10 col-sm-10">
  <div class="card">
    <div class="card-header">
      <h4>Sewa Scaffolding Terakhir</h4>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered tablehover table-striped">
      <thead>
        <tr>
          <th>Nama Penyewa</th>
          <th>Tanggal Sewa</th>
          <th>Tanggal Kembali</th>
          <th>Lokasi</th>
          <th>Total Bayar</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($transaksi as $tr){
        ?>
        <tr>
          <td><?php echo $tr->nama_penyewa ?></td>
          <td><?php echo date('d-m-Y',strtotime($tr->tgl_sewa)); ?></td>
          <td><?php echo date('d-m-Y',strtotime($tr->tgl_kembali)); ?></td>
          <td><?php echo $tr->lokasi; ?></td>
          <td>Rp. <?php echo  number_format($tr->total, 0, ',', '.') ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
    <a href="<?php echo base_url().'admin/transaksi' ?>">Lihat Semua Transaksi <i class="glyphicon glyphicon-arrow-right"></i></a> 
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-10 col-10 col-sm-10">
  <div class="card">
    <div class="card-header">
      <h4>Data Penyewa</h4>
    </div>
    <div class="card-body">
      <div class="list-group">
            <?php foreach($penyewa as $p){ ?>
              <a href="#" class="list-group-item">
                <i class="glyphicon glyphiconuser"></i> <?php echo $p->nama_penyewa; ?>
              </a>
            <?php } ?>
          </div>
      <div class="text-center pt-1">
      <a href="<?php echo base_url().'admin/penyewa' ?>">Lihat Semua Penyewa <i class="glyphicon glyphicon-arrow-right"></i></a>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-10 col-10 col-sm-10">
  <div class="card">
    <div class="card-header">
      <h4>Data Barang</h4>
    </div>
    <div class="card-body">
      <div class="list-group">
            <?php foreach($barang as $brg){ ?>
              <a href="#" class="list-group-item">
                <i class="glyphicon glyphiconuser"></i> <?php echo $brg->nama_barang; ?>
              </a>
            <?php } ?>
          </div>
      <div class="text-center pt-1 pb-1">
      <a href="<?php echo base_url().'admin/barang' ?>">Lihat Semua Scaffolding <i class="glyphicon glyphicon-arrow-right"></i></a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
