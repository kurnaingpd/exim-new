<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Proforma_Invoice<?php echo $listdataPI_byId[0]->gexp_pi_no ?></title>
    </head>
    <style>
        table{margin:0px; font-size: 11px;}
        .table-data {
            border: 1px;
            border-style: solid;
            border-collapse: collapse;
        }

        .head {
            border: 1px;
            border-style: solid;
            padding: 3px;
        }

        .data {
            border: 1px;
            border-style: solid;
            border-top-style: none;
            border-bottom-style: none;
            padding: 3px;
        }

        .notes {
            padding: 3px;
        }
    </style>
    <body>
        <h3 style="font-weight: bold; text-align:center;">PROFORMA INVOICE</h3>
        <table style="width: 100%; margin-bottom: 10px; font-size:10px;">
            <tbody>
                <tr>
                    <td class="notes">PI NO</td>
                    <td class="notes">:</td>
                    <td class="notes"><?=$listdataPI_byId[0]->gexp_pi_no?></td>
                </tr>
                <tr>
                    <td class="notes">PO NO</td>
                    <td class="notes">:</td>
                    <td class="notes"><?=($listdataPI_byId[0]->gexp_pi_po?$listdataPI_byId[0]->gexp_pi_po:'-')?></td>
                </tr>
                <tr>
                    <td class="notes">CONSIGNEE</td>
                    <td class="notes">:</td>
                    <td class="notes">
                        <?=$listdataPI_byId[0]->Consig?><br>
                        <?=$listdataPI_byId[0]->Cons_addr?><br>
                        <?=$listdataPI_byId[0]->Cons_phone?>
                    </td>
                </tr>
                <tr>
                    <td class="notes">BENEFICIARY</td>
                    <td class="notes">:</td>
                    <td class="notes">
                        <?=$listdataPI_byId[0]->Benefi?><br>
                        <?=$listdataPI_byId[0]->Bene_addr?><br>
                        <?=$listdataPI_byId[0]->Bene_phone?>
                    </td>
                </tr>
                <tr>
                    <td class="notes">DESTINATION</td>
                    <td class="notes">:</td>
                    <td class="notes">
                        <?=$listdataPI_byId[0]->DestinatPort?>
                    </td>
                </tr>
                <tr>
                    <td class="notes">ETD EST</td>
                    <td class="notes">:</td>
                    <td class="notes">
                        30 Working Days
                    </td>
                </tr>
                <tr>
                    <td class="notes">LOADING PORT</td>
                    <td class="notes">:</td>
                    <td class="notes">
                        <?=$listdataPI_byId[0]->Loadport_Name?>
                    </td>
                </tr>
                <tr>
                    <td class="notes">COUNTRY OF ORIGIN</td>
                    <td class="notes">:</td>
                    <td class="notes">
                        INDONESIA
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table-data" style="width:100%; font-size:10px;">
            <thead>
                <tr>
                    <th class="head">DESCRIPTION OF GOODS</th>
                    <th class="head">PACKING</th>
                    <th class="head">QTY</th>
                    <th class="head">UNIT PRICE<br>( <?=$listdataPI_byId[0]->IncoCode?> )</th>
                    <th class="head">TOTAL<br>( <?=$listdataPI_byId[0]->icon?> )</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="data"><strong>1 x Container <?=$listdataPI_byId[0]->NamaContainer?></strong></td>
                    <td class="data"></td>
                    <td class="data"></td>
                    <td class="data"></td>
                    <td class="data"></td>
                </tr>

                <?php
                    if(isset($list_purchasegood)) :
                    foreach($list_purchasegood as $gaa) :
                ?>

                <tr>
                    <td class="data"><?=$gaa->ItemName?></td>
                    <td class="data"><?=$gaa->ItemPackDesc?></td>
                    <td class="data" align="right"><?=number_format($gaa->gexp_good_qty,0,",",".")?></td>
                    <td class="data" align="right"><?=$listdataPI_byId[0]->icon.' '.number_format($gaa->gexp_good_price,2,".",",")?></td>
                    <td class="data" align="right"><?=$listdataPI_byId[0]->icon.' '.number_format($gaa->gexp_good_totals,2,".",",")?></td>
                </tr>

                <?php
                    endforeach;
                    endif;
                ?>

                <tr>
                    <td class="data"><strong>Free Of Charge</strong></td>
                    <td class="data"></td>
                    <td class="data"></td>
                    <td class="data"></td>
                    <td class="data"></td>
                </tr>

                <?php
                    if(isset($list_freegood)) :
                    foreach($list_freegood as $gaa) :
                ?>

                <tr>
                    <td class="data"><?=$gaa->ItemName?></td>
                    <td class="data"><?=$gaa->ItemPackDesc?></td>
                    <td class="data" align="right"><?=number_format($gaa->gexp_good_qty,0,",",".")?></td>
                    <td class="data" align="right"><?=$listdataPI_byId[0]->icon.' '.number_format($gaa->gexp_good_price,2,".",",")?></td>
                    <td class="data" align="right"><?=$listdataPI_byId[0]->icon.' '.number_format($gaa->gexp_good_totals,2,".",",")?></td>
                </tr>

                <?php   
                    endforeach;
                    endif;
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <th class="head" align="left" colspan="2"><strong>GRAND TOTAL <?=$listdataPI_byId[0]->IncoCode?> <?=$listdataPI_byId[0]->tujuan?></strong></th>
                    <th class="head" align="right"><strong><?=number_format($totalqty_perinv->QTY_Total_all,0,",",".")?></strong></th>
                    <th class="head"><strong></strong></th>
                    <th class="head" align="right"><strong><?=$listdataPI_byId[0]->icon.' '.number_format($totalprice_perinv->Sum_Total_Price,2,".",",")?></strong></th>
                </tr>
            </tfoot>
        </table>

        <hr>
        <div style="font-size:10px;">
            <div style="padding: 2px;"><strong>Scheme Payment :</strong></div>
            <div style="padding: 2px;">Please TT 100%, <?=$listdataPI_byId[0]->TOPCust?> From BL Date</div>
            <div style="padding: 2px;">Please TT To The Following Account :</div>
        </div>

        <table style="width:100%; font-size:10px;">
            <tbody>
                <tr>
                    <td class="notes" style="width: 55%;">Bank Name</td>
                    <td class="notes" align="center">:</td>
                    <td class="notes" style="padding-left: 3px;">
                        <?=$listdataPI_byId[0]->Bank_name?><br>
                        <?=$listdataPI_byId[0]->Bank_office?><br>
                        <?=$listdataPI_byId[0]->Bank_addr?><br>
                        <b>Acc.No : </b><?=$listdataPI_byId[0]->Bank_acc?><br>
                        Swift Code : <?=$listdataPI_byId[0]->Bank_swiftcode?>
                    </td>
                </tr>

                <tr>
                    <td class="notes" style="width: 55%;">Beneficiary</td>
                    <td class="notes" align="center">:</td>
                    <td class="notes" style="padding-left: 3px;">
                        <?=$listdataPI_byId[0]->Benefi?><br>
                        <?=$listdataPI_byId[0]->Bene_office?><br>
                        <?=$listdataPI_byId[0]->Bene_addr?><br>
                        <?=$listdataPI_byId[0]->Bene_phone?>
                    </td>
                </tr>
            </tbody>
        </table>

        <table style="width:100%; font-size:10px; margin-top: 40px;">
            <tbody>
                <tr>
                    <td align="center" style="width: 50%;">Jakarta, <?=IndoDate?></td>
                    <td align="center" style="width: 50%;"><?=$listdataPI_byId[0]->Cons_Town?>, <?=IndoDate?></td>
                </tr>
                <tr>
                    <td align="center" style="padding-top: 60px;"><?=$listdataPI_byId[0]->PPIC?></td>
                    <td align="center" style="padding-top: 60px;"><?=$listdataPI_byId[0]->ConsigContactName?></td>
                </tr>
                <tr>
                    <td align="center"><?=$listdataPI_byId[0]->JabatanUser?></td>
                    <td align="center"><?=$listdataPI_byId[0]->Consig?></td>
                </tr>
            </tbody>
        </table>

        <div style="font-weight: bold; font-size:10px; margin-top: 70px;">Note : Please Sign This Proforma Invoice, fill the date and send back to us with PO as your confirmation</div>
    </body>
</html>