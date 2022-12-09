<?php 
require_once("includes/config.php");
// code user email availablity
if(!empty($_POST["collegeid"])) {
	$collegeid= $_POST["collegeid"];
	if (filter_var($collegeid, (FILTER_VALIDATE_COLLEGEID === false))){

		echo "error : You did not enter a valid userid.";
	}
	else {
		$sql ="SELECT collegeid FROM tblstudents WHERE collegeid=:collegeid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':collegeid', $collegeid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> User ID already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> User ID available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}


?>
