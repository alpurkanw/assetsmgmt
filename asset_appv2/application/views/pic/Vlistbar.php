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

    <style>
        .carousel-item img {

            width: 75%;
            height: 400px;
            object-fit: auto;
        }
    </style>
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

                <?php if ($show == "listBar") { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info ">
                                <div class="card-header p-1">
                                    <div class="row">
                                        <div class="col">
                                            <h5>List Barang </h5>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">

                                    <table id="list_bar" class="table table-sm table-bordered table-striped table-responsive ">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori</th>
                                                <th>Kode Barang</th>
                                                <th>Merk Barang</th>
                                                <th>Tahun Anggaran</th>
                                                <th>Asal Perolehan</th>
                                                <th>Ruangan</th>
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
                                                    <td><?= $brg->namabar; ?></td>
                                                    <td><?= $brg->namakateg; ?></td>
                                                    <td><?= $brg->kodebar; ?></td>
                                                    <td><?= $brg->merkbar; ?></td>
                                                    <td><?= $brg->thn_angg; ?></td>
                                                    <td><?= $brg->asal_peroleh; ?></td>
                                                    <td><?= $brg->ruang; ?></td>
                                                    <td>Rp <?= number_format($brg->harga, 2); ?></td>
                                                    <td>
                                                        <?php if ($brg->sts == "1") { ?>
                                                            <span class="badge badge-warning">Approved</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-danger">Not Approved</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url("pic/Clistbar/detailBar/") . $brg->kodebar; ?>" class="btn btn-sm btn-info">Detail</a>
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


                <?php } else if ($show == "detailBar") { ?>
                    <div class="row">

                        <div class="col">
                            <div class="card card-outline card-info d-flex flex-column">

                                <!-- /.card-header -->
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
                                                            <img class="image img-fluid img-thumbnail " src="<?= base_url("assets/image/img_bar/") . $gbr->file_name; ?>">
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
                    <!-- Modal -->
                    <div class="modal fade" id="f_update" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        <strong><?= $brg[0]->namabar; ?></strong>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="tes_submit" action="<?= base_url("pic/Clistbar/updBar/") . $brg[0]->kodebar; ?>" class="form-group" method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <label for="">
                                                    Lokasi
                                                </label>
                                                <input type="hidden" class="form-control form-small" name="from" value="fcariByName" readonly="">
                                                <input type="text" class="form-control form-small" value="<?= $brg[0]->idlok . "-" . $brg[0]->namalok; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">

                                                <div class="form-group row">
                                                    <label class=" ">Ruangan/Penempatan </label>
                                                    <select name="ruangan" id="ruangan" class="form-control">
                                                        <option value="">.:Pilih Ruangan :.</option>
                                                        <?php foreach ($ruangs as $key => $ruang) { ?>

                                                            <option value='<?= json_encode($ruang); ?>' <?= ($ruang->id == $brg[0]->idruang) ? "selected" : ""; ?>>
                                                                <?= $ruang->namaruang; ?></option>
                                                        <?php } ?>
                                                    </select>

                                                </div>

                                            </div>
                                        </div>
                                        <label for="">
                                            Kondisi
                                        </label>
                                        <select name="kondisi" class="form-control form-small">
                                            <option value="">.:Pilih Kondisi:.</option>
                                            <option value="BAIK" <?= ($brg[0]->kondisi == "BAIK") ? "selected" : ""; ?>>
                                                BAIK</option>
                                            <option value="RUSAK RINGAN" <?= ($brg[0]->kondisi == "RUSAK RINGAN") ? "selected" : ""; ?>>RUSAK
                                                RINGAN</option>
                                            <option value="RUSAK BERAT" <?= ($brg[0]->kondisi == "RUSAK BERAT") ? "selected" : ""; ?>>RUSAK
                                                BERAT
                                            </option>
                                            <option value="PROSES PERBAIKAN" <?= ($brg[0]->kondisi == "PROSES PERBAIKAN") ? "selected" : ""; ?>>
                                                PROSES PERBAIKAN
                                            </option>

                                        </select>
                                        <label for="">
                                            Deskripsi
                                        </label>
                                        <textarea name="desk" id="" rows="5" class="form-control form-small" placeholder="Tulis kondisi trakhir barang jika ada perubahan"><?= $brg[0]->ket; ?></textarea>
                                        <!-- <button type="submit" class="btn btn-warning ">Simpan </button> -->
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-warning btn_submit_change">Simpan
                                        Perubahan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="his_update" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">History Perubahan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <select name="kondisi" id="kondisi" class="form-control form-small">
                                        <option value="">.:Pilih Kondisi:.</option>
                                        <option value="BAIK">BAIK</option>
                                        <option value="RUSAK RINGAN">RUSAK RINGAN</option>
                                        <option value="RUSAK BERAT">RUSAK BERAT</option>
                                        <option value="PROSES PERBAIKAN">PROSES PERBAIKAN</option>

                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-info">Save changes</button>
                                </div>
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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

            <?php if ($show == "detailBar") { ?>
                $('.btn_submit_change').click(function() {
                    if (confirm("Data sudah benar ?")) {
                        $('.tes_submit').submit();
                    }
                });
            <?php } ?>

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