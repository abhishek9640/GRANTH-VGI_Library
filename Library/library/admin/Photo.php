<?php
include "../Admin.php";
$n = $_GET["n"];
$x = $o->getNotice($n);
$rp = mysqli_fetch_row($x);
if (isset($rp[0]))
   echo $rp[0];
?>