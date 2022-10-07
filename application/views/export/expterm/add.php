<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-expterm-add">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="top" class="control-label">Code</label>
                        <input type="text" name="code" class="form-control" id="code" value="<?=$params['autonumber']?>" readonly>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="top" class="control-label">PI number</label>
                        <input type="text" name="pi_no" class="form-control" id="pi_no" value="<?=$params['pi']->pi_no?>" readonly>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="attachment1" class="control-label">Upload export terms (1)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="attachment1" name="attachment1" accept="application/pdf" autofocus autocomplete="off" required>
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="attachment2" class="control-label">Upload export terms (2)</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="attachment2" name="attachment2" accept="application/pdf" autofocus autocomplete="off">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="top" class="control-label">Remarks</label>
                        <!-- <input type="text" name="pi_no" class="form-control" id="pi_no" value="<?=$params['pi']->pi_no?>" readonly> -->
                        <textarea class="form-control" id="remarks" name="remarks" rows="3" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('export/expterm')?>">
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