<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul; ?> </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view("admin/Tmp_navbar_top"); ?>
        <!-- /.navbar -->

        <?php $this->load->view("admin/Tmp_side_menu"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">

            <!-- Main content -->
            <section class="content">

                <!-- <div class="row mb-2">
                    <div class="col text-right">
                        <button class="btn btn-info bg-gradient-blue">TAMBAH</button>
                    </div>
                </div> -->
                <?php if ($show == "index") {; ?>

                    <div class="row">
                        <div class=" col">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <h4>Daftar Barang </h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-info btn_export">tes</button> -->
                                    <div class="tes_data">
                                        <table id="list_lap_bar" class="table table-sm table-bordered table-striped  "
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>Kode Barang / Kode Asset / Nama Barang</th>
                                                    <th>Tahun Anggaran / Harga</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($allBar as $key => $asl) {

                                                ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $no; ?></td>
                                                        <td><?= $asl->kodebar; ?> / <?= $asl->kode_aset . "-" . $asl->no_reg_aset; ?> / <?= $asl->namabar; ?></td>
                                                        <td><?= $asl->thn_angg; ?> / Rp <?= number_format($asl->harga, 2); ?></td>
                                                        <td>
                                                            <button class="btn btn-primary btn_add_peringatan">Tambahkan Peringatan</button>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }; ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <h4>Detail barang </h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>
                <?php }
                if ($show == "form_tambah") {; ?>

                    <div class="row">
                        <div class="col-12">
                            <?= $this->session->flashdata('pesan'); ?>
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <h3>Tambah Jenis Peringatan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">

                                    <form action="<?= base_url("admin/Cwarning/addProc") ?>" method="POST">
                                        <div class="modal-body">

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right">Jenis Peringatan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="namaper" class="form-control">
                                                    <?= form_error('namaper', '<div class="text-danger pl-1">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right">Keterangan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ket" class="form-control">
                                                </div>
                                            </div>


                                        </div>

                                        <div class="modal-footer ">
                                            <div class="row">
                                                <div class="col-12 ">

                                                    <a href="<?= base_url("admin/Cwarning"); ?>" class="btn btn-info">Kembali</a>
                                                    <button type="submit" class="btn btn-success form_submit" name="form_submit">Tambahkan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>
                <?php };
                if ($show == "f_update") {; ?>

                    <div class="row">
                        <div class="col-12">
                            <?= $this->session->flashdata('pesan'); ?>
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <h3>Update Jenis Peringatan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">

                                    <form action="<?= base_url("admin/Cwarning/updProc/") . $ktg[0]->id; ?>" method="POST">
                                        <div class="modal-body">



                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right"> ID</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="namalok" class="form-control" value="<?= substr("0000" . $ktg[0]->id, -4); ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right">Jenis Peringatan</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="namaper" class="form-control" value="<?= $ktg[0]->jenis_peringatan; ?>">
                                                    <?= form_error('namaper', '<div class="text-danger pl-1">', '</div>'); ?>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label text-right">Keterangan</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="ket" class="form-control" value="<?= $ktg[0]->ket; ?>">
                                                </div>
                                            </div>


                                        </div>

                                        <div class="modal-footer ">
                                            <div class="row">
                                                <div class="col-12 ">

                                                    <a href="<?= base_url("admin/Cwarning"); ?>" class="btn btn-info">Kembali</a>
                                                    <button type="submit" class="btn btn-success form_submit" name="form_submit">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>
                <?php }; ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-info">
                            <div class="card-header p-1">
                                <h4>Catatan Penting</h4>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">
                                <p>Data Master tidak boleh sembarangan dihapus, karena akan terjadi ketidaksinkronan data dikemudian hari</p>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>


                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>


    </div>
    <!-- ./wrapper -->




    <!-- jQuery -->
    <script src="<?= base_url("assets/") ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/") ?>dist/js/adminlte.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url("assets/") ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url("assets/") ?>dist/js/demo.js"></script>
    <script>
        $(document).ready(function() {
            $("#list_lap_bar").DataTable();

            $(".btn_add_peringatan").on("click", function() {
                $(".kotak_utama .col-12").removeClass("col-12").addClass("col-6");
            })



            $('.btn_submit').click(function() {
                $('.form_submit').submit();

            });
        });
    </script>
</body>

</html>