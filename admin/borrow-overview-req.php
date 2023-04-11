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
        $editbooks = mysqli_query($con,"select reserve.validID , reserve.resereID , reserve.reason ,reserve.datestart ,reserve.dateend,reserve.status,books.bookTitle ,books.isbn ,libraryuser.libraryUserFirtsName, libraryuser.email ,libraryuser.libraryUserLastName from reserve join libraryuser on libraryuser.libraryUserId = reserve.libraryUserId join books on books.bookId = reserve.bookId where reserve.resereID =".$ov."");
        $boook = mysqli_fetch_array($editbooks);
        $resID = $boook['resereID'];
        $eml = $boook['email'];
        $ttl = $boook['bookTitle'];
    }
    if(isset($_POST['approved']))
    {    $subject = "Your Book Request '$ttl' Approved";
        $message = "Your Book Request titled <u>$ttl</u> <br>
        Was Approved By the Admin of the City library <br> 
        You can now visit the library and Claim the book <br>
        If you will not claim the book before the Set Due date <u>".$boook['dateend']."</u><br>
        The Request will Automatically Deleted by The System.
        <br> - Admin ";
        $legend = "Request Approved";
        accpt($eml, $subject, $message,$legend);
        $sql = mysqli_query($con,"update reserve set status='Approved' where resereID = $resID;");
        echo "<script>alert('Book Request Approved');window.location.href = 'borrow.php'</script>";
    }
    if(isset($_POST['delete']))
    {
        $reson = $_POST['reasons'];
        if(empty($reson)){
            $errors['reson'] = "State your reason";
        }
        if(count($errors) === 0){
        $subject = "Your Book Request '$ttl' Denied";
        $message = "Reasons for Disapproved : <br><br> $reson <br><br><br> - Admin ";
        $legend = "Request Denied";
        resondel($eml, $subject, $message, $legend);
        $sql = mysqli_query($con," delete from reserve where resereID = $resID;");
        echo "<script>alert('Book Request Deleted');window.location.href = 'borrow.php'</script>";
    }
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
                                <h4 class="card-title">OFF Site Request Book</h4>
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
                                                <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?><?php if($boook['status'] != 'Approved' && $boook['status'] != 'Book Returned'){?>  
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Actions</label>
                                                    <div class="col-lg-9">
                                                        <div class="d-inline-flex ml-3">
                                                            
                                                            <form action="" method="post">
                                                                <button class="btn btn-primary" onclick="return confirm('Are You Sure You want to Approve?')"  type="submit" name="approved">Approved</button> 
                                                            </form> 
                                                            <button style="margin-left: 20px;"class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" >Delete Request</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }else{ ?>
                                                    
                                                    <div class="form-group row">
                                                <label class="col-lg-3 col-form-label"> </label>
                                                    <div class="col-lg-9">
                                                        <div class="d-inline-flex ml-3">
                                                            
                                                            <h1>Approved Already</h1>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                    <?php } ?>

                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                           
                                            <div class="modal-header">
                                            <form action="" method="post">
                                            <div class="d-inline-flex">
                                            <h5 class="modal-title">Reasons for Deleting</h5>
                                            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close" data-original-title="" title=""><span aria-hidden="true">×</span></button>
                                            </div></div>
                                            <div class="modal-body">
                                            <textarea class="form-control" name="reasons" id="" cols="30" rows="5"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                           <button class="btn btn-primary" type="submit"  name="delete">Send and Delete</button>
                                            </div>
                                            </form>
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
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>