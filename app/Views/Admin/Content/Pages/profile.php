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
                    <li class="breadcrumb-item"><a href="<?= site_url();?>/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
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
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                    <span class="bg-danger">
                                        10 Feb. 2014
                                    </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                    <i class="fas fa-envelope bg-primary"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                        quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                    <i class="fas fa-user bg-info"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend
                                        request
                                        </h3>
                                    </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                    <i class="fas fa-comments bg-warning"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                        <div class="timeline-body">
                                        Take me to your leader!
                                        Switzerland is small and neutral!
                                        We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                    <span class="bg-success">
                                        3 Jan. 2014
                                    </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                    <i class="fas fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                        <div class="timeline-body">
                                        <img src="https://placehold.it/150x100" alt="...">
                                        <img src="https://placehold.it/150x100" alt="...">
                                        <img src="https://placehold.it/150x100" alt="...">
                                        <img src="https://placehold.it/150x100" alt="...">
                                        </div>
                                    </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <div>
                                    <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
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