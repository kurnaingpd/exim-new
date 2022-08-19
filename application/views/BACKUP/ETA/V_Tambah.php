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

		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                         <h2>ETA & PIB PAYMENT</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs"></ol>
							<a class="sidebar-right-toggle"><i class="fa fa-cube"></i></a>
						</div>
</header>


<!-- Content Start -->




<div class="row">
<form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url('ETA/submit_tambah_data'); ?>">

<a class="mb-xs mt-xs mr-xs btn btn-warning" style="width:150px;" href="<?php echo base_url('ETA/'); ?>"><i class="fa fa-arrow-left"></i> Kembali</a>

<a class="mb-xs mt-xs mr-xs btn btn-danger" style="width:150px;" href="<?php echo base_url('ETA/tambah_data'); ?>"><i class="fa fa-recycle"></i> Reset</a>
<button type="submit" style="width:150px;" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-save"></i> Simpan</button>

<br>
<br>

<div class="form-group">
                                                <!-- <label class="col-md-1" for="inputDefault"></label> -->
												<label style="font-weight: 600; color:black; border-style:solid; border-color:#172774; padding:10px; border-width:0.5px; background-color:white; font-size:16px;" class="col-md-12" for="inputDefault">Tambah ETA & PIB PAYMENT</label>
												<!-- <div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" readonly>
												</div> -->
											</div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Shipper</label>
												<div class="col-md-3">
													<select id="input_shipper" data-plugin-selectTwo class="form-control" name="shipper">
															<option value="">-- Pilih --</option>
														<?php foreach($ls_shipper as $dt) : ?>
															<option value="<?php echo $dt->docim_pengirim;?>"><?php echo $dt->docim_pengirim;?></option>
														<?php endforeach; ?>
                                                    </select>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">PO No</label>
												<div class="col-md-3">
													<select id="input_po_no" class="form-control" name="input_po_no">
															<!-- <option value="">-- Pilih --</option> -->
                                                    </select>
												</div>
											</div>
											
											<!-- <div class="form-group">
												<label class="col-md-1" for="inputDefault">PO No</label>
												<div class="col-md-3">
													<select id="input_consignee" data-plugin-selectTwo class="form-control" name="input_consignee">
															<option value="">-- Pilih --</option>
                                                    </select>
												</div>
                                            </div> -->
                                            
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Consignee</label>
												<div class="col-md-3">
													<input type="text" class="form-control" name="input_consignee" id="input_consignee" readonly>
												</div>
											</div>
											
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Commodity</label>
												<div class="col-md-3">
													<input type="text" class="form-control" name="input_commodity" id="input_commodity" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">BL No</label>
												<div class="col-md-3">
													<input type="text" class="form-control" name="bl_no" id="bl_no" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">POL</label>
												<div class="col-md-3">
													<input type="text" class="form-control" name="pol" id="pol" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">POD</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="pod" name="pod" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">ETD</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="etd" name="etd" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">ETA</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="eta" name="eta" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">PIB AJU</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="pib_aju" name="pib_aju" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Currency</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="A" name="A" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">CIF</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="B" name="B" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Duty</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="C" name="C" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Vat</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="D" name="D" readonly>
												</div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">Tax</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="E" name="E" readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault"><strong>Konversi</strong></label>
												<div class="col-md-3">
													<!-- <input type="text" class="form-control" id="inputDefault"> -->
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">CIF_2</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="G" name="G" readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">DUTY_2</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="H" name="H" readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">VAT_2</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="I" name="I" readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">TAX_2</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="J" name="J" readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">ESTIMASI</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="K" name="K" readonly>
												</div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-1" for="inputDefault">AKTUAL TOTAL BAYAR DI PIB</label>
												<div class="col-md-3">
													<input type="number" name="actual" class="form-control" id="inputDefault">
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

	// $('#input_po_no').select2();

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


