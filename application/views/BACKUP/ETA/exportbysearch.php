<table style="text-align:left;">
	<tr>
		<td>Document Print : </td>
		<td>ETA & PIB PAYMENT</td>
	</tr>
	<tr style="text-align:left;">
		<td>System Print Out : </td>
		<td><?php echo NOW ?> </td>
    </tr>
    <tr style="text-align:left;">
		<td>Export By Filter : </td>
		<td>Yes </td>
	</tr>
	<tr></tr>
</table>

<table class="table table-bordered table-striped mb-none" id="tables3" border="1" cellpadding="8">
									<thead>
										<tr>
                                            <th>SHIPPER</th>
                                            <th>PO NO</th>
                                            <th>CONSIGNEE</th>
                                            <th>COMMODITY</th>
											                      <th>BL NO</th>
                                            <th>POL </th>
                                            <th>ETD </th>
                                            <th>ETA </th>
                                            <th>PIB AJU </th>
                                            <th>CURRENCY </th>
                                            <th>CIF </th>
                                            <th>DUTY </th>
                                            <th>VAT </th>
                                            <th>TAX </th>
                                            <th>ESTIMASI </th>
                                            <th>AKTUAL TOTAL BAYAR PIB ( PEMBULATAN )</th>
                                            <th>Status</th>

										</tr>
									</thead>
                                    <tbody style="background-color:#f3f3f3;">

                                    <?php
if(!empty($ls_master_eta)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($ls_master_eta as $gaa){ ?>

<tr>
                                        <td><?php echo $gaa->etapib_shipper; ?></td>
                                        <td><?php echo $gaa->docim_po; ?></td>
                                        <td><?php if($gaa->docim_consignee=='1'){
												echo "GDA ( Global Dairy Alami )";
											}elseif($gaa->docim_consignee=='2'){
												echo "PTB ( Prima Top Boga )";
											}else{
												echo "SKP ( Sumber Kopi Prima )";
											}; ?></td>
                                        <td><?php echo $gaa->etapib_commodity; ?></td>
                                        <td><?php echo $gaa->etapib_BL_no; ?></td>
                                        <td><?php echo $gaa->etapib_pol; ?></td>
                                        <!-- <td><?php echo $gaa->etapib_pod; ?></td> -->
                                        <td><?php echo $gaa->etapib_etd; ?></td>
                                        <td><?php echo $gaa->etapib_eta; ?></td>
                                        <td><?php echo $gaa->etapib_pib_aju; ?></td>
                                        <td><?php echo $gaa->etapib_currency; ?></td>
                                        <td><?php echo $gaa->etapib_CIF; ?></td>
                                        <td><?php echo $gaa->etapib_Duty; ?></td>
                                        <td><?php echo $gaa->etapib_Vat; ?></td>
                                        <td><?php echo $gaa->etapib_Tax; ?></td>
                                        <td><?php echo $gaa->etapib_estimasi; ?></td>
                                        <td><?php echo $gaa->etapib_aktual_pembulatan; ?></td>
										
										
										<td><?php if($gaa->etapib_stats=='1'){
											echo "Active";
										}else{
											echo "Not Active";
										} ?></td>
                                        <!-- <td>Edinburgh</td> -->
                                    
</tr>
                                    
                                    <?php }
  }else{ // Jika data tidak ada
  echo "<tr><td colspan='50'>Data tidak ada</td></tr>";
} ?>				
										
									</tbody>
								</table>