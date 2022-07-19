<link href="<?php echo base_url('assets') ?>/assets/plugins/custom/datatables/datatables.bundle.css?v=7.2.9" rel="stylesheet" type="text/css" />



<div class="cc">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-primary"><i class="nav-icon fas fa-users"></i> Peramalan Triple Exponential Smoothing</h2>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="alert alert-secondary" role="alert">
          <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="nav-icon fas fa-users"></i> Triple Exponential Smoothing
        </div>
        <div class="row">
          <div class="col">
            <!-- Tabel -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class='card-header' style="margin-left:-20px;">
                    <a class='btn btn-primary' href="<?php echo site_url(); ?>peramalan/tambah">
                      <i class="fa fa-plus"></i>
                      <span>
                        Tambah Laporan Peramalan
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
                </span>

                <table id="tabel-user" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Penanggung-jawab</th>
                      <th>Pemulusan</th>
                      <th>Interval</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    
                      foreach ( $peramalan->result_array() AS $index => $isi ) : ?>

                      <tr>
                        <td><?php echo $index + 1 ?></td>
                        <td><?php echo $isi['nama'] ?></td>
                        <td><?php echo $isi['jenis_pemulusan'] ?></td>
                        <td><?php echo date('F Y', $isi['tanggal_awal']).' - '. date('F Y', $isi['tanggal_akhir']) ?></td>
                        <td>
                          <?php
                          
                            if ( $isi['status_pengajuan'] == "pengajuan" ) {

                              echo '<label class="badge badge-primary">Diajukan</label>';
                            } else if ( $isi['status_pengajuan'] == "diterima" ) {

                              echo '<label class="badge badge-success">Diterima</label>';
                            } else {

                              echo '<label class="badge badge-danger">Ditolak</label>';
                            }
                          ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url('peramalan/detailproduksi/'. $isi['id_peramalan']) ?>" class="btn btn-light-primary">Lihat Detail</a>
                          <a href="<?php echo base_url('peramalan/deleteproduksi/'. $isi['id_peramalan']) ?>" class="btn btn-light-danger">Hapus</a>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    
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

  <!--begin::Page Scripts(used by this page)-->
  <script src="<?php echo base_url('assets') ?>/assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js"></script>
  <script src="<?php echo base_url('assets') ?>/assets/plugins/custom/datatables/datatables.bundle.js?v=7.2.8"></script>


  <script>
    $('#tabel-user').DataTable();
  </script>