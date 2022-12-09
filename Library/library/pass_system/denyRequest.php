<?php
  
    include "../admin.php";
    include "mail.php";
    $sno = $_GET["id"]; 
    // $code = "$_SESSION['id'].rand(1000,2000)";
    $dsn =connect();
    $query = mysqli_query($dsn,"UPDATE `passgeneration` SET status='Denied' WHERE status ='Pending' and sno = $sno");
      if($query==1){
        $query = mysqli_query($dsn,"select * from `passgeneration` where sno = $sno");
        $rs = mysqli_fetch_row($query);
             $q1 = mysqli_query($dsn,"select mailid from tblRegistration where collegeid='$rs[2]'");
                $subject = 'Pass Generated';
                $message .= '<div style="border:2px solid black;background-color:pink;">';  
                $message .= "<h1>Pass Generation request</h1>";   
                $message .= "<p><strong>Name :</strong> $rs[1]</p>";    
                $message .= "<p><strong>College ID :</strong> $rs[2]</p>";
                $message .= "<p><strong>Room No :</strong>$rs[3]</p>";
                $message .= "<p><strong>Phone No :</strong>$rs[4]</p>";
                $message .= "<p><strong>Destination :</strong>$rs[5]</p>";
                $message .= "<p><strong>Purpose :</strong>$rs[6]</p>";
                $message .= "<p><strong>Out Date :</strong>$rs[7]</p>";
                $message .= "<p><strong>Return Date:</strong>$rs[8]</p>";
                $message .= "<p><strong>Pass Status: - Denied</strong></p>";
                $message .= "<p><strong>Pass Id:</strong>$rs[10]</p>";
                $message .= '</div>';
                $message .= '<div style="display:flex;justify-content:space-between;">';
                $message .= '</div>';
                $r = mysqli_fetch_row($q1);
                send_mail($subject, $message,$r[0]);
               }
               else{
                   echo "Data not inserted";   
               }
   header("location:passReport.php?qq=1");

?>