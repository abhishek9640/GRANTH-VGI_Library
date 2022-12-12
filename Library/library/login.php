<?php
error_reporting(0);
include('includes/config.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{
session_start();

    $collegeid=($_POST['collegeid']);
    $_SESSION['collegeid'] = $collegeid;
    $password=($_POST['password']);
    
    // $wmode=($_POST['wmode']); for user type
    $sql =("SELECT * FROM tblstudents WHERE collegeid=:collegeid and Password=:password");
   
    $query= $dbh-> prepare("SELECT * FROM tblstudents WHERE collegeid=:collegeid and Password=:password");
    $query-> bindParam(':collegeid', $collegeid, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    // $query-> bindParam(':wmode', $wmode, PDO::PARAM_STR);
  
    $query-> execute();
   
    // $results=$query->fetchAll(PDO::FETCH_OBJ);
    $row = $query-> fetch(PDO::FETCH_ASSOC);
   
                 if($query->rowCount() >0)
                      {
                        if($row['wmode']=='admin'){
                           $_SESSION['login']=$_POST['collegeid'];
                           header("location:admin/dashboard.php");
                            
                          }
                 
                     
                         else if($row['wmode']=='user'){
                            $_SESSION['login']=$_POST['collegeid'];
                            header("location:dashboard.php");
                           
                          }
                    
                      }
                 else
                      {
                          echo "Wrong College Id and Password";
                      }                   
 }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />

    <style>
      .btn-color {
        background-color: #56baed;
        color: #fff;
      }

      .profile-image-pic {
        height: 200px;
        width: 200px;
        object-fit: cover;
      }

      .cardbody-color {
        background-color: #ebf2fa;
      }

      a {
        text-decoration: none;
      }
    </style>
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
              <a class="nav-link" aria-current="page" href="http://localhost/Library/library/homepage/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/Library/library/About/index.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/Library/library/Contact/index.php">Contact us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- navbar -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <!-- <h2 class="text-center text-dark mt-5">Login Form</h2>
            <div class="text-center mb-5 text-dark">Made with bootstrap</div> -->
          <div class="card my-5">
            <form role="form" method="post" class="card-body cardbody-color p-lg-5" action="login.php" >
              <div class="text-center">
                <img
                  src="log_reg\GRANTH.png"
                  class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                  width="200px"
                  alt="profile"
                />
              </div>

              <div class="mb-3">
                <input
                  type="text"
                  class="form-control"
                  id="collegeid" name="collegeid"
                  aria-describedby="emailHelp"
                  placeholder="User Id"
                />
              </div>
              <div class="mb-3">
                <input
                  type="password"
                  class="form-control"
                  id="password" name="password"
                  placeholder="password"
                />
              </div>
              
              <div>
              <input type="checkbox" name="checkbox"><label for="remember me"> Remember Me </label>
              </div>
              <pre>
              </pre>
              <div class="text-center">
                <button type="submit" name="login" class="btn btn-color px-5 mb-3 w-100">
                  Login
                </button>
              </div>
              <div id="emailHelp" class="form-text mb-5 fw-bold">
               <a href="#"> Forgot password</a>
              </div>
              <div id="emailHelp" class="form-text text-center mb-5 text-dark">
                Not Registered?
                <a href="http://localhost/Library/library/signup.php" class="text-dark fw-bold"> Create an Account</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
