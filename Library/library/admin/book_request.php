<script src="../Ajax.js"></script>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
include_once '../Admin.php';
if(strlen($_SESSION['login'])==0)
{ 
  header('location:http://localhost/php_programs/Library/library/homepage/index.php');
}
else{
    
if(isset($_POST['request']))
{
 $fname=$_POST['fname'];
 $collegeid=$_POST['collegeid'];
 $email=$_POST['email'];
 $cat=$_POST['cat']; 
 $author=$_POST['author']; 
 $book=$_POST['book']; 
 $otp = random_int(100000, 999999);
 $x = $o->addBookRequest($collegeid,$fname,$email,$cat,$author,$book,$otp);
 echo '<script>alert("Your request for following books has been sent to Librarian and ur OTP is - '.$otp.'")</script>';
}
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
<h3>Book Request Form</h3>
</div>
<div class="panel-body">
<form role="form" method="post" name="bookrequest" action="book_request.php">



<div class="form-group">
<label>Name</label>
<input class="form-control" type="text" name="fname"  autocomplete="off" required  />
</div>

<div class="form-group">
<label>College ID</label>
<input class="form-control" type="text" name="collegeid" autocomplete="off" required  />
</div>
<div class="form-group">
<label>Email</label>
<input class="form-control" type="email" name="email"  autocomplete="off" required  />
</div>
<div class="form-group">
<label>Choose Books</label><br>
Choose Book Category <select class="form-control" type="text" name="cat" required onchange="view(this)">
                       <option value="">Choose Book Category </option>
         <?php   
              include_once '../Admin.php';
              $x = $o->bookCategory();
              for($i=0;$i<mysqli_num_rows($x);$i++)
              {
                 $rs = mysqli_fetch_row($x);
                 echo "<option value='$rs[0]'>$rs[1]</option>"; 
              }
       ?>
       </select>
Choose Author <select class="form-control" id=auth name="author" onchange="viewBook(cat,this)">
         <option value=''>Select Author</option>
       </select>
</span>     
Book   <select class="form-control" id="book" type="text" name="book" >
         <option value=''>Select Book</option>
       </select>
</div><br>

 <button type="submit" name="request" class="btn btn-info fd_btn">Submit</button> 
</form>
 </div>
</div>
</div>
</div>  
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
