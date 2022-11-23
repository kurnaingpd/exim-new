<div class="row">
    <div class="col-md-4">
        <div class="form-group required">
            <label for="containers" class="control-label">Container type</label>
            <select name="containers" class="form-control select2bs4 container" id="containers">
                <option></option>
                <?php foreach($params['container'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group required">
            <label for="max_cbm" class="control-label">Max. CBM</label>
            <input type="text" name="max_cbm" class="form-control container" id="max_cbm" placeholder="Enter max cbm" disabled>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group required">
            <label for="container_no" class="control-label">Number of container</label>
            <input type="text" name="container_no" class="form-control upper container" id="container_no" placeholder="Enter number of container">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <input type="button" class="btn btn-block btn-success" id="btn-container" value="Add detail(s)">
    </div>
</div>