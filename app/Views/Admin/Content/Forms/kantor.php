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
                <h1 class="m-0">Input Kantor Cabang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Input Kantor Cabang</li>
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
                        <h3 class="card-title">Form Input Kantor (Branch Office)</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="forminputkantor">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="inputNamaKantor" class="form-label">Nama Kantor</label>
                                <input class="form-control" type="text" name="inputNamaKantor">
                            </div>
                            <div class="form-group">
                                <label for="inputAlamatKantor" class="form-label">Alamat Kantor</label>
                                <input class="form-control" type="text" name="inputAlamatKantor">
                            </div>
                            <div class="form-group">
                                <label for="inputNoOfficial" class="form-label">No. HP Official</label>
                                <input class="form-control" type="text" name="inputNoOfficial">
                            </div>
                            <div class="form-group">
                                <label for="inputArea" class="form-label">Area</label>
                                <select type="select" class="form-control" name="inputArea">
                                    <option value="Laki-laki">Sekadau</option>
                                    <option value="Perempuan">Sintang 1, dll</option>
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