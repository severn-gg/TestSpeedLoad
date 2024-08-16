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
    $(document).ready(function() {
        checkFormExist();
    });

    function checkFormExist(params) {
        let formId = '';

        if ($('#forminputkantor').length) {
            formId = 'forminputkantor';
        } else if ($('#forminputaktivis').length) {
            formId = 'forminputaktivis';
        } else if ($('#formmutasiaktivis').length) {
            formId = 'formmutasiaktivis';
        } else if ($('#formmutasijabatanaktivis').length) {
            formId = 'formmutasijabatanaktivis';
        } else if ($('#formuserloginaktivis').length) {
            formId = 'formuserloginaktivis';
        } else if ($('#forminputpic').length) {
            formId = 'forminputpic';
        }

        switch (formId) {
            case 'forminputkantor':
                fetchData('area', 'inputArea', '-- Pilih Area --');
                break;

            case 'forminputaktivis':
                fetchData('jabatan', 'inputJabatan', '-- Pilih Jabatan --');
                fetchData('cabang', 'inputKantor', '-- Pilih Kantor --');
                break;

            case 'formmutasiaktivis':
                fetchData('aktivis', 'inputAktivis', '-- Pilih Aktivis --');
                fetchData('cabang', 'inputKantor', '-- Pilih Kantor --');
                break;

            case 'formmutasijabatanaktivis':
                fetchData('aktivis', 'inputAktivis', '-- Pilih Aktivis --');
                fetchData('jabatan', 'inputJabatan', '-- Pilih Jabatan --');
                break;

            case 'formuserloginaktivis':
                fetchData('aktivis', 'inputAktivis', '-- Pilih Aktivis --');
                fetchData('role', 'inputRole', '-- Pilih Role --');
                break;

            case 'forminputpic':
                fetchData('aktivis', 'inputAktivis', '-- Pilih Aktivis --');
                fetchData('area', 'inputArea', '-- Pilih Area --');
                break;
        }

        function fetchData(tableName, selectName, placeholder) {
            $.ajax({
                type: "POST",
                url: "../api/get",
                data: JSON.stringify({
                    table: tableName
                }),
                dataType: "JSON",
                success: function(response) {
                    let data = response.data;
                    let select = $(`select[name="${selectName}"]`);
                    select.empty();
                    select.append(`<option value="">${placeholder}</option>`); // Add empty option
                    $.each(data, function(index, value) {
                        select.append(`<option value="${value[`${tableName}_id`]}">${value[`nama_${tableName}`]} </option>`);
                    });
                }
            });
        }
    }

    $(document).on('change', 'select[name="inputAktivis"]', function() {
        var selectedOption = $(this).find('option:selected'); // Get the selected option element
        var selectedValue = selectedOption.val(); // Get the value of the selected option

        // Check if selectedValue is not empty or undefined
        if (selectedValue) {
            var selectedText = selectedOption.text(); // Get the text of the selected option
            var firstWord = selectedText.split(' ')[0].toLowerCase(); // Get the first word

            $('input[name="inputUsername"]').val(firstWord);
            $('input[name="inputPassword"]').val('123456!');
        }
    });

    $('button[type="reset"]').click(function() {
        // Reset Select2 elements
        $('.select2').val(null).trigger('change');

        // If you want to reset to a specific option, you can do it like this:
        // $('select[name="inputAktivis"]').val('default_value').trigger('change');
        // $('select[name="inputRole"]').val('default_value').trigger('change');
        // $('select[name="inputStatusActive"]').val('default_value').trigger('change');
    });

    $(document).on('click', '#tabelDataAktivis tbody .btn-warning', function(e) {
        e.preventDefault();

        // Get the row data using the DataTable API
        var table = $('#tabelDataAktivis').DataTable();
        var rowData = table.row($(this).closest('tr')).data();

        $('#modalBody').html(`
            <form id="formEditAktivis">
                <div class="form-group">
                    <label for="inputNIA" class="form-label">Nomor Induk Aktivis</label>
                    <input class="form-control" type="hidden" name="aktivisId" value="${rowData.aktivis_id}">
                    <input class="form-control" type="text" name="inputNIA" value="${rowData.nia}">
                </div>
                <div class="form-group">
                    <label for="inputNamaLengkap" class="form-label">Nama Lengkap</label>
                    <input class="form-control" type="text" name="inputNamaLengkap" value="${rowData.nama_aktivis}">
                </div>
                <div class="form-group">
                    <label for="inputJK" class="form-label">Select Jenis Kelamin</label>
                    <select type="select" class="form-control" name="inputJK" value="${rowData.jk}">
                        <option value="">-- Pilih Gender --</option>
                        <option value="Laki-laki" ${rowData.jk === 'Laki-laki' ? 'selected' : ''}>Laki-laki</option>
                        <option value="Perempuan" ${rowData.jk === 'Perempuan' ? 'selected' : ''}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputNoHP" class="form-label">No. HP</label>
                    <input class="form-control" type="text" name="inputNoHP" value="${rowData.no_hp}">
                </div>
                <div class="form-group">
                    <label for="inputAlamatAsal" class="form-label">Alamat Asal</label>
                    <input class="form-control" type="text" name="inputAlamatAsal" value="${rowData.asal}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        `);
        $('.modal-footer').hide();
        $('.modal-title').text('Edit Aktivis');
        $('#addModal').modal('show');
    });

    $(document).on('click', '#tabelDataKantor tbody .btn-warning', function(e) {
        e.preventDefault();

        // Get the row data using the DataTable API
        var table = $('#tabelDataKantor').DataTable();
        var rowData = table.row($(this).closest('tr')).data();

        $('#modalBody').html(`
            <form id="forminputkantor">
                <div class="form-group">
                    <label for="inputNamaKantor" class="form-label">Nama Kantor</label>
                    <input class="form-control" type="hidden" name="inputIdKantor" value="${rowData.cabang_id}">
                    <input class="form-control" type="text" name="inputNamaKantor" value="${rowData.nama_cabang}">
                </div>
                <div class="form-group">
                    <label for="inputAlamatKantor" class="form-label">Alamat Kantor</label>
                    <input class="form-control" type="text" name="inputAlamatKantor" value="${rowData.alamat_cabang}">
                </div>
                <div class="form-group">
                    <label for="inputArea" class="form-label">Area</label>
                    <select type="select" class="form-control select2" name="inputArea">

                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        `);
        $('.modal-footer').hide();
        $('.modal-title').text('Edit Cabang');
        $('#addModal').modal('show');
        checkFormExist();
        $('.select2').select2();
        // After the select is populated, set the selected value
        $('select option[value="' + rowData.area_id + '"]').attr('selected', 'selected');

    });

    $(document).on('submit', '#formEditAktivis', function(e) {
        e.preventDefault();
        var id = $('input[name="aktivisId"]').val();
        var nia = $('input[name="inputNIA"]').val();
        var nama = $('input[name="inputNamaLengkap"]').val();
        var jk = $('select[name="inputJK"]').val();
        var nohp = $('input[name="inputNoHP"]').val();
        var asal = $('input[name="inputAlamatAsal"]').val();

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
                    asal: asal
                }]
            }),
            dataType: 'JSON',
            success: function(response) {
                $('#addModal').modal('hide');
                $("#tabelDataAktivis").DataTable().ajax.reload();

                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    timer: 2000,
                });
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

    })

    $(document).on('submit', '#forminputaktivis', function(e) { // Add '#' for ID selector
        e.preventDefault();

        var dataAktivis = {
            nia: $('input[name="inputNIA"]').val(),
            nama_aktivis: $('input[name="inputNamaLengkap"]').val(),
            jk: $('select[name="inputJK"]').val(),
            no_hp: $('input[name="inputNoHP"]').val(),
            asal: $('input[name="inputAlamatAsal"]').val(),
        };

        $.ajax({
            type: "POST",
            url: "../api/insert",
            data: JSON.stringify({
                table: 'aktivis',
                data: [dataAktivis],
            }),
            dataType: "JSON"
        }).then(function(response) {
            if (response.id !== 0) {
                var dataKantor = {
                    aktivis_id: response.id,
                    cabang_id: $('select[name="inputKantor"]').val(),
                    start_date: $('input[name="inputTglMulai"]').val(),
                };

                var dataJabatan = {
                    aktivis_id: response.id,
                    jabatan_id: $('select[name="inputJabatan"]').val(),
                    start_date: $('input[name="inputTglMulaiJabat"]').val(),
                };

                return $.when(
                    $.ajax({
                        type: "POST",
                        url: "../api/insert",
                        data: JSON.stringify({
                            table: 'cabangaktivis',
                            data: [dataKantor],
                        }),
                        dataType: "JSON"
                    }),
                    $.ajax({
                        type: "POST",
                        url: "../api/insert",
                        data: JSON.stringify({
                            table: 'jabatanaktivis',
                            data: [dataJabatan],
                        }),
                        dataType: "JSON"
                    })
                );
            }
        }).then(function(responseKantor, responseJabatan) {
            Swal.fire({
                title: "Success",
                text: "Data inserted successfully for cabangaktivis and jabatanaktivis",
                icon: "success",
                timer: 2000,
            });

            // Clear the form inputs
            $('#forminputaktivis')[0].reset();
            $('.select2').val(null).trigger('change');
        }).catch(function(xhr) {
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

            // Clear the form inputs
            $('#forminputaktivis')[0].reset();
            $('.select2').val(null).trigger('change');
        });
    });

    $(document).on('submit', '#forminputJabatan', function(e) {
        e.preventDefault();

        var dataJabatan = {
            nama_jabatan: $('input[name="inputNamaJabatan"]').val()
        };
        $.ajax({
            type: "POST",
            url: "../api/insert",
            data: JSON.stringify({
                table: 'jabatan',
                data: [dataJabatan],
            }),
            dataType: "JSON",
            success: function(response) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    timer: 2000,
                });

                // Clear the form inputs
                $('#forminputJabatan')[0].reset();
                $('.select2').val(null).trigger('change');
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

                // Clear the form inputs
                $('#forminputJabatan')[0].reset();
                $('.select2').val(null).trigger('change');
            }
        });
    })

    $(document).on('submit', '#forminputarea', function(e) {
        e.preventDefault();

        var dataArea = {
            nama_area: $('input[name="inputNamaArea"]').val()
        };
        $.ajax({
            type: "POST",
            url: "../api/insert",
            data: JSON.stringify({
                table: 'area',
                data: [dataArea],
            }),
            dataType: "JSON",
            success: function(response) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    timer: 2000,
                });

                // Clear the form inputs
                $('#forminputarea')[0].reset();
                $('.select2').val(null).trigger('change');
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

                // Clear the form inputs
                $('#forminputarea')[0].reset();
                $('.select2').val(null).trigger('change');
            }
        });
    });

    $(document).on('submit', '#forminputkantor', function(e) {
        e.preventDefault();
        var id = $('input[name="inputIdKantor"]').val();
        var dataKantor = {
            nama_cabang: $('input[name="inputNamaKantor"]').val(),
            alamat_cabang: $('input[name="inputAlamatKantor"]').val(),
            area_id: $('select[name="inputArea"]').val(),
        };
        $.ajax({
            type: "POST",
            url: "../api/insert",
            data: JSON.stringify({
                table: 'cabang',
                id: id,
                data: [dataKantor],
            }),
            dataType: "JSON",
            success: function(response) {
                $('#addModal').modal('hide');
                $("#tabelDataKantor").DataTable().ajax.reload();
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    timer: 2000,
                });
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

    $(document).on('submit', '#formmutasiaktivis', function(e) {
        e.preventDefault();

        var dataMutasiKantor = {
            aktivis_id: $('select[name="inputAktivis"]').val(),
            cabang_id: $('select[name="inputKantor"]').val(),
            start_date: $('input[name="inputTglMulai"]').val(),
        };
        $.ajax({
            type: "POST",
            url: "../api/insert",
            data: JSON.stringify({
                table: 'cabangaktivis',
                id: dataMutasiKantor.aktivis_id,
                data: [dataMutasiKantor],
            }),
            dataType: "JSON",
            success: function(response) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    timer: 2000,
                });

                // Clear the form inputs
                $('#formmutasiaktivis')[0].reset();
                $('.select2').val(null).trigger('change');
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

                // Clear the form inputs
                $('#formmutasiaktivis')[0].reset();
                $('.select2').val(null).trigger('change');
            }
        });
    });

    $(document).on('submit', '#formmutasijabatanaktivis', function(e) {
        e.preventDefault();

        var dataMutasiJabatan = {
            aktivis_id: $('select[name="inputAktivis"]').val(),
            jabatan_id: $('select[name="inputJabatan"]').val(),
            start_date: $('input[name="inputTglMulai"]').val(),
        };
        $.ajax({
            type: "POST",
            url: "../api/insert",
            data: JSON.stringify({
                table: 'jabatanaktivis',
                id: dataMutasiJabatan.aktivis_id,
                data: [dataMutasiJabatan],
            }),
            dataType: "JSON",
            success: function(response) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    timer: 2000,
                });

                // Clear the form inputs
                $('#formmutasijabatanaktivis')[0].reset();
                $('.select2').val(null).trigger('change');
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

                // Clear the form inputs
                $('#formmutasijabatanaktivis')[0].reset();
                $('.select2').val(null).trigger('change');
            }
        });
    });

    $(document).on('submit', '#formuserloginaktivis', function(e) {
        e.preventDefault();

        var dataLoginAktivis = {
            aktivis_id: $('select[name="inputAktivis"]').val(),
            username: $('input[name="inputUsername"]').val(),
            password_hash: $('input[name="inputPassword"]').val(),
            active: $('select[name = "inputStatusActive"]').val(),
            role_id: $('select[name = "inputRole"]').val(),
        };
        $.ajax({
            type: "POST",
            url: "../api/insert",
            data: JSON.stringify({
                table: 'user',
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

                // Clear the form inputs
                $('#formuserloginaktivis')[0].reset();
                $('.select2').val(null).trigger('change');
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

                // Clear the form inputs
                $('#formuserloginaktivis')[0].reset();
                $('.select2').val(null).trigger('change');
            }
        });
    });

    $(document).on('submit', '#forminputpic', function(e) {
        e.preventDefault();

        var dataPIC = {
            user_id: $('select[name="inputAktivis"]').val(),
            area_id: $('select[name = "inputArea"]').val(),
        };
        $.ajax({
            type: "POST",
            url: "../api/insert",
            data: JSON.stringify({
                table: 'pic',
                data: [dataPIC],
            }),
            dataType: "JSON",
            success: function(response) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    timer: 2000,
                });

                // Clear the form inputs
                $('#forminputpic')[0].reset();
                $('.select2').val(null).trigger('change');
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
                    timer: 5000,
                });

                // Clear the form inputs
                $('#forminputpic')[0].reset();
                $('.select2').val(null).trigger('change');
            }
        });
    });

    // script datatables
    $(function() {
        $('.select2').select2()
        // Tables
        $("#tabelDataAktivis").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '/api/get', // Your endpoint URL
                type: 'POST', // The HTTP method to use for the request (can be 'GET' or 'POST')                
                data: function() {
                    // Convert data to JSON
                    return JSON.stringify({
                        table: 'aktivis',
                        id: ''
                    });
                },
            },
            columns: [{
                    data: 'aktivis_id',
                    title: '#'
                }, // Column for the ID
                {
                    data: 'nia',
                    title: 'NIA'
                }, // Column for the NIA
                {
                    data: 'nama_aktivis',
                    title: 'Nama'
                }, // Column for the Name
                {
                    data: 'asal',
                    title: 'Asal'
                }, // Column for the Asal
                {
                    data: null,
                    title: 'Aksi',
                    defaultContent: '<button class="btn btn-xs btn-warning"><i class="nav-icon fas fa-pen"></i></button> ' + '<button class="btn btn-xs btn-danger"><i class="nav-icon fas fa-trash"></i></button>'
                } // Action column for buttons, if needed
            ]
        });

        $("#tabelDataTiketDone").DataTable({
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
            },
            columns: [{
                    data: 'tiket_id',
                    title: '#'
                }, // Column for the ID
                {
                    data: 'no_tiket',
                    title: 'No. Tiket'
                }, // Column for the NIA
                {
                    data: 'nama_cabang',
                    title: 'Nama BO'
                }, // Column for the Name
                {
                    data: 'tiket_kategori',
                    title: 'Kategori'
                }, // Column for the Name
                {
                    data: 'deskripsi',
                    title: 'Deskripsi'
                }, // Column for the Name
                {
                    data: 'status',
                    title: 'status'
                }, // Column for the Asal
                {
                    data: null,
                    title: 'Aksi',
                    defaultContent: '<button class="btn btn-xs btn-warning"><i class="nav-icon fas fa-pen"></i></button> ' + '<button class="btn btn-xs btn-danger"><i class="nav-icon fas fa-trash"></i></button>'
                } // Action column for buttons, if needed
            ]
        });

        $("#tabelDataKantor").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '/api/get', // Your endpoint URL
                type: 'POST', // The HTTP method to use for the request (can be 'GET' or 'POST')                
                data: function() {
                    // Convert data to JSON
                    return JSON.stringify({
                        table: 'view_cabang',
                        id: ''
                    });
                },
            },
            columns: [{
                    data: 'cabang_id',
                    title: '#'
                }, // Column for the ID
                {
                    data: 'nama_cabang',
                    title: 'Nama Cabang'
                }, // Column for the NIA
                {
                    data: 'alamat_cabang',
                    title: 'Alamat'
                }, // Column for the Name
                {
                    data: 'nama_area',
                    title: 'Area'
                },
                {
                    data: null,
                    title: 'Aksi',
                    defaultContent: '<button class="btn btn-xs btn-warning"><i class="nav-icon fas fa-pen"></i></button> ' + '<button class="btn btn-xs btn-danger"><i class="nav-icon fas fa-trash"></i></button>'
                } // Action column for buttons, if needed
            ]
        });

        $("#tabelDataTiketReject").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tabelDataTiketReject_wrapper .col-md-6:eq(0)');

        $("#tabelDataUser").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tabelDataUser_wrapper .col-md-6:eq(0)');

        // laporantiket - Menu Charts
        $("#tabelExportChartTiketByStatus").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tabelExportChartTiketByStatus_wrapper .col-md-6:eq(0)');

        $("#tabelExportChartTiketByKantor").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tabelExportChartTiketByKantor_wrapper .col-md-6:eq(0)');

        $("#tabelExportChartTiketByKategori").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tabelExportChartTiketByKategori_wrapper .col-md-6:eq(0)');

        $("#tabelExportChartTiketByVerifikator").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tabelExportChartTiketByVerifikator_wrapper .col-md-6:eq(0)');

        // laporan bo - Menu Charts
        $("#tabelExportChartBOByStatus").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tabelExportChartBOByStatus_wrapper .col-md-6:eq(0)');

        $("#tabelExportChartBOByKategori").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tabelExportChartBOByKategori_wrapper .col-md-6:eq(0)');

    });
</script>

<!-- other -->