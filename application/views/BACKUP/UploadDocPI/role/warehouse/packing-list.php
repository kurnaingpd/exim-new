<form method="POST" action="<?php echo base_url('MenuDocPI/upload08/'.$getrowspi_value->sign_pi_noid); ?>" enctype="multipart/form-data" class="form-pi">
    <div class="form-group">
        <div class="col-md-1">
            <?php if($getrowspi_value->sign_packing_list=='1'){ ?>
                    <span class="btn btn-success"></span>
            <?php }else{ ?>
                    <span class="btn btn-warning"></span>
            <?php } ?>
        </div>
        <label class="col-md-1" for="inputDefault"></label>
        <label class="col-md-3" for="inputDefault">Packing List</label>
        <label class="col-md-1" for="inputDefault"></label>
        <div class="col-md-2">
            <input type="date" class="form-control" name="date08" value="<?php echo $getrowspi_value->sign_packing_list_date ?>" id="inputDefault" <?=($groupname->GroupDesc == 'WAREHOUSE'?'':'disabled')?> required>
        </div>
        <div class="col-md-2">
            <input type="file" class="form-control" name="berkas" id="inputDefault" <?=($groupname->GroupDesc == 'WAREHOUSE'?'':'disabled')?> required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn btn-success" <?=($groupname->GroupDesc == 'WAREHOUSE'?'':'disabled')?> ><i class="fa fa-save"></i> Save</button>
            <?php if($getrowspi_value->sign_packing_list=='1'){ ?>
                <a href="<?php echo base_url('MenuDocPI/download08/'.$getrowspi_value->sign_pi_noid); ?>" class="btn btn btn-info"><i class="fa fa-download"></i></a>
            <?php }else{ ?>
                <button type="submit" class="btn btn btn-info" disabled><i class="fa fa-download"></i></button>
            <?php } ?>
        </div>
    </div>
</form>