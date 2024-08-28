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
                    <form id="forminputtiket" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="tiket_id" />
                        <input type="hidden" name="aktivis_id" />
                        <input type="hidden" name="jabatan_id" />
                        <input type="hidden" name="cabang_id" />
                        <div class="card-body">
                            <div class="form-group">
                                <label for="stafterkait">Kategori Tiket</label>
                                <select type="select" class="form-control select2" name="tiketkategori_id">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Network">Network</option>
                                    <option value="Software">Software</option>
                                    <option value="Hardware">Hardware</option>
                                    <option value="LKD">LKD</option>
                                    <option value="POLJAK">POLJAK</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Persoalan</label>
                                <textarea class="form-control" rows="5" name="deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="imgFile">Lampiran File</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="docFile">
                                        <label for="file_uploads" class="custom-file-label">File</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="imgFile">Lampiran Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="imgFile">
                                        <label class="custom-file-label" for="imgFile">Gambar</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="stafterkait">Staf Yang Melakukan Kesalahan</label>
                                <select type="select" class="form-control select2" name="inputAktivis">

                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->