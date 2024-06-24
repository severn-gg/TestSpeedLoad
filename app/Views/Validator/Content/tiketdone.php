<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('Validator/Content/master') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tiket Diverifikasi</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tiket</li>
                    <li class="breadcrumb-item active">Diverifikasi</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tiket Diverifikasi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabelDataTiketDiverifikasi" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th>
                                        No. Tiket
                                    </th>
                                    <th>
                                        Branch Office
                                    </th>
                                    <th>
                                        Tgl Tiket
                                    </th>
                                    <th>
                                        Tgl Verifikasi
                                    </th>
                                    <th>
                                        Hasil Keputusan
                                    </th>
                                    <th></th>
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
                                            Software
                                        </small>
                                    </td>
                                    <td>Kantor Sentral</td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Lulus</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketdetail') ?>">
                                            <i class="bi bi-eye">
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
                                            <strong>KP01SOFT</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Software
                                        </small>
                                    </td>
                                    <td>Kantor Pusat</td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Lulus</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketdetail') ?>">
                                            <i class="bi bi-eye">
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
                                            <strong>SU01SOFT</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Software
                                        </small>
                                    </td>
                                    <td>Sungai Utik</td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Lulus</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketdetail') ?>">
                                            <i class="bi bi-eye">
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
                                            <strong>PTK01SOFT</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Software
                                        </small>
                                    </td>
                                    <td>PONTIANAK</td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Lulus</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketdetail') ?>">
                                            <i class="bi bi-eye">
                                            </i>

                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        5
                                    </td>
                                    <td>
                                        <a>
                                            <strong>PTK01SOFT</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Software
                                        </small>
                                    </td>
                                    <td>PONTIANAK</td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketdetail') ?>">
                                            <i class="bi bi-eye">
                                            </i>

                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        6
                                    </td>
                                    <td>
                                        <a>
                                            <strong>BSM01SOFT</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Software
                                        </small>
                                    </td>
                                    <td>BATU SADO MACAN</td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Lulus</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketdetail') ?>">
                                            <i class="bi bi-eye">
                                            </i>

                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        7
                                    </td>
                                    <td>
                                        <a>
                                            <strong>SGU01SOFT</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Software
                                        </small>
                                    </td>
                                    <td>SANGGAU</td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketdetail') ?>">
                                            <i class="bi bi-eye">
                                            </i>

                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        8
                                    </td>
                                    <td>
                                        <a>
                                            <strong>NGM01SOFT</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Software
                                        </small>
                                    </td>
                                    <td>NANGA MAU</td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Lulus</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketdetail') ?>">
                                            <i class="bi bi-eye">
                                            </i>

                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        9
                                    </td>
                                    <td>
                                        <a>
                                            <strong>TP01SOFT</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Software
                                        </small>
                                    </td>
                                    <td>TAPANG PULAU</td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Lulus</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketdetail') ?>">
                                            <i class="bi bi-eye">
                                            </i>

                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <a>
                                            <strong>PTK01SOFT</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Software
                                        </small>
                                    </td>
                                    <td>PONTIANAK</td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketdetail') ?>">
                                            <i class="bi bi-eye">
                                            </i>

                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        11
                                    </td>
                                    <td>
                                        <a>
                                            <strong>BJI01SOFT</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Software
                                        </small>
                                    </td>
                                    <td>BINJAI</td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Lulus</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketdetail') ?>">
                                            <i class="bi bi-eye">
                                            </i>

                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th>
                                        No. Tiket
                                    </th>
                                    <th>
                                        Branch Office
                                    </th>
                                    <th>
                                        Tgl Tiket
                                    </th>
                                    <th>
                                        Tgl Verifikasi
                                    </th>
                                    <th>
                                        Hasil Keputusan
                                    </th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<?= $this->endSection() ?>