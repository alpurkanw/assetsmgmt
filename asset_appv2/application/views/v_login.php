<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition login-page " style="background-color: #00CED1;">

    <div class="login-box ">
        <div class="login-logo">

            <a href="<?= base_url(); ?>">
                <img src="<?= base_url("assets/image/"); ?>bangteng_logo1.png" style="max-width: 150px;"><br>

            </a>

        </div>
        <div class="row">
            <div class="col text-center ">
                <span class="h4"><b>SI MANTAP RASA</b> <br></span>
                <b>Sistem Management Aset Tetap Rumah Sakit</b> <br>
                <b>RSUD Bangka Tengah</b>

            </div>
        </div>

        <!-- /.login-logo -->
        <?php
        echo  $this->session->flashdata('pesan');
        ?>

        <div class="card card-outline card-info ">
            <div class="card-body login-card-body p-2">
                <p class="login-box-msg ">Log In</p>

                <form action="<?= base_url("Auth/login"); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="usernm" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="pass">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row ">

                        <!-- /.col -->
                        <!-- <div class="col text-right">
                            <a href="<?= base_url("Daftar"); ?>" class="btn btn-info btn-block">Daftar</a>

                        </div> -->
                        <!-- /.col -->
                        <!-- /.col -->
                        <div class="col text-right">
                            <button type="submit" class="btn btn-info btn-block">Log In</button>
                            <a href="https://www.home.rsabuhanifah.com" class="btn btn-secondary btn-block">Kembali</a>

                        </div>
                        <!-- /.col -->
                    </div>

                </form>

            </div>
            <!-- /.login-card-body -->
            <div class="card-footer p-1">
                <p class="login-box-msg m-0">SI MANTAP RASA V.01.2023</p>

            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url("assets/"); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/"); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/"); ?>dist/js/adminlte.min.js"></script>

</body>

</html>