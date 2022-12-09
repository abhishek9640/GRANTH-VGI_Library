<option value=''>Select Book</option>
<?php
  include_once '../Admin.php';
  $c= $_GET["c"];
  if(isset($_GET["a"]))
     $a= $_GET["a"];
  else 
     $a= "";
  $x = $o->getBooks($c,$a);
  for($i=0;$i<mysqli_num_rows($x);$i++)
  {
     $rs = mysqli_fetch_row($x);
     echo "<option value='$rs[0]'>$rs[1]</option>"; 
  }
?>  
