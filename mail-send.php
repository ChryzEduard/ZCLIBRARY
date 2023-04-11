<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'plugin/vendor/autoload.php';

function createcatal($email, $subject, $message, $legend){
include 'connection.php';
$cr = mysqli_query($con,"select * from system_core where coreID = 1");
$core = mysqli_fetch_array($cr);
$sm = mysqli_query($con,"select siteEmail from external_info where externalID = 1;");
$smtpmail = mysqli_fetch_array($sm);

$mail = new PHPMailer(true);

try {
    //Server settings
   $mail->SMTPDebug = 0;                    //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $core['smtphost'];                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $smtpmail['siteEmail'];                     //SMTP username
    $mail->Password   = $core['smtppassword'];                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'You are Now A Cataloger');
    $mail->addAddress($email);     //Add a recipient
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    //$mail->Subject = 'Here is the subject';
    //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->Subject = $subject;
    $mail->Body    = "<fieldset><legend>".$legend."</legend><b>to :sample run</b> <br><br> <b> ".$message."</b></fieldset>";
   
    if(!$mail->send()) { 
        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    } else { 
        echo "<script>alert('Successfully created');</script>
                <script>window.location.href='catallist.php'</script>";
    } 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}


function emails($email, $subject, $message, $legend){
include 'connection.php';
$cr = mysqli_query($con,"select * from system_core where coreID = 1");
$core = mysqli_fetch_array($cr);
$sm = mysqli_query($con,"select siteEmail from external_info where externalID = 1;");
$smtpmail = mysqli_fetch_array($sm);
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
       $mail->SMTPDebug = 0;                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $core['smtphost'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $smtpmail['siteEmail'];                     //SMTP username
        $mail->Password   = $core['smtppassword'];                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($smtpmail['siteEmail'], 'Account OTP');
        $mail->addAddress($email);     //Add a recipient
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        //$mail->Subject = 'Here is the subject';
        //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->Subject = $subject;
        $mail->Body    = "<fieldset><legend>".$legend."</legend><br><br> <b> ".$message."</b> </fieldset>";
       
        if(!$mail->send()) { 
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
        } else { 
            echo "<script>alert('Email Verification code sent, please check your gmail ');</script>
                    <script>window.location.href='user-otp.php'</script>";
        } 
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    }


    function retreivepass($email, $subject, $message, $legend){
        include 'connection.php';
        $cr = mysqli_query($con,"select * from system_core where coreID = 1");
        $core = mysqli_fetch_array($cr);
        $sm = mysqli_query($con,"select siteEmail from external_info where externalID = 1;");
        $smtpmail = mysqli_fetch_array($sm);
            $mail = new PHPMailer(true);
            
            try {
                //Server settings
               $mail->SMTPDebug = 0;                    //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = $core['smtphost'];                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $smtpmail['siteEmail'];                     //SMTP username
                $mail->Password   = $core['smtppassword'];                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom($smtpmail['siteEmail'], 'Retreive Password ');
                $mail->addAddress($email);     //Add a recipient
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');
            
                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                //$mail->Subject = 'Here is the subject';
                //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->Subject = $subject;
                $mail->Body    = "<fieldset><legend>".$legend."</legend> <br>".$message."</fieldset>";
               
                if(!$mail->send()) { 
                    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
                } else { 
                    echo "<script>alert('Email Reset code sent, please check your gmail ');</script>
                            <script>window.location.href=' reset-code.php'</script>";
                } 
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            }    

    
function notifyentrymsg($email, $subject, $message, $sender, $legend){
include 'connection.php';
$cr = mysqli_query($con,"select * from system_core where coreID = 1");
$core = mysqli_fetch_array($cr);
$sm = mysqli_query($con,"select siteEmail from external_info where externalID = 1;");
$smtpmail = mysqli_fetch_array($sm);
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
       $mail->SMTPDebug = 0;                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $core['smtphost'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $smtpmail['siteEmail'];                     //SMTP username
        $mail->Password   = $core['smtppassword'];                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($smtpmail['siteEmail'], 'Message Notification');
        $mail->addAddress($smtpmail['siteEmail']);     //Add a recipient
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        //$mail->Subject = 'Here is the subject';
        //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->Subject = $subject;
        $mail->Body    = "<fieldset><legend>".$legend."</legend><br><br> <b> ".$message."</b> : <br>".$message."</fieldset>";
       
        if(!$mail->send()) { 
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
        } else { 
            echo "<script>alert('Message Sent');</script>
                    <script>window.location.href='thankyou.php'</script>";
        } 
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    }
    
function bookres($subject, $message, $legend){
include 'connection.php';
$cr = mysqli_query($con,"select * from system_core where coreID = 1");
$core = mysqli_fetch_array($cr);
$sm = mysqli_query($con,"select siteEmail from external_info where externalID = 1;");
$smtpmail = mysqli_fetch_array($sm);
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
           $mail->SMTPDebug = 0;                    //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $core['smtphost'];                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $smtpmail['siteEmail'];                     //SMTP username
            $mail->Password   = $core['smtppassword'];                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($smtpmail['siteEmail'], 'Book Resevation Request');
            $mail->addAddress($smtpmail['siteEmail']);     //Add a recipient
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            //$mail->Subject = 'Here is the subject';
            //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->Subject = $subject;
            $mail->Body    = "<fieldset><legend>".$legend."</legend><br> <b>Reservation Reason :</b><br>  ".$message." </b> <br><br> - Check Details Now </fieldset>";
           
            if(!$mail->send()) { 
                echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
            } else { 
                echo "<script>alert('Book Request Send')</script>";
                        
            } 
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        }


        
function ret($email, $subject, $message, $legend){
    include 'connection.php';
    $cr = mysqli_query($con,"select * from system_core where coreID = 1");
    $core = mysqli_fetch_array($cr);
    $sm = mysqli_query($con,"select siteEmail from external_info where externalID = 1;");
    $smtpmail = mysqli_fetch_array($sm);
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
           $mail->SMTPDebug = 0;                    //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $core['smtphost'];                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $smtpmail['siteEmail'];                     //SMTP username
            $mail->Password   = $core['smtppassword'];                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($smtpmail['siteEmail'], 'Reset Password');
            $mail->addAddress($email);     //Add a recipient
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            //$mail->Subject = 'Here is the subject';
            //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->Subject = $subject;
            $mail->Body    = "<fieldset><legend>".$legend."</legend> <br><br> <b> ".$message."</b></fieldset>";
           
            if(!$mail->send()) { 
                echo 'Message could not be sent. Mailer Error: '; 
            } else { 
                echo "<script>alert('OTP code sent, Wait for your gmail to receive');</script>";
            } 
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: ";
        }
        }


        function replyadmin($email, $subject, $message,$legend){
            include 'connection.php';
            $cr = mysqli_query($con,"select * from system_core where coreID = 1");
            $core = mysqli_fetch_array($cr);
            $sm = mysqli_query($con,"select siteEmail from external_info where externalID = 1;");
            $smtpmail = mysqli_fetch_array($sm);
                $mail = new PHPMailer(true);
                
                try {
                    //Server settings
                   $mail->SMTPDebug = 0;                    //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = $core['smtphost'];                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = $smtpmail['siteEmail'];                     //SMTP username
                    $mail->Password   = $core['smtppassword'];                               //SMTP password
                    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom($smtpmail['siteEmail'], 'Admin Replied');
                    $mail->addAddress($email);     //Add a recipient
                    //$mail->addReplyTo('info@example.com', 'Information');
                    //$mail->addCC('cc@example.com');
                    //$mail->addBCC('bcc@example.com');
                
                    //Attachments
                    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    //$mail->Subject = 'Here is the subject';
                    //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->Subject = $subject;
                    $mail->Body    = "<fieldset><legend>".$legend."</legend> <br><br> <b> ".$message."</b></fieldset>";
                   
                    if(!$mail->send()) { 
                        echo 'Message could not be sent. Mailer Error: '; 
                    } else { 
                        echo "<script>alert('Successfull Send Reply');</script>";
                    } 
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: ";
                }
                }



                function returnbook($email, $subject, $message,$legend){
                    include 'connection.php';
                    $cr = mysqli_query($con,"select * from system_core where coreID = 1");
                    $core = mysqli_fetch_array($cr);
                    $sm = mysqli_query($con,"select siteEmail from external_info where externalID = 1;");
                    $smtpmail = mysqli_fetch_array($sm);
                        $mail = new PHPMailer(true);
                        
                        try {
                            //Server settings
                           $mail->SMTPDebug = 0;                    //Enable verbose debug output
                            $mail->isSMTP();                                            //Send using SMTP
                            $mail->Host       = $core['smtphost'];                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->Username   = $smtpmail['siteEmail'];                     //SMTP username
                            $mail->Password   = $core['smtppassword'];                               //SMTP password
                            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                        
                            //Recipients
                            $mail->setFrom($smtpmail['siteEmail'], 'Return Borrowed Book');
                            $mail->addAddress($email);     //Add a recipient
                            //$mail->addReplyTo('info@example.com', 'Information');
                            //$mail->addCC('cc@example.com');
                            //$mail->addBCC('bcc@example.com');
                        
                            //Attachments
                            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                        
                            //Content
                            $mail->isHTML(true);                                  //Set email format to HTML
                            //$mail->Subject = 'Here is the subject';
                            //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            $mail->Subject = $subject;
                            $mail->Body    = "<fieldset><legend>".$legend."</legend> <br><br> <b> ".$message."</b></fieldset>";
                           
                            if(!$mail->send()) { 
                                echo 'Message could not be sent. Mailer Error: '; 
                            } else { 
                                
                            } 
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: ";
                        }
                        }

                        function resondel($email, $subject, $message,$legend){
                            include 'connection.php';
                            $cr = mysqli_query($con,"select * from system_core where coreID = 1");
                            $core = mysqli_fetch_array($cr);
                            $sm = mysqli_query($con,"select siteEmail from external_info where externalID = 1;");
                            $smtpmail = mysqli_fetch_array($sm);
                                $mail = new PHPMailer(true);
                                
                                try {
                                    //Server settings
                                   $mail->SMTPDebug = 0;                    //Enable verbose debug output
                                    $mail->isSMTP();                                            //Send using SMTP
                                    $mail->Host       = $core['smtphost'];                     //Set the SMTP server to send through
                                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                    $mail->Username   = $smtpmail['siteEmail'];                     //SMTP username
                                    $mail->Password   = $core['smtppassword'];                               //SMTP password
                                    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                
                                    //Recipients
                                    $mail->setFrom($smtpmail['siteEmail'], 'Book Request Denied');
                                    $mail->addAddress($email);     //Add a recipient
                                    //$mail->addReplyTo('info@example.com', 'Information');
                                    //$mail->addCC('cc@example.com');
                                    //$mail->addBCC('bcc@example.com');
                                
                                    //Attachments
                                    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                                
                                    //Content
                                    $mail->isHTML(true);                                  //Set email format to HTML
                                    //$mail->Subject = 'Here is the subject';
                                    //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                    $mail->Subject = $subject;
                                    $mail->Body    = "<fieldset><legend>".$legend."</legend> <br><br> <b> ".$message."</b></fieldset>";
                                   
                                    if(!$mail->send()) { 
                                        echo 'Message could not be sent. Mailer Error: '; 
                                    } else { 
                                        echo "<script>alert('Delete Reason Sent')</script>";
                                    } 
                                } catch (Exception $e) {
                                    echo "Message could not be sent. Mailer Error: ";
                                }
                                }
                                function accpt($email, $subject, $message,$legend){
                                    include 'connection.php';
                                    $cr = mysqli_query($con,"select * from system_core where coreID = 1");
                                    $core = mysqli_fetch_array($cr);
                                    $sm = mysqli_query($con,"select siteEmail from external_info where externalID = 1;");
                                    $smtpmail = mysqli_fetch_array($sm);
                                        $mail = new PHPMailer(true);
                                        
                                        try {
                                            //Server settings
                                           $mail->SMTPDebug = 0;                    //Enable verbose debug output
                                            $mail->isSMTP();                                            //Send using SMTP
                                            $mail->Host       = $core['smtphost'];                     //Set the SMTP server to send through
                                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                            $mail->Username   = $smtpmail['siteEmail'];                     //SMTP username
                                            $mail->Password   = $core['smtppassword'];                               //SMTP password
                                            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                                            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                        
                                            //Recipients
                                            $mail->setFrom($smtpmail['siteEmail'], 'Book Request Approved');
                                            $mail->addAddress($email);     //Add a recipient
                                            //$mail->addReplyTo('info@example.com', 'Information');
                                            //$mail->addCC('cc@example.com');
                                            //$mail->addBCC('bcc@example.com');
                                        
                                            //Attachments
                                            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                                        
                                            //Content
                                            $mail->isHTML(true);                                  //Set email format to HTML
                                            //$mail->Subject = 'Here is the subject';
                                            //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                                            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                            $mail->Subject = $subject;
                                            $mail->Body    = "<fieldset><legend>".$legend."</legend> <br><br> <b> ".$message."</b></fieldset>";
                                           
                                            if(!$mail->send()) { 
                                                echo 'Message could not be sent. Mailer Error: '; 
                                            } else { 
                                            } 
                                        } catch (Exception $e) {
                                            echo "Message could not be sent. Mailer Error: ";
                                        }
                                        }
                    
            
    
    

?>