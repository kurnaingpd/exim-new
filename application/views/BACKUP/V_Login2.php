<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>G-IMPORT</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png" />
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png">

  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
   <!-- Plugin css for this page -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/GAPLOGO1.png" />

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>

body{
    background: #185ADB;
    text-align: left;
}

.swal2-popup {
  font-family: Georgia, serif;
  height: 80%;
  font-size: 8px;
}

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

#myDiv {
  display: none;
  /* text-align: center; */
}

.card{
    margin-top: 130px;
    width: 500px;
    background-image: url('assets/purple-angle-electronics.png');
    background-position: cover;
    /* background: #EFF8FF; */
    padding: 30px;
    border-radius: 20px;
    color:#01005E;
}

.form-control{
    border-radius: 20px;
}


/* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  background-color: #DA0037; /* Black background color */
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 210px; /* 30px from the bottom */
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar.show {
  visibility: visible; /* Show the snackbar */
  /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
  font-size: 18px;
}

/* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar02 {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  background-color: #7BC74D; /* Black background color */
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 210px; /* 30px from the bottom */
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar02.scc {
  visibility: visible; /* Show the snackbar */
  /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
  font-size: 18px;
}

/* Animations to fade the snackbar in and out */
@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 210px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 210px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 210px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 210px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

.content-wrapper{
  background-color: #185ADB;
}

.Login_Error.sa{
    padding: 20px;
    font-size: 12px;
}

.swal{
    background-color: #01005E;
}


.wrapp {
             width: 100vw;
             height: 100vh;
             display: flex;
             justify-content: center;
             align-items: center;
}

.child-div1 {
             height: 100%;
             width: 100%;
             background-color: #EEEEEE;
             margin: 0 0px;
             text-align: center;
}

.child-div2 {
             height: 100%;
             width: 50%;
             background-color: rgb(255, 141, 34);
             border: solid;
             border-style: 0.5px;
             border-color: white;
             padding: 50px;
             margin: 0 0px;
             color: white;
             border-top-style: none;
             border-right-style: none;
             border-bottom-style: none;
}

.heding{
    font-size: 3.5vh;
    margin-top: 150px;
    text-shadow: 1px 1px 2px #000000;
    /* color: #FA7D09; */
    font-weight: 700;
    color: rgb(29, 0, 145);
}

.btns{
    font-size: 2.2vh;
    width: 25vh;
    background-color: rgb(29, 0, 145);
    /* background-color: #FA7D09; */
    color: white;
    height:7vh;
}

.btns:hover{
    font-size: 2.2vh;
    width: 25vh;
    background-color: rgb(29, 0, 145);
    /* background-color: #FA7D09; */
    color: white;
    height:7vh;
}

.welcome{
    display: flex;
    flex-direction: row;
    justify-content: center;
}

.main-head{
    font-size: 15vh;
    color: white;
    margin-top: 25vh;
    margin-left: 20px;
}

.main-head2{
    font-size: 15vh;
    color: #1C0C5B;
    /* color: white; */
    margin-top: 32vh;
    margin-left: 20px;
    text-shadow: 2px 2px 4px #000000;
}

.G{
    color: #FA7D09;
    text-shadow: 2px 2px 4px #000000;
    font-size: 30vh;
}

.S{
    font-size: 20vh;
}

.form-label{
    font-size: 2.5vh;
}

.form-control{
    height:7vh;
    font-size: 2vh;
}

.mini-ic{
    display: none;
}

@media (max-width: 576px) {

.child-div1 {
    display: none;
}

.child-div2{
    width: 100%;
    border: none;
}

.heding{
    margin-top: 0px;
}

.mini-ic{
    display: block;
}

}

</style>

</head>

<body onload="myFunction()" style="margin:0;">


<center>
    <div id="loader"></div>
</center>

<div style="display:none;" id="myDiv" class="animate-bottom">

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


<!-- Content -->

<div class="wrapet">
        <section class="body">

        <div class="wrapp">
        <div class="child-div1">

                <nav class="navbar">
                        <div class="container-fluid">
                          <a class="navbar-brand btn" style="width: 120px; color: white; background-color: rgb(29, 0, 145); font-weight: 700;" href="#">BACK</a>
                        </div>
                </nav>

            <!-- <div class="welcome"> -->
                    <img src="<?= base_url(); ?>assets/images/gexim-new-board.png" style="width: 70%; height: 80%;" class="img-fluid" alt="...">
                <!-- <h3 class="main-head"><span class="G">G</span></h3>
                <h3 class="main-head2"><span class="S">EXIM</span></h3> -->
            <!-- </div> -->

                <!-- <img src="lines011.jpg" style="width: 100%; height: 100%;" class="img-fluid" alt="..."> -->

        </div>
        <div class="child-div2">


            <img src="<?= base_url(); ?>assets/images/gexim-new-board.png" style="width: 30%; height: 20%;" class="img-fluid mini-ic" alt="...">
            <h5 class="heding">G-IMPORT</h5>
            <!-- <h5 class="heding">LOGIN ACCOUNT</h5> -->
<br>

<form class="pt-2 pb-3" method="POST" action="<?php echo base_url('LoginImport/doLogin');?>">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="username" placeholder="Username">
                </div>

                <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="Password">
                </div>
<br>
                <button type="submit" class="btn btns maintenance">LOGIN</button>
</form>

        </div>
     </div>


</section>
</div>

<!-- Content -->


</div>


<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}


function snacksbar() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 6000);
}


function snacksbar02() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar02");

  // Add the "show" class to DIV
  x.className = "scc";

  // After 3 seconds, remove the scc class from DIV
  setTimeout(function(){ x.className = x.className.replace("scc", ""); }, 6000);
}

$(document).ready(function(){
  $("#buttt").click(function(){
    $.load(function(){
      showPage(); 
    });
  });
});


$(document).ready(function(){
  $("#b").click(function(){
    $.load(function(){
      snacksbar02() 
    });
  });
});

</script>

<script>
$("#login").click(function(){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
        });
});
$(".maintenance").click(function(){
	Swal.fire({
        icon: 'info',
        title: 'Maintenance',
        text: ' On Progress Maintenance',
        // footer: '<a href="">Why do I have this issue?</a>'
      });
});
</script>

</body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  <!-- plugins:js -->
  <script src="<?= base_url(); ?>assets/start/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url(); ?>assets/start/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/start/vendors/select2/select2.min.js"></script>
  <script src="<?= base_url(); ?>assets/start/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url(); ?>assets/start/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url(); ?>assets/start/js/off-canvas.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/hoverable-collapse.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/template.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/settings.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/todolist.js"></script>
  <!-- endinject -->
   <!-- Custom js for this page-->
   <script src="<?= base_url(); ?>assets/start/js/file-upload.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/typeahead.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/select2.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- End custom js for this page-->
  <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
  <!-- <script>
  $(document).ready(function() {
      $('.js-basic-single').select2();
  });
  </script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>