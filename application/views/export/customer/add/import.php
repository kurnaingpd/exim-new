<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_bill" class="control-label">Bill of ladding</label>
            <select name="imp_bill" class="form-control select2bs4 import" id="imp_bill" disabled>
                <option></option>
                <?php foreach($params['import_bill'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_packing" class="control-label">Packing list</label>
            <select name="imp_packing" class="form-control select2bs4 import" id="imp_packing" disabled>
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_inv" class="control-label">Invoice</label>
            <select name="imp_inv" class="form-control select2bs4 import" id="imp_inv" disabled>
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_inv_uv" class="control-label">Invoice under value</label>
            <select name="imp_inv_uv" class="form-control select2bs4 import" id="imp_inv_uv" disabled>
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_coo" class="control-label">COO</label>
            <select name="imp_coo" class="form-control select2bs4 import" id="imp_coo" disabled>
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_hc" class="control-label">Health certificate</label>
            <select name="imp_hc" class="form-control select2bs4 import" id="imp_hc" disabled>
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_mat" class="control-label">Material savety data sheet</label>
            <select name="imp_mat" class="form-control select2bs4 import" id="imp_mat" disabled>
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_coa" class="control-label">COA</label>
            <select name="imp_coa" class="form-control select2bs4 import" id="imp_coa" disabled>
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_ps" class="control-label">Product spesification</label>
            <select name="imp_ps" class="form-control select2bs4 import" id="imp_ps" disabled>
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_qc" class="control-label">Quality certificate</label>
            <select name="imp_qc" class="form-control select2bs4 import" id="imp_qc" disabled>
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="imp_others" class="control-label">Others</label>
            <input type="text" name="imp_others" class="form-control import" id="imp_others" autocomplete="off" disabled>
        </div>
    </div>
</div>