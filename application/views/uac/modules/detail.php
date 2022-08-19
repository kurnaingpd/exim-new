<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-info mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-module-detail">
            <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="module" class="control-label">Module name</label>
                        <input type="text" name="module" class="form-control upper" id="module" placeholder="Enter module name" autocomplete="off" autofocus required value="<?=$params['detail']->name?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="icon" class="control-label">Icon</label>
                        <input type="text" name="icon" class="form-control lower" id="icon" placeholder="Enter icon" autocomplete="off" required value="<?=$params['detail']->icon?>">
                        <small>Example: far fa-keyboard</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="url" class="control-label">URL</label>
                        <input type="text" name="url" class="form-control no-space lower" id="url" placeholder="Enter URL" autocomplete="off" required value="<?=$params['detail']->url?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('uac/modules')?>">
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