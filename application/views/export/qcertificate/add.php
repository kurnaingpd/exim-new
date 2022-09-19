<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-qcertificate-add">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="code" class="control-label">Quality Certificate No.</label>
                        <input type="text" name="code" class="form-control" id="code" value="<?=$params['autonumber']?>" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="qa" class="control-label">QA No.</label>
                        <select name="qa" class="form-control select2bs4" id="qa" required>
                            <option></option>
                            <?php foreach($params['coa'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->code?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="invoice" class="control-label">Invoice No.</label>
                        <input type="hidden" name="invoice_id" id="invoice_id">
                        <input type="text" name="invoice" class="form-control" id="invoice" placeholder="Enter invoice no" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="#" onclick="history.go(-1)">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-block btn-success save" id="btn-qcertificate-save">
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