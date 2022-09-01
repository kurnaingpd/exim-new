<div class="row">
    <div class="col-md-2">
        <div class="form-group required">
            <label for="item_category" class="control-label">Item category</label>
            <select name="item_category" class="form-control select2bs4" id="item_category" required>
                <option></option>
                <?php foreach($params['load_port'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="product" class="control-label">Product</label>
            <select name="product" class="form-control select2bs4" id="product" required>
                <option></option>
                <?php foreach($params['load_port'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="hs_code" class="control-label">HS code</label>
            <input type="text" name="hs_code" class="form-control upper" id="hs_code" placeholder="Enter hs code" required>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="config" class="control-label">Configuration</label>
            <input type="text" name="config" class="form-control upper" id="config" placeholder="Enter configuration" required>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="qty" class="control-label">Qty</label>
            <input type="text" name="qty" class="form-control" id="qty" placeholder="Enter qty" required>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="price" class="control-label">Price</label>
            <input type="text" name="price" class="form-control" id="price" placeholder="Enter price" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <input type="button" class="btn btn-block btn-success" id="btn-item" value="Add detail(s)">
    </div>
</div>