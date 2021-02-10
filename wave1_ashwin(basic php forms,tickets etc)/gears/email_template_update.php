<?php
// Include config file
require_once "../cnf.php";

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

$template_id = htmlspecialchars($_GET["template_id"]);
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 

// Check connection
if($link === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}
$template_id = mysqli_real_escape_string($link, $_REQUEST['template_id']);
?>

<!doctype html>
<html class="no-js" lang="en">
<?php include '../functions.php'?>
<?php include '../variables.php'?>
<title>Dashboard</title>
<head>
<?php include '../header.php'?>
<script src="../nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
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
<h1>Alter Email Template ID - <?php echo $template_id?></h1>

</div>
</div>
<div class="sparkline10-graph">
<div class="row">
<div class="col-lg-12" >

<form role="form" action="update_email_template.php" method="post" enctype="multipart/form-data">
<input name="template_id" type="text" id="template_id" value="<?php echo $template_id ?>" required hidden>
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
<textarea class="form-control" placeholder="Body" id="new_update" name="new_update" style="width:578px; height:100px; resize: none;"  value="" ><?php echo $field111name ?></textarea><br/>
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
<?php include '../footer.php'?>
</body>
</html>