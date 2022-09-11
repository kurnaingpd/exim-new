<?php
    echo "<pre>";
    print_r($params['assign']);
    echo "</pre>";
    echo $this->session->userdata('logged_in')->role_id;
?>

<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-chalkboard-teacher mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-incoterm-detail">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="text-center" for="cpshipto">Item name</label>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <label for="cpshipto">Date</label>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <label for="cpshipto">Value</label>
                    </div>
                </div>

                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                </div>
            </div>

                <div class="card-body overflow-auto" style="max-height: 550px; overflow-x: hidden;">
                    <?php 
                        $display;
                        foreach($params['item'] as $row => $rows) :
                            $display = (($params['assign'][$row]['id'] == $rows['id']) ? '' : 'disabled');
                    ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input check" type="checkbox" id="<?=$rows['id']?>" name="<?=$rows['id']?>" <?=$display?>>
                                        <label class="form-check-label" for="cpshipto"><?=$rows['item']?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="date_<?=$rows['name']?>" name="date_<?=$rows['name']?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="val_<?=$rows['name']?>" name="val_<?=$rows['name']?>">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <button class="btn btn-block btn-warning">
                                        <i class="fas fa-download mr-2"></i>Download
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php 
                            
                        endforeach; 
                    ?>
                </div>
            

            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>

                <div class="col-md-6">
                    <button class="btn btn-block btn-success">
                        <i class="fas fa-save mr-2"></i>Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <div class="float-right">
            <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
        </div>
    </div>
</div>