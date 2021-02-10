<?php
$tick_id = htmlspecialchars($_GET['tick_id']); 
$status = htmlspecialchars($_GET['status']); 
$remarks = htmlspecialchars($_GET['remarks']); 
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$tick_id  = mysqli_real_escape_string($link, $_REQUEST['tick_id']);
$status  = mysqli_real_escape_string($link, $_REQUEST['status']);
$remarks  = mysqli_real_escape_string($link, $_REQUEST['remarks']);
// Attempt insert query execution
$sql = "UPDATE `tickets` SET `status`= '$status', `remarks` = '$remarks' WHERE `tick_id` = '$tick_id'";

if(mysqli_query($link, $sql)){
    header("location: ../dash.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>