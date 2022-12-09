<?php
session_start();
error_reporting(0);
include('includes/config.php');
include_once '../Admin.php';
if(strlen($_SESSION['login'])==0)
{ 
  header('location:../homepage/index.php');
}
else{
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
    <title>GRANTH | Admin Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div class="panel-body">
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
  <div class="row panel-body" style="margin-top:20px;"></div>
  <?php
    $start = 0;
    $end = 1;
    $flag = 0;
    include_once "../Admin.php";
    $x = $o->getNotices();
    for($i = 0;$i<mysqli_num_rows($x);$i++)
    {
      if($start%4==0)
      {
         $flag =1;
         echo "<div class='row'>";
      }
      $rs = mysqli_fetch_row($x);
      echo "<div class='col-md-3 col-lg-3 col-sm-6 col-xs-12'>";     
      echo "<a href=Notice.php?n=$rs[0]><img src=Photo.php?n=$rs[0] class='img-thumbnail' style='height:180px;width:100%;'></a>";
      echo "Notice on : $rs[1] <br>";
      echo "<a href=DelNotice.php?n=$rs[0]><b class='btn btn-primary'>Delete Notice</b></a>";
      echo "</p></div>";
      if($end % 4==0)
      {
         echo "</div>";
         $flag = 0;
      }
      $start++;
      $end++;
    }
    if($flag==1)
       echo "</div>";
    if(isset($_GET["s"]))
       echo "Notice Successfully Deleted..";   
?>
<?php include('includes/footer.php');?> 
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>


