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
            <h3 class="title">CERTIFICATE OF ANALYSYS</h3>

            <div id="content" class="content">
                <div id="header" class="clearfix-content">
                    <div id="row">
                        <div class="box-name" style="font-weight: bold;">PRODUCT NAME</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['detail']->item_name?></div>
                    </div>

                    <div id="row">
                        <div class="box-name" style="font-weight: bold;">BATCH NUMBER</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['detail']->batch?></div>
                    </div>

                    <div id="row">
                        <div class="box-name" style="font-weight: bold;">PROD. DATE - EXP.DATE</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['detail']->prod_exp?></div>
                    </div>

                    <div id="organoleptic">
                        <div style="margin-top: 2%; font-weight: bold;">ORGANOLEPTIC TEST</div>
                        <div id="row">
                            <div class="box-name">Aroma</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->aroma?></div>
                        </div>

                        <div id="row">
                            <div class="box-name">Taste</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->taste?></div>
                        </div>
                    </div>
                    
                    <div id="phisical">
                        <div style="margin-top: 2%; font-weight: bold;">PHISICAL & CHEMICAL TEST</div>
                        <div id="row">
                            <div class="box-name">Moisture</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->moisture?></div>
                        </div>

                        <div id="row">
                            <div class="box-name">pH</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->ph?></div>
                        </div>

                        <div id="row">
                            <div class="box-name">Brix</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->brix?></div>
                        </div>
                    </div>

                    <div id="heavy">
                        <div style="margin-top: 2%; font-weight: bold;">HEAVY METAL TEST</div>
                        <div id="row">
                            <div class="box-name">Mercury (Hg)</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->mercury?></div>
                        </div>

                        <div id="row">
                            <div class="box-name">Lead (Pb)</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->lead?></div>
                        </div>

                        <div id="row">
                            <div class="box-name">Cadmium (Cd)</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->cadmium?></div>
                        </div>

                        <div id="row">
                            <div class="box-name">Tin (Sn)</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->tin?></div>
                        </div>

                        <div id="row">
                            <div class="box-name">Arsenic (As)</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->arsenic?></div>
                        </div>
                    </div>

                    <div id="mircobiology">
                        <div style="margin-top: 2%; font-weight: bold;">MICROBIOLOGY TEST</div>
                        <div id="row">
                            <div class="box-name">Salmonella sp</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->salmonella?></div>
                        </div>

                        <div id="row">
                            <div class="box-name">Total Plate Count</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->total_plate?></div>
                        </div>

                        <div id="row">
                            <div class="box-name">Mold & Yeast</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->yeast?></div>
                        </div>
                    </div>
                </div>

                <div id="signature" style="margin-top: 10%; box-sizing: border-box; content: ''; clear: both; display: table;">
                    <div style="float: left; width: 30%; text-align: center;">
                        Jakarta, <?=IndoDate?>
                        <div style="margin-top: 30%; font-weight: bold;"><u><?=$params['signature']->fullname?></u></div>
                        <div><?=$params['signature']->position_name?></div>
                    </div>
                </div>

                <div id="bottom" style="margin-top: 30%;">
                    <div id="footer">
                        <div id="row">
                            <div class="box-name">Invoice No.</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->invoice_no?></div>
                        </div>

                        <div id="row">
                            <div class="box-name">QA No.</div>
                            <div class="box-colon">:</div>
                            <div class="box-value"><?=$params['detail']->qa_no?></div>
                        </div>
                    </div>

                    <div id="notes" style="margin-top: 2%; border-width:2px; width:100%; border:dotted; text-align:left; border-width:0.5px; padding:5px;">
                        This Information contained in this document is confidential and propriatery information of PT. Sumber Kopi Prima. Any altering of this information 
                        <br> without express written permission of PT. Sumber Kopi Prima in expressly forbidden. <br><br> This document is valid therefore without signature.
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>