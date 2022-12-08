<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-incoterm-add">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="code" class="control-label">Code</label>
                        <input type="text" name="code" class="form-control upper" id="code" placeholder="Enter code" autocomplete="off" autofocus maxlength="3" pattern="^[A-Z]+$" required>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="form-group required">
                        <label for="description" class="control-label">Description</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Enter description" autocomplete="off" pattern="^[A-Za-z\s]+$" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('export/master/incoterm')?>">
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