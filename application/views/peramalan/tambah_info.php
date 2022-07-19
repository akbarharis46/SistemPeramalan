
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


                <form action="<?php echo base_url('peramalan/proses_perhitungan') ?>" method="GET">

                <div class="row">
                    <div class="col-md-8">
                    	<div class="form-group row">
                    		<label for=""><b>Interval Waktu</b></label>
                    		<div class="input-daterange input-group" id="kt_datepicker_5">
                    			<input type="text" class="form-control" name="start" placeholder="Bulan Awal" autocomplete="off" />
                    			<div class="input-group-append">
                    				<span class="input-group-text">Sampai</span>
                    			</div>
                    			<input type="text" min="2018-12-30" class="form-control" name="end" placeholder="Bulan Akhir" autocomplete="off" />
                    		</div>
                            <small>Pilih interval waktu peramalan</small>
                    	</div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                    	<div class="form-group row">
                    		<label for=""><b>Pemulusan</b></label>
                    		<select name="pemulusan" class="form-control" id="">
                                <option value="keseluruhan">Keseluruhan</option>
                                <option value="sebagian">Sebagian</option>
                            </select>
                            <small>Pilih interval waktu peramalan</small>
                    	</div>
                    </div>
                    <div class="col-md-4" id="input-alpha">
                    	<div class="form-group row">
                    		<label for=""><b>Nilai Alpha</b></label>
                    		<input type="text" name="alpha" class="form-control" placeholder="Nilai Alpha . . ." />
                            <small>Masukkan nilai pemulusan antara 0 - 1</small>
                    	</div>
                    </div>
                </div>

                <div class="form-group">
                    <a href="" class="btn btn-light-primary">Batal</a>
                    <button type="submit" class="btn btn-primary">Hitung Peramalan</button>
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

<script>
    
    $(function() {

        
        let elementInputAlpha = $('#input-alpha');
        
        // awalan 
        elementInputAlpha.hide();

        // pilih pemulusan
        $('select[name="pemulusan"]').on('change', function() {

            let pilihan = $(this).val(); // berisi nilai

            if ( pilihan == "keseluruhan" ) {

                elementInputAlpha.hide(1000);

            } else if ( pilihan == "sebagian" ) {

                elementInputAlpha.show(1000);
            }
        })
    })


    // range picker
    $('#kt_datepicker_5').datepicker({
        rtl: KTUtil.isRTL(),
        todayHighlight: true,
        format: "MM yyyy",
        startView: "months", 
        minViewMode: "months"
    });
</script>