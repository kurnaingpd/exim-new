<div id="detail">
    <div class="row border-bottom">
        <div class="col-md-12">
            <div class="form-group">
                <label for="coding_notes" class="control-label">Notes</label>
                <textarea name="coding_notes" class="form-control upper cod_print" id="coding_notes" placeholder="Enter notes" autocomplete="off" rows="2"><?=$params['cust_coding']->notes?></textarea>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Type</th>
                    <th>Imported by</th>
                    <th>Consumer hotline</th>
                    <th>Best before</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($detail['cust_coding'] as $rows) : ?>
                    <tr class="text-center">
                        <td><?=$no;?>.</td>
                        <td><?=$rows->coding_type_name?></td>
                        <td><?=$rows->import_by?></td>
                        <td><?=$rows->hotline?></td>
                        <td><?=$rows->best_before?></td>
                    </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>