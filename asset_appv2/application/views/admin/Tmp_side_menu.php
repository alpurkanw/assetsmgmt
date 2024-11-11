<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <?php $this->load->view("VlogoMenu"); ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel   mb-3 d-flex">

            <div class="info">
                <a href="<?= base_url() ?>" class="d-block"><?= $_SESSION["nama"]; ?> <br>User Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



                <!-- <li class="nav-item">
                    <a href="<?= base_url("admin/CuplGambar") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            UPLOAD GAMBAR
                        </p>
                    </a>
                </li> -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            MONITORING
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url("admin/Home/dshHome") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Dashboard Utama
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            MASTER DATA
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url("admin/Clokasi") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Lokasi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("admin/Cruang") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Ruangan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("admin/Cuser") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    User
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("admin/Ckateg") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Kategori Barang
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url("admin/Cwarning") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Jenis Peringatan
                                </p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            ACTIVITY
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url("admin/Cactivity") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Print Barang Per Ruangan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("admin/Cact_peringatan") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Tambah Peringatan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url("admin/ChapusAset/CariByName") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Hapus Aset (not ok)
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            LAPORAN
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url("admin/ClapPerLokasi") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Barang Per Lokasi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("admin/ClapRuangPerLok") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Barang Per Ruangan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("admin/ClapPerThnAnggaran") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Barang Per Tahun Anggaran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("admin/ClapPerAsalPerolehan") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Barang Per Asal Perolehan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("admin/ClapPerKondisi") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Barang Per Kondisi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("admin/ClapAllBar") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Seluruh Barang
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("Auth/gantiPass") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            GANTI PASSWORD
                        </p>
                    </a>
                </li>



                <li class="nav-header mt-0"></li>
                <li class="nav-item">
                    <a href="<?= base_url("Auth/logout") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            LOGOUT
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>