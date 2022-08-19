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

.content-wrapper{
  background-color: #185ADB;
}

th, td { white-space: nowrap; font-weight: 600; color:black; }
    div.dataTables_wrapper {
        width: "300px";
        height: "400px";
        margin: 0 auto;
    }
 
tr { height: 50px; }

.swal2-popup {
  font-size: 1.6rem !important;
  font-family: Georgia, serif;
  /* height: 80%; */
  /* font-size: 8px; */

}

</style>

	</head>
	<body>

<div id="preloader" class="preloader">
    <center>
            <div id="loader"></div>
    </center>
</div>

<!-- Notifications -->

<?php
  if($this->session->flashdata('warns') != null){ 
?>

<script>
  Swal.fire({
        icon: 'error',
        title: 'Failed',
        text: '<?php echo $this->session->flashdata('warns') ?>',
        // imageUrl: "<?php echo 'assets/images/gexim-new-icc.png' ?>",
        imageWidth: 400,
        imageHeight: 150,
        fontsize:8,
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
        imageWidth: 600,
        imageHeight: 600,
        fontsize:8,
        // footer: '<a href="">Why do I have this issue?</a>'
      });
</script>

<?php
 }
?>


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
								<span class="role"><?php echo($this->session->userdata('logged_gexp_in')->user_nip); ?></span>
								<!-- <span class="role"><?php echo($this->session->userdata('logged_gexp_in')->user_username); ?></span> -->
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
						<h2>MASTER UOM</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs"></ol>
							<a class="sidebar-right-toggle"><i class="fa fa-cube"></i></a>
						</div>
</header>


<!-- Content Start -->


<a class="mb-xs mt-xs mr-xs btn btn-primary" href="<?php echo base_url('MasterUOM/tambah_data'); ?>"><i class="fa fa-plus-circle"></i>  Tambah Data</a>

<!-- <div class="container"> -->
<div class="row">
<br>
<form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url('MasterUOM/filter_search_data'); ?>">
                                            
											<div class="form-group">
                                                <label class="col-md-1" for="inputDefault"></label>
												<label style="font-weight: 600; color:black;" class="col-md-1" for="inputDefault">UOM ID</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" name="uom_id">
												</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-1" for="inputDefault"></label>
												<label style="font-weight: 600; color:black;" class="col-md-1" for="inputDefault">UOM Name</label>
												<div class="col-md-3">
													<input type="text" class="form-control" id="inputDefault" name="uom_name">
												</div>
											</div>

											

											<div class="form-group">
                                                <label class="col-md-1" for="inputDefault"></label>
												<label class="col-md-1 control-label" for="inputDefault"></label>
												<div class="col-md-2">
													<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-search"></i> Search</button>
												</div>
											</div>


</form>
    
</div>
<!-- </div> -->

<hr>

<table class="table table-bordered table-light mb-none" id="tables3">
									<thead>
										<tr>
                                            <th>Actions</th>
                                            <th>UOM ID</th>
                                            <th>UOM Name</th>
                                            <th>Status</th>
                                            <!-- <th>COMMODITY</th> -->
                                            <!-- <th>Actions</th> -->
											<!-- <th class="hidden-phone">Customer</th>
											<th class="hidden-phone">Country</th>
											<th class="hidden-phone">PIC</th> -->

										</tr>
									</thead>
                                    <tbody style="background-color:#f3f3f3;">

                                    <?php
