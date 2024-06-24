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
                <h1 class="m-0">Tiket</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tiket</li>
                    <li class="breadcrumb-item active">Masuk</li>
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
                        <h3 class="card-title">Tiket Masuk</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabelDataTiketMasuk" class="table table-bordered table-striped">
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
                                        Deskripsi
                                    </th>
                                    <th>
                                        Tgl Tiket
                                    </th>
                                    <th>Verif</th>
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
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketverifikasi') ?>">
                                            <i class="bi bi-check-circle-fill">
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
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketverifikasi') ?>">
                                            <i class="bi bi-check-circle-fill">
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
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketverifikasi') ?>">
                                            <i class="bi bi-check-circle-fill">
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
                                            <strong>PTK01HARD</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Hardware
                                        </small>
                                    </td>
                                    <td>PONTIANAK</td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketverifikasi') ?>">
                                            <i class="bi bi-check-circle-fill">
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
                                            <strong>PTK01HARD</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Hardware
                                        </small>
                                    </td>
                                    <td>PONTIANAK</td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketverifikasi') ?>">
                                            <i class="bi bi-check-circle-fill">
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
                                            <strong>BSM01HARD</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Hardware
                                        </small>
                                    </td>
                                    <td>BATU SADO MACAN</td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketverifikasi') ?>">
                                            <i class="bi bi-check-circle-fill">
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
                                            <strong>SGU01NET</strong>
                                        </a>
                                        <br />
                                        <small>
                                            NETWORK
                                        </small>
                                    </td>
                                    <td>SANGGAU</td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketverifikasi') ?>">
                                            <i class="bi bi-check-circle-fill">
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
                                            <strong>NGM01HARD</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Mesin Antrian
                                        </small>
                                    </td>
                                    <td>NANGA MAU</td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketverifikasi') ?>">
                                            <i class="bi bi-check-circle-fill">
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
                                            <strong>TP01NET</strong>
                                        </a>
                                        <br />
                                        <small>
                                            NETWORK
                                        </small>
                                    </td>
                                    <td>TAPANG PULAU</td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketverifikasi') ?>">
                                            <i class="bi bi-check-circle-fill">
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
                                            <strong>PTK01HARD</strong>
                                        </a>
                                        <br />
                                        <small>
                                            HARDWARE
                                        </small>
                                    </td>
                                    <td>PONTIANAK</td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketverifikasi') ?>">
                                            <i class="bi bi-check-circle-fill">
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
                                            <strong>BJI01HARD</strong>
                                        </a>
                                        <br />
                                        <small>
                                            HARDWARE
                                        </small>
                                    </td>
                                    <td>BINJAI</td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-success btn-sm"
                                            href="<?= base_url('validator/tiketverifikasi') ?>">
                                            <i class="bi bi-check-circle-fill">
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
                                        Deskripsi
                                    </th>
                                    <th>
                                        Tgl Tiket
                                    </th>
                                    <th>Verif</th>
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