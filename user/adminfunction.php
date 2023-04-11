

<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$account_dtails = mysqli_query($con, "SELECT * FROM libraryUser WHERE email = '$email'");
$detail = mysqli_fetch_array($account_dtails);
if($email != false && $password != false){
    $sql = "SELECT * FROM libraryUser WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['libraryUserStatus'];
        $code = $fetch_info['libraryUserCode'];
        $id = $fetch_info['libraryUserId'];
        $namez = $fetch_info['libraryUserFirtsName']." ".$fetch_info['libraryUserLastName'];
        if($status == "verified"){
            if($code != 0){
                header('Location: ./reset-code.php');
            }
        }else{
            header('Location: ./user-otp.php');
        }
    }
}else{
    header("location: ../login-user.php  ");
    
}
if( $fetch_info['libraryUserRole']  == 1){
    header('Location: ../admin/home.php');
}elseif($fetch_info['libraryUserRole']  == 2){
    header('Location: ../cataloger/profile.php');
}elseif($fetch_info['libraryUserRole']  == 3){
}
$cr = mysqli_query($con," select * from system_core;");
$core = mysqli_fetch_array($cr);
$datenow = date('Y-m-d');
$cntbooks = mysqli_query($con, "select count(*) as cntbooks from books ;");
$countBooks = mysqli_fetch_assoc($cntbooks);
$cntsec = mysqli_query($con, "select count(*) as cntsection from section;");
$countsection = mysqli_fetch_assoc($cntsec);
$bookzz = mysqli_query($con, "select * from books order by bookId desc limit 6;");
$book = mysqli_query($con, "select * from books order by bookId desc ;");
$listofborrow = mysqli_query($con,"select books.bookId, books.sectionID, books.libraryUserId, books.isbn, books.Deweydecimal, books.bookprofile, books.bookTitle, books.bookSubject, books.bookAuthors, books.bookDescription, books.bookSource, books.bookPublisher, books.bookPlacePublisher
,reserve.flag , reserve.status, reserve.datestart, reserve.dateend , reserve.resereID from books join reserve on reserve.bookId = books.bookId where reserve.libraryUserId = $id order by reserve.status");
$listofborrowonsite = mysqli_query($con,"select * from books join borrowbook on borrowbook.bookId = books.bookId where borrowbook.libraryUserId = $id;");
$rescntbook = mysqli_query($con,"select count(libraryUserId) as userreserve from reserve where libraryUserId = $id and status IN ('Approved','RETURN BOOK')");
$bookcountz = mysqli_fetch_array($rescntbook);
$borrcntbook = mysqli_query($con,"select count(libraryUserId) as userborrow from borrowbook where libraryUserId = $id and status IN ('Approved','RETURN BOOK')");
$borrowcont = mysqli_fetch_array($borrcntbook);
$ancmnt = mysqli_query($con,"SELECT * FROM contents WHERE contType = 'announcement' ORDER BY date DESC;");
$time = time();
$libspaces = mysqli_query($con," select * from libraryspace");
$sec = mysqli_query($con,"select * from section;");

//$datenow = date('Y-m-d');
$due = mysqli_query($con,"select * from reserve where dateend = '".$datenow."' and flag = 0;");
if( mysqli_num_rows($due) > 0){
while( $duedetail = mysqli_fetch_assoc($due)){
    $dueID = $duedetail['resereID'];
        $ckdue = mysqli_query($con,"delete from reserve where resereID = '$dueID'");
    
}
}

$duez = mysqli_query($con,"select * from reserve where dateend = '".$datenow."' and flag = 1;");
if( mysqli_num_rows($duez) > 0){
while( $duedetailz = mysqli_fetch_assoc($duez)){
    $dueIDz = $duedetailz['resereID'];
    if($duedetailz['status'] !="Book Returned"){
        $ckdue = mysqli_query($con,"Update reserve set status = 'RETURN BOOK' where resereID = '$dueIDz'");
    }
    
}




/*$duem = mysqli_query($con,"select libraryuser.libraryUserFirtsName, libraryuser.libraryUserLastName, libraryuser.email, reserve.resereID, reserve.dateend , books.isbn,  books.bookTitle from books join reserve on reserve.bookId = books.bookId join libraryuser on libraryuser.libraryUserId = reserve.libraryUserId where reserve.status = 'RETURN BOOK';");
while( $duedetails = mysqli_fetch_assoc($duem)){
    $name = $duedetails['libraryUserFirtsName']." ".$duedetails['libraryUserLastName'];
    $isbnn = $duedetails['isbn'];
    $dateend = $duedetails['dateend'];
    $bookTitle = $duedetails['bookTitle'];
    $email = $duedetails['email'];
    $subject = "Time to Return The Book";
    $message = "<p>Dear <b> $name </b> <br><br>This is a friendly reminder that the book with <b>ISBN <u> $isbnn </u><b> and <b>Titled <u>  $bookTitle </u></b> that you borrowed from the library is due for  <b><u> $dateend </u></b> <br> Please ensure that the book is returned to the library within the given time to avoid any losses.
    <br><br>If you have any questions or concerns regarding the return process, please do not hesitate to contact us.
    <br><br>Thank you for your cooperation and happy reading!</p>";
    $legend = "Return book : '$bookTitle' on Time ";
    returnbook($email, $subject, $message,$legend);

}*/
}

























?>