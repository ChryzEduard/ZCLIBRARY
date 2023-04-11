<?php 
session_start();
include "connection.php";
include "mail-send.php";
$email = $_SESSION['email'];

    $check_code_existence = "SELECT libraryUserCode FROM libraryUser WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_code_existence);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE libraryUser SET libraryUserCode = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if($run_query){
            $subject = "Password New Reset Code";
            $message = "Your password new reset code is $code";
            $sender = "test aragon";
            if(emails($email, $subject, $message, $sender, "sdhabd")){
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: ./reset-code.php');
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
?>