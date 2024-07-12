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

    tiketSaya = new DataTable('#tabelDataTiket', {
        destroy: true,
        ajax: {
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
                    // Return data array
                    return response.data;
                }
            },
        },
        columns: [{
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
                    return '<button class="btn btn-sm btn-warning edit-btn"><i class="bi bi-pencil-fill"></i></button> ' +
                        '<button class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash"></i></button>';
                }
            }
        ],
        processing: true,
    });

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
                }).done(function(response) {
                    console.log(response);
                    Swal.fire({
                        title: "Success",
                        text: response.message,
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
                aler(response);
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

    // script datatables
    $(function() {
        $('.select2').select2()
        // Tables
        // $("#tabelDataTiket").DataTable({
        //     "responsive": true,
        //     "lengthChange": false,
        //     "autoWidth": false,
        //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        // }).buttons().container().appendTo('#tabelDataTiket_wrapper .col-md-6:eq(0)');

    });
</script>