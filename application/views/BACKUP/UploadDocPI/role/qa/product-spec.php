<form method="POST" action="<?php echo base_url('MenuDocPI/uploadprodspec/'.$getrowspi_value->sign_pi_noid); ?>" enctype="multipart/form-data" class="form-pi">
    <div class="form-group">
        <div class="col-md-1">
            <?php if($getrowspi_value->sign_product_specificat=='1'){ ?>
                    <span class="btn btn-success"></span>
            <?php }else{ ?>
                    <span class="btn btn-warning"></span>
            <?php } ?>
        </div>
        <label class="col-md-1" for="inputDefault"></label>
        <label class="col-md-3" for="inputDefault">Product Specification</label>
            <label class="col-md-1" for="inputDefault"></label>
        <div class="col-md-2">
            <input type="date" class="form-control" name="datespec" id="inputDefault" <?=($groupname->GroupDesc == 'QA'?'':'disabled')?> required>
        </div>
        <div class="col-md-2">
            <input type="file" class="form-control" name="berkas" id="inputDefault" <?=($groupname->GroupDesc == 'QA'?'':'disabled')?> required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn btn-success" <?=($groupname->GroupDesc == 'QA'?'':'disabled')?> ><i class="fa fa-save"></i> Save</button>
            <a href="<?php echo base_url('MenuDocPI/getlistsign_prodspec/'.$getrowspi_value->sign_pi_noid); ?>" class="btn btn btn-info" <?=($groupname->GroupDesc == 'QA'?'':'disabled')?> ><i class="fa fa-list"></i></a>
        </div>
    </div>
</form>