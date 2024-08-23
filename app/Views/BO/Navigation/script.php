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

        // Get the current URL path
        var path = window.location.pathname;

        // Split the path into segments based on '/'
        var segments = path.split('/');

        // segments[2] will contain 'tiketsaya' if the URL is http://localhost:8080/index.php/bo/tiketsaya
        tiketsayaValue = segments[3];

        console.log(tiketsayaValue); // This will log 'tiketsaya' to the console        

        if ($('#forminputtiket').length) {

            var cabang_id = $('select[name="inputAktivis"]').data("kantor");
            // console.log(cabang_id);

            $.ajax({
                type: "POST",
                url: "../api/get",
                data: JSON.stringify({
                    table: 'aktivis_cabang_view',
                    field: 'cabang_id',
                    value: cabang_id
                }),
                dataType: "JSON",
                success: function(response) {
                    let data = response.data;
                    // console.log(data);
                    let select = $('select[name="inputAktivis"]');
                    select.empty();
                    select.append('<option value="">-- Pilih Aktivis --</option>'); // Add empty
                    $.each(data, function(index, value) {
                        select.append(`<option value = "${value.aktivis_id}">${value.nama_aktivis} </option>`);
                    });
                }
            });
        }
    });

    $(document).on('click', '#tabelDataTiketBo tbody .detail-btn', function() {

        var tiketBo = $('#tabelDataTiketBo').DataTable();
        var rowData = tiketBo.row($(this).closest('tr')).data();
        console.log(rowData.tiket_id);

        $('#content').load('/bo/tiketdetail', function(response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                $("#content").html(msg + xhr.status + " " + xhr.statusText);
            }

            $.ajax({
                type: 'POST',
                url: '../api/get',
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
                        $('.tracking-list').append(`
                            <div class="tracking-item">
                                <div class="tracking-icon status-intransit">
                                    <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                    </svg>
                                </div>
                                ` + iconMarkup + `
                                <div class="tracking-content">${value.state}<span>${value.tgl_komen}</span><small>${value.komen}</small></div>
                            </div>
                        `);
                    });
                }
            });
        });
    });
    // tiketBo = new DataTable('#tabelDataTiketBo', {

    // });

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

                var now = new Date();
                var formattedDate = now.getFullYear() + '-' +
                    ('0' + (now.getMonth() + 1)).slice(-2) + '-' +
                    ('0' + now.getDate()).slice(-2) + ' ' +
                    ('0' + now.getHours()).slice(-2) + ':' +
                    ('0' + now.getMinutes()).slice(-2) + ':' +
                    ('0' + now.getSeconds()).slice(-2);

                var jsonData = {
                    table: 'tiket',
                    id: '',
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
                    console.log(response);
                    if (response.id !== 0) {
                        var komentData = {
                            table: 'komentar',
                            id: '',
                            data: [{
                                tiket_id: response.id,
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
        $('.select2').select2()
        // Tables
        $("#tabelDataTiketBo").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '../api/get',
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
                    data: 'status'
                },
                {
                    // Column for the button
                    data: null,
                    render: function(data, type, row) {
                        // Return the HTML for the button
                        return '<button class="btn btn-xs btn-warning edit-btn"><i class="bi bi-pencil-fill"></i></button> ' +
                            '<button class="btn btn-xs btn-info detail-btn"><i class="bi bi-eye"></i></button>';
                    }
                }
            ]
        });

        $('#tabelDataTiket').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '../api/get',
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
                        return '<button class="btn btn-xs btn-warning edit-btn"><i class="bi bi-pencil-fill"></i></button> ' +
                            '<button class="btn btn-xs btn-info view-btn"><i class="bi bi-eye"></i></button>';
                    }
                }
            ]
        });

    });
</script>