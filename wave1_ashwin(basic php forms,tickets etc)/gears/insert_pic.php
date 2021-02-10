<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["bb"]) || $_SESSION["bb"] !== true){
    header("location: ../index.php");
    exit;
}
$photo_status = htmlspecialchars($_POST["photo_status"]); 
$u_id = htmlspecialchars($_POST["u_id"]); 

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$photo_status  = mysqli_real_escape_string($link, $_REQUEST["photo_status"]);
$u_id  = mysqli_real_escape_string($link, $_REQUEST["u_id"]);




if(isset($_POST["upload_pic"])){
 
  $target_dir = "../data/pro_pics/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $name = $u_id . ".". $imageFileType ;

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $sql = "UPDATE basic_details SET photo_link= ('".$name."'), photo_status= ('".$photo_status."') WHERE u_id = '$u_id'";

     $sql2="UPDATE user SET pic_status='done'  WHERE u_id='$u_id'";
  
     // Upload file
     move_uploaded_file($_FILES["file"]["tmp_name"],$target_dir.$name);
     

if(mysqli_query($link, $sql)){
    if(mysqli_query($link, $sql2)){
        $_SESSION["pic_status"]="done";
    header("location: ../dash.php");
    }
} 

else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

  }
 
}
?>