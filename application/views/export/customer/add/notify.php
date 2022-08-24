<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="not_company" class="control-label">Company name</label>
            <input type="text" name="not_company" class="form-control upper" id="not_company" readonly>
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
            <label for="not_address" class="control-label">Address</label>
            <textarea name="not_address" class="form-control upper" id="not_address" rows="3" readonly></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="not_country" class="control-label">Country</label>
            <input type="hidden" name="not_country_id" class="form-control upper" id="not_country_id" readonly>
            <input type="text" name="not_country_name" class="form-control upper" id="not_country_name" readonly>
            <!-- <select name="not_country" class="form-control select2bs4" id="not_country" disabled>
                <option></option>
                <?php foreach($params['country'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->code.' - '.$rows->name?></option>
                <?php endforeach; ?>
            </select> -->
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="not_phone" class="control-label">Phone number</label>
            <input type="text" name="not_phone" class="form-control" id="not_phone" readonly>
        </div>
    </div>
</div>