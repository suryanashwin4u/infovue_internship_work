<?php
// Include config file
require_once "cnf.php";


$to = "$email_id";
$subject = "Welcome to BigBeans";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <>' . "\r\n";
$headers .= 'Bcc: ' . "\r\n";


// Define variables and initialize with empty values
$email_id = $password = $confirm_password = "";
$email_id_err = $password_err = $confirm_password_err = $phone_err = "";
$u_stats = "";
$f_name = "";
$m_name = "";
$l_name = "";
$grp = "";
$phone="";
$city="";
$pin="";
$state="";
$time="";
$zone="";
$mob_verification="";
$mob_status="";
$country="";
$u_id = "";
$role="";









// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validate username
if(empty(trim($_POST["email_id"])))
{
$email_id_err = "Please enter a Email.";
} 
else
{
// Prepare a select statement
$sql = "SELECT email_id FROM user WHERE email_id = ?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_email_id);				

// Set parameters
$param_email_id = trim($_POST["email_id"]);

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
/* store result */
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 1){
$email_id_err = "This Email ID is already taken.";
} else{
$email_id = trim($_POST["email_id"]);
$u_stats = trim($_POST["u_stats"]);
$f_name = trim($_POST["f_name"]);
$m_name = trim($_POST["m_name"]);
$l_name = trim($_POST["l_name"]);
$grp = trim($_POST["grp"]);
$phone=trim($_POST["phone"]);
$city=trim($_POST["city"]);
$pin=trim($_POST["pin"]);
$state=trim($_POST["state"]);
$zone=trim($_POST["state"]);
$time=trim($_POST["time"]);
$mob_verification=trim($_POST["mob_verification"]);
$mob_status=trim($_POST["mob_status"]);
$country=trim($_POST["country"]);
$u_id = trim($_POST["u_id"]);                    
$role = trim($_POST["role"]);                    
}
} 

else
{
echo "Oops! Something went wrong. Please try again later.";
}
}

// Close statement
mysqli_stmt_close($stmt);
}




if(empty($_POST["phone"]))
{
$phone_err = "Please enter a Phone No.";

}

else
{
// Prepare a select statement
$sql = "SELECT phone FROM user WHERE phone = ?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_phone);

// Set parameters
$param_phone = trim($_POST["phone"]);

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt))
{
/* store result */
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 1)
{
$phone_err = "This Phone No. is already taken.";

} 
else
{

$email_id = trim($_POST["email_id"]);
$u_stats = trim($_POST["u_stats"]);
$f_name = trim($_POST["f_name"]);
$m_name = trim($_POST["m_name"]);
$l_name = trim($_POST["l_name"]);
$grp = trim($_POST["grp"]);
$phone=trim($_POST["phone"]);
$city=trim($_POST["city"]);
$pin=trim($_POST["pin"]);
$state=trim($_POST["state"]);
$zone=trim($_POST["state"]);
$time=trim($_POST["time"]);
$mob_verification=trim($_POST["mob_verification"]);
$mob_status=trim($_POST["mob_status"]);
$country=trim($_POST["country"]);
$u_id = trim($_POST["u_id"]);                    
$role = trim($_POST["role"]);                    
}
} 
else{
echo "Oops! Something went wrong. Please try again later.";
}
}

// Close statement
mysqli_stmt_close($stmt);
}





// Validate password
if(empty(trim($_POST["password"])))
{
$password_err = "Please enter a password.";     
} 
elseif(strlen(trim($_POST["password"])) < 8)
{
$password_err = "Password must have atleast 8 characters.";
} 
else
{
$password = trim($_POST["password"]);
}




// Validate confirm password
if(empty(trim($_POST["confirm_password"])))
{
$confirm_password_err = "Please confirm password.";     
} 
else
{
$confirm_password = trim($_POST["confirm_password"]);
if(empty($password_err) && ($password != $confirm_password))
{
$confirm_password_err = "Password did not match.";
}
}

