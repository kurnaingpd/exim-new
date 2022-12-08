<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <table id="tbeneficiarylist" class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Company name</th>
                    <th>Office</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Contact person name</th>
                    <th>Phone number</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Status</th>
                    <th><i class="fas fa-ellipsis-h"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($params['list'] as $rows) : ?>
                    <tr class="align-middle">
                        <td class="text-center"><?=$no?>.</td>
                        <td><?=$rows->name?></td>
                        <td><?=$rows->office?></td>
                        <td><?=$rows->address?></td>
                        <td><?=$rows->country_name?></td>
                        <td><?=$rows->contact_person?></td>
                        <td class="text-center"><?=$rows->phone_no?></td>
                        <td class="text-center"><?=$rows->created_at?></td>
                        <td class="text-center"><?=($rows->updated_at?$rows->updated_at:'-')?></td>
                        <td class="text-center"><?=$rows->is_active?></td>
                        <td class="text-center">
                            <a href="<?=site_url('export/master/beneficiary/detail/'.$rows->id)?>" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-sm btn-default" id="delete" data-id="<?=$rows->id?>">
                                <?=$rows->flags?>
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