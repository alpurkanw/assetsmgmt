<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome | Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        $data["tes"] = 0;
        // $this->load->view('path');
        $this->load->view("admin/Tmp_navbar_top", $data); ?>
        <!-- /.navbar -->

        <?php
        $data["tes1"] = 0;
        // $this->load->view('path');
        $this->load->view("admin/Tmp_side_menu", $data); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->




                <div class="row">
                    <div class="col">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">DASHBOARD</h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">

                                        <div class="row">
                                            <div class=" col-lg-3 col-sm-12 ">
                                                <!-- small box -->
                                                <div class="small-box bg-info">
                                                    <div class="inner">
                                                        <h4><strong><?= $dshBarApp[0]->jumitem; ?></strong></h4>

                                                        <p>Total Item Barang(Approve)</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ion ion-bag"></i>
                                                    </div>
                                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class=" col-lg-3 col-sm-12">
                                                <!-- small box -->
                                                <div class="small-box bg-info">
                                                    <div class="inner">
                                                        <h4 class="text-center"><strong>Rp
                                                                <?= number_format($dshBarApp[0]->nominal, 2); ?></strong>
                                                        </h4>

                                                        <p>Total Nominal (Approve)</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ion ion-stats-bars"></i>
                                                    </div>
                                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>

                                            <div class=" col-lg-3 col-sm-12">
                                                <!-- small box -->
                                                <div class="small-box bg-danger">
                                                    <div class="inner">
                                                        <h4><strong><?= $dshBar[0]->jumitem; ?></strong></h4>

                                                        <p>Total Item Barang (Belum Approve)</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ion ion-person-add"></i>
                                                    </div>
                                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-sm-12">
                                                <!-- small box -->
                                                <div class="small-box bg-danger">
                                                    <div class="inner">
                                                        <h4 class="text-center"><strong>Rp
                                                                <?= number_format($dshBar[0]->nominal, 2); ?></strong>
                                                        </h4>

                                                        <p>Total Nominal (Belum Approve)</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ion ion-pie-graph"></i>
                                                    </div>
                                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->

                                        </div>



                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">

                                        <!-- PIE CHART -->
                                        <div class="card card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">Kondisi Barang</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col">

                                                        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                    </div>
                                                    <div class="col">
                                                        <canvas id="pieChartnom" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <table id="list_user" class="table table-sm table-bordered table-striped  " role="grid" aria-describedby="example1_info">
                                                            <thead class="bg-info">
                                                                <tr role="row">
                                                                    <th>Kondisi</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Nominal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $jumnom = 0;
                                                                $jumitem = 0;
                                                                $i = 0;
                                                                $warna =  ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'];
                                                                foreach ($kondisi as $key => $kon) {
                                                                    $kondisi_stat[] = ($kon->kondisi == "") ? "BELUM DIKETAHUI" : $kon->kondisi;
                                                                    $jumlahBar[] = $kon->jumitem;
                                                                    $nominal[] = $kon->nominal;
                                                                ?>
                                                                    <tr role="row" class="odd" style="background-color: <?= $warna[$i]; ?>;">
                                                                        <td><?= ($kon->kondisi == "") ? "BELUM DIKETAHUI" : $kon->kondisi; ?></td>
                                                                        <td class="text-right"><?= $kon->jumitem; ?></td>
                                                                        <td class="text-right">Rp
                                                                            <?= number_format($kon->nominal, 2); ?></td>
                                                                    </tr>
                                                                <?php
                                                                    $jumnom += $kon->nominal;
                                                                    $jumitem += $kon->jumitem;
                                                                    $i++;
                                                                }; ?>
                                                                <tr>
                                                                    <th>TOTAL</th>
                                                                    <th class="text-center"><?= $jumitem; ?></th>
                                                                    <th class="text-right">Rp <?= number_format($jumnom, 2); ?></th>
                                                                </tr>


                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->

                                    </div>
                                    <div class="col">
                                        <!-- PIE CHART -->
                                        <div class="card card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">Asal Perolehan barang</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col">

                                                        <canvas id="perolehanBarItem" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                    </div>
                                                    <div class="col">
                                                        <canvas id="perolehanBarNom" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <table id="list_user" class="table table-sm table-bordered table-striped  " role="grid" aria-describedby="example1_info">
                                                            <thead class="bg-info">
                                                                <tr role="row">
                                                                    <th>Asal Peroleh</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Nominal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $jumnom = 0;
                                                                $jumitem = 0;
                                                                $i = 0;
                                                                $warna =  ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#a1f3b5'];
                                                                foreach ($asal as $key => $asl) {

                                                                    $asalperolehBar[] = $asl->asal_peroleh;
                                                                    $asaljumlahBar[] = $asl->jumitem;
                                                                    $asalnominal[] = $asl->nominal;
                                                                ?>
                                                                    <tr role="row" class="odd" style="background-color: <?= $warna[$i]; ?>">
                                                                        <td><?= $asl->asal_peroleh; ?></td>
                                                                        <td class="text-right"><?= $asl->jumitem; ?></td>
                                                                        <td class="text-right">Rp
                                                                            <?= number_format($asl->nominal, 2); ?></td>
                                                                    </tr>
                                                                <?php
                                                                    $jumnom += $asl->nominal;
                                                                    $jumitem += $asl->jumitem;
                                                                    $i++;
                                                                }; ?>
                                                                <tr>
                                                                    <th>TOTAL</th>
                                                                    <th class="text-center"><?= $jumitem; ?></th>
                                                                    <th class="text-right">Rp <?= number_format($jumnom, 2); ?></th>
                                                                </tr>
                                                            </tbody>

                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col">

                                        <h5>Lokasi barang</h5>
                                        <table id="list_user" class="table table-sm table-bordered table-striped  " role="grid" aria-describedby="example1_info">
                                            <thead class="bg-info">
                                                <tr role="row">
                                                    <th>Lokasi</th>
                                                    <th>Jumlah</th>
                                                    <th>Nominal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $jumnom = 0;
                                                $jumitem = 0;
                                                foreach ($lokasi as $key => $lok) {
                                                ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $lok->namalok; ?></td>
                                                        <td class="text-center"><?= $lok->jumitem; ?></td>
                                                        <td class="text-right">Rp <?= number_format($lok->nominal, 2); ?></td>
                                                    </tr>
                                                <?php
                                                    $jumnom += $lok->nominal;
                                                    $jumitem += $lok->jumitem;
                                                }; ?>
                                                <tr>
                                                    <th>TOTAL</th>
                                                    <th class="text-center"><?= $jumitem; ?></th>
                                                    <th class="text-right">Rp <?= number_format($jumnom, 2); ?></th>
                                                </tr>

                                            </tbody>

                                        </table>
                                        <hr>


                                        <h5>Barang Per Lokasi Per Ruangan</h5>

                                        <table id="list_user" class="table table-sm table-bordered table-striped  " role="grid" aria-describedby="example1_info">
                                            <thead class="bg-info">
                                                <tr role="row">
                                                    <th>Lokasi</th>
                                                    <th>Ruangan</th>
                                                    <th class="text-center">Jumlah</th>
                                                    <th>Nominal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $jumnom = 0;
                                                $jumitem = 0;
                                                foreach ($ruang as $key => $lok) {
                                                ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $lok->idlok; ?></td>
                                                        <td><?= $lok->ruang; ?></td>
                                                        <td class="text-center"><?= $lok->jumitem; ?></td>
                                                        <td>Rp <?= number_format($lok->nominal, 2); ?></td>
                                                    </tr>
                                                <?php
                                                    $jumnom += $lok->nominal;
                                                    $jumitem += $lok->jumitem;
                                                }; ?>
                                                <tr>
                                                    <th colspan="2">TOTAL</th>
                                                    <th class="text-center"><?= $jumitem; ?></th>
                                                    <th class="text-right">Rp <?= number_format($jumnom, 2); ?></th>
                                                </tr>


                                            </tbody>

                                        </table>
                                        <hr>
                                    </div>

                                </div>

                            </div><!-- /.card-body -->
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

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url("assets/") ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/") ?>plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url("assets/") ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url("assets/") ?>dist/js/demo.js"></script>



    <script>
        $(function() {
            //-------------
            //- PIE CHART -
            //-------------
            var donutData = {
                datasets: [{
                    data: <?= json_encode($jumlahBar); ?>,
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }],
                labels: <?= json_encode($kondisi_stat); ?>
            }

            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                }
            };

            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            });



            // //-------------
            // //- PIE CHART -
            // //-------------

            var donutData = {
                labels: <?= json_encode($kondisi_stat); ?>,
                datasets: [{
                    data: <?= json_encode($nominal); ?>,
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }

            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChartnom').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                }
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })



            // $asal[] = $asl - > asal_peroleh;
            // $asaljumlahBar[] = $asl - > jumitem;
            // $asalnominal[] = $asl - > nominal;

            // //-------------
            // //- PIE CHART -
            // //-------------

            var donutData = {
                labels: <?= json_encode($asalperolehBar); ?>,
                datasets: [{
                    data: <?= json_encode($asaljumlahBar); ?>,
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }

            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#perolehanBarItem').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                }
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })



            //-------------
            //- PIE CHART -
            //-------------
            var donutData = {
                labels: <?= json_encode($asalperolehBar); ?>,
                datasets: [{
                    data: <?= json_encode($asalnominal); ?>,
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }

            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#perolehanBarNom').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                }
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })




            //-------------
            //- PIE CHART -
            //-------------

            // var donutData = {
            //     labels: <?= json_encode($asal); ?>,
            //     datasets: [{
            //         data: <?= json_encode($asalnominal); ?>,
            //         backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            //     }]
            // }

            // // Get context with jQuery - using jQuery's .get() method.
            // var pieChartCanvas = $('#perolehanBarItem').get(0).getContext('2d')
            // var pieData = donutData;
            // var pieOptions = {
            //     maintainAspectRatio: false,
            //     responsive: true,
            // }
            // //Create pie or douhnut chart
            // // You can switch between pie and douhnut using the method below.
            // var pieChart = new Chart(pieChartCanvas, {
            //     type: 'pie',
            //     data: pieData,
            //     options: pieOptions
            // })






        })
    </script>
</body>

</html>