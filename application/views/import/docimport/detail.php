<form id="form-docimport-detail">
    <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
    <div class="card">
        <div class="card-header">
            <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
        </div>
        <div class="card-body overflow-auto" style="max-height: 650px; overflow-x: hidden;">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="code" class="control-label">Code</label>
                        <input type="text" name="code" class="form-control docs upper" id="code" value="<?=$params['detail']->code?>" disabled>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="po" class="control-label">PO #</label>
                        <input type="text" name="po" class="form-control docs upper" id="po" placeholder="Enter po" autocomplete="off" value="<?=$params['detail']->po_no?>" autofocus>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="shipment" class="control-label">Shipment no.</label>
                        <input type="text" name="shipment" class="form-control docs upper" id="shipment" placeholder="Enter shipment no" autocomplete="off" value="<?=$params['detail']->shipment_no?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="shipper" class="control-label">Shipper</label>
                        <select name="shipper" class="form-control docs select2bs4" id="shipper">
                            <option></option>
                            <?php foreach($params['shipper'] as $rows) : ?>
                                <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->shipper_id)?'selected':'')?>><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="seller" class="control-label">Seller</label>
                        <input type="text" name="seller" class="form-control docs upper" id="seller" placeholder="Enter seller" autocomplete="off" value="<?=$params['detail']->seller?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="consignee" class="control-label">Consignee</label>
                        <select name="consignee" class="form-control docs select2bs4" id="consignee">
                            <option></option>
                            <?php foreach($params['consignee'] as $rows) : ?>
                                <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->consignee_id)?'selected':'')?>>(<?=$rows->code.') - '.$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="commodity" class="control-label">Commodity</label>
                        <input type="text" name="commodity" class="form-control docs upper" id="commodity" placeholder="Enter commodity" autocomplete="off" value="<?=$params['detail']->commodity?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="category" class="control-label">Category</label>
                        <select name="category" class="form-control docs select2bs4" id="category">
                            <option></option>
                            <?php foreach($params['category'] as $rows) : ?>
                                <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->category_id)?'selected':'')?>><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="hscode" class="control-label">HS code</label>
                        <input type="text" name="hscode" class="form-control docs upper" id="hscode" placeholder="Enter hs code" autocomplete="off" value="<?=$params['detail']->hs_code?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="lartas" class="control-label">Lartas</label>
                        <input type="text" name="lartas" class="form-control docs upper" id="lartas" placeholder="Enter lartas" autocomplete="off" value="<?=$params['detail']->lartas?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="incoterm" class="control-label">Incoterm</label>
                        <select name="incoterm" class="form-control docs select2bs4" id="incoterm">
                            <option></option>
                            <?php foreach($params['incoterm'] as $rows) : ?>
                                <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->incoterm_id)?'selected':'')?>><?=$rows->code.' - '.$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="hbl" class="control-label">HBL</label>
                        <input type="text" name="hbl" class="form-control docs upper" id="hbl" placeholder="Enter hbl" autocomplete="off" value="<?=$params['detail']->hbl?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="mbl" class="control-label">MBL</label>
                        <input type="text" name="mbl" class="form-control docs upper" id="mbl" placeholder="Enter mbl" autocomplete="off" value="<?=$params['detail']->mbl?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="qty_container" class="control-label">Qty container</label>
                        <input type="text" name="qty_container" class="form-control docs" id="qty_container" placeholder="Enter qty container" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->qty_container?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="container_no" class="control-label">Container no.</label>
                        <input type="text" name="container_no" class="form-control docs" id="container_no" placeholder="Enter container no." autocomplete="off" value="<?=$params['detail']->container_no?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="goods_qty" class="control-label">Goods qty</label>
                        <input type="text" name="goods_qty" class="form-control docs" id="goods_qty" placeholder="Enter goods qty" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->goods_qty?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="uom" class="control-label">UOM</label>
                        <select name="uom" class="form-control docs select2bs4" id="uom">
                            <option></option>
                            <?php foreach($params['uom'] as $rows) : ?>
                                <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->uom_id)?'selected':'')?>><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="gw" class="control-label">Gross weight (GW)</label>
                        <input type="text" name="gw" class="form-control docs" id="gw" placeholder="Enter gross weight" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->gross_weight?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="nw" class="control-label">Net weight (NW)</label>
                        <input type="text" name="nw" class="form-control docs" id="nw" placeholder="Enter net weight" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->net_weight?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cbm" class="control-label">CBM</label>
                        <input type="text" name="cbm" class="form-control docs" id="cbm" placeholder="Enter cbm" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->cbm?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="pol" class="control-label">POL</label>
                        <input type="text" name="pol" class="form-control docs" id="pol" placeholder="Enter pol" autocomplete="off" value="<?=$params['detail']->pol?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="pod" class="control-label">POD</label>
                        <input type="text" name="pod" class="form-control docs" id="pod" placeholder="Enter pod" autocomplete="off" value="<?=$params['detail']->pod?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="etd" class="control-label">Estimation time of departure (ETD)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control docs" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" id="etd" name="etd" placeholder="Enter estimation time of departure" autocomplete="off" data-mask value="<?=$params['detail']->etd?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="eta" class="control-label">Estimated time of arrival (ETA)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control docs" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" id="eta" name="eta" placeholder="Enter estimated time of arrival" autocomplete="off" data-mask value="<?=$params['detail']->eta?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="pib_aju" class="control-label">PIB AJU</label>
                        <input type="text" name="pib_aju" class="form-control docs" id="pib_aju" placeholder="Enter PIB AJU" autocomplete="off" value="<?=$params['detail']->pib_aju?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="coo" class="control-label">COO</label>
                        <input type="text" name="coo" class="form-control docs" id="coo" placeholder="Enter coo" autocomplete="off" value="<?=$params['detail']->coo?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="masterlist" class="control-label">Masterlist</label>
                        <input type="text" name="masterlist" class="form-control docs" id="masterlist" placeholder="Enter masterlist" autocomplete="off" value="<?=$params['detail']->master_list?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="rcvd_ori" class="control-label">Rcvd ori document</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control docs" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" id="rcvd_ori" name="rcvd_ori" placeholder="Enter rcvd ori document" autocomplete="off" data-mask value="<?=$params['detail']->rcvd_ori_doc?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="billing" class="control-label">Billing</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control docs" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" id="billing" name="billing" placeholder="Enter billing" autocomplete="off" data-mask value="<?=$params['detail']->billing?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="spjm" class="control-label">SPJM</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control docs" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" id="spjm" name="spjm" placeholder="Enter spjm" autocomplete="off" data-mask value="<?=$params['detail']->spjm?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="spjk" class="control-label">SPJK</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control docs" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" id="spjk" name="spjk" placeholder="Enter spjk" autocomplete="off" data-mask value="<?=$params['detail']->spjk?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="sppb" class="control-label">SPPB</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control docs" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" id="sppb" name="sppb" placeholder="Enter sppb" autocomplete="off" data-mask value="<?=$params['detail']->sppb?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="pickup_do" class="control-label">Pickup DO</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control docs" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" id="pickup_do" name="pickup_do" placeholder="Enter pickup do" autocomplete="off" data-mask value="<?=$params['detail']->pickup_do?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="delivery" class="control-label">Delivery</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control docs lead_time" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" id="delivery" name="delivery" placeholder="Enter delivery" autocomplete="off" data-mask value="<?=$params['detail']->delivery?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="remarks" class="control-label">Remarks</label>
                        <textarea name="remarks" class="form-control docs" id="remarks" placeholder="Enter remarks" autocomplete="off" rows="3"><?=$params['detail']->remarks?></textarea>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="currency" class="control-label">Currency</label>
                        <input type="text" name="currency" class="form-control docs percent cif2" id="currency" placeholder="Enter currency" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->currency?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cif" class="control-label">CIF</label>
                        <input type="text" name="cif" class="form-control docs percent cif2" id="cif" placeholder="Enter cif" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->cif?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="duty" class="control-label">Duty</label>
                        <input type="text" name="duty" class="form-control docs percent landed_cost" id="duty" placeholder="Enter duty" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->duty?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="vat" class="control-label">VAT</label>
                        <input type="text" name="vat" class="form-control docs" id="vat" placeholder="Enter vat" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->vat?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="tax" class="control-label">Tax</label>
                        <input type="text" name="tax" class="form-control docs" id="tax" placeholder="Enter tax" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->tax?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="freight_vat" class="control-label">Freight (include VAT)</label>
                        <input type="text" name="freight_vat" class="form-control docs percent" id="freight_vat" placeholder="Enter freight" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->freight?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="handling_vat" class="control-label">Handling (include VAT)</label>
                        <input type="text" name="handling_vat" class="form-control docs percent landed_cost" id="handling_vat" placeholder="Enter handling" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->handling?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="at_cost" class="control-label">At cost</label>
                        <input type="text" name="at_cost" class="form-control docs percent landed_cost" id="at_cost" placeholder="Enter at cost" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->at_cost?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="additional" class="control-label">Additional</label>
                        <input type="text" name="additional" class="form-control docs" id="additional" placeholder="Enter at cost" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->additional?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="lead_time" class="control-label">Lead time</label>
                        <input type="text" name="lead_time" class="form-control" id="lead_time" value="0" disabled>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="times" class="control-label">Time</label>
                        <input type="text" name="times" class="form-control docs" id="times" placeholder="Enter times" autocomplete="off" value="<?=$params['detail']->time?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="percent" class="control-label">Percent</label>
                        <input type="text" name="percent" class="form-control" id="percent" value="0" disabled>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cif_2" class="control-label">CIF 2</label>
                        <input type="text" name="cif_2" class="form-control persentasi" id="cif_2" value="0" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="landed_cost" class="control-label">Landed cost</label>
                        <input type="text" name="landed_cost" class="form-control persentasi" id="landed_cost" value="0" disabled>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="percentage" class="control-label">%</label>
                        <input type="text" name="percentage" class="form-control" id="percentage" value="0" disabled>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="forwarder" class="control-label">Forwarder</label>
                        <select name="forwarder" class="form-control docs select2bs4" id="forwarder">
                            <option></option>
                            <?php foreach($params['forwarder'] as $rows) : ?>
                                <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->forwarder_id)?'selected':'')?>><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="counter" id="counter">
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="#" onclick="history.go(-1)">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-block btn-success save">
                        <i class="fas fa-save mr-2"></i>Save
                    </button>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
            </div>
        </div>
    </div>
</form>