<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

        <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png" />
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png">
		<title>G-IMPORT</title>
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

.content-wrapper{
  background-color: #185ADB;
}



</style>

	</head>
	<body>

<div id="preloader" class="preloader">
    <center>
            <div id="loader"></div>
    </center>
</div>



<div class="wrapet">

		<section class="body">

        <!-- start: header -->
			<header class="header" >
				<div class="logo-container">
					<a href="#" class="logo">
						<img src="<?= base_url(); ?>assets/images/gexim_600.png" style="height:40px; margin-top:-5px;" alt="Gonusa" />
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
								<span class="name"><?php echo($this->session->userdata('logged_gexp_in')->user_accountname); ?></span>
								<span class="role"><?php echo($this->session->userdata('logged_gexp_in')->user_username); ?></span>
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
                                    <!-- <a role="menuitem" tabindex="-1" href="<?php echo base_url('LoginImport/doLogout'); ?>"><i class="fa fa-power-off"></i> Logout</a> -->
                                    <a role="menuitem" class="mb-xs mt-xs mr-xs modal-with-zoom-anim" tabindex="-1" href="#modalLogout"><i class="fa fa-power-off"></i> Logout</a>
                                    <!-- <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-default" href="#modalLogout">Open with fade-zoom animation</a> -->

                                    <!-- Modal Animation -->
                                    <div id="modalLogout" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Logout</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
													<div class="modal-icon">
														<i class="fa fa-question-circle"></i>
													</div>
													<div class="modal-text">
														<p>Apakah anda yakin ingin keluar ?</p>
													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">
														<a href="<?php echo base_url('LoginImport/doLogout'); ?>" class="btn btn-primary">Ya, Logout</a>
														<button class="btn btn-default modal-dismiss">Tidak</button>
													</div>
												</div>
											</footer>
										</section>
                                    </div>
                                    

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
							<h6 style="color: white; font-weight:bold;">G-IMPORT</h6>
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content" style="background-color: #172774;">

						<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">

							<!-- <?php include "mastermenus.php" ?> -->

								<ul>
						</nav>

						<!-- Start Menus -->

                            <?php include "Menu_User.php" ?>

							<!-- End Menus -->
				
							<hr class="separator" />
				
							<div class="sidebar-widget widget-tasks">
								<div class="widget-header">
									<h6 style="color: white;"></h6>
									<div class="widget-toggle">+</div>
								</div>
								<div class="widget-content">
									<ul class="list-unstyled m-none">
                                        <!-- <li><a style="color: white;" href="#"><?php echo $groupname->GroupDesc ?></a></li> -->
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

<header class="page-header" style="background-color: #172774;">
						<h2>Document Import</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs"></ol>
							<a class="sidebar-right-toggle"><i class="fa fa-cube"></i></a>
						</div>
</header>


<!-- Content Start -->




<div class="row">
<form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url('DocImport/submit_edit_data'); ?>">

<a class="mb-xs mt-xs mr-xs btn btn-warning" style="width:150px;" href="<?php echo base_url('DocImport/'); ?>"><i class="fa fa-arrow-left"></i> Kembali</a>

<!-- <a class="mb-xs mt-xs mr-xs btn btn-danger" href="<?php echo base_url('DocImport/tambah_data'); ?>"><i class="fa fa-recycle"></i> Reset</a> -->

<button type="submit" style="width:150px;" class="mb-xs mt-xs mr-xs btn btn-info"><i class="fa fa-save"></i> Updates</button>

