<?= $this->extend('BO/Content/master') ?>
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
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box shadow">
                    <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Tiket</span>
                        <span class="info-box-number">150</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box shadow">
                    <span class="info-box-icon bg-success"><i class="far fa-copy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sukses / Finish</span>
                        <span class="info-box-number">150</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box shadow">
                    <span class="info-box-icon bg-danger"><i class="far fa-copy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Hold - perlu revisi</span>
                        <span class="info-box-number">150</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>