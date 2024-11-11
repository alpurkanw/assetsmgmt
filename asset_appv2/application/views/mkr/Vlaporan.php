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

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view("mkr/Tmp_navbar_top"); ?>
        <!-- /.navbar -->

        <?php $this->load->view("mkr/Tmp_side_menu"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <?php if ($page == "index") { ?>
                    <div class="row">
                        <div class="col-6 ">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Periode Tanggal</h3>
                                </div> <!-- /.card-body -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("mkr/Claporan/submit"); ?>" class="form_submit"
                                        method="post">
                                        <div class="row ">

                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="input-group date" id="reservationdate"
                                                        data-target-input="nearest">
                                                        <input placeholder="Tanggal Awal" type="text" name="tgl1"
                                                            class="form-control tgl1 datetimepicker-input"
                                                            value="<?= $tgl1; ?>" readonly>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-auto">
                                                Sampai
                                            </div>
                                            <div class="col ">
                                                <div class="form-group">
                                                    <div class="input-group date" id="reservationdate"
                                                        data-target-input="nearest">
                                                        <input placeholder="Tanggal Akhir" type="text" name="tgl2"
                                                            class="form-control datetimepicker-input "
                                                            value=" <?= $tgl2; ?>" readonly>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col text-right">

                                            <button type="submit" class="btn btn-info btn_submit"
                                                name="form_submit">Retrieve</button>
                                        </div>
                                    </div>
                                </div><!-- /.card-body -->

                            </div>
                        </div>
                    </div>
                <?php } else if ($page == "showdata") { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <h4>List Barang Di lokasi
                                        <strong><?= $_SESSION["lokid"] . "-" . $_SESSION["namalok"]; ?></strong>
                                    </h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <?= $this->session->flashdata('pesan'); ?>

                                    <table id="list_lap_bar" class="table table-sm table-bordered table-striped  "
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Kategori</th>
                                                <th>Kode Barang</th>
                                                <th>Merk Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Tahun Anggaran</th>
                                                <th>Asal Perolehan</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($brgs as $key => $brg) {

                                            ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $brg->namakateg; ?></td>
                                                    <td><?= $brg->kodebar; ?></td>
                                                    <td><?= $brg->merkbar; ?></td>
                                                    <td><?= $brg->namabar; ?></td>
                                                    <td><?= $brg->thn_angg; ?></td>
                                                    <td><?= $brg->asal_peroleh; ?></td>
                                                    <td>Rp <?= number_format($brg->harga, 2); ?></td>
                                                    <td>

                                                        <?php if ($brg->sts == 1) { ?>
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
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>

                <?php }; ?>





                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view("mkr/tmp_footer"); ?>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url("assets/") ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


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
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

            $('.btn_submit').click(function() {
                $('.form_submit').submit();

            });
        });
    </script>
</body>

</html>