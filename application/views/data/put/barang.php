<?php if ($this->session->userdata('level') != 'admin') {
  redirect('login');
}; ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<div class="cc" style="width:1300px">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-primary"><i class="nav-icon fas fa-tablet"></i> Data Barang</h2>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="alert alert-secondary" role="alert">
          <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="nav-icon fas fa-tablet"></i> Barang&nbsp; > <i class="nav-icon fas fa-pen"></i>Edit Barang Masuk
        </div>
        <form action="<?php echo site_url(); ?>BarangClient/put_process" class="needs-validation" method="POST" enctype="multipart/form-data" onload="setSelectBoxByText()">
          <?php foreach ($barang as $rows) : ?>
            <input type="hidden" name="id_detailsuplaimasuk" value="<?php echo $rows->id_detailsuplaimasuk; ?>">

            <div class="form-group">
              <label for="vendor">Nama Vendor :</label>
              <input type="text" class="form-control" id="vendor" value="<?php echo $rows->vendor; ?>" name="vendor" required>
            </div>

            <div class="form-group">
              <label for="id_driver">Nama Driver:</label>
              <select class="form-control" name="id_driver" id="id_driver">
                <option value="" selected="">-- Pilih --</option>
                <?php foreach ($driver as $p) : ?>
                  <?php if ($p->id_driver == $rows->id_driver) : ?>
                    <option value="<?php echo $p->id_driver; ?>" selected> <?php echo $p->nama_staff; ?> </option>
                  <?php endif; ?>
                  <option value="<?php echo $p->id_driver; ?>"> <?php echo $p->nama_staff; ?> </option>
                <?php endforeach; ?>
              </select>
              <div class="valid-feedback"></div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>



            <label for="shift">Shift Pengiriman :</label>
            <!-- <input type="option" class="form-control" id="status_pengiriman" placeholder="Pilih Status  Pengiriman" name="status_pengiriman" > -->
            <select name="shift" id="shift" class="form-control">
              <option value="shift1">1</option>
              <option value="shift2">2</option>
              <option value="shift3">3</option>
            </select>

            <div class="form-group">
              <label for="id_bahanbaku">Nama Barang :</label>
              <select class="form-control" name="id_bahanbaku">
                <option value="" selected="">-- Pilih --</option>
                <?php foreach ($kategori as $k) : ?>
                  <?php if ($k->id_bahanbaku == $rows->id_bahanbaku) : ?>
                    <option value="<?php echo $k->id_bahanbaku; ?>" selected> <?php echo $k->nama_bahanbaku; ?> </option>
                  <?php endif; ?>
                  <option value="<?php echo $k->id_bahanbaku; ?>"> <?php echo $k->nama_bahanbaku; ?> </option>
                <?php endforeach; ?>
              </select>
              <div class="valid-feedback"></div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>


            <div class="form-group">
              <label for="total">Barang Masuk :</label>
              <input type="text" class="form-control" id="total" value="<?php echo $rows->total; ?>" placeholder="total" name="total">
            </div>

            <input type="hidden" name="total_lama" value="<?php echo $rows->total; ?>">

            <div class="form-group">
              <label for="total">Barang Reject Gudang :</label>
              <input type="hidden" class="form-control" id="barang_rejectgudang_lama" value="<?php echo $rows->barang_rejectgudang; ?>" placeholder="barang_rejectgudang" name="barang_rejectgudang_lama">
              <input type="text" class="form-control" id="barang_rejectgudang" value="<?php echo $rows->barang_rejectgudang; ?>" placeholder="barang_rejectgudang" name="barang_rejectgudang">
            </div>

            <div class="form-group">
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                Update
              </button>
              <!-- The Modal -->
              <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal body -->
                    <div class="modal-body">
                      <p>Apa anda yakin ingin mengupdate data ini ?</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-warning">Update</button>
                      <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </form>
      </div>
    </div>
  </div>