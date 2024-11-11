<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul; ?> </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="<?= base_url("assets/") ?>adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/fontawesome-free/css/all.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>dist/css/adminlte.min.css">

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

                <?php if ($page == "formgetkeyword") { ?>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 ">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <div class="row">
                                        <div class="col">
                                            Update Barang By Keyword
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">

                                    <form action="<?= base_url('pic/UpdateBar/retrieveData'); ?>" class="form_submit " method="post">
                                        <div class="form-group row">
                                            <div class="col-lg-9 col-md-9 col-sm-6 mb-2">
                                                <input type="text" class="form-control katakunci" name="katakunci" placeholder="Masukan Kode Barang atau Nama Barang " autofocus>
                                                <input type="hidden" name="param" value="<?= $param; ?>">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-info btn-block btn_submit" name="form_submit">Submit</button>
                                            </div>
                                        </div>
                                        Menggunakan 2 kata atau lebih dalam pencarian akan membuat pencarian akan lebih tepat dan terasa cepat
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
                                    <h4>Daftar barang</h4>
                                    Berdasarkan Kata kunci : <?= $katakunci; ?>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-info btn_export">tes</button> -->

                                    <div class="tes_data">

                                        <?= $this->session->flashdata('pesan'); ?>

                                        <table id="list_bar" class="table table-sm table-bordered table-striped table-responsive ">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Nama Barang / Merk Barang / Kode Barang / Kategori</th>
                                                    <th>Tahun Anggaran</th>
                                                    <th>Asal Perolehan</th>
                                                    <th>Ruangan</th>
                                                    <th>Harga</th>
                                                    <th>Kondisi</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $no = 1;
                                                foreach ($brgs as $key => $bar) {

                                                ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $no; ?></td>
                                                        <td>
                                                            <?php
                                                            if ($bar->file_name !== null) {


                                                                // $file = $_SERVER['DOCUMENT_ROOT'] . "/devel/aset_manajemen/asset_appv2/assets/image/img_bar/" . $bar->file_name;;

                                                                // if (file_exists($file)) {
                                                                //     echo "File gambar ditemukan.";
                                                                // } else {
                                                                //     echo "File gambar tidak ditemukan.";
                                                                // }

                                                            ?>
                                                                <img class="img img-size-50" src="<?= base_url("assets/image/img_bar/") . $bar->file_name; ?>" height="100" width="100" alt=""><br>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="text-sm">
                                                            <strong><?= $bar->namabar; ?></strong> <br>
                                                            <?php
                                                            echo $bar->merkbar . "<br>";
                                                            echo $bar->kodebar . "<br>";
                                                            echo $bar->namakateg;
                                                            ?>
                                                        </td>
                                                        <td><?= $bar->thn_angg; ?></td>
                                                        <td><?= $bar->asal_peroleh; ?></td>
                                                        <td><?= $bar->ruang; ?></td>

                                                        <td>Rp <?= number_format($bar->harga, 2); ?></td>
                                                        <td><?= $bar->kondisi; ?></td>

                                                        <td>
                                                            <div class="row">
                                                                <div class="col mb-2">
                                                                    <form action=" <?= base_url("pic/UpdateBar/updBarOpenForm/"); ?>" method="post">
                                                                        <input type="hidden" name="kodebar" value="<?= $bar->kodebar; ?>">
                                                                        <input type="hidden" name="katakunci" value="<?= $katakunci; ?>">
                                                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                                    </form>
                                                                </div>
                                                                <div class="col">
                                                                    <a href="<?= base_url("pic/Clistbar/detailBar/") . $bar->kodebar; ?>" class="btn btn-sm btn-info">Detail</a>
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


                <?php if ($page == "bythn") { ?>
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-12 ">
                            <div class="card card-outline card-info">
                                <div class="card-header p-1">
                                    <div class="row">
                                        <div class="col">
                                            Update Barang By Tahun Anggaran
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("pic/UpdateBar_byThnAngg/caribythnangg"); ?>" method="post" class="form_submit_cariByname">
                                        <div class="row">

                                            <div class="col-10">
                                                <select name="thn_angg" id="thn_angg" class="form-control select2">
                                                    <option value="">.:Pilih Tahun Anggaran :.</option>
                                                    <?php foreach ($thn_angg as $key => $thn) { ?>

                                                        <option value='<?= $thn->thn_angg; ?>'><?= $thn->thn_angg . " - " . $thn->jumitem . " Item Barang"; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name="from" value="bythnangg">
                                            <div class="col">
                                                <button class="btn btn-info btn-block btn_cari_by_name">Cari</button>
                                            </div>
                                        </div>

                                    </form>


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
                                            <h5>Data Barang</h5>
                                        </div>


                                        <div class="col text-right">
                                            <form action=" <?= base_url("pic/UpdateBar/retrieveData/"); ?>" method="post">

                                                <input type="hidden" name="katakunci" value="<?= ($katakunci) ? $katakunci : $this->session->flashdata('katakunci'); ?>">
                                                <button type="submit" class="btn btn-sm btn-info">Kembali</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">

                                    <div class="row">
                                        <div class="col-6">
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
                                                    <?= $brg[0]->idkateg . " - <br>" . $brg[0]->namakateg; ?>
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

                                        </div>
                                        <div class="col-6">
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
                        <div class="col-12">
                            <!-- <div class="row ml-1 mb-2">
                                <div class=" col nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <button type="button" class="nav-link bg-primary" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home">Update Barang</button>

                                    <button type="button" class="nav-link bg-info" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile">Upload Gambar</button>



                                </div>
                            </div> -->



                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header p-1">
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Update Barang </h5>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-2">

                                            <div class="row mb-2">
                                                <div class="col">
                                                    <?php echo form_open_multipart(base_url('pic/imageUpload_Controller/upload')); ?>


                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="">
                                                                        Upload Gambar
                                                                    </label>

                                                                    <?php echo "<br> <input type='file' name='profile_pic' size='20' />"; ?>

                                                                    <?php echo "<input type='hidden' name='kodebar' value='" . $brg[0]->kodebar . "' /> "; ?>

                                                                    <?php echo "<input type='hidden' name='katakunci' value='" . $katakunci . "' /> "; ?>
                                                                    <span class="badge bg-danger text-left">
                                                                        Note: <br>
                                                                        Hanya File dengan extension
                                                                        '.gif .jpg .jpeg .png' <br>
                                                                        dan ukuran Max 5 MB </span><br>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col">
                                                                    <label for="">
                                                                        Merk Barang
                                                                    </label>
                                                                    <input type="text" class="form-control form-small" name="merkbar" value="<?= $brg[0]->merkbar; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="">
                                                                        Nama Barang
                                                                    </label>
                                                                    <input type="text" class="form-control form-small" name="namabar" value="<?= $brg[0]->namabar; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="">
                                                                        No Seri
                                                                    </label>
                                                                    <input type="text" class="form-control form-small" name="no_seri" value="<?= $brg[0]->no_seri; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="">
                                                                        No Mesin
                                                                    </label>
                                                                    <input type="text" class="form-control form-small" name="no_mesin" value="<?= $brg[0]->no_mesin; ?>">
                                                                </div>
                                                            </div>



                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="">
                                                                        No Rangka
                                                                    </label>
                                                                    <input type="text" class="form-control form-small" name="no_rangka" value="<?= $brg[0]->no_rangka; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="">
                                                                        No BPKB
                                                                    </label>
                                                                    <input type="text" class="form-control form-small" name="no_bpkb" value="<?= $brg[0]->no_bpkb; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="">
                                                                        No Plat Lama
                                                                    </label>
                                                                    <input type="text" class="form-control form-small" name="no_platlama" value="<?= $brg[0]->no_platlama; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="">
                                                                        No Plat Baru
                                                                    </label>
                                                                    <input type="text" class="form-control form-small" name="no_platbaru" value="<?= $brg[0]->no_platbaru; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="">
                                                                        Jenis Peringatan
                                                                        <?= "jenis peringatan" . $brg[0]->jns_per; ?>
                                                                    </label>
                                                                    <select name="jns_per" id="" class="form-control form-small">


                                                                        <option value="0" <?= ($brg[0]->jns_per == "0") ? "selected" : ""; ?>>.: PILIH JENIS PERINGATAN :.</option>
                                                                        <option value="1" <?= ($brg[0]->jns_per == "1") ? "selected" : ""; ?>>PAJAK KENDARAAN</option>
                                                                        <option value="2" <?= ($brg[0]->jns_per == "2") ? "selected" : ""; ?>>KALIBRASI ALAT RS</option>
                                                                        <option value="3" <?= ($brg[0]->jns_per == "3") ? "selected" : ""; ?>>PAJAK BUMI DAN BANGUNAN (PBB)</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <label for="">
                                                                        Tanggal Kalibrasi/Tanggal Pembayaran Pajak
                                                                    </label>
                                                                    <input type="date" class="form-control form-small" name="tgl_kalibrasi" value="<?= $brg[0]->tgl_kalibrasi; ?>">
                                                                </div>
                                                            </div>

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
                                                                    <select name="ruangan" id="ruangan" class="form-control select2">
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
                                                            <input type="hidden" name="katakunci" value="<?= $katakunci; ?>">
                                                            <!-- <input type="hidden" name="thn_angg" value="<?= $thn_angg; ?>"> -->
                                                            <textarea name="desk" id="" rows="3" class="form-control form-small" placeholder="Tulis kondisi trakhir barang jika ada perubahan"><?= $brg[0]->ket; ?></textarea>

                                                        </div>


                                                    </div>

                                                    <?php echo "<input type='submit' class= 'btn btn-info mt-2' name='submit' value='Update barang' /> "; ?>


                                                    <?php echo "</form>" ?>
                                                </div>
                                            </div>


                                            <?= (count($gbrs) == 0) ? "Belum Ada Gambar yang di-Upload" : ""; ?>

                                            <div class="row">


                                                <?php
                                                $no = 1;
                                                foreach ($gbrs as $key => $gbr) {

                                                ?>
                                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                                        <div class="card">
                                                            <img class="img img-thumbnail " style=" height:200px " src="<?= base_url('assets/image/img_bar/') . $gbr->file_name; ?>">
                                                            <div class="card-body p-2">



                                                                <form class="submit_delete_gambar" action="<?= base_url("pic/UpdateBar/deleteGambar/$gbr->id/$gbr->kodebar"); ?>" class="form-group" method="POST">

                                                                    <input type="hidden" name="katakunci" value="<?= $katakunci; ?>">
                                                                    <button type="button" class="btn mt-1 btn-warning btn_delete_gambar">delete</button>


                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                <?php } ?>



                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
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

    <!-- jQuery -->
    <!-- <script src="<?= base_url("assets/") ?>plugins/jquery/jquery.min.js"></script> -->
    <script src="<?= base_url("assets/") ?>jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url("assets/") ?>adminlte.min.js"></script>


    <!-- Select2 -->
    <script src="<?= base_url("assets/") ?>plugins/select2/js/select2.full.min.js"></script>


    <!-- AdminLTE App -->
    <!-- <script src="<?= base_url("assets/") ?>dist/js/adminlte.min.js"></script> -->
    <script src="<?= base_url("assets/") ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script>
        $(document).ready(function() {


            $('.select2').select2()


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
            $('.btn_delete_gambar').click(function() {

                if (confirm('Data Sudah Benar?')) {
                    $('.submit_delete_gambar').submit();
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