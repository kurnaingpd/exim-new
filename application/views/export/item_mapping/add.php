<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-mapping-add">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="item" class="control-label">Item</label>
                        <select name="item" class="form-control select2bs4" id="item" required>
                            <option></option>
                            <?php foreach($params['item'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->code.' - '.$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="country" class="control-label">Country</label>
                        <select name="country" class="form-control select2bs4" id="country" required>
                            <option></option>
                            <?php foreach($params['country'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->code.' - '.$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('export/item')?>">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-block btn-success save">
                        <i class="fas fa-save mr-2"></i>Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <div class="float-right">
            <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
        </div>
    </div>
</div>