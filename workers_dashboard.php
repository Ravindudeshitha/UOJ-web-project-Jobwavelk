<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company dashboard</title>

    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/work_jobs.css">


    
    <!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


</head>

<body>

    <!--############sidebar menu #############-->

    <?php

        session_start();

        include ('sidebar.php');

    ?>


    <div class="home_section">
        <div class="home_content">
            <div class="prof_image_data">
                <div class="company_image">
                    <!-- <img src="../image/profile.png" alt="profile"> -->
                    <center><img src="<?php echo $image_path?>" alt="valampuri hotel"></center>
                </div>
                <div class="profile_details">

                <?php

                    $reg_id = $_SESSION['reg_id'];

                     //retrive worker data from user table
                    $query1 = "SELECT * FROM user WHERE reg_id = '$reg_id'";
                    $result1 = mysqli_query($con,$query1);
                    $row1 = mysqli_fetch_array($result1);

                    $user_name = $row1['user_name'];
                    $email = $row1['email'];
                    $phone = $row1['phone_number'];

                    //retrive worker data from worker table

                    $query2 = "SELECT * FROM work_profile WHERE reg_id = '$reg_id'";
                    $result2 = mysqli_query($con,$query2);
                    $row2 = mysqli_fetch_array($result2);

                    $description = $row2['description'];
                    $work_id = $row2['work_id'];

                ?>
                    <h5><?php echo $user_name?> </h5>
                    <h6><?php echo $email
                    ?></h6>
                    <h6><?php echo $description?></h6>
                </div>
            </div>

            <!-- display the jobs -->


                <div style="display: flex;">
                    <div class="company_ads">

                        <?php

                        $query_jobs = "SELECT job_id FROM jobs WHERE work_id = $work_id";
                        $result_jobs = mysqli_query($con, $query_jobs);

                        while($row_jobs = mysqli_fetch_assoc($result_jobs)){

                            $job_id = $row_jobs['job_id'];

                            $query_img = "SELECT com_image FROM com_profile WHERE com_id = (SELECT DISTINCT com_id FROM jobs WHERE job_id = $job_id)";

                            $result_img = mysqli_query($con, $query_img);
                            $row_img = mysqli_fetch_assoc($result_img);

                            $img = "uploads/".$row_img['com_image'];
                    
                            $query = "SELECT * FROM add_job WHERE job_id = $job_id";
                            $result = mysqli_query($con, $query);



                        
                            while($row = mysqli_fetch_assoc($result)){
                                $job_id = $row['job_id'];
                        ?>
                    
                        <div class="ads">
                            <div class="ads_img">
                                <img src="<?php echo $img?>">
                            </div>
                            
                            <div class="ads_data">
                                <b><P class="jobtitle"><?php echo $row['job_title'];?></P></b>
                                
                                
                                <p><i class="fa-solid fa-calendar-days"></i> <?php echo $row['date'];?></p>
                                <p><i class="fa-solid fa-user"></i> <?php echo $row['num_of_vacancy']; ?> Vacancy Available</p>
                                <p><i class="fa-solid fa-list"></i> <?php echo $row['job_type']; ?></p>
                            </div>
                            
                    

                        </div>

                    <?php 
                            }
                        }
                    ?>


                </div>



            
        </div>
    </div>



    <script src="js/sidebar_script.js"></script>
    
</body>
</html>