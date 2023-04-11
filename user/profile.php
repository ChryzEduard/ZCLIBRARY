

<!DOCTYPE html>
<html lang="en">
<?php include "head.php";
include "adminfunction.php";
error_reporting(0);
$use = mysqli_query($con,"select * from libraryuser where libraryUserId = $id;");
$user = mysqli_fetch_array($use);

$a = 2;
if(isset($_POST['update'])){
    
    if($_FILES['lis_img0']['name']!=''){
        $lis_img0 = $_FILES['lis_img0']['name'];
        }
        else{
          $lis_img0 = $user["libraryUserpicture"];
        }
        $tempname = $_FILES['lis_img0']['tmp_name'];
        $folder = "../assets/images/alluserprofiles/".$lis_img0;

    if(isset($_POST['first'])){
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['first'])) {
            $inputdataforfirst = "is-invalid";
            $feedbackdataforfirst = "invalid-feedback";
            $feedbackTextforfirst = "Error: string contains special characters.";
            $flagxfname = true; 
        } else if (preg_match('/\d/', $_POST['first'])) {
            $inputdataforfirst = "is-invalid";
            $feedbackdataforfirst = "invalid-feedback";
            $feedbackTextforfirst = "Error: string contains numbers.";
            $flagxfname = true; 
        } else {
            $inputdataforfirst = "is-valid";
            $feedbackdataforfirst = "valid-feedback";
            $feedbackTextforfirst = "Appears great";
            $first = $_POST['first']; 
            $flagxfname = false; 
        }
    } else {
        $inputdataforfirst = "is-invalid";
        $feedbackdataforfirst = "invalid-feedback";
        $feedbackTextforfirst = "Please input data.";
        $flagxfname = true; 
    }


    if(isset($_POST['last'])){
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['last'])) {
            $inputdataforlast = "is-invalid";
            $feedbackdataforlast = "invalid-feedback";
            $feedbackTextforlast = "Error: string contains special characters.";
            $flagxlname = true; 
        } else if (preg_match('/\d/', $_POST['last'])) {
            $inputdataforlast = "is-invalid";
            $feedbackdataforlast = "invalid-feedback";
            $feedbackTextforlast = "Error: string contains numbers.";
            $flagxlname = true; 
        } else {
            $inputdataforlast = "is-valid";
            $feedbackdataforlast = "valid-feedback";
            $feedbackTextforlast = "Appears great";
            $last = $_POST['last']; 
            $flagxlname = false; 
        }
    } else {
        $inputdataforlast = "is-invalid";
        $feedbackdataforlast = "invalid-feedback";
        $feedbackTextforlast = "Please input data.";
        $flagxfname = true; 
    }
    

    if(isset($_POST['age'])){
        $inputdataforage = "is-valid";
        $feedbackdataforage = "valid-feedback";
        $feedbackTextforage = "Appears great";
        $age = $_POST['age']; 
        $flagxage = false; 
    } else {
        $inputdataforage = "is-invalid";
        $feedbackdataforage = "invalid-feedback";
        $feedbackTextforage = "Please input data.";
        $flagxage = true; 
    }
    if(isset($_POST['address'])){
        $inputdataforaddress = "is-valid";
        $feedbackdataforaddress = "valid-feedback";
        $feedbackTextforaddress = "Appears great";
        $address = $_POST['address']; 
        $flagxaddress = false; 
    } else {
        $inputdataforaddress = "is-invalid";
        $feedbackdataforaddress = "invalid-feedback";
        $feedbackTextforaddress = "Please input data.";
        $flagxaddress = true; 
    }
    
    if(isset($_POST['number'])){
        $cp_number = $_POST['number'];
        $cp_number = preg_replace('/\D/', '', $cp_number);
        if (preg_match('/^09\d{9}$/', $cp_number)) {
            $inputdatafornumber = "is-valid";
            $feedbackdatafornumber = "valid-feedback";
            $feedbackTextfornumber = "Appears great";
            $number = $_POST['number']; 
            $flagxnumber = false; 
        } else {
            $inputdatafornumber = "is-invalid";
            $feedbackdatafornumber = "invalid-feedback";
            $feedbackTextfornumber = "The number is Not Phillipine format or incomplete";
            $flagxnumber = true; 
        }
    }
    if ($flagxfname == false && $flagxlname == false && $flagxage == false && $flagxnumber == false && $flagxaddress == false) {
       
        move_uploaded_file($tempname, $folder);
        $insertdata = mysqli_query($con,"UPDATE libraryuser SET libraryUserpicture ='$lis_img0',libraryUserFirtsName = '$first', libraryUserLastName = '$last',contactNumber = '$number', libraryUseAge = '$age', librarylocation = '$address' where libraryUserId=".$id."");
    echo "<script>alert('Updated Successfully');</script>
        <script>window.location.href = 'profile.php'</script>";
      }
     
}

if(isset($_POST['sendcode'])){
    $code = rand(999999, 111111);
    $subject = "Code to change password";
    $legend = "Code to change password";
    $message =  $message = "Greetings $email: <br> You are registered user to the Zamboanga City Library Management System. 
    Please use the verification code below to reset the password:
        <br>
        <h3>$code</h3>
        <br>
        <br>";
   $setcode = mysqli_query($con, "UPDATE libraryuser SET coderesetinteral = $code WHERE libraryUserId = $id ");
   ret($email, $subject, $message, $sender, $legend);
    

}

