<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="product" class="control-label">Product</label>
            <select name="product" class="form-control select2bs4 item" id="product">
                <option></option>
                <?php foreach($params['item'] as $rows) : ?>
                    <option value="<?=$rows->pi_detail_id?>"><?=$rows->item_name?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" class="item" id="hscode" name="hscode">
            <input type="hidden" class="item" id="packing" name="packing">
            <input type="hidden" class="item" id="net" name="net">
            <input type="hidden" class="item" id="gross" name="gross">
            <input type="hidden" class="item" id="dimension" name="dimension">
        </div>
    </div>

    <div class="col-md-1">
        <div class="form-group required">
            <label for="qty" class="control-label">Qty</label>
            <input type="text" name="qty" class="form-control item" id="qty" placeholder="Enter qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="carton" class="control-label">Carton barcode</label>
            <input type="text" name="carton" class="form-control item" id="carton" placeholder="Enter carton barcode">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="batch" class="control-label">Batch</label>
            <input type="text" name="batch" class="form-control item" id="batch" placeholder="Enter batch">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="expdate" class="control-label">Expired date</label>
            <div class="input-group date" id="prod_date" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input cursor-context item" autocomplete="off" id="expdate" name="expdate" placeholder="Enter expired date">
                <div class="input-group-append" data-target="#prod_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="proddate" class="control-label">Production date</label>
            <div class="input-group date" id="prod_date" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input cursor-context item" autocomplete="off" id="proddate" name="proddate" placeholder="Enter production date">
                <div class="input-group-append" data-target="#prod_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <input type="button" class="btn btn-block btn-success" id="btn-item" value="Add detail(s)">
    </div>
</div>