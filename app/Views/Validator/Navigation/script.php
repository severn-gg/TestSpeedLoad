<!-- Page specific script -->

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

    var now = new Date();
    var formattedDate = now.getFullYear() + '-' +
        ('0' + (now.getMonth() + 1)).slice(-2) + '-' +
        ('0' + now.getDate()).slice(-2) + ' ' +
        ('0' + now.getHours()).slice(-2) + ':' +
        ('0' + now.getMinutes()).slice(-2) + ':' +
        ('0' + now.getSeconds()).slice(-2);

    $(document).ready(function name(params) {

        // Get the current URL path
        var path = window.location.pathname;

        // Split the path into segments based on '/'
        var segments = path.split('/');

        // segments[2] will contain 'tiketsaya' if the URL is http://localhost:8080/index.php/bo/tiketsaya
        tiketsayaValue = segments[2];

        console.log(tiketsayaValue); // This will log 'tiketsaya' to the console        

    });

    $(document).on('click', '#tabelDataTiketMasuk tbody .btn-verifikasi', function() {

        var tiketMasuk = $('#tabelDataTiketMasuk').DataTable();
        var rowData = tiketMasuk.row($(this).closest('tr')).data();
        // console.log(rowData);

        $('#content').load('/validator/tiketverifikasi', function(response, status, xhr) {
            if (status == "error") {
                var msg = "Sorry but there was an error: ";
                $("#content").html(msg + xhr.status + " " + xhr.statusText);
            }
            var baseUrl = "<?= base_url() ?>";

            if ($('#tiketVerifikasi').length) {
                $('#verifyBtn').attr('data-tiket', JSON.stringify(rowData));
                $('#verifyBtn').html(
                    `<i class="bi bi-check-circle-fill"></i> Verifikasi`
                );
                $('#nama_cabang').text(rowData.nama_cabang);
                $('#deskripsi').text(rowData.deskripsi);
                $('#aktivis_yg_salah').text(rowData.aktivis_yg_salah);
                $('#jabatan_aktivis_yg_salah').text(rowData.jabatan_aktivis_yg_salah);
                $('#file_document').attr('href', baseUrl + 'images/' + rowData.file_document);
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
    });

    $(document).on('click', '#verifyBtn', function() {

        var data = $('#verifyBtn').data('tiket');
        console.log(data.jabatan_id);
        $('.card-body').html(`
            
                <p class="text-muted"><i class="bi bi-stack"></i> Nomor Tiket</p>

                <strong><b>${data.no_tiket}</b></strong>

                <hr>

                <p class="text-muted"><i class="bi bi-tags-fill"></i> Kategori</p>

                <strong>${data.tiket_kategori}</strong>

                <hr>

                <p class="text-muted"><i class="bi bi-journal-bookmark-fill"></i> Deskripsi</p>

                <strong>${data.deskripsi}</strong>

                <hr>

                <p class="text-muted"><i class="bi bi-person-fill-exclamation"></i> Aktivis Yang melakukan kesalahan</p>

                <strong>${data.aktivis_yg_salah}</strong>

                <hr>

                <div class="form-group">
                    <label for="inputNamaKantor" class="form-label">Komentar</label>
                    <textarea class="form-control" type="text" name="komentar"></textarea>
                </div>

                <strong><i class="far fa-file-alt mr-1"></i> Status</strong>
                
                <p class="text-muted">            
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" value="Reject">
                        <label class="form-check-label" for="inlineRadio1">Rejected</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" value="Reviewed">
                        <label class="form-check-label" for="inlineRadio1">Reviewed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" value="Confirmed">
                        <label class="form-check-label" for="inlineRadio2">Confirmed</label>
                    </div>
                </p>
              
        `);
    });

    $(document).on('click', '#btn_modal', function() {
        var status = $('input[name="status"]:checked').val();
        var komen = $('textarea[name="komentar"]').val();
        var data = $('#verifyBtn').data('tiket');

        var now = new Date();
        var formattedDate = now.getFullYear() + '-' +
            ('0' + (now.getMonth() + 1)).slice(-2) + '-' +
            ('0' + now.getDate()).slice(-2) + ' ' +
            ('0' + now.getHours()).slice(-2) + ':' +
            ('0' + now.getMinutes()).slice(-2) + ':' +
            ('0' + now.getSeconds()).slice(-2);

        if (!status || !komen) {
            Swal.fire({
                title: "O oh!",
                text: "Isi Komentar dan pilih status terbaru!!!",
                icon: "warning",
                timer: 3000,
                showConfirmButton: false
            });
            return;
        }

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
        }

        // Send the first request
        sendAjaxRequest(dataKomentSend)
            .then(function(response) {
                console.log('First request succeeded:', response);
                // Send the second request after the first one succeeds
                return sendAjaxRequest(dataTiketSend);
            })
            .then(function(response) {
                console.log('Second request succeeded:', response);

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
                    showConfirmButton: false
                });

                $('#addModal').modal('hide');
            });
        // console.log("Data to send: ", dataSend);
    })

    function sendAjaxRequest(data) {
        return $.ajax({
            type: "POST",
            url: "../api/insert",
            data: JSON.stringify(data),
            contentType: "application/json",
            dataType: "JSON"
        });
    }

    $(document).on('click', '#tabelDataTiketDiverifikasi tbody .detail-btn', function() {

        var tiketBo = $('#tabelDataTiketDiverifikasi').DataTable();
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
                                <div class="tracking-content">${value.state}<span>${value.tgl_komen}</span><small>${value.komen}</small></div>
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

                    var baseUrl = "<?= base_url() ?>";

                    if ($('#tiketVerifikasi').length) {
                        $('#verifyBtn').attr('data-tiket', JSON.stringify(rowData));
                        $('#nama_cabang').text(rowData.nama_cabang);
                        $('#deskripsi').text(rowData.deskripsi);
                        $('#aktivis_yg_salah').text(rowData.aktivis_yg_salah);
                        $('#jabatan_aktivis_yg_salah').text(rowData.jabatan_aktivis_yg_salah);
                        $('#file_document').attr('href', baseUrl + 'images/' + rowData.file_document);
                        $('#file_image').attr('src', baseUrl + 'images/' + rowData.file_image);
                        $('#tiket_detail').html(`
                    <b>Nomor TIket: </b>${rowData.no_tiket}<br>
                    <br>
                    <b>Kategori: </b>${rowData.tiket_kategori}<br>
                    <b>Tgl Tiket: </b> ${rowData.tgl_input}<br>
                    <b>Status: </b> ${rowData.status}
                `);
                    }
                }
            });
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

        $("#tabelDataTiketMasuk").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '/api/get', // Your endpoint URL
                type: 'POST', // The HTTP method to use for the request (can be 'GET' or 'POST')                
                data: function() {
                    // Convert data to JSON
                    return JSON.stringify({
                        table: 'view_tiket_details',
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
                            return item['status'] === 'Open' || item['status'] === 'Reject' || item['status'] === 'Reviewed';
                        });

                        console.log(filteredData);
                        return filteredData;
                    }
                },
            },
            "columns": [{
                    data: 'tiket_id',
                    title: '#'
                },
                {
                    data: 'no_tiket',
                    title: 'No. Tiket'
                },
                {
                    data: 'nama_cabang',
                    title: 'Branch Office'
                },
                {
                    data: 'deskripsi',
                    titel: 'Deskripsi'
                },
                {
                    data: 'tgl_input',
                    title: 'Tanggal Tiket'
                },
                {
                    data: 'status',
                    title: 'Verif',
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
                    data: null,
                    title: 'Aksi',
                    defaultContent: '<button class="btn btn-xs btn-primary btn-verifikasi"><i class="nav-icon fas fa-pen"></i></button>'
                }
            ]
        });

        $('#tabelDataTiketDiverifikasi').DataTable({
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
                        // field: 'status',
                        // value: 'Open',
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
                            return item['status'] !== 'Open';
                        });

                        console.log(filteredData);
                        return filteredData;
                    }
                },
            },
            "columns": [{
                    data: 'no_tiket'
                },
                {
                    data: 'nama_cabang'
                },
                {
                    data: 'tgl_input'
                },
                {
                    data: 'tgl_update'
                },
                {
                    // Column for the button
                    data: null,
                    title: 'Aksi',
                    defaultContent: '<button class="btn btn-xs btn-info detail-btn"><i class="nav-icon fas fa-eye"></i></button>'
                }
            ]
        });
    });
</script>

<!-- other -->