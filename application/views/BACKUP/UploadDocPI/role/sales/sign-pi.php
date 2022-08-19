<form method="POST" action="<?php echo base_url('MenuDocPI/upload01/'.$getrowspi_value->sign_pi_noid); ?>" enctype="multipart/form-data" class="form-pi">
    <div class="form-group">
        <div class="col-md-1">
            <?php if($getrowspi_value->sign_pi_submitPI=='1'){ ?>
                <span class="btn btn-success"></span>
            <?php }else{ ?>
                <span class="btn btn-warning"></span>
            <?php } ?>
        </div>
        <label class="col-md-2" for="inputDefault">SIGN PI</label>
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <input type="date" name="date01" value="<?php echo $getrowspi_value->sign_pi_submit_date ?>" class="form-control" id="inputDefault" <?=($groupname->GroupDesc == 'SALES'?'':'disabled')?> required>
        </div>
        <div class="col-md-2">
            <input type="file" name="berkas" class="form-control" id="inputDefault" <?=($groupname->GroupDesc == 'SALES'?'':'disabled')?> required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn btn-success" <?=($groupname->GroupDesc == 'SALES'?'':'disabled')?> ><i class="fa fa-save"></i> Save</button>
            <?php if($getrowspi_value->sign_pi_submitPI=='1'){ ?>
                <a href="<?php echo base_url('MenuDocPI/download01/'.$getrowspi_value->sign_pi_noid); ?>" class="btn btn btn-info"><i class="fa fa-download"></i></a>
            <?php }else{ ?>
                <button type="submit" class="btn btn btn-info" disabled><i class="fa fa-download"></i></button>
            <?php } ?>
        </div>
    </div>
</form>