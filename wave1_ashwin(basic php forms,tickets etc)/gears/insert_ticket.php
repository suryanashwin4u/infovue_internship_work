<?php
$au_id = htmlspecialchars($_GET["au_id"]); 
$data = htmlspecialchars($_GET["data"]); 
$u_id = htmlspecialchars($_GET["u_id"]); 
$status = htmlspecialchars($_GET["status"]); 
$type = htmlspecialchars($_GET["type"]); 
$timestamp = htmlspecialchars($_GET["timestamp"]); 
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$au_id  = mysqli_real_escape_string($link, $_REQUEST['au_id']);
$data  = mysqli_real_escape_string($link, $_REQUEST['data']);
$u_id  = mysqli_real_escape_string($link, $_REQUEST['u_id']);
$status  = mysqli_real_escape_string($link, $_REQUEST['status']);
$type  = mysqli_real_escape_string($link, $_REQUEST['type']);
$timestamp  = mysqli_real_escape_string($link, $_REQUEST['timestamp']);


// Attempt insert query execution
$sql = "INSERT INTO tickets (u_id, au_id, data, status, timestamp, type) VALUES ('$u_id', '$au_id', '$data', '$status', '$timestamp', '$type')";

if(mysqli_query($link, $sql)){
    header("location: ../tickets.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>