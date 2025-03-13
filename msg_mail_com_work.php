<?php
    session_start();
    include('include/connection.php');
    
    print_r($_SESSION);
    
    if(isset($_POST['send']) && isset($_SESSION['company'])){
        $subject = $_POST['subject'];
        $msg= $_POST['message'];
        $date = date("Y-m-d H:i:s");
        $com_id = $_SESSION['com_id'];


        $query1 = "SELECT * FROM user WHERE reg_id = $_SESSION[reg_id]";
        $result1 = mysqli_query($con, $query1);
        $row1 = mysqli_fetch_assoc($result1);
        
        $user_name = $row1['user_name'];
        $email = $row1['email'];

        $query2 = "INSERT INTO com_msg (com_id,subject,message,date) VALUES ('$com_id', '$subject', '$msg', '$date')";
        $result2 = mysqli_query($con, $query2);

        
        $message = "<br> Message From a Company <br>Comany Name : $user_name<br> Message:<br>$msg";

        

    }
    if(isset($_SESSION['workers']) && isset($_POST['send'])){
        $subject = $_POST['subject'];
        $msg= $_POST['message'];
        $date = date("Y-m-d H:i:s");
        $work_id = $_SESSION['work_id'];

        $query1 = "SELECT * FROM user WHERE reg_id = $_SESSION[reg_id]";
        $result1 = mysqli_query($con, $query1);
        $row1 = mysqli_fetch_assoc($result1);

        $user_name = $row1['user_name'];
        $email = $row1['email'];

        $query2 = "INSERT INTO work_msg (work_id,subject,message,date) VALUES ('$work_id', '$subject', '$msg', '$date')";
        $result2 = mysqli_query($con, $query2);

        
        $message = "<br> Message From a Worker <br>Worker Name : $user_name<br> Message:<br>$msg";


    }
    else{
        header("Location: company_dashboard.php");
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
    $mail->Host       = '';                     //Set the SMTP server to send through(if use gmail put gmail)
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             //Enable implicit TLS encryption
    $mail->Port       = ;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('', '');
    $mail->addAddress('', 'Joe User');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$subject";
    $mail->Body    = "$message";
    $mail->AltBody = '  This is the body in plain text for non-HTML mail clients';

    if(isset($_SESSION['company']) || isset($_SESSION['workers'])){
        $mail->send();
    }
        
        echo 'Message has been sent';
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


 if(isset($_SESSION['company'])){
     header("Location: company_dashboard.php");
 }
 elseif(isset($_SESSION['workers'])){
     header("Location: workers_dashboard.php");
 }
else{
    header("Location: home.php");
}