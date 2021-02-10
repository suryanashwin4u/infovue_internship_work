<?php
// Include config file
require_once "cnf.php";

// Initialize the session
require_once "sessions.php";

include 'variables.php';

$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM user LEFT JOIN basic_details ON user.u_id = basic_details.u_id WHERE user.u_id = '$u_id'";

if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
$field1name = $row["u_name"];
$field2name = $row["u_id"];
$field3name = $row["city"];
$field4name = $row["email_id"];
$field5name = $row["state"];
$field6name = $row["pin"];
$field7name = $row["f_name"];
$field55name = $row["m_name"];
$field8name = $row["l_name"];
$field9name = $row["phone"];
$field10name = $row["u_stats"];
$field11name = $row["grp"];
$field12name = $row["alt_date"];
$field13name = $row["alt_by"];
$field14name = $row["team"];
$field15name = $row["cb_info"];
$field16name = $row["cb_time"];
$field17name = $row["zone"];
$field18name = $row["time"];
$field19name = $row["date"];
$field20name = $row["remarks"];
$field21name = $row["vol_type"];
$field22name = $row["mob_status"];
$field23name = $row["data_id"];
$field24name = $row["birthday"];
$field25name = $row["Address"];
$field26name = $row["Educational"];
$field27name = $row["Associate"];
$field28name = $row["Organization"];
$field29name = $row["id_link"];
$field30name = $row["suitable_time"];
$field31name = $row["cv_link"];
$field32name = $row["photo_link"];
$field33name = $row["tos_affect"];
$field34name = $row["data_status"];
$field35name = $row["photo_status"];
$field36name = $row["data_timestamp"];
$field37name = $row["approval_status"];
$field38name = $row["approval_timestamp"];
$field53name = $row["triger"];
$field54name = $row["country"];
}
$result->free();
} 



?>
<!doctype html>
<html class="no-js" lang="en">
<?php include 'functions.php'?>
<?php include 'variables.php'?>
<title>View Profile  | BigBeans | Supplier</title>
<head>
<?php include 'header.php'?>

</head>

<body onload="myFunction()" class="materialdesign">
<div id="loading"> <div id="ts-preloader-absolute25">
<div class="tscssload-triangles">
<div class="tscssload-tri tscssload-invert"></div>
<div class="tscssload-tri tscssload-invert"></div>
<div class="tscssload-tri"></div>
<div class="tscssload-tri tscssload-invert"></div>
<div class="tscssload-tri tscssload-invert"></div>
<div class="tscssload-tri"></div>
<div class="tscssload-tri tscssload-invert"></div>
<div class="tscssload-tri"></div>
<div class="tscssload-tri tscssload-invert"></div>
</div>
</div></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Header top area start-->

<?php include 'inc/common/nav.php' ?><br>
<!-- Static Table Start -->
<div class="project-details-area mg-b-15">
<div class="container-fluid">
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
<div class="project-details-wrap shadow-reset">
<div class="row">
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
<div class="project-details-title">
<h2 style="font-size:35px;">
<span class="profile-details-name-nn">
<b>
<?php echo $field7name ?>&nbsp;
<?php echo $field55name ?>&nbsp;
<?php echo $field8name ?>
</b>

<?php 
$ctt_short = substr($field54name,-2);
$query200="SELECT ct_flag,ct_name FROM country_tbl WHERE ctt_short='$ctt_short'";
if ($result = $mysqli->query($query200)) {
while ($row = $result->fetch_assoc()) {
$field200name = $row["ct_flag"];
$field201name = $row["ct_name"];
}
$result->free();
}
?>




<img src="data/id_pics/<?php echo $field200name ?>" style="height:50px">
</h2>


<p style="font-size:25px;">

<?php
$query55="SELECT country FROM user WHERE u_id='$u_id'";
if ($result = $mysqli->query($query55)) 
{
while ($row = $result->fetch_assoc()) 
{
$field1name = $row["country"];
}
$result->free();
}
$ct_code = substr($field1name,-2)
?>
A<?php echo $ct_code?>-<?php echo $u_id ?></p>

</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Status:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="btn-group project-list-ad">
<button class="btn btn-white btn-xs"><?php echo $field10name ?></button>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Name:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field7name ?>&nbsp;
<?php echo $field55name ?>&nbsp;
<?php echo $field8name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>City:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field3name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Email ID:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field4name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>State:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field5name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>PIN:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field6name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Phone:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field9name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>User Group:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field11name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Country:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field54name ?></span>
</div>
</div>
</div>
</div>

</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Date of Birth:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field24name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Address:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field25name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Qualification:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field26name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Associate Reason:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt" style="word-wrap: break-word;">
<span><?php echo $field27name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Organization:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field28name?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Suitable Time:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field30name ?></span>
</div>
</div>
</div>
</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>ID Link:</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<a href="#" onclick="window.open('data/id_pics/<?php echo $field29name ?>', 'newwindow', 'width=500,height=500'); return false;">View ID</a>

</div>
</div>
</div>
</div>

<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span>
<strong>Data Timestamp:</strong>
</span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php echo $field18name ?></span>
</div>
</div>
</div>
</div>


<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="project-details-st">
<span><strong>Last log in :</strong></span>
</div>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
<div class="project-details-dt">
<span><?php 
$query989="SELECT * FROM sessions_tbl WHERE u_id=$field2name ORDER BY `id` DESC LIMIT 1";
if ($result = $mysqli->query($query989)) {
while ($row = $result->fetch_assoc()) {
$field267name = $row["date"];
$field276name = $row["time"];
}
$result->free();
}?>


<?php echo $field267name?>-<?php echo $field276name ?>
</span>
</div>
</div>
</div>
</div>



<div class="project-details-mg">

</div>
<div class="project-details-mg">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

</div>
</div>
</div>
</div>
</div>




</div>
</div>


<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<div class="project-details-descri project-details-mg-t-30 shadow-reset">
<center><img src="data/pro_pics/<?php echo $field32name ?>">
</div><br>



</div>
</div>
</div>
</div>
<!-- Static Table End -->

</div>                  



<?php include 'footer.php'?>
</body>

</html>