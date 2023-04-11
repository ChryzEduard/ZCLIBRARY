<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; ?>


<?php 

include "adminfunction.php";
error_reporting(0);
$a = 0;


if(isset($_GET['user'])){
    $user = $_GET['user'];
    $extrn = mysqli_query($con,"SELECT * FROM libraryuser where libraryUserId= '".$user."'");
    $accdetailes = mysqli_fetch_array($extrn);
}


if(isset($_POST['update'])){


    if($_FILES['lis_img0']['name']!=''){
        $lis_img0 = $_FILES['lis_img0']['name'];
        }
        else{
          $lis_img0 = $accdetailes["libraryUserpicture"];
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
        $insertdata = mysqli_query($con,"UPDATE libraryuser SET libraryUserpicture ='$lis_img0',libraryUserFirtsName = '$first', libraryUserLastName = '$last',contactNumber = '$number', libraryUseAge = '$age', librarylocation = '$address' where libraryUserId= $user");
    echo "<script>alert('Updated Successfully');</script>
        <script>window.location.href = 'catallist.php'</script>";
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
                        <h3 class="page-title"></h3>
                            <ul class="breadcrumb">
                               
                            </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    
                        <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Cataloger's Profile</h5>
                        </div>
                            <div class="card-body">
                            <form method="POST"  enctype="multipart/form-data">
                                <div class="row">
                                <div class="col-md-4 mb-3">
                                <img src="../assets/images/alluserprofiles/<?php echo $accdetailes['libraryUserpicture']?>" alt="<?php echo $accdetailes['libraryUserpicture']?>"   width="200px" height="200px">
                                    
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01">Profile picture</label>
                                    <input type="file" class="form-control" name="lis_img0" value ="<?php echo $accdetailes['libraryUserpicture']?>">
                                </div>
                                    
                            </div> 
                                    <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">First name</label>
                                        <input type="text" class="form-control <?php echo $inputdataforfirst?>" id="validationServer01" value="<?php echo $accdetailes['libraryUserFirtsName']?>" placeholder="First Name" name="first">
                                        <div class="<?php echo $feedbackdataforfirst?>"><?php echo $feedbackTextforfirst?></div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Last name</label>
                                        <input type="text" class="form-control <?php echo $inputdataforlast?>" id="validationServer01" value="<?php echo $accdetailes['libraryUserLastName']?>" placeholder="Last Name" name="last">
                                        <div class="<?php echo $feedbackdataforlast?>"><?php echo $feedbackTextforlast?></div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Age</label>
                                        <input type="number" class="form-control <?php echo $inputdataforage?>" id="validationServer01" value="<?php echo $accdetailes['libraryUseAge']?>" placeholder="Age" name="age">
                                        <div class="<?php echo $feedbackdataforage?>"><?php echo $feedbackTextforage?></div>
                                    </div>
                                    
                                    <div class="col-md-4 mb-3">
                                        <label for="validationServer01">Contact Number</label>
                                        <input type="text" class="form-control <?php echo $inputdatafornumber?>" id="validationServer01"  value="<?php echo $accdetailes['contactNumber']?>" placeholder="Contact" name="number">
                                        <div class="<?php echo $feedbackdatafornumber?>"><?php echo $feedbackTextfornumber?></div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationServer01">Address</label>
                                        <input type="text" class="form-control <?php echo $inputdataforaddress?>" id="validationServer01" value="<?php echo $accdetailes['librarylocation']?>"  placeholder="Address" name="address">
                                        <div class="<?php echo $feedbackdataforaddress?>"><?php echo $feedbackTextforaddress?></div>
                                    </div>
                                    </div>
                                    
                                </div>
                                <button class="btn btn-primary" type="submit" name="update">Submit form</button>
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