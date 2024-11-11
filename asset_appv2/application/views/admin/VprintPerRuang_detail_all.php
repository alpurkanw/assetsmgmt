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

<body>


    <section class="content">


        <!-- <h5>PRINT BARANG per RUANGAN</h5> -->
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class="card-header p-1">
                        <div class="row">
                            <div class="col">

                                <h3 class="d-inline-block border-bottom border-dark pb-2">Daftar Barang</h3>

                                <h6>Diruangan : <?= $bars[0]->idruang . " - " . $bars[0]->ruang; ?> </h6>
                                <h6>Per Tanggal : <?= date("d-m-Y"); ?></h6>

                            </div>

                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-2">
                        <!-- <button class="btn btn-info btn_export">tes</button> -->
                        <div class="tes_data mt-2">
                            <table id="list_lap_bar" class="table table-sm table-bordered table-striped  ">
                                <thead>
                                    <tr role="row">
                                        <th>No</th>
                                        <th>Kode Aset</th>
                                        <th>Kode Barang</th>
                                        <th>Merk Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Tahun Anggaran</th>
                                        <th>Asal Perolehan</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($bars as $key => $bar) {

                                    ?>
                                        <tr role="row" class="odd">
                                            <td><?= $no; ?></td>
                                            <td><?= $bar->kode_aset; ?></td>
                                            <td><?= $bar->kodebar; ?></td>
                                            <td><?= $bar->merkbar; ?></td>
                                            <td><?= $bar->namabar; ?></td>
                                            <td><?= $bar->thn_angg; ?></td>
                                            <td><?= $bar->asal_peroleh; ?></td>
                                            <td>Rp <?= number_format($bar->harga, 2); ?></td>

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


    </section>


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


            // window.print();



        });
    </script>
</body>

</html>