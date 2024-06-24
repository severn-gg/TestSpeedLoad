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
                <h1 class="m-0">Laporan Tiket</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Charts</li>
                    <li class="breadcrumb-item active">Laporan by Tiket</li>
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
            <!-- Application buttons -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Export by</h3>
                </div>
                <div class="card-body">
                    <a class="btn bg-primary" href="#" data-bs-toggle="modal" data-bs-target="#tiketModal">
                        <i class="bx bxs-tag"></i> Status
                    </a>
                    <a class="btn bg-primary" href="#" data-bs-toggle="modal" data-bs-target="#kategoriModal">
                        <i class="bx bxs-category"></i> Kategori
                    </a>
                    <a class="btn bg-primary" href="#" data-bs-toggle="modal" data-bs-target="#kantorModal">
                        <i class="bx bxs-institution"></i> Kantor
                    </a>
                    <a class="btn bg-primary" href="#" data-bs-toggle="modal" data-bs-target="#departemenModal">
                        <i class="bx bxs-select-multiple"></i> Verifikasi Departemen
                    </a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Modal Tiket -->
<div class="modal fade" id="tiketModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <form action="<?= base_url('admin/laporantiket/ByStatus') ?>" id="formExportTiketByStatus">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#123670; color:white;">
                    <h5 class="modal-title">Export By Status Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Mulai Dari Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="fromDate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Sampai Tangal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="toDate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control" aria-label="Default select example"
                                name="statusTiket">
                                <option value="1">Semua Status</option>
                                <option value="2">Ditahan</option>
                                <option value="3">Dicek</option>
                                <option value="4">Diselesaikan</option>
                                <option value="5">Ditolak</option>
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
<!-- Akhir Modal Tiket -->

<!-- Modal Kategori -->
<div class="modal fade" id="kategoriModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <form action="<?= base_url('admin/laporantiket/ByKategori') ?>" id="formExportTiketByKategori">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#123670; color:white;">
                    <h5 class="modal-title">Export By Kategori Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Mulai Dari Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="fromDate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Sampai Tangal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="toDate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control" aria-label="Default select example"
                                name="kategoriTiket">
                                <option value="1">Semua Kategori</option>
                                <option value="2">Software</option>
                                <option value="3">Hardware</option>
                                <option value="4">Network</option>
                                <option value="5">LKD - ATM</option>
                                <option value="6">LKD - KKD</option>
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
<!-- Akhir Modal Kategori -->

<!-- Modal Kantor -->
<div class="modal fade" id="kantorModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <form action="<?= base_url('admin/laporantiket/ByKantor') ?>" id="formExportTiketByKantor">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#123670; color:white;">
                    <h5 class="modal-title">Export By Branch Office</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Mulai Dari Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="fromDate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Sampai Tangal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="toDate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Kantor</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control" aria-label="Default select example"
                                name="kantorTiket">
                                <option value="1">Semua Kantor</option>
                                <option value="2">Kantor Pusat</option>
                                <option value="3">Kantor Sentral</option>
                                <option value="4">Simpang Pinoh</option>
                                <option value="5">Rumah Sepan</option>
                                <option value="6">Sanggau</option>
                                <option value="7">Pontianak</option>
                                <option value="8">Siantan</option>
                                <option value="9">Rumah Punyong</option>
                                <option value="10">Nanga Mau</option>
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
<!-- Akhir Modal Kantor -->


<!-- Modal Departemen -->
<div class="modal fade" id="departemenModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <form action="<?= base_url('admin/laporantiket/ByVerifikator') ?>">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#123670; color:white;">
                    <h5 class="modal-title">Export By Verifikasi Departemen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Mulai Dari Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="fromDate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Sampai Tangal</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="toDate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Departemen</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control" aria-label="Default select example"
                                name="departemenTiket">
                                <option value="1">SemuaDepartemen</option>
                                <option value="2">Dept. IT</option>
                                <option value="3">Dept. Risk</option>
                                <option value="4">Dept. Kredit</option>
                                <option value="5">Dept. Keuangan</option>
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
<!-- Akhir Modal Departemen -->

<?= $this->endSection() ?>