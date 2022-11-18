<?php
    $container = array();
    $category = array();
    $item = array();

    foreach($params['container'] as $cont => $value_1)
    {
        $container[$value_1->id] = $value_1;
    }

    foreach($params['category'] as $cat => $value_2)
    {
        $category[$value_2->id][$value_2->item_category_id] = $value_2;
    }

    foreach($params['detail'] as $dtl => $value_3)
    {
        $item[$value_3->id][$value_3->pi_item_category_id][$value_3->pi_detail_id] = $value_3;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=$title?></title>
        <?php
            if ( isset($css) ){
                foreach($css as $rows){
                    $exp = explode(",", $rows);
                    echo "<link type=\"{$exp[0]}\" rel=\"{$exp[1]}\" href=\"{$exp[2]}\" />\n";
                }
            }
        ?>
    </head>
    <body>
        <div id="container">
            <h4 class="title">PROFORMA INVOICE</h4>

            <div id="content" class="content">
                <div id="header" class="clearfix-content">
                    <div id="row">
                        <div class="box-name">INV NO</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->inv_no?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">PO NO</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->po_no?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">CONSIGNEE</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->consignee?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">BENEFICIARY</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->beneficiary?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">DESTINATION</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->destination_port?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">ETD EST.</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->estimated?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">LOADING PORT</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->loading_port?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">COUNTRY OF ORIGIN</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->country_origin?></div>
                    </div>
                </div>

                <div id="detail" class="content" style="margin-top: 1%;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>DESCRIPTION OF GOODS</th>
                                <th>PACKING</th>
                                <th>QTY</th>
                                <th>UNIT PRICE<br>(<?=$params['header']->incoterm?>)</th>
                                <th>TOTAL<br>(<?=$params['header']->currency_icon?>)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $totQty = 0;
                                $totPrice = 0;
                                $totGrand = 0;
                            ?>
                            <?php foreach($container as $nomor => $rows_1) : ?>
                                <tr>
                                    <td class="" style="border-style: solid;border-width: 1px;border-bottom-style: none;padding-top: 1%;"></td>
                                    <td class="" style="border-style: solid;border-width: 1px;border-bottom-style: none;padding-top: 1%;"></td>
                                    <td class="" style="border-style: solid;border-width: 1px;border-bottom-style: none;padding-top: 1%;"></td>
                                    <td class="" style="border-style: solid;border-width: 1px;border-bottom-style: none;padding-top: 1%;"></td>
                                    <td class="" style="border-style: solid;border-width: 1px;border-bottom-style: none;padding-top: 1%;"></td>
                                </tr>
                                <?php foreach($category[$nomor] as $cats => $rows_2) : ?>
                                    <tr>
                                        <td class="data"><b><?=$rows_2->item_category_name?></b></td>
                                        <td class="data"></td>
                                        <td class="data"></td>
                                        <td class="data"></td>
                                        <td class="data"></td>
                                    </tr>

                                    <?php foreach($item[$nomor][$cats] as $detail => $rows_3) : ?>
                                        <?php $grand = ($rows_3->qty * $rows_3->price); ?>
                                        <tr>
                                            <td class="data"><?=$rows_3->item_name?></td>
                                            <td class="data"><?=$rows_3->pack_desc?></td>
                                            <td class="data" align="right"><?=number_format($rows_3->qty)?></td>
                                            <td class="data" align="right"><?=$params['header']->currency_icon.' '.number_format($rows_3->price, 2)?></td>
                                            <td class="data" align="right"><?=$params['header']->currency_icon.' '.number_format($rows_3->total, 2)?></td>
                                        </tr>
                                        <?php
                                            $totQty += $rows_3->qty;
                                            $totPrice += $rows_3->price;
                                            $totGrand += $grand;
                                        ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <?php 
                                if($params['header']->incoterm_id == 3) : 
                                    $totGrand = ($totGrand + $params['header']->freight_cost + $params['header']->insurance);
                            ?>
                                <tr>
                                    <td class="foot">OCEAN FREIGHT</td>
                                    <td class="foot" align="right" colspan="4"><?=$params['header']->currency_icon.' '.number_format($params['header']->freight_cost, 2)?></td>
                                </tr>
                                <tr>
                                    <td class="foot">INSURANCE</td>
                                    <td class="foot" align="right" colspan="4"><?=$params['header']->currency_icon.' '.number_format($params['header']->insurance, 2)?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="foot">GRAND TOTAL <?=$params['header']->incoterm.' '.$params['header']->destination?></td>
                                <td class="foot"></td>
                                <td class="foot" align="right"><?=number_format($totQty)?></td>
                                <td class="foot" align="right"><?=$params['header']->currency_icon.' '.number_format($totPrice, 2)?></td>
                                <td class="foot" align="right"><?=$params['header']->currency_icon.' '.number_format($totGrand, 2)?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <hr>
                <div id="notes" style="margin-top: 1%;">
                    <b>Scheme Payment :</b>

                    <?php if($params['header']->top_id == 6) : ?>
                        <div>Please TT <?=$params['header']->dp?>% Before Production</div>
                        <div>Please TT <?=$params['header']->balancing?>% Before Shipment</div>
                        <div>Please TT To The Following Account :</div>
                    <?php else : ?>
                        <div><?=$params['header']->top_name?> From the Invoice Date</div>
                        <div>Please TT To The Following Account :</div>
                    <?php endif; ?>

                    <div id="row" style="margin-top: 2%;">
                        <div class="box-name">Bank Name</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->bank?></div>
                    </div>
                    <div id="row">
                        <div class="box-name">Beneficiary</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->beneficiary?></div>
                    </div>
                </div>

                <div id="signature" style="margin-top: 4%; box-sizing: border-box; content: ''; clear: both; display: table;">
                    <div style="float: left; width: 50%; text-align: center;">
                        Jakarta, <?=IndoDate?>
                        <div>
                            <img src="<?=base_url($params['signature']->signature)?>" height="18%">
                        </div>
                        <div><?=$params['signature']->pic?></div>
                        <div><?=$params['signature']->positions?></div>
                    </div>
                    <div style="float: left; width: 50%; text-align: center;">
                        <?=$params['signature']->town.', '.IndoDate?>
                        <div style="margin-top: 18%;"><?=$params['signature']->cp_name?></div>
                        <div><?=$params['signature']->company_name?></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>