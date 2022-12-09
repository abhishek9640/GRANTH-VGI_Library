<?php
   $sno = $_REQUEST["sno"];
   $rmsg = $_REQUEST["rmsg"];
   include_once '../Admin.php';
   $x = $o->updComplaint($sno,$rmsg);
   header("location:complaintReport.php");  
?>
