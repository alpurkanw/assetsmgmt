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
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.pic/css/ionicons.min.css"> -->

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/buttons.dataTables.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>datepick/css/bootstrap-datepicker.min.css">


    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>dist/css/adminlte.min.css">




</head>
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
                <?php if ($page == "index") { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Laporan Barang Per ruangan </h3>
                                </div> <!-- /.card-body -->
                                <div class="card-body">
                                    <?= $this->session->flashdata('pesan'); ?>
                                    <form action="<?= base_url("pic/ClapRuangPerLok/submit"); ?>" class="form_submit" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label text-right">Lokasi </label>
                                            <div class="col-sm-8">
                                                <select name="lokasi" id="lokasi" class="form-control">
                                                    <option value="0">.:Pilih Lokasi :.</option>
                                                    <?php foreach ($loks as $key => $lok) { ?>
                                                        <option value='<?= json_encode($lok); ?>'><?= $lok->namalok; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label text-right">Ruangan </label>
                                            <div class="col-sm-8" id="list_ruang">
                                                <select name="ruang" class="form-control">
                                                    <option value="0">.:Pilih Ruangan :.</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="submit" class="btn btn-info btn-block btn_submit" name="form_submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col text-right">
                                            <!-- <a href="<?= base_url("pic/Cuser"); ?>" class="btn btn-info">Kembali</a> -->
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
                                    <h4>List Barang</h4>
                                    <h5> Lokasi <?= $_SESSION["namalok"]; ?></h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-info btn_export">tes</button> -->
                                    <div class="tes_data">


                                        <table id="list_lap_bar" class="table table-sm table-bordered table-striped  " role="grid" aria-describedby="example1_info">
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
                                                foreach ($loks as $key => $lok) {

                                                ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $no; ?></td>
                                                        <td><?= $lok->namakateg; ?></td>
                                                        <td><?= $lok->kodebar; ?></td>
                                                        <td><?= $lok->merkbar; ?></td>
                                                        <td><?= $lok->namabar; ?></td>
                                                        <td><?= $lok->thn_angg; ?></td>
                                                        <td><?= $lok->asal_peroleh; ?></td>
                                                        <td>Rp <?= number_format($lok->harga, 2); ?></td>
                                                        <td>

                                                            <?php if ($lok->sts == 1) { ?>
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

    <!-- Select2 -->
    <script src="<?= base_url("assets/") ?>plugins/select2/js/select2.full.min.js"></script>



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
            var pesanHeader = '<h4 class="m-0">List Barang</h4>';
            pesanHeader += '<h4>Lokasi: <?= $_SESSION["lokid"] . "-" . $_SESSION["namalok"]; ?> </h4>';
            $('#list_lap_bar').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        "extend": 'pdf',
                        "title": 'List Barang ',
                        "messageTop": 'Lokasi: <?= $_SESSION["lokid"] . "-" . $_SESSION["namalok"]; ?>',
                        "messageBottom": "exportMessageBottom"
                    },
                    {
                        extend: 'excel',
                        title: 'List Barang',
                        messageTop: 'Lokasi: <?= $_SESSION["lokid"] . "-" . $_SESSION["namalok"]; ?>',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        title: '',
                        messageTop: pesanHeader,
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    }

                ]
            });

            $('.btn_submit').click(function() {
                $('.form_submit').submit();

            });
            $('#lokasi').change(function() {
                var lokasi = JSON.parse($(this).val());

                // if (lokasi < > "") {
                // alert(lokasi.id);
                // return;
                // }
                $.get('<?= base_url('pic/ClapRuangPerLok/ambilRuang/'); ?>' + lokasi.id, function(data) {
                    // alert('Data : ' + data);
                    $('#list_ruang').html(data);

                    $('#list_ruang .select2').select2()

                    // $('.kodebar').val('');
                    // $('.kodebar').focus();


                });
            });

        });
    </script>
</body>

</html>