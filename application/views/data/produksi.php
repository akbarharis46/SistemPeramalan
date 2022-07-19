<?php
$level = $this->session->userdata('level');
if ($level != 'admin' && ($level != 'Staff Produksi')) {
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
            <h2 class="m-0 text-primary"><i class="nav-icon fas fa-microphone"></i> Data Produksi</h2>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="alert alert-secondary" role="alert">
          <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="nav-icon fas fa-microphone"></i> Produksi
        </div>
        <div class="row">
          <div class="col">
            <!-- Tabel -->
            <div class="card">
              <!-- /.card-header -->

              <div class="card">
                <div class="card-body">
                  <div class='card-header' style="margin-left:-20px;">

                    <form action="" method="GET">
                      <div class="row">
                        <div class="col-md-3">


                          <a class='btn btn-primary' href="<?php echo site_url(); ?>ProduksiClient/post">
                            <i class="fa fa-plus"></i>
                            <span>
                              Tambah
                            </span>
                            </button>
                          </a>


                        </div>

                        <div class="col-md-4">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                              </span>
                            </div>
                            <!-- <input type="text" name="interval-tanggal" class="form-control float-right" id="aktif-date-range"> -->
                            <input type="text" name="interval-tanggal" class="form-control float-right" id="kt_daterangepicker_1" readonly="readonly">
                          </div>

                        </div>

                        <div class="col-md-3">
                          <button class="btn btn-dark">Filter</button>
                          <a href="<?php echo base_url('ProduksiClient') ?>" class="btn btn-outline-secondary">

                            <span class="svg-icon svg-icon-primary svg-icon-2x">
                              <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/General/Update.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <rect x="0" y="0" width="24" height="24" />
                                  <path d="M8.43296491,7.17429118 L9.40782327,7.85689436 C9.49616631,7.91875282 9.56214077,8.00751728 9.5959027,8.10994332 C9.68235021,8.37220548 9.53982427,8.65489052 9.27756211,8.74133803 L5.89079566,9.85769242 C5.84469033,9.87288977 5.79661753,9.8812917 5.74809064,9.88263369 C5.4720538,9.8902674 5.24209339,9.67268366 5.23445968,9.39664682 L5.13610134,5.83998177 C5.13313425,5.73269078 5.16477113,5.62729274 5.22633424,5.53937151 C5.384723,5.31316892 5.69649589,5.25819495 5.92269848,5.4165837 L6.72910242,5.98123382 C8.16546398,4.72182424 10.0239806,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 L6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,8.6862915 15.3137085,6 12,6 C10.6885336,6 9.44767246,6.42282109 8.43296491,7.17429118 Z" fill="#000000" fill-rule="nonzero" />
                                </g>
                              </svg>
                              <!--end::Svg Icon-->
                            </span>
                          </a>
                        </div>


                        <div class="col-md-12">

                          <?php

                          $filter_data_tanggal = "";
                          $request_data_tanggal = $this->input->get('interval-tanggal');

                          if ($request_data_tanggal) {

                            $filter_data_tanggal = $request_data_tanggal;
                          }

                          ?>
                          <a class='btn btn-danger' href="<?php echo site_url('ProduksiClient/exportToPDF?interval-tanggal=' . $filter_data_tanggal); ?>">
                            <i class="fa fa-file-pdf"></i>
                            <span>
                              Filter PDF
                            </span>
                          </a>
                          <a class="btn btn-success" href="<?php echo site_url('ProduksiClient/exportToExcel?interval-tanggal=' . $filter_data_tanggal); ?>">
                            <i class="fa fa-file-excel"></i>
                            <span>
                              Cetak Exel
                            </span>
                          </a>

                        </div>



                      </div>
                    </form>


                    <span>
                      <br>



                      <?php
                      if (!empty($this->session->flashdata('successAdd'))) {
                      ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 2%;">
                          <?php echo $this->session->flashdata('successAdd'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php
                      }
                      ?>




                      <?php
                      if (!empty($this->session->flashdata('successEdd'))) {
                      ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 2%;">
                          <?php echo $this->session->flashdata('successEdd'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php
                      }
                      ?>


                      <?php
                      if (!empty($this->session->flashdata('successdll'))) {
                      ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 2%;">
                          <?php echo $this->session->flashdata('successdll'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php
                      }
                      ?>

                    </span>

                    <table id="tabel-produksi" class="table table-bordered">
                      <thead>
                        <tr>
                          <th>NOMOR</th>
                          <th>Tanggal</th>
                          <th>Nama Staff Pengawas</th>
                          <th>Shift Produksi</th>
                          <th>Hasil Produksi</th>
                          <th>Produksi Reject</th>
                          <th>AKSI</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach ($produksi as $rows) : ?>
                          <tr>
                            <td><?php echo  $i++; ?></td>
                            <td><?php echo $rows->tanggal; ?>
                            <td><?php echo $rows->nama; ?>
                            <td><?php echo $rows->shift; ?>
                            <td><?php echo $rows->jumlah_produksi; ?>
                            <td><?php echo $rows->produksi_gagal; ?>
                            <td>
                              <a href="<?php echo site_url(); ?>ProduksiClient/put/<?php echo $rows->id_hasilproduksi; ?>" class="btn btn-warning">
                                <i class="fa fa-pen" aria-hidden="true"></i></a>


                              <a class="btn btn-success " href="<?= base_url(); ?>ProduksiClient/data_produksikeluar/<?= $rows->id_hasilproduksi; ?>">
                                <i class="fas fa-arrow-right" aria-hidden="true"></i></a>


                              <a href="<?= base_url(); ?>ProduksiClient/delete/<?= $rows->id_hasilproduksi; ?>" class="btn btn-danger" onClick="return confirm('yakin mau hapus');">
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

      <!--begin::Page Scripts(used by this page)-->
      <script src="<?php echo base_url('assets') ?>/assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js"></script>
      <script src="<?php echo base_url('assets') ?>/assets/plugins/custom/datatables/datatables.bundle.js?v=7.2.8"></script>


      <script>
        $('#tabel-produksi').DataTable();
      </script>