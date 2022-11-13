<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <table id="tpackinglist" class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Packing no.</th>
                    <th>Consignee</th>
                    <th>Notify</th>
                    <th>Shipper</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th><i class="fas fa-ellipsis-h"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($params['list'] as $rows) : ?>
                    <tr class="align-middle">
                        <td class="text-center"><?=$no?>.</td>
                        <td class="text-center"><?=$rows->code?></td>
                        <td><?=$rows->consignee_name?></td>
                        <td><?=$rows->notify_name?></td>
                        <td><?=$rows->shipper_name?></td>
                        <td class="text-center"><?=$rows->created_at?></td>
                        <td class="text-center"><?=($rows->updated_at?$rows->updated_at:'-')?></td>
                        <td class="text-center">
                            <a href="<?=site_url('export/packing/detail/'.$rows->id)?>" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?=site_url('export/packing/detail_container/'.$rows->id)?>" class="btn btn-sm btn-default">
                                <i class="fas fa-truck-moving"></i>
                            </a>
                            <a href="<?=site_url('export/packing/print/'.$rows->id)?>" class="btn btn-sm btn-warning" target="_blank">
                                <i class="fas fa-print"></i>
                            </a>
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