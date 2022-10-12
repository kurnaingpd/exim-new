$(function () {
    flatpickr(".datetimepicker-input", {
        dateFormat: "Y",
        allowInput: false,
        disableMobile: "true",
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    });

    $("#trptcost").DataTable({
        "scrollX": true, "lengthChange": false,
        "buttons": [{
            "extend": 'excel',
            "text": '<i class="fas fa-file-excel mr-1"></i> Export to excel',
            'title': 'report_cost_leadtime_' + Math.floor(Math.random() * Date.now()),
            "className": 'border btn-success',
        }]
    }).buttons().container().appendTo('#trptcost_wrapper .col-md-6:eq(0)');
});