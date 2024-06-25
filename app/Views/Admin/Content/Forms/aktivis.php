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
                <h1 class="m-0">Input Aktivis</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Input Aktivis</li>
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
                        <h3 class="card-title">Form Input Aktivis</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="forminputaktivis">
                        <div class="card-header">
                            Profil Aktivis
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputNIA" class="form-label">Nomor Induk Aktivis</label>
                                <input class="form-control" type="text" name="inputNIA">
                            </div>
                            <div class="form-group">
                                <label for="inputNamaLengkap" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" name="inputNamaLengkap">
                            </div>
                            <div class="form-group">
                                <label for="inputJK" class="form-label">Select Jenis Kelamin</label>
                                <select type="select" class="form-control" name="inputJK">
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
                        </div>
                        <!-- /.card-body -->
                        <div class="card-header">
                            Kantor Aktivis
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputKantor" class="form-label">Select Kantor</label>
                                <select type="select" class="form-control" name="inputKantor">
                                    <option value="Head Office">Head Office</option>
                                    <option value="Dept. IT">Dept. IT</option>
                                    <option value="Dept. RISK">Dept. RISK</option>
                                    <option value="Dept. MPRRD">Dept. MPRRD</option>
                                    <option value="Dept. CCD">Dept. CCD</option>
                                    <option value="Dept. FINANCE">Dept. FINANCE</option>
                                    <option value="Dept. HRD">Dept. HRD</option>
                                    <option value="Dept. LOGISTIC">Dept. LOGISTIC</option>
                                    <option value="Dept. Kantor Sentral">Kantor Sentral</option>
                                    <option value="Dept. FINANCE">Dll</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputNoHP" class="form-label">Tanggal Mulai</label>
                                <input class="form-control" type="date" name="inputTglMulai">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-header">
                            Jabatan Aktivis
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputJabatan" class="form-label">Select Jabatan</label>
                                <select type="select" class="form-control" name="inputJabatan">
                                    <option value="Head Office">DEM</option>
                                    <option value="Dept. IT">Admin Departemen</option>
                                    <option value="Dept. RISK">Staf</option>
                                    <option value="Dept. MPRRD">Manager</option>
                                    <option value="Dept. CCD">Akuntan</option>
                                    <option value="Dept. FINANCE">Kasir</option>
                                    <option value="Dept. HRD">Field Officer</option>
                                    <option value="Dll">Dll</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputNoHP" class="form-label">Tanggal Mulai</label>
                                <input class="form-control" type="date" name="inputTglMulai">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-header">
                            User Login Aktivis
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputRole" class="form-label">Select Role</label>
                                <select type="select" class="form-control" name="inputRole">
                                    <option value="Dll">Dll</option>
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
                                    <option value="active">Aktif</option>
                                    <option value="tidakActive">Tidak Aktif</option>
                                </select>
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