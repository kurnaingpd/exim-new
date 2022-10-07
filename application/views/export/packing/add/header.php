<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="code" class="control-label">Packing no.</label>
            <input type="text" name="code" class="form-control" id="code" value="<?=$params['autonumber']?>">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="pack_date" class="control-label">Packing date</label>
            <div class="input-group date" id="pack_date" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="pack_date" name="pack_date" placeholder="Enter packing date" required>
                <div class="input-group-append" data-target="#pack_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="invoice" class="control-label">Invoice no.</label>
            <select name="invoice" class="form-control select2bs4" id="invoice" required>
                <option></option>
                <?php foreach($params['invoice'] as $rows) : ?>
                    <option value="<?=$rows->inv_id?>"><?=$rows->inv_no?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" id="pi_id" name="pi_id">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="container" class="control-label">Container</label>
            <input type="text" name="container" class="form-control upper" id="container" placeholder="Enter container" autocomplete="off" disabled>
        </div>
    </div>
</div>