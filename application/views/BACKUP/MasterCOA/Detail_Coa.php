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


/* .hidden{
	display: hidden;
} */

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

  <div class="loading">
      <!-- <h1 class="inoaload">G-EXPORT</h1>
	  <p>Please Wait..</p> -->
	  	<center>
	  		<div id="loader"></div>
		</center>
  </div>

</div>

<div class="wrapet">
  <section class="body">

  <!-- start: header -->
  <header class="header">
				<div class="logo-container">
					<a href="#" class="logo">
						<img src="<?= base_url(); ?>assets/images/gexim_600.png" height="35" alt="Porto Admin" />
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
						<h2>COA</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li> -->
								<!-- <li><span>Icons</span></li> -->
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
						
								<h5>Dashboard COA : COA Details</h5>
							</header>
							<div class="panel-body">

<div class="container-fluid">

	<a class="btn btn-warning" href="<?php echo base_url('MenuCOA/'); ?>"><i class="fa  fa-arrow-left"></i> Back</a>

</div>

							<hr>

							<form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url('MenuCOA/add_coa_details/'); ?>">

								<input type="hidden" name="coa_head" value="<?php echo $rowsmastercoa->gexp_coa_id; ?>">

													
								<!-- <input type="hidden" name="qc_id" id="input_QCId"> -->

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">No COA</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rowsmastercoa->gexp_coa_no; ?>" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">Product Name</label>
												<div class="col-md-3">
													<select data-plugin-selectTwo class="form-control populate" id="item_product_id" name="item_product_id">
															<optgroup label="Select Product">
																<option value="">Choose ...</option>
																<?php foreach($lsitembypl as $dt) : ?>
																	<option value="<?php echo $dt->gexp_packlistdet_itemid;?>"><?php echo $dt->gexp_packlistdet_descgod;?> </option>
																<?php endforeach; ?>
																<!-- <option value="AK">Alaska</option>
																<option value="HI">Hawaii</option> -->
															</optgroup>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-1" for="inputDefault">Batch Number</label>
												<div class="col-md-3">
													<select data-plugin-selectTwo class="form-control populate" name="input_batch">
															<optgroup label="Batch Number">
																<!-- <option value="">Choose ...</option> -->
																<?php foreach($lsitembypl as $dt) : ?>
																	<option value="<?php echo $dt->gexp_packlistdet_batch;?>"><?php echo $dt->gexp_packlistdet_batch;?> </option>
																<?php endforeach; ?>
																<!-- <option value="AK">Alaska</option>
																<option value="HI">Hawaii</option> -->
															</optgroup>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">Product Date</label>
												<div class="col-md-3">
													<select class="form-control populate" id="input_ProductDate" name="input_ProductDate" required>
														<option value="" disabled>Choose ...</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">Expired Date</label>
												<div class="col-md-3">
												<!-- <input type="text" class="form-control" id="input_Expdate" name="input_Expdate" placeholder="Enter ..." required readonly> -->
													<select class="form-control" id="input_Expdate" name="input_Expdate" required disabled>
														<option value="">Choose ...</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2" style="font-weight:bold;" for="inputDefault">Organoleptic Test</label>
												<div class="col-md-3">
												
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">Aroma</label>
												<div class="col-md-3">
												<!-- <input type="text" class="form-control" id="input_Expdate" name="input_Expdate" placeholder="Enter ..." required readonly> -->
													<select class="form-control" id="input_Aroma" name="input_Aroma" required disabled>
														<option value="">Choose ...</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">Taste</label>
												<div class="col-md-3">
												<!-- <input type="text" class="form-control" id="input_Expdate" name="input_Expdate" placeholder="Enter ..." required readonly> -->
													<select class="form-control" id="input_Taste" name="input_Taste" required disabled>
														<option value="">Choose ...</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2" style="font-weight:bold;" for="inputDefault">Physical & Chemical Test</label>
												<div class="col-md-3">
												
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">Moisture</label>
												<div class="col-md-3">
												<!-- <input type="text" class="form-control" id="input_Expdate" name="input_Expdate" placeholder="Enter ..." required readonly> -->
													<select class="form-control" id="input_Moisture" name="input_Moisture" required disabled>
														<option value="">Choose ...</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">Ph</label>
												<div class="col-md-3">
												<!-- <input type="text" class="form-control" id="input_Expdate" name="input_Expdate" placeholder="Enter ..." required readonly> -->
													<select class="form-control" id="input_Ph" name="input_Ph" required disabled>
														<option value="">Choose ...</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">Brix</label>
												<div class="col-md-3">
												<!-- <input type="text" class="form-control" id="input_Expdate" name="input_Expdate" placeholder="Enter ..." required readonly> -->
													<select class="form-control" id="input_Brix" name="input_Brix" required disabled>
														<option value="">Choose ...</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2" style="font-weight:bold;" for="inputDefault">Heavy Metal Test</label>
												<div class="col-md-3">
												
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1" for="inputDefault">Mercury (Hg)</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="input_Mercury" name="input_Mercury" placeholder="Enter ..." required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1" for="inputDefault">Lead (Pb)</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="input_Lead" name="input_Lead" placeholder="Enter ..." required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1" for="inputDefault">Cadmium (Pb)</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="input_Cadmium" name="input_Cadmium" placeholder="Enter ..." required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1" for="inputDefault">Tin (Sn)</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="input_Tin" name="input_Tin" placeholder="Enter ..." required>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1" for="inputDefault">Arsenic (As)</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="input_Arsenic" name="input_Arsenic" placeholder="Enter ..." required>
												</div>
											</div>


											<div class="form-group">
												<label class="col-md-2" style="font-weight:bold;" for="inputDefault">Microbiology Test</label>
												<div class="col-md-3">
												
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">Salmonella</label>
												<div class="col-md-3">
												<!-- <input type="text" class="form-control" id="input_Expdate" name="input_Expdate" placeholder="Enter ..." required readonly> -->
													<select class="form-control" id="input_Salmonella" name="input_Salmonella" required disabled>
														<option value="">Choose ...</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">Total Plate Count</label>
												<div class="col-md-3">
												<!-- <input type="text" class="form-control" id="input_Expdate" name="input_Expdate" placeholder="Enter ..." required readonly> -->
													<select class="form-control" id="input_PlateCount" name="input_PlateCount" required disabled>
														<option value="">Choose ...</option>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 " for="inputDefault">Mold & Yeast</label>
												<div class="col-md-3">
												<!-- <input type="text" class="form-control" id="input_Expdate" name="input_Expdate" placeholder="Enter ..." required readonly> -->
													<select class="form-control" id="input_MoldYeast" name="input_MoldYeast" required disabled>
														<option value="">Choose ...</option>
													</select>
												</div>
											</div>

											<select class="form-control hidden" id="input_QCId" name="qc_id">
														<option value="">Choose ...</option>
											</select>

											<!-- <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-plus-circle"></i>Tambah</button> -->

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault"></label>
												<div class="col-md-2">

													<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-plus-circle"></i>Tambah</button>
												
												</div>
											</div>


							</form>

