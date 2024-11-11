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
        <?php $this->load->view("pic/Tmp_navbar_top"); ?>
        <!-- /.navbar -->

        <?php $this->load->view("pic/Tmp_side_menu"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <?php if ($page == "showdata") { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <button type="button" class="btn btn-info btn_print" data-toggle="button" aria-pressed="false" autocomplete="off">Print</button>
                                    <button type="button" class="btn btn-secondary" onclick="window.location.href = '<?= base_url('pic/ClapRuangPerLok') ?>' ">Batal</button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-info btn_export">tes</button> -->
                                    <div class="list_barangPeruangan">
                                        <div class="row">
                                            <div class="col text-center">
                                                <h4><strong>KARTU INVENTARIS RUANGAN</strong></h4>
                                            </div>
                                        </div>
                                        <div class="row border">
                                            <div class="col">
                                                <strong>
                                                    <table>
                                                        <tr>
                                                            <td>Lokasi :</td>
                                                            <td><?= $lokasi["namalok"]; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ruangan : </td>
                                                            <td><?= $ruang["namaruang"]; ?></td>
                                                        </tr>
                                                    </table>
                                                </strong>
                                            </div>
                                            <div class="col ">
                                                <strong>
                                                    <table class="float-right ">
                                                        <tr class="text-right">
                                                            <td>Jumlah Data : </td>
                                                            <td><?= count($bars); ?></td>
                                                        </tr>
                                                    </table>
                                                </strong>
                                            </div>
                                        </div>

                                        <table id="list_bar" class="table table-sm table-bordered table-striped  ">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Nama Barang / Merk Barang / Kode Barang / Kategori</th>
                                                    <th>Tahun Anggaran</th>
                                                    <th>Asal Perolehan</th>
                                                    <th>Harga</th>
                                                    <th>Kondisi</th>
                                                    <th>Ket</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $no = 1;
                                                foreach ($bars as $key => $bar) {

                                                ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $no; ?></td>
                                                        <td>
                                                            <?php
                                                            if ($bar->gambar !== null) { ?>
                                                                <img class="img img-size-50" src="<?= base_url("assets/image/img_bar/") . $bar->gambar; ?>" height="100" width="100" alt=""><br>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="text-sm">
                                                            <strong><?= $bar->namabar; ?></strong> <br>
                                                            <?php
                                                            echo $bar->merkbar . "<br>";
                                                            echo $bar->kodebar . "/" . $bar->kode_aset . "/" . $bar->no_reg_aset . "<br>";
                                                            echo $bar->namakateg;
                                                            ?>
                                                        </td>
                                                        <td><?= $bar->thn_angg; ?></td>
                                                        <td><?= $bar->asal_peroleh; ?></td>

                                                        <td>Rp <?= number_format($bar->harga, 2); ?></td>
                                                        <td><?= $bar->kondisi; ?></td>
                                                        <td>
                                                            <?= $bar->ket; ?>
                                                            <!-- <a href="<?= base_url("pic/Clistbar/detailBar/") . $bar->kodebar; ?>" class="btn btn-sm btn-info btn_Detail">Detail</a> -->
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                }; ?>

                                            </tbody>

                                        </table>




                                        <div class="row mt-5">
                                            <div class="col-8">
                                                <strong>
                                                    <table>
                                                        <tr>
                                                            <td>Mengetahui </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Direktur
                                                                <br><br><br>
                                                                (<?= NAMA_DIR; ?>)
                                                                <br>
                                                                NIP : <?= NIP_DIR; ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </strong>
                                            </div>
                                            <div class="col-auto ">
                                                <strong>
                                                    <table class="w-100">
                                                        <tr>
                                                            <td>Penanggung Jawab Ruangan (PIC) </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <br><br><br>
                                                                (______________________)
                                                                <br>
                                                                NIP :
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </strong>
                                            </div>
                                        </div>
                                    </div>
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
            var btrap =
                '<link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/fontawesome-free/css/all.min.css" >';
            var btrap2 =
                '<link rel="stylesheet" href="<?= base_url("assets/"); ?>dist/css/adminlte.min.css" type="text/css"/>';
            $('.btn_print').click(function() {
                $('.list_barangPeruangan .btn_Detail').remove();
                var btn = $(this),
                    ticket = $('.list_barangPeruangan').html();



                printWindow = window.open('', 'PrintWindow', 'width=800,height=1000');
                printWindow.document.write(`
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

<body class="hold-transition sidebar-mini">`);
                printWindow.document.write(ticket);
                printWindow.document.write('</body></html>');
                printWindow.document.close();

                printWindow.onload = function() {
                    printWindow.focus();
                    printWindow.print();
                    printWindow.close();

                };
            });

        });
    </script>
</body>

</html>