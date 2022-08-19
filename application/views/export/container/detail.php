<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-info mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-container-detail">
            <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group required">
                        <label for="name" class="control-label">Name/Description</label>
                        <input type="text" name="name" class="form-control upper" id="name" placeholder="Enter name" autocomplete="off" value="<?=$params['detail']->name?>" autofocus required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="cbm" class="control-label">Max CBM</label>
                        <input type="text" name="cbm" class="form-control" id="cbm" placeholder="Enter max cbm" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->max_cbm?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('export/container')?>">
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