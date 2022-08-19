<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

        <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png" />
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png">
		<title>G-EXPORT</title>
		<!-- <meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content=""> -->

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/master/css/master.css" />

        <!-- Vendor CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<!-- <script src="<?= base_url(); ?>assets/template/vendor/modernizr/modernizr.js"></script> -->

		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- <script src="<?= base_url(); ?>assets/template/vendor/jquery/jquery.js"></script> -->

	</head>
	<body>




                                            <div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Customer</label>
												<div class="col-md-4">
													<select class="form-control" name="input_customer_id" id="input_customer_id">
															<option value="PI Cust">-- Pilih --</option>
														<?php foreach($listcustomer as $dt) : ?>
															<option value="<?php echo $dt->CustId;?>">(<?php echo $dt->CustCode;?>) <?php echo $dt->CustCompanyName;?></option>
														<?php endforeach; ?>
                                                    </select>
												</div>
											</div>


                                            <div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Company Name</label>
												<div class="col-md-4">
												<input type="text" class="form-control" id="input_CustCompanyName" name="input_CustCompanyName" placeholder="Enter ..." required readonly>
													<!-- <select id="basic" data-plugin-selectTwo class="form-control" name="customercountry" disabled>
															<option value="PI Cust">-- Auto --</option> -->
												   <!-- <?php foreach($lsmastercountry as $dt) : ?>
															<option value="<?php echo $dt->CountryId;?>">(<?php echo $dt->CountryCode;?>) <?php echo $dt->CountryName;?></option>
														<?php endforeach; ?> -->
                                                    <!-- </select> -->
												</div>
                                                <label class="col-md-1 control-label" for="inputDefault">Address</label>
												<div class="col-md-4">
													<select id="basic" data-plugin-selectTwo class="form-control" name="customercountry" disabled>
															<option value="PI Cust">-- Auto --</option>
														<!-- <?php foreach($lsmastercountry as $dt) : ?>
															<option value="<?php echo $dt->CountryId;?>">(<?php echo $dt->CountryCode;?>) <?php echo $dt->CountryName;?></option>
														<?php endforeach; ?> -->
                                                    </select>
												</div>
											</div>








    
<!-- Vendor -->
<script src="<?= base_url(); ?>assets/template/vendor/jquery/jquery.js"></script>
		<!-- <script src="<?= base_url(); ?>assets/template/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-placeholder/jquery.placeholder.js"></script> -->
		
<!-- Specific Page Vendor -->
		<!-- <script src="<?= base_url(); ?>assets/template/vendor/select2/select2.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script> -->
		
<!-- Theme Base, Components and Settings -->
		<!-- <script src="<?= base_url(); ?>assets/template/javascripts/theme.js"></script> -->
		
		<!-- Theme Custom -->
		<!-- <script src="<?= base_url(); ?>assets/template/javascripts/theme.custom.js"></script> -->
		
		<!-- Theme Initialization Files -->
		<!-- <script src="<?= base_url(); ?>assets/template/javascripts/theme.init.js"></script> -->


		<!-- Examples -->
		<!-- <script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.row.with.details.js"></script>
        <script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.tabletools.js"></script>
        <script src="<?= base_url(); ?>assets/template/javascripts/ui-elements/examples.modals.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

                                            


<script>
        $("#input_customer_id").change(function(){
        var i;
        var customer_id = $("#input_customer_id").val();

        $('#input_CustCompanyName').val();
        // $('#input_outlet_category').val();
        // $('#input_outlet_type').val();
        // $('#input_outlet_class').val();
        
        $.post("<?=base_url()?>MasterBoardPI/get_hierarchy_customer",{
            post_data:customer_id,
        },function(data){
            value = $.parseJSON(data);

            $('#input_CustCompanyName').val(value.CustCompanyName);
            // $('#input_outlet_category').val(value.OUTLET_CATEGORY);
            // $('#input_outlet_type').val(value.OUTLET_TYPE);
            // $('#input_outlet_class').val(value.OUTLET_CLASS);
        });
});

</script>

	</body>
</html>