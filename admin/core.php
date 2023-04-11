<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 17;
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include "adminfunction.php";
include "head.php";

error_reporting(0);
$sm = mysqli_query($con,"select siteEmail from external_info where externalID = 1;");
$smtpmail = mysqli_fetch_array($sm);

    if(isset($_POST['core'])){

        $host = $_POST['host'];
        $password = $_POST['password'];
        $plugin = $_POST['plugin'];

 
       
        if(empty($host)){
            $errors['host'] = "Please Provide Host Detials";
        }
         
        if(empty($password)){
            $errors['password'] = "Please Provide a SMTP PASSWORD";
        }
        
      
        if(count($errors) === 0){
                $insertdata = mysqli_query($con,"UPDATE system_core SET smtppassword='$password', smtphost='$host', chatbotmsg='$plugin' where coreID = 1 ");
                echo "<script>alert('Updated Successfully');</script>
                    <script>window.location.href = 'core.php'</script>";
                }
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
                                <h4 class="card-title"> <i class="fi fi-rr-gears"></i> SYSTEM CORE</h4>
                                    <div class="line"></div>
                                    
                                </div>
                                 <div class="card-body">
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
                    ?>
                                     <form action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                        <div class="row">
                                            <div class="col-xl-6">
                                            <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">SMTP GMAIL</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" value="<?php echo $smtpmail['siteEmail']?>" disabled>
                                                        </div>
                                                </div>
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">SMTP HOST</label>
                                                        <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="host" value="<?php echo $core['smtphost']?>">
                                                         </div>
                                                 </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">SMTP PASSWORD</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="password" value="<?php echo $core['smtppassword']?>">
                                                    </div>
                                                    
                                                    <br><br><br><br>
                                                    <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Plugin Result</label>
                                                    <div class="col-lg-9">
                                                    <?php echo $core['chatbotmsg']?>
                                                    </div>
                                                </div>
                                                </div>

                                               
                                                

                                            </div>
                                            <div class="col-xl-6">
                                            <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">CHATBOT PLUGIN</label>
                                                    <div class="col-lg-9">
                                                        <textarea class="form-control" name="plugin" id="" cols="20" rows="15" ><?php echo $core['chatbotmsg']?></textarea>
                                                    </div>
                                                </div>
                                           
                                           
                                        </div>
                                    <div class="text-end">
                                <button type="submit" class="btn btn-primary" name="core"><i class="fi fi-rr-settings"></i> SET</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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


<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>