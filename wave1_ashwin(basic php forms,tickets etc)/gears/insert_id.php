<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["bb"]) || $_SESSION["bb"] !== true){
    header("location: ../index.php");
    exit;
}

$data_status = htmlspecialchars($_GET["data_status"]); 
$u_id = htmlspecialchars($_GET["u_id"]); 
$document_type = htmlspecialchars($_GET["document_type"]);
$doc_no = htmlspecialchars($_GET["doc_no"]);

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "db1", "unyjahypa", "wave_db1"); 
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$data_status  = mysqli_real_escape_string($link, $_REQUEST['data_status']);
$u_id  = mysqli_real_escape_string($link, $_REQUEST['u_id']);
$document_type  = mysqli_real_escape_string($link, $_REQUEST['document_type']);
$doc_no  = mysqli_real_escape_string($link, $_REQUEST['doc_no']);




if(isset($_POST['upload_id'])){
 
  $target_dir = "../data/id_pics/";
  $target_file = $target_dir . basename($_FILES['file']['name']);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $name = $u_id . ".". $imageFileType ;

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $sql = "UPDATE `basic_details` SET `id_link`= ('".$name."'), `data_status`= ('".$data_status."'), `doc_no`='$doc_no',`document_type`='$document_type' WHERE `u_id` = '$u_id'";
     $sql2="UPDATE `user` SET id_status='done' WHERE u_id='$u_id'";
     mysqli_query($link, $sql);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
if(mysqli_query($link, $sql)){
     if(mysqli_query($link, $sql2)){
         $_SESSION["id_status"]='done';
    header("location: ../basic_details_pic.php");
     }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

  }
 
}
?>