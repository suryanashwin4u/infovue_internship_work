<?php
$vu_id = htmlspecialchars($_GET["vu_id"]); 
$su_id = htmlspecialchars($_GET["su_id"]); 
$vol_fname = htmlspecialchars($_GET["vol_fname"]); 
$vol_lname = htmlspecialchars($_GET["vol_lname"]);
$template_id = htmlspecialchars($_GET["template_id"]);
$sent_to = htmlspecialchars($_GET["sent_to"]);
$sent_from = htmlspecialchars($_GET["sent_from"]);
$email_data = $_POST["body"];
$timestamp = htmlspecialchars($_GET["timestamp"]);
$cc = htmlspecialchars($_GET["cc"]);
 

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1");  
// Check connection
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$vu_id  = mysqli_real_escape_string($link, $_REQUEST['vu_id']);
$su_id  = mysqli_real_escape_string($link, $_REQUEST['su_id']);
$vol_fname  = mysqli_real_escape_string($link, $_REQUEST['vol_fname']);
$vol_lname  = mysqli_real_escape_string($link, $_REQUEST['vol_lname']);
$template_id  = mysqli_real_escape_string($link, $_REQUEST['template_id']);
$sent_to  = mysqli_real_escape_string($link, $_REQUEST['sent_to']);
$sent_from  = mysqli_real_escape_string($link, $_REQUEST['sent_from']);
$timestamp = mysqli_real_escape_string($link, $_REQUEST['timestamp']);
$cc  = mysqli_real_escape_string($link, $_REQUEST['cc']);


$to = "$sent_to";

$subject = "BigBeans Mail";   
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: BigBeans <'.$sent_from.'>' . "\r\n";
$headers .= 'Cc: <'.$cc.'>' . "\r\n";
$fixed_footer = "<br/><p data-mce-style='text-align: left;' style='color: rgb(0, 0, 0); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;'>Team BigBeans India</p><p data-mce-style='text-align: left;' style='color: rgb(0, 0, 0); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;'><img src='https://adoreindia.org/storage/2019/07/adore-latst-copy-300x117-1-300x117.png' alt='' width='95' height='37' data-mce-src='https://adoreindia.org/storage/2019/07/adore-latst-copy-300x117-1-300x117.png'></p><p data-mce-style='text-align: left;' style='color: rgb(0, 0, 0); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;'><a href='http://www.adoreindia.org/' data-mce-href='http://www.adoreindia.org'>www.adoreindia.org<br></a>+91 8620886744/8620886745</p><p data-mce-style='text-align: left;' style='color: rgb(0, 0, 0); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;'>NB:&nbsp; You can also call or&nbsp;<br>whatsapp 8620886745.</p>";
$email = $email_data;
$footer = $fixed_footer;
$message = $email.$footer;

// Attempt insert query execution
$sql = "INSERT INTO `email_log`(`u_id`, `su_id`, `template_id`, `sent_to`, `sent_from`, `email_data`, `timestamp`) VALUES ('$vu_id', '$su_id', '$template_id', '$sent_to', '$sent_from', '$email_data', '$timestamp')";

if(mysqli_query($link, $sql)){
    mail($to,$subject,$message,$headers);
    header("location: dash.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>