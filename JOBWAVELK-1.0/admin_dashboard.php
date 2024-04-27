<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobwavelk Admin</title>

    
    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/admin_dashboard.css">


    
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

    $query1 = "SELECT * FROM com_profile";
    $query2 = "SELECT * FROM work_profile";
    $query3 = "SELECT * FROM add_job";

    $query4 = "SELECT * FROM com_msg";
    $query5 = "SELECT * FROM work_msg";
    $query6 = "SELECT * FROM msg_anyone";

    $result1 = mysqli_query($con, $query1);
    $result2 = mysqli_query($con, $query2);
    $result3 = mysqli_query($con, $query3);
    $result4 = mysqli_query($con, $query4);
    $result5 = mysqli_query($con, $query5);
    $result6 = mysqli_query($con, $query6);

    $company = mysqli_num_rows($result1);
    $workers = mysqli_num_rows($result2);
    $jobs = mysqli_num_rows($result3);
    $com_mails = mysqli_num_rows($result4);
    $work_mails = mysqli_num_rows($result5);
    $contact_mails = mysqli_num_rows($result6);

    

?>


    <div class="home_section">
        <div class="home_content">
            <div class="com_work_job">
                <a href="admin_company.php">
                    <div class="field_box">
                        <h3>Company</h3>
                        <h2><?php echo $company ?></h2>
                    </div>
                </a>
                
                <a href="admin_worker.php">
                    <div class="field_box">
                        <h3>Workers</h3>
                        <h2><?php echo $workers ?></h2>
                    </div>
                </a>

                <a href="admin_jobs.php">
                    <div class="field_box">
                        <h3>Jobs</h3>
                        <h2><?php echo $jobs ?></h2>
                    </div>
                </a>
                    
                <a href="admin_company_mail.php?com_mails">
                    <div class="field_box">
                        <h3>Company Mails</h3>
                        <h2><?php echo $com_mails ?></h2>
                    </div>
                </a>

                <a href="admin_company_mail.php?work_mails">
                    <div class="field_box">
                        <h3>Worker Mails</h3>
                        <h2><?php echo $work_mails ?></h2>
                    </div>
                </a>
                
                <a href="admin_company_mail.php?contact_mails">
                    <div class="field_box">
                        <h3>Contact Mails</h3>
                        <h2><?php echo $contact_mails ?></h2>
                    </div>
                </a>
                

            </div>
        </div>
    </div>



    <script src="js/sidebar_script.js"></script>
</body>
</html>