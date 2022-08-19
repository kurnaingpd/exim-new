<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-menu-add">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="module" class="control-label">Module name</label>
                        <select class="form-control select2bs4" id="module" name="module">
                            <option></option>
                            <?php foreach($params['module'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="group" class="control-label">Group name</label>
                        <select class="form-control select2bs4" id="group" name="group">
                            <option></option>
                            <?php foreach($params['group'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="menu" class="control-label">Menu name</label>
                        <input type="text" name="menu" class="form-control" id="menu" placeholder="Enter menu name" autocomplete="off" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="icon" class="control-label">Icon</label>
                        <input type="text" name="icon" class="form-control lower" id="icon" placeholder="Enter icon" autocomplete="off" required>
                        <small>Example: far fa-keyboard</small>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="url" class="control-label">URL</label>
                        <input type="text" name="url" class="form-control no-space lower" id="url" placeholder="Enter URL" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('uac/menu')?>">
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