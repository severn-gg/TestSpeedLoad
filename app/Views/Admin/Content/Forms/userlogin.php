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
                <h1 class="m-0">Set User Login Aktivis</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Set User Login Aktivis</li>
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
                        <h3 class="card-title">Set User Login Aktivis</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="formuserloginaktivis">
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control" type="hdiden" name="inputIdLog">
                                <label for="inputAktivis" class="form-label">Select Aktivis</label>
                                <select type="select" class="form-control select2" name="inputAktivis">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputRole" class="form-label">Select Role</label>
                                <select type="select" class="form-control select2" name="inputRole">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputUsername" class="form-label">Username</label>
                                <input class="form-control" type="text" name="inputUsername">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="form-label">Password</label>
                                <input class="form-control" type="text" name="inputPassword">
                            </div>
                            <div class="form-group">
                                <label for="inputStatusActive" class="form-label">Select Status Active</label>
                                <select type="select" class="form-control" name="inputStatusActive">
                                    <option value="1">Tidak Aktif</option>
                                    <option value="2">Aktif</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
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