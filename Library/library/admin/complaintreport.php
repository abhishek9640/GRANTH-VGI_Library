<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:http://localhost/Library/library/homepage/index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
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
      <!------MENU SECTION START-->
<?php include('includes/header.php');
  include_once '../Admin.php'; ?>
<table class="table table-striped table-hover">
    <tr>
        <th>Sno </th><th>College Id</th><th>Subject</th><th>Message</th><th>Complaint Date</th><th>Complaint Status</th><th>Resolve Message</th><th>Resolve Date</th><th>Action</th>
    </tr>
    <?php
       $x = $o->getAllComplaintsReport();
       for($i=0;$i<mysqli_num_rows($x);$i++)
       {
          echo "<tr>";
          $rs = mysqli_fetch_row($x);
          foreach ($rs as $n)
              echo "<td>$n</td>";
          echo "<td><a href=UpdComplaints.php?id=$rs[0]><span class='glyphicon glyphicon-edit'></span></a> | <a href=DeleteComplaint.php?n=$rs[0]><span class='glyphicon glyphicon-trash'></span</a></td>";
          echo "</tr>";
          
       }
    ?>
</table>
<?php
  if(isset($_GET["s"]))
      echo "Ur Complaints Successfully Deleted...";
  if(isset($_GET["v"]))
      echo "Complaints Successfully Resolved...";
  include "Footer.php";
?>

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