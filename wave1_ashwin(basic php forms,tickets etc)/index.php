<?php
require_once "cnf.php";   
$string = $_SERVER['QUERY_STRING'];         //return query string
$string_check = substr($string,0,3);        //return substring starting from 0 till length 3
$string_checker = "url";    
if($string_check == $string_checker)
{
$ref_url = substr($string,4,500);       //return substring starting from 4 till length 500

}
else 
{
$ref_url = '/wave1_ashwin/dash.php';
}
$str_len = strlen($ref_url);                //return length of the string
$fixed_len = 0;
if($str_len == $fixed_len)
{
$page = "wave1_ashwin/dash.php";
}
else
{
$page = "".$ref_url."";
}
//session.gc_maxlifetime specifies the number of seconds after which data will be seen as 'garbage' and potentially cleaned up.
ini_set('session.gc_maxlifetime', 86400); 


//Set the session cookie parameters,Set cookie parameters defined in the php.ini file. The effect of this function only lasts for the duration of the script. Thus, you need to call session_set_cookie_params() for every request and before session_start() is called.

//This function updates the runtime ini values of the corresponding PHP ini configuration keys which can be retrieved with the ini_get()
session_set_cookie_params(86400); 

// session.gc_maxlifetime defines the number of seconds to be elapsed before session data is seen as garbage and cleaned up by the garbage collection process. It represents the minimum amount of time that garbage collection allows an inactive session to exist. session.gc_probability and session.gc_divisor define the probability that the garbage collection process is run on every session initialization.

# Enable session garbage collection with a .01% chance of
# running on each session_start()

ini_set('session.gc_probability', 0);
ini_set('session.gc_divisor', 100);
//Sets the value of the given configuration option. The configuration option will keep this new value during the script's execution, and will be restored at the script's ending.

# Start the session
session_start();


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["bb"]) && $_SESSION["bb"] === true){
header("location:".$page."");
exit;
}

// Define variables and initialize with empty values
$email_id = $password = "";
$email_id_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{

// Check if email_id is empty
if(empty(trim($_POST["email_id"])))
{
$email_id_err = "Please enter email id.";
}
else
{
$email_id = trim($_POST["email_id"]);
$ref_url = trim($_POST["url"]);
}
// Check if password is empty
if(empty(trim($_POST["password"])))
{
$password_err = "Please enter your password";
} 
else
{
$password = trim($_POST["password"]);
}


//trim — Strip whitespace (or other characters) from the beginning and end of a string


// Validate credentials
if(empty($email_id_err) && empty($password_err)){
// Prepare a select statement
$sql = "SELECT u_id, email_id, password, grp, u_stats, zone, l_name, m_name, f_name, mob_status, phone, country, role,basic_status,id_status,pic_status FROM user WHERE email_id = ?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_email_id);

// Set parameters
$param_email_id = $email_id;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Store result
mysqli_stmt_store_result($stmt);

// Check if email_id exists, if yes then verify password
if(mysqli_stmt_num_rows($stmt) == 1){                    
// Bind result variables
mysqli_stmt_bind_result($stmt, $u_id, $email_id, $hashed_password, $grp, $u_stats, $zone, $l_name, $m_name, $f_name, $mob_status, $phone, $country_whole, $role, $basic_status, $id_status, $pic_status);
if(mysqli_stmt_fetch($stmt)){
if(password_verify($password, $hashed_password)){
// Password is correct, so start a new session
ini_set('session.gc_maxlifetime', 86400);
ini_set('session.gc_probability', 0);
ini_set('session.gc_divisor', 100);
// each client should remember their session id for EXACTLY 21 hour
session_set_cookie_params(86400);
session_start();
// Store data in session variables
$_SESSION["bb"]= true;
$_SESSION["u_id"] = $u_id;
$_SESSION["email_id"] = $email_id;    
$_SESSION["grp"] = $grp;
$_SESSION["u_stats"] = $u_stats;
$_SESSION["zone"] = $zone;                          
$_SESSION["m_name"] = $m_name;  
$_SESSION["l_name"] = $l_name;  
$_SESSION["f_name"] = $f_name;  
$_SESSION["mob_status"] = $mob_status;  
$_SESSION["phone"] = $phone;
$_SESSION["country_whole"] = $country_whole;
$_SESSION["role"] = $role;
$_SESSION["basic_status"] = $basic_status;
$_SESSION["id_status"] = $id_status;
$_SESSION["pic_status"] = $pic_status;
$page = "".$ref_url."";


// Redirect user to welcome page
header("location:".$page."");
} else{
// Display an error message if password is not valid
$password_err = "The password you entered was not valid.";
}
}
} else{
// Display an error message if email_id doesn't exist
$email_id_err = "No account found with that email_id.";
}
} else{
echo "Oops! Something went wrong. Please try again later.";
}
}

