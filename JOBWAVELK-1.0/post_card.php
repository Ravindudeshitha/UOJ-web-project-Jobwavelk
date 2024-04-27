<!DOCTYPE html>
<html lang="en">
<head>
    
    

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posts</title>

    <link rel="stylesheet" href="css/card_style.css?=<?php echo time(); ?>">
    


    <!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--  font awesome link   -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
</head>
<body>

    <!--php connections -->
    <?php
        session_start();
        include('include/connection.php');
    ?>

    <!--NAVIGATION BAR -->
 
        <div class="top_navigation">
            <div class="content">
                <div class="logo_section">
                    <!-- <i class='bx bxl-sketch'></i>
                    <h2>JOBWAVELK</h2> -->
                    <img src="image/logo5_white.png" alt="">
                </div>

                
                <?php

                    if(!isset($_GET['job_post'])){


                ?>
                    <div class="link_button">
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="home.php#jobs">Jobs</a></li>
                            <li><a href="home.php#about">About</a></li>
                            <li><a href="home.php#contact">Contact</a></li>
                        </ul>
                    </div>

                <?php
                    }
                
                ?>

                <div class="login_button">

                    <?php
                        if(isset($_SESSION['reg_id'])){
                            $id = $_SESSION['reg_id'];

                            $query = "SELECT work_image as image_name FROM work_profile WHERE reg_id = $id UNION ALL SELECt com_image as image_name FROM com_profile WHERE reg_id = $id";

                            $query_result = mysqli_query($con, $query);

                            $image_row = mysqli_fetch_assoc($query_result);

                            $num_row = mysqli_num_rows($query_result);

                        if($num_row > 0){
                            $image_path = "uploads/$image_row[image_name]";
                        }
                        else{
                            $image_path ="uploads/logo.png";
                        }


                            echo "<div class='log_user'>
                                    <div class='log_user_img'> 
                                      <a href='#'><img src=$image_path></a>
                                    </div>
                                    <ul>
                                        <li><a href='dashbord.php'><i class='bx bxs-dashboard' ></i>Dashboard</a></li>
                                        <li><a href='home.php'><i class='bx bx-home' ></i>Home</a></li>
                                        <li><a href='post_card.php'><i class='bx bx-briefcase' ></i>Jobs</a></li>
                                        <li><a href='logout.php'><i class='bx bx-log-out' ></i><label> Log Out</label></a></li>
                                    </ul>
                                </div>";

                        }
                        else{
                            echo "<div class='sign_but'>
                                    <a href='signin_signup.php?signin=signin'>SIGN IN</a>";
                                    echo "<a href='signin_signup.php?signup=signup'>SIGN UP</a>
                                </div>";
                        }
                    ?>
                    
                    
                </div>

                <div class="menu_but">
                    <i class="fa-solid fa-bars menu_icon" ></i>
                    

                    <div class="menu_link">
                        <ul>
                            <li>
                                <a href='home.php'><i class='bx bx-home' ></i>Home</a>
                            </li>
                            <li>
                                <a href='post_card.php?job_post=job'><i class='bx bx-briefcase' ></i>Jobs</a>
                            </li>
                            <li>
                                <a href='home.php#about'><i class='bx bxs-user-detail' ></i>About</a>
                            </li>
                            <li>
                                <a href='home.php#contact'><i class='bx bxs-contact' ></i>Contact</a>
                            </li>
                            <li>
                                <a href='signin_signup.php?signin=signin'><i class='bx bx-log-in-circle' ></i>Sign in</a>
                            </li>
                            <li>
                                <a href='signin_signup.php?signup=signup'><i class='bx bxs-id-card' ></i>Sign up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <!--background-->

    <div class="background" >
        <img src="image/a.jpeg">
    </div>

    <!--post section-->

    <div class="container" id="blur" >
        

        <!--post section php-->
            <?php
                $now =date("Y-m-d H:i:s");
                $job_query = "SELECT * FROM add_job WHERE num_of_vacancy > 0  ORDER BY post_time DESC";
                $job_query_result = mysqli_query($con, $job_query);

                while ($row = mysqli_fetch_assoc($job_query_result)){
                    $job_id = $row['job_id'];
                    $job_title = $row['job_title'];
                    $job_type = $row['job_type'];
                    $date = $row['date'];
                    $time = $row['time'];
                    $salary = $row['salary'];
                    $num_of_vacancy = $row['num_of_vacancy'];

                    $com_id = $row['com_id'];

                    $com_image = "SELECT com_image FROM com_profile WHERE com_id = $com_id";
                    $com_image_result = mysqli_query($con, $com_image);
                    $image_name = mysqli_fetch_assoc($com_image_result);

                    $image_path = "uploads/$image_name[com_image]";

                    echo "<center><div class='job_post'>
                            <div class='card'>
                            <div class='card_image'>
                                <img src=$image_path alt='Company Image'>
                            </div>
                                <div class='content'>
                                    <div class='details'>
                                    <h4>$job_title</h4>
                                    <div class='data'>
                                        <p>$job_type</p>
                                        <p>$num_of_vacancy</p>
                                    </div>
                                    <div class='data'>
                                        <p>$date</p>
                                        <p>$salary</p>
                                    </div>
                                   
                                    <div class='link_btn'>
                                        <a href='post_card.php?job_id=$job_id'><button onclick='blurbackground()'>Apply</button></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </center>";



                           

                }
            ?>
            

            <!-- <div class="post_block">
                <div class="card">
                    <div class="image">
                        <img src="image/valampuri.png" alt="Company Image">
                    </div>
                    <div class="card_details">
                        <h2>Waiter for party </h2>
                        <div class="main_data">
                            <div class="data1">
                                <h3>Part time</h3>
                                <h3>Available - 05</h3>
                            </div>
                            <div class="data2">
                                <p>Augast 25</p>
                                <p>Rs.1500</p>
                            </div>
                        </div>
                        <div class="link_btn">
                            <a href="jobView.html"><button >Take me</button></a>
                        </div>
                    </div>
                </div>
            </div> -->
            
    </div>

    <!-- job view section (full details of a perticuler job) -->

    <?php

        if(isset($_SESSION['work_id'])){
            if(isset($_GET['job_id'])){
                $job_id = $_GET['job_id'];
    
                $job = "SELECT * FROM add_job WHERE job_id = '$job_id'";
    
                $job_result = mysqli_query($con, $job);
    
                $job_row = mysqli_fetch_assoc($job_result);
    
                $job_title = $job_row['job_title'];
                $description = $job_row['description'];
                $num_of_vacancy = $job_row['num_of_vacancy'];
                $job_type = $job_row['job_type'];
                $date = $job_row['date'];
                $time = $job_row['time'];
                $salary = $job_row['salary'];
                $com_id = $job_row['com_id'];

                $query = "SELECT * FROM com_profile WHERE com_id = $com_id";

                $result1 = mysqli_query($con,$query);
                $row1 = mysqli_fetch_assoc($result1);

                $address = $row1['address'];
    
                echo "<div class='job_view'>
                        <div class='view_details'>
                            <div class='job_topic'>
                                <center>
                                    <h2>$job_title Vacancy</h2>
                                </center>                    
                            </div>

                            <div class='job-parts'>
                                <div class='job_part1'>
                                    <h5><i class='fa-solid fa-home'></i>Address : $address</h5>
                                    <h5><i class='fa-solid fa-sort-numeric-desc'></i>No of Vacancies : $num_of_vacancy</h5>
                                    <h5><i class='fa-solid fa-briefcase'></i>Job Type : $job_type</h5>
                                    
                                </div>

                                <div class='job_part2'>
                                    <h5><i class='fa-solid fa-calendar'></i>Date : $date</h5>
                                    <h5><i class='fa-regular fa-clock'></i>Time : $time</h5>
                                    <h5><i class='fa-solid fa-usd'></i>Salary : $salary</h5>
                                </div>
                               
                            </div>
                                <div class='description'>
                                    <h5><i class='fa-solid fa-list'></i>Description : </h5>
                                    
                                    <p> $description</p>
                                </div>
                                <div class='job_but'>
                                <center>
                                    <a href='post_card.php'><button id='closebtn'>close</button></a>
                                    <a href='post_card.php?agree=yes&com_id=$com_id&job=$job_id'><button id='agreebtn'>agree</button></a>
                                </center>
                            </div>
                        </div>
                    </div>";
                        
            }
    
        
            if(isset($_GET['agree'],$_GET['com_id'],$_GET['job'])){
                $job_id = $_GET['job'];
                $com_id = $_GET['com_id'];
                $query = "SELECT terms FROM com_profile WHERE com_id=$com_id";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_array($result);
    
                $terms = $row['terms'];
    
                echo "<div class='job_view'>
                        <div class='view_details'>
                            <div class='job_topic'>
                                <center>
                                    <h2> Terms </h2>
                                </center>                    
                            </div>
                            <div class='terms'>
                                <p>$terms</p>
                                <center><a href='post_card.php?terms=ok&job_num=$job_id'><button style='margin-top:35%; '>agree</button></a></center>
                            </div>
                        </div>    
                    </div>";
            }
    
            // if(isset($_GET['terms'], $_GET['job_num'])){
            //     $job_id = $_GET['job_num'];
    
            //     $query1 = "SELECT num_of_vacancy FROM add_job WHERE job_id=$job_id";
            //     $result1 = mysqli_query($con, $query1);
            //     $row1 = mysqli_fetch_assoc($result1);
    
            //     $num_of_vacancy = $row1['num_of_vacancy']-1;
    
    
            //     $query2 = "UPDATE add_job SET num_of_vacancy=$num_of_vacancy WHERE job_id=$job_id";
    
            //     $result2 = mysqli_query($con,$query2);
    
    
            //     //all table
            //     $query3 = "SELECT com_id FROM add_job WHERE job_id=$job_id";
    
            //     $result3 = mysqli_query($con,$query3);
    
            //     $row3 = mysqli_fetch_assoc($result3);
    
            //     $com_id = $row3['com_id'];
                
            //     echo $com_id;
            //     $insert = "INSERT INTO jobs(job_id, com_id, work_id) VALUES($job_id, $com_id, $_SESSION[work_id])";
                
            //     $insert_result = mysqli_query($con,$insert);
    
    
            //     echo "<div class='job_view'>
            //     <div class='view_details'>
            //         <p>$num_of_vacancy</p>
            //         <a href='post_card.php'><button>agree</button></a>
            //     </div>
            // </div>";
            // }


            if (isset($_GET['terms'], $_GET['job_num'])) {
                $job_id = $_GET['job_num'];
            
                // Check if the job has already been taken
                $check_query = "SELECT * FROM jobs WHERE job_id=$job_id AND work_id=$_SESSION[work_id]";
                $check_result = mysqli_query($con, $check_query);
            
                if (mysqli_num_rows($check_result) == 0) {
                    // Update the num_of_vacancy and insert the job into the jobs table
                    $query1 = "SELECT num_of_vacancy FROM add_job WHERE job_id=$job_id";
                    $result1 = mysqli_query($con, $query1);
                    $row1 = mysqli_fetch_assoc($result1);
            
                    $num_of_vacancy = $row1['num_of_vacancy'] - 1;
            
                    $query2 = "UPDATE add_job SET num_of_vacancy=$num_of_vacancy WHERE job_id=$job_id";
                    $result2 = mysqli_query($con, $query2);
            
                    // Insert the job into the jobs table
                    $query3 = "SELECT com_id FROM add_job WHERE job_id=$job_id";
                    $result3 = mysqli_query($con, $query3);
                    $row3 = mysqli_fetch_assoc($result3);
                    $com_id = $row3['com_id'];
            
                    $insert = "INSERT INTO jobs(job_id, com_id, work_id) VALUES($job_id, $com_id, $_SESSION[work_id])";
                    $insert_result = mysqli_query($con, $insert);
                }
            
                // Display a message and a link to go back
                echo "<div class='job_view'>
                        <div class='view_details'>
                            <div class='success_message'
                                <center> <p>Your request successfully recived. After review your request we will send an email</p></center>
                                    <center><a href='post_card.php'><button style='margin-top:35%; '>Back</button></a></center>
                                
                            </div>
                        </div>    
                    </div>";
            }
            
        }
        else{
            
        }

    ?>

    <!--JavaScript files-->
    <script src="js/top_navigation.js"></script>

    <script type="text/javascript">
        function blurbackground(){
            var blur = document.getElementById('blur');
            blur.classList.add('active');

            document.getElementById('closebtn').addEventListener("click",function(){
            document.getElementById('blur').classList.remove('active');
            });
        }
        </script>
</body>
</html>