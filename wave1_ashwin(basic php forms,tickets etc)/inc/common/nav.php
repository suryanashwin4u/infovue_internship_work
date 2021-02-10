<div class="wrapper-pro" >
<div class="left-sidebar-pro">
<nav id="sidebar">
<div class="sidebar-header">
<strong>Bb+</strong>
</div>
<div class="left-custom-menu-adp-wrap" >
<ul class="nav navbar-nav left-sidebar-menu-pro" >
<?php 
$vol_id2 = htmlspecialchars($_SESSION["u_id"]);
$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM basic_details WHERE u_id LIKE '%$vol_id2%'";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

$field51name = $row["data_status"];
$field52name = $row["photo_status"];

if ($row>0) { 
    if ($field51name =="part_filled" && $field52name == "") 
    {
       echo '<li class="nav-item" style="background-color:orange">
             <a href="#" data-toggle="dropdown" title="Basic Details" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
             <i class="fa big-icon fa-edit"></i> 
             <span class="mini-dn">Basic Details</span> 
             <span class="indicator-rifa big-iconght-menu mini-dn">
             <i class="fa indicator-mn fa-angle-left"></i>
             </span>
             </a>                            
            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
            <a href="basic_details_upload.php" class="dropdown-item">Upload Id</a>
            <a href="basic_details_pic.php" class="dropdown-item">Upload photo</a> 
            </div>
            </li>';
    }
    else{
        if ($field51name == "part_filled_id" && $field52name == "") {
       echo '
       <li class="nav-item" style="background-color:orange">
       <a href="#" data-toggle="dropdown" title="Basic Details" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
       <i class="fa big-icon fa-edit"></i> 
       <span class="mini-dn">Basic Details</span> 
       <span class="indicator-rifa big-iconght-menu mini-dn">
       <i class="fa indicator-mn fa-angle-left">
       </i>
       </span>
       </a>                            
       <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
       <a href="basic_details_pic.php" class="dropdown-item">Upload photo</a> 
       </div>
       </li>';
        }
        else{
            if ($field51name == "part_filled" && $field52name == "photo_filled") {
            echo '
            <li class="nav-item" style="background-color:orange"><a href="#" data-toggle="dropdown" title="Basic Details" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
            <i class="fa big-icon fa-edit"></i> 
            <span class="mini-dn">Basic Details</span> <span class="indicator-rifa big-iconght-menu mini-dn">
            <i class="fa indicator-mn fa-angle-left">
            </i></span></a>                            
            <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
            <a href="basic_details_upload.php" class="dropdown-item">Upload Id</a>
            </div>
            </li>';
        }
        else{
            if ($field51name == "part_filled_id" && $field52name == "photo_filled") {
            echo '';
        }
        }    
        }
    }

}
else {
    echo '<li class="nav-item">
          <a href="#" data-toggle="dropdown" title="Basic Details" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
          <i class="fa big-icon fa-edit"></i> 
          <span class="mini-dn">Basic Details</span> 
          <span class="indicator-rifa big-iconght-menu mini-dn">
          <i class="fa indicator-mn fa-angle-left">
          </i></span></a>                            
          <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
          <a href="basic_details1.php" class="dropdown-item">Basic Details</a>
          </div>
          </li>';
}
?>

