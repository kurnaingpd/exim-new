<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-info mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-bank-detail">
            <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="code" class="control-label">Code</label>
                        <input type="text" name="code" class="form-control" id="code" disabled value="<?=$params['detail']->code?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="names" class="control-label">Name</label>
                        <input type="text" name="names" class="form-control upper" id="names" placeholder="Enter bank name" autocomplete="off" required value="<?=$params['detail']->name?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="account" class="control-label">Account</label>
                        <input type="text" name="account" class="form-control" id="account" placeholder="Enter bank account" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required value="<?=$params['detail']->account?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="swift" class="control-label">Swift code</label>
                        <input type="text" name="swift" class="form-control lower" id="swift" placeholder="Enter swift code" autocomplete="off" required value="<?=$params['detail']->swift_code?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="branch" class="control-label">Branch</label>
                        <textarea name="branch" class="form-control upper" id="branch" placeholder="Enter branch" autocomplete="off" rows="4" required><?=$params['detail']->branch?></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="address" class="control-label">Address</label>
                        <textarea type="text" name="address" class="form-control upper" id="address" placeholder="Enter address" autocomplete="off" rows="4" required><?=$params['detail']->address?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('export/bank')?>">
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