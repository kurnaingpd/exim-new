<form id="form-item-add">
    <div class="overflow-auto" style="max-height: 650px; overflow-x: hidden;">
        <div class="card">
            <div class="card-header">
                <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group required">
                            <label for="code" class="control-label">Item code</label>
                            <input type="text" name="code" class="form-control" id="code" placeholder="Enter item code" autocomplete="off" autofocus required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group required">
                            <label for="hscode" class="control-label">Category</label>
                            <select name="category" class="form-control select2bs4" id="category" required>
                                <option></option>
                                <?php foreach($params['category'] as $rows) : ?>
                                    <option value="<?=$rows->id?>"><?=$rows->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group required">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" name="name" class="form-control upper" id="name" placeholder="Enter name" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group required">
                            <label for="desc" class="control-label">Packing description</label>
                            <input type="text" name="desc" class="form-control upper" id="desc" placeholder="Enter description" autocomplete="off" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group required">
                            <label for="net" class="control-label">Net weight</label>
                            <input type="text" name="net" class="form-control" id="net" placeholder="Enter in KG" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group required">
                            <label for="gross" class="control-label">Gross weight</label>
                            <input type="text" name="gross" class="form-control" id="gross" placeholder="Enter in KG" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group required">
                            <label for="length" class="control-label">Length</label>
                            <input type="text" name="length" class="form-control" id="length" placeholder="Enter in MM" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group required">
                            <label for="width" class="control-label">Width</label>
                            <input type="text" name="width" class="form-control" id="width" placeholder="Enter in MM" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group required">
                            <label for="height" class="control-label">Height</label>
                            <input type="text" name="height" class="form-control" id="height" placeholder="Enter in MM" autocomplete="off" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="md_no" class="control-label">MD no.</label>
                            <input type="text" name="md_no" class="form-control" id="md_no" placeholder="Enter md no" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6><i class="fas fa-puzzle-piece mr-2"></i>Specification</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group required">
                            <label for="spec_desc" class="control-label">Description</label>
                            <textarea class="form-control grid" id="spec_desc" name="spec_desc" rows="3" autocomplete="off" placeholder="Enter description" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group required">
                            <label for="form" class="control-label">Form</label>
                            <input type="text" class="form-control grid" id="form" name="form" autocomplete="off" placeholder="Enter description" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group required">
                            <label for="texture" class="control-label">Texture</label>
                            <input type="text" class="form-control grid" id="texture" name="texture" autocomplete="off" placeholder="Enter texture" required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group required">
                            <label for="colour" class="control-label">Colour</label>
                            <input type="text" class="form-control grid" id="colour" name="colour" autocomplete="off" placeholder="Enter colour" required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group required">
                            <label for="taste" class="control-label">Taste</label>
                            <input type="text" class="form-control grid" id="taste" name="taste" autocomplete="off" placeholder="Enter taste" required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group required">
                            <label for="ddour" class="control-label">Odour</label>
                            <input type="text" class="form-control grid" id="odour" name="odour" autocomplete="off" placeholder="Enter odour" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group required">
                            <label for="fat" class="control-label">Fat</label>
                            <input type="text" class="form-control grid" id="fat" name="fat" autocomplete="off" placeholder="Enter fat" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group required">
                            <label for="moisture" class="control-label">Moisture content (%)</label>
                            <input type="text" class="form-control grid" id="moisture" name="moisture" autocomplete="off" placeholder="Enter moisture" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group required">
                            <label for="caffeine" class="control-label">Caffeine</label>
                            <input type="text" class="form-control grid" id="caffeine" name="caffeine" autocomplete="off" placeholder="Enter caffeine" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group required">
                            <label for="ingredients" class="control-label">Ingredients</label>
                            <textarea class="form-control grid" id="ingredients" name="ingredients" rows="3" autocomplete="off" placeholder="Enter ingredients" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group required">
                            <label for="product_shelf" class="control-label">Product Shelf Life</label>
                            <input type="text" class="form-control grid" id="product_shelf" name="product_shelf" autocomplete="off" placeholder="Enter product shelf life" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group required">
                            <label for="packaging" class="control-label">Packaging Material</label>
                            <input type="text" class="form-control grid" id="packaging" name="packaging" autocomplete="off" placeholder="Enter packaging material" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group required">
                            <label for="storage" class="control-label">Storage Condition Requirement</label>
                            <input type="text" class="form-control grid" id="storage" name="storage" autocomplete="off" placeholder="Enter storage condition requirement" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group required">
                            <label for="functions" class="control-label">Function of the food material</label>
                            <input type="text" class="form-control grid" id="functions" name="functions" autocomplete="off" placeholder="Enter function of the food material" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group required">
                            <label for="usage" class="control-label">Usage</label>
                            <input type="text" class="form-control grid" id="usage" name="usage" autocomplete="off" placeholder="Enter usage" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group required">
                            <label for="source" class="control-label">Source Of Allergen</label>
                            <input type="text" class="form-control grid" id="source" name="source" autocomplete="off" placeholder="Enter source of allergen" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group required">
                            <label for="country" class="control-label">Country of origin</label>
                            <input type="text" class="form-control grid" id="country" name="country" autocomplete="off" placeholder="Enter country of origin" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
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
        </div>
        <div class="card-footer">
            <div class="float-right">
                <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
            </div>
        </div>
    </div>
</form>