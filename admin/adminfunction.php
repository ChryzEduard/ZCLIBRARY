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
    $Roletitle = "Administrator";
}elseif($fetch_info['libraryUserRole']  == 2){
    header('Location: ../cataloger/profile.php');
}elseif($fetch_info['libraryUserRole']  == 3){
    $alertname = $detail['libraryUserFirtsName'];
    header('Location: ../user/home.php');
}

$countqry = mysqli_query($con, "SELECT COUNT(*) user_count FROM libraryuser where libraryUserRole = 3;");
$count = mysqli_fetch_array($countqry);
$nrmalusercountqry = mysqli_query($con, "SELECT COUNT(*) AS user_count FROM libraryuser where libraryUserRole = 3 ");
$normaluser = mysqli_fetch_array($nrmalusercountqry);
$catalusercountqry = mysqli_query($con, "SELECT COUNT(*) AS user_count FROM libraryuser where libraryUserRole = 2 ");
$cataluser = mysqli_fetch_array($catalusercountqry);
$adusercountqry = mysqli_query($con, "SELECT COUNT(*) AS user_count FROM libraryuser where libraryUserRole = 1 ");
$adminuser = mysqli_fetch_array($adusercountqry);
$userquerry = mysqli_query($con,"select * FROM libraryuser where libraryUserId =$id");
$userdata = mysqli_fetch_assoc($userquerry );
$extinfquerry = mysqli_query($con,"select external_info.siteTitle, external_info.about_us, external_info.mission, external_info.vision , external_info.siteContact, external_info.siteEmail ,external_info.siteAddress, external_info.date ,  libraryuser.libraryUserFirtsName, libraryuser.libraryUserLastName from libraryuser join external_info on external_info.libraryUserId = libraryuser.libraryUserId where external_info.externalID = 1; ");
$external_info = mysqli_fetch_assoc($extinfquerry );
$userlist = mysqli_query($con,"select * FROM libraryuser where libraryUserRole = '3'");
$adminlist = mysqli_query($con,"select * FROM libraryuser where libraryUserRole = '1'");
$date = date("l, F jS Y");
$newreg = mysqli_query($con,"select * from libraryuser where libraryUserRole =3 and date = '$date';");
$faq= mysqli_query($con,"select faq.title,faq.faqID, faq.description, faq.date,libraryuser.libraryUserFirtsName,libraryuser.libraryUserLastName from libraryuser join faq on libraryuser.libraryUserId = faq.libraryUserId;");
$soc = mysqli_query($con,"select * from social_media;");
$sec = mysqli_query($con,"select section.sectionID, section.sectionProfile, section.Section_Name , section.Section_Desc, section.date,libraryuser.libraryUserFirtsName, libraryuser.libraryUserLastName from libraryuser join section on section.libraryUserId = libraryuser.libraryUserId;");
$allsection = mysqli_query($con,"select * from section;");
$booklist = mysqli_query($con,"select books.bookprofile,  books.bookId, books.isbn, books.bookTitle, section.Section_Name, books.bookAuthors, books.bookSubject, books.bookPublisher, books.bookDescription, books.bookPlacePublisher, books.bookSource, libraryuser.libraryUserFirtsName,libraryuser.libraryUserLastName from books join section on section.sectionID = books.sectionID join libraryuser on libraryuser.libraryUserId = books.libraryUserId order by books.bookId DESC");
$blgs = mysqli_query($con,"select * from contents where contType = 'blogs';");
$ancmnt = mysqli_query($con,"select * from contents where contType = 'announcement';");
$gal = mysqli_query($con,"select * from gallery");
$space = mysqli_query($con,"select * from libraryspace");
$countbooks = mysqli_query($con, "SELECT COUNT(*) AS book_count FROM books");
$countbook = mysqli_fetch_array($countbooks);
$notificationdes = mysqli_query($con,"select * from notification order by notifID desc;");
$notificatcount = mysqli_query($con,"select count(*) as countnotif from notification where status = 'unread';");
$notificatcounts = mysqli_fetch_array($notificatcount);
$resserve = mysqli_query($con,"select count(*) as reserve_count from reserve where status ='wait for approval'");
$resserve_coun = mysqli_fetch_array($resserve);
$borrowz = mysqli_query($con,"select count(*) as borrow_count from borrowbook where status ='wait for approval';");
$borrow_coun = mysqli_fetch_array($borrowz);
$borrowreq = mysqli_query($con,"select reserve.validID , reserve.resereID , reserve.reason ,reserve.datestart ,reserve.dateend,reserve.status,books.bookTitle ,books.isbn ,libraryuser.libraryUserFirtsName ,libraryuser.libraryUserLastName from reserve join libraryuser on libraryuser.libraryUserId = reserve.libraryUserId join books on books.bookId = reserve.bookId where reserve.status = 'wait for approval'");
$borrow = mysqli_query($con,"select reserve.validID , reserve.resereID , reserve.reason ,reserve.datestart ,reserve.dateend,reserve.status,reserve.flag,books.bookTitle ,books.isbn ,libraryuser.libraryUserFirtsName ,libraryuser.libraryUserLastName from reserve join libraryuser on libraryuser.libraryUserId = reserve.libraryUserId join books on books.bookId = reserve.bookId where reserve.status = 'Approved' or reserve.status = 'RETURN BOOK'");
$borrow_onsite = mysqli_query($con,"select borrowbook.borrowID, libraryuser.libraryUserFirtsName,libraryuser.libraryUserLastName, books.bookprofile,books.bookTitle,books.isbn, borrowbook.BorrowPicture,borrowbook.reason, libraryspace.libraryspaceName, borrowbook.date, borrowbook.status from borrowbook join libraryuser on libraryuser.libraryUserId = borrowbook.libraryUserId join libraryspace on libraryspace.libraryspaceId = borrowbook.libraryspaceId join books on books.bookId = borrowbook.bookId where borrowbook.status = 'Approved';");
$requestborrow = mysqli_query($con,"select borrowbook.borrowID, libraryuser.libraryUserFirtsName,libraryuser.libraryUserLastName, books.bookprofile,books.bookTitle,books.isbn, borrowbook.BorrowPicture,borrowbook.reason, libraryspace.libraryspaceName, borrowbook.date, borrowbook.status from borrowbook join libraryuser on libraryuser.libraryUserId = borrowbook.libraryUserId join libraryspace on libraryspace.libraryspaceId = borrowbook.libraryspaceId join books on books.bookId = borrowbook.bookId where borrowbook.status = 'wait for approval';");
$ms = mysqli_query($con," select count(*) ex_message from contactusmessage where status = 'notseen'");
$messages = mysqli_fetch_array($ms);
$msgs = mysqli_query($con," select * from contactusmessage ");

