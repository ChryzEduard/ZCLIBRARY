<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
include "adminfunction.php"; 
include "head.php";
$duem = mysqli_query($con,"select libraryuser.libraryUserFirtsName, libraryuser.libraryUserLastName, libraryuser.email, reserve.resereID, reserve.dateend , books.isbn,  books.bookTitle from books join reserve on reserve.bookId = books.bookId join libraryuser on libraryuser.libraryUserId = reserve.libraryUserId where reserve.status = 'RETURN BOOK';");
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
   
}
echo "<script>alert('Successfully Notified');</script>
        <script>window.location.href = 'home.php'</script>";

?>