<?php
session_start();
include "../Admin.php";
$photo = $_FILES["photo"]["tmp_name"];
$data = file_get_contents($photo);
$data = addslashes($data);
$x = $o->uploadNotice($data);
header("location:NoticeForm.php?g=0");
?>