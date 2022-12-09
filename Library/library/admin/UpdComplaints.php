
<!-- <div style="margin-top:5px">
  <img src="images/complaints.png" style="width:100%;height:150px;margin-top:0px;border-radius:2px;box-shadow:0px 0px 1px black" />
</div>

<div style="width:100%;margin:auto;min-height:100px;border-radius:2px ;box-shadow:0px 0px 1px black; padding:20px;">
<table width="100%" class="table">  
<tbody><tr>  
<td width="50%"> 
<div style="width:100%;min-height:400px;color:Black   ">
<p style="margin-left:4%;margin-right:4%">
      <img src="images/complaints.jpg" style="height:120px;width:180px;"></p>
            <p style="margin-left:46%;margin-top:-100px;margin-right:4%;  font-weight: bold;">Vishveshwarya Group of Institutions (VGI) <br>Ghaziabad-Bulandshahar G.T. Road, <br>NH-91 Greater Noida Phase-II, <br>Gautam Buddha Nagar, UP-203207 <br>
</p><br>
     
    <p style="margin-left:6%;margin-right:8%;">
     <b> For Enquiry</b> : +91-9990046906<br><br>
     <b>Office No</b> : +91-9990046906<br/><br/>
     <b>For Query :</b> +91-9990046906<br><br>
     <b> For Advertisement : </b>yourmailid@gmail.com<br><br>
     <b>  Email :</b> yourmailid@gmail.com<br><br>
     <b>  Website:</b><a href="#" target="_blank" class="home"> www.yoururl.com </a>    
    </p>
    <p style="margin-left:6%;margin-right:4%">You Can Send us your views and your queries about our company:</p>
 </div> 
</td>
<td width="50%">
<div style="width:100%;min-height:400px;color:Black  ">
<form action="UpdComplaintAction.php" method="post" onsubmit="return validateMe()">
 <table class="table" width="100%"> -->

 <?php
session_start();
error_reporting(0);
// include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:http://localhost/php_programs/Library/library/homepage/index.php');
}
else{
  $collegeid=$_SESSION['collegeid'];
  include_once '../Admin.php';?>
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
<?php
    $sno = $_GET["id"];
    include_once "../Admin.php";
    $x = $o->getComplaint($sno);
    $rs = mysqli_fetch_row($x);
 ?>
<form action="UpdComplaintAction.php" method="post" onsubmit="return validateMe()">

<div class="form-group">
<label>SNo</label>
<input class="form-control" type="number" name="sno" value='<?php echo "$rs[0]"; ?>' autocomplete="off" required  />
</div>
<div class="form-group">
<label>College ID</label>
<input class="form-control" type="text" name="collegeid"value='<?php echo "$rs[1]"; ?>' autocomplete="off" required  />
</div>
<div class="form-group">
<label>Subject</label>
<input class="form-control" type="text" name="subject" value='<?php echo "$rs[2]"; ?>' autocomplete="off" required  />
</div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Your Complaint</label>
  <input class="form-control" type="text" name="msg" value='<?php echo "$rs[3]"; ?>' rowspan="3" />
</div><br>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Resolve Message</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="rmsg"></textarea>
</div><br>
 <button type="submit"  value="Resolve Complaint" class="btn btn-info fd_btn">Resolve Complaint</button> 
</form>
 </div>
</div>
</div>
</div>
  <?php
     if(isset($_GET["v"]))
    
         echo " Complaint Successfully Resolved.....!!";
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
 
