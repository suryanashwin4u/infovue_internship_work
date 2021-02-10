<?php
$template_id = htmlspecialchars($_GET["template_id"]); 
$body = htmlspecialchars($_GET["new_update"]); 

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$template_id  = mysqli_real_escape_string($link, $_REQUEST['template_id']);
$body  = mysqli_real_escape_string($link, $_REQUEST['new_update']);

// Attempt insert query execution
$sql = "UPDATE `email_templates` SET `body` = '$body' WHERE `id` = '$template_id'";

if(mysqli_query($link, $sql)){
    header("location: ../dash.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>