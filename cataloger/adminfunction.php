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
    header('Location: ../admin/home.php');
}elseif($fetch_info['libraryUserRole']  == 2){
    $Roletitle = "Cataloger";
}elseif($fetch_info['libraryUserRole']  == 3){
    $alertname = $detail['libraryUserFirtsName'];
    header('Location: ../user/home.php');
}

$countqry = mysqli_query($con, "SELECT COUNT(*) AS user_count FROM libraryuser");
$count = mysqli_fetch_array($countqry);
$nrmalusercountqry = mysqli_query($con, "SELECT COUNT(*) AS user_count FROM libraryuser where libraryUserRole = 3 ");
$normaluser = mysqli_fetch_array($nrmalusercountqry);
$catalusercountqry = mysqli_query($con, "SELECT COUNT(*) AS user_count FROM libraryuser where libraryUserRole = 2 ");
$cataluser = mysqli_fetch_array($catalusercountqry);
$adusercountqry = mysqli_query($con, "SELECT COUNT(*) AS user_count FROM libraryuser where libraryUserRole = 1 ");
$adminuser = mysqli_fetch_array($adusercountqry);
$userquerry = mysqli_query($con,"select * FROM libraryuser where libraryUserId =$id");
$userdata = mysqli_fetch_assoc($userquerry );
$extinfquerry = mysqli_query($con,"select external_info.siteTitle, external_info.about_us , external_info.siteContact, external_info.siteEmail ,external_info.siteAddress, external_info.date ,  libraryuser.libraryUserFirtsName, libraryuser.libraryUserLastName from libraryuser join external_info on external_info.libraryUserId = libraryuser.libraryUserId where external_info.externalID = 1; ");
$external_info = mysqli_fetch_assoc($extinfquerry );
$userlist = mysqli_query($con,"select * FROM libraryuser where libraryUserRole = '3'");
$adminlist = mysqli_query($con,"select * FROM libraryuser where libraryUserRole = '1'");
$date = date("l, F jS Y");
$newreg = mysqli_query($con,"select * from libraryuser where libraryUserRole =3 and date = '$date';");
$faq= mysqli_query($con,"select faq.title,faq.faqID, faq.description, faq.date,libraryuser.libraryUserFirtsName,libraryuser.libraryUserLastName from libraryuser join faq on libraryuser.libraryUserId = faq.libraryUserId;");
$soc = mysqli_query($con,"select * from social_media;");
$sec = mysqli_query($con,"select section.sectionID, section.sectionProfile, section.Section_Name , section.Section_Desc, section.date,libraryuser.libraryUserFirtsName, libraryuser.libraryUserLastName from libraryuser join section on section.libraryUserId = libraryuser.libraryUserId;");
$allsection = mysqli_query($con,"select * from section;");
$booklist = mysqli_query($con,"select books.bookprofile, books.bookId, books.isbn, books.bookTitle, section.Section_Name, books.bookAuthors, books.bookSubject, books.bookPublisher, books.bookDescription, books.bookPlacePublisher, books.bookSource, libraryuser.libraryUserFirtsName,libraryuser.libraryUserLastName from books join section on section.sectionID = books.sectionID join libraryuser on libraryuser.libraryUserId = books.libraryUserId order by books.bookId Desc;");
$blgs = mysqli_query($con,"select * from contents where contType = 'blogs';");
$ancmnt = mysqli_query($con,"select * from contents where contType = 'announcement';");
$gal = mysqli_query($con,"select * from gallery");
$countbooks = mysqli_query($con, "SELECT COUNT(*) AS book_count FROM books");
$countbook = mysqli_fetch_array($countbooks);






































?>