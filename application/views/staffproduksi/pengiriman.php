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
            <h2 class="m-0 text-primary"><i class="nav-icon fas fa-microphone"></i> Data Pengiriman Barang</h2>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="alert alert-secondary" role="alert">
          <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="nav-icon fas fa-microphone"></i> Pengiriman
        </div>
        <div class="row">
          <div class="col">
            <!-- Tabel -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class='card-header' style="margin-left:-20px;">


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
                      <th data-sourtable="">NOMOR</th>
                      <th data-sourtable="">NAMA PENGIRIM</th>
                      <th data-sourtable="">NOMOR HP PETUGAS PENGIRIMAN</th>
                      <th data-sourtable="">TUJUAN PENGIRIMAN</th>
                      <th data-sourtable="">JUMLAH PENGIRIMAN</th>
                      <th data-sourtable="">JENIS KENDARAAN</th>
                      <th data-sourtable="">NOMOR KENDARAAN</th>
                      <th data-sourtable="">TANGGAL</th>
                      <th data-sourtable="">SURAT PENGIRIMAN</th>
                      <th data-sourtable="">STATUS PENGIRIMAN</th>


                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;

                    foreach ($pengiriman as $rows) : ?>
                      <?php if ($rows->status_pengiriman == 'Proses Pengiriman') : ?>
                        <tr>
                          <td><?php echo  $i++; ?></td>
                          <td><?php echo $rows->nama_staff; ?>
                          <td><?php echo $rows->nomorhp; ?>
                          <td><?php echo $rows->tujuan; ?>
                          <td><?php echo $rows->jumlah; ?>
                          <td><?php echo $rows->jenis_kendaraan; ?>
                          <td><?php echo $rows->nomor_kendaraan; ?>
                          <td><?php echo $rows->tanggal; ?>
                          <td>
                            <img src="<?php echo base_url('img/foto/') . $rows->bukti_surat ?>" width="150px" alt="">

                          </td>
                          <td><?php echo $rows->status_pengiriman; ?>


                          </td>



                          </td>
                        </tr>
                      <?php endif; ?>
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