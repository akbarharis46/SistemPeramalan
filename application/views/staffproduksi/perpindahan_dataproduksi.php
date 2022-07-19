<?php if ($this->session->userdata('level') != 'Staff Produksi') {
    redirect('login');
}; ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="<?php echo base_url() ?>assets/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<div class="cc" style="width:1300px">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="m-0 text-primary"><i class="nav-icon fas fa-tablet"></i> Data Produksi</h2>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="alert alert-secondary" role="alert">
                    <i class="nav-icon fas fa-home"></i> Dashboard &nbsp; &nbsp; > &nbsp; &nbsp;<i class="nav-icon fas fa-tablet"></i> Detail Produksi &nbsp; > <i class="nav-icon fas fa-pen"></i>Tambah Detail Produksi
                </div>
                <form action="<?php echo site_url(); ?>ProduksiClient/prosesdata_staffproduksikeluar" class="needs-validation" method="POST" role="form" enctype="multipart/form-data" onload="setSelectBoxByText()">



                    <div class="form-group">
                        <?php foreach ($produksi as $rows) : ?>
                            <label for="id_hasilproduksi">ID Produksi :</label>
                            <input type="text" class="form-control" id="id_hasilproduksi" value="<?php echo $rows->id_hasilproduksi; ?>" name="id_hasilproduksi" required readonly>
                    </div>

                    <!-- <div class="form-group">
                                <label for="id_detailproduksi">ID Detail Produksi:</label>
                                <input type="text" class="form-control" id="id_detailproduksi" value="<?php echo $rows->id_detailproduksi; ?>" name="id_detailproduksi" required readonly >
                            </div> -->

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

                    <div class="form-group">
                        <label for="tanggal">tanggal :</label>
                        <input type="text" class="form-control" id="tanggal" value="<?php echo $rows->tanggal; ?>" name="tanggal" required readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="jumlah_produksi" value="<?php echo $rows->jumlah_produksi; ?>" name="jumlah_produksi" required readonly>
                    </div>

                    <div class="form-group">
                        <label for="shift">shift :</label>
                        <input type="text" class="form-control" id="shift" value="<?php echo $rows->shift; ?>" name="shift" required readonly>
                    </div>

                    <input type="hidden" name="jumlah_produksi" value="<?php echo $rows->jumlah_produksi; ?>">
                    <input type="hidden" name="produksi_gagal" value="<?php echo $rows->produksi_gagal; ?>">

                    </select>

            </div>



            <div class="form-group">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                    <a style="color:white">Proses </a>

                </button>
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal body -->
                            <div class="modal-body">
                                <p>Apa anda yakin ingin memproses data ini ?</p>
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
            <script type="text/javascript">
                $(".form_datetime").datetimepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true,
                    todayBtn: true,
                    pickTime: false,
                    minView: 2,
                    maxView: 4,
                });
            </script>
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