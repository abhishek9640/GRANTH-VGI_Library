<?php 
  include_once '../Admin.php';
  $n = $_GET["n"]; 
  $f = $_GET["f"]; 
  $x = $o->returnbook($n,$f);
  header("location:manage-issued-books.php?j=n");
?>  