<?php

$link = mysqli_connect('localhost', 'db1' , 'unyjahypa', 'wave_db1');

if($link === false)
{
die("Connection error" . mysqli_connect_error());
}

session_start();


if(isset($_SESSION["2f"]))
{
header("location: index.php");
exit;
}

$e_id = "";
$pswd = "";
$no_email = "";
$no_pswd = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{

// Check if email_id is empty
if($_POST["e_id"]=="")
{
$no_email= "enter your email id";
}
else
{
$e_id = trim($_POST["e_id"]);

}

// Check if password is empty
if($_POST["pswd"]=="")
{
$no_pswd= "enter your password";
} 
else
{
$pswd = trim($_POST["pswd"]);
}

if(($no_email=="") && ($no_pswd==""))
{
// Prepare a select statement
$sql = "SELECT id, email_id, password FROM 2f_authenticate WHERE email_id = ?";

if($stmt = mysqli_prepare($link, $sql))
{
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $p_e_id);
// Set parameters
$p_e_id = $e_id;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Store result
mysqli_stmt_store_result($stmt);

// Check if email_id exists, if yes then verify password
if(mysqli_stmt_num_rows($stmt) == 1){                    
// Bind result variables
mysqli_stmt_bind_result($stmt, $id, $e_id, $h_pswd);

if(mysqli_stmt_fetch($stmt)){
if(password_verify($pswd, $h_pswd))
{
// Password is correct, so start a new session
ini_set('session.gc_maxlifetime', 86400);
ini_set('session.gc_probability', 0);
ini_set('session.gc_divisor', 100);

// each client should remember their session id for EXACTLY 21 hour
session_set_cookie_params(86400);
session_start();

// Store data in session variables
$_SESSION["2f"]= true;
$_SESSION["id"] = $id;
$_SESSION["e_id"] = $e_id;    

// hide and show mob_verify() jq
echo "<script>alert('you have successfully logged in')</script>";
echo "<script>login_hide()</script>";
echo "<script>mob_verify_show()</script>";
} 
else
{
// Display an error message if password is not valid
$no_pswd = "password is invalid";
}
}
}
else
{
// Display an error message if email_id doesn't exist
$no_email = "no account available";
}
}
else
{
echo "Please try again later.";
}
}
// Close statement
mysqli_stmt_close($stmt);
}
// Close connection
mysqli_close($link);
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>2f authentication</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Google Fonts
============================================ -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
<!-- Bootstrap CSS
============================================ -->
<link rel="stylesheet" href="../../cores/css/bootstrap.min.css">
<!-- Bootstrap CSS
============================================ -->
<link rel="stylesheet" href="../../cores/css/font-awesome.min.css">
<!-- adminpro icon CSS
============================================ -->
<link rel="stylesheet" href="../../cores/css/adminpro-custon-icon.css">
<!-- meanmenu icon CSS
============================================ -->
<!-- forms CSS
============================================ -->
<link rel="stylesheet" href="../../cores/css/form/all-type-forms.css">
<!-- responsive CSS
============================================ -->
<link rel="stylesheet" href="../../cores/css/responsive.css">
</head>
<body >
<div class="col-md-4">
</div>
<div class="col-md-4" style="padding-top:140px;" id="hide_show">
<div class="row" >
<div class="col-lg-12 panel panel-default" style="background-color: #F8F8F8">
<div class="imgcontainer">
<center>
	<img src="" alt="" class="img-responsive" width="250px" height="80px">
</center>
</div>
<br>
<center>
<h3 class="panel-heading" style="color: black; font-weight: bold; font-size:30px;">Login Form</h3></center>
<br>
<div class="panel-body">
<form action="login.php" method="POST">
<div class="form-group-inner" >
<div class="row">
<div class="col-lg-4">
<label class="login2" style="font-size: 20px; color:black; font-weight: bold;">Email id:</label>
</div>
<div class="col-lg-8">
<input type="email" name="e_id" value="<?php echo $e_id; ?>" class="form-control" placeholder="Enter Your Email Id" />
<span class="help-block"><?php echo $no_email; ?></span>
</div>
</div>
</div>
<br>
<div class="form-group-inner" >
<div class="row">
<div class="col-lg-4">
<label class="login2" style="font-size: 20px;color:black; font-weight: bold;">Password:</label>
</div>
<div class="col-lg-8">
<input type="password"  name="pswd" class="form-control" placeholder="Enter Your password here" />
<span class="help-block"><?php echo $no_pswd; ?></span>
</div>
</div>
</div>
<br>
<div class="login-btn-inner">
<div class="row">
<div class="col-lg-4">
</div>
</div>
<br>
<div class="row">
<div class="col-lg-4"></div>
<div class="col-lg-8">
<div class="login-horizontal">

<button class="btn btn-md btn-primary login-submit-cs" type="submit" ><span style="color:black; font-weight: bold;">Log In</span></button>
</div>
</div>
</div>
<br>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
</div>
</body>
</html>

