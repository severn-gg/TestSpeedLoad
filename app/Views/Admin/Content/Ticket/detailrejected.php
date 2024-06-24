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
                <h1>Detail Rejected Tiket</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tiket</li>
                    <li class="breadcrumb-item active">Detail Rejected</li>
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
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to
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
                        <div class="col-sm-3 invoice-col">
                            Dari
                            <address>
                                <strong>Kantor Sentral</strong><br>
                                Persoalan: Clean Database
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                            Verifikasi
                            <address>
                                <strong>Dept. Risk</strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                            Untuk
                            <address>
                                <strong>Andreas Andi</strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                            <b>KS01SOFT</b><br>
                            <br>
                            <b>Kategori:</b> Software<br>
                            <b>Tgl Tiket:</b> 17-Mar-2024<br>
                            <b>Urgency:</b> Medium<br>
                            <b>Status:</b> Ditolak
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 invoice-col">
                            Alasan penolakan
                            <address>
                                <strong>Menyalahi SOP</strong><br>
                                Detail: Clean Database tidak diijinkan dalam perubahan transaksi ini
                            </address>
                        </div>
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
                                        <td>Tiket Diterima Admin</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>18-Mar-2024</td>
                                        <td>Tiket Ditolak Verifikator</td>
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
                        <!-- accepted payments column -->
                        <div class="col-12">
                            <p class="lead">Lampiran Image</p>
                            <img class="img-fluid" src="<?= base_url() ?>assets/dist/img/photo1.png" alt="Photo">
                            <p></p>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="<?= base_url('admin/ticketditolakdetailprint') ?>" rel="noopener" target="_blank"
                                class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection() ?>