if(!empty($lsmaster_uom)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($lsmaster_uom as $gaa){ ?>
                                    
                                    <!-- <a class="btn btn-info" style="margin-right: 10px;"> <i class="fa fa-file-o"></i></a> -->

                                    <tr>
                                    <td> 
											<a style="margin-right: 10px;" role="menuitem" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-danger" tabindex="-1" href="#modalDelete<?php echo $gaa->mt_uom_id; ?>"><i class="fa fa-trash-o"></i></a>
										 <!-- Modal Animation -->
											<div id="modalDelete<?php echo $gaa->mt_uom_id; ?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
											<section class="panel panel-danger">
												<header class="panel-heading" style="color: white;">
													<h2 class="panel-title">Delete Data</h2>
												</header>
												<div class="panel-body">
													<div class="modal-wrapper">
														<div class="modal-icon">
															<!-- <i class="fa fa-question-circle"></i> -->
															<span style="color: #172774;"><i class="fa fa-trash-o"></i></span>
														</div>
														<div class="modal-text" style="color:black; font-size:14px; padding:5px; margin-top:-20px; ">
														<form action="<?php echo base_url('MasterUOM/submit_delete_data'); ?>" method="POST">
															<input type="hidden" value="<?php echo $gaa->mt_uom_id; ?>" name="uom_id">
															<p>Apakah anda yakin ingin menghapus data ini ?</p>
															<strong><p><?php echo $gaa->mt_uom_id; ?>, <?php echo $gaa->mt_uom_name; ?></p></strong>
														</div>
													</div>
												</div>
												<footer class="panel-footer">
													<div class="row">
														<div class="col-md-12 text-right">
															<button type="submit" class="btn btn-danger">Ya, Hapus</button>
  														</form>
															<!-- <a href="<?php echo base_url('LoginImport/doLogout'); ?>" class="btn btn-danger">Ya, Logout</a> -->
															<button class="btn btn-default modal-dismiss">Tidak</button>
														</div>
													</div>
												</footer>
											</section>
											</div>
											<!-- <a class="btn btn-danger" style="margin-right: 10px;"><i class="fa fa-trash-o"></i></a>  -->
											<a style="margin-right: 10px;" role="menuitem" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-warning" tabindex="-1" href="#modalEdit<?php echo $gaa->mt_uom_id; ?>"> <i class="fa fa-pencil-square-o"></i></a>
											<!-- Modal Animation -->
											<div id="modalEdit<?php echo $gaa->mt_uom_id; ?>" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
											<section class="panel panel-warning">
												<header class="panel-heading" style="color: white;">
													<h2 class="panel-title">Edit Data</h2>
												</header>
												<div class="panel-body">
													<div class="modal-wrapper">
														<div class="modal-icon">
															<!-- <i class="fa fa-question-circle"></i> -->
															<span style="color: #172774;"><i class="fa fa-trash-o"></i></span>
														</div>
														<div class="modal-text" style="color:black; font-size:14px; padding:5px; margin-top:-20px; ">
														<form action="<?php echo base_url('MasterUOM/edit_master_UOM'); ?>" method="POST">
															<input type="hidden" value="<?php echo $gaa->mt_uom_id; ?>" name="uom_id">
															<p>Apakah anda yakin ingin mengedit data ini ?</p>
															<strong><p><?php echo $gaa->mt_uom_id; ?>, <?php echo $gaa->mt_uom_name; ?></p></strong>
														</div>
													</div>
												</div>
												<footer class="panel-footer">
													<div class="row">
														<div class="col-md-12 text-right">
															<button type="submit" class="btn btn-warning">Ya, Edit</button>
  														</form>
															<!-- <a href="<?php echo base_url('LoginImport/doLogout'); ?>" class="btn btn-danger">Ya, Logout</a> -->
															<button class="btn btn-default modal-dismiss">Tidak</button>
														</div>
													</div>
												</footer>
											</section>
											</div>
										</td>
                                        <td><?php echo $gaa->mt_uom_id; ?></td>
                                        <td><?php echo $gaa->mt_uom_name; ?></td>
                                        <td><?php if($gaa->mt_uom_stats=='1'){
                                              echo "<span class='label label-success'>Active</span>";
											}else{
												echo "<span class='label label-danger'>Not Active</span>";
                                            } ?>
                                        </td>
                                    </tr>
                                    
                                    <?php }
  }else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
} ?>				
										
									</tbody>
								</table>



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