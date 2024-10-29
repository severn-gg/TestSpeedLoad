<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('Admin/Content/master') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
        <p>Admin Helpdesk</p>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">          
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?php echo $dataAktivis;?></h3>

            <p>Aktivis Terdaftar</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="<?= site_url(); ?>/admin/viewaktivis" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>       
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3><?php echo $dataLogin;?></h3>

            <p>User Login Aktivis</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="<?= site_url(); ?>/admin/viewlogin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>
      </div>
      <!-- ./col -->

      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $dataTiket;?></h3>

            <p>Tiket Diantrikan</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="<?= site_url(); ?>/admin/viewticket" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>
      </div>
      <!-- ./col -->
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $dataTikets?></h3>

            <p>Tiket Selesai</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="<?= site_url(); ?>/admin/viewticket" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>