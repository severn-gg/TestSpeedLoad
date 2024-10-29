<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<!-- <script src="<--?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<script src="<?= base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url('assets/dist/js/pages/dashboard.js') ?>"></script> -->
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>

<!-- causing menu responsive and menu dorpdwon not working -->
<!-- <script src="<?= base_url('/assets/dist/js/adminlte.min.js'); ?>"></script> -->
<!-- causing menu responsive and menu dorpdwon not working -->

<!-- DataTables  & Plugins -->
  <script src="<?= base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url();?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Select2 -->
<script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>

<!-- sweetalert2 -->
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>

<script>
$(document).ready(function(){

    var profilePic = $(".image-prof img");
        var userFile = $(".user-file");

        userFile.on("change", function() {
            var file = this.files[0];
            if (file) {
                profilePic.attr("src", URL.createObjectURL(file));
            }
        });
        
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
})

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

                    // Reload the specific user data
                    getAktivis('aktivis_id', id);

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
        } else {
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

</script>