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
                <img src="<?= base_url() ?>prof_pict/<?php echo $pict;?>" class="img-circle elevation-2" alt="User Image">
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
                    <a href="<?= site_url(); ?>/bo/dashboard" class="nav-link <?= (isset($menu) && $menu === 'Dashboard') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= site_url(); ?>/bo/tiketbaru" class="nav-link <?= (isset($menu) && $menu === 'Buattiket') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Buat Tiket
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= site_url(); ?>/bo/tiketbo" class="nav-link <?= (isset($menu) && $menu === 'Tiketbo') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Tiket BO
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url(); ?>/bo/tiketsaya" class="nav-link <?= (isset($menu) && $menu === 'Tiketsaya') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Tiket Saya
                        </p>
                    </a>
                </li>
                <li class="nav-header">Aditional</li>
                <li class="nav-item <?= (isset($menu) && $menu === 'Pages') ? ' menu-is-opening menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= (isset($menu) && $menu === 'Pages') ? ' active' : '' ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= site_url(); ?>/bo/profile" class="nav-link <?= (isset($submenu) && $submenu === 'Profile') ? ' active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Documentation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item bg-danger">
                    <a href="<?= site_url();?>/logout" class="nav-link">
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