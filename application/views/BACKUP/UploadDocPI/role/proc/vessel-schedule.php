<form method="POST" action="<?php echo base_url('MenuDocPI/upload23/'.$getrowspi_value->sign_pi_noid); ?>" enctype="multipart/form-data" class="form-pi">
    <div class="form-group">
        <div class="col-md-1">
        <?php if($getrowspi_value->sign_vesselsche=='1'){ ?>
                    <span class="btn btn-success"></span>
            <?php }else{ ?>
                    <span class="btn btn-warning"></span>
            <?php } ?>
        </div>
        <label class="col-md-2" for="inputDefault">Vessel Schedule</label>
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <input type="date" class="form-control" name="date23" id="inputDefault" value="<?php echo $getrowspi_value->sign_vesselsche_date ?>" <?=($groupname->GroupDesc == 'PROCUREMENT'?'':'disabled')?> required>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <button type="submit" class="btn btn btn-success" <?=($groupname->GroupDesc == 'PROCUREMENT'?'':'disabled')?> ><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</form>