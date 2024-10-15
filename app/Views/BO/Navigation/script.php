<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>

<script>
    var tiketsayaValue;
    $(document).ready(function name(params) {

        var profilePic = $(".image-prof img");
        var userFile = $(".user-file");

        userFile.on("change", function() {
            var file = this.files[0];
            if (file) {
                profilePic.attr("src", URL.createObjectURL(file));
            }
        });

        // Get the current URL path
        var path = window.location.pathname;

        // Split the path into segments based on '/'
        var segments = path.split('/');

        // segments[2] will contain 'tiketsaya' if the URL is http://localhost:8080/index.php/bo/tiketsaya
        tiketsayaValue = segments[3];

        if ($('#forminputtiket').length) {
            var cabang_id = $('select[name="inputAktivis"]').data("kantor");
            var field = 'cabang_id';
            getAktivis(field, cabang_id);
        } else if ($('#formEditProfile').length) {
            var field = 'aktivis_id';
            var cabang = '<?php echo $aktivis_id; ?>'
            getAktivis(field, cabang);
            getLoginInfo(field, cabang);
        } 
    });

    function getAktivis(field, cabang) {

        // console.log(cabang_id);

        $.ajax({
            type: "POST",
            url: "<?= site_url();?>/api/get",
            data: JSON.stringify({
                table: 'aktivis_cabang_view',
                field: field,
                value: cabang
            }),
            dataType: "JSON",
            success: function(response) {
                let data = response.data;
                console.log(data);
                if ($('#forminputtiket').length) {

                    let select = $('select[name="inputAktivis"]');
                    select.empty();
                    select.append('<option value="">-- Pilih Aktivis --</option>'); // Add empty                    
                    $.each(data, function(index, value) {
                        select.append(`<option value = "${value.aktivis_id}">${value.nama_aktivis} </option>`);
                    });
                }

                if ($('#formEditProfile').length) {
                    // Disable the form inputs
                    $('#formEditProfile').find(':input').not('.btn-info').prop('disabled', true);
                    $('#formEditProfile').find('.btn-info').text('Edit');

                    // Populate fields with data
                    $('.image-prof img').attr('src', '<?= base_url();?>/prof_pict/' + data[0]['pict']);
                    $('#nama_display').text(data[0]['nama_aktivis']);
                    $('#jabatan_display').text(data[0]['nama_jabatan']);
                    $('input[name="aktivisId"]').val(data[0]['aktivis_id']);
                    $('input[name="inputNIA"]').val(data[0]['nia']);
                    $('input[name="inputNamaLengkap"]').val(data[0]['nama_aktivis']);
                    $('select[name="inputJK"]').val(data[0]['jk']).trigger('change'); // Use 'change' event to update the select
                    $('input[name="inputNoHP"]').val(data[0]['no_hp']);
                    $('input[name="inputAlamatAsal"]').val(data[0]['asal']);
                }

            }
        });
    }

    function getLoginInfo(field, value) {        

        $.ajax({
            type: "POST",
            url: "<?= site_url();?>/api/get",
            data: JSON.stringify({
                table: 'login_view',
                field: field,
                value: value
            }),
            dataType: "JSON",
            success: function(response) {
                console.log(response);
                let data = response.data;                

                if ($('#formEditLogin').length) {
                    // Disable the form inputs
                    $('#formEditLogin').find(':input').not('.btn-info').prop('disabled', true);
                    $('#formEditLogin').find('.btn-info').text('Edit');

                    // Populate fields with data                    
                    $('input[name="user_id"]').val(data[0]['user_id']);
                    $('input[name="aktivis_id"]').val(data[0]['aktivis_id']);
                    $('input[name="active"]').val(data[0]['active']);
                    $('input[name="role_id"]').val(data[0]['namagroup_id']);
                    $('input[name="username"]').val(data[0]['username']);
                    $('input[name="password"]').val(data[0]['password_hash']);                    
                }

            }
        });
    }

    $(document).on('click', '#tabelDataTiketBo tbody .detail-btn', function() {

        var tiketBo = $('#tabelDataTiketBo').DataTable();
        // Check if the clicked element is inside a "child row" created by the DataTables responsive plugin
        var row = $(this).closest('tr');        

        if (row.hasClass('child')) {
            // If inside a "child row", find the parent row containing the actual data
            row = row.prev();
        }

        // Now get the row data from the DataTable instance
        var rowData = tiketBo.row(row).data();
        console.log(rowData);        
        content_load(rowData);
    });

    $(document).on('click', '#tabelDataTiket tbody .detail-btn', function() {

        var tiketBo = $('#tabelDataTiket').DataTable();
        // Check if the clicked element is inside a "child row" created by the DataTables responsive plugin
        var row = $(this).closest('tr');        

        if (row.hasClass('child')) {
            // If inside a "child row", find the parent row containing the actual data
            row = row.prev();
        }

        // Now get the row data from the DataTable instance
        var rowData = tiketBo.row(row).data();
        console.log(rowData);        
        content_load(rowData);
    });

    function content_load(rowData){
        var siteUrl = "<?= site_url() ?>";
        $('#content').load(siteUrl + '/bo/tiketdetail', function(response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                $("#content").html(msg + xhr.status + " " + xhr.statusText);
            }

            $.ajax({
                type: 'POST',
                url: '<?= site_url();?>/api/get',
                data: JSON.stringify({
                    table: 'view_tiket_history',
                    field: 'tiket_id',
                    value: rowData.tiket_id
                }),
                dataType: 'JSON',
                success: function(response) {

                    var data = response.data;

                    console.log(data);
                    $.each(data, function(index, value) {
                        let iconMarkup = getStatusIcon(value.state);

                        // Check if the current index is the last iteration
                        let isLast = index === data.length - 1;
                        let iconClass = isLast ? "status-current blinker" : "status-intransit";

                        $('.tracking-list').append(`
                            <div class="tracking-item">
                                <div class="tracking-icon ${iconClass}">
                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                    </svg>
                                </div>
                                ${iconMarkup}
                                <div class="tracking-content">${value.state}<span>${value.tgl_komen}</span><small>${value.nama_aktivis} : ${value.komen}</small></div>
                            </div>
                        `);
                    });

                    // Append the final "pending" step div after the loop
                    $('.tracking-list').append(`
                        <div class="tracking-item-pending">
                            <div class="tracking-icon status-intransit">
                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                </svg>
                            </div>
                            <div class="tracking-date">
                                <img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" />
                            </div>
                            <div class="tracking-content"> ...... <span> ....... </span></div>
                        </div>
                    `);

                    if (rowData.status === 'Solved') {
                        $('#confirmButton').html(`
                            <a href="#" id="btn_confirm" data-tiket="" class="btn btn-warning">Konfirmasi Selesai</a>                            
                        `);
                    }

                    // Ensure the button is updated after the content is loaded and populated
                    $('#btn_confirm').attr('data-tiket', JSON.stringify(rowData));
                }
            });

            var baseUrl = "<?= base_url() ?>";

            if ($('#tiketVerifikasi').length) {
                // $('#btn_confirm').attr('data-tiket', JSON.stringify(rowData));
                $('#nama_cabang').text(rowData.nama_cabang);
                $('#deskripsi').text(rowData.deskripsi);
                $('#aktivis_yg_salah').text(rowData.aktivis_yg_salah);
                $('#jabatan_aktivis_yg_salah').text(rowData.jabatan_aktivis_yg_salah);
                $('#file_document').attr('href', baseUrl + 'files/' + rowData.file_document);
                $('#file_document').html(rowData.file_document + ' <i class="fas fa-download"></i>');
                $('#file_image').attr('src', baseUrl + 'images/' + rowData.file_image);
                $('#tiket_detail').html(`
                    <b>Nomor TIket: </b>${rowData.no_tiket}<br>
                    <br>
                    <b>Kategori: </b>${rowData.tiket_kategori}<br>
                    <b>Tgl Tiket: </b> ${rowData.tgl_input}<br>
                    <b>Status: </b> ${rowData.status}
                `);
            }
        });
    }

    $(document).on('click', '#btn_confirm', function() {

        Swal.fire({
            title: "Anda yakin?",
            text: "Menyatakan tiket selesai, dan memberikan kredit ke PIC!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Tutup!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {

                var data = $(this).data('tiket');

                // Determine status based on button clicked
                var status = 'Closed'
                var komen = 'Dinyatakan Selesai dari BO';

                // Format the current date and time
                var now = new Date();
                var formattedDate = now.getFullYear() + '-' +
                    ('0' + (now.getMonth() + 1)).slice(-2) + '-' +
                    ('0' + now.getDate()).slice(-2) + ' ' +
                    ('0' + now.getHours()).slice(-2) + ':' +
                    ('0' + now.getMinutes()).slice(-2) + ':' +
                    ('0' + now.getSeconds()).slice(-2);

                // Prepare data for the tiket table
                var dataTiketSend = {
                    table: 'tiket',
                    id: data.tiket_id,
                    data: [{
                        aktivis_id: data.aktivis_id,
                        noTiket: data.no_tiket,
                        cabang_id: data.cabang_id,
                        jabatan_id: data.jabatan_id,
                        tiket_kategori: data.tiket_kategori,
                        deskripsi: data.deskripsi,
                        aktivis_yg_salah: data.aktivis_id_salah,
                        file_document: data.file_document,
                        file_image: data.file_image,
                        tgl_input: data.tgl_input,
                        tgl_update: formattedDate,
                        status: status
                    }]
                };

                // Prepare data for the komentar table
                var dataKomentSend = {
                    table: 'komentar',
                    data: [{
                        tiket_id: data.tiket_id,
                        aktivis_id: <?php echo $aktivis_id; ?>,
                        komen: komen,
                        status: status,
                        tgl_komen: formattedDate,
                    }]
                };

                Swal.fire({
                    title: 'Mohon Tunggu',
                    text: 'Memberikan kredit ke PIC, tunggu...',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                // If #btn_tolak is clicked, send only dataTiketSend and dataKomentSend
                sendAjaxRequest(dataTiketSend)
                    .then(function(response) {
                        console.log('First request (dataTiketSend) succeeded:', response);

                        Swal.fire({
                            title: 'Mohon Tunggu',
                            text: 'Menambahklan Komentar Akhir, tunggu...',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        return sendAjaxRequest(dataKomentSend);
                    })
                    .then(function(response) {
                        console.log('Second request (dataKomentSend) succeeded:', response);

                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            $('#addModal').modal('hide');
                            window.location.reload();
                        });
                    })
                    .catch(function(error) {
                        handleError(error);
                    });
            }
        });
    });

    // Function to send an AJAX request
    function sendAjaxRequest(data) {
        return $.ajax({
            type: "POST",
            url: "../api/insert",
            data: JSON.stringify(data),
            contentType: "application/json",
            dataType: "JSON"
        });
    }

    // Function to handle errors in the AJAX requests
    function handleError(error) {
        console.error('Error:', error);

        let errorMessage = 'An error occurred';
        if (error.responseJSON && error.responseJSON.messages) {
            errorMessage = Object.values(error.responseJSON.messages).join('\n');
        }

        Swal.fire({
            title: "Error",
            text: errorMessage,
            icon: "error",
            timer: 5000,
            showConfirmButton: false
        });

        $('#addModal').modal('hide');
    }

    $('button[type="reset"]').click(function() {
        // Reset Select2 elements
        $('.select2').val(null).trigger('change');

        // If you want to reset to a specific option, you can do it like this:
        // $('select[name="inputAktivis"]').val('default_value').trigger('change');
        // $('select[name="inputRole"]').val('default_value').trigger('change');
        // $('select[name="inputStatusActive"]').val('default_value').trigger('change');
    });

    $(document).on('submit', '#forminputtiket', function(e) {
        e.preventDefault();

        var formData = new FormData();
        formData.append('file_document', $('input[name="docFile"]')[0].files[0]);
        formData.append('file_image', $('input[name="imgFile"]')[0].files[0]);

        // First AJAX request to upload files
        $.ajax({
            type: "POST",
            url: "../api/upload", // Your API endpoint to handle file uploads
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
        }).done(function(response) {

            if (response.status === true) {
                // Files uploaded successfully, now send the JSON data with file paths
                var filePaths = response.filePaths;

                var tiketId = $('input[name="tiket_id"]').val();

                var now = new Date();
                var formattedDate = now.getFullYear() + '-' +
                    ('0' + (now.getMonth() + 1)).slice(-2) + '-' +
                    ('0' + now.getDate()).slice(-2) + ' ' +
                    ('0' + now.getHours()).slice(-2) + ':' +
                    ('0' + now.getMinutes()).slice(-2) + ':' +
                    ('0' + now.getSeconds()).slice(-2);

                var jsonData = {
                    table: 'tiket',
                    id: tiketId,
                    data: [{
                        aktivis_id: $('input[name="aktivis_id"]').val(),
                        cabang_id: $('input[name="cabang_id"]').val(),
                        jabatan_id: $('input[name="jabatan_id"]').val(),
                        tiket_kategori: $('select[name="tiketkategori_id"]').val(),
                        deskripsi: $('textarea[name="deskripsi"]').val(),
                        aktivis_yg_salah: $('select[name="inputAktivis"]').val(),
                        file_document: filePaths.file_document, // Path returned from the server
                        file_image: filePaths.file_image, // Path returned from the server
                        status: 'Open',
                        tgl_input: formattedDate,
                    }]
                };

                // Second AJAX request to insert the ticket
                $.ajax({
                    type: "POST",
                    url: "../api/insert",
                    data: JSON.stringify(jsonData),
                    contentType: "application/json",
                    dataType: "JSON",
                }).then(function(response) {

                    if (response.id !== 0) {
                        if (tiketId !== '') {
                            tiket_id = tiketId;
                        } else {
                            tiket_id = response.id;
                        }
                        var komentData = {
                            table: 'komentar',
                            id: '',
                            data: [{
                                tiket_id: tiket_id,
                                aktivis_id: $('input[name="aktivis_id"]').val(),
                                komen: 'Tiket di Submit',
                                status: 'Submited',
                                tgl_komen: formattedDate,
                            }]
                        };

                        return $.when(
                            $.ajax({
                                type: "POST",
                                url: "../api/insert",
                                data: JSON.stringify(komentData),
                                contentType: "application/json",
                                dataType: "JSON"
                            })
                        )
                    } else {
                        return $.Deferred().reject({
                            message: 'Failed to insert ticket.'
                        });
                    }

                }).done(function(response) {
                    console.log(response);
                    Swal.fire({
                        title: "Success",
                        text: response.message || 'Operation successful!',
                        icon: "success",
                        timer: 2000,
                    });

                    // Clear the form inputs
                    $('#forminputtiket')[0].reset();
                    $('.select2').val(null).trigger('change');
                }).fail(function(xhr, status, error) {
                    console.error('Error:', error);

                    let errorMessage = 'An error occurred';
                    if (xhr.responseJSON && xhr.responseJSON.messages) {
                        errorMessage = Object.values(xhr.responseJSON.messages).join('\n');
                    }

                    Swal.fire({
                        title: "Error",
                        text: errorMessage,
                        icon: "error",
                        timer: 5000,
                    });
                    // Clear the form inputs
                    $('#forminputtiket')[0].reset();
                    $('.select2').val(null).trigger('change');
                });
            } else {
                alert(response.message || 'An error occurred during file upload.');
            }

        }).fail(function(xhr) {
            let errorMessage = 'An error occurred';
            if (xhr.responseJSON && xhr.responseJSON.messages) {
                errorMessage = Object.values(xhr.responseJSON.messages).join('\n');
            }

            Swal.fire({
                title: "Error",
                text: errorMessage,
                icon: "error",
                timer: 5000,
            });

            // Clear the form inputs
            $('#forminputtiket')[0].reset();
            $('.select2').val(null).trigger('change');
        });
    });

    $(document).on('click', '.btn-info', function() {
        // Get the closest form that contains the clicked .btn-info button
        var $form = $(this).closest('form'); // Closest form to the clicked button
        var text = $form.find('.btn-info').text();

        // Toggle behavior based on the button text
        if (text !== 'Batal') {
            $form.find(':input').not('.btn-info').prop('disabled', false);
            $form.find('.btn-info').text('Batal');
        } else {
            $form.find(':input').not('.btn-info').prop('disabled', true);
            $form.find('.btn-info').text('Edit');
        }
    });

    $(document).on('submit', '#formEditProfile', function(e) {
        e.preventDefault();

        var formData = new FormData();
        formData.append('file_image', $('input[name="prof_img"]')[0].files[0]);        

        $.ajax({
            type: "POST",
            url: "../api/upload_pict", // Your API endpoint to handle file uploads
            data: formData,
            processData: false,
            contentType: false,
            dataType: "JSON",
        }).done(function(response) {

            if (response.status === true){
                var id = $('input[name="aktivisId"]').val();
                var nia = $('input[name="inputNIA"]').val();
                var nama = $('input[name="inputNamaLengkap"]').val();
                var jk = $('select[name="inputJK"]').val();
                var nohp = $('input[name="inputNoHP"]').val();
                var asal = $('input[name="inputAlamatAsal"]').val();
                var pict = response.filePaths.file_image; // Corrected to get image name from response
        
                $.ajax({
                    url: "../api/insert",
                    contentType: 'application/json', // Set content type to JSON
                    type: 'POST',
                    data: JSON.stringify({
                        table: 'aktivis',
                        id: id,
                        data: [{
                            nia: nia,
                            nama_aktivis: nama,
                            jk: jk,
                            no_hp: nohp,
                            asal: asal,
                            pict: pict // Pass the uploaded image filename
                        }]
                    }),
                    dataType: 'JSON',
                    success: function(response) {
        
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            timer: 2000,
                        });
        
                        getAktivis('aktivis_id', id);
        
                    },
                    error: function(xhr, status, error) {
                        $('#addModal').modal('hide');
                        $("#tabelDataAktivis").DataTable().ajax.reload();
        
                        let errorMessage = 'An error occurred';
                        if (xhr.responseJSON && xhr.responseJSON.messages) {
                            errorMessage = Object.values(xhr.responseJSON.messages).join('\n');
                        }
        
                        Swal.fire({
                            title: "Error",
                            text: errorMessage,
                            icon: "error",
                            timer: 2000,
                        });
                    }
                })
            }else{
                Swal.fire({
                    title: "Error",
                    text: response.message,
                    icon: "error",
                    timer: 3000,
                });
            }
        }).fail(function(xhr) {
            let errorMessage = 'An error occurred';
            if (xhr.responseJSON && xhr.responseJSON.messages) {
                errorMessage = Object.values(xhr.responseJSON.messages).join('\n');
            }

            Swal.fire({
                title: "Error",
                text: errorMessage,
                icon: "error",
                timer: 5000,
            });
        });

    })

    $(document).on('submit', '#formEditLogin', function(e) {
        e.preventDefault();

        var id = $('input[name="user_id"]').val();
        var dataLoginAktivis = {
            aktivis_id: $('input[name="aktivis_id"]').val(),
            username: $('input[name="username"]').val(),
            password_hash: $('input[name="password"]').val(),
            active: $('input[name="active"]').val(),
            role_id: $('input[name="role_id"]').val(),
        };
        $.ajax({
            type: "POST",
            url: "<?= site_url();?>/api/insert",
            data: JSON.stringify({
                table: 'user',
                id:id,
                data: [dataLoginAktivis],
            }),
            dataType: "JSON",
            success: function(response) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    timer: 2000,
                });

                getLoginInfo('aktivis_id', dataLoginAktivis.aktivis_id);
            },
            error: function(xhr, status, error) {
                let errorMessage = 'An error occurred';
                if (xhr.responseJSON && xhr.responseJSON.messages) {
                    errorMessage = Object.values(xhr.responseJSON.messages).join('\n');
                }

                Swal.fire({
                    title: "Error",
                    text: errorMessage,
                    icon: "error",
                    timer: 2000,
                });                
            }
        });
    });

    $(document).on('click', '#tabelDataTiketBo tbody .edit-btn', function() {

        var tiketMasuk = $('#tabelDataTiketBo').DataTable();
        // Check if the clicked element is inside a "child row" created by the DataTables responsive plugin
        var row = $(this).closest('tr');

        if (row.hasClass('child')) {
            // If inside a "child row", find the parent row containing the actual data
            row = row.prev();
        }

        // Now get the row data from the DataTable instance
        var rowData = tiketMasuk.row(row).data();
        console.log(rowData);
        var siteUrl = "<?= site_url() ?>";

        $('#content').load(siteUrl + '/bo/tiketedit', function(response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                $("#content").html(msg + xhr.status + " " + xhr.statusText);
            }
            var baseUrl = "<?= base_url() ?>";

            if ($('#forminputtiket').length) {
                console.log(rowData);
                var field = 'cabang_id';
                getAktivis(field, rowData.cabang_id);
                $('input[name="tiket_id"]').val(rowData.tiket_id);
                $('input[name="aktivis_id"]').val(rowData.aktivis_id);
                $('input[name="jabatan_id"]').val(rowData.jabatan_id);
                $('input[name="cabang_id"]').val(rowData.cabang_id);
                $('select[name="tiketkategori_id"').val(rowData.tiket_kategori);
                $('textarea[name="deskripsi"]').val(rowData.deskripsi);
            }
        });
    });

    function getStatusIcon(status) {
        let iconHtml = ''; // Default icon HTML

        switch (status) {
            case 'Open':
                iconHtml = '<div class="tracking-date"><i class="bi bi-envelope-open h4"></i></div>';
                break;
            case 'Submited':
                iconHtml = '<div class="tracking-date"><i class="bi bi-send h4"></i></div>';
                break;
            case 'Reject':
                iconHtml = '<div class="tracking-date"><i class="bi bi-x-circle h4"></i></div>';
                break;
            case 'Confirmed':
                iconHtml = '<div class="tracking-date"><i class="bi bi-check-circle h4"></i></div>';
                break;
            case 'In Progress':
                iconHtml = '<div class="tracking-date"><i class="bi bi-hourglass-split h4"></i></div>';
                break;
            case 'Solved':
                iconHtml = '<div class="tracking-date"><i class="bi bi-check-square h4"></i></div>';
                break;
            case 'Closed':
                iconHtml = '<div class="tracking-date"><i class="bi bi-lock h4"></i></div>';
                break;
            default:
                iconHtml = '<div class="tracking-date"><i class="bi bi-question-circle h4"></i></div>';
                break;
        }

        return iconHtml;
    }

    // script datatables
    $(function() {
        $('.select2').select2();

        // Tables
        $("#tabelDataTiketBo").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '<?= site_url();?>/api/get',
                contentType: 'application/json', // Set content type to JSON
                type: 'POST',
                data: function() {
                    // Convert data to JSON
                    return JSON.stringify({
                        table: 'view_tiket_details',
                        field: 'cabang_id',
                        value: <?php echo $cabang_id; ?>,
                        id: ''
                    });
                },
                dataSrc: function(response) {
                    if (response.data === null) {
                        // No data available, return empty array
                        return [];
                    } else {
                        return response.data;
                    }
                },
            },
            "columns": [{
                    data: 'no_tiket'
                }, {
                    data: 'tiket_kategori'
                }, {
                    data: 'tgl_input'
                }, {
                    data: 'deskripsi'
                }, {
                    data: 'status',
                    title: 'Status',
                    render: function(data, type, row) {
                        let badgeClass = 'badge-secondary'; // Default badge class
                        let icon = ''; // Default icon

                        // Determine the appropriate badge class and icon based on the status
                        switch (data) {
                            case 'Open':
                                badgeClass = 'badge-secondary';
                                icon = '<i class="bi bi-folder2-open h6"></i>';
                                break;
                            case 'Submitted':
                                badgeClass = 'badge-primary';
                                icon = '<i class="bi bi-file-earmark-text h6"></i>';
                                break;
                            case 'Rejected':
                                badgeClass = 'badge-danger';
                                icon = '<i class="bi bi-x-circle h6"></i>';
                                break;
                            case 'Reviewed':
                                badgeClass = 'badge-warning';
                                icon = '<i class="bi bi-eye h6"></i>';
                                break;
                            case 'Confirmed':
                                badgeClass = 'badge-success';
                                icon = '<i class="bi bi-check-circle h6"></i>';
                                break;
                            case 'In Progress':
                                badgeClass = 'badge-primary';
                                icon = '<i class="bi bi-hourglass-split h6"></i>';
                                break;
                            case 'Solved':
                                badgeClass = 'badge-primary';
                                icon = '<i class="bi bi-check-all h6"></i>';
                                break;
                            case 'Closed':
                                badgeClass = 'badge-success';
                                icon = '<i class="bi bi-clipboard2-check-fill h6"></i>';
                                break;
                            default:
                                badgeClass = 'badge-secondary';
                                icon = ''; // No icon for default
                                break;
                        }

                        // Return the HTML for the badge with the correct class and icon
                        return `<span class="badge ${badgeClass}">${icon} ${data}</span>`;
                    }
                },
                {
                    // Column for the button
                    data: 'status',
                    render: function(data, type, row) {
                        // Return the HTML for the button
                        if (data === 'Reject') {
                            return '<button class="btn btn-xs btn-warning edit-btn"><i class="bi bi-pencil-fill"></i></button> ' +
                                '<button class="btn btn-xs btn-info detail-btn"><i class="bi bi-eye"></i></button>';
                        } else {
                            return '<button class="btn btn-xs btn-info detail-btn"><i class="bi bi-eye"></i></button>';
                        }
                    }
                }
            ]
        });

        $('#tabelDataTiket').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '<?= site_url();?>/api/get',
                contentType: 'application/json', // Set content type to JSON
                type: 'POST',
                data: function() {
                    // Convert data to JSON
                    return JSON.stringify({
                        table: 'view_tiket_details',
                        field: 'aktivis_id',
                        value: <?php echo $aktivis_id; ?>,
                        id: ''
                    });
                },
                dataSrc: function(response) {
                    if (response.data === null) {
                        // No data available, return empty array
                        return [];
                    } else {
                        // Filter data array to include only entries with status 'Open'
                        const filteredData = response.data.filter(function(item) {
                            return item['cabang_id'] === "<?php echo $cabang_id ?>";
                        });

                        console.log(filteredData);
                        return filteredData;
                    }
                },
            },
            "columns": [{
                    data: 'no_tiket'
                }, {
                    data: 'tiket_kategori'
                }, {
                    data: 'tgl_input'
                }, {
                    data: 'deskripsi'
                }, {
                    data: 'status'
                },
                {
                    // Column for the button
                    data: null,
                    render: function(data, type, row) {
                        // Return the HTML for the button
                        if (data === 'Reject') {
                            return '<button class="btn btn-xs btn-warning edit-btn"><i class="bi bi-pencil-fill"></i></button> ' +
                                '<button class="btn btn-xs btn-info detail-btn"><i class="bi bi-eye"></i></button>';
                        } else {
                            return '<button class="btn btn-xs btn-info detail-btn"><i class="bi bi-eye"></i></button>';
                        }
                    }
                }
            ]
        });

    });
</script>