<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company dashboard</title>

    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/job_list.css">



    
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
            
            <!-- display details of addjob table -->

            <div style="display: flex;">
                <div class="company_ads">

                    <?php
                        echo $_SESSION['com_id'];
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
                            <a href="script.php?id=<?php echo $job_id ?>&action=update"> <button class="buttonUpdate" role="button"> Update </button></a>

                        </div>

                    <?php 
                    }
                    ?>


                </div>
                
            </div>

            
        </div>
    </div>
       


    <script src="js/sidebar_script.js"></script>
    <script src="js/popup_job.js"></script>
    
</body>
</html>