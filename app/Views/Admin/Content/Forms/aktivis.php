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
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
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

                <!-- form start -->
                <form id="forminputaktivis">
                    <div class="card card-primary">
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
                        </div>
                    </div>
                    <div class="card card-primary">
                        <!-- /.card-body -->
                        <div class="card-header">
                            Kantor Aktivis
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputKantor" class="form-label">Select Kantor</label>
                                <select type="select" class="form-control select2" name="inputKantor">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputNoHP" class="form-label">Tanggal Mulai</label>
                                <input class="form-control" type="date" name="inputTglMulai">
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <!-- /.card-body -->
                        <div class="card-header">
                            Jabatan Aktivis
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputJabatan" class="form-label">Select Jabatan</label>
                                <select type="select" class="form-control select2" name="inputJabatan">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputNoHP" class="form-label">Tanggal Mulai</label>
                                <input class="form-control" type="date" name="inputTglMulaiJabat">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary" id="btnSubmit">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection() ?>