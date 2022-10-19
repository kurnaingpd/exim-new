<?php $no=1; foreach($chained['coding_detail'] as $rows) : ?>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="sachet_imported" class="control-label">(<?=$rows->coding_type_name?>) - Imported by</label>
                <input type="text" name="imported_<?=$no?>" class="form-control" id="imported_<?=$no?>" placeholder="Enter imported by" value="<?=$rows->import_by?>" disabled>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="sachet_hotline" class="control-label">(<?=$rows->coding_type_name?>) - Consumer hotline</label>
                <input type="text" name="hotline_<?=$no?>" class="form-control" id="hotline_<?=$no?>" placeholder="Enter imported by" value="<?=$rows->hotline?>" disabled>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="sachet_bb" class="control-label">(<?=$rows->coding_type_name?>) - Best before</label>
                <input type="text" name="bb_<?=$no?>" class="form-control" id="bb_<?=$no?>" placeholder="Enter imported by" value="<?=$rows->best_before?>" disabled>
            </div>
        </div>
    </div>
<?php $no++; endforeach; ?>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="notes" class="control-label">Notes</label>
            <textarea name="notes" class="form-control upper" id="notes" placeholder="Enter address" disabled required rows="2"><?=$chained['coding']->notes?></textarea>
        </div>
    </div>
</div>