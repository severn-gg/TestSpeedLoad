<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<?= $this->extend('PIC/Content/master') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Tiket On Progress</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tiket</li>
                    <li class="breadcrumb-item active">Detail On Progress</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the ticket to
                    test.
                </div>


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> HELPDESK KK
                                <small class="float-right">Tgl: 20-Mei-2024</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-9 invoice-col">
                            Dari
                            <address>
                                <strong>Kantor Sentral</strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                            <b>KS01SOFT</b><br>
                            <br>
                            <b>Kategori:</b> Software<br>
                            <b>Tgl Tiket:</b> 17-Mar-2024<br>
                            <b>Status:</b> On Progress
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <p class="lead">Timeline</p>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>17-Mar-2024</td>
                                        <td>Tiket Dibuat</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>17-Mar-2024</td>
                                        <td>Tiket Lulus Verifikasi</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>17-Mar-2024</td>
                                        <td>Tanggal Mulai Perbaikan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Deskripsi Persoalan:</p>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                handango imeem
                                plugg
                                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead">Terkait</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Nama Staf:</th>
                                        <td>Mariani Anti</td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan Staf: </th>
                                        <td>Kasir</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <p class="lead">File</p>
                            <a class="btn btn-info" target="_blank"
                                href="<?= base_url() ?>assets/dist/fileDoc/saldoakun.xls">
                                <i class="fas fa-download"> Download File Dokumen *if exist</i>
                            </a>
                        </div>
                        <!-- accepted payments column -->
                        <div class="col-12">
                            <p class="lead">Image</p>
                            <img class="img-fluid" src="<?= base_url() ?>assets/dist/img/photo1.png" alt="Photo">
                            <p></p>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="<?= base_url('validator/tiketonprogressprint') ?>" rel="noopener" target="_blank"
                                class="btn btn-primary">
                                <i class="fas fa-print"></i> Print
                            </a>

                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i
                                    class="bi bi-check-circle-fill"></i> Selesai</a>

                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- modal add -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="#" method="post" enctype="multipart/form-data" wire:submit.prevent="savePersonalData"
            onkeydown="return event.key != 'Enter';">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#123670; color:white;">
                    <h5 class="modal-title">Nyatakan Status On Progress</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">No. Tiket</label>
                        <div class="col-sm-9"> <input type="text" class="form-control" name="noTiket" value="KS01SOFT"
                                disabled> </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Branch Office</label>
                        <div class="col-sm-9"> <input type="text" class="form-control" name="branchOffice"
                                value="Kantor Sentral" disabled> </div>
                    </div>
                    <div class="row mb-3">
                        <h5 class="bg-success">Tandai Tiket Ini sebagai - Selesai Diperbaiki</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-dark" data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>