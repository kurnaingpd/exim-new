<form id="form-category-add">
    <div class="card">
        <div class="card-header">
            <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
        </div>
        <div class="card-body overflow-auto" style="max-height: 650px; overflow-x: hidden;">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="po" class="control-label">PO #</label>
                        <input type="text" name="po" class="form-control upper" id="po" placeholder="Enter po" autocomplete="off" autofocus>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="shipment" class="control-label">Shipment no.</label>
                        <input type="text" name="shipment" class="form-control upper" id="shipment" placeholder="Enter shipment no" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="shipper" class="control-label">Shipper</label>
                        <select name="shipper" class="form-control select2bs4" id="shipper">
                            <option></option>
                            <?php foreach($params['shipper'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="seller" class="control-label">Seller</label>
                        <input type="text" name="seller" class="form-control upper" id="seller" placeholder="Enter seller" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="consignee" class="control-label">Consignee</label>
                        <select name="consignee" class="form-control select2bs4" id="consignee">
                            <option></option>
                            <?php foreach($params['consignee'] as $rows) : ?>
                                <option value="<?=$rows->id?>">(<?=$rows->code.') - '.$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="commodity" class="control-label">Commodity</label>
                        <input type="text" name="commodity" class="form-control upper" id="commodity" placeholder="Enter commodity" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="category" class="control-label">Category</label>
                        <select name="category" class="form-control select2bs4" id="category">
                            <option></option>
                            <?php foreach($params['category'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="hscode" class="control-label">HS code</label>
                        <input type="text" name="hscode" class="form-control upper" id="hscode" placeholder="Enter hs code" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="lartas" class="control-label">Lartas</label>
                        <input type="text" name="lartas" class="form-control upper" id="lartas" placeholder="Enter lartas" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="incoterm" class="control-label">Incoterm</label>
                        <select name="incoterm" class="form-control select2bs4" id="incoterm">
                            <option></option>
                            <?php foreach($params['incoterm'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->code.' - '.$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="hbl" class="control-label">HBL</label>
                        <input type="text" name="hbl" class="form-control upper" id="hbl" placeholder="Enter hbl" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="mbl" class="control-label">MBL</label>
                        <input type="text" name="mbl" class="form-control upper" id="mbl" placeholder="Enter mbl" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="qty_container" class="control-label">Qty container</label>
                        <input type="text" name="qty_container" class="form-control" id="qty_container" placeholder="Enter qty container" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="container_no" class="control-label">Container no.</label>
                        <input type="text" name="container_no" class="form-control" id="container_no" placeholder="Enter container no." autocomplete="off">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="goods_qty" class="control-label">Goods qty</label>
                        <input type="text" name="goods_qty" class="form-control" id="goods_qty" placeholder="Enter goods qty" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="uom" class="control-label">UOM</label>
                        <select name="uom" class="form-control select2bs4" id="uom">
                            <option></option>
                            <?php foreach($params['uom'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="gw" class="control-label">Gross weight (GW)</label>
                        <input type="text" name="gw" class="form-control" id="gw" placeholder="Enter gross weight" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="nw" class="control-label">Net weight (NW)</label>
                        <input type="text" name="nw" class="form-control" id="nw" placeholder="Enter net weight" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cbm" class="control-label">CBM</label>
                        <input type="text" name="cbm" class="form-control" id="cbm" placeholder="Enter cbm" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="pol" class="control-label">POL</label>
                        <input type="text" name="pol" class="form-control" id="pol" placeholder="Enter pol" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="pod" class="control-label">POD</label>
                        <input type="text" name="pod" class="form-control" id="pod" placeholder="Enter pod" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="etd" class="control-label">Estimation time of departure (ETD)</label>
                        <div class="input-group date" id="etd" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="etd" name="etd" placeholder="Enter estimation time of departure" autocomplete="off">
                            <div class="input-group-append" data-target="#etd" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="eta" class="control-label">Estimated time of arrival (ETA)</label>
                        <div class="input-group date" id="eta" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="eta" name="eta" placeholder="Enter estimated time of arrival" autocomplete="off">
                            <div class="input-group-append" data-target="#eta" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="pib_aju" class="control-label">PIB AJU</label>
                        <input type="text" name="pib_aju" class="form-control" id="pib_aju" placeholder="Enter PIB AJU" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="coo" class="control-label">COO</label>
                        <input type="text" name="coo" class="form-control" id="coo" placeholder="Enter coo" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="masterlist" class="control-label">Masterlist</label>
                        <input type="text" name="masterlist" class="form-control" id="masterlist" placeholder="Enter masterlist" autocomplete="off">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="rcvd_ori" class="control-label">Rcvd ori document</label>
                        <div class="input-group date" id="rcvd_ori" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="rcvd_ori" name="rcvd_ori" placeholder="Enter rcvd ori document" autocomplete="off">
                            <div class="input-group-append" data-target="#rcvd_ori" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="billing" class="control-label">Billing</label>
                        <div class="input-group date" id="billing" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="billing" name="billing" placeholder="Enter billing" autocomplete="off">
                            <div class="input-group-append" data-target="#billing" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="spjm" class="control-label">SPJM</label>
                        <div class="input-group date" id="spjm" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="spjm" name="spjm" placeholder="Enter spjm" autocomplete="off">
                            <div class="input-group-append" data-target="#spjm" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="spjk" class="control-label">SPJK</label>
                        <div class="input-group date" id="spjk" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="spjk" name="spjk" placeholder="Enter spjk" autocomplete="off">
                            <div class="input-group-append" data-target="#spjk" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="sppb" class="control-label">SPPB</label>
                        <div class="input-group date" id="sppb" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="sppb" name="sppb" placeholder="Enter sppb" autocomplete="off">
                            <div class="input-group-append" data-target="#sppb" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="pickup_do" class="control-label">Pickup DO</label>
                        <div class="input-group date" id="pickup_do" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="pickup_do" name="pickup_do" placeholder="Enter pickup do" autocomplete="off">
                            <div class="input-group-append" data-target="#pickup_do" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="delivery" class="control-label">Delivery</label>
                        <div class="input-group date" id="delivery" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="delivery" name="delivery" placeholder="Enter delivery" autocomplete="off">
                            <div class="input-group-append" data-target="#delivery" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="remarks" class="control-label">Remarks</label>
                        <textarea name="remarks" class="form-control" id="remarks" placeholder="Enter remarks" autocomplete="off" rows="3"></textarea>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="currency" class="control-label">Currency</label>
                        <input type="text" name="currency" class="form-control" id="currency" placeholder="Enter currency" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cif" class="control-label">CIF</label>
                        <input type="text" name="cif" class="form-control" id="cif" placeholder="Enter cif" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="duty" class="control-label">Duty</label>
                        <input type="text" name="duty" class="form-control" id="duty" placeholder="Enter duty" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="vat" class="control-label">VAT</label>
                        <input type="text" name="vat" class="form-control" id="vat" placeholder="Enter vat" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="tax" class="control-label">Tax</label>
                        <input type="text" name="tax" class="form-control" id="tax" placeholder="Enter tax" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="freight_vat" class="control-label">Freight (include VAT)</label>
                        <input type="text" name="freight_vat" class="form-control" id="freight_vat" placeholder="Enter freight" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="handling_vat" class="control-label">Handling (include VAT)</label>
                        <input type="text" name="handling_vat" class="form-control" id="handling_vat" placeholder="Enter handling" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="at_cost" class="control-label">At cost</label>
                        <input type="text" name="at_cost" class="form-control" id="at_cost" placeholder="Enter at cost" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="at_cost" class="control-label">Additional</label>
                        <input type="text" name="at_cost" class="form-control" id="at_cost" placeholder="Enter at cost" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="at_cost" class="control-label">Lead time</label>
                        <input type="text" name="at_cost" class="form-control" id="at_cost" value="0" disabled>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="times" class="control-label">Time</label>
                        <input type="text" name="times" class="form-control" id="times" placeholder="Enter times" autocomplete="off">
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
                        <input type="text" name="cif_2" class="form-control" id="cif_2" value="0" disabled>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="landed_cost" class="control-label">Landed cost</label>
                        <input type="text" name="landed_cost" class="form-control" id="landed_cost" value="0" disabled>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="percentage" class="control-label">%</label>
                        <input type="text" name="percentage" class="form-control" id="percentage" value="0" disabled>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="forwarder" class="control-label">Forwarder</label>
                        <select name="forwarder" class="form-control select2bs4" id="forwarder">
                            <option></option>
                            <?php foreach($params['forwarder'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
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