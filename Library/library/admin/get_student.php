<?php 
require_once("includes/config.php");
if(!empty($_POST["collegeid"])) {
  $collegeid= strtoupper($_POST["collegeid"]);
 
    $sql ="SELECT FullName,Status,EmailId,MobileNumber FROM tblstudents WHERE collegeid=:collegeid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':collegeid', $collegeid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach ($results as $result) {
if($result->Status==0)
{
echo "<span style='color:red'> College ID Blocked </span>"."<br />";
echo "<b>Student Name-</b>" .$result->FullName;
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else {
?>


<?php  
echo htmlentities($result->FullName)."<br />";
echo htmlentities($result->EmailId)."<br />";
echo htmlentities($result->MobileNumber);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
 else{
  
  echo "<span style='color:red'> Invaid Student Id. Please Enter Valid Student id .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
