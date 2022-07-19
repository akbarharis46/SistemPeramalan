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
                        <h2 class="m-0 text-primary"><i class="nav-icon fas fa-tablet"></i> Data Driver</h2>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="alert alert-secondary" role="alert">
                    <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="nav-icon fas fa-tablet"></i> Driver&nbsp; > <i class="nav-icon fas fa-pen"></i>Edit Driver
                </div>
                <form action="<?php echo site_url(); ?>DriverClient/put_process" class="needs-validation" method="POST" enctype="multipart/form-data" onload="setSelectBoxByText()">
                    <?php foreach ($driver as $rows) : ?>
                        <input type="hidden" name="id_driver" value="<?php echo $rows->id_driver; ?>">

                        <div class="form-group">
                            <label for="nama_staff">Nama Driver :</label>
                            <input type="text" class="form-control" id="nama_staff" value="<?php echo $rows->nama_staff; ?>" name="nama_staff" required>
                        </div>

                        <div class="form-group">
                            <label for="nohp">Nomor Hp Driver :</label>
                            <input type="text" class="form-control" id="nohp" value="<?php echo $rows->nohp; ?>" name="nohp" required>
                        </div>


                        <label for="shift">Shift Driver :</label>
                        <!-- <input type="option" class="form-control" id="status_pengiriman" placeholder="Pilih Status  Pengiriman" name="status_pengiriman" > -->
                        <select name="shift" id="shift" class="form-control">
                            <option value="shift1">1</option>
                            <option value="shift2">2</option>
                            <option value="shift3">3</option>
                        </select>



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