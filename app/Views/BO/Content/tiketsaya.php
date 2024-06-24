<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('BO/Content/master') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tiket Saya</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tiket Saya</li>
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
                        <h3 class="card-title">Tiket Saya</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabelDataTiket" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th>No. Tiket</th>
                                    <th>Kategori</th>
                                    <th>Tgl</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Lampiran File</th>
                                    <th class="text-center">Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>KS01SOFT</td>
                                    <td>Software</td>
                                    <td>23 APRIL 2024</td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/img/photo2.png">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/fileDoc/saldoakun.xls">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-warning">Selesai</span></td>
                                    <td>
                                        <a class="btn btn-info" target="_blank"
                                            href="<?= base_url('bo/tiketkonfirmasidetail') ?>">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>KS01SOFT</td>
                                    <td>Software</td>
                                    <td>23 APRIL 2024</td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/img/photo2.png">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/fileDoc/saldoakun.xls">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-info">Open</span></td>
                                    <td>
                                        <a class="btn btn-info" target="_blank" href="#">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2.</td>
                                    <td>BO01SOFT23</td>
                                    <td>Software</td>
                                    <td>23 APRIL 2024</td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/img/photo2.png">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/fileDoc/saldoakun.xls">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-warning">Verified</span></td>
                                    <td>
                                        <a class="btn btn-info" target="_blank" href="#">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>BO01HARD23</td>
                                    <td>Hardware</td>
                                    <td>23 APRIL 2024</td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/img/photo2.png">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/fileDoc/saldoakun.xls">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-warning">On Progress</span></td>
                                    <td>
                                        <a class="btn btn-info" target="_blank" href="#">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>BO01KKD23</td>
                                    <td>LKD - KKD</td>
                                    <td>23 APRIL 2024</td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/img/photo2.png">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/fileDoc/saldoakun.xls">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-danger">On Hold</span></td>
                                    <td>
                                        <a class="btn btn-danger" target="_blank" href="#">
                                            <i class="bx bxs-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>BO01SOFT23</td>
                                    <td>Software</td>
                                    <td>23 APRIL 2024</td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/img/photo2.png">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="gallery">
                                            <a class="btn btn-info" target="_blank"
                                                href="<?= base_url() ?>assets/dist/fileDoc/saldoakun.xls">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success">Finished</span></td>
                                    <td>
                                        <a class="btn btn-info" target="_blank" href="#">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th>No. Tiket</th>
                                    <th>Kategori</th>
                                    <th>Tgl</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Lampiran File</th>
                                    <th class="text-center">Status</th>
                                    <th>Action</th>
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