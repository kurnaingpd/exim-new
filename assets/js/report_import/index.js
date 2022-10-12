var tables;

$(function () {
    flatpickr(".datetimepicker-input", {
        dateFormat: "Y-m-d",
        allowInput: false,
        disableMobile: "true",
    });

    const $flatpickr = $(".datetimepicker-input").flatpickr();
    $(".clear-btn").click(function() {
        $flatpickr.clear();
    })

    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    });

    $('button#btn-filter').on('click',function() {
        let data = $("#form-nav-import").serialize();
        let html = '';
        $.ajax({
            type  : 'ajax',
            url   : site_url + 'import/report_import/html',
            type: 'POST',
            data: data,
            dataType : 'json',
            success : function(result){
                console.log(result);

                if(result != "") {
                    html += "<div style='height: 500px; overflow-y: auto;'>"+
                            "<div style='overflow-x:auto;'>"+
                            "<table id='trptimport' class='table table-sm table-bordered table-striped'>"+
                                "<thead>"+
                                    "<tr class='text-center'>"+
                                        "<th>#</th>"+
                                        "<th>PO</th>"+
                                        "<th>Shipment no.</th>"+
                                        "<th>Shipper</th>"+
                                        "<th>Seller</th>"+
                                        "<th>Consignee</th>"+
                                        "<th>Commodity</th>"+
                                        "<th>Category</th>"+
                                        "<th>HS code</th>"+
                                        "<th>Lartas</th>"+
                                        "<th>Incoterm</th>"+
                                        "<th>HBL</th>"+
                                        "<th>MBL</th>"+
                                        "<th>Qty container</th>"+
                                        "<th>Container no.</th>"+
                                        "<th>Goods qty</th>"+
                                        "<th>UOM</th>"+
                                        "<th>GW</th>"+
                                        "<th>NW</th>"+
                                        "<th>CBM</th>"+
                                        "<th>POL</th>"+
                                        "<th>POD</th>"+
                                        "<th>ETD</th>"+
                                        "<th>ETA</th>"+
                                        "<th>PIB AJU</th>"+
                                        "<th>COO</th>"+
                                        "<th>Masterlist</th>"+
                                        "<th>RCVD ori document</th>"+
                                        "<th>Billing</th>"+
                                        "<th>SPJM</th>"+
                                        "<th>SPJK</th>"+
                                        "<th>SPPB</th>"+
                                        "<th>Pickup DO</th>"+
                                        "<th>Delivery</th>"+
                                        "<th>Remarks</th>"+
                                        "<th>Currency</th>"+
                                        "<th>CIF</th>"+
                                        "<th>Duty</th>"+
                                        "<th>VAT</th>"+
                                        "<th>Tax</th>"+
                                        "<th>Freight<br>(Incl. VAT)</th>"+
                                        "<th>Handling<br>(Incl. VAT)</th>"+
                                        "<th>At cost</th>"+
                                        "<th>Additional</th>"+
                                        "<th>Lead time</th>"+
                                        "<th>Time</th>"+
                                        "<th>Percent</th>"+
                                        "<th>CIF 2</th>"+
                                        "<th>Landed cost</th>"+
                                        "<th>%</th>"+
                                        "<th>Forwarder</th>"+
                                    "</tr>"+
                                "</thead>"+
                                "<tbody>";
                    var i; var no = 1;
                    for(i=0; i<result.length; i++){
                    html += "<tr>"+
                                "<td class='align-middle'>"+no+".</td>"+
                                "<td class='align-middle'>"+result[i].po_no+"</td>"+
                                "<td class='align-middle'>"+result[i].shipment_no+"</td>"+
                                "<td class='align-middle'>"+result[i].shipper+"</td>"+
                                "<td class='align-middle'>"+result[i].seller+"</td>"+
                                "<td class='align-middle'>"+result[i].consignee+"</td>"+
                                "<td class='align-middle'>"+result[i].commodity+"</td>"+
                                "<td class='align-middle'>"+result[i].category+"</td>"+
                                "<td class='align-middle'>"+result[i].hs_code+"</td>"+
                                "<td class='align-middle'>"+result[i].lartas+"</td>"+
                                "<td class='align-middle'>"+result[i].incoterm+"</td>"+
                                "<td class='align-middle'>"+result[i].hbl+"</td>"+
                                "<td class='align-middle'>"+result[i].mbl+"</td>"+
                                "<td class='align-middle'>"+result[i].qty_container+"</td>"+
                                "<td class='align-middle'>"+result[i].container_no+"</td>"+
                                "<td class='align-middle'>"+result[i].goods_qty+"</td>"+
                                "<td class='align-middle'>"+result[i].uom+"</td>"+
                                "<td class='align-middle'>"+result[i].gross_weight+"</td>"+
                                "<td class='align-middle'>"+result[i].net_weight+"</td>"+
                                "<td class='align-middle'>"+result[i].cbm+"</td>"+
                                "<td class='align-middle'>"+result[i].pol+"</td>"+
                                "<td class='align-middle'>"+result[i].pod+"</td>"+
                                "<td class='align-middle'>"+result[i].etd+"</td>"+
                                "<td class='align-middle'>"+result[i].eta+"</td>"+
                                "<td class='align-middle'>"+result[i].pib_aju+"</td>"+
                                "<td class='align-middle'>"+result[i].coo+"</td>"+
                                "<td class='align-middle'>"+result[i].master_list+"</td>"+
                                "<td class='align-middle'>"+result[i].rcvd_ori_doc+"</td>"+
                                "<td class='align-middle'>"+result[i].billing+"</td>"+
                                "<td class='align-middle'>"+result[i].spjm+"</td>"+
                                "<td class='align-middle'>"+result[i].spjk+"</td>"+
                                "<td class='align-middle'>"+result[i].sppb+"</td>"+
                                "<td class='align-middle'>"+result[i].pickup_do+"</td>"+
                                "<td class='align-middle'>"+result[i].delivery+"</td>"+
                                "<td class='align-middle'>"+result[i].remarks+"</td>"+
                                "<td class='align-middle'>"+result[i].currency+"</td>"+
                                "<td class='align-middle'>"+result[i].cif+"</td>"+
                                "<td class='align-middle'>"+result[i].duty+"</td>"+
                                "<td class='align-middle'>"+result[i].vat+"</td>"+
                                "<td class='align-middle'>"+result[i].tax+"</td>"+
                                "<td class='align-middle'>"+result[i].freight+"</td>"+
                                "<td class='align-middle'>"+result[i].handling+"</td>"+
                                "<td class='align-middle'>"+result[i].at_cost+"</td>"+
                                "<td class='align-middle'>"+result[i].additional+"</td>"+
                                "<td class='align-middle'>"+result[i].lead_time+"</td>"+
                                "<td class='align-middle'>"+result[i].time+"</td>"+
                                "<td class='align-middle'>"+result[i].percent+"</td>"+
                                "<td class='align-middle'>"+result[i].cif2+"</td>"+
                                "<td class='align-middle'>"+result[i].landed_cost+"</td>"+
                                "<td class='align-middle'>"+result[i].percentage+"</td>"+
                                "<td class='align-middle'>"+result[i].forwarder+"</td>"+
                            "</tr>";
                    no++;
                    }
    
                    html += "</tbody></table></div></div>";
                    $('#load_data').html(html);
                } else {
                    swal("", "Data not found.", "info");
                    $('#load_data').html("");
                }
            }
        });
    });

    $('button#btn-generate').on('click',function() {
        $("#trptimport").table2excel({
            filename: "report_doc_import_" + Math.floor(Math.random() * Date.now()),
        });
    });

    $('button#btn-reset').on('click',function() {
        document.getElementById("form-nav-import").reset();
        $(".docs").val('').trigger('change');
        $("#load_data").html("");
    });
});