<?php
     include "../Admin.php";
    include "mail.php";
    $sno = $_GET["id"]; 
    // $code = "$_SESSION['id'].rand(1000,2000)";
    $dsn =connect();
    $passid = rand(1000,9999);
    $query = mysqli_query($dsn,"UPDATE `tblbookrequest` SET status='Y' WHERE status ='N' and sno = $sno");
      if($query==1){
        $query = mysqli_query($dsn,"select * from `tblbookrequest` where sno = $sno");
        $rs = mysqli_fetch_row($query);
             $q1 = mysqli_query($dsn,"select Emailid from tblstudents where collegeid='$rs[2]'");
                $subject = 'Request Approved';
                $message .= '<div style="border:2px solid black;background-color:pink;">';  
                $message .= "<h1>Book Request Approval</h1>";   
                $message .= "<p><strong>Name :</strong> $rs[1]</p>";    
                $message .= "<p><strong>College ID :</strong> $rs[2]</p>";
                // $message .= "<p><strong>Room No :</strong>$rs[3]</p>";
                // $message .= "<p><strong>Phone No :</strong>$rs[4]</p>";
                $message .= "<p><strong>Email id :</strong>$rs[3]</p>";
                $message .= "<p><strong>Book Name :</strong>$rs[6]</p>";
                // $message .= "<p><strong>Out Date :</strong>$rs[7]</p>";
                // $message .= "<p><strong>Return Date:</strong>$rs[8]</p>";
                $message .= "<p><strong>Book Request Status: - Approved</strong></p>";
                $message .= "<p><strong>OTP:</strong>$rs[7]</p>";
                $message .= '</div>';
                $message .= '<div style="display:flex;justify-content:space-between;">';
                $message .= '</div>';
                $r = mysqli_fetch_row($q1);
                send_mail($subject, $message,$r[0]);
                header('location:passform.php?pr=1');
               }
               else{
                   echo "Data not inserted";   
               }
   
   header("location:passReport.php?kk=1");

?>