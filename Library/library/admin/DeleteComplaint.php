<?php

include_once '../Admin.php';
  $sno = $_GET["n"];
  $x = $o->deleteCompaint($sno);
  header("location:complaintReport.php");
  ?>
