$(function () {
    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $.validator.setDefaults({
        submitHandler: function () {
            var inputs = $('.docs').filter((i, el) => el.value.trim() === '').length;
            console.log(inputs)
            if(inputs == 45) {
                swal("", "Document import can not be empty.", "warning");
            } else {
                save();
            }
        }
    });

    $('#form-docpayment-add').validate({
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

$('select#po').on('change', function() {
    var data = $('select#po').select2('data');
    docpayment(data[0].id);
});

function docpayment(id)
{
    $.ajax({
        url: site_url + "import/docpayment/datas/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
            if(response) {
                document.getElementById("shipper").value = response.shipper;
                document.getElementById("consignee").value = response.consignee;
                document.getElementById("commodity").value = response.commodity;
                document.getElementById("bl").value = response.mbl;
                document.getElementById("pol").value = response.pol;
                document.getElementById("pod").value = response.pod;
                document.getElementById("etd").value = response.etd;
                document.getElementById("eta").value = response.eta;
                document.getElementById("pib_aju").value = response.pib_aju;
                document.getElementById("currency").value = response.currency;
                document.getElementById("cif").value = response.cif;
                document.getElementById("duty").value = response.duty;
                document.getElementById("vat").value = response.vat;
                document.getElementById("tax").value = response.tax;

                document.getElementById("cif_2").value = (
                    response.currency * response.cif
                );

                document.getElementById("duty_2").value = (
                    (response.currency * response.cif) * response.duty
                );

                document.getElementById("vat_2").value = (
                    (response.currency * response.cif) * response.vat
                );

                document.getElementById("tax_2").value = (
                    (response.currency * response.cif) * response.tax
                );

                document.getElementById("estimasi").value = (
                    (
                        (response.currency * response.cif) * response.duty
                    ) + (
                        (response.currency * response.cif) * response.vat
                    ) + (
                        (response.currency * response.cif) * response.tax
                    )
                );

                document.getElementById("actual").value = (
                    (
                        (response.currency * response.cif) * response.duty
                    ) + (
                        (response.currency * response.cif) * response.vat
                    ) + (
                        (response.currency * response.cif) * response.tax
                    )
                ).toFixed(0);
            } else {
                document.getElementById("shipper").value = "";
                document.getElementById("consignee").value = "";
                document.getElementById("commodity").value = "";
                document.getElementById("bl").value = "";
                document.getElementById("pol").value = "";
                document.getElementById("pod").value = "";
                document.getElementById("etd").value = "";
                document.getElementById("eta").value = "";
                document.getElementById("pib_aju").value = "";
                document.getElementById("currency").value = "";
                document.getElementById("cif").value = "";
                document.getElementById("duty").value = "";
                document.getElementById("vat").value = "";
                document.getElementById("tax").value = "";
                document.getElementById("cif_2").value = "";
                document.getElementById("duty_2").value = "";
                document.getElementById("vat_2").value = "";
                document.getElementById("tax_2").value = "";
                document.getElementById("estimasi").value = "";
                document.getElementById("actual").value = "";
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function save()
{
    $.ajax({
        url: site_url + "import/docpayment/save",
        type: "POST",
        data: $("#form-docpayment-add").serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button.save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('button.save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
                swal("", response.messages, response.icon).then((value) => {
                    window.location.href = site_url + response.url;
                });
            } else {
                swal("", response.messages, response.icon);
                $('button.save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
            $('button.save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}