<?php
require_once("inc/dbcontroller.php");
$db_handle = new DBController();
$sql1000 = "SELECT * FROM nav_col_tbl WHERE status = 'enabled' ORDER BY nav_col_tbl.level ASC ";
$faq1000 = $db_handle->runQuery($sql1000);
foreach($faq1000 as $k1000=>$v1000) {
?>
<li class="nav-item">
<a href="<?php echo $faq1000[$k1000]["data"]; ?>" aria-expanded="false" class="nav-link" title="<?php echo $faq1000[$k1000]["name"]; ?>" 
    <?php echo $faq1000[$k1000]["extra_element"]; ?>>
    <i class="<?php echo $faq1000[$k1000]["icon"]; ?>"></i> 
    <span class="mini-dn"><?php echo $faq1000[$k1000]["u_id"]; ?></span> 
    <span class="indicator-right-menu mini-dn">
        <i class="fa indicator-mn fa-angle-left">
        </i></span></a>
<div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
<?php
$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1"; 
$mysqli = new mysqli("localhost", $username, $password, $database);
$type_nav = $faq1000[$k1000]["id"];
require_once("inc/dbcontroller.php");
$db_handle = new DBController();
$sql1001 = "SELECT * FROM nav_tbl WHERE type = '$type_nav' AND status = 'enabled' ORDER BY id ASC";
$faq1001 = $db_handle->runQuery($sql1001);
 if ((is_array($faq1001) || is_object($faq1001)))
{
foreach($faq1001 as $k1001=>$v1001) {
$data_navsub = $faq1001[$k1001]["data"]; 
$title_navsub = $faq1001[$k1001]["title"]; 
echo '<a href="'.$data_navsub.'" class="dropdown-item">'.$title_navsub.'</a>';
}
}
?>
</div>
</li>
<?php
}
?>
</ul>
</div>
</nav>
</div>
        <!-- Header top area start-->
        <div class="content-inner-all">
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                
                                <div class="admin-logo logo-wrap-pro">
                                    <a href="#">
                                    <img src="../cores/img/bigbeans.png" alt="bigbeans" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header top area end-->              
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
<ul class="mobile-menu-nav">
<?php 
$vol_id2 = htmlspecialchars($_SESSION["u_id"]);
$username = "db1"; 
$password = "unyjahypa"; 
$database = "wave_db1"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM basic_details WHERE u_id = '$vol_id2'";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();
$field51name = $row["data_status"];
$field52name = $row["photo_status"];
if ($row>0) { 
    if ($field51name == "part_filled" && $field52name == "") {
       echo '<li>
            <a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Basic Details <span class="admin-project-icon adminpro-icon adminpro-down-arrow">
            </span>
            </a>
             <ul id="Miscellaneousmob" class="collapse dropdown-header-top">                          
             <li>
             <a href="basic_details_upload.php" class="dropdown-item">Upload ID</a>
             </li>
             <li>
             <a href="basic_details_pic.php" class="dropdown-item">Upload photo</a>
             </li>
             </ul>
             </li>';
    }
    else{
        if ($field51name == "part_filled_id" && $field52name == "") 
        {
       echo '<li>
             <a style="background-color:orange" data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Basic Details <span class="admin-project-icon adminpro-icon adminpro-down-arrow">
             </span>
             </a>
            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
            <li><a href="basic_details_pic.php" class="dropdown-item">Upload photo</a>
            </li>
            </ul>
            </li>';
        }
        else{
            if ($field51name == "part_filled" && $field52name == "photo_filled") 
            {
            echo '<li>
                  <a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Basic Details 
                  <span class="admin-project-icon adminpro-icon adminpro-down-arrow">
                  </span>
                  </a>
                  <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                  <li><a href="basic_details_upload.php" class="dropdown-item">Upload ID</a>
                  </li>
                  </ul>
                  </li>';
        }
        else{
            if ($field51name == "part_filled_id" && $field52name == "photo_filled") {
            echo '';
        }
        }    
        }
    }
}
else {
    echo '<li>
          <a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Basic Details<span class="admin-project-icon adminpro-icon adminpro-down-arrow">
          </span></a>
          <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
          <li><a href="basic_details1.php" class="dropdown-item">Basic details 1</a>
          </li>
          </ul>
          </li>';
}
?>
<?php
foreach($faq1000 as $k1000=>$v1000) 
{
?>
<li>
<a data-toggle="collapse" data-target="#demo<?php echo $k1000 ?>" href="<?php echo $faq1000[$k1000]["data"]; ?>">
<?php echo $faq1000[$k1000]["name"]; ?>
<span class="admin-project-icon adminpro-icon adminpro-down-arrow">
</span>
</a>
 
<ul id="demo" class="collapse dropdown-header-top">
                                                
<?php
$type_nav = $faq1000[$k1000]["id"];
require_once("inc/dbcontroller.php");
$db_handle = new DBController();
$sql1002 = "SELECT * FROM nav_tbl WHERE  type = '$type_nav' AND status = 'enabled' ORDER BY id ASC";
$faq1002 = $db_handle->runQuery($sql1002);
 if ((is_array($faq1002) || is_object($faq1002)))
{
foreach($faq1002 as $k1002=>$v1002) {
$data_navsub = $faq1002[$k1002]["data"]; 
$title_navsub = $faq1002[$k1002]["title"]; 
echo '<li>
      <a href="'.$data_navsub.'" class="dropdown-item">'.$title_navsub.'</a>
      </li>';
}
}
?>

</li>
</ul>
</li>

<?php
}
?>
                                    
                                    
</ul>
</nav>
</div>
</div>
</div>
</div>
</div>

<!-- Mobile Menu end -->