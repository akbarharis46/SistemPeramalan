<?php if ($this->session->userdata('level') != 'Staff Produksi') {
  redirect('login');
}; ?>

<div class="cc">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-primary"><i class="nav-icon fas fa-microphone"></i> Data Pengurangan Stock Produksi</h2>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="alert alert-secondary" role="alert">
          <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="nav-icon fas fa-microphone"></i> Pengurangan
        </div>
        <div class="row">
          <div class="col">
            <!-- Tabel -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class='card-header' style="margin-left:-20px;">
                  <a class='btn btn-primary' href="<?php echo site_url(); ?>PenguranganStockProduksiClient/postproduksi/<?= $id_detailproduksi ?>">
                    <i class="fa fa-plus"></i>
                    <span>
                      Tambah
                    </span>
                  </a>

                </div>


                <span>
                  <br>
                  <?php
                  if (!empty($this->session->flashdata('pesan'))) {
                  ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?= $this->session->flashdata('pesan'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php
                  }
                  ?>

                  <?php
                  if (!empty($this->session->flashdata('pesan2'))) {
                  ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?= $this->session->flashdata('pesan2'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php
                  }
                  ?>

                  <?php
                  if (!empty($this->session->flashdata('pesan3'))) {
                  ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <?= $this->session->flashdata('pesan3'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php
                  }
                  ?>
                </span>

                <table id="tabel" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>NOMOR</th>
                      <th>NAMA BARANG</th>
                      <th>JUMLAH PENGGUNAAN BARANG PRODUKSI</th>
                      <th>DATA BARANG PRODUKSI REJECT</th>


                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;

                    foreach ($penguranganstockproduksi as $rows) : ?>
                      <tr>
                        <td><?php echo  $i++; ?></td>
                        <td><?php echo $rows->nama_bahanbaku; ?>
                        <td><?php echo $rows->jumlah_pengurangan; ?>
                        <td><?php echo $rows->barang_rejectproduksi; ?>
                        </td>
                        <td>
                          <a href="<?php echo site_url(); ?>PenguranganStockProduksiClient/putproduksi/<?php echo $rows->id_detail_transaksiproduksi; ?>" class="btn btn-warning">
                            <i class="fa fa-pen" aria-hidden="true"></i></a>
                          <a href="<?= base_url(); ?>PenguranganStockProduksiClient/deleteproduksi/<?= $rows->id_transaksiproduksi; ?>/<?= $rows->id_detail_transaksiproduksi; ?>" class="btn btn-danger" onClick="return confirm('yakin mau hapus');">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->