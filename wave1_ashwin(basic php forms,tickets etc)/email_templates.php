<?php
// Include config file
require_once "cnf.php";
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["bb"]) || $_SESSION["bb"] !== true)
{
header("location: index.php");
exit;
}
$vol_id = htmlspecialchars($_GET["vol_id"]); 
$vol_email = htmlspecialchars($_GET["vol_email"]); 
$vol_fname = htmlspecialchars($_GET["vol_fname"]); 
$vol_lname = htmlspecialchars($_GET["vol_lname"]);
$u_id = htmlspecialchars($_SESSION["u_id"]);
$sent_from = htmlspecialchars($_SESSION["email_id"]);
date_default_timezone_set("Asia/Calcutta");
$date = date("d/m/Y");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>email templates</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<link href="../cores/css/bootstrap.min.css" rel="stylesheet">
<link href="../cores/css/font-awesome.min.css" rel="stylesheet">
<link href="../cores/css/datepicker3.css" rel="stylesheet">
<link href="../cores/css/styles.css" rel="stylesheet">
<script>
function close_window() 
{
if (confirm("Close Window?")) 
{
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
<div class="col-md-4" style=""></div>
<div class="col-md-4" style="">
<div class="panel panel-default">
<div class="panel-heading">
Send Email to <?php echo $vol_fname?>
</div>
<div class="panel-body">
<div class="canvas-wrapper">
<form role="form" action="email_check.php" method="post" enctype="multipart/form-data">
<div>
<input name="vu_id" type="text" id="vu_id" value="<?php echo $vol_id ?>" required hidden>
<input name="su_id" type="text" id="su_id" value="<?php echo $u_id ?>" required hidden>
<input name="date" type="text" id="date" value="<?php echo $date ?>" required hidden>
<input name="vol_email" type="text" id="vol_email" value="<?php echo $vol_email ?>" required hidden>
<input name="vol_fname" type="text" id="vol_fname" value="<?php echo $vol_fname ?>" required hidden>
<input name="vol_lname" type="text" id="vol_lname" value="<?php echo $vol_lname ?>" hidden>
<input name="sent_from" type="text" id="sent_from" value="<?php echo $sent_from ?>" required hidden>
</div>
<div class="form-group">
<select class="form-control" placeholder="Time Frame" id="template_id" name="template_id" required>
<?php
$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1";
$mysqli = new mysqli("localhost", $username, $password, $database);
$query = "SELECT * FROM `email_log` ORDER BY elog_id DESC LIMIT 1" ;
// sql to delete a record
if ($result = $mysqli->query($query)) 
{
while ($row = $result->fetch_assoc()) 
{
$field50name = $row["template_id"];
}
$result->free();
}
$query = "SELECT * FROM `email_templates` WHERE id='$field50name'";
// sql to delete a record
if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
$field1name = $row["id"];
$field2name = $row["purpose"];
echo '<option value="'.$field1name.'">'.$field2name.'</option>';
}
$result->free();
}
$query = "SELECT * FROM `email_templates` WHERE id!='$field50name'" ;
// sql to delete a record
if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
$field1name = $row["id"];
$field2name = $row["purpose"];
echo '<option value="'.$field1name.'">'.$field2name.'</option>';
}
$result->free();
}
?>
</select>
</div>
<button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>&nbsp Submit</button>
</div>
</form>
</div>
</div>
</div>
<div class="col-md-4" style=""></div>
<script src="../cores/js/bootstrap.min.js"></script>
<script src="../cores/js/chart.min.js"></script>
<script src="../cores/js/chart-data.js"></script>
<script src="../cores/js/easypiechart.js"></script>
<script src="../cores/js/easypiechart-data.js"></script>
</body>
</html>