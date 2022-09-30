$(function () {
    flatpickr(".datetimepicker-input", {
        dateFormat: "Y-m-d",
        mode: "range",
        allowInput: false,
        disableMobile: "true",
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    });

    $("#trptimport").DataTable({
        "responsive": true, "lengthChange": false, "scrollX": true,
        "buttons": [{
            "text": '<i class="far fa-file-excel mr-1"></i> Excel',
            "className": 'border btn-success',
            "action": function ( e, dt, node, config ) {
                window.location.href = site_url + "import/docimport/excel";
            }
        }]
    }).buttons().container().appendTo('#trptimport_wrapper .col-md-6:eq(0)');
});