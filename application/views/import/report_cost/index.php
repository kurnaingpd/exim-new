<div class=card>
    <div class=card-header>
        <h6><i class=fas fa-filter mr-2></i><?=$header?></h6>
    </div>
    <div class=card-body>
        <table id='trptcost' class='table table-sm table-bordered table-striped display'>
            <thead>
                <tr class='text-center align-middle'>
                    <th rowspan='3'>#</th>
                    <th rowspan='3'>Year</th>
                    <th colspan='12'>GDA Importation</th>
                    <th colspan='12'>PTB Importation</th>
                    <th colspan='12'>SKP Importation</th>
                </tr>
                <tr class='text-center align-middle'>
                    <th colspan='4'>Value (in bn IDR)</th>
                    <th colspan='4'>Landed cost (%)</th>
                    <th colspan='4'>Leadtime (days)</th>
                    <th colspan='4'>Value (in bn IDR)</th>
                    <th colspan='4'>Landed cost (%)</th>
                    <th colspan='4'>Leadtime (days)</th>
                    <th colspan='4'>Value (in bn IDR)</th>
                    <th colspan='4'>Landed cost (%)</th>
                    <th colspan='4'>Leadtime (days)</th>
                </tr>
                <tr class='text-center align-middle'>
                    <th>Machine</th>
                    <th>Hay</th>
                    <th>Material</th>
                    <th>Spare parts</th>
                    <th>Machine</th>
                    <th>Hay</th>
                    <th>Material</th>
                    <th>Spare parts</th>
                    <th>Machine</th>
                    <th>Hay</th>
                    <th>Material</th>
                    <th>Spare parts</th>

                    <th>Machine</th>
                    <th>Hay</th>
                    <th>Material</th>
                    <th>Spare parts</th>
                    <th>Machine</th>
                    <th>Hay</th>
                    <th>Material</th>
                    <th>Spare parts</th>
                    <th>Machine</th>
                    <th>Hay</th>
                    <th>Material</th>
                    <th>Spare parts</th>

                    <th>Machine</th>
                    <th>Hay</th>
                    <th>Material</th>
                    <th>Spare parts</th>
                    <th>Machine</th>
                    <th>Hay</th>
                    <th>Material</th>
                    <th>Spare parts</th>
                    <th>Machine</th>
                    <th>Hay</th>
                    <th>Material</th>
                    <th>Spare parts</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($params['list'] as $rows) : ?>
                <tr>
                    <td class="text-center"><?=$no?>.</td>
                    <td class="text-center"><?=$rows->tahun?></td>

                    <!-- GDA -->
                    <td class="text-right"><?=($rows->gda_val_machine?number_format($rows->gda_val_machine):0)?></td>
                    <td class="text-right"><?=($rows->gda_val_hay?number_format($rows->gda_val_hay):0)?></td>
                    <td class="text-right"><?=($rows->gda_val_material?number_format($rows->gda_val_material):0)?></td>
                    <td class="text-right"><?=($rows->gda_val_sparepart?number_format($rows->gda_val_sparepart):0)?></td>

                    <td class="text-right"><?=($rows->gda_cost_machine?round($rows->gda_cost_machine, 3):0)?></td>
                    <td class="text-right"><?=($rows->gda_cost_hay?round($rows->gda_cost_hay, 3):0)?></td>
                    <td class="text-right"><?=($rows->gda_cost_material?round($rows->gda_cost_material, 3):0)?></td>
                    <td class="text-right"><?=($rows->gda_cost_sparepart?round($rows->gda_cost_sparepart, 3):0)?></td>

                    <td class="text-right"><?=($rows->gda_lead_machine?$rows->gda_lead_machine:0)?></td>
                    <td class="text-right"><?=($rows->gda_lead_hay?$rows->gda_lead_hay:0)?></td>
                    <td class="text-right"><?=($rows->gda_lead_material?$rows->gda_lead_material:0)?></td>
                    <td class="text-right"><?=($rows->gda_lead_sparepart?$rows->gda_lead_sparepart:0)?></td>

                    <!-- PTB -->
                    <td class="text-right"><?=($rows->ptb_val_machine?number_format($rows->ptb_val_machine):0)?></td>
                    <td class="text-right"><?=($rows->ptb_val_hay?number_format($rows->ptb_val_hay):0)?></td>
                    <td class="text-right"><?=($rows->ptb_val_material?number_format($rows->ptb_val_material):0)?></td>
                    <td class="text-right"><?=($rows->ptb_val_sparepart?number_format($rows->ptb_val_sparepart):0)?></td>

                    <td class="text-right"><?=($rows->ptb_cost_machine?round($rows->ptb_cost_machine, 3):0)?></td>
                    <td class="text-right"><?=($rows->ptb_cost_hay?round($rows->ptb_cost_hay, 3):0)?></td>
                    <td class="text-right"><?=($rows->ptb_cost_material?round($rows->ptb_cost_material, 3):0)?></td>
                    <td class="text-right"><?=($rows->ptb_cost_sparepart?round($rows->ptb_cost_sparepart, 3):0)?></td>

                    <td class="text-right"><?=($rows->ptb_lead_machine?$rows->ptb_lead_machine:0)?></td>
                    <td class="text-right"><?=($rows->ptb_lead_hay?$rows->ptb_lead_hay:0)?></td>
                    <td class="text-right"><?=($rows->ptb_lead_material?$rows->ptb_lead_material:0)?></td>
                    <td class="text-right"><?=($rows->ptb_lead_sparepart?$rows->ptb_lead_sparepart:0)?></td>

                    <!-- SKP -->
                    <td class="text-right"><?=($rows->skp_val_machine?number_format($rows->skp_val_machine):0)?></td>
                    <td class="text-right"><?=($rows->skp_val_hay?number_format($rows->skp_val_hay):0)?></td>
                    <td class="text-right"><?=($rows->skp_val_material?number_format($rows->skp_val_material):0)?></td>
                    <td class="text-right"><?=($rows->skp_val_sparepart?number_format($rows->skp_val_sparepart):0)?></td>

                    <td class="text-right"><?=($rows->skp_cost_machine?round($rows->skp_cost_machine, 3):0)?></td>
                    <td class="text-right"><?=($rows->skp_cost_hay?round($rows->skp_cost_hay, 3):0)?></td>
                    <td class="text-right"><?=($rows->skp_cost_material?round($rows->skp_cost_material, 3):0)?></td>
                    <td class="text-right"><?=($rows->skp_cost_sparepart?round($rows->skp_cost_sparepart, 3):0)?></td>

                    <td class="text-right"><?=($rows->skp_lead_machine?$rows->skp_lead_machine:0)?></td>
                    <td class="text-right"><?=($rows->skp_lead_hay?$rows->skp_lead_hay:0)?></td>
                    <td class="text-right"><?=($rows->skp_lead_material?$rows->skp_lead_material:0)?></td>
                    <td class="text-right"><?=($rows->skp_lead_sparepart?$rows->skp_lead_sparepart:0)?></td>
                </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id=load_data></div>