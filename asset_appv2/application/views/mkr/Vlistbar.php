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
    <link rel="stylesheet"
        href="<?= base_url("assets/") ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url("assets/") ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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

                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header p-1">
                                <h4>List Barang Di lokasi <strong><?= $_SESSION["namalok"]; ?></strong> </h4>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">
                                <?= $this->session->flashdata('pesan'); ?>


                                <table id="list_bar" class="table table-sm table-bordered table-striped  "
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
                                                <td>
                                                    <?= $brg->kodebar; ?>
                                                </td>

                                                <td><?= $brg->merkbar; ?></td>
                                                <td><?= $brg->namabar; ?></td>
                                                <td><?= $brg->thn_angg; ?></td>
                                                <td><?= $brg->asal_peroleh; ?></td>
                                                <td>Rp <?= number_format($brg->harga, 2); ?></td>
                                                <td>

                                                    <?php if ($brg->sts == 1) { ?>
                                                        <span class="badge badge-primary">Approve</span>
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
            $("#list_bar").DataTable();

            // $('.btn_submit').click(function() {
            //     $('.form_submit').submit();

            // });

            $('.updateRuangan').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the moda
                var namaruang = button.data('namaruang') // Extract info from data-* attributes
                var desk = button.data('desk') // Extract info from data-* attributes
                var id = button.data('id') // Extract info from data-* attributes
                var modal = $(this)
                modal.find('.card-body #namaruang').val(namaruang)
                modal.find('.card-body #desk').val(desk)
                modal.find('.card-body #id').val(id)
            })
        });
    </script>
</body>

</html>