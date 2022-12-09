<option value=''>Select Author</option>
<?php
  include_once 'Admin.php';
  $id= $_GET["n"];
  $x = $o->getAuthors($id);
  for($i=0;$i<mysqli_num_rows($x);$i++)
  {
     $rs = mysqli_fetch_row($x);
     echo "<option value='$rs[0]'>$rs[1]</option>"; 
  }
?>  