// Check input errors before inserting in database
if(empty($email_id_err) && empty($password_err) && empty($confirm_password_err) && empty($phone_err))
{

// Prepare an insert statement
$sql = "INSERT INTO user (u_stats, f_name, m_name, l_name, phone, email_id, password, grp, state, zone, city, time, pin, mob_verification, mob_status, country, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "sssssssssssssssss", $param_u_stats, $param_f_name, $param_m_name, $param_l_name, $param_phone, $param_email_id, $param_password, $param_grp, $param_state, $param_zone, $param_city, $param_time, $param_pin, $param_mob_verification, $param_mob_status, $param_country, $param_role);

// Set parameters
$param_u_stats = $u_stats;
$param_f_name = $f_name;
$param_m_name = $m_name;
$param_l_name = $l_name;
$param_phone = $phone;
$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
$param_grp = $grp;
$param_state = $state;
$param_zone = $zone;
$param_city = $city;
$param_time = $time;
$param_pin = $pin;
$param_mob_verification = $mob_verification;
$param_mob_status = $mob_status;
$param_country = $country;
$param_role = $role;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Redirect to login page



$to = "$email_id";
$message = "
<html>
<head>
<title>Signup Mail : Welcome To BigBeans</title>
</head>
<body>
<p style='text-align: left;'>Hi $f_name,<br />Warm Greetings from BigBeans.Thank You for signing up.</p>
<p style='text-align: left;'><br />&nbsp;</p>
<p style='text-align: left;'><br />&nbsp</p>
<p style='text-align: left;'>&nbsp;&nbsp;<strong><a href=''>CLICK HERE</a></strong></p>
<p style='text-align: left;'>Regards</p>
<p style='text-align: left;'>Team BigBeans</p>
<p style='text-align: left;'><img src='' alt='' width='' height='' /></p>
<p style='text-align: left;'><a href=''></a></p>
<p style='text-align: left;'>nb:&nbsp;&nbsp; </p>
</body>
</html>
";
mail($to, $subject, $message, $headers);
header("location: index.php?ref=reg_success");


} 

else
{
echo "Something went wrong. Please try again later.";
}
}

// Close statement
mysqli_stmt_close($stmt);
}
else{



}
// Close connection
mysqli_close($link);
}










function randomPassword() {
$alphabet = "abcdefghijklmnopqrstuvwxyz";
$pass = array(); //remember to declare $pass as an array
$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
for ($i = 0; $i < 4; $i++) {
$n = rand(0, $alphaLength);
$pass[] = $alphabet[$n];
}
return implode($pass); //turn the array into a string
}
?>



<?php include("header.php"); ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Supplier SignUp Form</title>
<meta name="description" content="">


<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Google Fonts-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="../cores/img/favicon.ico">
<!-- Bootstrap CSS-->
<link rel="stylesheet" href="../cores/css/bootstrap.min.css">
<!-- Bootstrap CSS-->
<link rel="stylesheet" href="../cores/css/font-awesome.min.css">
<!-- adminpro icon CSS-->
<link rel="stylesheet" href="../cores/css/adminpro-custon-icon.css">

<link rel="stylesheet" href="../cores/css/form/all-type-forms.css">




<!-- responsive CSS-->
<link rel="stylesheet" href="../cores/css/responsive.css">
</head>

<body style="background-image:url('../cores/img/1.jpg'); background-repeat: no-repeat; background-position: center center; background-size: cover; background-attachment: fixed;">



<div class="col-md-6">

</div>





<div class="col-md-5" style="margin-top:10px;">



<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >

<input type="text"  name="u_id" id="id" value ="00<?php echo ''.$field1name.'' ?>" maxlength= "7" required hidden/>



<input type="text"  name="u_stats" id="stats" value="pnv" required hidden />
<input type="text"  name="mob_status" id="mob_status" value="void" required hidden />


<div class="container-fluid" >
<div class="row">
<center>
<div class="col-lg-12">
<div class="logo" style="width:250px; height:80px;">
<a href="#"><img src="../cores/img/bigbeans.png" alt="bigbeanslogo" /></a>
</div>
</div>
</center>
</div>
</div>


<center><p style="font-size:20px; font-weight:bold; margin:10px; color: white;">Supplier Sign Up Form</p></center>

<center><p style="font-size:15px; font-weight:bold; margin:10px; color: white;">fill the details to confirm the signup for the supplier module</p></center>



<?php 
if($email_id_err !="" || $phone_err !="" || $password_err != "" || $confirm_password_err != "")
echo '<div class="alert alert-danger alert-mg-b alert-st-four alert-st-bg3 alert-st-bg14"  role="alert">
<span class="adminpro-icon adminpro-danger-error admin-check-pro admin-check-pro-clr3 admin-check-pro-clr14"></span>
<p class="message-mg-rt"><strong>Oh snap!</strong>'.$email_id_err.' '.$phone_err.' '.$password_err.' '.$confirm_password_err.'!!!</p>
</div>'
?>



<?php 
$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM user ORDER BY 'u_id' DESC LIMIT 1";
if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
$field1name = $row["u_id"] + "1";
echo '';
}
$result->free();
} 
?>




<input type="text" id="role" name="role" value="Supplier" required hidden>





