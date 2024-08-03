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
        <?php $this->load->view("pic/Tmp_navbar_top"); ?>
        <!-- /.navbar -->

        <?php $this->load->view("pic/Tmp_side_menu"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col">
                        <div class="card card-outline card-info">

                            <!-- /.card-header -->
                            <div class="card-header p-1">
                                <div class="row">
                                    <div class="col">
                                        Cari by Barcode
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-2">
                                <div class="row">

                                    <div class="col-8">
                                        <input type="text" class="form-control kodebar" name="kodebar" placeholder="Silahkan Scan Barcode..." autofocus>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-info btn-block  btn_cari_by_barcode">Cari</button>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-12 scan_result">
                        <?= $this->session->flashdata('pesan'); ?>
                    </div>

                </div>

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
            $('.btn_cari_by_barcode').click(function() {
                kodebar = $('.kodebar').val();
                // alert(kodebar)
                // return;
                if (kodebar == "") {
                    alert("Kode barang Belum Diinputkan");
                    return;
                }
                $.get('<?= base_url('pic/UplGambar/barCode_hasil/'); ?>' + kodebar, function(data) {
                    // alert('Data : ' + data);
                    $('.scan_result').html(data);
                    $('.kodebar').val('');
                    $('.kodebar').focus();


                });
            });

            $('.kodebar').keypress(function(e) {
                if (e.keyCode == 13) {
                    $('.btn_cari_by_barcode').click();
                }
            });

            $('.scan_result').on('click', '.btn_submit_change', function() {

                if (confirm('Data Sudah Benar?')) {
                    $('.submit_update').submit();
                }
            });

            // $('.scan_result').on('click', '.btn_submit_change', function() {

            //     if (confirm('Data Sudah Benar?')) {
            //         $('.submit_update').submit();
            //     }
            // });

        });
    </script>
</body>

</html>