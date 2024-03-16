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


        <div class="row">

            <div class="col">
                <div class="card card-outline card-info d-flex flex-column">

                    <!-- /.card-header -->
                    <div class="card-header p-2">
                        <h6>Gambar Aset</h6>
                    </div>
                    <div class="card-body p-2">
                        <div class="row">

                            <div class="col-12 ">
                                <?= (count($gbrs) == 0) ? "Gambar Belum ada" : "";; ?>
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <?php

                                        $i = 0;
                                        foreach ($gbrs as $key => $gbr) { ?>
                                            <li data-target="#myCarousel" data-slide-to="<?= $i; ?>"></li>
                                        <?php $i++;
                                        }; ?>
                                        <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li> -->
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php
                                        $i = 0;
                                        foreach ($gbrs as $key => $gbr) { ?>
                                            <div class="carousel-item <?= ($i == 0) ? "active" : ""; ?>   " style="text-align:center;">
                                                <img class="image img-fluid img-thumbnail " style="min-height: 200px; max-height: 800px; max-width: 800px; " src="<?= base_url("assets/image/img_bar/") . $gbr->file_name; ?>">
                                            </div>
                                        <?php $i++;
                                        }; ?>


                                    </div>
                                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <div class="row mt-4">

                                    <div class="col ">
                                        <!-- <a class="btn  btn-secondary"  href="<?= base_url("pic/Clistbar/"); ?>">Batal</a> -->
                                        <input type="hidden" name="kodebar" value="<?= $brg[0]->kodebar; ?>">
                                        <!-- <button type="text" class="btn  btn-info">History Perubahan</button> -->

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col">
                <div class="card card-outline card-info">
                    <div class="card-header p-2">
                        Detail Barang

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-12">

                                <div class="row">
                                    <div class="col-3">
                                        Nama Barang
                                    </div>
                                    <div class="col">
                                        <h5>
                                            <strong>
                                                <?= $brg[0]->namabar; ?>
                                            </strong>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        Kode Aset
                                    </div>
                                    <div class="col">

                                        <?= $brg[0]->kode_aset; ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        Kategori
                                    </div>
                                    <div class="col">
                                        <?= $brg[0]->namakateg; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3 ">
                                        Kode Barang
                                    </div>
                                    <div class="col ">
                                        <?= $brg[0]->kodebar; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        Merk Barang
                                    </div>
                                    <div class="col">
                                        <?= $brg[0]->merkbar; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        Jumlah Barang
                                    </div>
                                    <div class="col">
                                        <?= $brg[0]->jumbar; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        Tahun Anggaran
                                    </div>
                                    <div class="col">
                                        <?= $brg[0]->thn_angg; ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        Lokasi
                                    </div>
                                    <div class="col">
                                        <?= $brg[0]->idlok . "-" . $brg[0]->namalok; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        Ruangan
                                    </div>
                                    <div class="col">
                                        <strong>
                                            <?= $brg[0]->idruang . " - " . $brg[0]->ruang; ?>
                                        </strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        Harga
                                    </div>
                                    <div class="col ">
                                        <h5>
                                            Rp <?= number_format($brg[0]->harga, 2); ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        Status
                                    </div>
                                    <div class="col">
                                        <strong>
                                            <?php if ($brg[0]->sts == "1") { ?>
                                                <span class="">Approve</span>
                                            <?php } else { ?>
                                                <span class="">Not Approve</span>
                                            <?php } ?>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        Kondisi
                                    </div>
                                    <div class="col-4">
                                        <strong>
                                            <?= $brg[0]->kondisi; ?>
                                        </strong>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        Keterangan
                                    </div>
                                    <div class="col-4">
                                        <?= $brg[0]->ket; ?>
                                    </div>

                                </div>

                            </div>




                        </div>



                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col">
                <div class="card card-outline card-info">
                    <div class="card-header p-2">
                        History Perubahan </div>
                    <!-- /.card-header -->
                    <div class="card-body p-2">
                        <table class="table table-bordered table-sm table-wrap text-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Tgl Update </th>
                                    <th>Jenis Update</th>
                                    <th>User Update</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                // print_r($hstrs) ;
                                if (count($hstrs) == 0) {
                                ?>
                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Belum Ada Perubahan Barang</strong>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                } else {


                                    foreach ($hstrs as $key => $val) {

                                    ?>
                                        <tr>
                                            <td><?= substr($val->tgl, 0, 4) . "-" . substr($val->tgl, 4, 2)  . "-" . substr($val->tgl, -2) . "-" . substr($val->jam, 0, 2) . ":" . substr($val->jam, 2, 2) . ":" . substr($val->jam, -2); ?>
                                            </td>
                                            <td><?= $val->jns_ubah ?></td>
                                            <td><?= $val->iduser . "-" . $val->nmuser ?></td>
                                        </tr>
                                <?php
                                    }
                                } ?>

                            </tbody>
                        </table>

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