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

        if ($('#forminputaktivis').length) {
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
                        select.append(`<option value = "${value.cabang_id}"> ${value.nama_cabang} </option>`);
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
                        selectJabatan.append(`<option value = "${valueJabatan.jabatan_id}"> ${valueJabatan.nama_jabatan} </option>`);
                    });
                }
            });
        }

        if ($('#forminputkantor').length) {
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

        if ($('#formmutasiaktivis').length || $('#formmutasijabatanaktivis').length) {
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
                        select.append(`<option value = "${value.aktivis_id}"> ${value.nama_aktivis} </option>`);
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
                        select.append(`<option value = "${value.cabang_id}"> ${value.nama_cabang} </option>`);
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
                        selectJabatan.append(`<option value = "${valueJabatan.jabatan_id}"> ${valueJabatan.nama_jabatan} </option>`);
                    });
                }
            });
        }
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