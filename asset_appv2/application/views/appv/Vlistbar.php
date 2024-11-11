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
        <?php $this->load->view("appv/Tmp_navbar_top"); ?>
        <!-- /.navbar -->

        <?php $this->load->view("appv/Tmp_side_menu"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">

            <!-- Main content -->
            <section class="content">

                <?php if ($show == "listAll") { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <h4>List Semua Barang </h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <?= $this->session->flashdata('pesan'); ?>

                                    <table id="list_bar" class="table table-sm table-bordered table-striped  "
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>kd. Aset</th>
                                                <th>Kode Barang</th>
                                                <th>Merk Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Tahun Anggaran</th>
                                                <th>Asal Perolehan</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($brgs as $key => $brg) {

                                            ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $brg->kode_aset; ?></td>
                                                    <td><?= $brg->kodebar; ?></td>
                                                    <td><?= $brg->merkbar; ?></td>
                                                    <td><?= $brg->namabar; ?></td>
                                                    <td><?= $brg->thn_angg; ?></td>
                                                    <td><?= $brg->asal_peroleh; ?></td>
                                                    <td>Rp <?= number_format($brg->harga, 2); ?></td>
                                                    <td>
                                                        <?php if ($brg->sts == "1") { ?>
                                                            <span class="badge badge-warning">Approved</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-danger">Not Approved</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url("appv/Clistbar/detailBar/") . $brg->aid; ?>"
                                                            class="btn btn-sm btn-info">Detail</a>
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
                <?php } else ?>
                <?php if ($show == "listNotApp") { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <h4>List Barang Not Approve </h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <?= $this->session->flashdata('pesan'); ?>

                                    <table id="list_bar" class="table table-sm table-bordered table-striped  ">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>kd. Aset</th>
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
                                                    <td><?= $brg->kode_aset; ?></td>
                                                    <td><?= $brg->kodebar; ?></td>
                                                    <td><?= $brg->merkbar; ?></td>
                                                    <td><?= $brg->namabar; ?></td>
                                                    <td><?= $brg->thn_angg; ?></td>
                                                    <td><?= $brg->asal_peroleh; ?></td>
                                                    <td>Rp <?= number_format($brg->harga, 2); ?></td>
                                                    <td>
                                                        <?php if ($brg->sts == "1") { ?>
                                                            <span class="badge badge-warning">Approved</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-danger">Not Approved</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url("appv/Clistbar/detailBar/") . $brg->aid; ?>"
                                                            class="btn btn-sm btn-info">Detail</a>
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

                <?php } else ?>
                <?php if ($show == "detailBar") { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <h4>Detail Barang </h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <?= $this->session->flashdata('pesan'); ?>
                                    <div class="row">
                                        <div class="col-4">
                                            <img class="img-thumbnail card-img-top"
                                                src="https://kiosprogram.com/upload/sepatu.jpg" alt="">
                                        </div>
                                        <div class="col-8">

                                            <div class="card ">
                                                <div class="card-body box-profile">

                                                    <div class="row">
                                                        <div class="col-3">
                                                            Kategori
                                                        </div>
                                                        <div class="col">
                                                            <?= $brgs[0]->namakateg; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Kode Barang
                                                        </div>
                                                        <div class="col">
                                                            <?= $brgs[0]->kodebar; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Merk Barang
                                                        </div>
                                                        <div class="col">
                                                            <?= $brgs[0]->merkbar; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Nama barang
                                                        </div>
                                                        <div class="col">
                                                            <?= $brgs[0]->namabar; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Jumlah Barang
                                                        </div>
                                                        <div class="col">
                                                            <?= $brgs[0]->jumbar; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Tahun Anggaran
                                                        </div>
                                                        <div class="col">
                                                            <?= $brgs[0]->thn_angg; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Lokasi Barang
                                                        </div>
                                                        <div class="col">
                                                            <?= $brgs[0]->namalok; ?>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-3">
                                                            Harga
                                                        </div>
                                                        <div class="col">
                                                            Rp <?= number_format($brgs[0]->harga, 2); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Lokasi Barang
                                                        </div>
                                                        <div class="col">
                                                            <?= $brgs[0]->namalok; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                            Status
                                                        </div>
                                                        <div class="col">
                                                            <?php if ($brgs[0]->sts == "1") { ?>
                                                                <span class="badge badge-warning">Approve</span>
                                                            <?php } else { ?>
                                                                <span class="badge badge-danger">Not Approve</span>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-3">
                                                        </div>
                                                        <div class="col text-right">
                                                            <form action="<?= base_url("appv/Clistbar/approved"); ?>"
                                                                method="post">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $brgs[0]->aid; ?>">
                                                                <a href="<?= base_url("appv/Clistbar/listNotApp"); ?>"
                                                                    class="btn btn-sm btn-secondary">Kembali</a>

                                                                <button type="submit"
                                                                    class="btn btn-sm btn-info">Approve</button>
                                                            </form>
                                                        </div>
                                                    </div>


                                                </div>
                                                <!-- /.card-body -->
                                            </div>



                                        </div>
                                        <!-- <div class="col-4">
                                        <div class="card ">
                                            <div class="card-body box-profile">
                                                <div class="text-center">
                                                    <img class="img img-bordered" width="350" src="<?= base_url("assets/image/"); ?>blankUser.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    </div>

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