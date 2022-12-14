<?php
    $container = array();
    $detail = array();
    
    foreach($params['container'] as $cont => $value_1)
    {
        $container[$value_1->pi_container_id] = $value_1;
    }

    foreach($params['detail'] as $details => $value_2)
    {
        $detail[$value_2->pi_container_id][$value_2->id] = $value_2;
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
            <h6 class="title" style="margin-bottom: 0px;"><u>PACKING LIST</u></h6>
            <div class="title" style="font-size: 8px; margin-bottom: 1%;">No. <?=$params['header']->code?></div>

            <div id="content" class="content">
                <div id="header" class="clearfix-content">
                    <div id="row">
                        <div class="box-name">INVOICE NO.</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->invoice_no?></div>
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
                        <div class="box-name">SHIPPER</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->beneficiary?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">PORT OF DISCHARGE</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->discharge_port?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">PORT OF LOADING</div>
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
                        <?php 
                            $totGrandQty = 0;
                            $totGrandNet = 0;
                            $totGrandGross = 0;
                            $totGrandCBM = 0;
                            foreach($container as $rows_1 => $vals_1) : 
                        ?>
                            <thead>
                                <tr>
                                    <th>NO. PO/<br>NO. CONTAINER/<br>NO. SEAL</th>

                                    <?php if($params['header']->carton == 1) : ?>
                                    <th>CARTON BARCODE</th>
                                    <?php endif; ?>
                                    
                                    <th>DESCRIPTION OF GOODS</th>
                                    <th>HS CODE</th>
                                    <th>PACKING</th>
                                    <th>QTY</th>

                                    <?php if($params['header']->batch == 1) : ?>
                                    <th>BATCH</th>
                                    <?php endif; ?>
                                    
                                    <?php if($params['header']->production == 1) : ?>
                                    <th>PRODUCTION<br>DATE</th>
                                    <?php endif; ?>

                                    <?php if($params['header']->expired == 1) : ?>
                                    <th>EXPIRED<br>DATE</th>
                                    <?php endif; ?>

                                    <th>NET WEIGHT</th>
                                    <th>GROSS WEIGHT</th>
                                    <th>TOTAL MEASUREMENT<br>(CBM)</th>
                                    <th>DIMENSION EACH CARTON<br>(MM)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $totQty = 0;
                                    $totNet = 0;
                                    $totGross = 0;
                                    $totCBM = 0;
                                    foreach($detail[$rows_1] as $rows_2 => $vals_2) :
                                        $cols_total = 4 + $params['header']->carton;
                                        $totQty += $vals_2->tot_qty;
                                        $totNet += $vals_2->net_wight;
                                        $totGross += $vals_2->gross_weight;
                                        $totCBM += $vals_2->cbm_item;
                                ?>
                                <tr>
                                    <?php if($no==1) : ?>
                                        <td class="data-border" align="center" rowspan="<?=$vals_1->rowspan?>"><?=$vals_2->container?></td>
                                    <?php endif; ?>

                                    <?php if($params['header']->carton == 1) : ?>
                                        <td class="data-border" align="center"><?=$vals_2->carton_barcode?></td>
                                    <?php endif; ?>

                                    <td class="data-border"><?=$vals_2->item_name?></td>
                                    <td class="data-border" align="center"><?=$vals_2->hs_code?></td>
                                    <td class="data-border" align="center"><?=$vals_2->packing?></td>
                                    <td class="data-border" align="right"><?=number_format($vals_2->tot_qty)?></td>

                                    <?php if($params['header']->batch == 1) : ?>
                                        <td class="data-border" align="center"><?=$vals_2->batch?></td>
                                    <?php endif; ?>
                                    
                                    <?php if($params['header']->production == 1) : ?>
                                        <td class="data-border"><?=$vals_2->production_date?></td>
                                    <?php endif; ?>

                                    <?php if($params['header']->expired == 1) : ?>
                                        <td class="data-border"><?=$vals_2->expired_date?></td>
                                    <?php endif; ?>

                                    <td class="data-border" align="center"><?=number_format($vals_2->net_wight, 2)?></td>
                                    <td class="data-border" align="center"><?=number_format($vals_2->gross_weight, 2)?></td>
                                    <td class="data-border" align="center"><?=round($vals_2->cbm_item, 4)?></td>
                                    <td class="data-border" align="center"><?=$vals_2->dimensions?></td>
                                </tr>
                                <?php
                                        $no++;
                                    endforeach;
                                ?>
                                <tr>
                                    <td class="summary" style="text-align: left; padding: 1%; font-weight: bold;" colspan="<?=$cols_total?>">TOTAL</td>
                                    <td align="center" class="summary"><?=number_format($totQty)?></td>
                                    
                                    <?php if($params['header']->batch == 1) : ?>
                                    <td class="summary"></td>
                                    <?php endif; ?>

                                    <?php if($params['header']->expired == 1) : ?>
                                    <td class="summary"></td>
                                    <?php endif; ?>

                                    <?php if($params['header']->production == 1) : ?>
                                    <td class="summary"></td>
                                    <?php endif; ?>

                                    <td class="summary" align="center"><?=number_format($totNet, 2)?></td>
                                    <td class="summary" align="center"><?=number_format($totGross, 2)?></td>
                                    <td class="summary" align="center"><?=round($totCBM, 4)?></td>
                                    <td class="summary"></td>
                                </tr>
                            </tbody>
                        <?php 
                                $totGrandQty += $totQty;
                                $totGrandNet += $totNet;
                                $totGrandGross += $totGross;
                                $totGrandCBM += $totCBM;
                            endforeach; 
                        ?>
                        <tfoot>
                            <tr>
                                <td class="summary" style="text-align: left; padding: 1%; font-weight: bold;" colspan="<?=$cols_total?>">GRAND TOTAL</td>
                                <td align="center" class="summary"><?=number_format($totGrandQty)?></td>
                                
                                <?php if($params['header']->batch == 1) : ?>
                                <td class="summary"></td>
                                <?php endif; ?>

                                <?php if($params['header']->expired == 1) : ?>
                                <td class="summary"></td>
                                <?php endif; ?>

                                <?php if($params['header']->production == 1) : ?>
                                <td class="summary"></td>
                                <?php endif; ?>

                                <td class="summary" align="center"><?=number_format($totGrandNet, 2)?></td>
                                <td class="summary" align="center"><?=number_format($totGrandGross, 2)?></td>
                                <td class="summary" align="center"><?=round($totGrandCBM, 4)?></td>
                                <td class="summary"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div id="signature" style="margin-top: 3%; box-sizing: border-box; content: ''; clear: both; display: table;">
                    <div style="float: left; width: 20%; text-align: center;">
                        Kudus, <?=IndoDate?>
                        <div style="margin-top: 30%;">EVAN GUSTIN</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>