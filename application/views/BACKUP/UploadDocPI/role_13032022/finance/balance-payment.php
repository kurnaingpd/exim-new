<form method="POST" action="<?php echo base_url('MenuDocPI/upload24/'.$getrowspi_value->sign_pi_noid); ?>" enctype="multipart/form-data" class="form-pi">
    <div class="form-group">
        <div class="col-md-1">
        <?php if($getrowspi_value->sign_balancepay=='1'){ ?>
                    <span class="btn btn-success"></span>
            <?php }else{ ?>
                    <span class="btn btn-warning"></span>
            <?php } ?>
        </div>
        <label class="col-md-2" for="inputDefault">Balance Payment</label>
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <input type="date" class="form-control" name="date24" id="inputDefault" value="<?php echo $getrowspi_value->sign_balancepay_date ?>" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> >
        </div>
        <div class="col-md-2">
            <?php if($getrowspi_value->sign_balancepay=='1'){ ?>
                <select id="basic" data-plugin-selectTwo class="form-control" name="balancepay_val" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> >
                        <option value="<?php echo $getrowspi_value->sign_balancepay_value ?>">Selected : <?php if($getrowspi_value->sign_balancepay_value=='1'){
                            echo "Down Payment";
                        }else{
                            echo "All Payment";
                        } ?></option>
                        <option value="1">Down Payment</option>
                        <option value="2">All Payment</option>
                </select>
            <?php }else{ ?>
                <select id="basic" data-plugin-selectTwo class="form-control" name="balancepay_val" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> >
                    <option value="">-- Pilih --</option>
                    <option value="1">Down Payment</option>
                    <option value="2">All Payment</option>
                </select>
            <?php } ?>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn btn-success" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> ><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</form>