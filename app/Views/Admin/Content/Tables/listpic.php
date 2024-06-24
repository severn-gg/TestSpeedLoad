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
                <h1>List PIC</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">List PIC</li>
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
            <h3 class="card-title">List PIC</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 30%">
                            Nama PIC
                        </th>
                        <th>
                            Area / Wilayah
                        </th>
                        <th>
                            Divisi
                        </th>
                        <th>
                            Tgl Setting
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            <a>
                                <strong>Andreas Andi, S.Kom</strong>
                            </a>
                        </td>
                        <td>
                            <strong>Sintang 1</strong>
                        </td>
                        <td>
                            <strong>SOFTWARE</strong>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
                        </td>
                        <td class="project-actions text-right">
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#actionModal"><i
                                    class="bi bi-tools"></i></a>
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash">
                                </i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            <a>
                                <strong>Gregorius Niarwin, S.Kom</strong>
                            </a>
                        </td>
                        <td>
                            <strong>Sanggau-Pontianak</strong>
                        </td>
                        <td>
                            <strong>SOFTWARE</strong>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
                        </td>
                        <td class="project-actions text-right">
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#actionModal"><i
                                    class="bi bi-tools"></i></a>
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash">
                                </i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            <a>
                                <strong>Riyo Anggri, S.Kom</strong>
                            </a>
                        </td>
                        <td>
                            <strong>Melawi</strong>
                        </td>
                        <td>
                            <strong>SOFTWARE</strong>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
                        </td>
                        <td class="project-actions text-right">
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#actionModal"><i
                                    class="bi bi-tools"></i></a>
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash">
                                </i>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            4
                        </td>
                        <td>
                            <a>
                                <strong>Cika, S.Kom</strong>
                            </a>
                        </td>
                        <td>
                            <strong>Kapuas Hulu</strong>
                        </td>
                        <td>
                            <strong>SOFTWARE</strong>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
                        </td>
                        <td class="project-actions text-right">
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#actionModal"><i
                                    class="bi bi-tools"></i></a>
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash">
                                </i>
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->


<!-- Modal Ubah -->
<div class="modal fade" id="actionModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <form action="#" method="post" enctype="multipart/form-data" wire:submit.prevent="savePersonalData"
            onkeydown="return event.key != 'Enter';">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#123670; color:white;">
                    <h5 class="modal-title">Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Nama PIC</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputnamaPIC" value="Andreas Andi, S.Kom"
                                disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Area</label>
                        <div class="col-sm-8">
                            <select class="form-select" aria-label="Default select example" name="inputarea">
                                <option value="1">Sintang 1</option>
                                <option value="2">Sintang 2</option>
                                <option value="3">Sekadau</option>
                                <option value="4">Sanggau-Pontianak</option>
                                <option value="5">Kapuas Hulu</option>
                                <option value="5">Melawi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Divisi</label>
                        <div class="col-sm-8">
                            <select class="form-select" aria-label="Default select example" name="inputarea">
                                <option value="1">SOFTWARE</option>
                                <option value="2">HARDWARE</option>
                                <option value="3">NETWORK</option>
                                <option value="4">LKD - ATM</option>
                                <option value="5">LKD - KKD</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-dark" data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Apply</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Modal Ubah -->

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <form action="#" method="post" enctype="multipart/form-data" wire:submit.prevent="savePersonalData"
            onkeydown="return event.key != 'Enter';">
            <div class="modal-content">
                <div class="modal-header" style="background-color:red; color:white;">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Nama PIC</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputnamaPIC" value="Andreas Andi, S.Kom"
                                disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Area</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputArea" value="Sintang 1" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Divisi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inputdivisi" value="SOFTWARE" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-dark" data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection() ?>