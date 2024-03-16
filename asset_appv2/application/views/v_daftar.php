<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.admin/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
    <div class="regiseter-box col-4">
        <div class="login-logo mt-2">

            <a href="<?= base_url(); ?>">
                <img src="<?= base_url("assets/image/"); ?>bangteng_logo1.png" width="120"><br>
            </a>
        </div>

        <?php if ($page == "f_daftar") { ?>

            <div class="card ">
                <div class="card-body ">

                    <p class="login-box-msg">

                        Pendaftaran User
                    </p>
                    <?= $this->session->flashdata('pesan'); ?>
                    <form action="<?= base_url("Daftar/register"); ?>" method="POST">
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nomor Induk Pegawai" name="nip" id="nip" value="<?= set_value('nip'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" value="<?= set_value('nama'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('pass1', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="pass1">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('pass2', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Retype password" name="pass2">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="No Telp" name="notelp" value="<?= set_value('notelp'); ?>">

                        </div>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                        </div>
                        <div class="row">

                            <div class="col">
                                <a href="<?= base_url("Auth"); ?>" class="btn btn-success btn-block">Log In</a>
                            </div>
                            <div class="col">
                                <button type="submit" onclick="return confirm('Pastikan data sudah benar')" class="btn btn-primary btn-block">Daftarkan</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- <div class="row">

                            <div class="col">
                                Pendaftaran Warga Silahkan Menggunakan Link Pendaftaran Dari Ketua Grup
                            </div>

                        </div> -->
                    </form>
                </div>
                <!-- /.form-box -->
            </div>

        <?php }; ?>

        <?php if ($page == "response") { ?>
            <div class="card card-primary card-outline">
                <div class="card-body register-card-body">
                    <h4 class="text-center">Response Pendaftaran</h4>
                    <?php
                    if ($status == "ok") {
                        echo $pesan;
                    } else {
                        echo $pesan;
                    }

                    //echo $grpid; 
                    ?>

                    <div class="row">

                        <div class="col">
                            <a href="<?= base_url("../lp"); ?>" class="btn btn-secondary btn-block">Kembali</a>
                        </div>
                        <div class="col">
                            <a href="<?= base_url(); ?>" class="btn btn-primary btn-block">Login</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->

        <?php }; ?>


    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url("assets/"); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/"); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/"); ?>dist/js/adminlte.min.js"></script>
</body>

</html>