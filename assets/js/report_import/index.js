$(function () {
    flatpickr(".datetimepicker-input", {
        dateFormat: "Y-m-d",
        allowInput: false,
        disableMobile: "true",
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    });

    var table = $("#trptimport").DataTable({
        "scrollX": true, "lengthChange": false, "processing": true, "serverSide": true, "order": [], "dom": 'Blfrtip',
        "ajax": {
            "url": site_url + "import/report_import/list",
            "type": "POST",
        },
        "columnDefs": [{ 
            "targets": [ 0 ],
            "orderable": false,
        }],
        "buttons": [{
            "extend": 'excel',
            "text": '<i class="fa fa-file-excel mr-2"></i>Excel',
            "className": 'border btn-success',
            "title": 'rpt_import_' + Math.floor(Math.random() * Date.now()),
            "action": newexportaction,
            customizeData: function (data) {
                for (var i = 0; i < data.body.length; i++) {
                    for (var j = 0; j < data.body[i].length; j++) {
                        data.body[i][j] = '\u200C' + data.body[i][j];
                    }
                }
            },
            customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row', sheet).attr('s', '0');
            }
        }]
    }).buttons().container().appendTo('#trptimport_wrapper .col-md-6:eq(0)');
});

function newexportaction(e, dt, button, config) {
    var self = this;
    var oldStart = dt.settings()[0]._iDisplayStart;
    dt.one('preXhr', function (e, s, data) {
        data.start = 0;
        data.length = 2147483647;
        dt.one('preDraw', function (e, settings) {
            if (button[0].className.indexOf('buttons-excel') >= 0) {
                $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
            }
            dt.one('preXhr', function (e, s, data) {
                settings._iDisplayStart = oldStart;
                data.start = oldStart;
            });
            setTimeout(dt.ajax.reload, 0);
            return false;
        });
    });
    dt.ajax.reload();
};