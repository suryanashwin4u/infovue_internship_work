    <?php
    // Include config file
    require_once "cnf.php";
    // Initialize the session
    require_once "sessions.php";
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["bb"]) || $_SESSION["bb"]!== true)
    {
    header("location: index.php");
    exit;
    }

    if(!isset($_SESSION["bb"]) || $_SESSION["mob_status"]!== done)
    {
    header("location: mob_verify.php");
    exit;
    }
    $username = "db1"; 
    $password = "unyjahypa"; 
    $database = "wave_db1"; 
    $mysqli = new mysqli("localhost", $username, $password, $database);
    require_once("inc/dbcontroller.php");
    $db_handle = new DBController();
    $sql1 = "SELECT email_templates.id, email_templates.purpose, email_templates.timestamp, user.f_name FROM `email_templates` LEFT JOIN user ON email_templates.added_by = user.u_id";
    $faq = $db_handle->runQuery($sql1);
    ?>
    <!doctype html>
    <html class="no-js" lang="en">
    <?php include 'functions.php'?>
    <?php include 'variables.php'?>
    <title>Co Emails</title>
    <head>
    <?php include 'header.php'?>
    <script src="nicEdit.js" type="text/javascript"></script>
    <script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>
    <script type="text/javascript" class="init">
    $(document).ready(function() {
    $('#ssss').DataTable({
    "order": [[ 0, "desc" ]]
    } );
    } );
    </script>
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
    </div>
    </div>

    <div style="display:none;" id="myDiv" class="animate-bottom">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Header top area start-->

    <?php include 'inc/common/nav.php' ?>
    <!-- Static Table Start -->
    <div class="static-table-area mg-b-15">
    <div class="container-fluid">
    <div class="row">
    <div class="col-lg-6">
    <div class="sparkline10-list shadow-reset mg-t-30">
    <div class="sparkline10-hd">
    <div class="main-sparkline10-hd">
    <h1>Upload New Emails</h1>

    </div>
    </div>
    <div class="sparkline10-graph">
    <div class="row">
    <div class="col-lg-12" >

    <form role="form" action="gears/insert_emails.php" method="post" enctype="multipart/form-data">
    <input name="timestamp" type="text" id="timestamp" value="<?php date_default_timezone_set("Asia/Calcutta"); echo date("Y/m/d") . "&nbsp;" . date("h:i:sa"); ?>" required hidden>
    <input name="user_id" type="text" id="user_id" value="<?php echo $u_id ?>" required hidden>
    <input class="form-control" placeholder="Purpose" id="purpose" name="purpose" required></br>
    <input class="form-control" placeholder="Subject" id="subject" name="subject" required></br>
    <input class="form-control" placeholder="Input 'vols' or 'institute'" id="type" name="type" required></br>
    
    <textarea class="form-control" placeholder="Body" id="body" name="body" style="width:622px; height:100px; resize: none;"></textarea><br/>

    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>&nbsp Submit</button>
    </form>

    </div>
    </div>
    </div>
    </div>
    </div>

    <div class="col-lg-6">
    <div class="sparkline10-list shadow-reset mg-t-30">
    <div class="sparkline10-hd">
    <div class="main-sparkline10-hd">
    <h1>Uploaded Email's</h1>

    </div>
    </div>
    <div class="sparkline10-graph">
    <table width="100%"  id="ssss" class="table table-striped table-bordered"> 
    <thead>
    <tr>
    <th>Id</th>
    <th>Made By</th>
    <th>Purpose</th>
    <th>Date & Time</th>
    </tr>
    </thead>

    <tbody>


    <?php
    if (is_array($faq) || is_object($faq))
    {
    foreach($faq as $k=>$v) {
    ?>


    <tr>
    <td width="8%">
    <a href="#" onclick="window.open('gears/email_template_update.php?template_id=<?php echo $faq[$k]["id"]; ?>', 
    'ustats', 
    'width=600,height=500'); 
    return false;">
    <?php echo $faq[$k]["id"]; ?></a></td>
    <td width="10%"><?php echo $faq[$k]["f_name"]; ?></td>
    <td width="10%"><?php echo $faq[$k]["purpose"]; ?></td>
    <td width="10%"><?php echo $faq[$k]["timestamp"]; ?></td>
    </tr>


    <?php
    }
    }
    ?>

    </tbody>

    </div>
    </div>
    </div>

    </div>

    </div>
    </div>
    <!-- Static Table End -->

    </div>                  



    <?php include 'footer.php'?>
    </body>

    </html>