<?php if ($this->session->userdata('level') != 'Staff Gudang') {
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
                    <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="nav-icon fas fa-tablet"></i> Barang&nbsp; > <i class="nav-icon fas fa-pen"></i>Edit Stock
                </div>
                <form action="<?php echo site_url(); ?>StockBarangClient/put_processstock" class="needs-validation" method="POST" enctype="multipart/form-data" onload="setSelectBoxByText()">
                    <?php foreach ($stockbarang as $rows) : ?>
                        <div class="form-group">
                            <label for="id_detailsuplai">ID Barang :</label>
                            <input type="text" class="form-control" id="id_detailsuplai" value="<?php echo $rows->id_detailsuplai; ?>" name="id_detailsuplai" required readonly>
                        </div>


                        <div class="form-group">
                            <label for="tanggal_stockgudang">Tanggal Stock Gudang :</label>
                            <input type="date" class="form-control" id="tanggal_stockgudang" value="<?php echo $rows->tanggal_stockgudang; ?>" name="tanggal_stockgudang" required>
                        </div>



                        <div class="form-group">
                            <label for="id_bahanbaku">Nama Barang:</label>
                            <select class="form-control" name="id_bahanbaku" id="id_bahanbaku">
                                <option value="" selected="">-- Pilih --</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <?php if ($k->id_bahanbaku == $rows->id_bahanbaku) : ?>
                                        <option value="<?php echo $k->id_bahanbaku; ?>" selected> <?php echo $k->nama_bahanbaku; ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <option value="<?php echo $k->id_bahanbaku; ?>"> <?php echo $k->nama_bahanbaku; ?> </option>
                            </select>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>



                        <div class="form-group">
                            <label for="stock_pabrik">Stock Barang Pabrik :</label>
                            <input type="text" class="form-control" id="stock_pabrik" value="<?php echo $rows->stock_pabrik; ?>" name="stock_pabrik" required>
                        </div>


                        <div class="form-group">
                            <label for="barang_pakai">Masukkan Data Penggunaan Produksi :</label>
                            <input type="text" class="form-control" id="barang_pakai" value="<?php echo $rows->barang_pakai; ?>" name="barang_pakai" required>
                        </div>

                        <div class="form-group">
                            <label for="data_stockrejetgudang">Data Reject Barang Gudang:</label>
                            <input type="text" class="form-control" id="data_stockrejetgudang" value="<?php echo $rows->data_stockrejetgudang; ?>" name="data_stockrejetgudang" required>
                        </div>

                        <div class="form-group">
                            <label for="data_stockrejetproduksi">Data Reject Barang Produksi :</label>
                            <input type="text" class="form-control" id="data_stockrejetproduksi" value="<?php echo $rows->data_stockrejetproduksi; ?>" name="data_stockrejetproduksi" required>
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