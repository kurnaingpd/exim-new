<div class="row">
    <div class="col-md-4">
        <div class="form-group required">
            <label for="code" class="control-label">Packing no.</label>
            <input type="text" class="form-control" value="<?=$params['detail']->code?>" disabled>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group required">
            <label for="invoice" class="control-label">Invoice no.</label>
            <input type="text" class="form-control" value="<?=$params['detail']->invoice_code?>" disabled>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group required">
            <label for="pack_date" class="control-label">Packing date</label>
            <div class="input-group date" id="pack_date" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="pack_date" name="pack_date" placeholder="Enter packing date" required value="<?=$params['detail']->dates?>">
                <div class="input-group-append" data-target="#pack_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>