<br>
<br>

											<div class="form-group">
                                                <!-- <label class="col-md-1" for="inputDefault"></label> -->
												<label style="font-weight: 600; color:black; border-style:solid; border-color:#172774; padding:10px; border-width:0.5px; background-color:white; font-size:16px;" class="col-md-12" for="inputDefault">Edit Document Import</label>
												<!-- <div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" readonly>
												</div> -->
                                            </div>
                                            
											<input type="hidden" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_id ?>" name="docim_id">
											
											<div class="form-group">
												<label style="font-weight: 600; color:black;" class="col-md-1" for="inputDefault">Status</label>
												<div class="col-md-3">
													<select id="basic" data-plugin-selectTwo class="form-control" name="status" required>
															<option value="<?php echo $rows_docim->docim_stats ?>">Selected : <?php if($rows_docim->docim_stats=='1'){
                                                                echo "Active";
                                                            }else{
                                                                echo "Not Active";
                                                            } ?></option>
															<option value="1">Active</option>
															<option value="2">Not Active</option>
                                                    </select>
												</div>
                                            </div>
											
											<div class="form-group">
												<label class="col-md-1" for="inputDefault">PO</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_po ?>" name="po">
												</div>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Shipment Number</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_ship_numbers ?>" name="shipnum">
												</div>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Pengirim</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_pengirim ?>" name="pengirim">
												</div>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Penjual</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_penjual ?>" name="penjual">
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1" for="inputDefault">Consignee</label>
												<div class="col-md-3">
													<select id="basic" data-plugin-selectTwo class="form-control" name="consignee">
															<option value="<?php echo $rows_docim->docim_consignee ?>">Selected : <?php if($rows_docim->docim_consignee=='1'){
												echo "GDA ( Global Dairy Alami )";
											}elseif($rows_docim->docim_consignee=='2'){
												echo "PTB ( Prima Top Boga )";
											}else{
												echo "SKP ( Sumber Kopi Prima )";
											}; ?></option>
															<option value="1">GDA ( Global Dairy Alami )</option>
															<option value="2">PTB ( Prima Top Boga )</option>
															<option value="3">SKP ( Sumber Kopi Prima )</option>
                                                    </select>
												</div>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Commodity</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_commodity ?>" name="comodity">
												</div>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Category</label>
												<div class="col-md-3">
													<select id="basic" data-plugin-selectTwo class="form-control" name="category">
															<option value="<?php echo $rows_docim->docim_category ?>">Selected : <?php echo $rows_docim->mt_categori_name ?></option>
														<?php foreach($ls_master_category as $dt) : ?>
															<option value="<?php echo $dt->mt_categori_id;?>"><?php echo $dt->mt_categori_name;?> </option>
														<?php endforeach; ?>
                                                    </select>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">HS Code</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_hscode ?>" name="hs_code">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Lartas</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_lartas ?>" name="lartas">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Term</label>
												<div class="col-md-3">
													<select id="basic" data-plugin-selectTwo class="form-control" name="term">
															<option value="<?php echo $rows_docim->docim_term ?>">Selected : (<?php echo $rows_docim->IncotermCode;?>) <?php echo $rows_docim->IncotermDesc ?></option>
															<?php foreach($ls_master_incoterm as $dt) : ?>
																<option value="<?php echo $dt->IncotermId;?>"> (<?php echo $dt->IncotermCode;?>) <?php echo $dt->IncotermDesc;?> </option>
															<?php endforeach; ?>
                                                    </select>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">HBL</label>
												<div class="col-md-3">
													<input type="text" class="form-control" value="<?php echo $rows_docim->docim_HBL ?>" id="inputDefault" name="hbl">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">MBL</label>
												<div class="col-md-3">
													<input type="text" class="form-control" value="<?php echo $rows_docim->docim_MBL ?>" id="inputDefault" name="mbl">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Quantity Container</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_qty_container ?>" name="qty_container">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Container Number</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_no_container ?>" name="container_num">
												</div>
                                            </div>


                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Goods Qty</label>
												<div class="col-md-3">
													<input type="number" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_good_qty ?>" name="good_qty">
												</div>
												<label class="col-md-1" for="inputDefault">UOM</label>
												<div class="col-md-3">
													<select id="basic" data-plugin-selectTwo class="form-control" name="good_uom">
															<option value="<?php echo $rows_docim->docim_good_uom ?>">Selected : <?php echo $rows_docim->mt_uom_name ?></option>
															<?php foreach($ls_master_uom as $dt) : ?>
																<option value="<?php echo $dt->mt_uom_id;?>"> <?php echo $dt->mt_uom_name;?> </option>
															<?php endforeach; ?>
                                                    </select>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">GW</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_GW ?>" name="gw">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">NW</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_NW ?>" name="nw">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">CBM</label>
												<div class="col-md-3">
													<input type="number" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_CBM ?>" name="cbm">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">POL</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_POL ?>" name="pol">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">POD</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_POD ?>" name="pod">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">ETD</label>
												<div class="col-md-3">
													<input type="date" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_ETD ?>" name="etd">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">ETA</label>
												<div class="col-md-3">
													<input type="date" class="form-control" id="eta" value="<?php echo $rows_docim->docim_ETA ?>" name="eta">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">PIB AJU</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_PIB_AJU ?>" name="pib_aju">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">COO</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_COO ?>" name="coo">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Masterlist</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_masterlist ?>" name="masterlist">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Rcvd Ori Document</label>
												<div class="col-md-3">
													<input type="date" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_rcvd_oridoc ?>" name="rcvd">
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Billing</label>
												<div class="col-md-3"> 
													<input type="date" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_billing ?>" name="billing">
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">SPJM</label>
												<div class="col-md-3">
													<input type="date" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_spjm ?>" name="spjm">
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">SPJK</label>
												<div class="col-md-3">
													<input type="date" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_spjk ?>" name="spjk">
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">SPPB</label>
												<div class="col-md-3">
													<input type="date" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_sppb ?>" name="sppb">
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Pickup DO</label>
												<div class="col-md-3">
													<input type="date" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_pickup_do ?>" name="pickup_do">
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Delivery</label>
												<div class="col-md-3">
													<input type="date" class="form-control" id="delivery" value="<?php echo $rows_docim->docim_delivery ?>" name="delivery">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Remarks</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_remarks ?>" name="remarks">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Currency</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="D" value="<?php echo $rows_docim->docim_currency ?>" name="currency">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">CIF</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="E" value="<?php echo $rows_docim->docim_CIF ?>" name="cif">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Duty</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="F" value="<?php echo $rows_docim->docim_Duty ?>" name="duty">
													<small>Catatan: Dalam bentuk %</small>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Vat</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_VAT ?>" name="vat">
													<small>Catatan: Dalam bentuk %</small>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Tax</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_TAX ?>" name="tax">
													<small>Catatan: Dalam bentuk %</small>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Freight (Incl VAT)</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="G" value="<?php echo $rows_docim->docim_freight ?>" name="freight">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Handling (Incl VAT)</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="H" value="<?php echo $rows_docim->docim_handling ?>" name="handling">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">At Cost</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="I" value="<?php echo $rows_docim->docim_atcost ?>" name="atcost">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Additional</label>
												<div class="col-md-3">
													<input type="number" class="form-control" id="J" value="<?php echo $rows_docim->docim_additional ?>" name="additional">
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Lead Time</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="leadtime" value="<?php echo $rows_docim->docim_leadtime ?>" name="lead_time" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Time</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_time?>" name="time">
													<small>Notes: in days</small>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Percent</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="M" name="percent1" value="<?php echo $rows_docim->docim_percent ?>" readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">CIF_2</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="N" name="cif_2" value="<?php echo $rows_docim->docim_cif2 ?>" readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Landed Cost</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="O" name="landed_cost" value="<?php echo $rows_docim->docim_landed_cost ?>" readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">%</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="P" name="percent2" value="<?php echo $rows_docim->docim_persen ?>" readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Forwarder</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $rows_docim->docim_forwarder ?>" name="forwarder">
												</div>
                                            </div>



                                           

											

									


							</form>
    
