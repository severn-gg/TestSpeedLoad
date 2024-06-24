<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>
<?= $this->extend('Admin/Content/master') ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Input Departemen</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Input Departemen</li>
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
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Input Departemen</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="forminputdepartemen">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="inputNamaDepartemen" class="form-label">Nama Departemen</label>
                                <input class="form-control" type="text" name="inputNamaDepartemen">
                            </div>
                            <div class="form-group">
                                <label for="inputNamaAdmin" class="form-label">Nama Lengkap Admin</label>
                                <input class="form-control" type="text" name="inputNamaAdmin">
                            </div>
                            <div class="form-group">
                                <label for="inputUsername" class="form-label">Username</label>
                                <input class="form-control" type="text" name="inputUsername">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input class="form-control" type="text" name="inputPassword">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary" id="btnSubmit">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection() ?>