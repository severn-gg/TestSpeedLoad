<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('Admin/Content/master') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List Kantor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">List Kantor</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List Kantor</h3>
        </div>
        <div class="card-body">
            <table id="tabelDataKantor" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th>
                            Nama Kantor
                        </th>
                        <th>
                            Alamat
                        </th>
                        <th>
                            Area
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

</section>
<!-- /.content -->


<?= $this->endSection() ?>