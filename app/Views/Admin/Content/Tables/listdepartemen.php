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
                <h1>List Departemen</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">List Departemen</li>
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
            <h3 class="card-title">List Departemen</h3>

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
                            Nama Departemen
                        </th>
                        <th>
                            Tgl Input
                        </th>
                        <th>
                            Admin
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
                                <strong>Dept. IT</strong>
                            </a>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
                        </td>
                        <td>
                            <strong>Yensi Kumala Sari, S.Kom</strong>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="<?= base_url('admin/detaildepartemen') ?>">
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
                                <strong>Dept. Risk</strong>
                            </a>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
                        </td>
                        <td>
                            <strong>Julianus Eki</strong>
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
                                <strong>Dept. Kredit</strong>
                            </a>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            17-Mar-2024
                        </td>
                        <td>
                            <strong>Kristika Maria</strong>
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
                                <strong>Dept. Keuangan</strong>
                            </a>
                        </td>
                        <td class="project_progress">
                            <i class="fas fa-clock">
                            </i>
                            15-Mar-2024
                        </td>
                        <td>
                            <strong>Regina Rustini</strong>
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