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
                <h1>Export Tiket Report by Verifikator</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Charts</li>
                    <li class="breadcrumb-item">Tiket</li>
                    <li class="breadcrumb-item active">Export by Verifikator</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> HELPDESK KK
                                <small class="float-right">Tgl Export: 6-Juni-2024</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-3 invoice-col">
                            Dari Tanggal
                            <address>
                                <strong><?= $fromDate ?></strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                            Sampai Tanggal
                            <address>
                                <strong><?= $toDate ?></strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 invoice-col">
                            Verifikator Tiket
                            <address>
                                <strong><?= $verifikatorTiket ?></strong>
                            </address>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <p class="lead">Tiket by Verifikator</p>
                            <table id="tabelExportChartTiketByVerifikator" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Tiket</th>
                                        <th>Tgl Tiket</th>
                                        <th>Kategori</th>
                                        <th>Urgensi</th>
                                        <th style="width:20%">Persoalan</th>
                                        <th>Branch Office</th>
                                        <th>Staf Terkait</th>
                                        <th>Verifikator</th>
                                        <th>PIC</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>SB024SOFT</td>
                                        <td>17-Mar-2024</td>
                                        <td>SOFTWARE</td>
                                        <td>URGENT</td>
                                        <td>Selisih TAK</td>
                                        <td>SEKADAU BERSATU</td>
                                        <td>LUKAS</td>
                                        <td>DEPT. RISK</td>
                                        <td>INDRA</td>
                                        <td>DISELESAIKAN</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>SB024SOFT</td>
                                        <td>17-Mar-2024</td>
                                        <td>SOFTWARE</td>
                                        <td>URGENT</td>
                                        <td>Although typically setting the traditional property helps with any time you
                                            are passing arrays via AJAX calls, you can still run into issues with
                                            serialization</td>
                                        <td>SEKADAU BERSATU</td>
                                        <td>LUKAS</td>
                                        <td>DEPT. RISK</td>
                                        <td>INDRA</td>
                                        <td>DISELESAIKAN</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>SB024SOFT</td>
                                        <td>17-Mar-2024</td>
                                        <td>SOFTWARE</td>
                                        <td>URGENT</td>
                                        <td>You often need to explicitly set the name of the parameter that you are
                                            expecting to populate as seen below</td>
                                        <td>SEKADAU BERSATU</td>
                                        <td>LUKAS</td>
                                        <td>DEPT. RISK</td>
                                        <td>INDRA</td>
                                        <td>DISELESAIKAN</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>SB024SOFT</td>
                                        <td>17-Mar-2024</td>
                                        <td>SOFTWARE</td>
                                        <td>URGENT</td>
                                        <td>Selisih TAK</td>
                                        <td>SEKADAU BERSATU</td>
                                        <td>LUKAS</td>
                                        <td>DEPT. RISK</td>
                                        <td>INDRA</td>
                                        <td>DISELESAIKAN</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <hr>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-4">
                            <p class="lead">Count</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Dari Tanggal:</th>
                                        <td><?= $fromDate ?></td>
                                    </tr>
                                    <tr>
                                        <th>Sampai Tanggal:</th>
                                        <td><?= $toDate ?></td>
                                    </tr>
                                    <tr>
                                        <th>Export Verifikator:</th>
                                        <td><?= $verifikatorTiket ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Tiket:</th>
                                        <td>2500</td>
                                    </tr>
                                    <tr>
                                        <th>Tiket Ditahan: </th>
                                        <td>100</td>
                                    </tr>
                                    <tr>
                                        <th>Tiket Diselesaikan: </th>
                                        <td>2000</td>
                                    </tr>
                                    <tr>
                                        <th>Tiket Ditolak: </th>
                                        <td>400</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <p class="lead">Kategori</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Software:</th>
                                        <td>500</td>
                                    </tr>
                                    <tr>
                                        <th>Hardware:</th>
                                        <td>500</td>
                                    </tr>
                                    <tr>
                                        <th>Network:</th>
                                        <td>500</td>
                                    </tr>
                                    <tr>
                                        <th>LKD - ATM:</th>
                                        <td>500</td>
                                    </tr>
                                    <tr>
                                        <th>LKD - KKD: </th>
                                        <td>500</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <p class="lead">Urgensi</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Low:</th>
                                        <td>1000</td>
                                    </tr>
                                    <tr>
                                        <th>Medium:</th>
                                        <td>1000</td>
                                    </tr>
                                    <tr>
                                        <th>Urgent:</th>
                                        <td>500</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection() ?>