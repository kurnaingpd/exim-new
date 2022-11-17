<table class="table table-sm table-bordered table-striped">
    <thead>
        <tr class="text-center">
            <th>Container type</th>
            <th>Max. CBM</th>
            <th>Number of container</th>
            <th><i class="fas fa-ellipsis-h"></i></th>
        </tr>
    </thead>
    <tbody id="data-container">
        <?php foreach($params['container_no'] as $rows) : ?>
            <tr class="text-center" data-id="<?=$rows->id?>">
                <td>
                    <input type="text" class="form-control" value="<?=$rows->name?>" style="background-color:transparent; border: none transparent;" disabled />
                </td>
                <td>
                    <input type="text" class="form-control" value="<?=$rows->max_cbm?>" style="background-color:transparent; border: none transparent;" disabled />
                </td>
                <td>
                    <input type="text" class="form-control" value="<?=$rows->number_of_container?>" style="background-color:transparent; border: none transparent;" disabled />
                </td>
                <td>
                    <a href="<?=site_url('export/proforma/detail/container/'.$rows->id)?>" class="btn btn-sm btn-info">
                        <i class="fas fa-plus"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-danger btn-remove" style="cursor:pointer;" data-row="<?=$rows->id?>"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>