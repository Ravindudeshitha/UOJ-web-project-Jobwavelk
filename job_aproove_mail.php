<?php

session_start();
include('include/connection.php');

print_r($_SESSION);

$reg_id = $_SESSION['reg_id'];
$com_id = $_SESSION['com_id'];
$com_name = $_SESSION['com_name'];
$job_id = $_GET['i'];
$work_id = $_GET['j'];
$msg = $_GET['msg'];

if($msg == 'yes'){
    $yes_query1 = "SELECT * FROM user WHERE reg_id = (SELECT reg_id FROM work_profile WHERE work_id = $work_id)";
    $yes_result1 = mysqli_query($con,$yes_query1);
    $yes_row1 = mysqli_fetch_assoc($yes_result1);

    $work_email = $yes_row1['email'];
    $work_name = $yes_row1['user_name'];

    $yes_query2 = "SELECT * FROM add_job WHERE job_id = $job_id";
    $yes_result2 = mysqli_query($con,$yes_query2);
    $yes_row2 = mysqli_fetch_assoc($yes_result2);

    $yes_query3 = "SELECT * FROM com_profile WHERE com_id = $com_id";
    $yes_result3 = mysqli_query($con,$yes_query3);
    $yes_row3 = mysqli_fetch_assoc($yes_result3);


    $job_title = $yes_row2['job_title'];
    $job_type = $yes_row2['job_type'];
    $date = $yes_row2['date'];
    $time = $yes_row2['time'];
    $address = $yes_row3['address'];

    $subject = $com_name;
    $message = "Dear $work_name,<br> <h3>You have been selected for $job_title $job_type job at $com_name. Your visit is definitely expected</h3> <br> <h4>Address : $address</h4>  <h4>Date : $date</h4>  <h4>Time : $time</h4> <br> Thank You";

}
else if($msg == 'no'){
    $yes_query1 = "SELECT * FROM user WHERE reg_id = (SELECT reg_id FROM work_profile WHERE work_id = $work_id)";
    $yes_result1 = mysqli_query($con,$yes_query1);
    $yes_row1 = mysqli_fetch_assoc($yes_result1);

    $yes_query2 = "SELECT * FROM add_job WHERE job_id = $job_id";
    $yes_result2 = mysqli_query($con,$yes_query2);
    $yes_row2 = mysqli_fetch_assoc($yes_result2);

    $work_email = $yes_row1['email'];
    $work_name = $yes_row1['user_name'];

    $job_title = $yes_row2['job_title'];
    $job_type = $yes_row2['job_type'];


    $subject = $com_name;
    $message = "Dear $work_name,<br> <h3>Thank you apply for $job_title $job_type job at $com_name. But due to unavoidable reason your job application had to be rejected  <br> Thank You";

    $no_query1 = "DELETE FROM jobs WHERE job_id = $job_id AND work_id = $work_id";
    $no_result1 = mysqli_query($con, $no_query1);
    
    $no_query2 = "SELECT * FROM add_job WHERE job_id = $job_id";
    $no_result2 = mysqli_query($con, $no_query2);
    $no_row2 = mysqli_fetch_array($no_result2);

    $num_of_vacancy = $no_row2['num_of_vacancy'];

    $num_of_vacancy = $num_of_vacancy + 1;

    $no_query3 ="UPDATE add_job SET num_of_vacancy = $num_of_vacancy WHERE job_id = $job_id";
    $no_result3 = mysqli_query($con, $no_query3);
    


}
else{
    header("Location: ");
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
        $mail->addAddress("$work_email", 'Joe User');     //Add a recipient
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




header("Location: job_view.php?i=$job_id");

