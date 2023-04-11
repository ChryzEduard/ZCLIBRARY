<?php require_once "./controllerUserData.php"; ?>
<?php require_once "./plugin/vendor/autoload.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<?php

include "head.php"?>
<style>
    input[type=text]:focus {
  border: 3px solid var(--dark);
}
</style>
<body>
<?php 
$a =3;


if(isset($_POST['contactus'])){
    $date = date("l, F jS Y");
    $time = time();
    if(isset($_POST['fname'])){
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['fname'])) {
            $errors['fname']  = "Your Name contains special characters.";
        } else if (preg_match('/\d/', $_POST['fname'])) {
            $errors['fname']  = "Your Name contains numbers.";
        } else {
            $fname = $_POST['fname'];
        }
    } else {
        $errors['fname']  = "Please input your Whole Name";
    }
    if(isset($_POST['email'])){
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email']  = "Invalid Email Format";
        } else {
            $email = $_POST['email'];
        }
    } else {
        $errors['email']  = "Please input your Email";
    }

    if(isset($_POST['subject'])){
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['subject'])) {
            $errors['subject']  = "Your Subject contains special characters.";
        } else if (preg_match('/\d/', $_POST['subject'])) {
            $errors['subject']  = "Your Subject contains numbers.";
        } else {
            $subject = $_POST['subject'];
        }
    } else {
        $errors['subject']  = "Please input your subject for message";
    }

    if(isset($_POST['message'])){
        if (preg_match('/[\'^$%*()}{@#~?><>|=_+¬-]/', $_POST['message'])) {
            $errors['message']  = "Your Message contains Restrited special characters.";
        }else {
            $message = $_POST['message'];
        }
    } else {
        $errors['message']  = "Please input your Message";
    }

    if(empty($fname)){
        $errors['fname1'] = "Please input your Whole Name";
    }
    if(empty($email)){
        $errors['emailq'] = "Please input your Email";
    }
    
    if(empty($subject)){
        $errors['subjectq'] = "Please input your subject for message";
    }

    if(empty($message)){
        $errors['messageq'] = "Please input your Message";
    }



      if(count($errors) === 0){
        $legend = "You Had New Recieve Inquiries from - $fname";
        notifyentrymsg($email, $subject, $message, $sender, $legend);

        $mz = mysqli_query($con, "SHOW TABLE STATUS LIKE 'contactusmessage'");
        $mx = mysqli_fetch_assoc($mz);
        $maximun = $mx['Auto_increment'];
    
        $destination = "messagedetail.php?overview=$maximun";    

    $noficationDetails = "You have new External Message from <b>".$fname."</b>, Go to See the Message on external messages</b>";
      $insertdata = mysqli_query($con,"INSERT INTO contactUSMessage(cntmFname, cntmEmail, cntmSubject,cntmMessage,date, time)VALUES('$fname','$email','$subject','$message','$date', '$time')");
      $insertdata2 = mysqli_query($con,"INSERT INTO notification(noficationDetails,destination, time)VALUES('$noficationDetails','$destination','$time')");
      echo "<script>alert('Send Successfully');</script>
          <script>window.location.href = 'thankyou.php'</script>";
      }
 
  }




include "topbar.php"?>
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinners">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div><br><br><br>
        <p style="display: flex; position: relative; right : 55px; width:200px"><?php echo $external_info['siteTitle']?></p>
    </div>
    </div>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Contact Us</h1>
                    <a href="index.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="contact.php" class="h5 text-white">Contact US</a>    
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Contact Start -->
    <div class="container-fluid py-2 wow fadeInUp " data-wow-delay="0.1s" id="contact">
        <div class="container py-2">
            <div class=" text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 75d0px;">
                <h1 class="mb-0">If you have any formal inqueries or concerns, please don't hesitate to reach out to us.</h1>
            </div>
            </div>
            <div class="row g-5" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-lg-6 wow slideInUp" >
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
            <form action="" method="post" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-primary text-white px-4" placeholder="Your  Full Name" name="fname" style="height: 55px;" onFocus="this.style.borderColor='red';" onBlur="this.style.borderColor='blue';">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-primary text-white px-4" placeholder="Your Email" name="email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0 bg-primary  text-white px-4" placeholder="Subject" name="subject" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-primary  text-white px-4 py-3" rows="4" placeholder="Message" name="message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success w-100 py-3" type="submit" name="contactus">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


   <?php include "footer.php"?>
   <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top" style="background-color: var(--dark)"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>