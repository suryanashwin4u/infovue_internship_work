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

$sql2 = "SELECT * FROM `tickets` WHERE `u_id` = '$tick_uid'";

$faq2 = $db_handle->runQuery($sql2);

?>

<!doctype html>
<html class="no-js" lang="en">
<?php include 'functions.php'?>
<?php include 'variables.php'?>
<title>Tickets</title>
<head>

<?php include 'header.php'?>
<script type="text/javascript" class="init">

$(document).ready(function() 
{
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


<!-- Basic Form Start -->
<br>
<div class="container-fluid">
<div class="row">
<div class="col-md-4">
<div class="admin-dashone-data-table-area ">
<div class="sparkline8-list shadow-reset">
<div class="sparkline8-hd ">
<div class="main-sparkline8-hd ">
<h1>Update Tickets</h1>
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
<form role="form" action="gears/insert_ticket.php" method="post" enctype="multipart/form-data">

<div class="form-group-inner">

<input name="u_id" type="text" id="u_id" value="<?php echo $u_id ?>" required hidden>

<input name="status" type="text" id="status" value="submitted" required hidden>

<input name="timestamp" type="text" id="timestamp" value="<?php date_default_timezone_set("Asia/Calcutta"); echo date("d/m/Y") . "&nbsp;" . date("h:i:sa"); ?>" required hidden>

<div class="row">
<div class="col-lg-12">
<h4>Assign To</h4>
<select class="chosen-select"  data-live-search="true" placeholder="Assigned UID" id="au_id" name="au_id" required>

<?php
echo'<optgroup label="Preferred Asigners">';
$username = "db1";
$password = "unyjahypa";
$database = "wave_db1";
$mysqli = new mysqli("localhost", $username, $password, $database);
$u_id = $_SESSION["u_id"];
$query = "SELECT DISTINCT(au_id) FROM `tickets` WHERE `u_id` = $u_id" ;
// sql to delete a record

// random selection
$arr = array("38", "43", "66", "78");
$i = array_rand($arr,1);
$tech = $arr[$i];

$data = 43;
$ideas = 66;

if ($result = $mysqli->query($query)) 
{
while ($row = $result->fetch_assoc()) 
{
$field1name = $row["au_id"];
$value = $field1name;
if($value == $tech)
{
echo '<option value="'.$field1name.'">Systems | Tech Admin </option>';
}
elseif($value == $data)
{
echo '<option value="'.$field1name.'">Data | Data Admin </option>';
}
elseif($value == $ideas)
{
echo '<option value="'.$field1name.'">Administration | Ideas </option>';
}
}
$result->free();
}
echo'</optgroup>';
echo'
<optgroup label="Global Person">
<option value="43">Data | Data Admin</option>
<option value='.$tech.'>Systems | Tech Admin</option>
<option value="66">Administration | Ideas</option>';
?>
</optgroup>
</select><br><br>
<textarea class="form-control" rows="3" placeholder="Update Ticket data Here" id="data" name="data" required></textarea>

</div> 
</div>
<br/>
<div class="row">
<div class="col-lg-2">
<h5>Type</h5>
</div>
<div class="col-lg-10">
<select class="chosen-select"  data-live-search="true" placeholder="Type" id="type" name="type" required>
<option value="urgent">Urgent</option>
<option value="medium">Medium</option>
<option value="normal" selected>Normal</option>
</select>
</div> 
</div>
</div>									 
<center>                                                      
<button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>&nbsp Submit</button>
</center>

</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<!-- Basic Form End-->
<div class="col-md-8">
<div class="admin-dashone-data-table-area">
<div class="sparkline8-list shadow-reset">
<div class="sparkline8-hd">
<div class="main-sparkline8-hd">
<h1>Submitted Tickets</h1>
<div class="sparkline8-outline-icon">
</div>
</div>
</div>
<div class="sparkline8-hd">                  
<div class="static-table-list" style="overflow-x:scroll; overflow-y:hidden; border solid 0px;">
<table width="100%"  id="ssss" class="table table-striped table-bordered"> 
<thead>
<tr>
<th>Ticket Id</th>
<th>Assigned To</th>
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
foreach($faq2 as $k=>$v) 
{
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
$query = "SELECT * FROM `user` WHERE `u_id` = '$co_name_new2'";

if ($result = $mysqli->query($query)) 
{
while ($row = $result->fetch_assoc()) 
{
$field13name = $row["f_name"]; 
$field14name = $row["l_name"]; 
}
$result->free();
} 
echo  $field13name ."&nbsp". $field14name;
?>
</td>
<td width="62%"><?php echo $faq2[$k]["data"]; ?></td>
<td width="10%"><?php echo $faq2[$k]["status"]; ?></td>
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
</div>



<!-- Basic Form End-->

</div>                  



<?php include 'footer.php'?>
</body>

</html>