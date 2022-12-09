<?php
session_start();
error_reporting(0);
include('includes/config.php');
include_once 'Admin.php';
if(strlen($_SESSION['login'])==0)
{ 
  header('location:homepage/index.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>VGI - Library</title>
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
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>

<!--LOGIN PANEL START-->           
<br><br><br><div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
<h3>Upload Notice Form</h3>
</div>
<div class="panel-body">
<form role="form" method="post" action="NoticeAction.php" enctype="multipart/form-data">
  <div class="form-group">
    <label>Upload Notice</label>
    <input class="form-control" type="file" name="photo" autocomplete="off" required  />
  </div>
  <button type="submit" name="request" class="btn btn-info fd_btn">Submit</button> 
</form>
<?php
   if(isset($_GET["g"]))
      echo "Notice Successfully Uploaded....";
?>
</div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->        


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
