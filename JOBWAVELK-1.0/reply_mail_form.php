<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobwavelk Admin</title>

    
    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/admin_msg.css">


    
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

    
    if(isset($_GET['m_i'], $_GET['r_i']) ){
        $msg_id = $_GET['m_i'];
        $reg_id = $_GET['r_i'];
        
        if(isset($_GET['com_mails'])){
            $query1 = "SELECT * From user WHERE reg_id = $reg_id";
            $result1 = mysqli_query($con, $query1);
            $row1 = mysqli_fetch_array($result1);

            $name = $row1['user_name'];
            $email = $row1['email'];

        }
        elseif(isset($_GET['work_mails'])){
            $query3 = "SELECT * From user WHERE reg_id = $reg_id";
            $result3 = mysqli_query($con, $query3);
            $row3 = mysqli_fetch_array($result3);

            $name = $row3['user_name'];
            $email = $row3['email'];

        }
        elseif(isset($_GET['contact_mails'])){
    
            $query5 = "SELECT * FROM msg_anyone WHERE msg_id = $msg_id";
            $result5 = mysqli_query($con, $query5);
            $row5 = mysqli_fetch_array($result5);

            $name = $row5['name'];
            $email = $row5['email'];
        }
        else{
            header("Location: admin_dashboard.php");
        }
    }
    

?>


    <div class="home_section">
        <div class="home_content">
            <div class="form_box">
                <form action="reply_mail.php" method="post">
                    <h3>Reply</h3>
                    <hr>
                    <div class="field">
                        <label for="subject">Subject : </label>
                        <input type="text" name="subject" required>
                    </div>

                    <div class="field">
                        <label for="message">Message : </label>
                        <textarea name="message"></textarea required>
                    </div>

                    <input type="hidden" name="email" value="<?php echo $email?>">
                    <input type="hidden" name="name" value="<?php echo $name?>">

                    <div class="field">
                        <input type="submit" name="send">
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="js/sidebar_script.js"></script>
</body>
</html>