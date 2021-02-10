<?php include("../includes/header.php"); ?>
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

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>BigBeans | Supplier | Basic Details</title>
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
<div class="row">
<center>
<div class="col-lg-12" style="height:149px;">
<div class="logo" style="width:300px;height:300px;">
<a href="#"><img src="../cores/img/bigbeans.png" alt="bigbeanslogo" /></a>
</div>
</div>
</center>
</div>
</div>

<div class="login-form-area  mg-b-15 " >
<div class="container-fluid"  style="overflow-x:hidden;">
<div class="row">
<div class="col-lg-2"></div>



<form action="gears/insert_basic2.php" method="POST" >
<div class="col-lg-8">
<div class="login-bg" style="padding:0 20px;">
<div class="row">
<div class="col-lg-12">
<div class="login-title" style="padding:15px;">

<center>
<p style="font-size: 25px; font-weight: bold;">
<u>Application form for Suppliers</u>
</p>
</center>

<br>

<hr>

<center>
<p style="color: #0000FF; font-size: 20px;">
<u>
<strong>BASIC INFORMATION</strong>
</u>
</p>
</center>


<br>

</div>


<input type="text" id="u_id" name="u_id" value='<?php echo $_SESSION["u_id"] ?>' required hidden>
<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Name of Firm :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<input type="text" id="firm" name="firm" class="form-control" placeholder="Name of Firm" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+" required>
</div>
</div>
</div>


<div class="form-group-inner">    
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;"> Alternate Contact Number :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<div class="input-group ">
<span class="input-group-addon">+91</span>  

<input type="text" class="form-control" placeholder="Alternate Contact No." name="alt_phone" id="alt_phone"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" maxlength="10" minlength="10" class="form-control" pattern="[0-9]+" value="" required/>  
</div>
</div>
</div><br>



<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Investment plan :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<div class="chosen-select-single">
<select class=" form-control" name="investment_plan" required tab-index="-1" data-placeholder="Select From Dropdown Menu">
<option value="" selected disabled>Please select</option>
<option value="Entry_level">Entry level</option>
<option value="Confidence_level">Confidence level</option>
<option value="Growth_level">Growth level</option>
</select>
</div>
</div>
</div>
</div> 

<div class="form-group-inner">
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Anyone else who would help you in this business :</label>
</div>
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<textarea name="business_help" class="form-control" placeholder="Business Help" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" style="height:35px; resize: none; " required></textarea>
</div>
</div>
</div>
<br>
<hr>
<br>


<center><p style="color: #0000FF; font-size: 20px;"><u><strong>CURRENT BUSINESS DETAILS</strong></u></p></center>
<br>

<p><strong>1. Products</strong></p>
<br>
<center><p style="font-size: 15px;"><strong>Details</strong></p></center>
<br>





<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
<label class="login2 pull-right pull-right-pro">Products :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="c_products" class="form-control" placeholder="Products"  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" style="height:35px; resize: none; " required></textarea>
</div>

</div>
</div>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro">Principal :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="c_principals" class="form-control" placeholder="Principal"  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" style="height:35px; resize: none;" required></textarea>
</div>
</div>
</div>
<br>
<br>
<center><p style="font-size: 15px; white-space: nowrap;"><strong>Manpower Executive</strong></p></center>
<br>
<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro"> Supervisors :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="man_supervisor" class="form-control" placeholder="Supervisors" style="height:35px; resize: none;"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" pattern="[0-9]+" value="" required></textarea>
</div>

</div>
</div>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro"> Staff :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="man_staff" class="form-control" placeholder="Staff for 1" style="height:35px; resize: none;"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" pattern="[0-9]+" value="staff" required>
</textarea>
</div>

</div>
</div>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro"> Workers :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="man_worker" class="form-control" placeholder="Workers for 1" style="height:35px; resize: none;"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" pattern="[0-9]+" value="workers" required></textarea>
</div>

