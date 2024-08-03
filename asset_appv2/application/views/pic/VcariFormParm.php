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
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

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
        <?php $this->load->view("pic/Tmp_navbar_top"); ?>
        <!-- /.navbar -->

        <?php $this->load->view("pic/Tmp_side_menu"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">

            <!-- Main content -->
            <section class="content">

                <?php if ($show == "CariByName") { ?>
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-12 ">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <div class="row">
                                        <div class="col">
                                            Cari By Nama Barang
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("pic/CcariBar/CariBynameSubmit"); ?>" method="post" class="form_submit_cariByname">
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="keyWordCari" placeholder="Masukan Nama Barang" autofocus>
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-info btn_cari_by_name">Cari</button>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>


                <?php } else if ($show == "cariByKateg") { ?>
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-12 ">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <div class="row">
                                        <div class="col">
                                            Cari By Kategori
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("pic/CcariBar/CariBykategSubmit"); ?>" method="post" class="form_submit_cariByname">
                                        <div class="row">

                                            <div class="col-10">
                                                <select name="kateg" id="kateg" class="form-control select2">
                                                    <option value="">.:Pilih Kategori :.</option>
                                                    <?php foreach ($ktgs as $key => $ktg) { ?>

                                                        <option value='<?= $ktg->id; ?>'><?= $ktg->namakateg; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-info btn_cari_by_name">Cari</button>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>


                <?php } ?>


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


    <!-- Select2 -->
    <script src="<?= base_url("assets/") ?>plugins/select2/js/select2.full.min.js"></script>




    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url("assets/") ?>dist/js/demo.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn_cari_by_name').click(function() {
                $('.form_submit_cariByname').submit();
            });

            $('.select2').select2()

        });
    </script>
</body>

</html>