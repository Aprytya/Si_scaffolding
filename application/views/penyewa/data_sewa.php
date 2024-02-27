<body id="page-top">
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid" style="margin-top: 100px;margin-bottom: 100px">
        <div class="card">
           <span aria-hidden="true">
            <?php echo $this->session->flashdata('pesan') ?>
         </span>
          <div class="card-header"><h4>Daftar Transaksi Sewa Anda</h4>
          </div>
          <div class="card-body">
              <a href="<?php echo base_url('penyewa/sewa/tambah_sewa')?>" class="btn btn-primary btn-sm mb-2">Tambah</a>   
            <div class="table-responsive">
              <table class="table table-bordered text-center mb-3" id="dataTable" width="100%" cellspacing="0">
              <thead>
              <tr>
              <th>No</th>
              <th>No Faktur</th>
              <th>Nama Penyewa</th>
              <th>Tanggal Sewa</th>
              <th>Tanggal Kembali</th>
              <th>Lokasi Tujuan</th>
              <th>Total</th>
              <th>Keterangan</th>
              <th>Opsi</th>
              </tr>
              </thead>
              <tbody>
              <?php  
              $no=1;
              foreach($transaksi as $tr): ?>
                <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $tr->no_faktur ?></td>
                <td><?php echo $tr->nama_penyewa?></td>
                <td><?php echo $tr->tgl_sewa ?></td>
                <td><?php echo $tr->tgl_kembali ?></td>
                <td><?php echo $tr->lokasi ?></td>
                <td>Rp <?php echo number_format($tr->total, 0, ',', '.') ?></td>
                <td>
                 <?php if ($tr->status_sewa== "Selesai") { ?>  
                  <button class="btn btn-sm btn-success">Sewa Selesai</button>       
                 <?php }else{ ?>
                  <a href="<?php echo base_url('penyewa/transaksi/pembayaran/'.$tr->no_faktur) ?>" class="bt btn-sm btn-primary">Cek Pembayaran</a>
                 <?php } ?>
                </td>
                <td>
                  <?php if ($tr->status_sewa=='Belum Selesai') {?>
                  <a onclick="confirm('Anda Yakin Akan Membatalkan Transaksi?')" class="btn btn-sm btn-danger" href="<?php echo base_url('penyewa/transaksi/batal_transaksi/'. $tr->no_faktur) ?>">Batal</a>
                  <?php }else{ ?> 
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal">Batal
                    </button>
                  <?php } ?>
                  
                  <a class="btn btn-sm btn-info" href="<?php echo base_url('penyewa/transaksi/detail_transaksi/'.$tr->no_faktur) ?>">Detail</a></td>
                </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Batal Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
        Transaksi ini telah selesai dan tidak bisa dibatalkan!
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Oke</button>
      </div>
    </div>
  </div>
</div>