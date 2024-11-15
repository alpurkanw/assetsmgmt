<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $judul; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.admin/css/ionicons.min.css"> -->
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?= base_url("assets/") ?>dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/buttons.dataTables.min.css">

        <!-- daterange picker -->
        <link rel="stylesheet" href="<?= base_url("assets/") ?>datepick/css/bootstrap-datepicker.min.css">


    </head>
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

                    <!-- Default box -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <h4>List Seluruh Barang </h4>
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
                                                    <th>Kode Barang</th>
                                                    <th>Kode Asset - No. Register</th>
                                                    <th>Nama Barang</th>
                                                    <th>Merk Barang</th>
                                                    <th>Tahun Anggaran</th>
                                                    <th>Asal Perolehan</th>
                                                    <th>Ruangan</th>
                                                    <th>Harga</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                            $no = 1;
                                            foreach ($allBar as $key => $asl) {

                                            ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $asl->kodebar; ?></td>
                                                    <td><?= $asl->kode_aset."-".$asl->no_reg_aset; ?></td>
                                                    <td><?= $asl->merkbar; ?></td>
                                                    <td><?= $asl->namabar; ?></td>
                                                    <td><?= $asl->thn_angg; ?></td>
                                                    <td><?= $asl->asal_peroleh; ?></td>
                                                    <td><?= $asl->ruang; ?></td>
                                                    <td>Rp <?= number_format($asl->harga, 2); ?></td>
                                                    <td>

                                                        <?php if ($asl->sts == 1) { ?>
                                                        <span class="badge badge-info">Approve</span>
                                                        <?php } else { ?>
                                                        <span class="badge badge-warning">Not Approve</span>
                                                        <?php } ?>
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
        <!-- date-range-picker -->
        <script src="<?= base_url("assets/") ?>datepick/js/bootstrap-datepicker.min.js"></script>

        <!-- DataTables -->
        <script src="<?= base_url("assets/") ?>plugins/jquery.dataTables.min.js"></script>
        <script src="<?= base_url("assets/") ?>plugins/dataTables.buttons.min.js"></script>
        <script src="<?= base_url("assets/") ?>plugins/jszip.min.js"></script>
        <script src="<?= base_url("assets/") ?>plugins/pdfmake.min.js"></script>
        <script src="<?= base_url("assets/") ?>plugins/vfs_fonts.js"></script>
        <script src="<?= base_url("assets/") ?>plugins/buttons.html5.min.js"></script>
        <script src="<?= base_url("assets/") ?>plugins/buttons.print.min.js"></script>


        <script>
        $(document).ready(function() {

            // $('.btn_export').click(function() {

            //     // alert('sds');
            //     myWin = window.open("", "", "width=700,height=500");
            //     myWin.document.write($('.tes_data').clone(true));
            // });

            //Date range picker
            $('.tgl1').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true
            });
            //Date range picker
            $('.tgl2').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true
            });
            $('#list_lap_bar').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        "extend": 'pdf',
                        "title": 'List Seluruh Barang ',
                        "messageBottom": "exportMessageBottom"
                    },
                    {
                        extend: 'excel',
                        title: 'List Seluruh Barang',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        title: 'List Seluruh Barang',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    }

                ]
            });

            $('.btn_submit').click(function() {
                $('.form_submit').submit();

            });
        });
        </script>
    </body>

</html>
