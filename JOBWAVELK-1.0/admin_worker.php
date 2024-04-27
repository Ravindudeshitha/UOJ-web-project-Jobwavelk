<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>

    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/admin_com_work_job.css">

    <!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    
</head>
<body>
    
<?php

    session_start();

    include('include/connection.php');

    include ('sidebar.php');


?>

    <div class="home_section">
        <div class="home_content">
            <h3>Worker</h3>
            <div class="detail_box">

                <?php
                    $query = "SELECT * FROM user WHERE user_type = 'worker'";
                    $result = mysqli_query($con,$query);
                    
                    while($row = mysqli_fetch_array($result)){
                        $reg_id = $row['reg_id'];
                        
                        $user_name = $row['user_name'];
                        $email = $row['email'];
                        $phone = $row['phone_number'];

                        $query2 = "SELECT work_image FROM work_profile WHERE reg_id = $reg_id";
                        $result2 = mysqli_query($con,$query2);
                        $row2 = mysqli_fetch_array($result2);

                        $work_image = "uploads/".$row2['work_image'];

                    

                ?>

                <div class="field">
                    <div class="image">
                        <center><img src="<?php echo $work_image ?>" alt="Work Image"></center>
                    </div>
                    <div class="name">
                        <p><?php echo $user_name ?></p>
                    </div>
                    <div class="email">
                        <p><?php echo $email ?></p>
                    </div>
                    <div class="phone">
                        <p><?php echo $phone ?></p>
                    </div>
                    <div class="but">
                        <a href="admin_send_mail.php?email"><i class='bx bxs-send' ></i></a>
                    </div>
                </div>

                <?php
                    }
                ?>
            </div>

        </div>
    </div>


 <script src="js/sidebar_script.js"></script>
</body>
</html>