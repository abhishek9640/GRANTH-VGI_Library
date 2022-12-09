<?php
include_once '../Admin.php';
$n = $_GET["n"];
$email = $_GET["email"];
$xx = $o->approveBook($n);
$x = $o->approve($n);


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'vgionlinelibrary@gmail.com';                     //SMTP username
    $mail->Password   = 'zojndznwsuycksww';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('vgionlinelibrary@gmail.com', 'GRANTH - VGI Library');
    $mail->addAddress($email, 'VGI User');     //Add a recipient


   
    
    // for($i=0;$i<mysqli_num_rows($x);$i++)
    // { 
     $rs = mysqli_fetch_row($xx);
    //  echo "<tr>";
    //  foreach($rs as $n)
    //    echo "<td>$n</td>";
    // //  echo "<td><a href=Approve.php?n=$rs[0]&email=$rs[3]>Issued</a> | <a href=Reject.php?n=$rs[0]&email=$rs[3]>Reject</a></td>";
    //  echo "</tr>";
    // }


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Requested Book Status : ISSUED';
    $mail->Body    = "<div style='border:2px solid black;background-color:limewhite;'>  
                      <h1>Book Request Status</h1>   
                      <p><strong>Name :</strong> $rs[2]</p> 
                      <p><strong>College ID :</strong> $rs[1]</p>
                      <p><strong>Email id :</strong>$rs[3]</p>
                      <p><strong>Book Name :</strong>$rs[6]</p>
                      <p><strong>Request Id :</strong>$rs[7]</p>
                      <p><h1>Kindly Collect your Book between 2pm to 3pm within 24 hours</h1></p>
                      </div>
                      <div style='display:flex;justify-content:space-between;'>
                      </div>";
    $mail->AltBody = 'Your book is issued.';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// header("location:bookreqreport.php?j=n");
?>
<script>
 location.href="bookreqreport.php?j=n";

</script>