$("#input_shipper").change(function(){
    var i;
    var shipper = $("#input_shipper").val();

    $('#input_po_no').find('option').remove();
	// $('#input_consignee').find('input').remove();
	// $('#input_consignee').find('input').remove();
	// $('#input_consignee').trigger("reset");
	// $("#input_consignee")[0].reset()
    $.post("<?=base_url()?>ETA/get_po_by_shipper/",{
            post_data:shipper,
    },function(data){
        value = $.parseJSON(data);
        $.each(value,function(i,val){
			//    $('<option>').val(val.Docim_Id).text(val.Docim_PO).appendTo('#input_po_no');
               $('<option>').val(val.Docim_ID).text(val.Docim_PO).appendTo('#input_po_no');
			//    $('<option>').val(val.Docim_ID).text(val.Docim_PO).appendTo('#input_po_no');

			
    var docim_id = $("#input_po_no").val();

    // $('#input_consignee').find('input').remove();
    $.post("<?=base_url()?>ETA/get_hierarchy_po/",{
            post_data:docim_id,
    },function(data){
        value = $.parseJSON(data);
		$('#input_consignee').val(value.consignee);
		$('#input_commodity').val(value.commodity);
		$('#pol').val(value.POL);
		$('#pod').val(value.POD);
		$('#etd').val(value.ETD);
		$('#eta').val(value.ETA);
		$('#pib_aju').val(value.PIB_AJU);
		$('#A').val(value.currency);
		$('#B').val(value.CIF);
		$('#C').val(value.Duty);
		$('#D').val(value.VAT);
		$('#E').val(value.TAX);

var a = Number($('#A').val());
var b = Number($('#B').val());

var sum=Number(a*b);

$('#G').val(Math.round(sum));
// $('#G').val((new Intl.NumberFormat().format(sum)));

var g = Number($('#G').val());
var c = Number($('#C').val());

var sum2=Number(g*c);

$('#H').val(Math.round(sum2));

var g = Number($('#G').val());
var d = Number($('#D').val());

var sum3=Number(g*d);

$('#I').val(Math.round(sum3));

var g = Number($('#G').val());
var e = Number($('#E').val());

var sum4=Number(g*e);

$('#J').val(Math.round(sum4));

var h = Number($('#H').val());
var i = Number($('#I').val());
var j = Number($('#J').val());

var sum5=Number(h+i+j);

$('#K').val(Math.round(sum5));
// $('#H').val((new Intl.NumberFormat().format(Math.round(sum2))));
// console.log(new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(sum2))

		// $('#G').val(Number($('#A'))*Number($('#B')));

    });

// $("#A, #B").change(function(){ 

// var a = Number($('#A').val());
// var b = Number($('#B').val());

// var sum=Number(a*b);

// $('#G').val(Math.round(sum));
// });
	
	


        })

    });
	
	
});


// Shipper End


// Start PO


$("#input_po_no").change(function(){

	var docim_id = $("#input_po_no").val();
	$.post("<?=base_url()?>ETA/get_hierarchy_po/",{
            post_data:docim_id,
    },function(data){
        value = $.parseJSON(data);
		$('#input_consignee').val(value.consignee);
		$('#input_commodity').val(value.commodity);
		$('#pol').val(value.POL);
		$('#pod').val(value.POD);
		$('#etd').val(value.ETD);
		$('#eta').val(value.ETA);
		$('#pib_aju').val(value.PIB_AJU);
		$('#A').val(value.currency);
		$('#B').val(value.CIF);
		$('#C').val(value.Duty);
		$('#D').val(value.VAT);
		$('#E').val(value.TAX);
	});


});








});

</script>

<script>

// $("#input_po_no").on("focus",function(){
//     var i;
//     var docim_id = $("#input_po_no").val();

//     $('#input_consignee').find().remove();
//     $.post("<?=base_url()?>ETA/get_hierarchy_po/",{
//             post_data:docim_id,
//     },function(data){
//         value = $.parseJSON(data);
// 		$('#input_consignee').val(value.consignee);
// 		$('#input_commodity').val(value.commodity);

//     });
	
	
// });




</script>

	</body>
</html>