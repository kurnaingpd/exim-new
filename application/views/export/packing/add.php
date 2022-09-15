<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-packing-add">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="code" class="control-label">Packing no.</label>
                        <input type="text" name="code" class="form-control" id="code" value="<?=$params['autonumber']?>" readonly>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="pack_date" class="control-label">Packing date</label>
                        <div class="input-group date" id="pack_date" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="pack_date" name="pack_date" placeholder="Enter packing date" required>
                            <div class="input-group-append" data-target="#pack_date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="invoice" class="control-label">Invoice no.</label>
                        <select name="invoice" class="form-control select2bs4" id="invoice" required>
                            <option></option>
                            <?php foreach($params['invoice'] as $rows) : ?>
                                <option value="<?=$rows->inv_id?>"><?=$rows->inv_no?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="container" class="control-label">Container</label>
                        <input type="text" name="container" class="form-control upper" id="container" autocomplete="off" required>
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
                    <button class="btn btn-block btn-success save" id="btn-packing-save">
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