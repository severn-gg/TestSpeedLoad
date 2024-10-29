<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('Validator/Content/master') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tiket Diverifikasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url();?>/validator/dashboard">Home</a></li>
                    <li class="breadcrumb-item">Tiket</li>
                    <li class="breadcrumb-item active">Diverifikasi</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tiket Diverifikasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabelDataTiketDiverifikasi" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        No. Tiket
                                    </th>
                                    <th>
                                        Branch Office
                                    </th>
                                    <th>
                                        Tgl Tiket
                                    </th>
                                    <th>
                                        Tgl Verifikasi
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<?= $this->endSection() ?>