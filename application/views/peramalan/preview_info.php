
<div class="cc">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0 text-primary"><i class="nav-icon fas fa-users"></i> Tambah Informasi Peramalan</h2>
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
      <div class="row justify-content-center">
        <div class="col-md-9">
          

          <div class="card card-body">
              
              <div class="row">
                  <div class="col-md-4" style="border-right: 1px solid #e0e0e0">
                      <small><b>Penanggung Jawab</b></small>
                      <h2><?php echo $this->session->userdata('username') ?></h2>
                  </div>
                  <div class="col-md-6" style="border-right: 1px solid #e0e0e0">
                      <small><b>Tanggal Pembuatan</b></small>
                      <h2><?php echo date('d F Y H.i A') ?></h2>
                  </div>
              </div>

              <br><br>


              <div class="row">
                  <div class="col-md-12">
                      <h2>Hasil Peramalan</h2>
                      Interval mulai dari <b><?php echo $start ?></b> sampai dengan <b><?php echo $end ?></b><br>
                      Pemulusan : <b><?php echo $jenis ?></b> &emsp;|&emsp;
                      Alpha : <b><?php echo $jenis == "keseluruhan" ? "0 - 1" : $alpha ?></b>

                      <hr>


                      <?php if ( $jenis == "sebagian" ) : ?>

                        <h2>Proses Perhitungan</h2>

                        <table class="table table-stripe">
                            <thead>
                                <tr>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Aktual</th>
                                    <th>Pemulusan 1</th>
                                    <th>Pemulusan 2</th>
                                    <th>Pemulusan 3</th>
                                    <th>at</th>
                                    <th>bt</th>
                                    <th>ct</th>
                                    <th>Ft</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $urutan = 0;
                                    $max = count($peramalan[0]) - 1;

                                    foreach ( $peramalan[0] AS $isi ) :
                                      
                                      
                                      $at = "";  
                                      $bt = "";  
                                      $ct = "";
                                      $s1 = "";
                                      $s2 = "";
                                      $s3 = "";
                                      

                                      if ( $urutan <= $max ) {

                                        if ( gettype($isi['at']) != "string" ) {

                                          $s1 = number_format($isi['pemulusan_1'], );
                                          $s2 = number_format($isi['pemulusan_2'], );
                                          $s3 = number_format($isi['pemulusan_3'], );

                                          $at = number_format($isi['at'], );  
                                          $bt = number_format($isi['bt'], );  
                                          $ct = number_format($isi['ct'], );
                                        }
                                        
                                        
                                      }

                                      $urutan++;
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $isi['tahun'] ?></td>
                                        <td><?php echo $isi['bulan'] ?></td>
                                        <td><?php echo $isi['actual'] ?></td>
                                        <td><?php echo $s1 ?></td>
                                        <td><?php echo $s2 ?></td>
                                        <td><?php echo $s3 ?></td>
                                        <td><?php echo $at ?></td>
                                        <td><?php echo $bt ?></td>
                                        <td><?php echo $ct ?></td>
                                        <td><?php echo number_format($isi['Ft'], ) ?></td>
                                    </tr>

                                    <?php endforeach; ?>
                                </tbody>


                        </table>


                        <hr style="border-bottom: 4px solid #e0e0e0">
                        <h1>Hasil Pengujian Perhitungan</h1>
                        <table class="table table-stripe">
                            <thead>
                                <tr>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Jumlah</th>
                                    <th>Peramalan</th>
                                    <th>PE</th>
                                    <th>APE</th>
                                </tr>
                            </thead>
                            <tbody>
                                  <?php 
                                  
                                  
                                  $total_ape = 0;
                                  $total_pe = 0;

                                  foreach ( $pengujian[0] AS $isi ) :
                                  
                                      if ( $isi['Ft'] != 0 && !empty($isi['actual']) ) {


                                          $PE = (( $isi['actual'] - $isi['Ft'] ) / $isi['actual']) * 100;
                                          $APE = abs($PE);
                      
                      
                                          $total_ape += $APE;
                                          $total_pe += $PE;
                                      }
                                  ?>

                                      <tr>
                                          <td><?php echo $isi['tahun'] ?></td>
                                          <td><?php echo $isi['bulan'] ?></td>
                                          <td><?php echo $isi['actual'] ?></td>
                                          <td><?php echo $isi['Ft'] == 0 ? '-' : number_format($isi['Ft'], ) ?></td>
                                          <td><?php echo $isi['PE'] == 0 ? '-' : number_format($isi['PE'], 2) ?></td>
                                          <td><?php echo $isi['APE'] == 0 ? '-' : number_format($isi['APE'], 2) ?></td>
                                        
                                      </tr>
                                  <?php endforeach;
                                  
                                  
                                      $dt_peramalan = count($pengujian[0]) - 2;

                                      $MAPE = $total_ape / $dt_peramalan;
                                      $MPE = $total_pe / $dt_peramalan;
                                  ?>

                                  <tr>
                                      <td colspan="4" class="text-right"><b>Total</b></td>
                                      <td><?php echo number_format($total_pe, 2) ?></td>
                                      <td><?php echo number_format($total_ape, 2) ?></td>
                                  </tr>
                            </tbody>
                          </table>

                          <h5>Kesimpulan</h5>
                          <p>
                              Pada Alpha <?php echo $alpha ?> menunjukan hasil Mean Absolute Percentage Error dengan Nilai <b><?php echo number_format($MAPE, 2) ?> %</b>, 
                              dan Mean Percentage Error dengan hasil <b><?php echo number_format($MPE, 2) ?> %</b>
                          </p>

                          <hr>

                      <?php else: ?>


                        <?php
                          // header('Content-Type: application/json');
                          // print_r( $peramalan );  
                        ?>


                        <?php
                                $summary_perhitungan = [];
                                $summary_mape = [];
                                $summary_alpha = [];
                                $summary_forecasting = [];

                                // kolom 1 : peramalan
                                foreach ( $peramalan AS $kolom ) {

                                    // kolom alpha
                                    array_push( $summary_alpha, $kolom['alpha'] );

                                    $max = count($kolom['perhitungan']) - 1;
                                    foreach ( $kolom['perhitungan'] AS $urutan => $isi ) {

                                        if ( $isi['Ft'] != 0 && !empty($isi['actual']) ) {

                                            array_push( $summary_perhitungan, $isi['Ft'] );
                                        }


                                        if ( $urutan == $max ) {

                                          array_push( $summary_forecasting, $isi['Ft'] );
                                        }
                                    }
                                    
                                }


                                // kolom 2 : pengujian
                                foreach ( $pengujian AS $kolom ) {

                                    $totalAPE = 0;
                                    $totalPE = 0;
                                    foreach ( $kolom['pengujian'] AS $isi ) {

                                        if ( $isi['Ft'] != 0 && !empty($isi['actual']) ) {

                                            $PE = (( $isi['actual']  - $isi['Ft']  ) / $isi['actual'] ) * 100;
                                            $APE = abs($PE);
                        
                        
                                            $totalAPE += $APE;
                                            $totalPE += $PE;
                                        }
                                    }

                                    // hitung nilai MAPE
                                    $dt_peramalan = count($kolom['pengujian']) - 2;

                                    $MAPE = $totalAPE / $dt_peramalan;

                                    array_push( $summary_mape, $MAPE );
                                }


                                $nilaiMinimum = min( $summary_mape );
                                $hasilIndex = array_search( $nilaiMinimum, $summary_mape );
                            ?>


                            <table class="table table-stripe">
                                <thead>
                                    <tr>
                                        <th>α</th>
                                        <th>Peramalan</th>
                                        <th>MAPE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ( $urutan = 0; $urutan < count( $peramalan ); $urutan++ ) : ?>
                                    <tr>
                                        <td><?php echo $summary_alpha[ $urutan ] ?></td>
                                        <td><?php echo number_format($summary_forecasting[ $urutan ], 2) ?></td>
                                        <td><?php echo number_format($summary_mape[ $urutan ], 2) ?></td>
                                    </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>

                            <b>Kesimpulan</b>
                            Dari tabel di atas tingkat kesalahan terkecil ada pada alpha <?php echo $summary_alpha[ $hasilIndex ] ?> dengan hasil mean absolute percentage error 
                            <?php echo $summary_mape[ $hasilIndex ] ?> dengan hasil peramalan <?php echo $summary_perhitungan[ $hasilIndex ] ?>.


                      <?php endif; ?>
                  </div>
              </div>


             

              <div class="form-group">
                  <a href="<?php echo base_url('peramalan/tambah') ?>" class="btn btn-light-primary">Batal</a>
                  <a href="<?php echo base_url('peramalan/proses_simpan') ?>" class="btn btn-primary">Ajukan Peramalan</a>
              </div>

              </form>

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
