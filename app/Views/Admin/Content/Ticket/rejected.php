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
                <h1>Tiket Ditolak</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tiket</li>
                    <li class="breadcrumb-item active">Ditolak</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Tiket Ditolak</h3>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-body">
                        <table id="tabelDataTiketReject" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th>
                                        No. Tiket
                                    </th>
                                    <th>
                                        Members
                                    </th>
                                    <th>
                                        Deskripsi
                                    </th>
                                    <th>
                                        Tgl Tiket
                                    </th>
                                    <th class="text-center">
                                        Status
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
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">Kantor Sentral</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Dept. Risk</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Andreas Andi</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project-state">
                                        <span class="badge bg-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm"
                                            href="<?= base_url('admin/ticketditolakdetail') ?>">
                                            <i class="fas fa-eye">
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
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">Kantor Pusat</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Dept. Risk</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Hendro</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project-state">
                                        <span class="badge bg-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
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
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">Sungai Utik</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Dept. Risk</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Gregorius Niarwin</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        17-Mar-2024
                                    </td>
                                    <td class="project-state">
                                        <span class="badge bg-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
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
                                            <strong>PTK03HARD</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Hardware
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">PONTIANAK</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Dept. IT</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Goprid Tendo Padagi</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-state">
                                        <span class="badge bg-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
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
                                            <strong>PTK02HARD</strong>
                                        </a>
                                        <br />
                                        <small>
                                            Hardware
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">PONTIANAK</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Dept. IT</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Goprid Tendo Padagi</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-state">
                                        <span class="badge bg-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
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
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">BATU SADO MACAN</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Dept. IT</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Goprid Tendo Padagi</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-state">
                                        <span class="badge bg-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
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
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">SANGGAU</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Dept. IT</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">RIDWAN</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-state">
                                        <span class="badge bg-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
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
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">NANGA MAU</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Dept. IT</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Goprid Tendo Padagi</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-state">
                                        <span class="badge bg-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
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
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">TAPANG PULAU</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Dept. IT</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Goprid Tendo Padagi</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-state">
                                        <span class="badge bg-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
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
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">PONTIANAK</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Dept. IT</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Goprid Tendo Padagi</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-state">
                                        <span class="badge bg-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
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
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#">BINJAI</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Dept. IT</a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">Goprid Tendo Padagi</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        Toggle a working modal demo by clicking the button below. It will slide down and
                                        fade in from the top of the page.
                                    </td>
                                    <td class="project_progress">
                                        <i class="fas fa-clock">
                                        </i>
                                        15-Mar-2024
                                    </td>
                                    <td class="project-state">
                                        <span class="badge bg-danger">Ditolak</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-eye">
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
                                        Tiket
                                    </th>
                                    <th>
                                        Members
                                    </th>
                                    <th>
                                        Tgl Tiket
                                    </th>
                                    <th>
                                        Deskripsi
                                    </th>
                                    <th class="text-center">
                                        Status
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