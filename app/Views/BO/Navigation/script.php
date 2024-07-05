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
    $(document).ready(function name(params) {

        $('button[type="reset"]').click(function() {
            // Reset Select2 elements
            $('.select2').val(null).trigger('change');

            // If you want to reset to a specific option, you can do it like this:
            // $('select[name="inputAktivis"]').val('default_value').trigger('change');
            // $('select[name="inputRole"]').val('default_value').trigger('change');
            // $('select[name="inputStatusActive"]').val('default_value').trigger('change');
        });

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
    })
    // script datatables
    $(function() {
        $('.select2').select2()
        // Tables
        $("#tabelDataTiket").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tabelDataTiket_wrapper .col-md-6:eq(0)');

    });
</script>