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



                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <h4>Tambah Barang </h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <?= $this->session->flashdata('pesan'); ?>
                                    <div class="row">

                                        <div class="col-12">

                                            <div class="card ">
                                                <div class="card-body box-profile">
                                                    <form action="<?= base_url("appv/Cinputbar/tambah"); ?>"
                                                        method="POST">

                                                        <div class=" form-group row">
                                                            <label class="col-sm-3 col-form-label text-right">Kategori
                                                                Barang</label>
                                                            <div class="col-sm-9">
                                                                <select name="kategori" id="kategori"
                                                                    class="form-control">
                                                                    <option value="">.:Pilih Kategori :.</option>
                                                                    <?php foreach ($ktgs as $key => $ktg) { ?>

                                                                    <option value="<?= $ktg->id; ?>">
                                                                        <?= $ktg->namakateg; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <?= form_error('kategori', '<small class="text-danger pl-1">', '</small>'); ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label text-right">Nama
                                                                Barang</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="namabar" class="form-control"
                                                                    value="<?= set_value('namabar'); ?>">
                                                                <?= form_error('namabar', '<small class="text-danger pl-1">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-3 col-form-label text-right">Jumlah</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="jumbar" class="form-control"
                                                                    value="<?= set_value('jumbar'); ?>">
                                                                <?= form_error('jumbar', '<small class="text-danger pl-1">', '</small>'); ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label text-right">Tahun
                                                                Anggaran</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="thn_angg" class="form-control"
                                                                    value="<?= set_value('thn_angg'); ?>">
                                                                <?= form_error('thn_angg', '<small class="text-danger pl-1">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class=" form-group row">
                                                            <label class="col-sm-3 col-form-label text-right">Lokasi
                                                                Barang</label>
                                                            <div class="col-sm-9">
                                                                <select name="idlok" id="idlok" class="form-control">
                                                                    <option value="">.:Pilih idlok :.</option>
                                                                    <?php foreach ($loks as $key => $lok) { ?>

                                                                    <option value="<?= $lok->id; ?>">
                                                                        <?= $lok->namalok; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <?= form_error('idlok', '<small class="text-danger pl-1">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-3 col-form-label text-right">Ruangan/Penempatan
                                                            </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="ruang" class="form-control"
                                                                    value="<?= set_value('ruang'); ?>">
                                                                <?= form_error('ruang', '<small class="text-danger pl-3">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class=" form-group row">
                                                            <label class="col-sm-3 col-form-label text-right">Asal
                                                                Perolehan</label>
                                                            <div class="col-sm-9">
                                                                <select name="asal_peroleh" id="asal_peroleh"
                                                                    class="form-control">
                                                                    <option value="">.:Pilih Asal Perolehan:.</option>
                                                                    <option value="Hibah">Hibah</option>
                                                                    <option value="Pembelian">Pembelian</option>
                                                                    <option value="Serah_terima">Pembelian</option>

                                                                </select>
                                                                <?= form_error('asal_peroleh', '<small class="text-danger pl-1">', '</small>'); ?>
                                                            </div>
                                                        </div>


                                                        <div class=" form-group row">
                                                            <label
                                                                class="col-sm-3 col-form-label text-right">Kondisi</label>
                                                            <div class="col-sm-9">
                                                                <select name="kondisi" id="kondisi"
                                                                    class="form-control">
                                                                    <option value="">.:Pilih Kondisi:.</option>
                                                                    <option value="BAIK">BAIK</option>
                                                                    <option value="KURANG BAIK">KURANG BAIK</option>
                                                                    <option value="RUSAK">RUSAK</option>
                                                                    <option value="DALAM PEMBELIAN">DALAM PERBAIKAN
                                                                    </option>

                                                                </select>
                                                                <?= form_error('kondisi', '<small class="text-danger pl-1">', '</small>'); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label text-right">Keterangan
                                                            </label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control"
                                                                    placeholder="Berisi Keterangan tambahan .."
                                                                    name="ket" id="ket" cols="30" rows="10"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class=" modal-footer ">
                                                            <div class=" row">
                                                                <div class="col-12 ">

                                                                    <a href="<?= base_url("admin/Cuser"); ?>"
                                                                        class="btn btn-info">Kembali</a>
                                                                    <button type="submit"
                                                                        class="btn btn-success form_submit"
                                                                        name="form_submit">Tambah</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
            $("#list_user").DataTable();

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
