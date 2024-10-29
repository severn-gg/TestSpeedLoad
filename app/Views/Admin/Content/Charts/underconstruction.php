<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>
<?= $this->extend('Admin/Content/master') ?>

<?= $this->section('content') ?>
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>404 Error Page <?php echo $submenu?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= site_url();?>/admin/dashboard">Home</a></li>
                <li class="breadcrumb-item">Charts</li>
                <li class="breadcrumb-item active"><?php echo $submenu?></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="error-page">
          <h2 class="headline text-warning"> 404</h2>

          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Laman tidak ditemukan.</h3>

            <p>
              Kami tidak dapat menyediakan laman yang anda tuju.
              Sementara itu, anda dapat menuju <a href="<?= site_url();?>/admin/dashboard">ke dashboard</a>
            </p>
            
          </div>
          <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
      </section>
      <!-- /.content -->
<?= $this->endSection() ?>