</div>
</div>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Turnover per Month (Rs.) :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="turnover_month" class="form-control" placeholder="Turnover in (Rs.)" style="height:35px; resize: none;"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" pattern="[0-9]+" value="turnover" required></textarea>
</div>

</div>
</div>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Net Annual Income :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="annual_income" class="form-control" placeholder="Annual income in (Rs.)" style="height:35px; resize: none;"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" pattern="[0-9]+" value="netannualincome" required></textarea>
</div>

</div>
</div>
<br>
<br>
<hr>
<br>

<center><p style="color: #0000FF; font-size: 20px;"><u><strong>EXISTING OFFICES/DEPOT FACILITIES</strong></u></p></center>
<br>


<br>
<center><p style="font-size: 15px;"><strong>Details</strong></p></center>
<br>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Office/Depot/Godown :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="office" class="form-control" placeholder="Office/Depot/Godown"  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" style="height:35px; resize: none;" required></textarea>
</div>

</div>
</div>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro">Location :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="location" class="form-control" placeholder="Location" style="height:35px; resize: none;" required></textarea>
</div>

</div>
</div>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Floor Area (Sq. Ft.) :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="floor_area" class="form-control" placeholder="Floor Area (Sq. Ft.)"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" style="height:35px; resize: none;"  required></textarea>
</div>
</div>
</div>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Own / Rental :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="own_rental" class="form-control" placeholder="Own / Rental"  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" style="height:35px; resize: none;" required></textarea>
</div>

</div>
</div>

<br>
<br>
<hr>

<center><p style="color: #0000FF; font-size: 20px;"><u><strong>FMCG EXPERIENCE</strong></u></p></center>
<br>
<br>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" >
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Do you have previous experience in handling FMCG : </label>
</div>
<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
<div class="chosen-select-single">
<select class=" form-control" name="fmcg" required tab-index="-1" data-placeholder="Select From Dropdown Menu">
<option value="" selected disabled>Please select</option>
<option value="YES">YES</option>
<option value="NO">NO</option>
</select>
</div>
</div>
</div>
<br>


<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro">Products :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="fproduct" class="form-control" placeholder="Products"  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" style="height:35px; resize: none; " required></textarea>
</div>

</div>
</div>


<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Since which year :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="since_year" class="form-control" placeholder="year"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" style="height:35px; resize: none; " required></textarea>
</div>

</div>
</div>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Monthly Turnover (Rs.) :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="fmonthly" class="form-control" placeholder="Turnover in (Rs.)"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" style="height:35px; resize: none; " pattern="[0-9]+"  required></textarea>
</div>

</div>
</div>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Area Covered :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="farea_covered" class="form-control" placeholder="Area Covered"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" style="height:35px; resize: none; " pattern="[0-9]+"  required></textarea>
</div>

</div>
</div>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Name of Transport :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="fname_transport" class="form-control" placeholder="Transport name"  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" style="height:35px; resize: none; " required></textarea>
</div>

</div>
</div>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Number of retail outlets covered :</label>
</div>
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<textarea name="retail_outlet" class="form-control" placeholder="retail outlets"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" style="height:35px; resize: none; " pattern="[0-9]+"  required></textarea>
</div>

</div>
</div>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Number of Salesmen Employed :</label>
</div>
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
<textarea name="salesmen_employed" class="form-control" placeholder="Salesmen Employed"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" style="height:35px; resize: none; " pattern="[0-9]+" required></textarea>
</div>
</div>
</div>
<br>
<br>
<hr>
<br>
<br>

<center><p style="color: #0000FF; font-size: 20px;"><u><strong>FINANCIAL STATUS</strong></u></p></center>
<br>
<br>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Banker's Name :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea id="" name="banker_name" class="form-control" placeholder="Banker's Name" style="height:35px; resize: none;" required></textarea>
</div>
</div>
</div>
<br>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">IFSC code: </label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea id="phone"   name="reference_contact" class="form-control"  placeholder="IFSC code" style="height:35px; resize: none;" maxlength="11" minlength="11" required></textarea>



