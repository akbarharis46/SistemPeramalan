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
                <form action="<?php echo site_url('BarangClient/post_processbarang'); ?>" class="needs-validation" method="POST" enctype="multipart/form-data">


                    <!-- Form Start -->


                    <div class="form-group">
                        <label for="vendor">Vendor :</label>
                        <input type="text" class="form-control" id="vendor" placeholder=" Masukkan Nama Vendor" name="vendor[]" required>
                    </div>



                    <div class="form-group">
                        <label for="id_driver">Nama Driver:</label>
                        <select class="form-control" name="id_driver[]" id="id_driver">
                            <option value="" selected="">-- Pilih --</option>
                            <?php foreach ($driver as $rows) : ?>
                                <option value="<?php echo $rows->id_driver; ?>"> <?php echo $rows->nama_staff; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>



                    <div class="form-group">

                        <label for="shift">Shift Produksi :</label>
                        <select name="shift[]" id="shift" class="form-control">
                            <option value="shift1">1</option>
                            <option value="shift2">2</option>
                            <option value="shift3">3</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="id_bahanbaku">Nama Barang:</label>
                        <select class="form-control" name="id_bahanbaku[]" id="id_bahanbaku">
                            <option value="" selected="">-- Pilih --</option>
                            <?php foreach ($kategori as $rows) : ?>
                                <option value="<?php echo $rows->id_bahanbaku; ?>"> <?php echo $rows->nama_bahanbaku; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>



                    <div class="form-group">
                        <label for="total">Jumlah Barang Masuk :</label>
                        <input type="number" class="form-control" id="total" name="total[]" placeholder="total" name="total" required>
                    </div>

                    <div class="form-group">
                        <label for="total">Jumlah Reject Barang :</label>
                        <input type="number" class="form-control" id="barang_rejectgudang" name="barang_rejectgudang[]" placeholder="barang_rejectgudang" name="barang_rejectgudang" required>
                    </div>

                    <hr>

                    <!-- <hr style="height:2px;border-width:0;color:gray;background-color:gray"> -->
                    <br>

                    <div id="new-column"></div>

                    <!-- Form End -->
                    <button id="add-column" type="button" class="btn btn-success">Tambah Form</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>


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
                    <script>
                        $(function() {
                            var i = 0;

                            $('#add-column').click(() => {
                                // $('#add-column').hide();
                                i++

                                let html =

                                    '<div id="column' + i + '">' +
                                    '<button class="btn btn-warning remove" id="' + i + '">Hapus</button>' +
                                    '<div class="form-group">' +
                                    '<label for="vendor">Vendor :</label>' +
                                    '<input type="text" class="form-control" id="vendor" placeholder=" Masukkan Nama Vendor" name="vendor[]" required>' +
                                    '</div>' +



                                    '<div class="form-group">' +
                                    '<label for="id_driver">Nama Driver:</label>' +
                                    '<select class="form-control" name="id_driver[]" id="id_driver">' +
                                    '<option value="" selected="">-- Pilih --</option>' +
                                    <?php foreach ($driver as $rows) : ?> '<option value="<?php echo $rows->id_driver; ?>"> <?php echo $rows->nama_staff; ?> </option>' +
                                    <?php endforeach; ?> '</select>' +
                                    '<div class="valid-feedback"></div>' +
                                    '<div class="invalid-feedback">Please fill out this field.</div>' +
                                    '</div>' +



                                    '<div class="form-group">' +

                                    '<label for="shift">Shift Produksi :</label>' +
                                    '<select name="shift[]" id="shift" class="form-control">' +
                                    '<option value="shift1">1</option>' +
                                    '<option value="shift2">2</option>' +
                                    '<option value="shift3">3</option>' +
                                    '</select>' +

                                    '</div>' +

                                    '<div class="form-group">' +
                                    ' <label for="id_bahanbaku">Nama Barang:</label>' +
                                    '<select class="form-control" name="id_bahanbaku[]" id="id_bahanbaku">' +
                                    '<option value="" selected="">-- Pilih --</option>' +
                                    <?php foreach ($kategori as $rows) : ?> '<option value="<?php echo $rows->id_bahanbaku; ?>"> <?php echo $rows->nama_bahanbaku; ?> </option>' +
                                    <?php endforeach; ?> '</select>' +
                                    '<div class="valid-feedback"></div>' +
                                    '<div class="invalid-feedback">Please fill out this field.</div>' +
                                    '</div>' +



                                    '<div class="form-group">' +
                                    '<label for="total">Jumlah Barang Masuk :</label>' +
                                    '<input type="number" class="form-control" id="total" name="total[]" placeholder="total" name="total" required>' +
                                    '</div>' +

                                    '<div class="form-group">' +
                                    '<label for="total">Jumlah Reject Barang :</label>' +
                                    '<input type="number" class="form-control" id="barang_rejectgudang" name="barang_rejectgudang[]" placeholder="barang_rejectgudang" name="barang_rejectgudang" required>' +
                                    '</div>' +
                                    '</div>' +

                                    '<hr>';

                                $('#new-column').append(html);
                            });

                            $('#new-column').on('click', '.remove', function() {
                                console.log($(this).attr('id'));
                                $(this).parent().remove();
                            })
                        })
                    </script>
                </form>
            </div>
        </div>
    </div>
</div>