<form id="form-qcheck-detail">
    <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
    <div class="card">
        <div class="card-header">
            <h6><i class="fas fa-info mr-2"></i><?=$header?></h6>
        </div>
        <div class="card-body overflow-auto" style="max-height: 650px; overflow-x: hidden;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="code" class="control-label">QC no.</label>
                                <input type="text" name="code" class="form-control" id="code" value="<?=$params['detail']->code?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="product" class="control-label">Product name</label>
                                <select name="product" class="form-control select2bs4" id="product" required>
                                    <option></option>
                                    <?php foreach($params['product'] as $rows) : ?>
                                        <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->item_id)?'selected':'')?>><?=$rows->code.' - '.$rows->name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="prod_date" class="control-label">Production date</label>
                                <div class="input-group date" id="prod_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="prod_date" name="prod_date" value="<?=$params['detail']->production_date?>" placeholder="Enter production date" required>
                                    <div class="input-group-append" data-target="#prod_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="exp_date" class="control-label">Expired date</label>
                                <div class="input-group date" id="exp_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="exp_date" name="exp_date" value="<?=$params['detail']->expired_date?>" placeholder="Enter expired date" required>
                                    <div class="input-group-append" data-target="#exp_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group required">
                                <label for="no_surat" class="control-label">No. surat jalan</label>
                                <input type="text" name="no_surat" class="form-control" id="no_surat" placeholder="Enter no. surat jalan" value="<?=$params['detail']->surat_jalan?>" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group required">
                                <label for="batch" class="control-label">Batch</label>
                                <input type="text" name="batch" class="form-control" id="batch" placeholder="Enter batch" required value="<?=$params['detail']->batch?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="attachment_1" class="control-label">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attachment_1" name="attachment_1" accept="image/*" autofocus autocomplete="off">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="attachment_2" class="control-label">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="attachment_2" name="attachment_2" accept="image/*" autofocus autocomplete="off">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Organoletic, Physical, Chemical Test
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group required">
                                <label for="aroma" class="control-label">Aroma</label>
                                <input type="text" name="aroma" class="form-control upper" id="aroma" value="<?=$params['detail']->aroma?>" placeholder="Enter aroma" autocomplete="off" autofocus required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group required">
                                <label for="taste" class="control-label">Taste</label>
                                <input type="text" name="taste" class="form-control upper" id="taste" value="<?=$params['detail']->taste?>" placeholder="Enter taste" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group required">
                                <label for="value" class="control-label">Value</label>
                                <input type="text" name="value" class="form-control upper" id="value" value="<?=$params['detail']->value?>" placeholder="Enter value" autocomplete="off" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="moisture" class="control-label">Moisture</label>
                                <input type="text" name="moisture" class="form-control" id="moisture" value="<?=$params['detail']->moisture?>" placeholder="Enter moisture" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="ph" class="control-label">PH</label>
                                <input type="text" name="ph" class="form-control" id="ph" value="<?=$params['detail']->ph?>" placeholder="Enter ph" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="brix" class="control-label">Brix</label>
                                <input type="text" name="brix" class="form-control" id="brix" value="<?=$params['detail']->brix?>" placeholder="Enter brix" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="finish_date" class="control-label">Finish good check date</label>
                                <div class="input-group date" id="finish_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="finish_date" name="finish_date" value="<?=$params['detail']->finish_good_date?>" placeholder="Enter finish good check date" required>
                                    <div class="input-group-append" data-target="#finish_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Microbiology
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="analys_date" class="control-label">Analysis date</label>
                                <div class="input-group date" id="analys_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="analys_date" name="analys_date" value="<?=$params['detail']->analys_date?>" placeholder="Enter analysis date" required>
                                    <div class="input-group-append" data-target="#analys_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="analys_end_date" class="control-label">Analysis end date</label>
                                <div class="input-group date" id="analys_end_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="analys_end_date" name="analys_end_date" value="<?=$params['detail']->analys_end_date?>" placeholder="Enter analysis end date" required>
                                    <div class="input-group-append" data-target="#analys_end_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="tot_plate" class="control-label">Total plate count</label>
                                <input type="text" name="tot_plate" class="form-control upper" id="tot_plate" value="<?=$params['detail']->total_plate?>" autocomplete="off" placeholder="Enter total plate count" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group required">
                                <label for="yeast" class="control-label">Yeast & mold</label>
                                <input type="text" name="yeast" class="form-control upper" id="yeast" value="<?=$params['detail']->yeast?>" autocomplete="off" placeholder="Enter yeast & mold" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group required">
                                <label for="coliform" class="control-label">Coliform</label>
                                <input type="text" name="coliform" class="form-control upper" id="coliform" value="<?=$params['detail']->coliform?>"autocomplete="off" placeholder="Enter coliform" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group required">
                                <label for="salmonella" class="control-label">Salmonella</label>
                                <input type="text" name="salmonella" class="form-control upper" id="salmonella" value="<?=$params['detail']->salmonella?>" autocomplete="off" placeholder="Enter salmonella" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="enterobacteriaceae" class="control-label">Enterobacteriaceae</label>
                                <input type="text" name="enterobacteriaceae" class="form-control upper" id="enterobacteriaceae" value="<?=$params['detail']->enterobacteriaceae?>" autocomplete="off" placeholder="Enter salmonella" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="pi_code" class="control-label">Status</label>
                                <select name="status" class="form-control select2bs4" id="status" required>
                                    <option></option>
                                    <?php foreach($params['status'] as $rows) : ?>
                                        <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->qc_status_id)?'selected':'')?>><?=$rows->name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="release_date" class="control-label">Release QC</label>
                                <div class="input-group date" id="release_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input cursor-context" autocomplete="off" id="release_date" name="release_date" value="<?=$params['detail']->release_date?>" placeholder="Enter release qc date" required>
                                    <div class="input-group-append" data-target="#release_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-default btn-block cancel" href="#" onclick="history.go(-1)">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success save btn-block" id="btn-qcheck-save">
                        <i class="fas fa-save mr-2"></i>Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>