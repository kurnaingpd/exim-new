<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-module-add">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="module" class="control-label">Module name</label>
                        <input type="text" name="module" class="form-control upper" id="module" placeholder="Enter module name" autocomplete="off" autofocus required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="icon" class="control-label">Icon</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="icon" name="icon" accept="image/*" autofocus autocomplete="off" required>
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <small>Note: download images from <a href="https://www.flaticon.com/" target="_blank">https://www.flaticon.com/</a></small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="url" class="control-label">URL</label>
                        <input type="text" name="url" class="form-control no-space lower" id="url" placeholder="Enter URL" autocomplete="off" required>
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