<!-- Button trigger modal -->
<!-- <button type="button" class="mb-md mt-xs mr-xs btn btn-success" data-toggle="modal" data-target="#exampleModal">
  NEW
</button> -->

<!-- Modal Start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">

        <h5 class="modal-title" id="exampleModalLabel">Create Master TOP</h5>
        
      </div>
      <div class="modal-body">

	  <form class="form-horizontal form-bordered form-bordered" action="<?php echo base_url('DataSetTop/createnewtop');?>" id="inputdatagroup" method="POST">
                                           
											<div class="form-group">
												<label class="col-md-3 control-label" for="textareaDefault">TOP Description</label>
												<div class="col-md-8">
													<input class="form-control" name="topdesc" data-plugin-maxlength maxlength="50" />
													<p>
														<code>max-length</code> set to 50 character <code>uppercase</code>.
													</p>
												</div>
                                            </div>
											
											
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-success">Save changes</button> -->
		<input type="submit" class="btn btn-success" value="Confirm">
		</form>
      </div>
    </div>
  </div>
</div>

<!-- End Modal Insert Group -->

<br>
<br>


								<table class="table table-bordered table-striped mb-none" id="tables3">
									<thead>
										<tr>
											<th>No</th>
                                            <th>COA No</th>
                                            <th>QC No</th>
											<th>Product Name</th>
											<!-- <th>Product Name</th> -->
											<th>Details</th>
										</tr>
									</thead>
									<tbody>

									<?php
