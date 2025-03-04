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
            <h3>Jobs</h3>
            <div class="detail_box">

                <div class="head_field">
                    <div class="user_name"><p>Company Name</p></div>
                    <div class="job_title"><p>Title</p></div>
                    <div class="job_type"><p>Type</p></div>
                    <div class="num_of_vacancy">Vacancy<p></p></div>
                    <div class="date"><p>Date</p></div>
                </div>

                <?php
                    $query = "SELECT * FROM add_job  ORDER BY date ASC";
                    $result = mysqli_query($con,$query);
                    
                    while($row = mysqli_fetch_array($result)){
                        $job_title = $row['job_title'];
                        $job_type = $row['job_type'];
                        $num_of_vacancy = $row['num_of_vacancy'];
                        $date = $row['date'];
                        $com_id = $row['com_id'];

                        $query2 = "SELECT user_name FROM user WHERE reg_id = (SELECT reg_id FROM com_profile WHERE com_id ='$com_id') ";
                        $result2 = mysqli_query($con,$query2);
                        $row2 = mysqli_fetch_array($result2);

                        $user_name = $row2['user_name'];

                    

                ?>

                <div class="job_field">
                    <div class="user_name">
                        <p><?php echo $user_name ?></p>
                    </div>
                    <div class="job_title">
                        <p><?php echo $job_title ?></p>
                    </div>
                    <div class="job_type">
                        <p><?php echo $job_type ?></p>
                    </div>
                    <div class="num_of_vacancy">
                        <p><?php echo $num_of_vacancy ?></p>
                    </div>
                    <div class="date">
                        <p><?php echo $date ?></p>
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