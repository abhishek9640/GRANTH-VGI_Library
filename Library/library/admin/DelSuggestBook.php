<?php

include_once '../Admin.php';
  $sno = $_GET["n"];
  $x = $o->deleteSugBook($sno);
  header("location:SuggestBookReport.php");
  ?>