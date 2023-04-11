<?php 
session_start();
error_reporting(0);
require "connection.php";
include "mail-send.php";
$email = "";
$name = "";
$errors = array();
$time = time();
$date = date("l, F jS Y");
if(isset($_POST['signup'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['libraryUserPassword'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM libraryuser WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['libraryUserEmail'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $datepetsa = date("l, F jS Y");
        $insert_data = "INSERT INTO libraryuser (email, password, libraryUserCode, libraryUserStatus, date)
                        values('$email', '$encpass', '$code', '$status',  '$datepetsa')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $legend = "Code Verification";
            $message = "Greetings $email: <br> You have successfully registered to the Zamboanga City Library Management System. 
            Please use the verification code below to verify the e-mail used to register:
                <br>
                <h3>$code</h3>
                <br>";
                
            $noficationDetails = "<b>You have Newly Registered User for this day - $date</b>";
            $insertdata2 = mysqli_query($con,"INSERT INTO notification(noficationDetails, time)VALUES('$noficationDetails','$time')");
            if(emails($email, $subject, $message, $legend)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button USE IN CREATE ACCOUNT
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM libraryUser WHERE libraryUserCode = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['libraryUserCode'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE libraryUser SET libraryUserCode = $code, libraryUserStatus = '$status' WHERE libraryUserCode = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                if($fetch['libraryUserRole'] == 1 ){
                    echo "<script>alert('Please Log in , your account is now verified, thank you'); window.location.href='./admin/home.php'</script>";
                    exit();
                  }elseif($fetch['libraryUserRole'] == 2 ){
                    echo "<script>alert('Please Log in , your account is now verified, thank you'); window.location.href='./cataloger/home.php'</script>";
                    exit();
                  }else{
                     echo "<script>alert('Please Log in , your account is now verified, thank you'); window.location.href='./user/home.php'</script>";
                   
                    exit();
                  }
                  
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM libraryUser WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['libraryUserStatus'];
                $statID = $fetch['libraryUserId'];
                if($status == 'verified'){
                    $_SESSION['id'] = $statID;
                    $stat = mysqli_query($con,"update libraryuser set availabiltyONOFF = 'online' where libraryUserId = $statID");
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  if($fetch['libraryUserRole'] == 1 ){
                    header('location: ./admin/home.php');
                    exit();
                  }elseif($fetch['libraryUserRole'] == 2 ){
                    header('location: ./cataloger/profile.php');
                    exit();
                  }else{
                    header('location: ./user/home.php');
                    exit();
                  }
                    
                }else{
                    $info = "It looks like you haven't verify your email yet - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It looks like you're not yet a member. You can sign up by clicking on the link provided at the bottom.";
        }
    }





    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM libraryUser WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE libraryUser SET libraryUserCode = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $legend = "Reset Password";
                $subject = "Password Reset Code";
                $message = "<h2>Greetings $email:</h2> <br> <h4>You have requested a temporary passcode for your account. 
                Please use the recovery code below to login to your e-mail to reset your password:</h4>
                    <br>
                    <h3>$code</h3>
                    <br>
                    <br>
                    <h4>This code will expire in 30 minutes upon issuance of this email. If you did not cause this action, disregard this e-mail.</h4>";
                
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                if(retreivepass($email, $subject, $message, $legend)){
                    $info = "We've sent a password reset otp to your email - $email";

                    header("location: reset-code.php");
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }
    







    //if user click continue button in forgot password form
   
    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM libraryUser WHERE libraryUserCode = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $noficationDetails = "User Email <b> $email </b> Updated its Account Password";
            $insertdatas2 = mysqli_query($con,"INSERT INTO notification(noficationDetails, time)VALUES('$noficationDetails','$time')");
            
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE libraryUser SET libraryUserCode = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Account password changed, you may now login.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
                exit();
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }

    $datestart = date('Y-m-d'); //03-22-01
    $time = time();
    $cr = mysqli_query($con,"select * from system_core where coreID = 1");
$core = mysqli_fetch_array($cr);
$soc = mysqli_query($con,"select * from social_media;");
$mnth = date('m');
$month_name = date('F', mktime(0, 0, 0, $mnth, 1));
$allm = mysqli_query($con,"select * from event order by monthname(eventDate) ASC");
$todayevent = mysqli_query($con,"select * from event where monthname(eventDate) = '$month_name' and eventDate = '".$datestart."'");

$today = new DateTime();
$tomorrow = $today->modify('+1 day')->format('Y-m-d');
$month_name = date('F', strtotime($tomorrow));
$tomorrow_events = mysqli_query($con, "SELECT * FROM event WHERE monthname(eventDate) = '$month_name' AND eventDate = '$tomorrow'");

?>