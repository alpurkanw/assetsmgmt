<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php $this->load->view("VlogoMenu"); ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel   mb-3 d-flex">

            <div class="info">
                <a href="<?= base_url() ?>" class="d-block"><?= $_SESSION["nama"]; ?> <br>User Maker</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU UTAMA</li>
                <li class="nav-item">
                    <a href="<?= base_url("mkr/Cinputbar") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Input Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("mkr/Clistbar") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            List barang
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("mkr/Claporan") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laporan Input Barang
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