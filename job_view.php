<!DOCTYPE html>
<html lang="en">
<head>
<!--block the back button -->
    <script language="JavaScript" type="text/javascript">
        window.history.forward();
    </script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job view</title>

    
    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/job_view.css">



    
    <!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


</head>
<body>
    
    <?php

        session_start();
        include ('sidebar.php');

    ?>
    
    <div class="home_section">
        <div class="home_content" >

            <div class="view_popup">
                
                <div class="popup_details">
                    
                    <div class="part1">
                        <div class="closebtn" id="closebtn"><a href="job_list.php"><i class="fa-solid fa-circle-xmark"></i></a></div>

                        <div class="view_job_details">
                            <?php
                                $query = "SELECT * FROM add_job WHERE job_id = $_GET[i]";
                                $result = mysqli_query($con, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $job_id = $row['job_id'];


                            ?>

                                <div class="ads">
                                    <b>
                                        <p class="jobtitle" style="font-size:20px"><?php echo $row['job_title']; ?></p>
                                    </b>
                                    <div class="icon_job_view" style="margin: 5px 0px 0px 15px;">
                                        <p><i class="fa-solid fa-calendar-days"></i></i> <?php echo $row['date']; ?></p>
                                        <p><i class="fa-solid fa-user"></i> <?php echo $row['num_of_vacancy']; ?> Vacancy Available</p>
                                        <p><i class="fa-solid fa-list"></i> <?php echo $row['job_type']; ?></p>
                                    </div>
                                </div>

                            <?php
                                }
                            ?>

                        </div>

                    </div>
                    <div class="part2">
                        <?php
                            if(isset($_GET['i'])){
                                $job_id = $_GET['i'];

                                $query1 = "SELECT * FROM jobs WHERE job_id ='$job_id'";

                                $result1 = mysqli_query($con,$query1);

                                while($row = mysqli_fetch_assoc($result1)){
                                    $work_id = $row['work_id'];

                                    $query3 = "SELECT reg_id,description, work_image FROM work_profile WHERE work_id = '$work_id'";
                                    $result3 = mysqli_query($con, $query3);

                                    $work_row = mysqli_fetch_assoc($result3);

                                    $image = "uploads/$work_row[work_image]";

                                    $reg_id = $work_row['reg_id'];

                                    $q1 = "SELECT user_name, email, phone_number FROM user WHERE reg_id ='$reg_id'";

                                    $re1 = mysqli_query($con, $q1);
                                    $user_row = mysqli_fetch_assoc($re1);

                                    echo "<div class='work_field'>
                                            <div class='data1'>
                                                <img src='$image'>
                                            </div>
                                            <div class='data2'>
                                                <h3>$user_row[user_name]</h3>
                                                <h3>$user_row[email]</h3>
                                                <h3>$user_row[phone_number]</h3>
                                                <h3>$work_row[description]</h3>
                                            </div>
                                            <div class='data3'>
                                                <a href='job_aproove_mail.php?i=$job_id&j=$work_id&msg=yes' class='a_yes'>Accept</a>
                                                <a href='job_aproove_mail.php?i=$job_id&j=$work_id&msg=no' class='a_no'>Reject</a>
                                            </div>
                                        </div>";
                                }
                            }

                        ?>
                    </div>
                </div>
            </div>


        </div>
    </div>


    
    <script src="js/sidebar_script.js"></script>
</body>
</html>
