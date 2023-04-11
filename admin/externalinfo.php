<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 2;
error_reporting(0);

include "adminfunction.php";
if(isset($_POST['external_submit'])){
    $date = date("l F jS Y");
    if(isset($_POST['systemname'])){
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['systemname'])) {
            $inputdataforsystemname = "is-invalid";
            $feedbackdataforsystemname = "invalid-feedback";
            $feedbackTextforsystemname = "Error: string contains special characters.";
            $flagsystemname = true; 
        } else if (preg_match('/\d/', $_POST['systemname'])) {
            $inputdataforsystemname = "is-invalid";
            $feedbackdataforsystemname = "invalid-feedback";
            $feedbackTextforsystemname = "Error: string contains numbers.";
            $flagsystemname = true; 
        } else {
            $inputdataforsystemname = "is-valid";
            $feedbackdataforsystemname = "valid-feedback";
            $feedbackTextforsystemname = "Appears great";
            $systemname = $_POST['systemname']; 
            $flagsystemname = false; 
        }
    } else {
        $inputdataforsystemname = "is-invalid";
        $feedbackdataforsystemname = "invalid-feedback";
        $feedbackTextforsystemname = "Please input data.";
        $flagsystemname = true; 
    }
    
    
    if(isset($_POST['aboutus'])){
        if (preg_match('/[\^£$%*()}{@#~>|=_+¬]/', $_POST['aboutus'])) {
            $inputdataforaboutus = "is-invalid";
            $feedbackdataforaboutus = "invalid-feedback";
            $feedbackTextforaboutus = "Error: string contains special characters.";
            $flagaboutus = true; 
        }  else {
            $inputdataforaboutus = "is-valid";
            $feedbackdataforaboutus = "valid-feedback";
            $feedbackTextforaboutus = "Appears great";
            $aboutus = $_POST['aboutus']; 
            $flagaboutus = false; 
        }
    } else {
        $inputdataforaboutus = "is-invalid";
        $feedbackdataforaboutus = "invalid-feedback";
        $feedbackTextforaboutus = "Please input data.";
        $flagaboutus = true; 
    }


    if(isset($_POST['mission'])){
        if (preg_match('/[\^£$%*()}{@#~>|=_+¬]/', $_POST['mission'])) {
            $inputdataformission = "is-invalid";
            $feedbackdataformission = "invalid-feedback";
            $feedbackTextformission = "Error: string contains special characters.";
            $flagmission = true; 
        }  else {
            $inputdataformission = "is-valid";
            $feedbackdataformission = "valid-feedback";
            $feedbackTextformission = "Appears great";
            $mission = $_POST['mission']; 
            $flagmission = false; 
        }
    } else {
        $inputdataformission = "is-invalid";
        $feedbackdataformission = "invalid-feedback";
        $feedbackTextformission = "Please input data.";
        $flagmission = true; 
    }

    if(isset($_POST['vision'])){
        if (preg_match('/[\^£$%*()}{@#~>|=_+¬]/', $_POST['vision'])) {
            $inputdataforvision = "is-invalid";
            $feedbackdataforvision = "invalid-feedback";
            $feedbackTextforvision = "Error: string contains special characters.";
            $flagvision = true; 
        }  else {
            $inputdataforvision = "is-valid";
            $feedbackdataforvision = "valid-feedback";
            $feedbackTextforvision = "Appears great";
            $vision = $_POST['vision']; 
            $flagvision = false; 
        }
    } else {
        $inputdataforvision = "is-invalid";
        $feedbackdataforvision = "invalid-feedback";
        $feedbackTextforvision = "Please input data.";
        $flagvision = true; 
    }
    
    if(isset($_POST['contactus'])){
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['contactus'])) {
            $inputdataforcontactus = "is-invalid";
            $feedbackdataforcontactus = "invalid-feedback";
            $feedbackTextforcontactus = "Error: string contains special characters.";
            $flagcontactus = true; 
        } else {
            $inputdataforcontactus = "is-valid";
            $feedbackdataforcontactus = "valid-feedback";
            $feedbackTextforcontactus = "Appears great";
            $contactus = $_POST['contactus']; 
            $flagcontactus = false; 
        }
    } else {
        $inputdataforcontactus = "is-invalid";
        $feedbackdataforcontactus = "invalid-feedback";
        $feedbackTextforcontactus = "Please input data.";
        $flagcontactus = true; 
    }
    
    if(isset($_POST['email'])){
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $inputdataforemail = "is-invalid";
            $feedbackdataforemail = "invalid-feedback";
            $feedbackTextforemail = "Error: invalid email format.";
            $flagemail = true; 
        } else {
            $inputdataforemail = "is-valid";
            $feedbackdataforemail = "valid-feedback";
            $feedbackTextforemail = "Appears great";
            $email = $_POST['email']; 
            $flagemail = false; 
        }
    } else {
        $inputdataforemail = "is-invalid";
        $feedbackdataforemail = "invalid-feedback";
        $feedbackTextforemail = "Please input data.";
        $flagemail = true; 
    }
    
    if(isset($_POST['address'])){
        if (empty($_POST['address'])) {
            $inputdataforaddress = "is-invalid";
            $feedbackdataforaddress = "invalid-feedback";
            $feedbackTextforaddress = "Please input data.";
            $flagaddress = true; 
        } else {
            $inputdataforaddress = "is-valid";
            $feedbackdataforaddress = "valid-feedback";
            $feedbackTextforaddress = "Appears great";
            $address = $_POST['address']; 
            $flagaddress = false; 
        }
    } else {
        $inputdataforaddress = "is-invalid";
        $feedbackdataforaddress = "invalid-feedback";
        $feedbackTextforaddress = "Please input data.";
        $flagaddress = true; 
    }
    if ($flagsystemname == false && $flagaboutus == false && $flagcontactus == false && $flagemail == false  && $flagaddress == false  && $flagmission == false && $flagvision == false) {
        $sql = "SELECT * FROM libraryuser WHERE libraryUserId = $id";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $sql = "update external_info set siteTitle = '$systemname', about_us ='$aboutus', mission ='$mission', vision ='$vision',siteContact = '$contactus', siteEmail = '$email',siteAddress = '$address' , date = '$date', libraryUserId = '$id' where externalID = '1'";
                if (mysqli_query($con, $sql)) {
                echo "<script>alert('Updated Successfully');</script>
                 <script>window.location.href = 'externalinfo.php'</script>";
            } else {
                echo "Error inserting record: " . mysqli_error($conn);
            }
        } else {
            echo "Error: projectID does not exist in project table";
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
           
            <div class="row">
                <div class="col-sm-12">
                <div class="card">
                <div class="card-header">
                        <h5 class="card-title"> <i class="fi fi-rr-gears"></i> System External Details</h5><div class="line"></div><br>
                        
                        <p class="card-text">Last Update : <?php echo $external_info['date'] ." <br>Updated By: ".$external_info['libraryUserFirtsName']." ".$external_info['libraryUserLastName']?></p>
                        </div>
                        <div class="card-body">
                        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">Main System name</label>
                                        <input type="text" class="form-control <?php echo $inputdataforsystemname?>" id="validationServer01" value="<?php echo $external_info['siteTitle']?>" name="systemname">
                                    <div class="<?php echo $feedbackdataforsystemname?>"><?php echo $feedbackTextforsystemname?></div>
                                </div>
                                <div class="col-md-3 mb-3">
                            <label for="validationServer04">contact number</label>
                            <input type="text" class="form-control <?php echo $inputdataforcontactus?>" value="<?php echo $external_info['siteContact']?>" placeholder="contact number"  name="contactus">
                            <div class="<?php echo $feedbackdataforcontactus?>"><?php echo $feedbackTextforcontactus?></div>
                            </div>
                            <div class="col-md-3 mb-3"> 
                                <label for="validationServer05">email</label>
                                    <input type="text" class="form-control <?php echo $inputdataforemail?>" value="<?php echo $external_info['siteEmail']?>" placeholder="email" name="email">
                                        <div class="<?php echo $feedbackdataforemail?>"><?php echo $feedbackTextforemail?></div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="validationServer05">Address</label>
                                    <input type="text" class="form-control <?php echo $inputdataforaddress?>" value="<?php echo $external_info['siteAddress']?>" placeholder="address" name="address">
                                        <div class="<?php echo $feedbackdataforaddress?>"> <?php echo $feedbackTextforaddress?></div>
                            </div>
                            </div>
                            

                            <div class="row">
                            
                            <div class="col-md-4 mb-3">
                                <label for="validationServer03">About US</label>
                                <textarea rows="9" cols="5" class="form-control <?php echo $inputdataforaboutus?>" value="<?php echo $external_info['about_us']?>" name="aboutus"><?php echo $external_info['about_us']?></textarea>
                                <div class=" <?php echo $feedbackdataforaboutus?>"> <?php echo $feedbackTextforaboutus?></div>
                            </div>
                            
                           
                            <div class="col-md-4 mb-3">
                                <label for="validationServer03">Mission</label>
                                <textarea rows="9" cols="5" class="form-control <?php echo $inputdataformission?>" value="<?php echo $external_info['mission']?>" name="mission"><?php echo $external_info['mission']?></textarea>
                                <div class=" <?php echo $feedbackdataformission?>"> <?php echo $feedbackTextformission?></div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationServer03">Vision</label>
                                <textarea rows="9" cols="5" class="form-control <?php echo $inputdataforvision?>" value="<?php echo $external_info['vision']?>" name="vision"><?php echo $external_info['vision']?></textarea>
                                <div class=" <?php echo $feedbackdataforvision?>"> <?php echo $feedbackTextforvision?></div>
                            </div>
                            <button class="btn btn-primary" type="submit" name = "external_submit"><i class="fi fi-rr-settings"></i> Set System Details</button>
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