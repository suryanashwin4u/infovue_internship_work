<?php
// Include config file
require_once "cnf.php";

// Initialize the session
# Session lifetime of 3 hours
ini_set('session.gc_maxlifetime', 86400);
session_set_cookie_params(86400);
# Enable session garbage collection with a .01% chance of
# running on each session_start()
ini_set('session.gc_probability', 0);
ini_set('session.gc_divisor', 100);

# Start the session
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link_session = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 

// Check connection
if($link_session === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}

$u_id  = $_SESSION["u_id"];
$f_name  = $_SESSION["f_name"];
$m_name  = $_SESSION["m_name"];
$l_name  = $_SESSION["l_name"];
date_default_timezone_set("Asia/Calcutta");
$date_session = date("d/m/Y");
$time_session = date("h:i:sa");
$page_name = basename($_SERVER['PHP_SELF']);


// Attempt insert query execution
$sql_session = "INSERT INTO sessions_tbl (u_id, f_name, m_name, l_name, time, date, page) VALUES ('$u_id', '$f_name', '$m_name', '$l_name', '$time_session', '$date_session' , '$page_name')";

if(mysqli_query($link_session, $sql_session))
{
"";
} else{
"";
}

// Close connection
mysqli_close($link_session);
$ref_url = $_SERVER['REQUEST_URI'];
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["bb"]) || $_SESSION["bb"] !== true){
header("location: index.php?url=".$ref_url."");
exit;
}

if(!isset($_SESSION["bb"]) || $_SESSION["mob_status"] !== done)
{
header("location: mob_verify.php");
exit;
}


$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1"; 
$mysqli = new mysqli("localhost", $username, $password, $database);
?>


<!doctype html>
<html class="no-js" lang="en">
<?php include 'functions.php'?>
<?php include 'variables.php'?>
<title>Basic Details Pic</title>
<head>

<?php include 'header.php'?>
<script> 
$(function()
{ 
var fileInput = $('.upload-file'); 
var maxSize = fileInput.data('max-size'); 
$('.upload-form').submit(function(e)
{ 
if(fileInput.get(0).files.length)
{
var fileSize = fileInput.get(0).files[0].size; 
if(fileSize>maxSize)
{ 
alert('file size is more then 1 MB'); 
return false; 
}
}
else
{ 
alert('choose file, please'); 
return false; 
} 
}); 
});
</script>
</head>

<body onload="myFunction()" class="materialdesign">
<div id="loading"> <div id="ts-preloader-absolute25">
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
</div></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Header top area start-->

<!-- Basic Form Start -->
<br><div class="container-fluid" >
<div class="row">
<center>
<div class="col-lg-12" style="height:149px;">
<div class="logo" style="width:300px;height:300px;">
<a href="#"><img src="cores/img/adore_console.png" alt="adore_console" />
</a>
</div>
</div>
</center>
</div>
</div>
<div class="container-fluid">
<div class="admin-dashone-data-table-area">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="sparkline8-list shadow-reset">
<div class="sparkline8-hd">
<div class="main-sparkline8-hd">
<h1 style="margin-left:40px;">Basic Details</h1>
<div class="sparkline8-outline-icon">
</div>
</div>
</div>
<div class="sparkline8-hd">
<div class="datatable-dashv1-list custom-datatable-overright">

<div class="basic-login-form-ad">
<div class="row">
<div class="col-lg-12">
<div class="all-form-element-inner">
<form role="form" action="gears/insert_pic.php" class="upload-form" method="post" enctype="multipart/form-data" >              

<input type="text" placeholder="User ID" id="u_id" name="u_id" value="<?php echo htmlspecialchars($_SESSION["u_id"]) ?>" required readonly hidden>

<input type="text" placeholder="User ID" id="photo_status" name="photo_status" value="photo_filled" required readonly hidden>	
<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro">Upload
Your Photo: </label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<div class="file-upload-inner file-upload-inner-right ts-forms">
<div class="input append-big-btn">
<label style="margin-left:200px" class="icon-left" for="append-big-btn">
<i class="fa fa-download"></i>
</label>
<div class="file-button">
Browse
<input  type="file" type="file" class="upload-file" data-max-size="1024000" name="file" id="file" accept="image/*" onchange="document.getElementById('append-big-btn').value = this.value;"> 
</div>
<input type="text" id="append-big-btn" placeholder="Please Select jpg or png File">
</div>
</div>
</div>
</div>
</div>

<center>
<button type="submit" value="Upload" name="upload_pic" class="btn btn-primary"><span class="fa fa-check"></span>&nbsp Submit</button></center>
</form>
<div class="row">
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Basic Form End-->

</div>                  



<?php include "footer.php" ?>
</body>

</html>