</div>
</div>
</div>
<br>


<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro">Address :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea id="Address" name="baddress" class="form-control" placeholder="Address" style="height:35px; resize: none;" required></textarea>
</div>
</div>
</div>





<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Source of funds :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="source_funds" class="form-control" placeholder="source" style="height:35px; resize: none;" required></textarea>
</div>
</div>
</div>
<br>
<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Other Family source of Income if any :</label>
</div>
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<textarea name="income_source" class="form-control" placeholder="income" style="height:35px; resize: none;" pattern="[0-9]+"  required></textarea>
</div>
</div>
</div>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro" style="white-space: nowrap;">Total amount of funds available for the franchise :</label>
</div>
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
<textarea name="amt_funds" class="form-control" placeholder="funds"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )" style="height:35px; resize: none;" pattern="[0-9]+" value="" required></textarea>
</div>
</div>
</div>
<br>
<hr>
<br>
<br>



<center><p style="color: #0000FF; font-size: 20px;"><u><strong>OTHER INFORMATION</strong></u></p></center>
<br>
<br>

<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<label for="" style="white-space: nowrap;">1.Why are you interested in taking up BigBeans Franchise ? </label>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<input type="checkbox" id="" name="interest" value="Good Investment Options">
<label for="" style="white-space: nowrap;">Good Investment Options</label><br>

<input type="checkbox" id="" name="interest" value="Willing to Expand My Buisness">
<label for="" style="white-space: nowrap;">Willing to Expand My Buisness</label><br>

<input type="checkbox" id="" name="interest" value="Unique business opportunity">
<label for="" style="white-space: nowrap;">Unique business opportunity</label><br>
<div class="">
<input type="checkbox" id="">
<label for="">Other :</label>
<textarea name="interest" class="form-control" placeholder="type others" style="height:35px; resize: none;" ></textarea>
</div>


</div>
</div>
</div>
<br>


<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<label class="" style="white-space: nowrap;">2. Why do you think you'll make up an ideal BigBeans Franchise ? </label>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<textarea name="ideal_franchise" class="form-control" placeholder="BigBeans Franchise" style="height:35px; resize: none;" required></textarea>
</div>
</div>
</div>

<br>


<div class="form-group-inner"> 
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="">3. Reference :</label>
</div>
<br>
<br>
<center><p><strong>Please indicate details of 1 person known to you (not relatives) whom we could contact. </strong></p>
</center>
</div>

<br>

<div class="form-group-inner">
<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro">Name :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="reference_name" class="form-control" placeholder="name" style="height:35px; resize: none;" required></textarea>
</div>
</div>

<br>    


<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro">Address :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<textarea name="reference_add" class="form-control" placeholder="Address" style="height:35px; resize: none;" required></textarea>
</div>
</div>
<br>

<div class="row">
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
<label class="login2 pull-right pull-right-pro">Contact Number :</label>
</div>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
<div class="input-group ">
<span class="input-group-addon">+91</span>  

<input type="text" class="form-control" placeholder="Contact No." name="reference_contact" id="phone"  onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9)  || (event.keyCode>34 && event.keyCode<40)  || (event.keyCode==46) )"  maxlength="10" minlength="10" class="form-control" pattern="[0-9]+" required/>  
</div>
</div>

</div>
</div>

<br>
<div class="form-group-inner">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<label class="login2 " > 4. Have you read the "Salient Terms & Conditions" of the proposal as forwarded to you, and are agreeable to abide by them ?</label>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="chosen-select-single">
<select class=" form-control" name="t_c" required tab-index="-1" data-placeholder="Select From Dropdown Menu">
<option value="" selected disabled>Please select</option>
<option value="YES">YES</option>
<option value="NO">NO</option>
</select>
</div>
</div>
</div>
</div>

<div class="form-group">
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
</div>
</div>
</div>
</div>
</body>
</html>
<?php include("../includes/footer.php"); ?>