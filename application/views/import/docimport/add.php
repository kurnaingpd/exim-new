<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-category-add">
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
        </form>
    </div>
    <div class="card-footer">
        <div class="float-right">
            <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
        </div>
    </div>
</div>