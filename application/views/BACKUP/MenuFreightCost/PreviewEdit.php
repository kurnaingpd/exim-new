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
		<script src="<?= base_url(); ?>assets/template/vendor/modernizr/modernizr.js"></script>

		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>

#loader {
    position: absolute;
    left: 50%;
    top: 50%;
    z-index: 1;
    width: 120px;
    height: 120px;
    margin: -76px 0 0 -76px;
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #3498db;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }
  
  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  
  /* Add animation to "page content" */
  .animate-bottom {
    position: relative;
    -webkit-animation-name: animatebottom;
    -webkit-animation-duration: 1s;
    animation-name: animatebottom;
    animation-duration: 1s
  }
  
  @-webkit-keyframes animatebottom {
    from { bottom:-100px; opacity:0 } 
    to { bottom:0px; opacity:1 }
  }
  
  @keyframes animatebottom { 
    from{ bottom:-100px; opacity:0 } 
    to{ bottom:0; opacity:1 }
  }



</style>


</head>
<body>

<!-- Notifications -->

<?php
  if($this->session->flashdata('warns') != null){ 
?>

<script>
  Swal.fire({
        icon: 'error',
        title: 'Failed',
        text: '<?php echo $this->session->flashdata('warns') ?>',
        // footer: '<a href="">Why do I have this issue?</a>'
      });
</script>

<?php
 }
?>

<?php
  if($this->session->flashdata('success') != null){ 
?>

<script>
  Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?php echo $this->session->flashdata('success') ?>',
        // footer: '<a href="">Why do I have this issue?</a>'
      });
</script>

<?php
 }
?>

<!-- End Notifications -->

<div id="preloader" class="preloader">

  <!-- <div class="loading">
      <h1 class="inoaload">G-EXPORT</h1>
      <p>Please Wait..</p>
  </div> -->
<center>
        <div id="loader"></div>
</center>

</div>

<div class="wrapet">
<section class="body">

  <!-- start: header -->
  <header class="header">
				<div class="logo-container">
					<a href="#" class="logo">
						<img src="<?= base_url(); ?>assets/images/gexim_600.png" height="35" alt="Gonusa" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<!-- <span class="separator"></span> -->
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?= base_url(); ?>assets/template/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name"><?php echo($this->session->userdata('logged_gexp_in')->AccountName); ?></span>
								<span class="role"><?php echo($this->session->userdata('logged_gexp_in')->UserName); ?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i> My Profile</a>
								</li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url('LoginSys/doLogout'); ?>"><i class="fa fa-power-off"></i> Logout</a>
								</li>

							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
	</header>
			<!-- end: header -->


            <div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header" style="background-color: #172774;">
						<div class="sidebar-title">
							<h6 style="color: white; font-weight:bold;">G-EXPORT</h6>
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content" style="background-color: #172774;">

						<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">

							<?php include_once "mastermenus.php"; ?>

								<ul>
						</nav>

						<!-- Start Menus -->

							<!-- <nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">

									<li>
										<a href="index.html">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
                                    </li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-copy" aria-hidden="true"></i>
											<span>Pages</span>
										</a>
										<ul class="nav nav-children">
											
											<li>
												<a href="pages-404.html">
 													<i class="fa fa-copy" aria-hidden="true"></i> 404
												</a>
											</li>
											<li>
												<a href="pages-500.html">
													<i class="fa fa-copy" aria-hidden="true"></i> 500
												</a>
											</li>
											<li>
												<a href="pages-log-viewer.html">
													<i class="fa fa-copy" aria-hidden="true"></i> Log Viewer
												</a>
											</li>
											
										</ul>
									</li>

								</ul>
							</nav> -->

							<!-- End Menus -->
				
							<hr class="separator" />
				
							<div class="sidebar-widget widget-tasks">
								<div class="widget-header">
									<h6 style="color: white;">User Group</h6>
									<div class="widget-toggle">+</div>
								</div>
								<div class="widget-content">
									<ul class="list-unstyled m-none">
									<li><a style="color: white;" href="#"><?php echo $groupname->GroupDesc; ?></a></li>
									</ul>
								</div>
							</div>
				
							<hr class="separator" />
				
							<div class="sidebar-widget widget-stats">
								<div class="widget-header"></div>
								<div class="widget-content">
									<ul>
									</ul>
								</div>
							</div>
						</div>
				
					</div>
				
				</aside>
