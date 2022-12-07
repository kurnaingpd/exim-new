<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-info mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-country-detail">
            <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="top" class="control-label">Country code</label>
                        <input type="text" name="code" class="form-control no-space upper" id="code" placeholder="Enter country code" value="<?=$params['detail']->code?>" disabled>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="form-group required">
                        <label for="name" class="control-label">Country name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter country name" autocomplete="off" autofocus pattern="^[a-zA-Z\s]+$" required value="<?=$params['detail']->name?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('export/country')?>">
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