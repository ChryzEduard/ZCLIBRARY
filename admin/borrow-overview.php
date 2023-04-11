<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 13;
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
        $editbooks = mysqli_query($con,"select reserve.validID , reserve.resereID , reserve.flag , reserve.reason ,reserve.datestart ,reserve.dateend,reserve.status,books.bookTitle ,books.isbn ,libraryuser.libraryUserFirtsName ,libraryuser.libraryUserLastName from reserve join libraryuser on libraryuser.libraryUserId = reserve.libraryUserId join books on books.bookId = reserve.bookId where reserve.resereID =".$ov."");
        $boook = mysqli_fetch_array($editbooks);
        $resID = $boook['resereID'];
    }
    
    
    if(isset($_POST['surrendered']))
    {
        $sql = mysqli_query($con,"Delete from reserve where resereID = $resID;");
        echo "<script>alert('Book Succesfully Returned');window.location.href = 'borrow.php'</script>";
    }

    if(isset($_POST['claim']))
    {
        $sql = mysqli_query($con,"update reserve set flag=1 where resereID = $resID;");
        echo "<script>alert('Book Succesfully Returned');window.location.href = 'borrow-overview.php?overview=$resID'</script>";
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
                                <h4 class="card-title">Borrow Book Details</h4>
                                    <div class="line"></div>
                                      
                                    
                                </div>
                                 <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Presented Valid ID</label>
                                                        <div class="col-lg-9">
                                                            <img class="imgreserve" src="../assets/images/validIDs/<?php echo $boook['validID']?>" alt="<?php echo $boook['bookprofile']?>">
                                                            
                                                        </div>
                                                 </div>
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">ISBN</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" value="<?php echo $boook['isbn']?>" disabled>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Title</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $boook['bookTitle']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Date Start</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $boook['datestart']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Date End</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $boook['dateend']?>" disabled>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                            <div class="col-xl-6">
                                                
                                            <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Borrower Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control"  value="<?php echo $boook['libraryUserFirtsName']." ".$boook['libraryUserLastName']?>" disabled>
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Reason</label>
                                                    <div class="col-lg-9">
                                                        <textarea  class="form-control" cols="20" rows="5" disabled><?php echo $boook['reason']?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label"></label>
                                                    <div class="col-lg-9">
                                                    <?php if( $boook['flag'] == 1){  ?>
                                                <?php if( $boook['status'] == "RETURN BOOK"){  ?>
                                                    <form action="" method="post">
                                                <button class="btn btn-danger" onclick="return confirm('<?php echo $boook['libraryUserFirtsName'].' '.$boook['libraryUserLastName']?> Returning the Book?')"  type="submit" name="surrendered"><?php echo $boook['libraryUserFirtsName']." ".$boook['libraryUserLastName']?> is Schedule to Surrender The Book</button> 
                                                </form>
                                                <?php  }else{ ?> 
                                                
                                                    <form action="" method="post">
                                                        <div class="row">
                                                    <div class="col-md-12 mx-auto">
                                                    <div class="card"><div class="card-body"><h6>CLAIMED</h6> <button class="btn btn-primary " onclick="return confirm('<?php echo $boook['libraryUserFirtsName'].' '.$boook['libraryUserLastName']?> Returning the Book?')"  type="submit" name="surrendered"> Return Book</button> </div></div>
                                                
                                                
                                                </div></div></form>
                             
                                                <?php }  ?>
                                                <?php }else{ ?>

                                                    <form action="" method="post">
                                                        <div class="row">
                                                    <div class="col-md-6 mx-auto">
                                                <button class="btn btn-warning " onclick="return confirm('<?php echo $boook['libraryUserFirtsName'].' '.$boook['libraryUserLastName']?> claiming the Book?')"  type="submit" name="claim">Unclaimed Book</button> 
                                                
                                                </div></div></form>
                                                    <?php }  ?>
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