<!-- end: sidebar -->
<section role="main" class="content-body">
<!-- start: page -->


<header class="page-header" style="background-color: #172774;">
	<h2>Menu Freight Cost</h2>				
	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
								
		</ol>			
		<a class="sidebar-right-toggle"><i class="fa fa-cube"></i></a>
	</div>
</header>



<section class="panel panel-primary">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<!-- <a href="#" class="fa fa-times"></a> -->
								</div>
						
								<h5>Menu Freight Cost</h5>
							</header>
							<div class="panel-body">

<div class="container-fluid">

	<a class="btn btn-warning" style="width:150px;" href="<?php echo base_url('MenuFreightCost/');?>"><i class="fa fa-arrow-left"></i> Back</a>

</div>
                            <hr>
                            
                                            <div class="form-group">
												<label class="col-md-5 control-label" for="inputDefault" style="font-weight: bold;">Details Proforma Invoice :</label>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">PI No</label>
												<div class="col-md-3">
													<input type="text" class="form-control" name="pi_number" value="<?php echo $rowsgetpi->gexp_pi_no; ?>" id="inputDefault" readonly>
												</div>
                                                <label class="col-md-1 control-label" for="inputDefault">PI Date</label>
												<div class="col-md-3">
													<input type="text" class="form-control" name="pi_date" value="<?php echo $rowsgetpi->gexp_pi_date; ?>" id="inputDefault" readonly>
												</div>
                                                <label class="col-md-1 control-label" for="inputDefault">PO # (If Any)</label>
												<div class="col-md-3">
													<input type="text" class="form-control" name="pi_po" value="<?php echo $rowsgetpi->gexp_pi_po; ?>" placeholder="Free Text" id="inputDefault" readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault" style="font-weight: bold;">Consignee :</label>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Company Name</label>
												<div class="col-md-4">
													<select name="input_company_consig" data-plugin-selectTwo id="input_company_id" class="form-control" disabled>
														<option value="<?php echo $rowsgetpi->gexp_pi_consignee_id; ?>">Selected : (<?php echo $rowsgetpi->ConsigCode; ?>) <?php echo $rowsgetpi->Consig; ?></option>
														<?php foreach($listcustomer as $dt) : ?>
															<option value="<?php echo $dt->CustId;?>">(<?php echo $dt->CustCode;?>) <?php echo $dt->CustCompanyName;?></option>
														<?php endforeach; ?>
													</select>
												</div>
                                                <label class="col-md-2 control-label" for="inputDefault">Address</label>
												<div class="col-md-4">
												    <textarea class="form-control" rows="3" id="input_CustAddress" name="input_CustAddress" data-plugin-maxlength maxlength="255" disabled><?php echo $rowsgetpi->Cons_addr; ?></textarea>
												</div>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Country</label>
												<div class="col-md-2">
												    <input type="text" class="form-control" id="input_CountryName" name="input_CountryName" placeholder="Enter ..." value="<?php echo $rowsgetpi->Cons_country; ?>" required readonly>
												</div>
                                                <label class="col-md-2 control-label" for="inputDefault">Phone</label>
												<div class="col-md-2">
    												<input type="text" class="form-control" id="input_CountryPhone" name="input_CountryPhone" placeholder="Enter ..." value="<?php echo $rowsgetpi->ConsigCpPhone; ?>" required readonly>												
												</div>
                                                <label class="col-md-1 control-label" for="inputDefault">Attention Contact Person</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="input_CtConsName" name="input_CtConsName" placeholder="Enter ..." value="<?php echo $rowsgetpi->ConsigCpName; ?>" required readonly>
												</div>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault" style="font-weight: bold;">Beneficiary :</label>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Company Name</label>
												<div class="col-md-4">
													<select name="input_company_bene" data-plugin-selectTwo id="input_beneficiary_id" class="form-control" disabled>
														<option value="<?php echo $rowsgetpi->gexp_pi_beneficiary_id; ?>">Selected : <?php echo $rowsgetpi->Benefi; ?> </option>
														<?php foreach($listbeneficiary as $dt) : ?>
															<option value="<?php echo $dt->BeneficiaryId;?>"><?php echo $dt->BeneficiaryDesc;?></option>
														<?php endforeach; ?>
													</select>
												</div>
                                                <label class="col-md-2 control-label" for="inputDefault">Address</label>
												<div class="col-md-4">
    												<textarea class="form-control" rows="3" id="input_CustAddress2" name="input_CustAddress2" data-plugin-maxlength maxlength="255" disabled> <?php echo $rowsgetpi->Bene_addr; ?> </textarea>
												</div>
                                            </div>
                                            <div class="form-group">
												    <label class="col-md-2 control-label" for="inputDefault">Country</label>
												<div class="col-md-2">
													<input type="text" class="form-control" id="input_CountryName2" name="input_CountryName2" placeholder="Enter ..." value="<?php echo $rowsgetpi->Bene_country; ?>" required readonly>
												</div>
                                                    <label class="col-md-2 control-label" for="inputDefault">Phone</label>
												<div class="col-md-2">
													<input type="text" class="form-control" id="input_CountryPhone2" name="input_CountryPhone2" placeholder="Enter ..." value="<?php echo $rowsgetpi->Bene_phone; ?>" required readonly>
												</div>
                                                    <label class="col-md-1 control-label" for="inputDefault">Attention Contact Person</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="input_ContactBene2" name="input_ContactBene2" placeholder="Enter ..." value="<?php echo $rowsgetpi->Bene_cp; ?>" required readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault" style="font-weight: bold;">Details :</label>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="col-md-1 control-label" for="inputDefault">Loading Port</label>
												<div class="col-md-4">
													<select id="input_loadport" data-plugin-selectTwo class="form-control" name="loadport" disabled>
															<option value="<?php echo $rowsgetpi->Loadport_Id; ?>">Selected : <?php echo $rowsgetpi->Loadport_Name; ?></option>
												   <?php foreach($loadingport as $dt) : ?>
															<option value="<?php echo $dt->LoadPortId;?>"><?php echo $dt->LoadPortDesc;?></option>
														<?php endforeach; ?>
                                                    </select>
												</div>
                                            </div>
                                            <div class="form-group">
                                                	<label class="col-md-1 control-label" for="inputDefault">Discharge Port</label>
												<div class="col-md-4">
													<select id="input_Discharge_port" class="form-control" name="input_Discharge_port" disabled>
															<option value="<?php echo $rowsgetpi->Cons_Discharge; ?>">Selected : <?php echo $rowsgetpi->Cons_Discharge; ?></option>
                                                    </select>
													
												</div>
                                                	<label class="col-md-1 control-label" for="inputDefault">Destination Port</label>
												<div class="col-md-4">
													<select id="input_Destination_port" class="form-control" name="input_Destination_port" disabled>
															<option value="<?php echo $rowsgetpi->Cons_Destination; ?>">Selected : <?php echo $rowsgetpi->Cons_Destination; ?></option>
                                                    </select>
												</div>
                                            </div>
                                            
                                            <div class="form-group">
												    <label class="col-md-1 control-label" for="inputDefault">Container</label>
												<div class="col-md-4">
													<select id="basic" data-plugin-selectTwo class="form-control" name="container" disabled>
															<option value="<?php echo $rowsgetpi->gexp_pi_container; ?>">Selected : <?php echo $rowsgetpi->Cont_Name; ?></option>
												   <?php foreach($listcontainer as $dt) : ?>
															<option value="<?php echo $dt->ContainerId;?>"><?php echo $dt->ContainerDesc;?></option>
														<?php endforeach; ?>
                                                    </select>
												</div>
                                            </div>
                                            
                                            <div class="form-group">
												    <label class="col-md-1 control-label" for="inputDefault">Number Of Container</label>
												<div class="col-md-4">
												    <input type="text" class="form-control" name="input_container_numb" value="<?php echo $rowsgetpi->gexp_pi_number_container; ?>" placeholder="Type ..." disabled>
												</div>
                                                <label class="col-md-1 control-label" for="inputDefault">Freight Company</label>
												<div class="col-md-4">
												    <input type="text" class="form-control" name="input_freightcomp" id="input_freightcomp" value="<?php echo $rowsgetpi->gexp_pi_freight_company; ?>" placeholder="Type ..." disabled>	
												</div>
                                            </div>
                                            
                                            <div class="form-group">
                                                    <label class="col-md-1 control-label" for="inputDefault">Freight Company Contact</label>
												<div class="col-md-4">
												    <input type="text" class="form-control" name="input_freightcomp_contact" id="input_freightcomp_contact" value="<?php echo $rowsgetpi->gexp_pi_freight_compcontact; ?>" placeholder="Type ..." disabled>
												</div>
                                                    <label class="col-md-1 control-label" for="inputDefault">Freight Company Number</label>
												<div class="col-md-4">
    												<input type="text" class="form-control" name="input_freightcomp_numb" id="input_freightcomp_numb" value="<?php echo $rowsgetpi->gexp_pi_freight_compnumber; ?>" placeholder="Type ..." disabled>
												</div>
                                            </div>

                                            <form method="POST" action="<?php echo base_url('MenuFreightCost/updates_freightcost_insurance');?>">

                                                <input type="hidden" class="form-control" name="id_pi" value="<?php echo $rowsgetpi->gexp_pi_id; ?>">

                                                <div class="form-group">
                                                        <label class="col-md-1 control-label" for="inputDefault">Freight Cost</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="input_freightcost" value="<?php echo $rowsgetpi->gexp_pi_freight_cost; ?>" placeholder="Type ..." required>
                                                    </div>
                                                        <label class="col-md-1 control-label" for="inputDefault">Insurance</label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="input_insurance" value="<?php echo $rowsgetpi->gexp_pi_insurance; ?>" placeholder="Type ..." required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" class="btn btn-warning" style="width: 150px;"> Updates</button>
                                                    </div>
                                                </div>

                                            </form>

                                            <br>

                                            <div class="form-group">
                                            <label class="col-md-1 control-label" for="inputDefault">Bank Name</label>
												<div class="col-md-4">
													<select id="basic" data-plugin-selectTwo class="form-control" name="input_bank" disabled>
															<option value="<?php echo $rowsgetpi->gexp_pi_bank; ?>"> Selected : ( <?php echo $rowsgetpi->Bank_Code; ?> ) <?php echo $rowsgetpi->Bank_Name; ?> </option>
														<?php foreach($listbank as $dt) : ?>
															<option value="<?php echo $dt->BankId;?>">(<?php echo $dt->BankCode;?>) <?php echo $dt->BankName;?></option>
														<?php endforeach; ?>
                                                    </select>
												</div>
                                                <label class="col-md-1 control-label" for="inputDefault">Currency</label>
												<div class="col-md-4">
													<select id="basic" data-plugin-selectTwo class="form-control" name="input_currency" disabled>
															<option value="<?php echo $rowsgetpi->gexp_pi_currency; ?>"> Selected : <?php echo $rowsgetpi->gexp_pi_currency; ?> </option>
															<option value="IDR">IDR</option>
															<option value="USD">USD</option>
															<option value="RMB">RMB</option>
                                                    </select>
												</div>
                                            </div>

                                            <div class="form-group">
                                            <label class="col-md-1 control-label" for="inputDefault">PPN</label>
												<div class="col-md-4">
													<select id="basic" data-plugin-selectTwo class="form-control" name="ppn" disabled>
															<option value="<?php echo $rowsgetpi->gexp_pi_ppn; ?>">Selected : <?php if($rowsgetpi->gexp_pi_currency=='1'){
																echo "Yes";
															}else{
																echo "Not";
															} ?> </option>
															<option value="1">Yes</option>
															<option value="2">Not</option>
                                                    </select>
												</div>
                                                <label class="col-md-1 control-label" for="inputDefault">Terms Of Payment</label>
												<div class="col-md-4">
												    <input type="text" class="form-control" id="input_Top" name="top" placeholder="Auto ..." value="<?php echo $rowsgetpi->Cons_TopName; ?>" disabled readonly>
												</div>
                                            </div>

							
							</div>
