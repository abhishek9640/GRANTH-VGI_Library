<?php
class Admin
{
   private function connect()
   {
       return mysqli_connect("localhost", "root", "", "library","3306");
   }
   function addBookRequest($collegeid,$fname,$email,$cat,$author,$book,$otp)
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "insert into tblBookRequest(collegeid,name,mailid,category,author,book,otp,requestDate) values('$collegeid','$fname','$email',$cat,$author,$book,'$otp',now())");
      return $x;
   }
   function getbooklist()
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "select id,bookImage,ISBNNumber,BookName from tblbooks b,tblbookstocks a where b.id =  a.bookid");
      return $x;
   }
   function getUserbooklist()
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "select id,bookImage,ISBNNumber,BookName from tblbooks b,tblbookstocks a where b.id =  a.bookid");
      return $x;
   }
   function getBooks($cid,$aid)
   {
      $dsn = $this->connect();
      if($aid=="")
        $x = mysqli_query($dsn, "select id,bookname from tblBooks where catid = $cid order by 2");
      else 
        $x = mysqli_query($dsn, "select id,bookname from tblBooks where catid = $cid and authorid = $aid order by 2");
      return $x;
   }
   function getNameMailid($id)
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "SELECT FullName,EmailId from tblstudents where collegeid='$id'"); 
      return $x;
   }
   function getBookRequest()
   {
     $dsn = $this->connect();
     $x = mysqli_query($dsn, "select sno,collegeid,name,mailid,categoryName,authorName,bookname,otp,remarks,requestdate from tblbooks b,tblbookrequest r,tblcategory c,tblauthors a where c.id = category and a.id = author and b.id = book");
     return $x;
   }
   function approve($sno)
   {
     $dsn = $this->connect();
     $x = mysqli_query($dsn, "select book,mailid from tblBookRequest where sno = $sno");
     $r = mysqli_fetch_row($x);
     if(isset($r[0]))
     {
        $x = mysqli_query($dsn, "update tblBookStocks set issuedbooks=issuedbooks+1 where bookid=$r[0]");
        $x = mysqli_query($dsn, "insert into tblIssuedBook(collegeid,name,mailid,category,author,book,otp,issueddate,returndate,remarks) select collegeid,name,mailid,category,author,book,otp,now(),DATE_ADD(now(),INTERVAL 10 DAY),'ISSUED' from tblbookrequest where sno=$sno");
        $x = mysqli_query($dsn, "delete from tblBookRequest where sno = $sno");
     }  
     return $r;
   }
   function reject($sno)
   {
     $dsn = $this->connect();
     $x = mysqli_query($dsn, "delete from tblBookRequest where sno = $sno");
     return $x;
   }
   function bookCategory()
   {
     $dsn = $this->connect();
     $x = mysqli_query($dsn, "SELECT id,categoryName FROM tblcategory order by 2");
     return $x;
   }
   function getAuthors($id)
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "SELECT id,AuthorName FROM tblauthors where catid=$id order by 2");
      return $x;
   }
   function getName($id)
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "SELECT collegeid,fname FROM tblstudents where collegeid='$id'");
      return $x;
   }
   function getIssuedBooks()
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn,"select sno,collegeid,name,mailid,categoryName,authorName,bookname,remarks,issueddate,returndate,datediff(DATE_FORMAT(now(), '%Y-%c-%d'),DATE_FORMAT(returndate, '%Y-%c-%d')) from tblbooks b,tblIssuedbook r,tblcategory c,tblauthors a where c.id = category and a.id = author and b.id = book and remarks='ISSUED'");
      return $x;
   }
 
    function getUserIssuedBooks($id)
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn,"select sno,collegeid,name,mailid,categoryName,authorName,bookname,remarks,issueddate,returndate,datediff(DATE_FORMAT(now(), '%Y-%c-%d'),DATE_FORMAT(returndate, '%Y-%c-%d')) from tblbooks b,tblIssuedbook r,tblcategory c,tblauthors a where c.id = category and a.id = author and b.id = book and remarks='ISSUED' and collegeid='$id'");
      return $x;
   }
   function getUserRequestedBooks($id)
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn,"select sno,collegeid,name,mailid,categoryName,authorName,bookname,remarks from tblissuedbook r,tblbooks b,tblcategory c,tblauthors a where c.id = category and a.id = author and b.id = book and remarks='RETURNED' and collegeid='$id'");
      return $x;
   }
   function returnbook($sno,$fine)
   {
     $dsn = $this->connect();
     $x = mysqli_query($dsn, "select book from tblIssuedBook where sno = $sno");
     $r = mysqli_fetch_row($x);
     if(isset($r[0]))
     {
        $x = mysqli_query($dsn, "update tblBookStocks set issuedbooks=issuedbooks-1 where bookid=$r[0]");
        $x = mysqli_query($dsn, "update tblIssuedBook set actualreturndate=now(),fine=$fine,remarks='RETURNED' where sno=$sno");
     }  
     return $r[0];
   }
   function addBooks($BookName,$CatId,$AuthorId,$ISBNNumber,$bookImage,$numofbook)
   {
      $dsn = $this->connect();
      echo "insert into tblBooks(BookName,CatId,AuthorId,ISBNNumber,bookImage) values('$BookName','$CatId','$AuthorId','$ISBNNumber','$bookImage')";
      echo "INSERT INTO  tblbookstocks(totalbooks) VALUES($numofbook)";
      $x = mysqli_query($dsn,"insert into tblBooks(BookName,CatId,AuthorId,ISBNNumber,bookImage,updationDate) values('$BookName','$CatId','$AuthorId','$ISBNNumber','$bookImage',now())");
      $x = mysqli_query($dsn,"INSERT INTO  tblbookstocks(totalbooks,issuedbooks) VALUES($numofbook,0)");
      return $x;
   }   
   // function addUser($userid,$pass,$wmode,$name,$dob,$mailid,$mobile,$address)
   // {
   //    $dsn = $this->connect();
   //    $x = mysqli_query($dsn, "insert into tblLogin values('$userid','$pass','$wmode')");
   //    if($x==1)
   //    {
   //       $x = mysqli_query($dsn, "insert into tblRegistration values('$userid','$name','$dob','$mobile','$mailid','$address',now())");
   //       return $x;
   //    }
   //    return 0;
   // }
   // function checkId($userid,$pass)
   // {
   //    $dsn = $this->connect();
   //    $x = mysqli_query($dsn, "select wmode from tblLogin where userid='$userid' and binary pass='$pass'");
   //    return $x;
   // }
   // function addFeedback($name,$userid,$mailid,$mobile,$msg)
   // {
   //    $dsn = $this->connect();
   //    $x = mysqli_query($dsn, "insert into tblFeedback(name,userid,emailid,mobile,message,date_of_feedback) values('$name','$userid','$mailid','$mobile','$msg',now())");
   //    return $x;
   // }
   // function getFeedbackReport()
   // {
   //    $dsn = $this->connect();
   //    $x = mysqli_query($dsn, "select * from tblFeedback order by 1");
   //    return $x;
   // }
   // function deleteFeedback($sno)
   // {
   //    $dsn = $this->connect();
   //    $x = mysqli_query($dsn, "delete from tblFeedback where sno = $sno");
   //    return $x;
   // }
   function addComplaint($collegeid,$sub,$msg)
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "insert into tblcomplaint(collegeid,subject,message,complaint_date) values('$collegeid','$sub','$msg',now())");    
      return $x; 
   }
   //  function getUserComplaints($u)
   // {
   //    $dsn = $this->connect();
   //    $x = mysqli_query($dsn, "SELECT sno,subject,message,complaint_date,complaint_status,resolvemessage,resolve_date FROM tblcomplaint where userid = '$u'");
   //    return $x;
   // }
   function getAllComplaintsReport()
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "SELECT * from tblcomplaint order by 1");
      return $x;
       
   }
   function deleteCompaint($sno)
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "delete from tblComplaint where sno = $sno");
      return $x; 
   }
   function getComplaint($sno)
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "select * from tblComplaint where sno = $sno");
      return $x; 
   }
    function updComplaint($sno,$rmsg)
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "update tblcomplaint set complaint_status='RESOLVED', resolvemessage='$rmsg', resolve_date=now() where sno = '$sno'");
      return $x;
   }
   

   function getAllBooksReport()
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "SELECT * from tblbooks order by 1");
      return $x;
       
   }
   function deleteBook($id)
   {
      $dsn = $this->connect();
      $x = mysqli_query($dsn, "delete from tblbooks where id = '$id'");
      return $x; 
   }
   
}
$o = new Admin();