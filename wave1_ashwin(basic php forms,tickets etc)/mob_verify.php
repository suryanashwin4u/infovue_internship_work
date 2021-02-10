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
die("ERROR: Could not connect.". mysqli_connect_error());
}

$u_id  = $_SESSION["u_id"];
$f_name  = $_SESSION["f_name"];
$m_name  = $_SESSION["m_name"];
$l_name  = $_SESSION["l_name"];
date_default_timezone_set("Asia/Calcutta");
$time_session = date("h:i:sa");
$date_session = date("d/m/Y");
$page_name = basename($_SERVER['PHP_SELF']);

// Attempt insert query execution
$sql_session = "INSERT INTO sessions_tbl (u_id, f_name, m_name, l_name, time, date, page) VALUES ('$u_id', '$f_name', '$m_name', '$l_name', '$time_session', '$date_session' , '$page_name')";

if(mysqli_query($link_session, $sql_session))
{
"";
}
else{

"";
}

// Close connection
mysqli_close($link_session);
$ref_url = $_SERVER['REQUEST_URI'];

if(!isset($_SESSION["bb"]) || $_SESSION["bb"] !== true){
header("location: index.php");
exit;
}


$phone = $_SESSION["phone"];
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 

// Check connection
if($link === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$u_id = $_SESSION["u_id"];
$sql3 = "SELECT 'mob_verification' FROM 'user' WHERE 'u_id' = '$u_id'";

$result = mysqli_query($link, $sql3);
if(mysqli_query($link, $sql3)){
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
$mob_verify =  $row["mob_verification"];
}
} 
}

$to = "";
$subject = "Mobile Verification Code || ";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:' . "\r\n";
$headers .= 'Bcc: ' . "\r\n";
$email_id=$_SESSION["email_id"];
$to = "$email_id";
$message = "
<html>
<head>
<title>Mobile Verification Code</title>
</head>
<body>
<p style='text-align: left;'>Hi $f_name,<br />Thank You for signing up.</p>
<p style='text-align: left;'><br />Your Verification Code is: $mob_verify </p>
<p style='text-align: left;'>Regards,</p>
<p style='text-align: left;'>Team BIGBEANS</p>
<p style='text-align: left;'><img src='' alt='' width='' height='' /></p>
<p style='text-align: left;'><a href=''></a></p>
</body>
</html>
<html>
<head>
<title>Signup Mail : Welcome To BIGBEANS</title>
</head>
<body>


</body>
</html>
";

mail($to,$subject,$message,$headers);
// Account details
$apiKey = urlencode('fX3Ht8k51/k-Jp301nq415xrruTKOCEKgUGXzynpuW');

// Message details
$numbers = array($phone);
$sender = urlencode('');
$message = rawurlencode('Your Verification code for BIGBEANS is '.$mob_verify.'. This Code is valid for 30 minutes.');
$numbers = implode(',', $numbers);

// Prepare data for POST request
$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

// Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);


?>


<!doctype html>
<html class="no-js" lang="en">
<?php include 'functions.php' ?>
<?php include 'variables.php' ?>
<title>Mobile Verification</title>
<head>
<?php include 'header.php'?>

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
<br/><br/>
<div class="row">
<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
<center><img src="" width ="" /></center></br>
<div class="login-panel panel panel-default">
<div class="panel-heading">User Verification</div>
<div class="panel-body">
<form action="gears/otp_verify.php" method="post">
<fieldset>
<?php 
if($_GET["verification"]=='false')
{
echo '<div class="alert alert-danger alert-mg-b alert-st-four alert-st-bg3 alert-st-bg14"  role="alert">
<span class="adminpro-icon adminpro-danger-error admin-check-pro admin-check-pro-clr3 admin-check-pro-clr14"></span>
<p class="message-mg-rt"><strong>Oh snap!</strong>Wrong OTP Entered!!!</p>
</div>';
}
?>
<p>Check your Email Inbox / Mobile for <?php if($_GET["verification"]=='false')
{echo 'Correct';}?> Verification Code</p>
<div class="form-group"> 
<input class="form-control" placeholder="OTP verification" name="otp" id="otp" autofocus="" minlength="6" maxlength="6" required>
</div>
<input name="u_id" type="u_id" autofocus="" value ="<?php echo ''.$_SESSION["u_id"].'' ?>" maxlength= "7" required hidden>

<input name="time" type="text" id="time" value="<?php date_default_timezone_set("Asia/Calcutta"); echo date("Y/m/d") . "&nbsp;" . date("h:i:sa"); ?>" required hidden>
<center>
<button type="submit"  value="submit" class="btn btn-primary"><span class="fa fa-check"></span>&nbsp Submit</button></center>
</fieldset>
</form>



</div>
</div>
</div><!-- /.col-->
</div><!-- /.row -->

</div>                  



<?php include 'footer.php'?>
</body>

</html>