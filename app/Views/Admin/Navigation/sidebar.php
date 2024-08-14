<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin/dashboard') ?>" class="brand-link">
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
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= (isset($menu) && $menu === 'Dashboard') ? ' active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item <?= (isset($menu) && $menu === 'Tables') ? ' menu-is-opening menu-open' : '' ?>">
          <a href="#" class="nav-link <?= (isset($menu) && $menu === 'Tables') ? ' active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Tables
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/viewaktivis') ?>" class="nav-link <?= (isset($submenu) && $submenu === 'viewaktivis') ? ' active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>List Aktivis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/viewticket') ?>" class="nav-link <?= (isset($submenu) && $submenu === 'Tiket') ? ' active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>List Tiket</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/listkantor') ?>" class="nav-link <?= (isset($submenu) && $submenu === 'Kantor') ? ' active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Kantor List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/listdepartemen') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Departemen List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/listpic') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>PIC List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/listdivisi_it') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Divisi IT List</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item <?= (isset($menu) && $menu === 'Forms') ? ' menu-is-opening menu-open' : '' ?>">
          <a href="#" class="nav-link <?= (isset($menu) && $menu === 'Forms') ? ' active' : '' ?>">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Forms
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/forminputaktivis') ?>" class="nav-link <?= (isset($submenu) && $submenu === 'tambahaktivis') ? ' active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Aktivis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/forminputjabatan') ?>" class="nav-link <?= (isset($submenu) && $submenu === 'jabatan') ? ' active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Jabatan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/forminputarea') ?>" class="nav-link <?= (isset($submenu) && $submenu === 'area') ? ' active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Area</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/forminputkantor') ?>" class="nav-link <?= (isset($submenu) && $submenu === 'kantor') ? ' active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Tambah Kantor</p>
              </a>
            </li>
            <!-- setup -->
            <li class="nav-item">
              <a href="<?= base_url('admin/formsetkantoraktivis') ?>" class="nav-link <?= (isset($submenu) && $submenu === 'kantoraktivis') ? ' active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Mutasi Kantor Aktivis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/formsetjabatanaktivis') ?>" class="nav-link <?= (isset($submenu) && $submenu === 'mutasijabatan') ? ' active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Mutasi Jabatan Aktivis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/formsetuserlogintivis') ?>" class="nav-link <?= (isset($submenu) && $submenu === 'tambahuserlogin') ? ' active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Set User Login Aktivis</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/formsetpicarea') ?>" class="nav-link <?= (isset($submenu) && $submenu === 'picarea') ? ' active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Set PIC Area</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Charts
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/laporantiket') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tiket</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/laporanbo') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Branch Office</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/laporanpic') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>PIC</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Aditional</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Pages
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/profile') ?>" class="nav-link">
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