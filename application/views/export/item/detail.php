<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-info mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-item-detail">
            <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="code" class="control-label">Item code</label>
                        <input type="text" name="code" class="form-control" id="code" placeholder="Enter item code" autocomplete="off" autofocus disabled oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="<?=$params['detail']->code?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="hscode" class="control-label">HS code</label>
                        <input type="text" name="hscode" class="form-control" id="hscode" placeholder="Enter HS code" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9.]/g, '');" value="<?=$params['detail']->hs_code?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="hscode" class="control-label">Category</label>
                        <select name="category" class="form-control select2bs4" id="category" required>
                            <option></option>
                            <?php foreach($params['category'] as $rows) : ?>
                                <option value="<?=$rows->id?>" <?=($params['detail']->item_category_id==$rows->id?'selected':'')?>><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" name="name" class="form-control upper" id="name" placeholder="Enter name" autocomplete="off" required value="<?=$params['detail']->name?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="desc" class="control-label">Packing description</label>
                        <input type="text" name="desc" class="form-control upper" id="desc" placeholder="Enter description" autocomplete="off" required value="<?=$params['detail']->pack_desc?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="net" class="control-label">Net weight</label>
                        <input type="text" name="net" class="form-control" id="net" placeholder="Enter in KG" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->net_wight?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="gross" class="control-label">Gross weight</label>
                        <input type="text" name="gross" class="form-control" id="gross" placeholder="Enter in KG" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->gross_weight?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="length" class="control-label">Length</label>
                        <input type="text" name="length" class="form-control" id="length" placeholder="Enter in MM" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->length?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="width" class="control-label">Width</label>
                        <input type="text" name="width" class="form-control" id="width" placeholder="Enter in MM" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->width?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="height" class="control-label">Height</label>
                        <input type="text" name="height" class="form-control" id="height" placeholder="Enter in MM" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="<?=$params['detail']->height?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('export/item')?>">
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