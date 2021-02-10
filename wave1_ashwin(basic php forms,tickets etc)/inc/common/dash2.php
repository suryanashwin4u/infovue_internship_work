<div class="container-fluid">
<div class="row">

    <?php
    $lp=LP;
    $rp=RP;?>

<div class="col-lg-9">

<?php
require_once("inc/dbcontroller.php");

$db_handle = new DBController();
$sql2001 = "SELECT * FROM dash_tbl WHERE type='$lp'";
$faq2001 = $db_handle->runQuery($sql2001); 

if ((is_array($faq2001) || is_object($faq2001)))
{
foreach($faq2001 as $k2001=>$v2001) 
{
{
echo 
'<div style="margin-top:0px;margin-bottom:20px" class="sparkline13-list shadow-reset mg-tb-30">
<div class="sparkline13-hd">
<div class="main-sparkline13-hd">
<h1>'.$faq2001[$k2001]["title"].'</h1>
<div class="sparkline13-outline-icon">
</div>
</div>
</div>';

$snip=$faq2001[$k2001]["data"];

include "inc/snip/$snip";

}
}
}
?>
</div>
<div class="col-lg-3">
<?php 
require_once("inc/dbcontroller.php");
$db_handle = new DBController();
$sql2002 = "SELECT * FROM dash_tbl  WHERE type='$rp'";
$faq2002 = $db_handle->runQuery($sql2002); 
if ((is_array($faq2002) || is_object($faq2002)))
{
foreach($faq2002 as $k2002=>$v2002) {
{
echo 
'<div style="margin-top:0px; margin-bottom:20px;" class="income-dashone-total shadow-reset nt-mg-b-30">
<div class="income-title">
<div class="main-income-head">
<h2>'.$faq2002[$k2002]["title"].'</h2>
</div>
</div>';

$snip1=$faq2002[$k2002]["data"];
include "inc/snip/$snip1";
}
}
}
?>
</div>
</div>
</div>