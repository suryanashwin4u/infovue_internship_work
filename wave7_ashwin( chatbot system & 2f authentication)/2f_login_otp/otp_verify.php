<?php

session_start();

$id = $_SESSION["id"];
$phone = $_SESSION["phone"];
$otp = $_GET["otp"]; 
$otp_new = mt_rand(1000, 9999);
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 
if($link === false)
{
    die("Connection error " . mysqli_connect_error());
}

$otp  = mysqli_real_escape_string($link, $_REQUEST['otp']);
$sql3 = "SELECT mob_verification FROM 2f_authenticate WHERE id='$id'";
$result = mysqli_query($link, $sql3);
if(mysqli_query($link, $sql3))
{
if (mysqli_num_rows($result) > 0) 
{
            while($row = mysqli_fetch_assoc($result)) 
            {
               $mob_verification =  $row["mob_verification"];
            }
}}

if($otp == $mob_verification)
{
$sql = "UPDATE 2f_authenticate SET mob_status = 'done', phone= '$phone' WHERE id = '$id'";

if(mysqli_query($link, $sql))
{
    $_SESSION["mob_status"] = 'done';
    header("location: index.php");
} 
else
{
    echo "Database connection error" . mysqli_error($link);
}}

else 
{
    $sql2 = "UPDATE 2f_authenticate SET mob_verification = '$otp_new' WHERE id = '$id'";
    if(mysqli_query($link, $sql2)){
    $_SESSION["mob_status"] = 'void';
    header("location: mob_verify.php?verification=false");
}}
// Close connection
mysqli_close($link);
?>