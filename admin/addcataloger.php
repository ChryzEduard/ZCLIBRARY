<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 0;
include "adminfunction.php";

if(isset($_POST['create_catal'])){
    $emailcatal = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if(empty($emailcatal) || empty($password) || empty($cpassword)){
        $errors['empty'] = "please fill all credentials";
    }
    if($password !== $cpassword){
        $errors['libraryUserPassword'] = "Confirm password not matched!";
    }
    $emailcatal_check = "SELECT * FROM libraryuser WHERE email = '$emailcatal'";
    $res = mysqli_query($con, $emailcatal_check);
    if(mysqli_num_rows($res) > 0){
        $errors['libraryUserEmail'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO libraryuser (email, password, libraryUserCode, libraryUserRole, libraryUserStatus)
                        values('$emailcatal', '$encpass', '$code', 2, '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $legend = "Code Verification";
            $message = "Greetings $emailcatal: <br> The Administrator of ".$external_info['siteTitle']."
            Assigned you to become Cataloger of the said system <br> 
            Please use the verification code below to verify the e-mail used to to log in:
                <br>
                <h3>$code</h3>
                <br>
                Email account : $emailcatal <br> Your Password : $password  
                <br>
                This code will expire in 30 minutes upon issuance of this email. If you did not cause this action, disregard this e-mail.";
            $sender = "test from aragon";
           
            if(createcatal($emailcatal, $subject, $message, $legend)){
                
                header('location: addcataloger.php');
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php";?>
<body>

<div class="main-wrapper">
    <?php include "header.php"?>
    <?php include "sidebar.php"?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">     
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                     <h4 class="card-title">Register Catalogers</h4>
                                </div>
                            <div class="card-body"><?php
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
                                <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-lg-10">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text" id="basic-addon1">Email</span>
                                                </div>
                                                 <input type="email" class="form-control"   name="email">
                                            </div>
                                            
                                         </div>
                                         
                                         
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-10">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text" id="basic-addon1">Password</span>
                                                </div>
                                                 <input type="password" class="form-control"   name="password">
                                            </div>
                                            
                                         </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-10">
                                             <div class="input-group">
                                                 <div class="input-group-prepend">
                                                     <span class="input-group-text" id="basic-addon1">Confirm Password</span>
                                                </div>
                                                 <input type="password" class="form-control"   name="cpassword">
                                            </div>
                                            
                                         </div>
                                    </div>
                                    <button class="btn btn-primary" onclick="return confirm('Are you sure?')" type="submit" name = "create_catal">create account</button>
                             </form>
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