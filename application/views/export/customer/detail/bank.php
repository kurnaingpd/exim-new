<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="bank_code" class="control-label">Bank code</label>
            <input type="text" name="bank_code" class="form-control" id="bank_code" placeholder="Enter bank code" disabled value="<?=$detail['cust_bank']->code?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="bank_name" class="control-label">Bank name</label>
            <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Enter bank name" disabled value="<?=$detail['cust_bank']->name?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="bank_swift" class="control-label">Swift code</label>
            <input type="text" name="bank_swift" class="form-control" id="bank_swift" placeholder="Enter swift code" disabled value="<?=$detail['cust_bank']->swift_code?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="bank_accno" class="control-label">Account no.</label>
            <input type="text" name="bank_accno" class="form-control" id="bank_accno" placeholder="Enter account no" disabled value="<?=$detail['cust_bank']->account_no?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="bank_accname" class="control-label">Account name</label>
            <input type="text" name="bank_accname" class="form-control" id="bank_accname" placeholder="Enter account name" disabled value="<?=$detail['cust_bank']->account_name?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="bank_branch" class="control-label">Bank branch</label>
            <input class="form-control upper" id="bank_branch" name="bank_branch" placeholder="Enter bank branch" autocomplete="off" disabled value="<?=$detail['cust_bank']->branch?>">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="bank_address" class="control-label">Bank address</label>
            <textarea name="bank_address" class="form-control upper" id="bank_address" placeholder="Enter bank address" disabled rows="3"><?=$detail['cust_bank']->address?></textarea>
        </div>
    </div>
</div>