<div class="form-row" >

<div class="form-group col-md-4">
<label style="color: white; font-weight: bold;">First Name</label>
<input type="text" class="form-control" name="f_name" id="firstname" placeholder="First Name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+" value="<?php echo $_POST["f_name"]?>" required>

</div>

<div class="form-group col-md-4">
<label style="color: white; font-weight: bold;">Middle Name</label>
<input type="text" class="form-control" id="middlename" name="m_name" placeholder="Middle Name" onkeypress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+" value="<?php echo $_POST["m_name"]?>" >

</div>

<div class="form-group col-md-4">
<label style="color: white; font-weight: bold;">Last Name</label>
<input type="text" class="form-control" id="lastname" name="l_name" placeholder="Last Name" onkeypress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+" value="<?php echo $_POST["l_name"]?>" required>


</div>
</div>



<div class="form-group col-md-12">
<label style="color: white; font-weight: bold;" >Email Id</label>
<div class="input-group <?php echo (!empty($email_id_err)) ? 'has-error' : ''; ?>">
<input type="email" class="form-control" id="emailid" name="email_id" placeholder="Email Id" onkeypress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 47 && event.charCode < 58 ) || event.charCode==46 || event.charCode==64" pattern="[a-zA-Z0-9@.]+" value="<?php echo $_POST["email_id"]?>" required>
<span class="input-group-addon"><i class="fa fa-envelope login-user" aria-hidden="true"></i></span>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label style="color: white; font-weight: bold;">Password</label>
<div class="input-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
<input type="password" class="form-control" id="pswd" name="password" placeholder="Password" required>
<span class="input-group-addon"><i class="fa fa-lock login-user"></i></span>    
</div>
</div>

<div class="form-group col-md-6">
<label style="color: white; font-weight: bold;">Confirm Password</label>
<div class="input-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
<input type="password" class="form-control" id="c-pswd" name="confirm_password" placeholder="Confirm password" required>
<span class="input-group-addon"><i class="fa fa-lock login-user"></i></span>
</div>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label style="color: white; font-weight: bold;" >Contact No.</label>
<div class="input-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
<span class="input-group-addon">+91</span>  
<input type="tel" class="form-control" id="phn" name="phone" onkeydown="return ( event.ctrlKey || event.altKey 
|| (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
|| (95<event.keyCode && event.keyCode<106)
|| (event.keyCode==8) || (event.keyCode==9) 
|| (event.keyCode>34 && event.keyCode<40) 
|| (event.keyCode==46) )" placeholder="phone no." maxlength="10" minlength="10" pattern="[0-9]+" value="<?php echo $_POST["phone"]?>"required>

</div>
</div>




<div class="form-group col-md-6">
<label style="color: white; font-weight: bold;">Country</label>
<div class="form-select-list">
<select class="form-control" data-placeholder="Select From Dropdown Menu" name="country" required tab-index="-1" >
<option value="" selected disabled>Please select</option>
<option value="India">India</option>
</select>
</div>

</div>
</div>



<div class="form-row">




<div class="form-group col-md-4">
<label style="color: white; font-weight: bold;">City</label>
<input type="text" name="city" class="form-control" id="city" placeholder="City" onkeypress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" pattern="[a-zA-Z]+" value="<?php echo $_POST["city"]?>" required>

</div>

<div class="form-group col-md-4">
<label style="color: white; font-weight: bold;">State</label>
<div class="form-select-list">
<select class="form-control" data-placeholder="Select From Dropdown Menu" name="state" required tab-index="-1">
<option value="" selected disabled>Please select</option>
<option value="Andaman and Nicobar">Andaman and Nicobar</option>
<option value="Assam">Assam</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Bihar">Bihar</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Daman & Diu">Daman & Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu & Kashmir">Jammu & Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Ladakh">Ladakh</option>
<option value="Lakshwadeep">Lakshwadeep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>                                      
</select>
</div>
</div>


<div class="form-group col-md-4">
<label style="color: white; font-weight: bold;" >pin</label>

<input type="text" name="pin" class="form-control" id="pn" placeholder="pin" onkeydown="return ( event.ctrlKey || event.altKey 
|| (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
|| (95<event.keyCode && event.keyCode<106)
|| (event.keyCode==8) || (event.keyCode==9) 
|| (event.keyCode>34 && event.keyCode<40) 
|| (event.keyCode==46) )" maxlength="6" value="<?php echo $_POST["pin"]?>" required>

</div>
</div>

