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
            <div class="title" style="font-size: 8px; margin-bottom: 3%;">0001/SKP-EXT/INV/09/2022</div>

            <div id="content" class="content">
                <div id="header" class="clearfix-content">
                    <div id="row">
                        <div class="box-name">PI NO.</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->inv_no?></div>
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
                        <div class="box-value"><?=$params['header']->beneficiary?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">BENEFICIAY</div>
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

                <div id="detail" class="content" style="margin-top: 2%;">
                    <?php foreach($params['category'] as $group => $item) : ?>
                        <div class="title" style="font-size: 8px; margin-top: 2%; text-align: left; font-weight: bold;"><?=$item['pi_item_category_name']?></div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NO.</th>

                                    <?php if($params['header']->carton == 1) : ?>
                                    <th>CARTON BARCODE</th>
                                    <?php endif; ?>

                                    <th>CONTAINER</th>
                                    <th>HS CODE</th>
                                    <th>DESCRIPTION OF GOODS</th>
                                    <th>PACKING</th>
                                    <th>QTY</th>

                                    <?php if($params['header']->batch == 1) : ?>
                                    <th>BATCH</th>
                                    <?php endif; ?>

                                    <?php if($params['header']->expired == 1) : ?>
                                    <th>EXPIRED<br>DATE</th>
                                    <?php endif; ?>

                                    <?php if($params['header']->production == 1) : ?>
                                    <th>PRODUCTION<br>DATE</th>
                                    <?php endif; ?>

                                    <th>UNIT PRICE<br>(<?=$params['header']->currency_icon?>)</th>
                                    <th>TOTAL PRICE<br>(<?=$params['header']->currency_icon?>)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $tQty = 0;
                                    $Grand = 0;
                                    $tGrand = 0;
                                    $row_1_cols_tot_incoterm = 5 + $params['header']->carton;
                                    $row_1_cols_qty_price = 2 + $params['header']->batch + $params['header']->expired + $params['header']->production;
                                    $row_cols_ocean = 7 + $params['header']->carton + $params['header']->batch + $params['header']->expired + $params['header']->production;
                                    $row_cols_insurance = 7 + $params['header']->carton + $params['header']->batch + $params['header']->expired + $params['header']->production;
                                    $row_cols_grand = 7 + $params['header']->carton + $params['header']->batch + $params['header']->expired + $params['header']->production;
                                    $row_cols_says = 8 + $params['header']->carton + $params['header']->batch + $params['header']->expired + $params['header']->production;

                                    foreach($params['detail'][$group] as $detail => $dtl) :
                                        $tQty += $dtl['qty'];
                                        $Grand = ($dtl['qty'] * $dtl['price']);
                                        $tGrand += $Grand;
                                ?>
                                <tr>
                                    <td class="data-border" align="center"><?=$no?>.</td>

                                    <?php if($params['header']->carton == 1) : ?>
                                    <td class="data-border" align="center"><?=($dtl['carton_barcode']?$dtl['carton_barcode']:'-')?></td>
                                    <?php endif; ?>

                                    <td class="data-border" align="center"><?=$params['header']->number_of_container?></td>
                                    <td class="data-border" align="center"><?=($dtl['hs_code'])?></td>
                                    <td class="data-border"><?=($dtl['item_name'])?></td>
                                    <td class="data-border"><?=($dtl['pack'])?></td>
                                    <td class="data-border" align="right"><?=number_format($dtl['qty'])?></td>

                                    <?php if($params['header']->batch == 1) : ?>
                                    <td class="data-border" align="center"><?=($dtl['batch']?$dtl['batch']:'-')?></td>
                                    <?php endif; ?>
                                    
                                    <?php if($params['header']->expired == 1) : ?>
                                    <td class="data-border" align="center"><?=($dtl['expired_date']?$dtl['expired_date']:'-')?></td>
                                    <?php endif; ?>

                                    <?php if($params['header']->production == 1) : ?>
                                    <td class="data-border" align="center"><?=($dtl['production_date']?$dtl['production_date']:'-')?></td>
                                    <?php endif; ?>

                                    <td class="data-border" align="right"><?=number_format($dtl['price'], 2)?></td>
                                    <td class="data-border" align="right"><?=number_format($dtl['total'], 2)?></td>
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
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="data-border" style="text-align: left; font-weight: bold;" colspan="<?=$row_1_cols_tot_incoterm?>">TOTAL FOB <?=$params['header']->loading_port?></th>
                                    <td class="data-border" align="right"><?=number_format($tQty)?></td>
                                    <td class="data-border" colspan="<?=$row_1_cols_qty_price?>" align="right"><?=number_format($tGrand, 2)?></td>
                                </tr>
                                <?php if($group == 1) : ?>
                                    <?php if($params['header']->incoterm_id <> 1) : ?>
                                    <tr>
                                        <td class="data-border" style="text-align: left; font-weight: bold;" colspan="<?=$row_cols_ocean?>">OCEAN FREIGHT</th>
                                        <td class="data-border" align="right"><?=number_format($params['header']->freight_cost, 2)?></td>
                                    </tr>
                                    <tr>
                                        <td class="data-border" style="text-align: left; font-weight: bold;" colspan="<?=$row_cols_insurance?>">INSURANCE</th>
                                        <td class="data-border" align="right"><?=number_format($params['header']->insurance, 2)?></td>
                                    </tr>
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