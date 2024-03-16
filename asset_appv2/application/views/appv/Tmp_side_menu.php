<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php $this->load->view("VlogoMenu"); ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel   mb-3 d-flex">

            <div class="info">
                <a href="<?= base_url() ?>" class="d-block"><?= $_SESSION["nama"]; ?> <br>User Approval</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU UTAMA</li>

                <li class="nav-item">
                    <a href="<?= base_url("appv/Clistbar/listNotApp") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            List Barang Not Approve
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("appv/Clistbar/all") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            List Semua Barang
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("appv/Claporan") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laporan Approval
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