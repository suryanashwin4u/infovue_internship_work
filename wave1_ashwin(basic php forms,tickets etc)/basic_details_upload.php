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
	} 
	else
	{
	"";
	}

	// Close connection
	mysqli_close($link_session);
	$ref_url = $_SERVER['REQUEST_URI'];


	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["bb"]) || $_SESSION["bb"] !== true){
	header("location: index.php");
	exit;
	}
	if(!isset($_SESSION["bb"]) || $_SESSION["mob_status"] !== done){
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
	<title>Basic Details Upload</title>
	<head>
	<?php include 'header.php'?>
	<script> 
	$(function(){ 
	var fileInput = $('.upload-file'); 
	var maxSize = fileInput.data('max-size'); 
	$('.upload-form').submit(function(e){ if(fileInput.get(0).files.length){
	var fileSize = fileInput.get(0).files[0].size; 
	if(fileSize>maxSize){ alert('file size is more then 1 MB'); return false; }
	}else{ alert('choose file, please'); return false; } }); });
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
	<br>
	<div class="container-fluid" >
	<div class="row"><center>
	<div class="col-lg-12">
	<div class="logo" style="width:200px;height:100px;">
	<a href="#"><img src="cores/img/adore_console.png" alt="" />
	</a>
	</div>
	</div></center>
	</div>
	</div>
	<div class="container-fluid">
	<div class="admin-dashone-data-table-area">
	<div class="container-fluid">
	<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6">
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
	<form role="form" class="upload-form" action="gears/insert_id.php" method="post" enctype='multipart/form-data'>

	<input type="text" placeholder="User ID" id="u_id" name="u_id" value="<?php echo htmlspecialchars($_SESSION["u_id"]) ?>" required readonly hidden>


	<input type="text" placeholder="User ID" id="data_status" name="data_status" value="part_filled_id" required readonly hidden>


	<div class="form-group-inner">
	<div class="row">
	<div class="col-lg-3">
	<label
	class="login2 pull-right pull-right-pro">Document type:</label>
	</div>
	<div class="col-lg-9">
	<div class="form-select-list">
	<select class="chosen-select" id="document_type" name="document_type" data-live-search="true">
	<option value="institute_id">Institute ID</option>
	<option value="org_id">Organization ID</option>
	<option value="voter_id">Voter ID</option>
	<option value="passport">Passport</option>
	<option value="adhaar_card">Adhaar Card</option>

	</select>
	</div>
	</div>
	</div>
	</div>
	<div class="form-group-sinner">
	<div class="row">
	<div class="col-lg-3">
	<label class="login2 pull-right pull-right-pro">Enter Document No. :</label>
	</div>
	<div class="col-lg-9">
	<input type="text"
	placeholder="Enter Document No."
	class="form-control" id="doc_no" name="doc_no" />
	</div>
	</div>
	</div>
	</div>
	<div class="form-group-inner">
	<div class="row">
	<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
	<label class="login2 pull-right pull-right-pro">Upload Your Document </label>
	</div>
	<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
	<div class="file-upload-inner file-upload-inner-right ts-forms">
	<div class="input append-big-btn">
	<label style="margin-left:180px" class="icon-left" for="append-big-btn">
	<i class="fa fa-download"></i>
	</label>
	<div class="file-button">
	Browse
	<input type="file" class="upload-file" accept="image/*" data-max-size="1024000" name="file" id='file' onchange="document.getElementById('append-big-btn').value = this.value;">
	</div>
	<input type="text" id="append-big-btn" placeholder="Please Select jpg or png file">
	</div>
	</div>
	</div>
	</div>
	</div>

	<center>                                               
	<button type="submit" value="Upload" name="upload_id" class="btn btn-primary"><span class="fa fa-check"></span>&nbsp Submit</button>
	</center>
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



	<?php include 'footer.php'?>
	</body>

	</html>