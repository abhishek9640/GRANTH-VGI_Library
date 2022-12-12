<?php
   session_start();
   if(strlen($_SESSION['login'])==0)
  { 
    header('location:http://localhost/Library/library/homepage/index.php');
  }
else if($collegeid = $_SESSION["collegeid"]){
   $subject = $_REQUEST["subject"];
   $msg = $_REQUEST["msg"];
  
   include "Admin.php";
   
   $x = $o->addComplaint($collegeid,$subject,$msg);
   header("location:ComplaintForm.php?s=0"); 
} 
?>
