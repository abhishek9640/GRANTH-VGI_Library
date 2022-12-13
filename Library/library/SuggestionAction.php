<?php
   session_start();
   include_once "Admin.php";
   $collegeid = $_SESSION["collegeid"];
   if(strlen($_SESSION['login'])==0)
  { 
    header('location:http://localhost/Library/library/homepage/index.php');
  }
else{
    $collegeid = $_REQUEST["collegeid"];
    $name = $_REQUEST["name"];
    $phoneno = $_REQUEST["phoneno"];
    $email = $_REQUEST["email"];
    $department = $_REQUEST["department"];
    $booksug = $_REQUEST["booksug"];

  
//    include "Admin.php";
   
   $x = $o->SuggestBook($name,$collegeid,$phoneno,$email,$department, $booksug);
   header("location:SuggestBookForm.php?s=0"); 
} 
?>
