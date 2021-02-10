<?php
$au_id = htmlspecialchars($_GET['au_id']); 
$ticket_id = htmlspecialchars($_GET['ticket_id']);  

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$au_id  = mysqli_real_escape_string($link, $_REQUEST['au_id']);
$ticket_id  = mysqli_real_escape_string($link, $_REQUEST['ticket_id']);

// Attempt insert query execution
$sql = "UPDATE `tickets` SET `au_id`= '$au_id' WHERE `tick_id` = '$ticket_id'";

if(mysqli_query($link, $sql))
{
    header("location: ../dash.php");
}
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>