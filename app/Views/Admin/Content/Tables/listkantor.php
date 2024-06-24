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
                <h1>List Kantor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">List Kantor</li>
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
            <h3 class="card-title">List Kantor</h3>

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
            <table id="tabelDataKantor" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th>
                            Nama Kantor
                        </th>
                        <th>
                            Nama Admin
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status Aktif
                        </th>
                        <th>
                            Tgl Input
                        </th>
                        <th>
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
                                <strong>Branch Office Senaning</strong>
                            </a>
                        </td>
                        <td>
                            <a>
                                <strong>Abet Nego</strong>
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Belum Aktif</span>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="<?= base_url('admin/detailkantor') ?>">
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
                                <strong>Branch Office Kelam</strong>
                            </a>
                        </td>
                        <td>
                            <a>
                                <strong>Abet Nego</strong>
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge bg-success">Aktif</span>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
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
                                <strong>Branch Office Nanga Mau</strong>
                            </a>
                        </td>
                        <td>
                            <a>
                                <strong>Abet Nego</strong>
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Belum Aktif</span>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
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
                                <strong>Branch Office Tapang Pulau</strong>
                            </a>
                        </td>
                        <td>
                            <a>
                                <strong>Abet Nego</strong>
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Belum Aktif</span>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            15-Mar-2024
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
                                <strong>Branch Office Kantor Pusat</strong>
                            </a>
                        </td>
                        <td>
                            <a>
                                <strong>Abet Nego</strong>
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Belum Aktif</span>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            15-Mar-2024
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
                                <strong>Branch Office Kantor Sentral</strong>
                            </a>
                        </td>
                        <td>
                            <a>
                                <strong>Abet Nego</strong>
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Belum Aktif</span>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            15-Mar-2024
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
                                <strong>Branch Office Rumah Sepan</strong>
                            </a>
                        </td>
                        <td>
                            <a>
                                <strong>Abet Nego</strong>
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Belum Aktif</span>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            15-Mar-2024
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
                                <strong>Branch Office Sanggau</strong>
                            </a>
                        </td>
                        <td>
                            <a>
                                <strong>Abet Nego</strong>
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Belum Aktif</span>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            15-Mar-2024
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
                                <strong>Branch Office Simpang Pinoh</strong>
                            </a>
                        </td>
                        <td>
                            <a>
                                <strong>Abet Nego</strong>
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Belum Aktif</span>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            15-Mar-2024
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
                                <strong>Branch Office Putussibau</strong>
                            </a>
                        </td>
                        <td>
                            <a>
                                <strong>Abet Nego</strong>
                            </a>
                        </td>
                        <td class="project-state">
                            <span class="badge bg-warning">Belum Aktif</span>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            15-Mar-2024
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-eye">
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


<?= $this->endSection() ?>