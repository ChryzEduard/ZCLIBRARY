<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require "vendor/autoload.php";
/*
function emails($email, $subject, $message, $sender, $legend){
    $mail = new PHPMailer; 
    try {
    $mail->isSMTP();                      // Set mailer to use SMTP 
    $mail->Host = 'smtp-relay.sendinblue.com';       // Specify main and backup SMTP servers 
    $mail->SMTPAuth = true;               // Enable SMTP authentication 
    $mail->Username = 'argonfernando453@gmail.com';   // SMTP username 
    $mail->Password = 'jQ3WrOKLIDpxnv7f';   // SMTP password 
    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
    $mail->Port = 587;                    // TCP port to connect to 
    
    // Sender info 
    $mail->setFrom('argonfernando453@gmail.com', 'Event Horizon'); 
    $mail->addAddress($email);

    
    // Set email format to HTML 
    $mail->isHTML(true); 
    
    $mail->Subject = $subject;
    $mail->Body    = "<fieldset><legend>".$legend."</legend>".$message."</fieldset>";
    
    // Send email 
    if(!$mail->send()) { 
        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    } else { 
        header('location: user-otp.php');
    } 
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
*/

function createcatal($email, $subject, $message, $legend){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp-relay.sendinblue.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'argonfernando453@gmail.com'; //SMTP username
        $mail->Password = 'xsmtpsib-42c9ff6674a550bdaa6b6c94f156c232a358d69bd4087e78d776634fd25fd7a3-79dYzqtZ2V5Fb8MR'; //SMTP password
        $mail->SMTPSecure = 'tls'; //Enable TLS encryption
        $mail->Port = 587; //TCP port to connect to

        // Set this property to false to disable automatic TLS encryption
        $mail->SMTPAutoTLS = false;

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress($email/*',Joe User'*/); //Add a recipient

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = "<fieldset><legend>".$legend."</legend>".$message."</fieldset>";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

/*    $mail = new PHPMailer(true);


    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-relay.sendinblue.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'argonfernando453@gmail.com';                     //SMTP username
        $mail->Password   = 'jQ3WrOKLIDpxnv7f';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('argonfernando453@gmail.com', 'Mailer sample sana gumana kana');
        $mail->addAddress($email);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        //$mail->Subject = 'Here is the subject';
        $mail->Subject = $subject;
        $mail->Body    = "<fieldset><legend>".$legend."</legend>".$message."</fieldset>";
       
    
        if(!$mail->send()) { 
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
        } else { 
            header('location: thankyou.php');
        } 
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}*/
/*
function notifyentrymsg($email, $subject, $message, $sender, $legend){
    $mail = new PHPMailer; 
    try {
    $mail->isSMTP();                      // Set mailer to use SMTP 
    $mail->Host = 'smtp-relay.sendinblue.com';       // Specify main and backup SMTP servers 
    $mail->SMTPAuth = true;               // Enable SMTP authentication 
    $mail->Username = 'argonfernando453@gmail.com';   // SMTP username 
    $mail->Password = 'jQ3WrOKLIDpxnv7f';   // SMTP password 
    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
    $mail->Port = 587;                    // TCP port to connect to 
    
    // Sender info 
    $mail->setFrom('argonfernando453@gmail.com', 'Event Horizon'); 
    $mail->addAddress("argonfernando453@gmail.com");

    
    // Set email format to HTML 
    $mail->isHTML(true); 
    
    $mail->Subject = $subject;
    $mail->Body    = "<fieldset><legend>".$legend."</legend>".$message."</fieldset>";
    
    // Send email 
    if(!$mail->send()) { 
        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    } else { 
        header('location: thankyou.php');
    } 
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}


function bookres($subject, $message, $legend){
    $mail = new PHPMailer; 
    try {
    $mail->isSMTP();                      // Set mailer to use SMTP
    $mail->Host = 'smtp-relay.sendinblue.com';       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;               // Enable SMTP authentication
    $mail->Username = 'argonfernando453@gmail.com';   // SMTP username
    $mail->Password = 'jQ3WrOKLIDpxnv7f';   // SMTP password
    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                    // TCP port to connect to
    
    // Sender info
    $mail->setFrom('argonfernando453@gmail.com', 'Event Horizon');
    $mail->addAddress("argonfernando453@gmail.com");

    
    // Set email format to HTML 
    $mail->isHTML(true); 
    
    $mail->Subject = $subject;
    $mail->Body    = "<fieldset><legend>".$legend."</legend>".$message."</fieldset>";
    
    // Send email 
    if(!$mail->send()) { 
        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    } else { 
       echo "<script>alert('Book Request Send')</script>";
    } 
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

*/

?>