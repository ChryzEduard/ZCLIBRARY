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
        $os = mysqli_query($con,"select borrowbook.borrowID, libraryuser.libraryUserFirtsName,libraryuser.libraryUserLastName, books.bookprofile,books.bookTitle,books.isbn, borrowbook.BorrowPicture,borrowbook.reason, libraryspace.libraryspaceName, borrowbook.date, borrowbook.status from borrowbook join libraryuser on libraryuser.libraryUserId = borrowbook.libraryUserId join libraryspace on libraryspace.libraryspaceId = borrowbook.libraryspaceId join books on books.bookId = borrowbook.bookId where borrowbook.borrowID =".$ov."");
        $onsite = mysqli_fetch_array($os);
        $onsites = $onsite['borrowID'];
    }
    
    
    if(isset($_POST['approved']))
    {
        $sql = mysqli_query($con,"update borrowbook set status='Approved' where borrowID = $onsites;");
        echo "<script>alert('Book Request Approved');window.location.href = 'borrow-onsite.php'</script>";
    }
    if(isset($_POST['delete']))
    {
        $sql = mysqli_query($con," delete from borrowbook where borrowID = $onsites;");
        echo "<script>alert('Book Request Approved');window.location.href = 'borrow-onsite.php'</script>";
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
                                <h4 class="card-title">On Site Borrow Request</h4>
                                    <div class="line"></div>
                                      
                                    
                                </div>
                                 <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Borrower Picture</label>
                                                        <div class="col-lg-9">
                                                            <img class="imgreserve" src="../assets/images/validIDs/<?php echo $onsite['BorrowPicture']?>" alt="<?php echo $boook['bookprofile']?>">
                                                            
                                                        </div>
                                                 </div>
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">ISBN</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" value="<?php echo $onsite['isbn']?>" disabled>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Title</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $onsite['bookTitle']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Date Start</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $onsite['date']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">library Space</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $onsite['libraryspaceName']?>" disabled>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                            <div class="col-xl-6">
                                                
                                            <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Borrower Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control"  value="<?php echo $onsite['libraryUserFirtsName']." ".$onsite['libraryUserLastName']?>" disabled>
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Reason</label>
                                                    <div class="col-lg-9">
                                                        <textarea  class="form-control" cols="20" rows="5" disabled><?php echo $onsite['reason']?></textarea>
                                                        <br><br>
                                                <?php if($onsite['status'] != 'Approved'){ ?> 
                                                        <form action="" method="post">
                                                <button class="btn btn-primary" onclick="return confirm('Are You Sure You want to Approve?')"  type="submit" name="approved">Approved</button> <button class="btn btn-danger" onclick="return confirm('Are You Sure You want to Cancel And Delete?')" type="submit" name="delete">Delete Request</button>
                                                </form>
                                                <?php }else{  ?>  
                                                    
                                                    <h1>Already Approved</h1>
                                                    <?php }?>
                                                
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
    </div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>