if(isset($_POST['changepass'])){
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if(empty($password) || empty($cpassword)){
        $errors['cpassword'] = "Please enter a password!";
    }elseif($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        
        
        $f = $fetch_info['libraryUserFirtsName'];
        $l = $fetch_info['libraryUserLastName'];
        $code = 0;
        
        $noficationDetails = "User Name <b> $f $l </b> Updated its Account Password";
        $insertdatas2 = mysqli_query($con,"INSERT INTO notification(noficationDetails, time)VALUES('$noficationDetails','$time')");
        
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE libraryUser SET coderesetinteral = $code, password = '$encpass' WHERE libraryUserId = '$id'";
        $run_query = mysqli_query($con, $update_pass);
        if($run_query){
       
            echo "<script>alert('Password Updated Successfully');window.location.href='home.php'</script>";
          
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}


?>

<body>

<?php 
    include "topbar2.php"?>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn"><i class="fi fi-rr-circle-user"></i> Profile</h1>
                    <a href="home.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="bookslist.php" class="h5 text-white">Book List</a> 
                
                </div>
            </div>
        </div>
    </div>
        <div class="container-fluid py-1 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-2">
                <div class="row">
                        <div class="col-sm-8">
                                <?php 
                                if(($fetch_info['libraryUserFirtsName'] == "update data") || ($fetch_info['libraryUserLastName']  == "update data") ){
                                         $ptitle = "Please update your information";
                                }else{
                                    $ptitle = "This are your Account Details";
                                }
                                ?>
                        <div class="card">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo $ptitle?></h5>
                        </div>
                            <div class="card-body">
                            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                <div class="row">
                                <div class="col-md-4 mb-3">
                                <img src="../assets/images/alluserprofiles/<?php echo $fetch_info['libraryUserpicture']?>" alt="<?php echo $fetch_info['libraryUserpicture']?>" width="200px" height="200px">
                                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Profile picture</label>
                                    <input type="file" class="form-control bg-primary text-white" name="lis_img0">
                                </div>
                                    
                            </div> 
                                    <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">First name</label>
                                        <input type="text" class="form-control <?php echo $inputdataforfirst?>" id="validationServer01" value="<?php echo $user['libraryUserFirtsName']?>" placeholder="First Name" name="first">
                                        <div class="<?php echo $feedbackdataforfirst?>"><?php echo $feedbackTextforfirst?></div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Last name</label>
                                        <input type="text" class="form-control <?php echo $inputdataforlast?>" id="validationServer01" value="<?php echo $user['libraryUserLastName']?>" placeholder="Last Name" name="last">
                                        <div class="<?php echo $feedbackdataforlast?>"><?php echo $feedbackTextforlast?></div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Age</label>
                                        <input type="number" class="form-control <?php echo $inputdataforage?>" id="validationServer01" value="<?php echo $user['libraryUseAge']?>" placeholder="Age" name="age">
                                        <div class="<?php echo $feedbackdataforage?>"><?php echo $feedbackTextforage?></div>
                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Contact Number</label>
                                        <input type="text" class="form-control <?php echo $inputdatafornumber?>" id="validationServer01"  value="<?php echo $user['contactNumber']?>" placeholder="Contact" name="number">
                                        <div class="<?php echo $feedbackdatafornumber?>"><?php echo $feedbackTextfornumber?></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Address</label>
                                        <input type="text" class="form-control <?php echo $inputdataforaddress?>" id="validationServer01" value="<?php echo $user['librarylocation']?>"  placeholder="Address" name="address">
                                        <div class="<?php echo $feedbackdataforaddress?>"><?php echo $feedbackTextforaddress?></div>
                                    </div>
                                    </div>
                                    
                                <button class="btn btn-primary" type="submit" name="update">Procced</button>
                                    </div></div>
                            </form>
                            
                        </div>
                        <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header "><h5> Change Password </h5></div>
                                    <div class="card-body">
                                   
                                            <?php 
                                            
                                            
                                            if(isset($_POST['passcode'])){
                                                if($_POST['code'] == $fetch_info['coderesetinteral']){
                                                        echo "<script>alert('Code is correct, please change your Password and Remember It')</script>";
                                                        ?>
                                                                <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                                                
                                                                <input type="password" name="password" id="" class="form-control" placeholder="New Password">
                                                                <br>
                                                                <input type="password" name="cpassword" id="" class="form-control" placeholder="Repeat New Password">
                                                                <br>
                                                                <br><button type="submit" class="btn btn-primary" name="changepass" value="true">Change Password</button>
                                                                </form>

                                                   <?php }else{
                                                    echo "wrong inputed passcode, please check yor email carefully";
                                                    ?> <br><br>
                                                    <button class="btn btn-secondary" onclick="window.location.href='profile.php'">Again</button>
                                                   <?php }
                                                }else{
                                            
                                            if(isset($_POST['sendcode'])){?> 
                                                <?php if(isset($passz)){?> 
                                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                                    <input type="text" name="code" id="" class="form-control" placeholder="Enter your Code Here"> <br>
                                                    <button type="submit" class="btn btn-primary" name="Change">change Password</button>
                                                </form>
                                                    <?php }else{?>
                                                        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                                    <input type="text" name="code" id="" class="form-control" placeholder="Enter your Code Here"> <br>
                                                    <button type="submit" class="btn btn-primary" name="passcode">Submit</button>
                                                </form>

                                                    <?php  } ?> 
                                                
                                                <?php  }else{ ?>  
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
                                                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                                        <button type="submit" class="btn btn-primary" name="sendcode" value="true">Send Code to Change Password</button>
                                                    </form>
                                                <?php  } }
                                                
                                                

?>  
                                    
                                    
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
    

    <?php include "footer.php";?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

  


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>