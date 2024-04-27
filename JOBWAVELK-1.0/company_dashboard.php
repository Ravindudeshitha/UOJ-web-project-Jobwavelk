<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company dashboard</title>

    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/com_dashboard.css">



    
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
        <div class="home_content" id="blur">
            <div class="prof_image_data">
                <div class="company_image">
                    <!-- <img src="../image/profile.png" alt="profile"> -->
                    <center><img src="<?php echo $image_path?>" alt="valampuri hotel"></center>
                </div>
                <div class="profile_details">

                <?php

                    $reg_id = $_SESSION['reg_id'];

                     //retrive company data from user table
                    $query1 = "SELECT * FROM user WHERE reg_id = '$reg_id'";
                    $result1 = mysqli_query($con,$query1);
                    $row1 = mysqli_fetch_array($result1);

                    $user_name = $row1['user_name'];
                    $email = $row1['email'];
                    $phone = $row1['phone_number'];

                    $_SESSION['com_name'] = $user_name;

                    //retrive company data from company table

                    $query2 = "SELECT * FROM com_profile WHERE reg_id = '$reg_id'";
                    $result2 = mysqli_query($con,$query2);
                    $row2 = mysqli_fetch_array($result2);

                    $description = $row2['com_description'];
                    $address = $row2['address'];
                    $terms = $row2['terms'];

                ?>
                    <h5><?php echo $user_name?> </h5>
                    <h6><?php echo $address
                    ?></h6>
                    <h6><?php echo $description?></h6>
                </div>
            </div>


            <!-- display details of addjob table -->

            <div style="display: flex;">
                <div class="company_ads">

                    <?php
                    
                        $query = "SELECT * FROM add_job WHERE com_id = $_SESSION[com_id]";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                            $job_id = $row['job_id'];
                        ?>
                    
                        <div class="ads">
                            <b><P class="jobtitle"><?php echo $row['job_title'];?></P></b>
                            
                            
                            <p><i class="fa-solid fa-calendar-days"></i> <?php echo $row['date'];?></p>
                            <p><i class="fa-solid fa-user"></i> <?php echo $row['num_of_vacancy']; ?> Vacancy Available</p>
                            <p><i class="fa-solid fa-list"></i> <?php echo $row['job_type']; ?></p>
                            
                            <a href="job_view.php?i=<?php echo $job_id?>"><button type="8" class="buttonView" id="buttonView" role="button"  > View </button></a>



                            

                            <a href="script.php?id=<?php echo $job_id ?>&action=delete"><button  type="button" class="buttonRemove" role="button"> Remove </button></a>
                            <!--<a href="script.php?id=<?php echo $job_id ?>&action=update"> <button class="buttonUpdate" role="button"> Update </button></a>-->

                        </div>

                    <?php 
                    }
                    ?>


                </div>
                <!-- <div class="company_map">

                </div> -->
                <div class="company_terms">
                    <h2>Terms</h2>
                    <p><?php echo $terms ?></p>
                </div>
            </div>

            
        </div>
    </div>
        
        <?php
            

        ?>


        <div class="ViewPopup" id="ViewPopup">
            <div class="colse_blur_div" id="closediv"></div>
            <div class="popup_details">
                <div class="closebtn" id="closebtn"><i class="fa-solid fa-circle-xmark"></i></div>
                <h6>Title(Waiter)</h6>
                <p>Time : 9:00 a.m - 3:00 pm </p>
                <p> Date : 2023-08-31</p>
                <p>2 Vacancies Availabale</p>
                <p>Description :</p>
            </div>
        </div>




    <script src="js/sidebar_script.js"></script>
    <script src="js/popup_job.js"></script>
    
</body>
</html>