<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php $this->load->view("VlogoMenu"); ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel   mb-3 d-flex">

            <div class="info">
                <a href="<?= base_url() ?>" class="d-block"><?= $_SESSION["nama"]; ?> <br>User PIC</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU UTAMA</li>

                <!-- <li class="nav-item">
                    <a href="<?= base_url("pic/Clistbar/listNotApp") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Update Kodisi Barang
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="<?= base_url("pic/uplGambar/barCode") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Upload Gambar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("pic/CcariBar/barCode") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Barcode (Cari By Kode)
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("pic/CcariBar/CariByName") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Cari Barang By Nama
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("pic/CcariBar/CariByKateg") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            List Barang By Kategori
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("pic/UpdateBar/getParm") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Update Barang
                        </p>
                    </a>
                </li>


                <hr>
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