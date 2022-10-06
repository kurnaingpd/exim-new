<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-freight-add">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="company" class="control-label">Company</label>
                        <input type="text" name="company" class="form-control upper" id="company" placeholder="Enter company" autocomplete="off" autofocus required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="contact" class="control-label">Company contact</label>
                        <input type="text" name="contact" class="form-control" id="contact" placeholder="Enter company contact" oninput="this.value = this.value.replace(/[^0-9+]/g, '').replace(/(\..*?)\..*/g, '$1');" autocomplete="off" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="number" class="control-label">Company no.</label>
                        <input type="text" name="number" class="form-control" id="number" placeholder="Enter company no." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('export/freight')?>">
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