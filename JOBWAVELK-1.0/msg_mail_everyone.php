<?php

include('include/connection.php');

if(isset($_POST['send_message'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['message'];

    $message = "<br> Message From Home Page <br>Name : $name<br> Email : $email<br> Message:<br>$msg";

    $date = date("Y-m-d H:i:s");

    $message_upload = "INSERT INTO msg_anyone(name,email,subject,message,date) VALUES ('$name', '$email', '$subject', '$msg', '$date')";
    $result= mysqli_query($con, $message_upload);

}
else{
    header("Location: home.php#contact");
}
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through(if use gmail put gmail)
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'jobwavelk@gmail.com';                     //SMTP username
    $mail->Password   = 'lfvdtgzedascrvev';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('jobwavelk@gmail.com', 'JOBWAVElk');
    $mail->addAddress('jobwavelk@gmail.com', 'Joe User');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$subject";
    $mail->Body    = "$message";
    $mail->AltBody = '  This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


header("Location: Home.php#contact");