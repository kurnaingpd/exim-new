<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-chalkboard-teacher mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-signed-pi">
            <input type="hidden" id="id" name="id" value="<?=$params['id']?>" disabled>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="text-center" for="cpshipto">Item name</label>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <label for="cpshipto">Date</label>
                    </div>
                </div>

                <div class="col-md-5 text-center">
                    <div class="form-group">
                        <label for="cpshipto">Value</label>
                    </div>
                </div>

                <div class="col-md-1 text-center">
                    <div class="form-group">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                </div>
            </div>

                <div class="card-body overflow-auto" style="max-height: 550px; overflow-x: hidden;">
                    <?php 
                        foreach($params['item'] as $item_id) : 
                            if(isset($params['assign'][$item_id->pi_item_id])) :
                    ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input check" type="checkbox" id="<?=$item_id->pi_item_id?>" name="pi_item_id_<?=$item_id->pi_item_id?>" value="<?=$item_id->pi_item_id?>" <?=$item_id->flags?>>
                                        <label class="form-check-label" for="cpshipto"><?=$item_id->item?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input item_<?=$item_id->pi_item_id?> cursor-context" autocomplete="off" id="pi_date_<?=$item_id->name?>" name="pi_date_<?=$item_id->pi_item_id?>" value="<?=$item_id->dates?>" disabled required>
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php if($item_id->option_id == 1) : ?>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input item_<?=$item_id->pi_item_id?>" id="pi_val_<?=$item_id->pi_item_id?>" name="pi_val_<?=$item_id->pi_item_id?>" accept="application/pdf" id="pi_val_<?=$item_id->name?>" name="pi_val_<?=$item_id->pi_item_id?>" value="<?=$item_id->value?>" disabled required>
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    <?php elseif($item_id->option_id == 2) : ?>
                                        <select class="form-control select2bs4 item_<?=$item_id->pi_item_id?>"" id="pi_val_<?=$item_id->name?>" name="pi_val_<?=$item_id->pi_item_id?>" disabled required>
                                            <option></option>
                                            <?php if($item_id->pi_item_id == 3) : ?>
                                                <?php foreach($params['top'] as $rows) : ?>
                                                    <option value="<?=$rows->id?>" <?=(($rows->id==$item_id->value)?'selected':'')?>><?=$rows->name?></option>
                                                <?php endforeach; ?>
                                            <?php elseif($item_id->pi_item_id == 6) : ?>
                                                <?php foreach($params['incoterm'] as $rows) : ?>
                                                    <option value="<?=$rows->id?>" <?=(($rows->id==$item_id->value)?'selected':'')?> ><?=$rows->code.' - '.$rows->name?></option>
                                                <?php endforeach; ?>
                                            <?php elseif($item_id->pi_item_id == 24) : ?>
                                                <?php foreach($params['balance'] as $rows) : ?>
                                                    <option value="<?=$rows->id?>" <?=(($rows->id==$item_id->value)?'selected':'')?><?=$rows->name?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <?php if($item_id->option_id == 1) : ?>
                                    <a href="<?=base_url('assets/attachment/signedpi/'.$item_id->value)?>" class="btn btn-block btn-info text-center <?=$item_id->download?>" target="_blank"  >
                                        <i class="fas fa-download"></i>
                                    </a>
                                <?php elseif($item_id->option_id == 2) : ?>

                                <?php endif; ?>
                            </div>
                        </div>
                        <?php else : ?>
                            <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input check" type="checkbox" id="<?=$item_id->pi_item_id?>" name="pi_item_id_<?=$item_id->pi_item_id?>" value="<?=$item_id->pi_item_id?>" <?=$item_id->flags?> disabled>
                                        <label class="form-check-label" for="cpshipto"><?=$item_id->item?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input item_<?=$item_id->pi_item_id?> cursor-context" autocomplete="off" id="pi_date_<?=$item_id->name?>" name="pi_date_<?=$item_id->pi_item_id?>" value="<?=$item_id->dates?>" disabled required>
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <?php if($item_id->option_id == 1) : ?>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input item_<?=$item_id->pi_item_id?>" id="pi_val_<?=$item_id->pi_item_id?>" name="pi_val_<?=$item_id->pi_item_id?>" accept="application/pdf" id="pi_val_<?=$item_id->name?>" name="pi_val_<?=$item_id->pi_item_id?>" value="<?=$item_id->value?>" disabled required>
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    <?php elseif($item_id->option_id == 2) : ?>
                                        <select class="form-control select2bs4 item_<?=$item_id->pi_item_id?>"" id="pi_val_<?=$item_id->name?>" name="pi_val_<?=$item_id->pi_item_id?>" disabled required>
                                            <option></option>
                                            <?php if($item_id->pi_item_id == 3) : ?>
                                                <?php foreach($params['top'] as $rows) : ?>
                                                    <option value="<?=$rows->id?>" <?=(($rows->id==$item_id->value)?'selected':'')?>><?=$rows->name?></option>
                                                <?php endforeach; ?>
                                            <?php elseif($item_id->pi_item_id == 6) : ?>
                                                <?php foreach($params['incoterm'] as $rows) : ?>
                                                    <option value="<?=$rows->id?>" <?=(($rows->id==$item_id->value)?'selected':'')?> ><?=$rows->code.' - '.$rows->name?></option>
                                                <?php endforeach; ?>
                                            <?php elseif($item_id->pi_item_id == 24) : ?>
                                                <?php foreach($params['balance'] as $rows) : ?>
                                                    <option value="<?=$rows->id?>" <?=(($rows->id==$item_id->value)?'selected':'')?><?=$rows->name?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php 
                        endif;
                        endforeach; 
                    ?>
                </div>
            

            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('export/signedpi')?>">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>

                <div class="col-md-6">
                    <button class="btn btn-block btn-success save" disabled>
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