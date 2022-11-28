<?php
    $category = array();
    $container = array();
    $item = array();

    foreach($params['category'] as $cat => $value_1)
    {
        $category[$value_1->item_category_id] = $value_1;
    }

    foreach($params['container'] as $dtl => $value_2)
    {
        $container[$value_2->item_category_id][$value_2->pi_container_id] = $value_2;
    }

    foreach($params['detail'] as $dtl => $value_3)
    {
        if($value_3->qcontrol_check_id) {
            $item[$value_3->pi_item_category_id][$value_3->pi_container_id][$value_3->qcontrol_check_id] = $value_3;
        } else {
            $item[$value_3->pi_item_category_id][$value_3->pi_container_id][$value_3->pi_detail_id] = $value_3;
        }
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
            <h4 class="title" style="margin-bottom: 0px;">INVOICE</h4>
            <div class="title" style="font-size: 8px; margin-bottom: 3%;"><?=$params['header']->inv_no?></div>

            <div id="content" class="content">
                <div id="header" class="clearfix-content">
                    <div id="row">
                        <div class="box-name">PI NO.</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->pi_no?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">PO #</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->po_no?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">CONSIGNEE</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->consignee?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">NOTIFY</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->notify?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">BENEFICIARY</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->beneficiary?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">ETD EST.</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->estimated?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">DESTINATION</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->destination_port?></div>
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

                    <div id="row">
                        <div class="box-name">FFRN #</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->ffrn?></div>
                    </div>
                </div>

                <div id="detail" class="content">
                    <?php foreach($category as $cats => $rows_1) : ?>
                        <div class="title" style="font-size: 8px; margin-top: 2%; text-align: left; font-weight: bold;"><?=$rows_1->pi_item_category_name?></div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>CONTAINER</th>
                                    <th>HS CODE</th>
                                    <th>DESCRIPTION OF GOODS</th>
                                    <th>PACKING</th>
                                    <th>QTY</th>

                                    <?php if($params['header']->carton == 1) : ?>
                                    <th>CARTON BARCODE</th>
                                    <?php endif; ?>

                                    <?php if($params['header']->batch == 1) : ?>
                                    <th>BATCH</th>
                                    <?php endif; ?>

                                    <?php if($params['header']->production == 1) : ?>
                                    <th>PRODUCTION<br>DATE</th>
                                    <?php endif; ?>

                                    <?php if($params['header']->expired == 1) : ?>
                                    <th>EXPIRED<br>DATE</th>
                                    <?php endif; ?>

                                    <th>UNIT PRICE<br>(<?=$params['header']->currency_icon?>)</th>
                                    <th>TOTAL PRICE<br>(<?=$params['header']->currency_icon?>)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $tQty = 0;
                                    $tGrand = 0;
                                    foreach($container[$cats] as $cons => $rows_2) : 
                                ?>
                                    <?php 
                                        $no = 1;
                                        $row_1_cols_tot_incoterm = 4;
                                        $row_1_cols_qty_price = 2 + $params['header']->carton + $params['header']->batch + $params['header']->expired + $params['header']->production;
                                        $row_cols_ocean = 6 + $params['header']->carton + $params['header']->batch + $params['header']->expired + $params['header']->production;
                                        $row_cols_insurance = 6 + $params['header']->carton + $params['header']->batch + $params['header']->expired + $params['header']->production;
                                        $row_cols_grand = 6 + $params['header']->carton + $params['header']->batch + $params['header']->expired + $params['header']->production;
                                        $row_cols_says = 7 + $params['header']->carton + $params['header']->batch + $params['header']->expired + $params['header']->production;
                                        foreach($item[$cats][$cons] as $detail => $rows_3) : 
                                            $tQty += $rows_3->qty;
                                            $Grand = ($rows_3->qty * $rows_3->price);
                                            $tGrand += $Grand;
                                    ?>
                                        <tr>
                                            <?php if($no == 1) : ?>
                                                <td class="data-border" align="center" rowspan="<?=$rows_2->rowspan?>"><?=$rows_2->number_of_container?></td>
                                            <?php endif; ?>
                                            

                                            <td class="data-border" align="center"><?=($rows_3->hs_code)?></td>
                                            <td class="data-border"><?=($rows_3->item_name)?></td>
                                            <td class="data-border"><?=($rows_3->pack)?></td>
                                            <td class="data-border" align="right"><?=number_format($rows_3->qty)?></td>

                                            <?php if($params['header']->carton == 1) : ?>
                                            <td class="data-border" align="center"><?=($rows_3->cartons?$rows_3->cartons:'-')?></td>
                                            <?php endif; ?>

                                            <?php if($params['header']->batch == 1) : ?>
                                            <td class="data-border" align="center"><?=($rows_3->batchs?$rows_3->batchs:'-')?></td>
                                            <?php endif; ?>

                                            <?php if($params['header']->production == 1) : ?>
                                            <td class="data-border" align="center"><?=($rows_3->prod_date?$rows_3->prod_date:'-')?></td>
                                            <?php endif; ?>
                                            
                                            <?php if($params['header']->expired == 1) : ?>
                                            <td class="data-border" align="center"><?=($rows_3->exp_date?$rows_3->exp_date:'-')?></td>
                                            <?php endif; ?>

                                            <td class="data-border" align="right"><?=number_format($rows_3->price, 2)?></td>
                                            <td class="data-border" align="right"><?=number_format($rows_3->total, 2)?></td>
                                        </tr>
                                    <?php 
                                        $no++; endforeach;
                                        if($params['header']->incoterm_id == 3) {
                                            $totAll = $tGrand + $params['header']->freight_cost + $params['header']->insurance;
                                        } elseif($params['header']->incoterm_id == 2) {
                                            $totAll = $tGrand + $params['header']->freight_cost;
                                        } else {
                                            $totAll = $tGrand;
                                        }
                                        $said = CurencyLang::toEnglish($totAll);
                                    ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="data-border" style="text-align: left; font-weight: bold;" colspan="<?=$row_1_cols_tot_incoterm?>">TOTAL FOB <?=$params['header']->loading_port?></th>
                                    <td class="data-border" align="right"><?=number_format($tQty)?></td>
                                    <td class="data-border" colspan="<?=$row_1_cols_qty_price?>" align="right"><?=number_format($tGrand, 2)?></td>
                                </tr>
                                <?php if($cats == 1) : ?>
                                    <?php if($params['header']->incoterm_id <> 1) : ?>
                                        <?php if($params['header']->freight == 1) : ?>
                                            <tr>
                                                <td class="data-border" style="text-align: left; font-weight: bold;" colspan="<?=$row_cols_ocean?>">OCEAN FREIGHT</th>
                                                <td class="data-border" align="right"><?=number_format($params['header']->freight_cost, 2)?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php if($params['header']->incoterm_id <> 2) : ?>
                                        <?php if($params['header']->freight == 1) : ?>
                                            <tr>
                                                <td class="data-border" style="text-align: left; font-weight: bold;" colspan="<?=$row_cols_insurance?>">INSURANCE</th>
                                                <td class="data-border" align="right"><?=number_format($params['header']->insurance, 2)?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <tr>
                                        <td class="data-border" style="text-align: left; font-weight: bold;" colspan="<?=$row_cols_grand?>">GRAND TOTAL <?=$params['header']->incoterm.' '.$params['header']->destination_port?></th>
                                        <td class="data-border" align="right"><?=number_format($totAll, 2)?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td class="data-border" style="text-align: left; font-weight: bold;" colspan="<?=$row_cols_says?>">SAY: <?=strtoupper($said.' '.$params['header']->currency_spell)?></th>
                                    </tr>
                                <?php endif; ?>
                            </tfoot>
                        </table>
                    <?php endforeach; ?>
                </div>

                <div id="footer" class="content" style="margin-top: 1%;">
                    <?php 
                        $totCase = 0;
                        $totAmount = 0;
                        foreach($params['footer'] as $footer) : 
                            $totCase += $footer->tot_qty;
                            $totAmount += $footer->grand_total;
                    ?>
                        <div class="title" style="font-size: 8px; text-align: left; font-weight: bold;"><?=$footer->pi_item_category_name?></div>
                        <div style="margin-bottom: 1%;">
                            <div id="row">
                                <div class="box-name">NUMBER OF CASE</div>
                                <div class="box-colon">:</div>
                                <div class="box-value"><?=number_format($footer->tot_qty)?></div>
                            </div>
                            <div id="row">
                                <div class="box-name">AMOUNT</div>
                                <div class="box-colon">:</div>
                                <div class="box-value"><?=number_format($footer->grand_total, 2)?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="title" style="font-size: 8px; text-align: left; font-weight: bold;">GRAND TOTAL</div>
                    <div style="margin-bottom: 1%;">
                        <div id="row">
                            <div class="box-name">NUMBER OF CASE</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=number_format($totCase)?></div>
                        </div>
                        <div id="row">
                            <div class="box-name">AMOUNT</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=number_format($totAmount, 2)?></div>
                        </div>
                        <div id="row">
                            <div class="box-name">SAY</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=strtoupper(CurencyLang::toEnglish($totAmount).' '.$params['header']->currency_spell)?></div>
                        </div>
                    </div>
                </div>

                <div id="signature" style="margin-top: 2%; box-sizing: border-box; content: ''; clear: both; display: table;">
                    <div style="float: left; width: 20%; text-align: center;">
                        Kudus, <?=IndoDate?>
                        <div style="margin-top: 30%; font-weight: bold;"><u>Evi Susanti</u></div>
                        <div>Finance</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>