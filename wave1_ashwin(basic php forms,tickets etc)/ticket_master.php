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
$tick_uid = htmlspecialchars($_SESSION["u_id"]); 
require_once("inc/dbcontroller.php");
$db_handle = new DBController();
$sql2 = "SELECT * FROM `tickets`";
$faq2 = $db_handle->runQuery($sql2);
?>

<!doctype html>
<html class="no-js" lang="en">
<?php include 'functions.php'?>
<?php include 'variables.php'?>
<title>Ticket Master</title>
<head>
<?php include 'header.php'?>
<script type="text/javascript" class="init">

$(document).ready(function() {
$('#ssss').DataTable({
"order": [[ 0, "desc" ]]
} );
} );

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

<?php include 'inc/common/nav.php' ?>
<!-- Static Table Start -->
<div class="static-table-area mg-b-15">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="sparkline10-list shadow-reset mg-t-30">
<div class="sparkline10-hd">
<div class="main-sparkline10-hd">
<h1>Tickets Log</h1>

</div>
</div>
<div class="sparkline10-graph">
<div class="static-table-list" style="overflow-x:scroll; overflow-y:hidden; border solid 0px;">
<table width="100%"  id="ssss" class="table table-striped table-bordered"> 
<thead>
<tr>
<th>Ticket Id</th>
<th>Assigned To</th>
<th>Assigned By</th>
<th>Ticket</th>
<th>Status</th>
<th>Remarks</th>
<th>Timestamp</th>
</tr>
</thead>				
<tbody>
<?php
if (is_array($faq2) || is_object($faq2))
{
foreach($faq2 as $k=>$v) {
?>
<tr>
<td width="8%"><?php echo $faq2[$k]["tick_id"]; ?></td>
<td width="8%">

<?php 
$co_name_new2 = $faq2[$k]["au_id"];
$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1";  
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM `user` WHERE `u_id` = '$co_name_new2' ";
if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
$field13name = $row["f_name"]; 
$field14name = $row["l_name"]; 
}
$result->free();
} 
echo  $field13name ."&nbsp;". $field14name ;
?>




</td>
<td width="8%">
<?php 
$co_name_new3 = $faq2[$k]["u_id"];
$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM `user` WHERE `u_id` = '$co_name_new3' ";
if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
$field15name = $row["f_name"]; 
$field16name = $row["l_name"]; 
}
$result->free();
} 
echo  $field15name ."&nbsp;". $field16name ;
?>




</td>
<td width="62%"><?php echo $faq2[$k]["data"]; ?></td>
<td width="10%">

<a href="#" onclick="window.open('ticket_status.php?ticket_id=<?php echo $faq2[$k]["tick_id"]; ?>','tickets2', 'width=350','height=250'); return false;" ><?php echo $faq2[$k]["status"]; ?></a>
</td>
<td width="10%"><?php echo $faq2[$k]["remarks"]; ?></td>
<td width="10%"><?php echo $faq2[$k]["timestamp"]; ?></td>
</tr>
<?php
}
}
?>
</tbody>
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