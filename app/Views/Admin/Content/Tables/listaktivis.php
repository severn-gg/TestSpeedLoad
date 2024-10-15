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
                <h1 class="m-0">Daftar Aktivis</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">List Aktivis</li>
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
                        <h3 class="card-title"><a type="button" href="<?= site_url(); ?>/admin/forminputaktivis" class="btn btn-sm btn-primary"><i class="bi bi-person-plus"></i> Tambah Aktivis</a></h3>                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabelDataAktivis" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th>
                                        NIA
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Jabatan
                                    </th>
                                    <th>
                                        Branch Office
                                    </th>
                                    <th>
                                        Asal
                                    </th>
                                    <th></th>
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