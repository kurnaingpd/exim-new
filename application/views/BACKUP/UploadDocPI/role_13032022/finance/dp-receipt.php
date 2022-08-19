<form method="POST" action="<?php echo base_url('MenuDocPI/upload04/'.$getrowspi_value->sign_pi_noid); ?>" enctype="multipart/form-data" class="form-pi">
    <div class="form-group">
        <div class="col-md-1">
            <?php if($getrowspi_value->sign_dp_receipt=='1'){ ?>
                    <span class="btn btn-success"></span>
            <?php }else{ ?>
                    <span class="btn btn-warning"></span>
            <?php } ?>
        </div>
        <label class="col-md-2" for="inputDefault">Down Payment Receipt</label>
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <?php if($getrowspi_value->sign_dp_receipt=='1'){ ?>
                <input type="date" class="form-control" name="date04" value="<?php echo $getrowspi_value->sign_dp_receipt_date ?>" id="inputDefault" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> >
            <?php }else{ ?>
                <input type="date" class="form-control" name="date04" id="inputDefault" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> >
            <?php } ?>
        </div>
        <div class="col-md-2">
            <input type="file" class="form-control" name="berkas" id="inputDefault" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> >
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn btn-success" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> ><i class="fa fa-save"></i> Save</button>
            <?php if($getrowspi_value->sign_dp_receipt=='1'){ ?>
                <a href="<?php echo base_url('MenuDocPI/download04/'.$getrowspi_value->sign_pi_noid); ?>" class="btn btn btn-info"><i class="fa fa-download"></i></a>
            <?php }else{ ?>
                <button type="submit" class="btn btn btn-info" disabled><i class="fa fa-download"></i></button>
            <?php } ?>
        </div>
    </div>
</form>