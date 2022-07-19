<?php if ($this->session->userdata('level') != 'Staff Produksi') {
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
                        <h2 class="m-0 text-primary"><i class="nav-icon fas fa-tablet"></i> Update Data Produksi</h2>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="alert alert-secondary" role="alert">
                    <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="nav-icon fas fa-tablet"></i> Produksi &nbsp; > <i class="nav-icon fas fa-pen"></i>Edit Data Produksi
                </div>
                <form action="<?php echo site_url(); ?>produksiclient/put_processproduksi" class="needs-validation" method="POST" enctype="multipart/form-data" onload="setSelectBoxByText()">
                    <?php foreach ($produksi as $rows) : ?>
                        <div class="form-group">
                            <label for="id_hasilproduksi">ID Produksi :</label>
                            <input type="text" class="form-control" id="id_hasilproduksi" value="<?php echo $rows->id_hasilproduksi; ?>" name="id_hasilproduksi" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="id">Nama Staff :</label>
                            <select class="form-control" name="id" ad="id">
                                <option value="" selected="">-- Pilih --</option>
                                <?php foreach ($pegawai as $p) : ?>
                                    <?php if ($rows->id == $p->id) : ?>
                                        <option value="<?php echo $p->id; ?>" selected> <?php echo $p->nama; ?> </option>
                                    <?php endif; ?>
                                    <option value="<?php echo $p->id; ?>"> <?php echo $p->nama; ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <label for="shift">Shift Produksi :</label>
                        <!-- <input type="option" class="form-control" id="status_pengiriman" placeholder="Pilih Status  Pengiriman" name="status_pengiriman" > -->
                        <select name="shift" id="shift" class="form-control">
                            <option value="shift1">1</option>
                            <option value="shift2">2</option>
                            <option value="shift3">3</option>
                        </select>



                        <div class="form-group">
                            <label for="jumlah_produksi">Jumlah Hasil Produksi :</label>
                            <input type="hidden" class="form-control" id="jumlah_produksi_lama" value="<?php echo $rows->jumlah_produksi; ?>" name="jumlah_produksi_lama" required>
                            <input type="text" class="form-control" id="jumlah_produksi" value="<?php echo $rows->jumlah_produksi; ?>" name="jumlah_produksi" required>
                        </div>



                        <div class="form-group">
                            <label for="tanggal">Produksi Reject :</label>
                            <input type="hidden" class="form-control" id="produksi_gagal_lama" value="<?php echo $rows->produksi_gagal; ?>" name="produksi_gagal_lama" required>
                            <input type="text" class="form-control" id="produksi_gagal" value="<?php echo $rows->produksi_gagal; ?>" name="produksi_gagal" required>
                        </div>


                        <div class="form-group">
                            <label for="tanggal">Tanggal Produksi :</label>
                            <input type="date" class="form-control" id="tanggal" value="<?php echo $rows->tanggal; ?>" name="tanggal" required>
                        </div>



                        <div class="form-group">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                                <a style="color:white">Update </a>

                            </button>
                            <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <p>Apa anda yakin ingin mengubah data ini ?</p>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning"><a style="color:white">Update </a></button>
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function setSelectBoxByText(eid, etxt) {
                                var eid = document.getElementById(eid);
                                for (var i = 0; i < eid.options.length; ++i) {
                                    if (eid.options[i].value === etxt)
                                        eid.options[i].selected = true;
                                }
                            }
                            var eid = "kategori";
                            var etxt = document.getElementById("selected").value;
                            document.getElementById("selected").style.display = "none";
                            setSelectBoxByText(eid, etxt)
                        </script>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
    </div>