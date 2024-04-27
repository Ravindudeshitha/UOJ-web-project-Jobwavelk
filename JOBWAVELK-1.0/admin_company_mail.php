<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobwavelk Admin</title>

    
    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/admin_mail.css">


    
    <!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
    

<?php
    session_start();

    include ('include/connection.php');
    include ('sidebar.php');

    
    

?>


    <div class="home_section">

    <?php
        if(isset($_GET['com_mails'])){
            echo "<h2>Company Mail</h2>";
        }
        elseif(isset($_GET['work_mails'])){
            echo "<h2>Worker Mail</h2>";
        }
        elseif(isset($_GET['contact_mails'])){
            echo "<h2>Contact Mail</h2>";
        }
    ?>
        
        <div class="mailbox">
            <div class="mailbox_left">
                <div class="inbox">
                    <h3>Inbox</h3>
                    <hr>
                </div>

                <?php
                
                    if(isset($_GET['com_mails'])){
                        // display company mails
                        
                        $com_query = "SELECT * FROM com_msg ORDER BY msg_id DESC";
                        $com_result = mysqli_query($con, $com_query);

                        while($com_row = mysqli_fetch_assoc($com_result)){
                            $com_id = $com_row['com_id'];
                            $subject = $com_row['subject'];
                            $msg_id = $com_row['msg_id'];

                            $q1 = "SELECT * FROM user WHERE reg_id = (SELECT reg_id FROM com_profile WHERE com_id = $com_id)";
                            $r1 = mysqli_query($con, $q1);
                            $row1 = mysqli_fetch_assoc($r1);

                            $name = $row1['user_name'];
                            $reg_id = $row1['reg_id'];

                ?>
                                <a href="admin_company_mail.php?com_mails&m_i=<?php echo $msg_id?>&r_i=<?php echo $reg_id?>">
                                    <div class="mail_name">
                                        <h4><?php echo $name ?></h4>
                                        <p><?php echo $subject ?></p>
                                    </div>
                                </a>    

                <?php
                        }
                    }
                    elseif(isset($_GET['work_mails'])){

                        // display workerny mails
                        
                        $work_query = "SELECT * FROM work_msg ORDER BY msg_id DESC";
                        $work_result = mysqli_query($con, $work_query);

                        while($work_row = mysqli_fetch_assoc($work_result)){
                            $work_id = $work_row['work_id'];
                            $subject = $work_row['subject'];
                            $msg_id = $work_row['msg_id'];

                            $q2 = "SELECT * FROM user WHERE reg_id = (SELECT reg_id FROM work_profile WHERE work_id = $work_id)";
                            $r2 = mysqli_query($con, $q2);
                            $row2 = mysqli_fetch_assoc($r2);

                            $name = $row2['user_name'];
                            $reg_id = $row2['reg_id'];
                            
                ?>      
                                <a href="admin_company_mail.php?work_mails&m_i=<?php echo $msg_id?>&r_i=<?php echo $reg_id?>">
                                    <div class="mail_name">
                                        <h4><?php echo $name ?></h4>
                                        <p><?php echo $subject ?></p>
                                    </div>
                                </a>    
                <?php
                        }
                    }
                    elseif(isset($_GET['contact_mails'])){

                        // display contact mails
                        
                        $contact_query = "SELECT * FROM msg_anyone ORDER BY msg_id DESC";
                        $contact_result = mysqli_query($con, $contact_query);

                        while($contact_row = mysqli_fetch_assoc($contact_result)){
                            $name = $contact_row['name'];
                            $email = $contact_row['email'];
                            $subject = $contact_row['subject'];
                            $msg_id = $contact_row['msg_id'];


                ?>
                                <a href="admin_company_mail.php?contact_mails&m_i=<?php echo $msg_id?>&r_i=no">
                                    <div class="mail_name">
                                        <h4><?php echo $name ?></h4>
                                        <p><?php echo $subject ?></p>
                                    </div>
                                </a>   


                <?php
                        }
                    }

                    else{
                        header("Location: home.php");
                    }
                    
                ?>
            </div>

            <div class="mailbox_right">
                <div class="message">
                    <?php
                        if(isset($_GET['m_i'], $_GET['r_i']) ){
                            $msg_id = $_GET['m_i'];
                            $reg_id = $_GET['r_i'];
                            
                            if(isset($_GET['com_mails'])){
                                $query1 = "SELECT * From user WHERE reg_id = $reg_id";
                                $result1 = mysqli_query($con, $query1);
                                $row1 = mysqli_fetch_array($result1);

                                $name = $row1['user_name'];
                                $email = $row1['email'];

                                $query2 = "SELECT * FROM com_msg WHERE msg_id = $msg_id";
                                $result2 = mysqli_query($con, $query2);
                                $row2 = mysqli_fetch_array($result2);

                                $subject = $row2['subject'];
                                $msg = $row2['message'];

                                $data = "com_mails&m_i=$msg_id&r_i=$reg_id";

                            }
                            elseif(isset($_GET['work_mails'])){
                                $query3 = "SELECT * From user WHERE reg_id = $reg_id";
                                $result3 = mysqli_query($con, $query3);
                                $row3 = mysqli_fetch_array($result3);

                                $name = $row3['user_name'];
                                $email = $row3['email'];

                                $query4 = "SELECT * FROM work_msg WHERE msg_id = $msg_id";
                                $result4 = mysqli_query($con, $query4);
                                $row4 = mysqli_fetch_array($result4);

                                $subject = $row4['subject'];
                                $msg = $row4['message'];

                                $data = "work_mails&m_i=$msg_id&r_i=$reg_id";

                            }
                            elseif(isset($_GET['contact_mails'])){
                        
                                $query5 = "SELECT * FROM msg_anyone WHERE msg_id = $msg_id";
                                $result5 = mysqli_query($con, $query5);
                                $row5 = mysqli_fetch_array($result5);

                                $name = $row5['name'];
                                $email = $row5['email'];
                                $subject = $row5['subject'];
                                $msg = $row5['message'];

                                $data = "contact_mails&m_i=$msg_id&r_i=no";
                            }
                            else{
                                header("Location: admin_dashboard.php");
                            }
                        
                    ?>

                        <div class="field">
                            <h5>Subject : <?php echo $subject?></h5>
                        </div>
                        <hr>
                        <div class="field">
                            <p>Name : <?php echo $name?></p>
                            <p>Email: <?php echo $email?></p>
                        </div>
                        <div class="msg_field"><h5>Meassage : </h5>
                            <p><?php echo $msg ?></p>
                        </div>
                        
                        

                        <a href="reply_mail_form.php?<?php echo $data?>"> Reply </a>    
                    
                    <?php
                        }
                    ?>
                </div>
            </div>
           
        </div>
    </div>



    <script src="js/sidebar_script.js"></script>
</body>
</html>