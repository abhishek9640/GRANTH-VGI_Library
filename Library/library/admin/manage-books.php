<?php
session_start();
error_reporting(0);
include('includes/config.php');
include_once '../Admin.php';
if (strlen($_SESSION['login']) == 0) {
  header('location:http://localhost/php_programs/Library/library/homepage/index.php');
} else { ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
  <title>GRANTH | Admin Dash Board</title>
  <!-- BOOTSTRAP CORE STYLE  -->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONT AWESOME STYLE  -->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- DATATABLE STYLE  -->
  <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
  <!-- CUSTOM STYLE  -->
  <link href="assets/css/style.css" rel="stylesheet" />
  <!-- GOOGLE FONT -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
  <!------MENU SECTION START-->
  <?php include('includes/header.php');
  include_once '../Admin.php'; ?>

  <div class="content-wrapper">
    <div class="container">
      <div class="row pad-botm">
        <div class="col-md-12">
          <h4><b>Manage books<b><a href="add-book.php"><button style="margin-left:80%;" class="btn btn-warning">Add a new Book</button></a></h4>
        </div>


      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- Advanced Tables -->
          <div class="panel panel-default">
            <div class="panel-heading">
              Book List
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>

                    <tr>
                      <th>Book Id </th>
                      <th>Book Image</th>
                      <th>ISBN Number</th>
                      <th>Book Name</th>
                      <th>Action</th>
                      <th>Available</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    /*
  $cnt = 1;

  $x = $o->getbooklist();
  for ($i = 0; $i < mysqli_num_rows($x); $i++) {
    $ctr = 0;
    echo "<tr>";
    $rs = mysqli_fetch_row($x);
    foreach ($rs as $n) {
      $ctr++;
      if ($ctr == 2)
        echo "<td><img src='bookimg/$n' height=50 width=50 class='img-thumbnail'></td>";
      else
        echo "<td>$n</td>";
    }
    echo "<td><a href=UpdComplaints.php?id=$rs[0]><span class='glyphicon glyphicon-edit'></span></a> | <a href=DeleteComplaint.php?n=$rs[0]><span class='glyphicon glyphicon-trash'></span</a></td>";
    echo "</tr>";
    $cnt = $cnt + 1;
  }
    ?>
                </table>
                <?php
  if (isset($_GET["s"]))
    echo "Ur Complaints Successfully Deleted...";
  if (isset($_GET["v"]))
    echo "Complaints Successfully Resolved...";
*/
?>

<?php $sql = "select id,bookImage,ISBNNumber,BookName from tblbooks b,tblbookstocks a where b.id =  a.bookid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
   foreach($results as $result)
   {               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($result->id);?></td>
                                            <td class="center"><img src='bookimg/<?php echo htmlentities($result->bookImage);?>' height=50 width=50 class='img-thumbnail'></td>
                                            <td class="center"><?php echo htmlentities($result->ISBNNumber);?></td>
                                            <td class="center"><?php echo htmlentities($result->BookName);?></td>
                                            <td class="center">&nbsp;&nbsp;<a href="deleteBook.php?id=<?php echo htmlentities($result->id);?>"><span class='glyphicon glyphicon-trash'></a></td>
                                            <td class="center"><?php echo "Available"; ?></td>
                                      
<?php                                        
   }
}
  include "Footer.php";
?>

                <!-- <?php include('includes/footer.php'); ?> -->
                <!-- FOOTER SECTION END-->
                <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
                <script src="assets/js/jquery-1.10.2.js"></script>
                <!-- BOOTSTRAP SCRIPTS  -->
                <script src="assets/js/bootstrap.js"></script>
                <!-- DATATABLE SCRIPTS  -->
                <script src="assets/js/dataTables/jquery.dataTables.js"></script>
                <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
                <!-- CUSTOM SCRIPTS  -->
                <script src="assets/js/custom.js"></script>
</body>

</html>
<?php }  ?>