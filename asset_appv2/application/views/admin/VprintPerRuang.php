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
        <?php $this->load->view("admin/Tmp_navbar_top"); ?>
        <!-- /.navbar -->

        <?php $this->load->view("admin/Tmp_side_menu"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <?php if ($page == "index") { ?>
                    <h5>PRINT BARANG PER-RUANGAN</h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Pilih Ruangan </h3>
                                </div> <!-- /.card-body -->
                                <div class="card-body">
                                    <?= $this->session->flashdata('pesan'); ?>
                                    <form action="<?= base_url("admin/Cactivity/submit"); ?>" class="form_submit" method="post">
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
                                                <select name="ruang" class="form-control select2">
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
                                            <!-- <a href="<?= base_url("admin/Cuser"); ?>" class="btn btn-info">Kembali</a> -->
                                        </div>
                                    </div>
                                </div><!-- /.card-body -->

                            </div>
                        </div>
                    </div>
                <?php } else if ($page == "showdata") { ?>
                    <h5>PRINT BARANG per RUANGAN</h5>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <div class="row">
                                        <div class="col">

                                            <h6>List Barang</h6>
                                            <h6>Ruangan : <?= $ruang["id"]; ?> - <?= $bars[0]->ruang; ?></h6>

                                        </div>
                                        <div class="col">
                                            <a class="btn btn-sm btn-info float-right" href="<?= base_url('admin/Cactivity/showDetailAllitemPerRuang/') . $ruang["id"] . "/" . $lokasi["id"]; ?>" target="_blank">PRINT SEMUA</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-info btn_export">tes</button> -->
                                    <div class="tes_data">
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
                                                    <th>Print</th>
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
                                                        <td>
                                                            <a class="btn btn-sm btn-info" href="<?= base_url("admin/Cactivity/showDetail/") . $bar->kodebar; ?>" target="_blank">PRINT</a>
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


        <!-- Modal -->
        <div class="modal fade" id="mdl_print" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="card card-outline card-primary">
                        <div class="card-header p-2">
                            Form Tambah DO
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" novalidate="novalidate">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">NAMA BARANG</label>
                                    <input type="hidden" name="idbar" class="form-control idbar" readonly>
                                    <input type="text" name="namabar" class="form-control namabar" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">HARGA JUAL</label>
                                    <input type="text" name="harga_jual" class="form-control harga_jual" readonly>
                                    <input type="hidden" name="harga_beli" class="form-control harga_beli" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">JUMLAH PERMINTAAN</label>
                                    <input type="number" name="jum_minta" class="form-control jum_minta " placeholder="Masukkan JUMLAH PERMINTAANsss" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">TOTAL HARGA</label>
                                    <input type="text" name="tot_harga" class="form-control tot_harga" readonly>
                                </div>
                                <!-- <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                        <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                                    </div>
                                </div> -->
                                <button type="button" class="btn btn-primary btn_sbmt_barang">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


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



            $(".btn_print").on("click", function() {
                // $("#mdl_pickupBar .idbar").val($(this).data("id"));
                // $("#mdl_pickupBar .namabar").val($(this).data("namabar"));
                // $("#mdl_pickupBar .harga_jual").val($(this).data("harga_jual"));
                // $("#mdl_pickupBar .harga_beli").val($(this).data("harga_beli"));
                // $("#mdl_print").modal("toggle");
                window.open('', '_blank');
                // printWindow.document.write($('#myModal').html());
                // printWindow.document.close();
                // printWindow.print();
            });
            // $("#printButton").click(function() {
            //     var printWindow = window.open('', '_blank');
            //     printWindow.document.write($('#myModal').html());
            //     printWindow.document.close();
            //     printWindow.print();
            // });

            // $('#mdl_print').on('shown.bs.modal', function() {
            //     window.print();
            // });


            $('#list_lap_bar').DataTable();

            $('.btn_submit').click(function() {
                $('.form_submit').submit();

            });
            $('#lokasi').change(function() {
                var lokasi = JSON.parse($(this).val());

                // if (lokasi < > "") {
                // alert(lokasi.id);
                // return;
                // }
                $.get('<?= base_url('admin/Cactivity/ambilRuang/'); ?>' + lokasi.id, function(data) {
                    // alert('Data : ' + data);
                    $('#list_ruang').html(data);

                    // console.log($('#list_ruang .select2')); // Periksa apakah elemen ditemukan

                    $('#list_ruang .select2').select2()
                    // $('.kodebar').val('');
                    // $('.kodebar').focus();


                });
            });

        });
    </script>
</body>

</html>