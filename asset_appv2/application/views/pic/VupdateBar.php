<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul; ?> </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="<?= base_url("assets/"); ?>ionicons.min.css"> -->
    <!-- overlayScrollbars -->
    <!-- <link rel="stylesheet" href="<?= base_url("assets/") ?>dist/css/adminlte.min.css"> -->
    <!-- DataTables -->
    <!-- <link rel="stylesheet" -->
    <!-- href="<?= base_url("assets/") ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"> -->
    <!-- <link rel="stylesheet" -->
    <!-- href="<?= base_url("assets/") ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->

    <!-- Google Font: Source Sans Pro -->
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

                <?php if ($page == "getParm") { ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 ">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <div class="row">
                                        <div class="col">
                                            Update Barang
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">

                                    <form action="<?= base_url('pic/UpdateBar/retrieveData'); ?>" class="form_submit " method="post">
                                        <div class="form-group row">
                                            <div class="col-lg-9 col-md-9 col-sm-6 mb-2">
                                                <input type="text" class="form-control katakunci" name="katakunci" placeholder="Masukan Kode Barang atau Nama Barang " autofocus>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-info btn-block btn_submit" name="form_submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>


                <?php } ?>
                <?php if ($page == "response") {
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <h4>Pilih Barang yang akan diupdate</h4>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-info btn_export">tes</button> -->
                                    <div class="tes_data">
                                        <table id="list_lap_bar" class="table table-sm table-bordered table-striped table-responsive " role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>Kode Barang</th>
                                                    <th>Ruangan</th>
                                                    <th>Nama/merk Barang</th>
                                                    <th>Tahun Angg.</th>
                                                    <th>Harga</th>
                                                    <th>Status Kondisi</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($brgs as $key => $lok) {

                                                ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $no; ?></td>
                                                        <td><?= $lok->kodebar; ?></td>
                                                        <td><?= $lok->idruang . '-' . $lok->ruang; ?></td>
                                                        <td><?= $lok->namabar . '/' . $lok->merkbar; ?></td>
                                                        <td><?= $lok->thn_angg; ?></td>
                                                        <td>Rp <?= number_format($lok->harga, 2); ?></td>
                                                        <td><?= $lok->kondisi; ?></td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col mb-2">
                                                                    <form action=" <?= base_url("pic/UpdateBar/updBarOpenForm/"); ?>" method="post">
                                                                        <input type="hidden" name="kodebar" value="<?= $lok->kodebar; ?>">
                                                                        <input type="hidden" name="katakunci" value="<?= $_SESSION["katakunci"]; ?>">
                                                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                                    </form>
                                                                </div>
                                                                <div class="col">
                                                                    <a href="<?= base_url("pic/Clistbar/detailBar/") . $lok->kodebar; ?>" class="btn btn-sm btn-info">Detail</a>
                                                                </div>
                                                            </div>




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
                <?php } ?>

                <?php if ($page == "formUpdate") {
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Data Barang </h4>
                                        </div>
                                        <div class="col text-right">
                                            <a href="<?= base_url("pic/Clistbar/detailBar/") . $brg[0]->kodebar; ?>" class="btn  btn-info">Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">

                                    <div class="row">
                                        <div class="col">
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

                    <div class="row ml-1 mb-2">
                        <div class=" col nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <button type="button" class="nav-link bg-primary" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home">Update Barang</button>

                            <button type="button" class="nav-link bg-info" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile">Upload Gambar</button>



                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Update Barang </h4>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">


                                    <?= $this->session->flashdata('pesan'); ?>
                                    <div class="tab-content" id="custom-tabs-three-tabContent">
                                        <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
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
                                                <label for="">
                                                    Kondisi
                                                </label>
                                                <select name="kondisi" class="form-control form-small">
                                                    <option value="">.:Pilih Kondisi:.</option>
                                                    <option value="BAIK" <?= ($brg[0]->kondisi == "BAIK") ? "selected" : ""; ?>>
                                                        BAIK</option>
                                                    <option value="RUSAK RINGAN" <?= ($brg[0]->kondisi == "RUSAK RINGAN") ? "selected" : ""; ?>>
                                                        RUSAK
                                                        RINGAN</option>
                                                    <option value="RUSAK BERAT" <?= ($brg[0]->kondisi == "RUSAK BERAT") ? "selected" : ""; ?>>
                                                        RUSAK
                                                        BERAT
                                                    </option>
                                                    <option value="PROSES PERBAIKAN" <?= ($brg[0]->kondisi == "PROSES PERBAIKAN") ? "selected" : ""; ?>>
                                                        PROSES PERBAIKAN
                                                    </option>

                                                </select>
                                                <label for="">
                                                    Deskripsi
                                                </label>
                                                <input type="hidden" name="kata" value="<?= $kata; ?>">
                                                <textarea name="desk" id="" rows="3" class="form-control form-small" placeholder="Tulis kondisi trakhir barang jika ada perubahan"><?= $brg[0]->ket; ?></textarea>
                                                <!-- <button type="submit" class="btn btn-warning ">Simpan </button> -->
                                            </form>

                                            <div class="row mt-2">
                                                <div class="col">

                                                    <button type="button" class="btn btn-warning btn_submit_change">Simpan
                                                        Perubahan</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade " id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">

                                            <div class="row mb-2">
                                                <div class="col">
                                                    <?php echo form_open_multipart(base_url('pic/imageUpload_Controller/upload')); ?>
                                                    <?php echo "<input type='file' name='profile_pic' size='20' />"; ?>

                                                    <?php echo "<input type='hidden' name='kodebar' value='" . $brg[0]->kodebar . "' /> "; ?>
                                                    <span class="badge bg-danger text-left">
                                                        Note: <br>
                                                        Hanya File dengan extension
                                                        '.gif .jpg .jpeg .png' <br>
                                                        dan ukuran Max 5 MB </span><br>
                                                    <?php echo "<input type='submit' class= 'btn btn-info mt-2' name='submit' value='UPLOAD' /> "; ?>
                                                    <?php echo "</form>" ?>
                                                </div>
                                            </div>


                                            <?= (count($gbrs) == 0) ? "Belum Ada Gambar yang di-Upload" : "";; ?>
                                            <div class="row">


                                                <?php
                                                $no = 1;
                                                foreach ($gbrs as $key => $gbr) {

                                                ?>
                                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                                        <div class="card">
                                                            <img class="img img-thumbnail " style=" height:200px " src="<?= base_url('assets/image/img_bar/') . $gbr->file_name; ?>">
                                                            <div class="card-body p-2">
                                                                <?php print_r($gbr->file_name); ?> <br>
                                                                <a href="<?= base_url("pic/UpdateBar/deleteGambar/$gbr->id/$gbr->kodebar"); ?>" class="btn mt-1 btn-warning" onclick="return confirm('Apakah anda ingin Hapus Gambar?')">delete</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                <?php } ?>



                                            </div>



                                        </div>

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

    <!-- jQuery -->
    <!-- <script src="<?= base_url("assets/") ?>plugins/jquery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE App -->
    <!-- <script src="<?= base_url("assets/") ?>dist/js/adminlte.min.js"></script> -->
    <script src="<?= base_url("assets/") ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script>
        $(document).ready(function() {
            $('.btn_cari_by_barcode').click(function() {
                kodebar = $('.kodebar').val();
                $.get('<?= base_url('pic/UpdateBar/retrieveData'); ?>' + kodebar, function(data) {
                    // alert('Data : ' + data);
                    $('.scan_result').html(data);
                    $('.kodebar').val('');
                    $('.kodebar').focus();


                });
            });

            $('.kodebar').keypress(function(e) {
                if (e.keyCode == 13) {
                    $('.btn_cari_by_barcode').click();
                }
            });

            $('.btn_submit_change').click(function() {

                if (confirm('Data Sudah Benar?')) {
                    $('.tes_submit').submit();
                }
            });



            $('.form_submit').submit(function(event) {
                var inputValue = $('.katakunci').val();

                if (inputValue.trim() === '') {
                    alert('Inputan tidak boleh kosong.');
                    event.preventDefault(); // Mencegah pengiriman formulir
                }
            });
        });
    </script>
</body>

</html>