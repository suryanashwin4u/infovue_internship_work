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
$tick_id = htmlspecialchars($_GET['ticket_id']); 

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ticket Status</title>
<link href="../cores/css/bootstrap.min.css" rel="stylesheet">
<link href="../cores/css/font-awesome.min.css" rel="stylesheet">
<link href="../cores/css/datepicker3.css" rel="stylesheet">
<link href="../cores/css/styles.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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
<div class="col-md-4" style="margin-top:-50px;">
<div class="panel panel-default">
<div class="panel-heading">
Change Status
</div>
<div class="panel-body">
<div class="canvas-wrapper">
<form role="form" action="gears/update_status.php" method="post" enctype="multipart/form-data">


<div>
<input name="tick_id" type="text" id="tick_id" value="<?php echo $tick_id ?>" required hidden>
</div>
<div class="form-group">
<select class="form-control" placeholder="Status" id="status" name="status" >
<option value="in-process">In - Process</option>
<option value="completed">Completed</option>
<option value="pending">Pending</option>
<option value="purged">Purged</option>
</select>
</div>
<div class="form-group">
<input class="form-control" type="text" name="remarks" id="remarks" placeholder="Remarks"/>
</select>
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
<script src="../cores/js/bootstrap-datepicker.js"></script>
<script src="../cores/js/custom.js"></script>

</body>
</html>