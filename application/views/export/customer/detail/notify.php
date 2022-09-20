<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="not_company" class="control-label">Company name</label>
            <input type="text" name="not_company" class="form-control upper" id="not_company" placeholder="Enter company name" readonly required style="background-color: white;" value="<?=$params['cust_notify']->company_name?>">
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group required">
            <label for="not_address" class="control-label">Address</label>
            <textarea name="not_address" class="form-control upper" id="not_address" rows="3" placeholder="Enter address" readonly required style="background-color: white;"><?=$params['cust_notify']->address?></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="not_country" class="control-label">Country</label>
            <input type="hidden" name="not_country_id" class="form-control upper" id="not_country_id" value="<?=$params['cust_country']->country_id?>">
            <input type="text" name="not_country_name" class="form-control upper" id="not_country_name" placeholder="Select an option" readonly required style="background-color: white;" value="<?=$params['cust_country']->country_name?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="not_phone" class="control-label">Phone number</label>
            <input type="text" name="not_phone" class="form-control" id="not_phone" placeholder="Enter phone number" readonly required style="background-color: white;" value="<?=$params['cust_notify']->phone_no?>">
        </div>
    </div>
</div>