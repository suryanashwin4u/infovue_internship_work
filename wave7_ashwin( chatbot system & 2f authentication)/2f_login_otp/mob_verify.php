<?php
$link = mysqli_connect('localhost', 'db1' , 'unyjahypa', 'wave_db1');

if($link === false)
{
die("Connection error" . mysqli_connect_error());
}

session_start();
$phone=$_POST["phone"];
$_SESSION["phone"]=$phone;
$id = $_SESSION["id"];

$otp_code=rand(1000, 9999);

$sqlupdate="UPDATE 2f_authenticate SET mob_verification = '$otp_code' WHERE id = '$id'";
mysqli_query($link, $sqlupdate);
// Escape user inputs for security

$sql3 = "SELECT `mob_verification` FROM `2f_authenticate` WHERE `id` = '$id'";
$result = mysqli_query($link, $sql3);
if(mysqli_query($link, $sql3)){
if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               $mob_verify =  $row["mob_verification"];
             }
         } 
}

// Account details
	$apiKey = urlencode('fX3Ht8k51/k-Jp301nq415xrruTKOCEKgUGXzynpuW');
	
	// Message details
	$numbers = array($phone);
	$sender = urlencode('GARIND');
	$message = rawurlencode('Your Verification code is '.$mob_verify.'. This Code is valid for 30 minutes.');
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
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

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
<div class="row" id="mob_verify_show">
<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
<center><img src="" width ="" /></center></br>
<div class="login-panel panel panel-default">
<div class="panel-heading">User Mobile OTP Verification</div>
<div class="panel-body">
<form action="mob_verify.php" method="post">
<fieldset>
<center>
<input class="form-control" placeholder="enter mobile number" name="phone" value="<?php echo $phone ?>" minlength="10" maxlength="10" required>
<br>
<button type="submit"  value="sendotp" class="btn btn-md btn-primary"><span class="fa fa-check"></span>&nbsp <?php if(isset($_POST["phone"])) { echo "otp has been sent"; } else { echo "send otp"; } ?></button></center>
</fieldset>
</form>
<br>
<form action="otp_verify.php" method="post">
<fieldset>

<?php 
if($_GET["verification"]=='false')
{
echo '<p>wrong otp entered</p>';
}
?>

<div class="form-group"> 
<input class="form-control" placeholder="OTP verification" name="otp" id="otp" autofocus="" minlength="6" maxlength="6" required>
</div>
<input name="id" type="id" autofocus="" value ="<?php echo ''.$_SESSION["id"].'' ?>" maxlength= "7" required hidden>

<center>
<button type="submit"  value="submit" class="btn btn-md btn-primary"><span class="fa fa-check"></span>&nbsp Submit</button>
</center>
</fieldset>
</form>
</div>
</div>
</div>
</div>
</div>                  
</body>
</html>