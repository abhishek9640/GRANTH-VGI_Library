<?php
session_start();
error_reporting(0);
// include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:http://localhost/Library/library/homepage/index.php');
}
else{
  $collegeid=$_SESSION['collegeid'];?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GRANTH - VGI Library</title>
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
 <br><br><br><div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
Complaint
</div>
<div class="panel-body">
<form action="ComplaintAction.php" method="post" onsubmit="return validateMe()">


<div class="form-group">
<label>College ID</label>
<input class="form-control" type="text" name="collegeid" autocomplete="off" required  />
</div>
<div class="form-group">
<label>Subject</label>
<input class="form-control" type="text" name="subject" autocomplete="off" required  />
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Write your Complaint here</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="msg"></textarea>
</div><br>

 <button type="submit"  value="Raise Complaint" class="btn btn-danger fd_btn">Raise Complaint</button> 
</form>
 </div>
</div>
</div>
</div>
  <?php
     if(isset($_GET["s"]))
    
         echo "Your Complaint Successfully Registered, We Will Come Soon To You.....!!";
  ?>

<!---LOGIN PABNEL END-->        


<!-- <?php include('includes/footer.php');?> -->
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