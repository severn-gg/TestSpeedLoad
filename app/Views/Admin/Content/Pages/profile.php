<?php

/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('Admin/Content/master') ?>

<?= $this->section('content') ?>
<style>
    .image-wrapper {
        background-color: #fff;
        padding: 3% 5%;
        border-radius: 7px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .image-prof img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        cursor: pointer;
    }

    #file-path {
        display: none;
    }

    .wrapper h2 {
        margin-bottom: 20px;
    }

    .image-prof {
        position: relative;
    }

    .image-prof label {
        position: absolute;
        top: 115px;
        right: 10px;
        color: #fff;
        background-color: #1b74e4;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 20px;
        cursor: pointer;
        opacity: 1;
        pointer-events: none;
        transition: 0.2s;
    }

    .image-prof:hover label {
        pointer-events: all;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
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
                        <div class="image-wrapper">
                            <div class="image-prof">
                                <img src="">
                                <label for="file-path">
                                    <span><i class="bi bi-camera"></i></span>
                                </label>
                                <input type="file" name="prof_img" accept="image/jpeg, image/png, image/jpg" id="file-path" class="user-file">
                            </div>
                        </div>

                        <h3 class="profile-username text-center" id="nama_display"></h3>

                        <p class="text-muted text-center" id="jabatan_display"></p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="#logininfo" data-toggle="tab">login Info</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Riwayat Aktivis</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <form id="formEditProfile">
                                    <div class="form-group">
                                        <label for="inputNIA" class="form-label">Nomor Induk Aktivis</label>
                                        <input class="form-control" type="hidden" name="aktivisId">
                                        <input class="form-control" type="text" name="inputNIA">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNamaLengkap" class="form-label">Nama Lengkap</label>
                                        <input class="form-control" type="text" name="inputNamaLengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputJK" class="form-label">Select Jenis Kelamin</label>
                                        <select class="form-control" name="inputJK">
                                            <option value="">-- Pilih Gender --</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNoHP" class="form-label">No. HP</label>
                                        <input class="form-control" type="text" name="inputNoHP">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAlamatAsal" class="form-label">Alamat Asal</label>
                                        <input class="form-control" type="text" name="inputAlamatAsal">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-info" type="button">Edit</button>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </form>
                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                             <div class="tab-pane" id="logininfo">
                                <form id="formEditLogin" class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="user_id" class="form-control">
                                            <input type="hidden" name="aktivis_id" class="form-control">
                                            <input type="hidden" name="active" class="form-control">
                                            <input type="hidden" name="role_id" class="form-control">
                                            <input type="text" name="username" class="form-control" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                    </div>                                    
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button class="btn btn-info" type="button">Edit</button>
                                            <button class="btn btn-primary" type="submit">Save</button>
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
</div>
<!-- /.content-wrapper -->

<?= $this->endSection() ?>