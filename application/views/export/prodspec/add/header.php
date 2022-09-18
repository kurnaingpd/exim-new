<div class="row">
    <div class="col-md-4">
        <div class="form-group required">
            <label for="code" class="control-label">Product specification no.</label>
            <input type="text" name="code" class="form-control" id="code" value="<?=$params['autonumber']?>" readonly>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group required">
            <label for="invoice" class="control-label">Invoice no.</label>
            <select name="invoice" class="form-control select2bs4" id="invoice" required>
                <option></option>
                <?php foreach($params['invoice'] as $rows) : ?>
                    <option value="<?=$rows->invoice_id?>"><?=$rows->invoice_no?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group required">
            <label for="po" class="control-label">PO no.</label>
            <input type="text" name="po" class="form-control" id="po" disabled>
        </div>
    </div>
</div>