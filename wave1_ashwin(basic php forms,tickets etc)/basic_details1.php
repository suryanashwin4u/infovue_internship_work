<?php require_once "cnf.php"; 
// Initialize the session
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
$m_name = $_SESSION["m_name"];
$l_name  = $_SESSION["l_name"];
date_default_timezone_set("Asia/Calcutta");
$date_session = date("d/m/Y");
$time_session = date("h:i:sa");
$page_name = basename($_SERVER['PHP_SELF']);


// Attempt insert query execution
$sql_session = "INSERT INTO sessions_tbl (u_id, f_name, m_name, l_name, time, date, page) VALUES ('$u_id', '$f_name', '$m_name', '$l_name', '$time_session', '$date_session', '$page_name')";

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
if(!isset($_SESSION["bb"]) || $_SESSION["bb"] !== true)
{
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
<?php include("../includes/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>BigBeans | Supplier | Basic Details1</title>
<meta name="description" content="">


<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Google Fonts-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="../cores/img/favicon.ico">
<!-- Bootstrap CSS-->
<link rel="stylesheet" href="../cores/css/bootstrap.min.css">
<!-- Bootstrap CSS-->
<link rel="stylesheet" href="../cores/css/font-awesome.min.css">
<!-- adminpro icon CSS-->
<link rel="stylesheet" href="../cores/css/adminpro-custon-icon.css">

<link rel="stylesheet" href="../cores/css/form/all-type-forms.css">
<!-- responsive CSS-->
<link rel="stylesheet" href="../cores/css/responsive.css">

</head>
<body style="background-image:url(../cores/img/1.jpg); background-repeat: no-repeat; background-position: center center; background-size: cover; background-attachment: fixed;">

<div class="container-fluid" >
<div class="row"><center>
<div class="col-lg-12" style="height:149px;">
<div class="logo" style="width:300px;height:300px;">
<a href="#"><img src="../cores/img/bigbeans.png" alt="bigbeanslogo" /></a>
</div>
</div></center>
</div>
</div>

<div class="login-form-area  mg-b-15 " >
<div class="container-fluid"  style="overflow-x:hidden;">
<div class="row">
<div class="col-lg-3"></div>
<form action="gears/insert_basic1.php" method="post" >
<div class="col-lg-6">
<div class="login-bg" style="padding:0 20px;">
<div class="row">
<div class="col-lg-12">
<div class="login-title" style="padding:15px;">
<center><h1><b><u style="font-size:25px;">Basic-Details Form</u></b></h1></center>
<br>
<center><p style="font-size:20px; font-weight: bold;">Please update the basic details for next process</p></center>
</div>

<br>

<input type="text" id="u_id" name="u_id" value='<?php echo $_SESSION["u_id"] ?>' required hidden>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" ><b>Address :</b>
</label>
</div>
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<textarea  style="resize: none;" id="Address" name="Address" class="form-control" placeholder="Write down your Address" style="height:70px" required ></textarea>
</div>
</div>
</div>
<br>


<div class="form-group-inner">
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro"><b> Date of Birth : </b></label>
</div>
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<input type="date" id="birthday" class="form-control" name="birthday" required>  	
</div>
</div>
</div>

<br>
<div class="form-group-inner">    
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro"> <b>Contact No : </b></label>
</div>
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<div class="input-group">
<span class="input-group-addon">+91</span>  
<input type="text" placeholder="Contact No." name="phone" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false)  || (95<event.keyCode && event.keyCode<106)|| (event.keyCode==8) || (event.keyCode==9)|| (event.keyCode>34 && event.keyCode<40)|| (event.keyCode==46) )" id="phone"  maxlength="10" minlength="10" class="form-control" pattern="[0-9]+"  required/>  
</div>
</div>
</div>
</div>
<br>

<div class="form-group-inner">   
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;"><b >Educational Details :</b></label>
</div>
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<textarea id="Educational" name="Educational" style="resize: none;" class="form-control" placeholder="Highest Exam Passed, Institute Name, Year of Passing" style="height:70px" required></textarea>
</div>
</div>
</div> 
<br>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro"><b>Occupation :</b></label>
</div>
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<div class="chosen-select-single">
<select class="form-control" id="Occupation" name="Occupation" required tab-index="-1" data-placeholder="Select From Dropdown Menu">
<option value="" selected disabled>Please select</option>
<option value="Graduate">Graduate</option>
<option value="Working Professional">Working Professional</option>
<option value="Others">Others</option>
</select>
</div>
</div>
</div>
</div> 
<br>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro"><b>Language :</b></label>
</div>
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<div class="chosen-select-single">
<select class=" form-control" id="Language" name="Language" required tab-index="-1" data-placeholder="Select From Dropdown Menu">
<option value="" selected disabled>Please select</option>
<option value="English">English</option>
<option value="Hindi">Hindi</option>
</select>
</div>
</div>
</div>
</div>
<br>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;"><b> Current Organization :</b></label>
</div>
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<input type="text" id="Organization" name="Organization" class="form-control" placeholder="Organization/Institute" required>    
</div>
</div>
</div>
<br>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;"><b>Reason for associating with us?</b></label>
</div>

<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<input type="text" name="reason" id="reason" placeholder="Write down your reason" class="form-control" required/>
</div>
</div>
</div>    



<center>
<div class="row">
<div class="col-lg-12">
<div class="login-button-pro">
<button type="submit" class="login-button login-button-lg">Submit</button>
</div>
</div>
</div>
</center>
</div>
</div>
</form>
<div class="col-lg-3"></div>
</div>
</div>
</div>
</div>
</body>
</html>
<?php include("../includes/footer.php"); ?>