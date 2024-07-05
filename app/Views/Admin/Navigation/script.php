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

        if ($('#forminputkantor').length || $('#forminputaktivis').length || $('#formmutasiaktivis').length || $('#formmutasijabatanaktivis').length || $('#formuserloginaktivis').length || $('#forminputpic').length) {
            $.ajax({
                type: "POST",
                url: "../api/get",
                data: JSON.stringify({
                    table: 'aktivis',
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

            $.ajax({
                type: "POST",
                url: "../api/get",
                data: JSON.stringify({
                    table: 'user',
                }),
                dataType: "JSON",
                success: function(user) {
                    let dataUser = user.data;
                    // console.log(data);
                    let selectUser = $('select[name="inputUser"]');
                    selectUser.empty();
                    selectUser.append('<option value="">-- Pilih User --</option>'); // Add empty
                    $.each(dataUser, function(index, value) {
                        selectUser.append(`<option value = "${value.user_id}">${value.username} </option>`);
                    });
                }
            });

            $.ajax({
                type: "POST",
                url: "../api/get",
                data: JSON.stringify({
                    table: 'cabang',
                }),
                dataType: "JSON",
                success: function(response) {
                    let data = response.data;
                    // console.log(data);
                    let select = $('select[name="inputKantor"]');
                    select.empty();
                    select.append('<option value="">-- Pilih Kantor --</option>'); // Add empty option
                    $.each(data, function(index, value) {
                        select.append(`<option value = "${value.cabang_id}">${value.nama_cabang} </option>`);
                    });
                }
            });

            $.ajax({
                type: "POST",
                url: "../api/get",
                data: JSON.stringify({
                    table: 'jabatan',
                }),
                dataType: "JSON",
                success: function(jabaatan) {
                    let dataJabatan = jabaatan.data;
                    console.log(dataJabatan);
                    let selectJabatan = $('select[name="inputJabatan"]');
                    selectJabatan.empty();
                    selectJabatan.append('<option value="">-- Pilih Jabatan --</option>')
                    $.each(dataJabatan, function(indexJabatan, valueJabatan) {
                        selectJabatan.append(`<option value = "${valueJabatan.jabatan_id}">${valueJabatan.nama_jabatan} </option>`);
                    });
                }
            });

            $.ajax({
                type: "POST",
                url: "../api/get",
                data: JSON.stringify({
                    table: 'role',
                }),
                dataType: "JSON",
                success: function(role) {
                    let dataRole = role.data;
                    console.log(dataRole);
                    let selectRole = $('select[name="inputRole"]');
                    selectRole.empty();
                    selectRole.append('<option value="">-- Pilih Role --</option>')
                    $.each(dataRole, function(indexRole, valueRole) {
                        selectRole.append(`<option value = "${valueRole.role_id}">${valueRole.role_name} </option>`);
                    });
                }
            });

            $.ajax({
                type: "POST",
                url: "../api/get",
                data: JSON.stringify({
                    table: 'area',
                }),
                dataType: "JSON",
                success: function(response) {
                    let data = response.data;
                    // console.log(data);
                    let select = $('select[name="inputArea"]');
                    select.empty();
                    select.append('<option value="">-- Pilih Area --</option>'); // Add empty option
                    $.each(data, function(index, value) {
                        select.append(`<option value = "${value.area_id}"> ${value.nama_area} </option>`);
                    });
                }
            });
        }
    });

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
                data: [dataKantor],
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
                $('#forminputkantor')[0].reset();
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
                $('#forminputkantor')[0].reset();
                $('.select2').val(null).trigger('change');
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
            user_id: $('select[name="inputUser"]').val(),
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
        $("#tabelDataTiketDone").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tabelDataTiketDone_wrapper .col-md-6:eq(0)');

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

        $("#tabelDataKantor").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tabelDataKantor_wrapper .col-md-6:eq(0)');

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