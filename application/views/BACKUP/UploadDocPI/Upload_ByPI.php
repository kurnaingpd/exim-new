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

			.swal2-popup {
				font-size: 1.6rem !important;
				font-family: Georgia, serif;
				/* height: 80%; */
				/* font-size: 8px; */
			}

			.form-pi {
				margin-top: 20px;
			}

		</style>
		
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

		<!-- Head Libs -->
		<script src="<?= base_url(); ?>assets/template/vendor/modernizr/modernizr.js"></script>
		
		<!-- SweetAlert -->
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
		<!-- Notifications -->
		<?php if($this->session->flashdata('warns') != null) : ?>
		<script>
		  Swal.fire({
				icon: 'error',
				title: 'Failed',
				text: '<?php echo $this->session->flashdata('warns') ?>',
				// footer: '<a href="">Why do I have this issue?</a>'
			  });
		</script>
		<?php endif; ?>

		<?php if($this->session->flashdata('success') != null) : ?>
		<script>
		  Swal.fire({
				icon: 'success',
				title: 'Success',
				text: '<?php echo $this->session->flashdata('success') ?>',
				// footer: '<a href="">Why do I have this issue?</a>'
			  });
		</script>
		<?php endif; ?>

		<?php if($this->session->flashdata('maintenance') != null) : ?>
		<script>
		  Swal.fire({
				icon: 'info',
				title: 'Maintenance',
				text: '<?php echo $this->session->flashdata('maintenance') ?>',
				// footer: '<a href="">Why do I have this issue?</a>'
			  });
		</script>
		<?php endif; ?>
		<!-- End Notifications -->
		
		<script>
			$(".maintenance").click(function(){
				Swal.fire({
					icon: 'info',
					title: 'Maintenance',
					text: ' On Progress Maintenance',
					// footer: '<a href="">Why do I have this issue?</a>'
				  });
			});
		</script>
				
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
				$(".preloader").delay(1000).fadeOut("slow");
			});


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
								location.reload()
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




				$("#input_sign_pi").change(function(){
					var i;
					var signpi_id = $("#input_sign_pi").val();
					$('#input_CustCompanyName').val();
					$('#input_CustAddress').val();
					$('#input_CountryName').val();
					$('#input_CountryPhone').val();
					$.post("<?=base_url()?>MasterBoardPI/get_hierarchy_customer",{
						post_data:company_id,
					},function(data){
						value = $.parseJSON(data);
						$('#input_CustCompanyName').val(value.CustCompanyName);
						$('#input_CustAddress').val(value.CustAddress);
						$('#input_CountryName').val(value.CountryName);
						$('#input_CountryPhone').val(value.CountryPhone);
					});
				});
			});

		</script>
		
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
						<span class="separator"></span>
						<div id="userbox" class="userbox">
							<a href="#" data-toggle="dropdown">
								<figure class="profile-picture">
									<img src="<?= base_url(); ?>assets/template/images/!logged-user.jpg" alt="Images" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
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
						<header class="page-header" style="background-color: #172774;">
							<h2>SIGN PI</h2>				
							<div class="right-wrapper pull-right">
								<ol class="breadcrumbs"> </ol>			
								<a class="sidebar-right-toggle"><i class="fa fa-cube"></i></a>
							</div>
						</header>

						<section class="panel panel-primary">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
								</div>
						
								<h5>SIGN PI : Sign Proforma Invoice</h5>
							</header>

							<div class="panel-body">
								<!-- Start Filter -->
								<div class="container-fluid">
									<form method="POST" action="<?php echo base_url('MenuDocPI/checksignPI/');?>">
										<div class="row">
											<div class="col-lg-1">
												<span class="btn btn-success"></span> : Sign<br>
												<span class="btn btn-warning"></span> : Not Sign
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label for="exampleInputEmail1">PI Number</label>
													<select id="basic" data-plugin-selectTwo class="form-control" id="input_sign_pi" name="sign_pi_id" required>
														<option value="">-- Pilih --</option>
														<?php foreach($listsignPI as $dt) : ?>
														<option value="<?php echo $dt->sign_pi_noid;?>"> <?php echo $dt->sign_pi_no;?> </option>
														<?php endforeach; ?>
													</select>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label for="exampleInputEmail1">PI Number</label>
													<input type="text" class="form-control" id="inputDefault" value="<?php echo $getrowspi_value->sign_pi_no; ?>" placeholder="%" disabled>
												</div>
											</div>

											<div class="col-lg-3">
												<div class="form-group">
													<label for="exampleInputEmail1">PI Progress</label>
													<input type="text" style="font-weight:bold; background-color:#ffffff;" class="form-control" id="inputDefault" value="<?php echo $getrowspi_value->total; ?>%" disabled>
												</div>
											</div>
										</div>

										<div class="row" style="margin-top: 30px;">
											<div class="col-lg-1"></div>
											<div class="col-lg-11">
												<button type="submit" class="btn btn-block btn-success">Check</button>
											</div>
										</div>
									</form>
								</div>
								<!-- End Filter -->
								<hr>
								<div style="margin-top: 30px;">
									<!-- SALES -->
									<!--Form Sign PI -->
									<?php $this->load->view('UploadDocPI/role/sales/sign-pi'); ?>
									<!-- PO if any -->
									<?php $this->load->view('UploadDocPI/role/sales/purchase-order'); ?>
									<!-- Shipping  term -->
									<?php $this->load->view('UploadDocPI/role/sales/shipping-term'); ?>
									
									<!-- PPIC -->
									<!-- Ketentuan export dokumen -->
									<?php $this->load->view('UploadDocPI/role/ppic/ketentuan-exp'); ?>
									<!-- Ketentuan export dokumen approval -->
									<?php $this->load->view('UploadDocPI/role/ppic/ketentuan-exp-aprv'); ?>
									<!-- POSM avaibility -->
									<?php $this->load->view('UploadDocPI/role/ppic/posm-avaibility'); ?>
									<!-- Finish good ready -->
									<?php $this->load->view('UploadDocPI/role/ppic/finish-good-ready'); ?>

									<!-- FINANCE -->
									<!-- TOP -->
									<?php $this->load->view('UploadDocPI/role/finance/top'); ?>
									<!-- DP Receipt -->
									<?php $this->load->view('UploadDocPI/role/finance/dp-receipt'); ?>
									<!-- DP Receipt Confirm -->
									<?php $this->load->view('UploadDocPI/role/finance/dp-receive-confirm'); ?>
									<!-- Invoice -->
									<?php $this->load->view('UploadDocPI/role/finance/invoice'); ?>
									<!-- Invoice under value -->
									<?php $this->load->view('UploadDocPI/role/finance/invoice-under-value'); ?>
									<!-- FOC approval -->
									<?php $this->load->view('UploadDocPI/role/finance/foc-approval'); ?>
									<!-- Balance payment -->
									<?php $this->load->view('UploadDocPI/role/finance/balance-payment'); ?>
									<!-- TOP Payment Balancing -->
									<?php $this->load->view('UploadDocPI/role/finance/top-pay-balancing'); ?>

									<!-- WAREHOUSE -->
									<!-- Packing list -->
									<?php $this->load->view('UploadDocPI/role/warehouse/packing-list'); ?>
									<!-- Stuffing -->
									<?php $this->load->view('UploadDocPI/role/warehouse/stuffing'); ?>

									<!-- QA -->
									<!-- COO -->
									<?php $this->load->view('UploadDocPI/role/qa/coo'); ?>
									<!-- Health Certificate -->
									<?php $this->load->view('UploadDocPI/role/qa/health-certificate'); ?>
									<!-- Health Certificate -->
									<?php $this->load->view('UploadDocPI/role/qa/material-safety'); ?>
									<!-- COA -->
									<?php $this->load->view('UploadDocPI/role/qa/coa'); ?>
									<!-- Product specification -->
									<?php $this->load->view('UploadDocPI/role/qa/product-spec'); ?>
									<!-- Surat pernyataan produk -->
									<?php $this->load->view('UploadDocPI/role/qa/surat-pernyataan'); ?>

									<!-- PROCUREMENT -->
									<!-- Bill Of Ladding -->
									<?php $this->load->view('UploadDocPI/role/proc/bill-of-ladding'); ?>
									<!-- Others -->
									<?php $this->load->view('UploadDocPI/role/proc/others'); ?>
									<!-- Vesel schedule -->
									<?php $this->load->view('UploadDocPI/role/proc/vessel-schedule'); ?>
									<!-- Vessel booking confirm -->
									<?php $this->load->view('UploadDocPI/role/proc/vessel-booking-confirm'); ?>
									<!-- Draft BL Sent -->
									<?php $this->load->view('UploadDocPI/role/proc/draft-bl-sent'); ?>
									<!-- Draft BL Approved -->
									<?php $this->load->view('UploadDocPI/role/proc/draft-bl-approved'); ?>
									<!-- Telex Release -->
									<?php $this->load->view('UploadDocPI/role/proc/telex-release'); ?>
									<!-- Original Document Sent -->
									<?php $this->load->view('UploadDocPI/role/proc/ori-doc-sent'); ?>
									<!-- Estimation Time of Departure -->
									<?php $this->load->view('UploadDocPI/role/proc/etd'); ?>
									<!-- Estimation Time of Arrival -->
									<?php $this->load->view('UploadDocPI/role/proc/eta'); ?>
								</div>
							</div>

						</section>
					</section>

				</div>
			</section>
		</div>
	</body>
</html>