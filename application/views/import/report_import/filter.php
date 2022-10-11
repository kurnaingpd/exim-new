<form id="form-nav-import">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="po" class="control-label">PO</label>
                <select name="po" class="form-control docs select2bs4" id="po">
                    <option></option>
                    <?php foreach($params['po'] as $rows) : ?>
                        <option value="<?=$rows->po_no?>"><?=$rows->po_no?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="delivery" class="control-label">Delivery</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="delivery" name="delivery" style="background-color: #fff;" placeholder="Select date">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="consignee" class="control-label">Consignee</label>
                <select name="consignee" class="form-control docs select2bs4" id="consignee">
                    <option></option>
                    <?php foreach($params['consignee'] as $rows) : ?>
                        <option value="<?=$rows->id?>"><?='('.$rows->code.') - '.$rows->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="category" class="control-label">Category</label>
                <select name="category" class="form-control docs select2bs4" id="category">
                    <option></option>
                    <?php foreach($params['category'] as $rows) : ?>
                        <option value="<?=$rows->id?>"><?=$rows->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="shipper" class="control-label">Shipper</label>
                <select name="shipper" class="form-control docs select2bs4" id="shipper">
                    <option></option>
                    <?php foreach($params['shipper'] as $rows) : ?>
                        <option value="<?=$rows->id?>"><?=$rows->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="forwarder" class="control-label">Forwarder</label>
                <select name="forwarder" class="form-control docs select2bs4" id="forwarder">
                    <option></option>
                    <?php foreach($params['forwarder'] as $rows) : ?>
                        <option value="<?=$rows->id?>"><?=$rows->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <button type="button" id="btn-filter" class="btn btn-block btn-info">
                <i class="fas fa-search mr-2"></i>Search
            </button>
        </div>

        <div class="col-md-6">
            <button type="button" id="btn-reset" class="btn btn-block btn-default">
                <i class="fas fa-trash-restore-alt mr-2"></i>Reset
            </button>
        </div>
    </div>
</form>