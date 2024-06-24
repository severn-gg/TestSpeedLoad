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
                <h1>Detail Departemen</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item">List Departemen</li>
                    <li class="breadcrumb-item active">Detail Departemen</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">Dept. IT</h3>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">

                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="pills-settings-tab" data-bs-toggle="pill"
                                    data-bs-target="#settings" type="button" role="tab" aria-controls="pills-settings"
                                    aria-selected="true">Settings</button>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            <div class="active tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputNamaDept" class="col-sm-3 col-form-label">Departemen</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="inputNamaDept"
                                                value="Dept. IT">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputAdmin" class="col-sm-3 col-form-label">Admin</label>
                                        <div class="col-sm-9">

                                            <select class="form-control form-control"
                                                aria-label="Default select example" name="inputAdmin">
                                                <option value="1">Yensi Kumala Sari, S.Kom</option>
                                                <option value="2">HENDRO</option>
                                                <option value="3">EGO</option>
                                                <option value="4">RIO</option>
                                                <option value="5">INDRA</option>
                                                <option value="6">CIKA</option>
                                                <option value="7">ANDI</option>
                                                <option value="8">TENDO</option>
                                                <option value="9">ABET</option>
                                                <option value="10">YANTO</option>
                                                <option value="11">RIDWAN</option>
                                                <option value="12">EVAN</option>
                                                <option value="13">CANDRA</option>
                                                <option value="14">ATOT</option>
                                                <option value="15">Julianus Eki</option>
                                                <option value="16">Regina Rustini</option>
                                                <option value="17">Kristika Maria</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputUsername" class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="inputUsername" value="Regina">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="inputPassword"
                                                value="Regina123!">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputStatusActive" class="col-sm-3 col-form-label">Status
                                            Aktif</label>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="inputStatusActive1"
                                                    name="inputStatusActive">
                                                <label class="form-check-label" for="inputStatusActive1">
                                                    Belum Aktif
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="inputStatusActive2"
                                                    name="inputStatusActive">
                                                <label class="form-check-label" for="inputStatusActive2">
                                                    Set Aktif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-9">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


<?= $this->endSection() ?>