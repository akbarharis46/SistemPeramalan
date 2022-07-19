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
                        <h2 class="m-0 text-primary"><i class="nav-icon fas fa-tablet"></i> Data Produksi Bulanan</h2>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="alert alert-secondary" role="alert">
                    <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="nav-icon fas fa-tablet"></i> Barang&nbsp; > <i class="nav-icon fas fa-pen"></i>Update kategori
                </div>
                <form action="<?php echo site_url(); ?>DetailHasilProduksiBulananClient/put_processproduksi" class="needs-validation" method="POST" enctype="multipart/form-data" onload="setSelectBoxByText()">
                    <?php foreach ($produksibulanan as $rows) : ?>
                        <div class="form-group">
                            <label for="id_totalproduksibulanan">ID Produksi Bulanan :</label>
                            <input type="text" class="form-control" id="id_totalproduksibulanan" value="<?php echo $rows->id_totalproduksibulanan; ?>" name="id_totalproduksibulanan" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal :</label>
                            <input type="text" class="form-control" id="tanggal" value="<?php echo $rows->tanggal; ?>" name="tanggal" required>
                        </div>

                        <div class="form-group">
                            <label for="total_produksibulanan">Total Produksi :</label>
                            <input type="text" class="form-control" id="total_produksibulanan" value="<?php echo $rows->total_produksibulanan; ?>" name="total_produksibulanan" required>
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
                            var eid = "detailhasilproduksibulanan";
                            var etxt = document.getElementById("selected").value;
                            document.getElementById("selected").style.display = "none";
                            setSelectBoxByText(eid, etxt)
                        </script>
                    <?php endforeach; ?>
                </form>
            </div>
        </div>
    </div>