<center>
<label style="color: white; font-weight: bold; font-size: 15px;">
<input type="checkbox"  style="margin-bottom:10px"> By creating an account you agree to our <a href="#" style="color:blue"> Terms & Privacy</a>
</label>
</center>   

<input name="time" type="text" id="time" value=" <?php date_default_timezone_set("Asia/Calcutta"); echo date("Y/m/d") . "&nbsp;" . date("h:i:sa"); ?> " required hidden >

<input name="mob_verification" type="text" id="mobverif" value=" <?php $rand_otp = mt_rand(100000, 999999); echo $rand_otp; ?>" required hidden >




<div class="form-group">
<center>
<button type="submit" class="btn btn-primary">
<i class="fa fa-sign-in" aria-hidden="true" style="margin-right: 5px;"></i>  
<span style="color:white; font-weight:bold;">Sign Up</span>
</button>
</center>
</div>

</form>
</div>

<div class="col-lg-1">
</div>


<!-- meanmenu JS
============================================ -->
<script src="../cores/js/jquery.meanmenu.js"></script>
<!-- mCustomScrollbar JS
============================================ -->
<script src="../cores/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- sticky JS
============================================ -->
<script src="../cores/js/jquery.sticky.js"></script>
<!-- scrollUp JS
============================================ -->
<script src="../cores/js/jquery.scrollUp.min.js"></script>
<!-- form validate JS
============================================ -->
<script src="../cores/js/jquery.form.min.js"></script>
<script src="../cores/js/jquery.validate.min.js"></script>
<script src="../cores/js/form-active.js"></script>
<!-- counterup JS
============================================ -->
<script src="../cores/js/counterup/jquery.counterup.min.js"></script>
<script src="../cores/js/counterup/waypoints.min.js"></script>
<!-- modal JS
============================================ -->
<script src="../cores/js/modal-active.js"></script>
<!-- icheck JS
============================================ -->
<script src="../cores/js/icheck/icheck.min.js"></script>
<script src="../cores/js/icheck/icheck-active.js"></script>
<!-- peity JS
============================================ -->
<script src="../cores/js/peity/jquery.peity.min.js"></script>
<script src="../cores/js/peity/peity-active.js"></script>
<!-- rounded-counter JS
============================================ -->
<script src="../cores/js/rounded-counter/jquery.countdown.min.js"></script>
<script src="../cores/js/rounded-counter/jquery.knob.js"></script>
<script src="../cores/js/rounded-counter/jquery.appear.js"></script>
<script src="../cores/js/rounded-counter/knob-active.js"></script>
<!-- sparkline JS
============================================ -->
<script src="../cores/js/sparkline/jquery.sparkline.min.js"></script>
<script src="../cores/js/sparkline/sparkline-active.js"></script>
<!-- map JS
============================================ -->
<script src="../cores/js/map/raphael.min.js"></script>
<script src="../cores/js/map/jquery.mapael.js"></script>
<script src="../cores/js/map/france_departments.js"></script>
<script src="../cores/js/map/world_countries.js"></script>
<script src="../cores/js/map/usa_states.js"></script>
<script src="../cores/js/map/map-active.js"></script>
<!-- data table JS
============================================ -->
<script src="../cores/js/data-table/bootstrap-table.js"></script>
<script src="../cores/js/data-table/tableExport.js"></script>
<script src="../cores/js/data-table/data-table-active.js"></script>
<script src="../cores/js/data-table/bootstrap-table-editable.js"></script>
<script src="../cores/js/data-table/bootstrap-editable.js"></script>
<script src="../cores/js/data-table/bootstrap-table-resizable.js"></script>
<script src="../cores/js/data-table/colResizable-1.5.source.js"></script>
<script src="../cores/js/data-table/bootstrap-table-export.js"></script>
<!-- datapicker JS
============================================ -->
<script src="../cores/js/datapicker/bootstrap-datepicker.js"></script>
<script src="../cores/js/datapicker/datepicker-active.js"></script>
<!-- main JS
============================================ -->
<script src="../cores/js/main.js"></script>
<!-- chosen JS
============================================ -->
<script src="../cores/js/chosen/chosen.jquery.js"></script>
<script src="../cores/js/chosen/chosen-active.js"></script>
<!-- select2 JS
============================================ -->
<script src="../cores/js/select2/select2.full.min.js"></script>
<script src="../cores/js/select2/select2-active.js"></script>

<script>
var myVar;

function myFunction() 
{
myVar = setTimeout(showPage, 500);
}

function showPage() 
{
document.getElementById("loader").style.display = "none";
document.getElementById("myDiv").style.display = "block";
}

</script>   


</body>

</html>
<?php include("footer.php"); ?>
