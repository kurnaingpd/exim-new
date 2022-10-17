<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="code" class="control-label">Product statement letter No.</label>
            <input type="text" name="code" class="form-control" id="code" value="<?=$params['autonumber']?>" readonly>
        </div>
    </div>

    <div class="col-md-9">
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

    <!-- <div class="col-md-3">
        <div class="form-group required">
            <label for="fullname" class="control-label">Fullname</label>
            <input type="text" name="fullname" class="form-control" id="fullname" autocomplete="off" placeholder="Enter fullname" required>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="position" class="control-label">Position</label>
            <input type="text" name="position" class="form-control" id="position" autocomplete="off" placeholder="Enter position" required>
        </div>
    </div> -->
</div>