</div>




<!-- End Content -->




<!--  -->
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
$(function(){
	setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
});
 
//Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
function timestamp() {
$.ajax({
url: 'ajax_timestamp.php',
success: function(data) {
$('#timestamp').html(data);
},
});
}
</script>

<script>
        $(document).ready(function() {
                $('#cont').hide();
                $('#example').DataTable();
                $("#loader").fadeOut(3000);
                $('#cont').fadeIn(4000);
                // $("#myDiv").fadeIn(4000);
        } );
</script>
        
<script>

$('#tables1').dataTable();
$('#tables2').dataTable();
$('#tables3').dataTable();
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


// $("#delivery").change(function(){ 

// var a = $('#delivery').val();
// var b = $('#eta').val();
// var c = date_diff($a,$b);
	// $('#leadtime').val(c);

	// var date_diff_indays = function(date1, date2) {
    //     dt1 = new Date(date1);
    //     dt2 = new Date(date2);
    //     return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
    //     }
        // console.log(date_diff_indays('04/02/2014', '11/04/2014'));
        // console.log(date_diff_indays('12/02/2014', '11/04/2014'));

// });

$("#delivery , #eta").on("focus", function myDate1(e) {
    var start = new Date($('#eta').val());
    var end = new Date($('#delivery').val());
    var Difference_In_Time = end.getTime() - start.getTime();
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
    $("#leadtime").val(Difference_In_Days+' Days');
    console.log(Difference_In_Days);
});

$("#H, #I, #F, #D, #E, #G").change(function(){ 

var h = Number($('#H').val());
var i = Number($('#I').val());
var f = Number($('#F').val());
var d = Number($('#D').val());
var e = Number($('#E').val());
var g = Number($('#G').val());

var sum1= Number(h+i+f*d);
var sum2= Number(g+e*d);
var sum3 = Number(sum1);
var sum4 = Number(sum2);
var sum5 = Math.round(sum3 / sum4, 2);

$('#M').val(sum5);
});

$("#D, #E").change(function(){ 

var d = Number($('#D').val());
var e = Number($('#E').val());

var sum=Number(e*d);

$('#N').val(sum);
});

$("#F, #N, #H, #I").change(function(){ 

var f = Number($('#F').val());
var n = Number($('#N').val());
var h = Number($('#H').val());
var i = Number($('#I').val());

var sum=Number(f*n+h+i);

$('#O').val(Math.round(sum));
});


$("#O, #N").change(function(){ 

var o = Number($('#O').val());
var n = Number($('#N').val());

var sum=Number(o / n);

$('#P').val(sum);
});




});

</script>

	</body>
</html>