// Close statement
mysqli_stmt_close($stmt);

}

// Close connection
mysqli_close($link);
}
?>


<?php include("header.php"); ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Supplier LogIn Form</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="../cores/img/favicon.ico">
<!-- Google Fonts
============================================ -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
<!-- Bootstrap CSS
============================================ -->
<link rel="stylesheet" href="../cores/css/bootstrap.min.css">
<!-- Bootstrap CSS
============================================ -->
<link rel="stylesheet" href="../cores/css/font-awesome.min.css">
<!-- adminpro icon CSS
============================================ -->
<link rel="stylesheet" href="../cores/css/adminpro-custon-icon.css">
<!-- meanmenu icon CSS
============================================ -->

<!-- forms CSS
============================================ -->
<link rel="stylesheet" href="../cores/css/form/all-type-forms.css">

<!-- responsive CSS
============================================ -->
<link rel="stylesheet" href="../cores/css/responsive.css">


</head>

<body onload="myFunction()" style="background-image:url('../cores/img/1.jpg'); background-repeat: no-repeat; background-position: center center; background-size: cover; background-attachment: fixed;">



<div class="col-md-7">

</div>


<div class="col-md-3" style=" padding-top:140px;  " style="">

<div class="row" >
<div class="col-lg-12">
<div class="imgcontainer">
<center><img src="../cores/img/bigbeans.png"   alt="bigbeansimage" class="img-responsive" width="250px" height="80px"></center>
</div>
<br>

<center><h3 style="color: white; font-weight: bold; font-size:30px;">Supplier Login Form</h3></center>
<br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<div class="form-group-inner <?php echo (!empty($email_id_err)) ? 'has-error' : ''; ?>">
<div class="row">
<div class="col-lg-4">
<label class="login2" style="font-size: 20px; color:white; font-weight: bold;">Email id:</label>
</div>
<div class="col-lg-8">
<input type="email" name="email_id" value="<?php echo $email_id; ?>" class="form-control" placeholder="Enter Email Id here" />
<span class="help-block"><?php echo $email_id_err; ?></span>
</div>
</div>
</div>

<br>


<div class="form-group-inner <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" >
<div class="row">
<div class="col-lg-4">
<label class="login2" style="font-size: 20px;color:white; font-weight: bold;">Password:</label>
</div>
<div class="col-lg-8">
<input type="password"  name="password" class="form-control" placeholder="Enter password here" />
<span class="help-block"><?php echo $password_err; ?></span>
</div>
</div>
</div>


<br>


<div class="login-btn-inner">
<div class="row">
<div class="col-lg-4">

</div>

<div class="col-lg-8">
<div class="i-checks">
<label>
<input type="checkbox" name="#"><i class="" style="color:white; font-weight: bold;"> Remember me</i> </label>
</div>
</div>

</div>
<br>
<div class="row">
<div class="col-lg-4"></div>
<div class="col-lg-8">
<div class="login-horizontal">
<input type="text" name="url" id="url" value="/wave1_ashwin/dash.php" placeholder="url" hidden>
<button class="btn btn-sm btn-primary login-submit-cs" type="submit" ><span style="color:white; font-weight: bold;">Log In</span></button>
</div>
</div>

</div>
<br>
</div>

<?php 

if( $_GET["ref"] == reg_success)

echo '<div class="alert alert-success alert-st-one alert-st-bg alert-st-bg11" role="alert">
<span class="adminpro-icon adminpro-checked-pro admin-check-pro admin-check-pro-clr admin-check-pro-clr11"></span>
<p class="message-mg-rt"><strong>Well done!</strong> You are Signed Up. Login into DashBoard.</p>
</div>'
?>

</form>
</div>
</div>
</div>
</div>
</div>

<div class="col-md-2">
</div>

<script>
var myVar;

function myFunction() {
myVar = setTimeout(showPage, 1);
}

function showPage() {
document.getElementById("loader").style.display = "none";
document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>
<?php include("footer.php"); ?>