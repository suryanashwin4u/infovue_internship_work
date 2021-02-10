<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["bb"]) || $_SESSION["bb"] !== true){
    header("location: index.php");
    exit;
}

$u_id = htmlspecialchars($_GET["u_id"]);
$reason = htmlspecialchars($_GET["reason"]); 
$Address = htmlspecialchars($_GET["Address"]);
$birthday = htmlspecialchars($_GET["birthday"]);
$phone = htmlspecialchars($_GET["phone"]);
$Educational = htmlspecialchars($_GET["Educational"]);
$Occupation = htmlspecialchars($_GET["Occupation"]);
$Language = htmlspecialchars($_GET["Language"]);
$Organization = htmlspecialchars($_GET["Organization"]);
date_default_timezone_set("Asia/Calcutta");



/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$u_id = mysqli_real_escape_string($link, $_REQUEST['u_id']);
$reason = mysqli_real_escape_string($link, $_REQUEST['reason']);
$Address = mysqli_real_escape_string($link, $_REQUEST['Address']);
$birthday = mysqli_real_escape_string($link, $_REQUEST['birthday']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$Educational = mysqli_real_escape_string($link, $_REQUEST['Educational']);
$Occupation = mysqli_real_escape_string($link, $_REQUEST['Occupation']);
$Language = mysqli_real_escape_string($link, $_REQUEST['Language']);
$Organization = mysqli_real_escape_string($link, $_REQUEST['Organization']);


// Attempt insert query execution
$sql = "INSERT INTO basic_details (u_id , phone, reason, Address, birthday, Educational, Occupation, Language, Organization, data_status) VALUES ('$u_id', '$phone', '$reason', '$Address', '$birthday', '$Educational', '$Occupation', '$Language', '$Organization',  '$part_filled')";

if(mysqli_query($link, $sql)){
    header("location: ../basic_details2.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>
