<?php
$user_id = htmlspecialchars($_GET["user_id"]);
$purpose = htmlspecialchars($_GET["purpose"]);
$subject = htmlspecialchars($_GET["subject"]);
$body = htmlspecialchars($_GET["body"]); 
$timestamp = htmlspecialchars($_GET["timestamp"]); 
$type = htmlspecialchars($_GET["type"]); 


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 

// Check connection
if($link === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$user_id  = mysqli_real_escape_string($link, $_REQUEST['user_id']);
$purpose  = mysqli_real_escape_string($link, $_REQUEST['purpose']);
$subject  = mysqli_real_escape_string($link, $_REQUEST['subject']);
$body = mysqli_real_escape_string($link, $_REQUEST['body']);
$timestamp = mysqli_real_escape_string($link, $_REQUEST['timestamp']);
$type = mysqli_real_escape_string($link, $_REQUEST['type']);

// Attempt insert query execution
$sql = "INSERT INTO `email_templates`(`purpose`, `subject`, `body`, `added_by`, `timestamp`, `type`) VALUES  ('$purpose', '$subject', '$body', '$user_id', '$timestamp', '$type')";
if(mysqli_query($link, $sql)){
header("location: ../co_emails.php");
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>