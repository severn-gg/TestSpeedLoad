  

<script>
    $(document).ready(function() {
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
        checkFormExist();
    });            

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

    function checkFormExist(callback) {
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
                fetchData('area', 'inputArea', '-- Pilih Area --', callback);
                break;

            case 'forminputaktivis':
                fetchData('jabatan', 'inputJabatan', '-- Pilih Jabatan --', callback);
                fetchData('cabang', 'inputKantor', '-- Pilih Kantor --', callback);
                break;

            case 'formmutasiaktivis':
                fetchData('aktivis', 'inputAktivis', '-- Pilih Aktivis --', callback);
                fetchData('cabang', 'inputKantor', '-- Pilih Kantor --', callback);
                break;

            case 'formmutasijabatanaktivis':
                fetchData('aktivis', 'inputAktivis', '-- Pilih Aktivis --', callback);
                fetchData('jabatan', 'inputJabatan', '-- Pilih Jabatan --', callback);
                break;

            case 'formuserloginaktivis':
                fetchData('aktivis', 'inputAktivis', '-- Pilih Aktivis --', callback);
                fetchData('role', 'inputRole', '-- Pilih Role --', callback);
                break;

            case 'forminputpic':
                fetchData('user_aktivis', 'inputAktivis', '-- Pilih User --', callback);
                fetchData('area', 'inputArea', '-- Pilih Area --', callback);
                break;
        }

        function fetchData(tableName, selectName, placeholder, callback) {
            $.ajax({
                type: "POST",
                url: "<?= site_url();?>/api/get",
                data: JSON.stringify({
                    table: tableName
                }),
                dataType: "JSON",
                success: function(response) {
                    let data = response.data;
                    let select = $(`select[name="${selectName}"]`);
                    select.empty();
                    select.append(`<option value="">${placeholder}</option>`); // Add empty option
                    if (tableName === 'user_aktivis') {
                        $.each(data, function(index, value) {
                            select.append(`<option value="${value['user_id']}">${value['username']}</option>`);
                        });
                    } else {
                        $.each(data, function(index, value) {
                            select.append(`<option value="${value[`${tableName}_id`]}">${value[`nama_${tableName}`]}</option>`);
                        });
                    }
                    // Call the callback if provided
                    if (typeof callback === 'function') {
                        callback();
                    }
                }
            });
        }
    }

    $(document).on('change', 'select[name="inputAktivis"]', function() {
        var selectedOption = $(this).find('option:selected'); // Get the selected option element
        var selectedValue = selectedOption.val(); // Get the value of the selected option

        // Check if selectedValue is not empty or undefined
        if(!$('#tabelDataLogin').length){
            if (selectedValue) {
                var selectedText = selectedOption.text(); // Get the text of the selected option
                var firstWord = selectedText.split(' ')[0].toLowerCase(); // Get the first word
    
                $('input[name="inputUsername"]').val(firstWord);
                $('input[name="inputPassword"]').val('123456!');
            }
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
        $('select[name="inputArea"]').val(rowData.area_id).trigger('change');

    });

    $(document).on('click', '#tabelDataLogin tbody .btn-warning', function(e) {
        e.preventDefault();

        // Get the row data using the DataTable API
        var table = $('#tabelDataLogin').DataTable();
        // Check if the clicked element is inside a "child row" created by the DataTables responsive plugin
        var row = $(this).closest('tr');

        if (row.hasClass('child')) {
            // If inside a "child row", find the parent row containing the actual data
            row = row.prev();
        }

        // Now get the row data from the DataTable instance
        var rowData = table.row(row).data();

        $('#modalBody').html(`
            <form id="formuserloginaktivis">
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="inputIdLog" value="${rowData.user_id}">
                        <label for="inputAktivis" class="form-label">Select Aktivis</label>
                        <select type="select" class="form-control select2" name="inputAktivis">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputRole" class="form-label">Select Role</label>
                        <select type="select" class="form-control select2" name="inputRole">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputUsername" class="form-label">Username</label>
                        <input class="form-control" type="text" name="inputUsername" value="${rowData.username}">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input class="form-control" type="text" name="inputPassword" value="${rowData.password_hash}">
                    </div>
                    <div class="form-group">
                        <label for="inputStatusActive" class="form-label">Select Status Active</label>
                        <select type="select" class="form-control" name="inputStatusActive">
                            <option value="1">Tidak Aktif</option>
                            <option value="2">Aktif</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        `);
        $('.modal-footer').hide();
        $('.modal-title').text('Edit Login');
        $('#addModal').modal('show');
        // Call checkFormExist and pass a callback
        checkFormExist(function() {
            // Initialize select2 after the options have been populated
            $('.select2').select2();

            // Set the value for the select field and trigger change event            
            $('select[name="inputAktivis"]').val(rowData.aktivis_id).trigger('change');
            $('select[name="inputAktivis"]').attr('disabled', true);
            $('select[name="inputRole"]').val(rowData.namagroup_id).trigger('change');
            $('select[name="inputRole"]').attr('disabled', true);
            $('select[name="inputStatusActive"]').val(rowData.active).trigger('change');
        });

    });

    $(document).on('click', '#tabelDataArea tbody .btn-warning', function(e) {
        e.preventDefault();

        // Get the row data using the DataTable API
        var table = $('#tabelDataArea').DataTable();
        var rowData = table.row($(this).closest('tr')).data();

        $('#modalBody').html(`
            <form id="forminputarea">
                <div class="form-group">
                    <label for="inputNamaKantor" class="form-label">Nama Kantor</label>
                    <input class="form-control" type="hidden" name="inputIdArea" value="${rowData.area_id}">
                    <input class="form-control" type="text" name="inputNamaArea" value="${rowData.nama_area}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        `);
        $('.modal-footer').hide();
        $('.modal-title').text('Edit Area');
        $('#addModal').modal('show');

    });

    $(document).on('click', '#tabelDataJabatan tbody .btn-warning', function(e) {
        e.preventDefault();

        // Get the row data using the DataTable API
        var table = $('#tabelDataJabatan').DataTable();
        var rowData = table.row($(this).closest('tr')).data();

        $('#modalBody').html(`
            <form id="forminputJabatan">
                <div class="form-group">
                    <label for="inputNamaKantor" class="form-label">Nama Kantor</label>
                    <input class="form-control" type="hidden" name="inputIdJabatan" value="${rowData.jabatan_id}">
                    <input class="form-control" type="text" name="inputNamaJabatan" value="${rowData.nama_jabatan}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        `);
        $('.modal-footer').hide();
        $('.modal-title').text('Edit Jabatan');
        $('#addModal').modal('show');

    });

    $(document).on('click', '#tabelDatapicArea tbody .btn-warning', function(e) {
        e.preventDefault();

        // Get the row data using the DataTable API
        var picId = $(this).data('pic_id');
        var userId = $(this).data('user_id');
        console.log("user Id : " + userId);
        console.log("pic Id : " + picId);
        var table = $('#tabelDatapicArea').DataTable();
        var rowData = table.row($(this).closest('tr')).data();
        console.log(rowData);
        $('#modalBody').html(`
            <form id="forminputpic">
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="picId" class="form-control" value="${picId}">                        
                        <label for="inputAktivis">Pilih Aktivis</label>
                        <select type="select" class="form-control select2" name="inputAktivis"></select>
                    </div>
                    <div class="form-group">
                        <label for="inputArea">Pilih Area</label>
                        <select type="select" class="form-control select2" name="inputArea">
                            <option value="">Dll</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary" id="btnSubmit">Reset</button>
                </div>
            </form>
        `);

        $('.modal-footer').hide();
        $('.modal-title').text('Edit PIC Area');
        $('#addModal').modal('show');

        // Call checkFormExist and pass a callback
        checkFormExist(function() {
            // Initialize select2 after the options have been populated
            $('.select2').select2();

            // Set the value for the select field and trigger change event
            $('select[name="inputAktivis"]').val(userId).trigger('change');
            $('select[name="inputArea"]').val(rowData.area_id).trigger('change');
        });
    });

    $(document).on('click', '#tabelDatapicArea tbody .btn-primary', function(e) {
        e.preventDefault();

        // Get the row data using the DataTable API
        var table = $('#tabelDatapicArea').DataTable();
        var rowData = table.row($(this).closest('tr')).data();

        $('#modalBody').html(`
            <form id="forminputpic">
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputAktivis">Pilih Aktivis</label>
                        <select type="select" class="form-control select2" name="inputAktivis"></select>
                    </div>
                    <div class="form-group">
                        <label for="inputArea">Pilih Area</label>
                        <select type="select" class="form-control select2" name="inputArea">
                            <option value="">Dll</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary" id="btnSubmit">Reset</button>
                </div>
            </form>
        `);

        $('.modal-footer').hide();
        $('.modal-title').text('Edit PIC Area');
        $('#addModal').modal('show');

        // Call checkFormExist and pass a callback
        checkFormExist(function() {
            // Initialize select2 after the options have been populated
            $('.select2').select2();

            // Set the value for the select field and trigger change event            
            $('select[name="inputArea"]').val(rowData.area_id).trigger('change');
        });
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
            url: "<?= site_url();?>/api/insert",
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
            url: "<?= site_url();?>/api/insert",
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
                        url: "<?= site_url();?>/api/insert",
                        data: JSON.stringify({
                            table: 'cabangaktivis',
                            data: [dataKantor],
                        }),
                        dataType: "JSON"
                    }),
                    $.ajax({
                        type: "POST",
                        url: "<?= site_url();?>/api/insert",
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

        var id = $('input[name="inputIdJabatan"]').val();
        var dataJabatan = {
            nama_jabatan: $('input[name="inputNamaJabatan"]').val()
        };
        $.ajax({
            type: "POST",
            url: "<?= site_url();?>/api/insert",
            data: JSON.stringify({
                table: 'jabatan',
                id: id,
                data: [dataJabatan],
            }),
            dataType: "JSON",
            success: function(response) {
                $('#addModal').modal('hide');
                $("#tabelDataJabatan").DataTable().ajax.reload();
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
    })

    $(document).on('submit', '#forminputarea', function(e) {
        e.preventDefault();

        var id = $('input[name="inputIdArea"]').val();
        var dataArea = {
            nama_area: $('input[name="inputNamaArea"]').val()
        };
        $.ajax({
            type: "POST",
            url: "<?= site_url();?>/api/insert",
            data: JSON.stringify({
                table: 'area',
                id: id,
                data: [dataArea],
            }),
            dataType: "JSON",
            success: function(response) {
                $('#addModal').modal('hide');
                $("#tabelDataArea").DataTable().ajax.reload();
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
            url: "<?= site_url();?>/api/insert",
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
            url: "<?= site_url();?>/api/insert",
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
            url: "<?= site_url();?>/api/insert",
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

        var id = $('input[name="inputIdLog"]').val();
        var dataLoginAktivis = {
            aktivis_id: $('select[name="inputAktivis"]').val(),
            username: $('input[name="inputUsername"]').val(),
            password_hash: $('input[name="inputPassword"]').val(),
            active: $('select[name = "inputStatusActive"]').val(),
            role_id: $('select[name = "inputRole"]').val(),
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
                if($("#tabelDataLogin").length){
                    $('#addModal').modal('hide');
                    $("#tabelDataLogin").DataTable().ajax.reload();
                }

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

        var id = $('input[name="picId"]').val();
        var dataPIC = {
            user_id: $('select[name="inputAktivis"]').val(),
            area_id: $('select[name = "inputArea"]').val(),
        };
        $.ajax({
            type: "POST",
            url: "<?= site_url();?>/api/insert",
            data: JSON.stringify({
                table: 'pic',
                id:id,
                data: [dataPIC],
            }),
            dataType: "JSON",
            success: function(response) {
                $('#addModal').modal('hide');
                $("#tabelDatapicArea").DataTable().ajax.reload();

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

    $(document).on('click', '#tabelDataTiketDone tbody .detail-btn', function() {

        // console.log("yes");
        var tiketAdmin = $('#tabelDataTiketDone').DataTable();
        // Check if the clicked element is inside a "child row" created by the DataTables responsive plugin
        var row = $(this).closest('tr');

        if (row.hasClass('child')) {
            // If inside a "child row", find the parent row containing the actual data
            row = row.prev();
        }

        var siteUrl = "<?= site_url() ?>";
        // Now get the row data from the DataTable instance
        var rowData = tiketAdmin.row(row).data();
        console.log(rowData);
        if (rowData && Object.keys(rowData).length !== 0) {
            $('#content').load(siteUrl + '/pic/tiketonprogressdetail', function(response, status, xhr) {
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
                    }
                });
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

            });
        } else {
            Swal.fire({
                title: "Warning",
                text: "Tidak ada data!",
                icon: "warning",
                timer: 2000,
            });
        }

    });

    $(document).on('click', '#tabelDatapicArea tbody .btn-danger', function(e) {
        e.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                var picId = $(this).data('pic_id');
                console.log("PIC Id : " + picId);
                var table = $('#tabelDatapicArea').DataTable();
                var rowData = table.row($(this).closest('tr')).data();
                console.log(rowData);

                $.ajax({
                    type: "delete",
                    url: "<?= site_url();?>/api/delete",
                    data: JSON.stringify({
                        table: 'pic',
                        id:picId,
                    }),
                    dataType: "JSON",
                    success: function (response) {
                        $("#tabelDatapicArea").DataTable().ajax.reload();

                        Swal.fire({
                            title: "Deleted!",
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
                            timer: 5000,
                        });

                        // Clear the form inputs
                        $('#forminputpic')[0].reset();
                        $('.select2').val(null).trigger('change');
                    }
                });
                
            }
        });
        
    })

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
        $("#tabelDataAktivis").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '<?= site_url();?>/api/get', // Your endpoint URL
                type: 'POST', // The HTTP method to use for the request (can be 'GET' or 'POST')                
                data: function() {
                    // Convert data to JSON
                    return JSON.stringify({
                        table: 'aktivis_cabang_view',
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
                    // return response.data;
                },
            },
            "columns": [{
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
                    data: 'nama_jabatan',
                    title: 'Jabatan'
                }, // Column for the Name
                {
                    data: 'nama_cabang',
                    title: 'Branch Office'
                }, // Column for the Name
                {
                    data: 'asal',
                    title: 'Asal'
                }, // Column for the Asal
                {
                    data: null,
                    title: 'Aksi',
                    defaultContent: '<button class="btn btn-xs btn-warning"><i class="bi bi-person-lines-fill"></i></button>'
                } // Action column for buttons, if needed
            ],
            "initComplete": function() {
                // Initialize buttons after the table has been fully initialized
                $("#tabelDataAktivis").DataTable().buttons().container()
                    .appendTo('#tabelDataAktivis_wrapper .col-md-6:eq(0)');
            },
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        });

        $("#tabelDataTiketDone").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '<?= site_url();?>/api/get', // Your endpoint URL
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
                        return response.data;
                    }
                    // return response.data;
                },
            },
            "columns": [{
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
                    title: 'status',
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

                }, // Column for the Asal
                {
                    data: 'status',
                    title: 'Aksi',
                    render: function(data, type, row) {
                        // Check the status and return a value for the Konfirmasi column
                        if (data !== 'Closed' && data === 'Solved') {
                            return '<button class="btn btn-sm btn-info detail-btn"> <i class="nav-icon fas fa-eye"></i></button>'; // Example value if status is not 'Closed'
                        } else if (data !== 'Closed' && data !== 'Solved' && data === 'In Progress') {
                            return '<button class="btn btn-sm btn-info detail-btn"> <i class="nav-icon fas fa-eye"></i></button> ';
                        } else if (data !== 'Closed' && data !== 'Solved' && data !== 'In Progress') {
                            return '<button class="btn btn-sm btn-info detail-btn"><i class="nav-icon fas fa-eye"></i></button>';
                        } else {
                            return '<span class="badge badge-success">Finish</span>'; // Example value if status is 'Closed'
                        }
                    }
                } // Action column for buttons, if needed
            ],
            "initComplete": function() {
                // Initialize buttons after the table has been fully initialized
                $("#tabelDataTiketDone").DataTable().buttons().container()
                    .appendTo('#tabelDataTiketDone_wrapper .col-md-6:eq(0)');
            },
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        });

        $("#tabelDataKantor").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '<?= site_url();?>/api/get', // Your endpoint URL
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

        $("#tabelDataLogin").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '<?= site_url();?>/api/get', // Your endpoint URL
                type: 'POST', // The HTTP method to use for the request (can be 'GET' or 'POST')                
                data: function() {
                    // Convert data to JSON
                    return JSON.stringify({
                        table: 'login_view',
                        id: ''
                    });
                },
                dataSrc: function(response) {
                    if (response.data === null) {
                        // No data available, return empty array
                        return [];
                    } else {
                        const filteredData = response.data.filter(function(item) {
                            return item['user_id'] !== '1';
                        });
                        return filteredData;
                    }
                    // return response.data;
                },
            },
            "columns": [{
                    data: 'user_id',
                    title: '#'
                }, // Column for the ID
                {
                    data: 'nama_pengguna',
                    title: 'Nama'
                }, // Column for the NIA
                {
                    data: 'username',
                    title: 'Username'
                }, // Column for the Name
                {
                    data: 'password_hash',
                    title: 'Password'
                },
                {
                    data: 'active',
                    title: 'Status',
                    render: function(data, type, row) {
                        let badgeClass = 'badge-secondary'; // Default badge class
                        let icon = ''; // Default icon

                        // Determine the appropriate badge class and icon based on the status
                        switch (data) {
                            case '1':
                                badgeClass = 'badge-secondary';
                                icon = '<i class="bi bi-x-circle-fill h6"> Not Activated</i>';
                                break;                            
                            default:
                                badgeClass = 'badge-success';
                                icon = '<i class="bi bi-check2-all h6"> Activated</i>'; // No icon for default
                                break;
                        }

                        // Return the HTML for the badge with the correct class and icon
                        return `<span class="badge ${badgeClass}">${icon}</span>`;
                    }
                },
                {
                    data: 'nama_group',
                    title: 'Level'
                },
                {
                    data: null,
                    title: 'Aksi',
                    defaultContent: '<button class="btn btn-xs btn-warning"><i class="nav-icon fas fa-pen"></i></button> ' + '<button class="btn btn-xs btn-danger"><i class="nav-icon fas fa-trash"></i></button>'
                } // Action column for buttons, if needed
            ],
            "initComplete": function() {
                // Initialize buttons after the table has been fully initialized
                $("#tabelDataLogin").DataTable().buttons().container()
                    .appendTo('#tabelDataLogin_wrapper .col-md-6:eq(0)');
            },
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        });

        $("#tabelDataArea").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '<?= site_url();?>/api/get', // Your endpoint URL
                type: 'POST', // The HTTP method to use for the request (can be 'GET' or 'POST')                
                data: function() {
                    // Convert data to JSON
                    return JSON.stringify({
                        table: 'area',
                        id: ''
                    });
                },
            },
            columns: [{
                    data: 'area_id',
                    title: '#'
                }, // Column for the ID
                {
                    data: 'nama_area',
                    title: 'Nama Area'
                }, // Column for the NIA
                {
                    data: null,
                    title: 'Aksi',
                    defaultContent: '<button class="btn btn-xs btn-warning"><i class="nav-icon fas fa-pen"></i></button> ' + '<button class="btn btn-xs btn-danger"><i class="nav-icon fas fa-trash"></i></button>'
                } // Action column for buttons, if needed
            ]
        });

        $("#tabelDatapicArea").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,            
            "ajax": {
                url: '<?= site_url();?>/api/get', // Your endpoint URL
                type: 'POST', // The HTTP method to use for the request (can be 'GET' or 'POST')                
                data: function() {
                    // Convert data to JSON
                    return JSON.stringify({
                        table: 'view_pic_detail',
                        id: ''
                    });
                },
            },
            "columns": [{
                    data: 'area_id',
                    title: '#'
                }, // Column for the ID
                {
                    data: 'nama_area',
                    title: 'Nama Area'
                }, // Column for the NIA
                {
                    data: 'PIC_Software',
                    title: 'PIC Software',
                    render: function(data, type, row) {
                        // Create a div container with text alignment set to right
                        let buttonHtml = '<div style="text-align: right;">';
                        
                        // Retrieve pic_id from row data (assuming row contains PIC_Software_pic_id)
                        let picId = row.PIC_Software_pic_id; // Replace with the correct field name
                        let userId = row.PIC_Software_user_id; // Replace with the correct field name
                        
                        if (data === null) {
                            buttonHtml += '<button class="btn btn-xs btn-primary"><i class="nav-icon fas fa-plus"></i></button>';
                        } else {
                            buttonHtml += data + 
                                ' <button class="btn btn-xs btn-warning" data-user_id="'+ userId +'" data-pic_id="' + picId + '"><i class="nav-icon fas fa-pen"></i></button> ' +
                                '<button class="btn btn-xs btn-danger" data-pic_id="' + picId + '"><i class="nav-icon fas fa-trash"></i></button>';
                        }

                        buttonHtml += '</div>'; // Close the div
                        return buttonHtml;
                    }
                },
                {
                    data: 'PIC_Hardware',
                    title: 'PIC Hardware',
                    render: function(data, type, row) {
                        // Create a div container with text alignment set to right
                        let buttonHtml = '<div style="text-align: right;">';
                        
                        // Retrieve pic_id from row data (assuming row contains PIC_Software_pic_id)
                        let picId = row.PIC_Hardware_pic_id; // Replace with the correct field name
                        let userId = row.PIC_Hardware_user_id;

                        if (data === null) {
                            buttonHtml += '<button class="btn btn-xs btn-primary"><i class="nav-icon fas fa-plus"></i></button>';
                        } else {
                            buttonHtml += data + 
                                ' <button class="btn btn-xs btn-warning" data-user_id="'+ userId +'" data-pic_id="' + picId + '"><i class="nav-icon fas fa-pen"></i></button> ' +
                                '<button class="btn btn-xs btn-danger" data-pic_id="' + picId + '"><i class="nav-icon fas fa-trash"></i></button>';
                        }

                        buttonHtml += '</div>'; // Close the div
                        return buttonHtml;
                    }
                }, // Column for the NIA
                {
                    data: 'PIC_Network',
                    title: 'PIC Network',
                    render: function(data, type, row) {
                        // Create a div container with text alignment set to right
                        let buttonHtml = '<div style="text-align: right;">';
                        
                        // Retrieve pic_id from row data (assuming row contains PIC_Software_pic_id)
                        let picId = row.PIC_Network_pic_id; // Replace with the correct field name
                        let userId = row.PIC_Network_user_id;

                        if (data === null) {
                            buttonHtml += '<button class="btn btn-xs btn-primary"><i class="nav-icon fas fa-plus"></i></button>';
                        } else {
                            buttonHtml += data + 
                                ' <button class="btn btn-xs btn-warning" data-user_id="'+ userId +'" data-pic_id="' + picId + '"><i class="nav-icon fas fa-pen"></i></button> ' +
                                '<button class="btn btn-xs btn-danger" data-pic_id="' + picId + '"><i class="nav-icon fas fa-trash"></i></button>';
                        }

                        buttonHtml += '</div>'; // Close the div
                        return buttonHtml;
                    }
                },
                {
                    data: 'PIC_LKD',
                    title: 'PIC LKD',
                    render: function(data, type, row) {
                        // Create a div container with text alignment set to right
                        let buttonHtml = '<div style="text-align: right;">';
                        
                        // Retrieve pic_id from row data (assuming row contains PIC_Software_pic_id)
                        let picId = row.PIC_LKD_pic_id; // Replace with the correct field name
                        let userId = row.PIC_LKD_user_id;

                        if (data === null) {
                            buttonHtml += '<button class="btn btn-xs btn-primary"><i class="nav-icon fas fa-plus"></i></button>';
                        } else {
                            buttonHtml += data + 
                                ' <button class="btn btn-xs btn-warning" data-user_id="'+ userId +'" data-pic_id="' + picId + '"><i class="nav-icon fas fa-pen"></i></button> ' +
                                '<button class="btn btn-xs btn-danger" data-pic_id="' + picId + '"><i class="nav-icon fas fa-trash"></i></button>';
                        }

                        buttonHtml += '</div>'; // Close the div
                        return buttonHtml;
                    }
                }
            ],
            "initComplete": function() {
                // Initialize buttons after the table has been fully initialized
                $("#tabelDatapicArea").DataTable().buttons().container()
                    .appendTo('#tabelDatapicArea_wrapper .col-md-6:eq(0)');
            },
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        });

        $("#tabelDataJabatan").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "ajax": {
                url: '<?= site_url();?>/api/get', // Your endpoint URL
                type: 'POST', // The HTTP method to use for the request (can be 'GET' or 'POST')                
                data: function() {
                    // Convert data to JSON
                    return JSON.stringify({
                        table: 'jabatan',
                        id: ''
                    });
                },
            },
            columns: [{
                    data: 'jabatan_id',
                    title: '#'
                }, // Column for the ID
                {
                    data: 'nama_jabatan',
                    title: 'Nama Jabatan'
                }, // Column for the NIA
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