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
                <h1>On Progress</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tiket</li>
                    <li class="breadcrumb-item active">On Progress</li>
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
            <h3 class="card-title">Tiket On Progress</h3>

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
                        <th style="width: 20%">
                            Tiket
                        </th>
                        <th style="width: 30%">
                            Members
                        </th>
                        <th>
                            Tgl Tiket
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
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
                                <strong>KS01SOFT</strong>
                            </a>
                            <br />
                            <small>
                                Clean Database
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar.png">
                                    <a href="#">Kantor Sentral</a>
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar2.png">
                                    <a href="#">Dept. Risk</a>
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar3.png">
                                    <a href="#">Andreas Andi</a>
                                </li>
                            </ul>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Dicek</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="<?= base_url('admin/ticketdetail') ?>">
                                <i class="fas fa-eye">
                                </i>
                                Details
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            <a>
                                <strong>KP01SOFT</strong>
                            </a>
                            <br />
                            <small>
                                Clean Database
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar.png">
                                    <a href="#">Kantor Pusat</a>
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar2.png">
                                    <a href="#">Dept. Risk</a>
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar3.png">
                                    <a href="#">Hendro</a>
                                </li>
                            </ul>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Dicek</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-eye">
                                </i>
                                Details
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            <a>
                                <strong>SU01SOFT</strong>
                            </a>
                            <br />
                            <small>
                                Clean Database
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar.png">
                                    <a href="#">Sungai Utik</a>
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar2.png">
                                    <a href="#">Dept. Risk</a>
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar3.png">
                                    <a href="#">Gregorius Niarwin</a>
                                </li>
                            </ul>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Dicek</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-eye">
                                </i>
                                Details
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            4
                        </td>
                        <td>
                            <a>
                                <strong>PTK01HARD</strong>
                            </a>
                            <br />
                            <small>
                                Mesin Antrian
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar.png">
                                    <a href="#">PONTIANAK</a>
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar2.png">
                                    <a href="#">Dept. IT</a>
                                </li>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar"
                                        src="<?= base_url() ?>assets/dist/img/avatar3.png">
                                    <a href="#">Goprid Tendo Padagi</a>
                                </li>
                            </ul>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            15-Mar-2024
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Dicek</span>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-eye">
                                </i>
                                Details
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


<?= $this->endSection() ?>