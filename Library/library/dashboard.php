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
    <title>GRANTH  - VGI Library</title>
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
  include_once 'Admin.php';
  $collegeid=$_SESSION['collegeid']?>

<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">   
              <?php
$collegeid=$_SESSION['collegeid'];
$x = $o->getNameMailid($collegeid); 
$rs = mysqli_fetch_row($x);
  if (isset($rs[0])) { ?>  
              
                <h4 class="header-line" align="center"> Welcome ,  <?php echo $rs[0]; ?></h4>
                
                            </div>

        </div>
            <?php }?> 
             <div class="row">


<a href="listed-books.php">
<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
 <div class="alert alert-success back-widget-set text-center">
 <i class="fa fa-book fa-5x"></i>
<?php 
$sql ="SELECT id from tblbooks ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$listdbooks=$query->rowCount();
?>
<h3><?php echo htmlentities($listdbooks);?></h3>
Books Listed
</div></div></a>



             



<a href="issued-books.php">
<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
<div class="alert alert-warning back-widget-set text-center">
<i class="fa fa-recycle fa-5x"></i>
<?php 
$rsts=0;
$collegeid=$_SESSION['collegeid'];
$sql2 ="SELECT sno from tblissuedbook where collegeid=:collegeid and remarks='ISSUED'";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':collegeid',$collegeid,PDO::PARAM_STR);
//$query2->bindParam(':rsts',$rsts,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$returnedbooks=$query2->rowCount();
?>
<h3><?php echo htmlentities($returnedbooks);?></h3>
 Books Not Returned Yet <!--This area need to be worked -->
</div></div></a>



<a href="UserReqBooks.php">
<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
<div class="alert alert-success back-widget-set text-center">
<i class="fa fa-book fa-5x"></i>
<?php 
$rsts=0;
$sql2 ="SELECT sno from tblissuedbook where collegeid=:collegeid and remarks='RETURNED'";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':collegeid',$collegeid,PDO::PARAM_STR);
//$query2->bindParam(':rsts',$rsts,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$returnedbooks=$query2->rowCount();
?>
<h3><?php echo htmlentities($returnedbooks);?></h3>

Returned Books
</div></div></a>



<a href="UserNoticeReport.php">
<div class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
 <div class="alert alert-success back-widget-set text-center">
 <i class="fa fa-file-archive-o fa-5x"></i>
<?php 
$sql ="SELECT id from tblnotice ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$listdnotice=$query->rowCount();
?>
<h3><?php echo htmlentities($listdnotice);?></h3>
Notices
</div></div></a>




        </div>    
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
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