$cr = mysqli_query($con,"select * from system_core where coreID = 1");
$core = mysqli_fetch_array($cr);


$cntret = mysqli_query($con,"select status from reserve where status = 'RETURN BOOK';");
$return = mysqli_num_rows($cntret);
$cntbrw = mysqli_query($con,"select libraryUserId ,bookId from reserve where status = 'Approved' union select libraryUserId ,bookId from borrowbook where status = 'Approved';");
$countboroow = mysqli_num_rows($cntbrw);
$datestart = date('Y-m-d');
$dtz = mysqli_query($con,"select * from event order by eventDate = '$datestart' desc;");
$retde = mysqli_query($con,"select libraryuser.libraryUserFirtsName, libraryuser.libraryUserLastName, reserve.dateend, books.bookTitle  from reserve join libraryuser on libraryuser.libraryUserId = reserve.libraryUserId join books on books.bookId = reserve.bookId where reserve.status = 'Return Book' order by reserve.dateend DESC");

$onl = mysqli_query($con,"select count(availabiltyONOFF) Onlinez from libraryuser where availabiltyONOFF = 'online' and libraryUserRole = 3;");
$onlinez = mysqli_fetch_array($onl);
$onla = mysqli_query($con,"select count(availabiltyONOFF) Onlinea from libraryuser where availabiltyONOFF = 'online' and libraryUserRole = 1;");
$onlinea = mysqli_fetch_array($onla);
$onlc = mysqli_query($con,"select count(availabiltyONOFF) Onlinec from libraryuser where availabiltyONOFF = 'online' and libraryUserRole = 2;");
$onlinec = mysqli_fetch_array($onlc);

//$datenow = '2023-04-12';
$datenow = date('Y-m-d');

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




}



















?>