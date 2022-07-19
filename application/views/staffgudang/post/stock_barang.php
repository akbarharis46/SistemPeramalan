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
                        <h2 class="m-0 text-primary"><i class="nav-icon fas fa-tablet"></i> Barang Masuk</h2>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="alert alert-secondary" role="alert">
                    <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="nav-icon fas fa-tablet"></i> Barang&nbsp; > <i class="nav-icon fas fa-plus"></i>Barang Masuk
                </div>
                <form action="<?php echo site_url('StockBarangClient/post_processstock'); ?>" class="needs-validation" method="POST" enctype="multipart/form-data">


                    <!-- Form Start -->
                    <div class="form-group">
                        <label for="id_bahanbaku">Nama Barang :</label>
                        <select class="form-control" name="id_bahanbaku" id="id_bahanbaku">
                            <option value="" selected="">Pilih Barang</option>
                            <?php foreach ($kategori as $rows) : ?>
                                <option value="<?php echo $rows->id_bahanbaku; ?>"> <?php echo $rows->nama_bahanbaku; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>



                    <!-- <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="Hiden" class="form-control" id="nama_barang" name="nama_barang[]" placeholder="nama_barang"  name="nama_barang"  >
                    </div> -->

                    <div class="form-group">
                        <label for="tanggal_stockgudang">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal_stockgudang" placeholder="tanggal" name="tanggal_stockgudang">
                    </div>


                    <div class="form-group">
                        <label for="stock_pabrik">Stock Barang :</label>
                        <input type="number" class="form-control" id="stock_pabrik" name="stock_pabrik" placeholder="Jumlah Stock Barang Pabrik" name="stock_pabrik">
                    </div>


                    <div class="form-group">
                        <label for="barang_pakai">Masukkan Data Penggunaan Produksi</label>
                        <input type="number" class="form-control" id="barang_pakai" placeholder="Data Stock" name="barang_pakai">
                    </div>


                    <div class="form-group">
                        <label for="data_stockrejetgudang">Data Reject Barang Gudang :</label>
                        <input type="number" class="form-control" id="data_stockrejetgudang" name="data_stockrejetgudang" placeholder="Jumlah Stock Barang Pabrik" name="data_stockrejetgudang">
                    </div>
                    <div class="form-group">
                        <label for="data_stockrejetproduksi">Data Reject Barang Produksi :</label>
                        <input type="number" class="form-control" id="data_stockrejetproduksi" name="data_stockrejetproduksi" placeholder="Jumlah Stock Barang Pabrik" name="data_stockrejetproduksi">
                    </div>

                    <!-- <hr style="height:2px;border-width:0;color:gray;background-color:gray"> -->
                    <br>

                    <!-- Form End -->



                    <button type="submit" class="btn btn-primary">
                        Tambah
                    </button>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <p>Apa anda yakin ingin menambah data ini ?</p>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
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
                        var eid = "penduduk";
                        var etxt = document.getElementById("selected").value;
                        document.getElementById("selected").style.display = "none";
                        setSelectBoxByText(eid, etxt)
                    </script>
                </form>
            </div>
        </div>
    </div>
</div>