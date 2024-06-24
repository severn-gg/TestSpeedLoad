<?= $this->extend('BO/Content/master') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Buat Tiket</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Buat Tiket</li>
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
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tiket</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="forminputtiket" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="stafterkait">Kategori Tiket</label>
                                <select type="select" class="form-control" name="tiketkategori_id">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Persoalan</label>
                                <textarea class="form-control" rows="5" name="deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="file_uploads" class="form-label">Lampiran File / Dokumen</label>
                                    <input class="form-control" type="file" name="file_uploads">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="imgFile">Lampiran Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imgFile" name="imgFile"
                                            accept=".jpg, .jpeg, .png">
                                        <label class="custom-file-label" for="imgFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="stafterkait">Staf Yang Melakukan Kesalahan</label>
                                <select type="select" class="form-control" name="staf_id">

                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary" id="btnSubmit">Reset</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection() ?>