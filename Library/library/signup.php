<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
 

// $wmode=$_POST['wmode'];
$fname=$_POST['fullname'];
$collegeid=$_POST['collegeid'];
$mobileno=$_POST['mobileno'];
$emailid=$_POST['emailid']; 
$password=($_POST['password']); 
$status=1;
$sql="INSERT INTO  tblstudents(FullName,collegeid,MobileNumber,EmailId,Password,Status) VALUES(:fname,:collegeid,:mobileno,:emailid,:password,:status)";

$query = $dbh->prepare($sql);
// $query->bindParam(':wmode',$wmode,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':collegeid',$collegeid,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':emailid',$emailid,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo '<script>alert("Your Registration successfull and your College id is  "+"'.$collegeid.'")</script>';
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .reg{
        margin-bottom: 30px;
        text-align: center;
      }
    </style>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'collegeid='+$("#collegeid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>  
</head>
<body>

     <!-- navbar -->
     <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <!-- <a class="navbar-brand" href="#">Navbar</a> -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="http://localhost/php_programs/Library/library/homepage/index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/php_programs/Library/library/About/index.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="http://localhost/php_programs/Library/library/Contact/index.php">Contact us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- navbar -->

    <!-- form  -->
    
    <div class="content-wrapper">
    <div class="container mt-5">
      <div class="row col-md-6 offset-md-3">  
        <div>
          <h3 class="reg">Registration Form</h3>
        </div>
                        
                        
    <form name="signup" method="post" onSubmit="return valid();">
    <!-- <div class="mb-3">
        <label for="exampleInputText1" class="form-label" >Login As</label>
        <select name=wmode class="form-control" >
                            <option value="">Only admin can login as admin</option>
                            <?php
                                $ar = Array("admin","user");
                                foreach($ar as $n)
                                    echo "<option value=$n>$n</option>"
                            ?>
                        </select>
      </div> -->
      <div class="mb-3">
        <label for="exampleInputText1" class="form-label" >Full Name</label>
        <input type="text" class="form-control" id="exampleInputText1" name="fullname" aria-describedby="textHelp" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputText1" class="form-label" >College ID</label>
        <input type="text" class="form-control" id="exampleInputText1" name="collegeid" aria-describedby="textHelp" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputText1" class="form-label" >Phone No</label>
        <input type="number" class="form-control" id="exampleInputText1" name="mobileno" aria-describedby="textHelp" required>
      </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1"  name="emailid" id="emailid" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label" >Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" name="confirmpassword" id="exampleInputPassword1" required>
        </div>
      
        <div class="mb-3 form">
        <button type="submit" class="btn btn-primary" name="signup">Register Now</button>
        </div>
        <div id="emailHelp" class="form-text text-center mb-5 text-dark">
          Already a member ,
          <a href="http://localhost/php_programs/Library/library/login.php" class="text-dark fw-bold"> LogIn </a>
        </div>
      </form>
    </div>
    </div>
</div>
    <!-- form -->

        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