</section>


<!-- end: page -->
</section>
</div>






  </section>
</div>


<!-- Vendor -->
        <script src="<?= base_url(); ?>assets/template/vendor/jquery/jquery.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
<!-- Specific Page Vendor -->
		<script src="<?= base_url(); ?>assets/template/vendor/select2/select2.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
<!-- Theme Base, Components and Settings -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.row.with.details.js"></script>
        <script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.tabletools.js"></script>
        <script src="<?= base_url(); ?>assets/template/javascripts/ui-elements/examples.modals.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- <script src="<?= base_url(); ?>assets/template/javascripts/forms/examples.advanced.form.js"></script> -->
        
<script>

$('#tables1').dataTable();
$('#tables2').dataTable();
$('#tables3').dataTable({
				columnDefs: [{
					"defaultContent": "-",
					"targets": "_all"
				}]
			});
$('#tables4').dataTable();
$('#tables5').dataTable();
$('#tables6').dataTable();
$('#tables7').dataTable();
$('#tables8').dataTable();

$( window ).on("load", function() {
        // Handler for .load() called.
        // alert("window is loaded");
        $(".preloader").delay(1000).fadeOut("slow");
});

// POST GROUP

$(document).ready(function(){

$("#tambahgroup").click(function(){
    var kirim = $('#inputdatagroup').serialize();
    
    $.ajax({
        type	 : 'POST',
        url	     : "<?php echo base_url(); ?>/GroupMaster/simpanMasterGroup",
        data     : kirim,
        dataType : "JSON",
        cache	 : false,
        success	 : function(response){

                if(response.success == "1"){

                    // Swal.fire({
                    //     title: 'Sedang Di Proses',
                    //     showDenyButton: false,
                    //     showCancelButton: false,
                    //     confirmButtonText: 'OK',
                    //     denyButtonText: `Don't save`,
                    //     }).then((result) => {
                    //     /* Read more about isConfirmed, isDenied below */
                    //         if (result.isConfirmed) {
                    //             Swal.fire(response.messages, '', 'error')
                    //         }
                    //     });
                    
                    alert(response.messages);
                    location.reload();

                }else if(response.success == "0"){

                    alert(response.messages);
                    location.reload();

                        // Swal.fire({
                        // title: 'Sedang Di Proses',
                        // showDenyButton: false,
                        // showCancelButton: false,
                        // confirmButtonText: 'OK',
                        // denyButtonText: `Don't save`,
                        // }).then((result) => {
                        // /* Read more about isConfirmed, isDenied below */
                        //     if (result.isConfirmed) {
                        //         Swal.fire(response.messages, '', 'success')
                        //     }
                        // });
                    
                    // alert(response.messages);
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Success',
                    //     text: 'response.messages',
                    //     // footer: '<a href="">Why do I have this issue?</a>'
                    // });
                    // location.reload("<?php echo base_url(); ?>/MasterUserTest/crudmasteruser");
                    // $('#suksesgroup').load("<?php echo base_url(); ?>/MasterUserTest/crudmasteruser"); 
                    // $('#tampil').load("<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa"); 

                }
        }
        // error    : function(data){
        // //         console.log(data.status); 
        //            alert('Eror');

        
        
    });
   
    
});


// $.ajax({
//         type: 'POST',
//         url: "<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa",
//         cache: false,
//         success: function(data) {
//             $("#listingmastergroup").html(data);
//         }
// });


$("#tambahusers").click(function(){
    var user = $('#inputdatausers').serialize();
    
    $.ajax({
        type	 : 'POST',
        url	     : "<?php echo base_url(); ?>/RootTest/simpanMasterUser",
        data     : user,
        dataType : "JSON",
        cache	 : false,
        success	 : function(response){

                if(response.success == "1"){
                    
                    alert(response.messages);
                    location.reload();

                }else if(response.success == "0"){

                    alert(response.messages);
                    location.reload();

                }
        }
    
    });
      
});


$("#tambahusers").click(function(){
    var user = $('#inputdatausers').serialize();
    
    $.ajax({
        type	 : 'POST',
        url	     : "<?php echo base_url(); ?>/RootTest/simpanMasterUser",
        data     : user,
        dataType : "JSON",
        cache	 : false,
        success	 : function(response){

                if(response.success == "1"){
                    
                    alert(response.messages);
                    location.reload();

                }else if(response.success == "0"){

                    alert(response.messages);
                    location.reload();

                }
        }
    
    });
      
});



});

</script>

	</body>
</html>