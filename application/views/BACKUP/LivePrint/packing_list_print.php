<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Packing_list_Print</title>
        <style>
            table{
                border-collapse:collapse;  
                overflow: wrap;
            }
            td{
                border-collapse: collapse; 
                padding:3px;
                text-align: center;
            }
            .th{
                text-align: center;
            }

            .p_title {
                text-align: center; 
                font-weight:bold; 
                font-size:13px; 
                margin-bottom:-50px; 
                text-decoration:underline;
            }

            .p_nomor {
                text-align: center; 
                font-weight:bold; 
                margin-top:0px;
            }

            .td_title_header {
                text-align:left; 
                font-weight:bold; 
                border-width:0.5px; 
                width: 200px; 
                padding:5px; 
                font-size:10px;
            }

            .td_titik_header {
                text-align:left; 
                border-width:0.5px; 
                width: 20px; 
                padding:5px; 
                font-size:10px;
            }

            .td_data_header {
                vertical-align:middle; 
                text-align:left; 
                border-width:2px; 
                width: 460px; 
                padding:5px; 
                font-size:10px;
            }

            .td_title_detail {
                border:solid; 
                border-width:0.5px; 
                font-size:10px;
            }

            .td_data_detail {
                border:solid; 
                border-width:0.5px; 
                font-size:10px;
            }

            .td_sum {
                border:solid; 
                border-width:0.5px; 
                font-weight:bold;
            }
        </style>

    </head>
    <body>
        <p class="p_title">PACKING LIST</p>
        <p class="p_nomor"><?php echo $detailsdata_printpack->gexp_packlist_number; ?></p>

        <table>
            <tr>
                <td class="td_title_header">INVOICE NO.</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header"><?=$detailsdata_printpack->gexp_invoice_no?></td>
            </tr>
            <tr>
                <td class="td_title_header">PO</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header"><?=($detailsdata_printpack->gexp_pi_po?$detailsdata_printpack->gexp_pi_po:'-')?></td>
            </tr>
            <tr>
                <td class="td_title_header">CONSIGNEE</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header">
                    <?php
                        echo $detailsdata_printpack->ConsigPT.'<br>'.$detailsdata_printpack->ConsigAddr.'<br>'.$detailsdata_printpack->ConsigCtPhone.'<br>'.$detailsdata_printpack->ConsigCtName;
                    ?>
                </td>
            </tr>
            <tr>
                <td class="td_title_header">SHIPPER</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header">
                    <?php
                        echo $detailsdata_printpack->BenePT.'<br>'.$detailsdata_printpack->BeneAddr.'<br>'.$detailsdata_printpack->BeneCtPhone.'<br>'.$detailsdata_printpack->BeneCtName;
                    ?>
                </td>
            </tr>
            <tr>
                <td class="td_title_header">PORT OF DISCHARGE</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header"><?=$detailsdata_printpack->DischargeCust?></td>
            </tr>
            <tr>
                <td class="td_title_header">PORT OF LOADING</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header"><?=$detailsdata_printpack->LoadPortDesc?></td>
            </tr>
            <tr>
                <td class="td_title_header">COUNTRY OF ORIGIN</td>
                <td class="td_titik_header">:</td>
                <td class="td_data_header"><?=$detailsdata_printpack->CountryName?></td>
            </tr>
        </table>

        <table style="font-size: 10px; margin-top: 10px;">
            <tr>
                <td class="th td_title_detail">NO.</td>

                <?php if($print_check[0]->inv_print_carton_barcode=='1') : ?>
                    <td class="th td_title_detail">CARTOON BARCODE</td>
                <?php endif; ?>

                <td class="th td_title_detail">DESCRIPTION OF GOODS</td>
                <td class="th td_title_detail">HS CODE</td>
                <td class="th td_title_detail">PACKING</td>
                <td class="th td_title_detail">QTY</td>
                
                <?php if($print_check[0]->inv_print_batch=='1') : ?>
                    <td class="th td_title_detail">BATCH</td>
                <?php endif; ?>

                <?php if($print_check[0]->inv_print_expired_date=='1') : ?>
                    <td class="th td_title_detail">EXP. DATE</td>
                <?php endif; ?>

                <?php if($print_check[0]->inv_print_production_date=='1') : ?>
                    <td class="th td_title_detail">PRODUCTION DATE</td>
                <?php endif; ?>

                <td class="th td_title_detail">NET WEIGHT</td>
                <td class="th td_title_detail">GROSS WEIGHT</td>
                <td class="th td_title_detail">TOTAL MEASUREMENT<br>(CBM)</td>
                <td class="th td_title_detail">DIMENSION EACH CARTON<br>(MM)</td>
            </tr>

            <?php if(isset($lsdetails_data)) :
                $no_urut = 1;
                $tQty = 0;
                $tNetWeight = 0;
                $tGrossWeight = 0;
                $tCBM = 0;
                foreach($lsdetails_data as $gaa => $value) : 
                    $cbm = round(((($value->Length*$value->Width*$value->Height) / 1000000000) * $value->gexp_packlistdet_qty), 2);
            ?>
                <tr>
                    <td class="td_data_detail"><?=$no_urut;?>.</td>

                    <?php if($print_check[0]->inv_print_carton_barcode=='1') : ?>
                        <td class="td_data_detail"><?=$value->gexp_packlistdet_carton_bar?></td>
                    <?php endif; ?>

                    <td class="td_data_detail" align="left"><?=$value->gexp_packlistdet_descgod?></td>
                    <td class="td_data_detail"><?=$value->gexp_packlistdet_hscode?></td>
                    <td class="td_data_detail" align="left"><?=$value->gexp_packlistdet_packing?></td>
                    <td class="td_data_detail" align="right"><?=number_format($value->gexp_packlistdet_qty)?></td>

                    <?php if($print_check[0]->inv_print_batch=='1') : ?>
                        <td class="td_data_detail"><?=$value->gexp_packlistdet_batch?></td>
                    <?php endif; ?>

                    <?php if($print_check[0]->inv_print_expired_date=='1') : ?>
                        <td class="td_data_detail"><?=$value->gexp_packlistdet_expdate?></td>
                    <?php endif; ?>

                    <?php if($print_check[0]->inv_print_production_date=='1') : ?>
                        <td class="td_data_detail"><?=$value->gexp_packlistdet_proddate?></td>
                    <?php endif; ?>

                    <td class="td_data_detail" align="right"><?=number_format($value->gexp_packlistdet_netweight, 2)?></td>
                    <td class="td_data_detail" align="right"><?=number_format($value->gexp_packlistdet_grossweight, 2)?></td>
                    <td class="td_data_detail" align="right"><?=$cbm?></td>
                    <td class="td_data_detail"><?=$value->Length." x ".$value->Width." x ".$value->Height?></td>
                </tr>
            <?php 
                    $no_urut++;
                    $tQty += $value->gexp_packlistdet_qty;
                    $tNetWeight += $value->gexp_packlistdet_netweight;
                    $tGrossWeight += $value->gexp_packlistdet_grossweight;
                    $tCBM += $cbm;
                    endforeach; 
                endif; 
            ?>

            <tr>
                <td colspan="5" class="td_sum"><b>Total</b></td>
                <td align="right" class="td_sum"><b><?=number_format($tQty)?></b></td>
                <td class="td_sum"></td>
                <td class="td_sum"></td>
                <td class="td_sum"></td>
                <td align="right" class="td_sum"><b><?=number_format($tNetWeight, 2)?></b></td>
                <td align="right" class="td_sum"><b><?=number_format($tGrossWeight, 2)?></b></td>
                <td align="right" class="td_sum"><b><?=$tCBM?></b></td>
                <td class="td_sum"></td>
            </tr>
        </table>

        <table style="font-size: 10px; margin-top: 20px;">
            <tr>
                <td align="center">Kudus, <?=$detailsdata_printpack->gexp_packlist_date?></td>
            </tr>
            <tr>
                <!-- <td align="center" style="padding: 40px;"><?=strtoupper($detailsdata_printpack->print_name)?></td> -->
                <td align="center" style="padding: 40px;">EVAN GUSTIN</td>
            </tr>
        </table>
    </body>
</html>