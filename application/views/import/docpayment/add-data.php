<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="code" class="control-label">Code</label>
            <input type="text" name="code" class="form-control docs upper" id="code" value="<?=$params['code']?>" readonly>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="po" class="control-label">PO #</label>
            <select name="po" class="form-control docs select2bs4" id="po" required>
                <option></option>
                <?php foreach($params['po'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->po_no?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="shipper" class="control-label">Shipper</label>
            <input type="text" name="shipper" class="form-control docs upper" id="shipper" placeholder="Enter shipper" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="consignee" class="control-label">Consignee</label>
            <input type="text" name="consignee" class="form-control docs upper" id="consignee" placeholder="Enter consignee" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="commodity" class="control-label">Commodity</label>
            <input type="text" name="commodity" class="form-control docs upper" id="commodity" placeholder="Enter commodity" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="bl" class="control-label">BL no.</label>
            <input type="text" name="bl" class="form-control docs upper" id="bl" placeholder="Enter BL no." disabled>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="pol" class="control-label">POL</label>
            <input type="text" name="pol" class="form-control docs upper" id="pol" placeholder="Enter pol" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="pod" class="control-label">POD</label>
            <input type="text" name="pod" class="form-control docs upper" id="pod" placeholder="Enter pod" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="etd" class="control-label">Estimation time of departure (ETD)</label>
            <input type="text" name="etd" class="form-control docs upper" id="etd" placeholder="Enter estimation time of departure" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="eta" class="control-label">Estimated time of arrival (ETA)</label>
            <input type="text" name="eta" class="form-control docs upper" id="eta" placeholder="Enter estimated time of arrival" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="pib_aju" class="control-label">PIB AJU</label>
            <input type="text" name="pib_aju" class="form-control docs upper" id="pib_aju" placeholder="Enter PIB AJU" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="currency" class="control-label">Currency</label>
            <input type="text" name="currency" class="form-control docs upper" id="currency" placeholder="Enter currency" disabled>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="cif" class="control-label">CIF</label>
            <input type="text" name="cif" class="form-control docs upper" id="cif" placeholder="Enter cif" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="duty" class="control-label">Duty</label>
            <input type="text" name="duty" class="form-control docs upper" id="duty" placeholder="Enter duty" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="vat" class="control-label">VAT</label>
            <input type="text" name="vat" class="form-control docs upper" id="vat" placeholder="Enter vat" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="tax" class="control-label">Tax</label>
            <input type="text" name="tax" class="form-control docs upper" id="tax" placeholder="Enter tax" disabled>
        </div>
    </div>
</div>