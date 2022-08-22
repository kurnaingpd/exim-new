<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <table id="tmappinglist" class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Item code</th>
                    <th>HS code</th>
                    <th>Item name</th>
                    <th>Country</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th><i class="fas fa-ellipsis-h"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($params['list'] as $rows) : ?>
                    <tr class="align-middle">
                        <td class="text-center"><?=$no?>.</td>
                        <td class="text-center"><?=$rows->item_code?></td>
                        <td class="text-center"><?=$rows->item_hscode?></td>
                        <td><?=$rows->item_name?></td>
                        <td><?=$rows->country_name?></td>
                        <td class="text-center"><?=$rows->created_at?></td>
                        <td class="text-center"><?=($rows->updated_at?$rows->updated_at:'-')?></td>
                        <td class="text-center">
                            <a href="<?=site_url('export/item_mapping/detail/'.$rows->id)?>" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-sm btn-danger" id="delete" data-id="<?=$rows->id?>">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <div class="float-right">
            <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
        </div>
    </div>
</div>