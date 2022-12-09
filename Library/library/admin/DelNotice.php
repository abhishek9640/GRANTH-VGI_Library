<?php

include_once '../Admin.php';
  $id = $_GET["n"];
  $x = $o->delNotice($id);
  header("location:NoticeReport.php?s==1");
  ?>
