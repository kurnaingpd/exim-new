<table style="text-align:left;">
	<tr>
		<td>Document Print : </td>
		<td>Master Import </td>
	</tr>
	<tr style="text-align:left;">
		<td>System Print Out : </td>
		<td><?php echo NOW ?> </td>
	</tr>
	<tr></tr>
</table>
<table class="table table-bordered table-striped mb-none" id="tables3" border="1" cellpadding="8">
									<thead>
										<tr>
											<th>Status Data</th>
											<th>PO</th>
											<th>Shipment Numbers</th>
                                            <th>Pengirim</th>
                                            <th>Penjual</th>
											<th>Consignee</th>
                                            <th>Commodity</th>
                                            <th>Category</th>
                                            <th>HS Code</th>
                                            <th>Lartas</th>
                                            <th>Term</th>
                                            <th>HBL</th>
                                            <th>MBL</th>
                                            <th>Qty Container</th>
                                            <th>Container Number</th>
                                            <th>Goods Qty</th>
                                            <th>GW</th>
                                            <th>NW</th>
                                            <th>CBM</th>
                                            <th>POL</th>
                                            <th>POD</th>
                                            <th>ETD</th>
											<th>ETA</th>
											<th>PIB AJU</th>
											<th>COO</th>
											<th>MasterList</th>
											<th>Received Ori Doc</th>
											<th>Billing</th>
											<th>SPJM</th>
											<th>SPJK</th>
											<th>SPPB</th>
											<th>Pickup DO</th>
											<th style="background-color: yellow;">Delivery</th>
											<th>Remarks</th>
											<th style="background-color: green; color:white;">Currency</th>
											<th style="background-color: green; color:white;">CIF</th>
											<th style="background-color: green; color:white;">Duty</th>
											<th>Vat</th>
											<th>Tax</th>
											<th style="background-color: green; color:white;">Freight ( Incl VAT )</th>
											<th style="background-color: green; color:white;">Handling ( Incl VAT )</th>
											<th style="background-color: green; color:white;">At Cost</th>
											<th>Additional</th>
											<th style="background-color: yellow;">Lead Time</th>
											<th>Time</th>
											<th style="background-color: green; color:white;">Percent</th>
											<th>CIF_2</th>
											<th>Landed Cost</th>
											<th>%</th>
											<th>Forwarder</th>

										</tr>
									</thead>
									<tbody>

									<?php
if(!empty($ls_master_docim)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($ls_master_docim as $gaa){ ?>

<tr>
										<td><?php if($gaa->docim_stats=='1'){
											// echo "Active";
											echo "<span class='label label-success'>Active</span>";
										}else{
											echo "<span class='label label-danger'>Not Active</span>";
										} ?></td>
                                        <td><?php echo $gaa->docim_po; ?></td>
										<td><?php echo $gaa->docim_ship_numbers; ?></td>
										<td><?php echo $gaa->docim_pengirim; ?></td>
										<td><?php echo $gaa->docim_penjual; ?></td>
										<td><?php if($gaa->docim_consignee=='1'){
												echo "GDA ( Global Dairy Alami )";
											}elseif($gaa->docim_consignee=='2'){
												echo "PTB ( Prima Top Boga )";
											}elseif($gaa->docim_consignee=='3'){
												echo "SKP ( Sumber Kopi Prima )";
											}else{
												echo "";
											}; ?></td>
										<td><?php echo $gaa->docim_commodity; ?></td>
										<td><?php echo $gaa->mt_categori_name; ?></td>
										<td><?php echo $gaa->docim_hscode; ?></td>
										<td><?php echo $gaa->docim_lartas; ?></td>
										<td><?php echo $gaa->docim_term; ?></td>
										<td><?php echo $gaa->docim_HBL; ?></td>
										<td><?php echo $gaa->docim_MBL; ?></td>
										<td><?php echo $gaa->docim_qty_container; ?></td>
										<td><?php echo $gaa->docim_no_container; ?></td>
										<td><?php echo $gaa->docim_good_qty; ?></td>
										<td><?php echo $gaa->docim_GW; ?></td>
										<td><?php echo $gaa->docim_NW; ?></td>
										<td><?php echo $gaa->docim_CBM; ?></td>
										<td><?php echo $gaa->docim_POL; ?></td>
										<td><?php echo $gaa->docim_POD; ?></td>
										<td><?php echo $gaa->docim_ETD; ?></td>
										<td><?php echo $gaa->docim_ETA; ?></td>
										<td><?php echo $gaa->docim_PIB_AJU; ?></td>
										<td><?php echo $gaa->docim_COO; ?></td>
										<td><?php echo $gaa->docim_masterlist; ?></td>
										<td><?php echo $gaa->docim_rcvd_oridoc; ?></td>
										<td><?php echo $gaa->docim_billing; ?></td>
										<td><?php echo $gaa->docim_spjm; ?></td>
										<td><?php echo $gaa->docim_spjk; ?></td>
										<td><?php echo $gaa->docim_sppb; ?></td>
										<td><?php echo $gaa->docim_pickup_do; ?></td>
										<td><?php echo $gaa->docim_delivery; ?></td>
										<td><?php echo $gaa->docim_remarks; ?></td>
										<td><?php echo $gaa->docim_currency; ?></td>
										<td><?php echo $gaa->docim_CIF; ?></td>
										<td><?php echo $gaa->docim_Duty; ?></td>
										<td><?php echo $gaa->docim_VAT; ?></td>
										<td><?php echo $gaa->docim_TAX; ?></td>
										<td><?php echo $gaa->docim_freight; ?></td>
										<td><?php echo $gaa->docim_handling; ?></td>
										<td><?php echo $gaa->docim_atcost; ?></td>
										<td><?php echo $gaa->docim_additional; ?></td>
										<td><?php echo $gaa->docim_leadtime; ?></td>
										<td><?php echo $gaa->docim_time; ?></td>
										<td><?php echo $gaa->docim_percent; ?></td>
										<td><?php echo $gaa->docim_cif2; ?></td>
										<td><?php echo $gaa->docim_landed_cost; ?></td>
										<td><?php echo $gaa->docim_persen; ?></td>
										<td><?php echo $gaa->docim_forwarder; ?></td>
										
                                    
									</tr>

<?php }
  }else{ // Jika data tidak ada
  echo "<tr><td colspan='50'>Data tidak ada</td></tr>";
} ?>

										
									</tbody>
								</table>