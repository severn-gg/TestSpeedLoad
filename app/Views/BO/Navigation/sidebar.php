<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/logo.png" alt="Helpdesk KK Logo" class="brand-image img-circle">
        <span class="brand-text font-weight-light">HELPDESK - KK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $nama; ?></a>
                <p><small><?php echo $kantor; ?></small></p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo site_url('bo/dashboard'); ?>" class="nav-link <?= (isset($menu) && $menu === 'Dashboard') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('bo/tiketbaru') ?>" class="nav-link <?= (isset($menu) && $menu === 'Buattiket') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Buat Tiket
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('bo/tiketbo') ?>" class="nav-link <?= (isset($menu) && $menu === 'Tiketbo') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Tiket BO
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url('bo/tiketsaya') ?>" class="nav-link <?= (isset($menu) && $menu === 'Tiketsaya') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Tiket Saya
                        </p>
                    </a>
                </li>
                <li class="nav-item bg-danger">
                    <a href="/logout" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
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