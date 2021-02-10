<?php
// Include config file
require_once "cnf.php";
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["bb"]) || $_SESSION["bb"] !== true){
header("location: index.php");
exit;
}
if(!isset($_SESSION["bb"]) || $_SESSION["mob_status"] !== done){
header("location: mob_verify.php");
exit;
}

$vu_id = htmlspecialchars($_GET["vu_id"]); 
$su_id = htmlspecialchars($_GET["su_id"]); 
$vol_fname = htmlspecialchars($_GET["vol_fname"]); 
$vol_lname = htmlspecialchars($_GET["vol_lname"]);
$template_id = htmlspecialchars($_GET["template_id"]);
$sent_to = htmlspecialchars($_GET["vol_email"]);
$sent_from = htmlspecialchars($_GET["sent_from"]);
$timestamp = htmlspecialchars($_GET["date"]);
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 

// Check connection
if($link === false)
{
die("ERROR: Could not connect. " . mysqli_connect_error());
}

$vu_id = mysqli_real_escape_string($link, $_REQUEST['vu_id']);
$su_id = mysqli_real_escape_string($link, $_REQUEST['su_id']);
$vol_fname = mysqli_real_escape_string($link, $_REQUEST['vol_fname']); 
$vol_lname = mysqli_real_escape_string($link, $_REQUEST['vol_lname']);
$template_id = mysqli_real_escape_string($link, $_REQUEST['template_id']);
$sent_to = mysqli_real_escape_string($link, $_REQUEST['vol_email']);
$sent_from = mysqli_real_escape_string($link, $_REQUEST['sent_from']);
$timestamp = mysqli_real_escape_string($link, $_REQUEST['date']);

?>

<!doctype html>
<html class="no-js" lang="en">
<?php include 'functions.php'?>
<?php include 'variables.php'?>
<title>Dashboard</title>
<head>
<?php include 'header.php'?>
<script src="../nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas(); });
</script>
<script type="text/javascript" class="init">

$(document).ready(function() {
$('#ssss').DataTable({
"order": [[ 0, "desc" ]]
} );
} );

</script>


</head>

<body onload="myFunction()" class="materialdesign">
<div id="loading"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Header top area start-->
<!-- Static Table Start -->
<div class="static-table-area mg-b-15">
<div class="container-fluid">
<div class="row">
<div class="col-lg-5">
<div class="sparkline10-list shadow-reset mg-t-30">
<div class="sparkline10-hd">
<div class="main-sparkline10-hd">
<h1>Check Email for <?php echo $vol_fname?></h1>

</div>
</div>
<div class="sparkline10-graph">
<div class="row">
<div class="col-lg-12" >

<form role="form" action="email_send.php" method="post" enctype="multipart/form-data">

<input name="vu_id" type="text" id="vu_id" value="<?php echo $vu_id ?>" required hidden>
<input name="su_id" type="text" id="su_id" value="<?php echo $su_id ?>" required hidden>
<input name="vol_fname" type="text" id="vol_fname" value="<?php echo $vol_fname ?>" required hidden>
<input name="vol_lname" type="text" id="vol_lname" value="<?php echo $vol_lname ?>" required hidden>
<input name="sent_to" type="text" id="sent_to" value="<?php echo $sent_to ?>" required hidden>
<input name="sent_from" type="text" id="sent_from" value="<?php echo $sent_from ?>" required hidden>
<input name="timestamp" type="text" id="timestamp" value="<?php echo $timestamp ?>" required hidden>
<input name="template_id" type="text" id="template_id" value="<?php echo $template_id ?>" required hidden>
<input class="form-control" placeholder="" id="" name="" value="<?php echo $sent_to ?>" required readonly></br>
<input class="form-control" placeholder="Enter CC" id="cc" name="cc" value="" required></br>
<?php
$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1";
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM `email_templates` WHERE `id` = '$template_id'";

if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
$field111name = $row["body"];
}
$result->free();
} 
?>

<textarea class="form-control" placeholder="Body" id="body" name="body" style="width:533px; height:100px; resize: none;"  value="" ><?php echo $field111name?></textarea><br/>


<button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>&nbsp Submit</button>
</form>
</div>




<br/>
<br/>

</div>
</div>
</div>
</div>

</div>

</div>
</div>
<!-- Static Table End -->

</div>                  



<?php include 'footer.php'?>
</body>

</html>