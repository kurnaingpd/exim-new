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
            <h4 class="title" style="margin-bottom: 0px;">PRODUCT SPECIFICATION</h4>
            <h4 class="title" style="margin-top: 0px; margin-bottom: 0px; color: #660000;"><?=$params['detail']->item_category?></h4>
            <h5 class="title" style="margin-top: 0px; margin-bottom: 0px;"><?=$params['detail']->item_name?></h5>
            <h5 class="title" style="margin-top: 0px;">PO Number: <?=$params['detail']->po_no?></h5>

            <div id="content" class="content" style="margin-top: 0px;">
                <div id="detail" class="content" style="margin-top: 0px;">
                    <ol type="A">
                        <li style="font-weight: bold;">Description
                            <ul style="margin: 0; padding: 0; font-weight: normal;"><?=$params['detail']->description?></ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Physical
                            <ul style="margin: 0; padding: 0; font-weight: normal;">
                                <div id="row">
                                    <div class="box-name">Form</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->form?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Texture</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->texture?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Colour</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->colour?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Taste</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->taste?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Odour</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->odour?></div>
                                </div>
                            </ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Chemical
                            <ul style="margin: 0; padding: 0; font-weight: normal;">
                                <div id="row">
                                    <div class="box-name">Fat</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->fat?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Moisture Content (%)</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->moisture?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Caffeine</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->caffeine?></div>
                                </div>
                            </ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Microbiological
                            <ul style="margin: 0; padding: 0; font-weight: normal;">
                                <div id="row">
                                    <div class="box-name">Total Plate Count</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->total_plate?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Mould & Yeast</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->yeast?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Coliform</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->coliform?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Salmonella</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->salmonella?></div>
                                </div>
                            </ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Heavy Metals
                            <ul style="margin: 0; padding: 0; font-weight: normal;">
                                <div id="row">
                                    <div class="box-name">Lead (Pb)</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->lead?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Arsenic (As)</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->arsenic?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Mercury (Hg)</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->mercury?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Tin (Sn)</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->tin?></div>
                                </div>

                                <div id="row">
                                    <div class="box-name">Cadmium (Cd)</div>
                                    <div class="box-colon">:</div>
                                    <div class="box-value"><?=$params['detail']->cadmium?></div>
                                </div>
                            </ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Ingredients
                            <ul style="margin: 0; padding: 0; font-weight: normal;"><?=$params['detail']->ingredients?></ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Products Shelf Life
                            <ul style="margin: 0; padding: 0; font-weight: normal;"><?=$params['detail']->product_shelf?></ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Packaging Material
                            <ul style="margin: 0; padding: 0; font-weight: normal;"><?=$params['detail']->packaging?></ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Storage Condition Requirement
                            <ul style="margin: 0; padding: 0; font-weight: normal;"><?=$params['detail']->storage?></ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Function of the food material
                            <ul style="margin: 0; padding: 0; font-weight: normal;"><?=$params['detail']->functions?></ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Usage
                            <ul style="margin: 0; padding: 0; font-weight: normal;"><?=$params['detail']->usage?></ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Source Of Allergen
                            <ul style="margin: 0; padding: 0; font-weight: normal;"><?=$params['detail']->source?></ul>
                        </li>
                        <li style="font-weight: bold; margin-top: 1%;">Country of origin
                            <ul style="margin: 0; padding: 0; font-weight: normal;"><?=$params['detail']->country?></ul>
                        </li>
                    </ol>
                </div>
<!-- 
                <div id="signature" style="margin-top: 2%; box-sizing: border-box; content: ''; clear: both; display: table;">
                    <div style="float: left; width: 20%; text-align: center;">
                        Sincerely,<br>
                        PT. SUMBER KOPI PRIMA
                        <div style="margin-top: 30%; font-weight: bold;"><u><?=$this->session->userdata('logged_in')->fullname?></u></div>
                        <div><?=$this->session->userdata('logged_in')->position_name?></div>
                    </div>
                </div> -->

                <div id="signature" style="margin-top: 3%; box-sizing: border-box; content: ''; clear: both; display: table;">
                    <div style="float: left; width: 30%; text-align: center;">
                        Sincerely,<br>PT. SUMBER KOPI PRIMA
                        <div style="margin-top: 10%; font-weight: bold;"><u><?=$this->session->userdata('logged_in')->fullname?></u></div>
                        <div><?=$this->session->userdata('logged_in')->position_name?></div>
                    </div>
                </div>

                <div id="bottom" style="margin-top: 3%;">
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

                    <div id="notes" style="font-size: 8px; margin-top: 1%; border-width:2px; width:100%; border:dotted; text-align:left; border-width:0.5px; padding:3px;">
                        This Information contained in this document is confidential and propriatery information of PT. Sumber Kopi Prima. Any altering of this information 
                        without express written permission of PT. Sumber Kopi Prima in expressly forbidden. <br><br> This document is valid therefore without signature.
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>