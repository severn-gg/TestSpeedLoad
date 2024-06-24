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
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <h5 class="mb-2">Ticket Count</h5>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box shadow">
          <span class="info-box-icon bg-info"><i class="fas fa-file-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Tiket</span>
            <span class="info-box-number">150</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box shadow">
          <span class="info-box-icon bg-warning"><i class="fas fa-file-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Ditahan</span>
            <span class="info-box-number">150</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box shadow">
          <span class="info-box-icon bg-success"><i class="fas fa-file-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Selesaikan</span>
            <span class="info-box-number">150</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box shadow">
          <span class="info-box-icon bg-danger"><i class="fas fa-file-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Ditolak</span>
            <span class="info-box-number">150</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
    <!-- /.row -->

    <!-- =========================================================== -->
    <h5 class="mb-2">Info Ticket by Category</h5>

    <div class="row">
      <div class="col-md-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Software</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Tiket</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-warning"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ditahan</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-success"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Selesaikan</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-danger"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ditolak</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Hardware</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Tiket</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-warning"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ditahan</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-success"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Selesaikan</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-danger"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ditolak</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Network</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Tiket</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-warning"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ditahan</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-success"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Selesaikan</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-danger"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ditolak</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">ATM</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Tiket</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-warning"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ditahan</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-success"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Selesaikan</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-danger"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ditolak</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-md-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">KKD</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-info"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Tiket</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-warning"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ditahan</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-success"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Selesaikan</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-12">
              <div class="info-box shadow">
                <span class="info-box-icon bg-danger"><i class="fas fa-file-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ditolak</span>
                  <span class="info-box-number">150</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
    <!--  -->
    <!-- Small boxes (Stat box) -->

    <hr>

    <!-- =========================================================== -->
    <h5 class="mb-2">Info Users</h5>

    <div class="row">

      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>135</h3>

            <p>User Kantor</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>
        <div class="small-box bg-success">
          <div class="inner">
            <h3>95</h3>

            <p>Status Aktif</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>30</h3>

            <p>Status Non-Aktif</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>

      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>5</h3>

            <p>User Departemen</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>
        <div class="small-box bg-success">
          <div class="inner">
            <h3>5</h3>

            <p>Status Aktif</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>0</h3>

            <p>Status Non-Aktif</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>

      </div>
      <!-- ./col -->

      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>15</h3>

            <p>User PIC</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>
        <div class="small-box bg-success">
          <div class="inner">
            <h3>95</h3>

            <p>Status Aktif</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>30</h3>

            <p>Status Non-Aktif</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>