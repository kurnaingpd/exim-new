<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-info mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-loading-detail">
            <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="code" class="control-label">Code</label>
                        <input type="text" name="code" class="form-control upper" id="code" placeholder="Enter loading port code" value="<?=$params['detail']->code?>" disabled>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="names" class="control-label">Name</label>
                        <input type="text" name="names" class="form-control" id="names" placeholder="Enter loading port name" autocomplete="off" required value="<?=$params['detail']->name?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('export/master/loading_port')?>">
                        <i class="fas fa-arrow-left mr-2"></i>Back
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