<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 9;
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include "adminfunction.php";
include "head.php";

error_reporting(0);


    if(isset($_GET['overview']))
    {
       $editq = $_GET['overview'];
        $dess = mysqli_query($con,"SELECT * FROM contactusmessage where cntmID=".$editq."");
        $details = mysqli_fetch_assoc($dess);
        if($details['status'] == "replied"){ $status = "replied";}else{ $status = "seen";}
        $sql = mysqli_query($con,"UPDATE contactusmessage SET status = '$status' where cntmID=".$editq." ");
      
    }
    
if(isset($_POST['submit'])){
    $reply = $_POST['reply'];
    $email = $details['cntmEmail'];
    $subject = "Replied To Your Inquires";
    $legend = "Hi : $email";
    replyadmin($email, $subject, $reply, $legend);
    $sql = mysqli_query($con,"UPDATE contactusmessage SET reply='$reply', status = 'replied' where cntmID=".$editq." ");
    echo "<script>alert('Done Update');window.location.href='externalmessage.php'</script>";
}

?>
<body>

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
                                <h4 class="card-title">Message Details</h4>
                                    <div class="line"></div>
                                        <br>
                                    <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                                         <a href="externalmessage.php"><button type="button" class="btn btn-block btn-outline-dark">Back</button></a>
                                     </div>
                                    
                                </div>
                                 <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Sender's Name</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" value="<?php echo $details['cntmFname']?>" disabled>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Email</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" value="<?php echo $details['cntmEmail']?>" disabled>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Subject</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $details['cntmSubject']?>" disabled>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Message</label>
                                                    <div class="col-lg-9">
                                                        <textarea class="form-control"  cols="20" rows="5" disabled><?php echo $details['cntmMessage']?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-6">
                                            <form action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Your Reply</label>
                                                    <div class="col-lg-9">
                                                        <textarea name="reply" class="form-control" cols="20" rows="10" ><?php echo $details['reply']?></textarea>
                                                    </div>
                                                </div>
                                           
                                            <div class="form-group row">
                                            <label class="col-lg-3 col-form-label"></label>
                                                <div class="col-lg-9">
                                                   <button type="submit" class="btn-primary form-control text-white" name="submit">Proceed</button>
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


<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>