$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $(".datetimepicker-input").css("background-color", "#FFF");

    flatpickr(".datetimepicker-input", {
        dateFormat: "Y-m-d",
        allowInput: false,
        disableMobile: "true",
    });

    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $("#tpackingitemlist").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false, "searching": false, "paging": false, "info": false
    });

    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });

    $('#form-packing-add').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});

$('select#invoice').on('change', function() {
    var data = $('select#invoice').select2('data');
    get_data(data[0].id);
    get_data_item(data[0].id);
});

function get_data(id)
{
    $.ajax({
        url: site_url + "export/packing/data/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response);
            if(response) {
                document.getElementById("pi_id").value = response.pi_id;
                document.getElementById("cons_company").value = response.cons_name;
                document.getElementById("cons_address").value = response.cons_address;
                document.getElementById("cons_country").value = response.cons_country_name;
                document.getElementById("cons_phone").value = response.cons_phone;
                document.getElementById("cons_cp").value = response.cp_name;

                document.getElementById("not_company").value = response.not_name;
                document.getElementById("not_address").value = response.not_address;
                document.getElementById("not_country").value = response.not_country_name;
                document.getElementById("not_phone").value = response.not_phone;
                document.getElementById("not_cp").value = response.cp_name;

                document.getElementById("ship_company").value = response.ship_name;
                document.getElementById("ship_address").value = response.ship_address;
                document.getElementById("ship_discharge").value = response.discharge_port;
                document.getElementById("ship_loading").value = response.loading_port;
                document.getElementById("ship_country").value = response.country_origin;
            } else {
                document.getElementById("pi_id").value = "";
                document.getElementById("cons_company").value = "";
                document.getElementById("cons_address").value = "";
                document.getElementById("cons_country").value = "";
                document.getElementById("cons_phone").value = "";
                document.getElementById("cons_cp").value = "";

                document.getElementById("not_company").value = "";
                document.getElementById("not_address").value = "";
                document.getElementById("not_country").value = "";
                document.getElementById("not_phone").value = "";
                document.getElementById("not_cp").value = "";

                document.getElementById("ship_company").value = "";
                document.getElementById("ship_address").value = "";
                document.getElementById("ship_discharge").value = "";
                document.getElementById("ship_loading").value = "";
                document.getElementById("ship_country").value = "";
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function get_data_item(id)
{
    $.ajax({
        type  : 'ajax',
        url: site_url + "export/packing/item/" + id,
        async : false,
        dataType : 'json',
        success : function(data){
            if(data) {
                var html = '';
                var i;
                var no = 1
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                                '<td class="text-center">'+no+'.</td>'+
                                '<td>'+
                                    '<input type="text" class="form-control" id="grid_carton_'+data[i].pi_detail_id+'" name="grid_carton_'+data[i].pi_detail_id+'" required>'+
                                '</td>'+
                                '<td>'+data[i].item_name+'</td>'+
                                '<td class="text-center">'+data[i].hs_code+'</td>'+
                                '<td>'+data[i].pack_desc+'</td>'+
                                '<td class="text-right">'+
                                    '<input type="text" class="form-control text-right" id="grid_qty_'+data[i].pi_detail_id+'" name="grid_qty_'+data[i].pi_detail_id+'" value="'+data[i].qty+'" required>'+
                                '</td>'+
                                '<td><input type="text" class="form-control" id="grid_batch_'+data[i].pi_detail_id+'" name="grid_batch_'+data[i].pi_detail_id+'" required></td>'+
                                '<td><input type="text" class="form-control" id="grid_expdate_'+data[i].pi_detail_id+'" name="grid_expdate_'+data[i].pi_detail_id+'" required></td>'+
                                '<td><input type="text" class="form-control" id="grid_proddate_'+data[i].pi_detail_id+'" name="grid_proddate_'+data[i].pi_detail_id+'" required></td>'+
                                '<td class="text-right">'+data[i].net_wight+'</td>'+
                                '<td class="text-right">'+data[i].gross_weight+'</td>'+
                                '<td class="text-center">'+data[i].dimensions+'</td>'+
                            '</tr>';
                    no++;
                }
                $('#show-data').html(html);
            } else {
                $('#show-data').html('');
            }
        }

    });
}

function save()
{
    $.ajax({
        url: site_url + "export/packing/save",
        type: "POST",
        data: $("#form-packing-add").serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-packing-save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', true);
                $('button#btn-packing-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
                swal("", response.messages, response.icon).then((value) => {
                    window.location.href = site_url + response.url;
                });
            } else {
                swal("", response.messages, response.icon);
                $('a.cancel').prop('disabled', false);
                $('button#btn-packing-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
            $('a.cancel').prop('disabled', false);
            $('button#btn-packing-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}