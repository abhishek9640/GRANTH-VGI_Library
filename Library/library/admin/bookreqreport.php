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
<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Id</th>
                                            <th>Student Name</th>
                                            <th>Email Id</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Book Name</th>
                                            <th>Request Id</th>
                                            <!-- <th>Status</th> -->
                                            <th></th>
                                            <th>Request DateTime</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php include('includes/header.php');
  include_once '../Admin.php';
    $x = $o->getBookRequest();
    for($i=0;$i<mysqli_num_rows($x);$i++)
    { 
     $rs = mysqli_fetch_row($x);
     echo "<tr>";
     foreach($rs as $n)
       echo "<td>$n</td>";
     echo "<td><a href=Approve.php?n=$rs[0]&email=$rs[3]>Issued</a> | <a href=Reject.php?n=$rs[0]&email=$rs[3]>Reject</a></td>";
     echo "</tr>";
    }
  ?>
  </table>
  <?php
     if(isset($_GET["j"]))
       echo "Book Successfully Issued to Students.";

       if(isset($_GET["r"]))
       echo "Book request rejected.";
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