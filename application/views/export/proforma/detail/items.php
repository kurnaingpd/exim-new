<form id="form-proforma-detail_container">
    <input type="hidden" class="containers" id="id" name="id" value="<?=$params['container']->id?>">
    <div class="card">
        <div class="card-header">
            <h6>Container: <?=$params['container']->number_of_container?> / <?=$params['container']->name?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="item_category" class="control-label">Item category</label>
                        <select name="item_category" class="form-control select2bs4 item" id="item_category">
                            <option></option>
                            <?php foreach($params['category'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group required">
                        <label for="product" class="control-label">Product</label>
                        <select name="product" class="form-control select2bs4 item" id="product">
                            <option></option>
                            <?php foreach($params['item'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" class="item" id="volume" name="volume">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="hs_code" class="control-label">HS code</label>
                        <input type="text" name="hs_code" class="form-control upper item" id="hs_code" placeholder="Enter hs code">
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="form-group required">
                        <label for="qty" class="control-label">Qty</label>
                        <input type="text" name="qty" class="form-control item" id="qty" placeholder="Enter qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="form-group required">
                        <label for="price" class="control-label">Price</label>
                        <input type="text" name="price" class="form-control item" id="price" placeholder="Enter price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <input type="button" class="btn btn-block btn-success" id="btn-item" value="Add detail(s)">
                </div>
            </div>
        </div>
        <div class="card-body border-top">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Item category</th>
                        <th>Product</th>
                        <th>HS code</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>CBM</th>
                        <th><i class="fas fa-ellipsis-h"></i></th>
                    </tr>
                </thead>
                <tbody id="data-item">
                    <?php foreach($params['item_detail'] as $rows) : ?>
                        <tr data-id="<?=$rows->id?>">
                            <td>
                                <input type="text" class="form-control" value="<?=$rows->pi_item_category_name?>" size="12" disabled style="background-color:transparent; border: none transparent;">
                            </td>
                            <td>
                                <input type="text" class="form-control" value="<?=$rows->item_name?>" size="25" disabled style="background-color:transparent; border: none transparent;">
                            </td>
                            <td>
                                <input type="text" class="form-control" value="<?=$rows->hs_code?>" disabled style="background-color:transparent; border: none transparent; text-align: center;">
                            </td>
                            <td>
                                <input type="text" class="form-control" value="<?=$rows->qty?>" size="5" disabled style="background-color:transparent; border: none transparent; text-align: right;">
                            </td>
                            <td>
                                <input type="text" class="form-control" value="<?=number_format($rows->price)?>" size="5" disabled style="background-color:transparent; border: none transparent; text-align: right;">
                            </td>
                            <td>
                                <input type="text" class="form-control" value="<?=$rows->cbm?>" size="5" disabled style="background-color:transparent; border: none transparent; text-align: right;">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="<?=$rows->id?>" data-value="<?=$rows->cbm?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-default btn-block cancel" href="#" onclick="history.go(-1)">
                        <i class="fas fa-arrow-left mr-2"></i>Back
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success save btn-block" id="btn-proforma-save">
                        <i class="fas fa-save mr-2"></i>Save
                    </button>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <small>
                Maximum CBM: <input type="text" value="<?=$params['container']->max_cbm?>" size="4" id="currenct_cbm" style="background-color: transparent; border: 0;"><br>
                Remain CBM: <input type="text" value="<?=($params['cbm']?$params['cbm']->remain_cbm:$params['container']->max_cbm)?>" id="remain_cbm" style="background-color: transparent; border: 0;">
            </small>
        </div>
    </div>
</form>