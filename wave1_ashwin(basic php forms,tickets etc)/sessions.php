<?php
// Initialize the session
# Session lifetime of 3 hours
ini_set('session.gc_maxlifetime', 86400);
session_set_cookie_params(86400);
# Enable session garbage collection with a .01% chance of
# running on each session_start()
ini_set('session.gc_probability', 0);
ini_set('session.gc_divisor', 100);

# Start the session
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link_session = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 

// Check connection
if($link_session === false){
die("ERROR: Could not connect. " . mysqli_connect_error());
}

$u_id  = $_SESSION["u_id"];
$f_name  = $_SESSION["f_name"];
$m_name  = $_SESSION["m_name"];
$l_name  = $_SESSION["l_name"];
date_default_timezone_set("Asia/Calcutta");
$date_session = date("d/m/Y");
$time_session = date("h:i:sa");
$page_name = basename($_SERVER['PHP_SELF']);


// Attempt insert query execution
$sql_session = "INSERT INTO sessions_tbl (u_id, f_name, m_name, l_name, time, date, page) VALUES ('$u_id', '$f_name', '$m_name', '$l_name', '$time_session', '$date_session' , '$page_name')";

if(mysqli_query($link_session, $sql_session))
{
"";
}
else
{
"";
}

// Close connection
mysqli_close($link_session);
$ref_url = $_SERVER['REQUEST_URI'];
// Check if the user is logged in, if not then redirect him to login page


if(!isset($_SESSION["bb"]) || $_SESSION["mob_status"] !== done)
{
header("location: mob_verify.php");
exit;
}
if(!isset($_SESSION["bb"]) || $_SESSION["basic_status"] !== done){
header("location: basic_details1.php");
exit;
}

if(!isset($_SESSION["bb"]) || $_SESSION["id_status"] !== done){
header("location: basic_details_upload.php");
exit;
}


?>