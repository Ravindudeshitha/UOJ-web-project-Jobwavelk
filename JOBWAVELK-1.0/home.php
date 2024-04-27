<!--session start-->
    
<?php
   session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobWavelk
    </title>

    
    <link rel="stylesheet" href="css/home.css?=<?php echo time(); ?>">
    <!--<link rel="stylesheet" href="css/card_style.css">-->

    <!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://kit.fontawesome.com/7a8f64f839.js" crossorigin="anonymous"></script>

</head>
<body>

    <!--database connection-->
    <?php
        include ('include/connection.php'); 

    ?>


    <div class="top_navigation">
        <div class="content">
            <div class="logo_section">
                <!-- <i class='bx bxl-sketch'></i> -->
                <!-- <h2>JOBWAVELK</h2> -->
                <img src="image/logo5_white.png" alt="">
            </div>

            
            <?php

                if(!isset($_GET['job_post'])){


            ?>
                <div class="link_button">
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#jobs">Jobs</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
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

    <div class="background">
        <img src="image/a.jpeg">
    </div>

    <section id="home" class="home_section">
        <div class="home_data">
            
                
            
            <div class="home_image">

                <img src="image/home_image.png" alt="Home Image">

            </div>
                
            <div class="home_img2">
                <img src="image/blob.svg" alt="Home Image">
            </div>

            

            <div class="home_discription">
                <div class="description_data">
                    <h2>Post your part-time, full-time available jobs,</h2>
                    <h2>Find suitable part-time, full-time jobs,</h2>
                    <h2>Join with <b>JOBWAVELK</b> site.</h2>
                    <h2>Come, let's succeed together.</h2>
                </div>

                <div class="description_but">
                    <a href="post_card.php">Find Job -></a>
                </div>
            </div>
        </div>
        
    </section>

    <section id="jobs" class="jobs_section">
        <div class="section_head">
            <h2>JOBS</h2>
            <div class="more">
                <p>All Jobs</p>
                <a href="post_card.php"><i class='bx bx-right-arrow-circle'></i></a>
            </div>
            

        </div>

        <div class="container" id="blur" >
            <!--post section php-->
            <?php
                
                $job_query = "SELECT * FROM add_job ORDER BY post_time DESC LIMIT 4";
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
							<!--"<div class='post_block'>
                                <div class='card'>
                                    <div class='image'>
                                       <center> <img src=$image_path alt='Company Image'></center>
                                    </div>
                                    <div class='card_details'>
                                        <h2>$job_title</h2>
                                        <div class='main_data'>
                                            <div class='data1'>
                                                <h3>$job_type</h3>
                                                <h3><i class='fa-solid fa-user'> </i> $num_of_vacancy</h3>
                                            </div>
                                            <div class='data2'>
                                                <p>$date</p>
                                                <p>$salary</p>
                                            </div>
                                        </div>
                                        <div class='link_btn'>
                                            <a href='post_card.php?job_id=$job_id'><button>Take me</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>";-->
        </div>

    </section>

    <section id="about" class="about_section">
        

        <div class="about_data">
            <div class="about_image">
                <img src="image/about1.png">
            </div>
    
            <div class="about_details">
                <div class="section_head">
                    <h2>ABOUT</h2>
                    <div class="more">
                    </div>
                    

                </div>

            
                <div class="part_1">
                    <p>The Job Vacancy System is a revolutionary part-time job vacancy system website that serves as the ultimate platform for connecting students with companies seeking part-time employees. Simplifying the search process, students can browse openings, submit applications, and track progress. Companies can effortlessly post positions, review applications, and communicate with candidates. Job Vacancy System is the ultimate solution for students seeking part-time job opportunities and companies looking to hire talented individuals.  Join Job Vcancy System today and embark on a seamless and rewarding part-time job journey! 
                    </p>
                </div>
    
                <div class="part_2">
                    <p></p>
                </div>
            </div>
    
        </div>
    </section>

    <section id="contact" class="contact_section">
    
        <div class="contact_data">
            
            <div class="contact_details">
            <center><h2>CONTACT</h2></center>
            <section class="contact-us">
	
		<div class="contact-col">
			
			<div>
				<i class="fa fa-phone"></i>
				<span>
					<h5>0767450489</h5>
					
				</span>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<span>
					<h5>jobwavelk@gmail.com</h5>
					<p>Email us your query</p>
				</span>
			</div>
		</div>

		<div class="contact-col">
			<form action="msg_mail_everyone.php" method="post">
				<input type="text" name="name" placeholder="Enter your name" required>
				<input type="text" name="email"  placeholder="Enter email address" required>
				<input type="text" name="subject" placeholder="Enter your subject" required>
				<textarea rows="3" name="message" placeholder="Message" required=></textarea>
				<button type="submit" name="send_message" class="here-btn-green-btn">Send Message</button>
			</form>

		</div>

	


            </div>

            <div class="contact_image">
                <img src="image/contact1.png">
            </div>
        </div>

    </section>



    <!--JavaScript files-->
    <script src="js/top_navigation.js"></script>
    <script src="js/dropmenu.js"></script>

<section class=footer_section>
<center><hr width=75% ></center>
    <div class="footer">
        
        <div class="footer_details">
            <p>All Right Reserved 2023 | jobwavelk by Team Seven</p>
            <p></p>
        </div>
    </div>
</section>
</body>
</html>