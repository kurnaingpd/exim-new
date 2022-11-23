<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="not_company" class="control-label">Company name</label>
            <input type="text" name="not_company" class="form-control upper" id="not_company" placeholder="Enter company name" required>
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group required">
            <label for="not_address" class="control-label">Address</label>
            <textarea name="not_address" class="form-control upper" id="not_address" rows="3" placeholder="Enter address" required></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="not_country" class="control-label">Country</label>
            <!-- <input type="hidden" name="not_country_id" class="form-control upper" id="not_country_id" readonly>
            <input type="text" name="not_country_name" class="form-control upper" id="not_country_name" placeholder="Select an option" readonly required style="background-color: white;"> -->
            <select name="not_country_id" class="form-control select2bs4" id="not_country_id" required>
                <option></option>
                <?php foreach($params['country'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->code.' - '.$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="not_phone" class="control-label">Phone number</label>
            <input type="text" name="not_phone" class="form-control" id="not_phone" placeholder="Enter phone number" required>
        </div>
    </div>
</div>