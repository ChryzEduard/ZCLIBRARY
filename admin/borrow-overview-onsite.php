<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 15;
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include "adminfunction.php";
include "head.php";

error_reporting(0);


    if(isset($_GET['overview']))
    {
        $ov = $_GET['overview'];
        $aprvd = mysqli_query($con,"select borrowbook.borrowID, libraryuser.libraryUserFirtsName,libraryuser.libraryUserLastName, books.bookprofile,books.bookTitle,books.isbn, borrowbook.BorrowPicture,borrowbook.reason, libraryspace.libraryspaceName, borrowbook.date, borrowbook.status from borrowbook join libraryuser on libraryuser.libraryUserId = borrowbook.libraryUserId join libraryspace on libraryspace.libraryspaceId = borrowbook.libraryspaceId join books on books.bookId = borrowbook.bookId where borrowbook.borrowID =".$ov."");
        $Approveonsite = mysqli_fetch_array($aprvd);
        $appr = $Approveonsite['borrowID'];
    }
    
    
    if(isset($_POST['surrendered']))
    {
        $sql = mysqli_query($con,"delete from borrowbook where borrowID = $appr;");
        echo "<script>alert('Book Returned');window.location.href = 'borrow-onsite.php'</script>";
    }

?>
<body>
<style>
.imgreserve{
  width: 325px;
  height: 300px;
}
@media only screen and (max-width: 767px) {
 
 .imgreserve{
     width: 282px;
     height: 200px;
 }
 
}
</style>
<div class="main-wrapper">
    <?php include "header.php"?>
    <?php include "sidebar.php"?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                
                             <div class="card-header">
                                <h4 class="card-title">OnSite Borrow Book Details</h4>
                                    <div class="line"></div>
                                      
                                    
                                </div>
                                 <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Presented Valid ID</label>
                                                        <div class="col-lg-9">
                                                            <img class="imgreserve" src="../assets/images/validIDs/<?php echo $Approveonsite['BorrowPicture']?>" alt="<?php echo $Approveonsite['BorrowPicture']?>">
                                                            
                                                        </div>
                                                 </div>
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">ISBN</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" value="<?php echo $Approveonsite['isbn']?>" disabled>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Title</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $Approveonsite['bookTitle']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Date Start</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $Approveonsite['date']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Occupied Space</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $Approveonsite['libraryspaceName']?>" disabled>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                            <div class="col-xl-6">
                                                
                                            <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Borrower Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control"  value="<?php echo $Approveonsite['libraryUserFirtsName']." ".$Approveonsite['libraryUserLastName']?>" disabled>
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Reason</label>
                                                    <div class="col-lg-9">
                                                        <textarea  class="form-control" cols="20" rows="5" disabled><?php echo $Approveonsite['reason']?></textarea>
                                                    </div>
                                                </div>
                                                <form action="" method="post">
                                                        <div class="row">
                                                    <div class="col-md-6 mx-auto">
                                                <button class="btn btn-primary " onclick="return confirm('<?php echo $Approveonsite['libraryUserFirtsName'].' '.$Approveonsite['libraryUserLastName']?> Returning the Book?')"  type="submit" name="surrendered"> Return Book</button> 
                                                
                                                </div></div></form>
                                        </div>
                                  
                        </div>
                    </div>
                </div>
            </div>
        </div>     
  
</div>
</div>
</div>
</div>
</div>
</div>





                </div>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>