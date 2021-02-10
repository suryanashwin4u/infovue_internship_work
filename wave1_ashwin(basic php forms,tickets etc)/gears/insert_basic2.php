<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["bb"]) || $_SESSION["bb"] !== true){
    header("location: index.php");
    exit;
}

$u_id=htmlspecialchars($_GET["u_id"]);
$firm=htmlspecialchars($_GET["firm"]);
$investment_plan=htmlspecialchars($_GET["investment_plan"]);
$business_help=htmlspecialchars($_GET["business_help"]);
$alt_phone = htmlspecialchars($_GET["alt_phone"]);
$c_products=htmlspecialchars($_GET["c_products"]);
$c_principals=htmlspecialchars($_GET["c_principals"]);
$man_supervisor=htmlspecialchars($_GET["man_supervisor"]);
$man_staff=htmlspecialchars($_GET["man_staff"]);
$man_worker=htmlspecialchars($_GET["man_worker"]);
$turnover_month=htmlspecialchars($_GET["turnover_month"]);
$annual_income=htmlspecialchars($_GET["annual_income"]);
$office=htmlspecialchars($_GET["office"]);
$location=htmlspecialchars($_GET["location"]);
$floor_area=htmlspecialchars($_GET["floor_area"]);
$own_rental=htmlspecialchars($_GET["own_rental"]);
$fmcg=htmlspecialchars($_GET["fmcg"]);
$fproduct=htmlspecialchars($_GET["fproduct"]);
$since_year=htmlspecialchars($_GET["since_year"]);
$fmonthly=htmlspecialchars($_GET["fmonthly"]);
$farea_covered=htmlspecialchars($_GET["farea_covered"]);
$fname_transport=htmlspecialchars($_GET["fname_transport"]);
$retail_outlet=htmlspecialchars($_GET["retail_outlet"]);
$salesmen_employed=htmlspecialchars($_GET["salesmen_employed"]);
$banker_name=htmlspecialchars($_GET["banker_name"]);
$ifsc_code=htmlspecialchars($_GET["ifsc_code"]);
$baddress=htmlspecialchars($_GET["baddress"]);
$income_source=htmlspecialchars($_GET["income_source"]);
$amt_funds=htmlspecialchars($_GET["amt_funds"]);
$source_funds=htmlspecialchars($_GET["source_funds"]);
$interest=htmlspecialchars($_GET["interest"]);
$ideal_franchise=htmlspecialchars($_GET["ideal_franchise"]);
$reference_name=htmlspecialchars($_GET["reference_name"]);
$reference_add=htmlspecialchars($_GET["reference_add"]);
$reference_contact=htmlspecialchars($_GET["reference_contact"]);
$t_c=htmlspecialchars($_GET["t_c"]);
date_default_timezone_set("Asia/Calcutta");



/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 
 
// Check connection
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$u_id=mysqli_real_escape_string($link, $_REQUEST["u_id"]);
$firm=mysqli_real_escape_string($link, $_REQUEST["firm"]);
$investment_plan=mysqli_real_escape_string($link, $_REQUEST["investment_plan"]);
$business_help=mysqli_real_escape_string($link, $_REQUEST["business_help"]);
$alt_phone = mysqli_real_escape_string($link, $_REQUEST["alt_phone"]);
$c_products=mysqli_real_escape_string($link, $_REQUEST["c_products"]);
$c_principals=mysqli_real_escape_string($link, $_REQUEST["c_principals"]);
$man_supervisor=mysqli_real_escape_string($link, $_REQUEST["man_supervisor"]);
$man_staff=mysqli_real_escape_string($link, $_REQUEST["man_staff"]);
$man_worker=mysqli_real_escape_string($link, $_REQUEST["man_worker"]);
$turnover_month=mysqli_real_escape_string($link, $_REQUEST["turnover_month"]);
$annual_income=mysqli_real_escape_string($link, $_REQUEST["annual_income"]);
$office=mysqli_real_escape_string($link, $_REQUEST["office"]);
$location=mysqli_real_escape_string($link, $_REQUEST["location"]);
$floor_area=mysqli_real_escape_string($link, $_REQUEST["floor_area"]);
$own_rental=mysqli_real_escape_string($link, $_REQUEST["own_rental"]);
$fmcg=mysqli_real_escape_string($link, $_REQUEST["fmcg"]);
$fproduct=mysqli_real_escape_string($link, $_REQUEST["fproduct"]);
$since_year=mysqli_real_escape_string($link, $_REQUEST["since_year"]);
$fmonthly=mysqli_real_escape_string($link, $_REQUEST["fmonthly"]);
$farea_covered=mysqli_real_escape_string($link, $_REQUEST["farea_covered"]);
$fname_transport=mysqli_real_escape_string($link, $_REQUEST["fname_transport"]);
$retail_outlet=mysqli_real_escape_string($link, $_REQUEST["retail_outlet"]);
$salesmen_employed=mysqli_real_escape_string($link, $_REQUEST["salesmen_employed"]);
$banker_name=mysqli_real_escape_string($link, $_REQUEST["banker_name"]);
$baddress=mysqli_real_escape_string($link, $_REQUEST["baddress"]);
$income_source=mysqli_real_escape_string($link, $_REQUEST["income_source"]);
$amt_funds=mysqli_real_escape_string($link, $_REQUEST["amt_funds"]);
$source_funds=mysqli_real_escape_string($link, $_REQUEST["source_funds"]);
$interest=mysqli_real_escape_string($link, $_REQUEST["interest"]);
$ideal_franchise=mysqli_real_escape_string($link, $_REQUEST["ideal_franchise"]);
$reference_name=mysqli_real_escape_string($link, $_REQUEST["reference_name"]);
$reference_add=mysqli_real_escape_string($link, $_REQUEST["reference_add"]);
$reference_contact=mysqli_real_escape_string($link, $_REQUEST["reference_contact"]);
$t_c=mysqli_real_escape_string($link, $_REQUEST["t_c"]);


$sql="UPDATE basic_details SET Organization='$firm' , investment_plan='$investment_plan' , business_help ='$business_help' , alt_phone='$alt_phone' , c_products='$c_products' , c_products='$c_products' , c_principals='$c_principals' , man_supervisor='$man_supervisor' , man_staff='$man_staff' , man_worker='$man_worker' , turnover_month='$turnover_month' , annual_income='$annual_income' , office='$office' , location='$location' , floor_area='$floor_area' ,  own_rental='$own_rental' , fmcg='$fmcg' , fproduct='$fproduct' , since_year='$since_year' , fmonthly='$fmonthly' , since_year='$since_year' , fmonthly='$fmonthly' ,  farea_covered='$farea_covered' , fname_transport='$fname_transport' , retail_outlet='$retail_outlet' ,  salesmen_employed='$salesmen_employed' ,  banker_name='$banker_name' , baddress='$baddress' , income_source='$income_source' , amt_funds='$amt_funds' , source_funds='$source_funds' , interest='$interest' , ideal_franchise='$ideal_franchise' , reference_name='$reference_name' ,  reference_add='$reference_add' ,  reference_contact='$reference_contact' ,  t_c='$t_c' WHERE u_id='$u_id'";

$sql2="UPDATE user SET basic_status='done' WHERE u_id='$u_id'";

if(mysqli_query($link, $sql))
{
	if(mysqli_query($link, $sql2))
	{
	    $_SESSION["basic_status"]='done';
    header("location: ../dash.php");
}
} 

else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>