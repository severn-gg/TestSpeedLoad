<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Verifikasi Tiket</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Tiket</li>
                    <li class="breadcrumb-item active">Verifikasi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content" id="tiketVerifikasi">
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
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                            Dari
                            <address>
                                <strong id="nama_cabang"></strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col text-right" id="tiket_detail">

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <hr />
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Deskripsi Persoalan:</p>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;" id="deskripsi">
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead">Terkait</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Nama Staf:</th>
                                        <td id="aktivis_yg_salah"></td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan Staf: </th>
                                        <td id="jabatan_aktivis_yg_salah"></td>
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
                            <a id="file_document" class="btn btn-info" target="_blank" href="">
                                <i class="fas fa-download"> Download File Dokumen *if exist</i>
                            </a>
                        </div>
                        <!-- accepted payments column -->
                        <div class="col-12">
                            <p class="lead">Image</p>
                            <img id="file_image" class="img-fluid" src="" alt="Photo">
                            <p></p>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="<?= base_url('validator/tiketverifikasiprint') ?>" rel="noopener" target="_blank" class="btn btn-primary">
                                <i class="fas fa-print"></i> Print
                            </a>
                            <a id="verifyBtn" data-tiket="" href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-check-circle-fill"></i> Verifikasi</a>

                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->