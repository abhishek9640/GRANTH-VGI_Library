<?php

include_once '../Admin.php';
  $id = $_GET["id"];
  echo "$id";
  $x = $o->deleteBook($id);
  header("location:manage-books.php");
  ?>