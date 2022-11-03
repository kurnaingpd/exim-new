<div class="row">
    <div class="col-md-2">
        <div class="form-group required">
            <label for="item_category" class="control-label">Item category</label>
            <select name="item_category" class="form-control select2bs4 item" id="item_category">
                <option></option>
                <?php foreach($params['categories'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group required">
            <label for="product" class="control-label">Product</label>
            <select name="product" class="form-control select2bs4 item" id="product">
                <option></option>
                <?php foreach($params['items'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" class="item" id="volume" name="volume">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="hs_code" class="control-label">HS code</label>
            <input type="text" name="hs_code" class="form-control upper item" id="hs_code" placeholder="Enter hs code">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="config" class="control-label">Configuration</label>
            <input type="text" name="config" class="form-control upper item" id="config" placeholder="Enter configuration" disabled style="background-color: #fff;">
        </div>
    </div>

    <div class="col-md-1">
        <div class="form-group required">
            <label for="qty" class="control-label">Qty</label>
            <input type="text" name="qty" class="form-control item" id="qty" placeholder="Enter qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
        </div>
    </div>

    <div class="col-md-1">
        <div class="form-group required">
            <label for="price" class="control-label">Price</label>
            <input type="text" name="price" class="form-control item" id="price" placeholder="Enter price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <input type="button" class="btn btn-block btn-success" id="btn-item" value="Add detail(s)">
    </div>
</div>