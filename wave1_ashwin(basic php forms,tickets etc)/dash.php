<?php
// Include config file
require_once "cnf.php";

// Initialize the session
require_once "sessions.php";

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["bb"]) || $_SESSION["bb"] !== true){
header("location: index.php");
exit;
}

if(!isset($_SESSION["bb"]) || $_SESSION["mob_status"] !== done){
header("location: mob_verify.php");
exit;
}
?>
<!doctype html>
<html class="no-js" lang="en">
<?php include 'functions.php'?>
<?php include 'variables.php'?>
<title>Dashboard | BigBeans | Supplier</title>
<head>

<?php include 'header.php'?>  
</head>

<body onload="myFunction()" class="materialdesign">
<div id="loading">
<div id="ts-preloader-absolute25">
<div class="tscssload-triangles">
<div class="tscssload-tri tscssload-invert"></div>
<div class="tscssload-tri tscssload-invert"></div>
<div class="tscssload-tri"></div>
<div class="tscssload-tri tscssload-invert"></div>
<div class="tscssload-tri tscssload-invert"></div>
<div class="tscssload-tri"></div>
<div class="tscssload-tri tscssload-invert"></div>
<div class="tscssload-tri"></div>
<div class="tscssload-tri tscssload-invert"></div>
</div>
</div>
</div>

<div style="display:none;overflow-x: hidden;overflow-y: scroll;" id="myDiv" class="animate-bottom">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Header top area start-->

<?php include 'inc/common/nav.php' ?>
<br><br>
<?php include 'inc/common/dash2.php' ?>





<?php include '../includes/footer.php'?>
</body>

</html>