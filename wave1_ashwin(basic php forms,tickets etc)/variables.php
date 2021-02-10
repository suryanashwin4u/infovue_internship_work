<?php
//Random Variables START
//Random Variables END

//Data Variables START
$tick_uid = "" ;//Tickets Assigned User ID
$co_name_new2  = ""; //Tickets Assigned User ID
$numbers = ""; // mob verification
$senders = ""; //mob verification

//Data Variables END

//DB Variables START
//DB Variables END

//Session Variables START
$u_id = trim($_SESSION["u_id"]);
$u_stats = trim($_SESSION["u_stats"]);
$u_name = trim($_SESSION["u_name"]);
$f_name = trim($_SESSION["f_name"]);
$m_name = trim($_SESSION["m_name"]);
$l_name = trim($_SESSION["l_name"]);
$phone = trim($_SESSION["phone"]);
$email_id = trim($_SESSION["email_id"]);
$group = trim($_SESSION["grp"]);
$state = trim($_SESSION["state"]);
$zone = trim($_SESSION["zone"]);
$city = trim($_SESSION["city"]);
$pin = trim($_SESSION["pin"]);
$remarks = trim($_SESSION["remarks"]);
$vol_type = trim($_SESSION["vol_type"]);
$mob_verification = trim($_SESSION["mob_verification"]);
$mob_stats = trim($_SESSION["mob_stats"]);
$role=trim($_SESSION["role"]);


$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1"; 
$mysqli = new mysqli("localhost", $username, $password, $database);
//Session Variables END

//Fixed Variables START
$GRP00 = "GRP00";
$GRP01 = "GRP01";
$GRP02 = "GRP02";
$GRP03 = "GRP03";
$GRP04 = "GRP04";
$GRP05 = "GRP05";
$GRP06 = "GRP06";
$GRP07 = "GRP07";
$GRP08 = "GRP08";
$GRP09 = "GRP09";
$GRP10 = "GRP10";
$GRP11 = "GRP11";
$GRP12 = "GRP12";
$GRP13 = "GRP13";
$GRP14 = "GRP14";
$GRP15 = "GRP15";
$GRP16 = "GRP16";
$GRP17 = "GRP17";
$GRP18 = "GRP18";
$GRP19 = "GRP19";
$GRP20 = "GRP20";
$GRP21 = "GRP21";
$GRP22 = "GRP22";
$GRP23 = "GRP23";
$GRP24 = "GRP24";
$GRP25 = "GRP25";
$GRP26 = "GRP26";
$GRP27 = "GRP27";
$GRP28 = "GRP28";
$GRP29 = "GRP29";
$GRP30 = "GRP30";
//Fixed Variables END
?>