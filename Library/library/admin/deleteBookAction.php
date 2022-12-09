<?php

include_once '../Admin.php';
  $id = $_GET["n"];
  $x = $o->deleteBook($id);
  header("location:manage-books.php");
  ?>
