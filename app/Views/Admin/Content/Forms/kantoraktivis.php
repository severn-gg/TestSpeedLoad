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
                <h1 class="m-0">Set Kantor Aktivis</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Set Kantor Aktivis</li>
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
                        <h3 class="card-title">Set Kantor Aktivis</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="forminputaktivis">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputAktivis" class="form-label">Select Aktivis</label>
                                <select type="select" class="form-control" name="inputAktivis">
                                    <option value="Dept. FINANCE">Dll</option>
                                </select>
                            </div>
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