if(!empty($lsdetailscoa)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($lsdetailscoa as $gaa){
    echo "<tr>";
	echo "<th scope='row'>".$no_urut++."</th>";
	echo "<td>".$gaa->gexp_coa_no."</td>";
    echo "<td>".$gaa->gexp_qc_no."</td>";
    echo "<td>".$gaa->ItemName."</td>";
	// echo "<td>".$gaa->Consignee_Name."</td>";
	// echo "<td>".$gaa->Notify_Name."</td>";
	// echo "<td>".$gaa->ShipComp."</td>";
	// echo "<td>";
	// 	if($gaa->gexp_invoice_statrows==1){
	// 		echo "Aktif";
	// 	}else{
	// 		echo "Tidak Aktif";
	// 	}
	// echo"</td>";
	// echo "<td>";
	// 	if($gaa->CountryStats==1){
	// 		echo "Aktif";
	// 	}else{
	// 		echo "Tidak Aktif";
	// 	}
	// echo"</td>";

    echo "<td style='text-align:center; font-size:18px;'><a style='font-size:18px;' class='btn small-btn-ic-info shadow-sm' href='".base_url("MenuCOA/preview_details_coa/".$gaa->detail_coa_id)."'><i class='fa fa-file-o'></i></a></td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>	
										
									</tbody>
								</table>
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

	$('#tables3').dataTable({
		columnDefs: [{
			"defaultContent": "-",
			"targets": "_all"
		}]
	});

	$( window ).on("load", function() {
			$(".preloader").delay(1000).fadeOut("slow");
	});

	$("#item_product_id").change(function (){
		var url = "<?=base_url()?>MenuCoa/get_item_qc_byPL/" + $('#item_product_id').val();
		$('#input_ProductDate').load(url);
		return false;
	})

	$("#input_ProductDate").change(function(){
		var areas = $("#input_ProductDate").val();
		$.post("<?=base_url()?>MenuCoa/get_item_qc_details/", {
			post_data:areas,
		}, function(data){
			value = $.parseJSON(data);
			$.each(value,function(i,val){
				$("#input_QCId").html("<option value="+val.QCId+">"+val.QCId+"</option>");
				$("#input_Expdate").html("<option value="+val.ExpDate+">"+val.ExpDate+"</option>");
				$("#input_Aroma").html("<option value="+val.Aroma+">"+val.Aroma+"</option>");
				$("#input_Taste").html("<option value="+val.Taste+">"+val.Taste+"</option>");
				$("#input_Moisture").html("<option value="+val.Moisture+">"+val.Moisture+"</option>");
				$("#input_Ph").html("<option value="+val.Ph+">"+val.Ph+"</option>");
				$("#input_Brix").html("<option value="+val.Brix+">"+val.Brix+"</option>");
				$("#input_Salmonella").html("<option value="+val.Salmonella+">"+val.Salmonella+"</option>");
				$("#input_PlateCount").html("<option value="+val.PlateCount+">"+val.PlateCount+"</option>");
				$("#input_MoldYeast").html("<option value="+val.MoldYeast+">"+val.MoldYeast+"</option>");
			})
		});
	});

</script>

	</body>
</html>