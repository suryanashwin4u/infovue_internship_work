<?php
// Include config file
require_once "cnf.php";
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION['bb']) || $_SESSION['bb'] !== true){
header("location: index.php");
exit;
}

$au_id = htmlspecialchars($_GET['au_id']);  
$ticket_id = htmlspecialchars($_GET['ticket_id']);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reassign Tickets</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<link href="../cores/css/bootstrap.min.css" rel="stylesheet">
<link href="../cores/css/font-awesome.min.css" rel="stylesheet">
<link href="../cores/css/datepicker3.css" rel="stylesheet">
<link href="../cores/css/styles.css" rel="stylesheet">

<script>
function close_window() {
if (confirm("Close Window?")) {
close();
}
}
</script>

<!--Custom Font-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>


<body>
<div class="col-md-4" style="">
<div class="panel panel-default">
<div class="panel-heading">
Reassign Tickets
</div>
<div class="panel-body">
<div class="canvas-wrapper">
<form role="form" action="gears/update_reassign.php" method="post" enctype="multipart/form-data">
<div>
<input name="ticket_id" type="text" id="ticket_id" value="<?php echo $ticket_id ?>" required hidden>
</div>
<div class="form-group">
<?php 
$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM `user` WHERE `u_id`='$au_id'";
if ($result = $mysqli->query($query)) 
{
while ($row = $result->fetch_assoc()) 
{
$field13name = $row['f_name']; 
$field14name = $row['l_name']; 
}
$result->free();
} 
?>
<input type="text" class="form-control" placeholder="Old-Value" value="<?php echo  $field13name ."&nbsp;". $field14name; ?>" readonly="readonly" style="background:white;" readonly required >
</div>
<div class="form-group">
<div class="form-select-list">
<select class="select2_demo_3 form-control" data-placeholder="Select From Dropdown Menu" name="au_id" id="au_id" required tab-index="-1">		
<?php

$sql5="SELECT * FROM user";

if ($result = $mysqli->query($sql5)) 
{
while ($row = $result->fetch_assoc()) 
{
$field50name = $row['f_name'];
$field51name = $row['l_name'];
$field52name = $row['u_id'];
echo '<option value="'.$field52name.'">'.$field50name.' '.$field51name.'('.$field52name.')</option>';
}
$result->free();
}
?>
</select>
</div>
</div>
<button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>&nbsp Submit</button>
</div>

</form>


</div>
</div>
</div>

<script src="../cores/js/bootstrap.min.js"></script>
<script src="../cores/js/chart.min.js"></script>
<script src="../cores/js/chart-data.js"></script>
<script src="../cores/js/easypiechart.js"></script>
<script src="../cores/js/easypiechart-data.js"></script>


</body>
</html>