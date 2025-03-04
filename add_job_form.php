


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add job form</title>

    <link rel="stylesheet" href="css/side_navigation.css?=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/dashboard_form_style.css?=<?php echo time(); ?>">

    <!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    

</head>
<body>

<!--############sidebar menu #############-->
<?php
    session_start();

	include ('sidebar.php');
    include('include/connection.php');
?>


<?php

    if(isset($_POST['addjob'])) {

    
        $jobTitle = $_POST['job_title'];
        $jobType = $_POST['job_type'];
        $vacancy = $_POST['vacancy'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $salary = $_POST['salary'];
        $description = $_POST['description'];
        
        $current_time = date("Y-m-d H:i:s");

        // methanata session eken gnna on com_id eka--------------------------------------------------
        $com_id = $_SESSION['com_id'];
        
        $sql = "INSERT INTO add_job(job_title, description, num_of_vacancy, job_type, date, time, salary,com_id,post_time) VALUES('$jobTitle','$description','$vacancy','$jobType','$date','$time','$salary','$com_id','$current_time')";
        
        $result = mysqli_query($con, $sql);
        
        if($result){
            header("Location: home.php");
        }else{
            echo "Connection Error: ".mysqli_connect_error();
        }
    }


?>


<!--############# hom body #############-->


    <section class="home_section">
		<div class="home_content">

            <div class="profile_update">
                <div class="update_form">
                    <form action="" method="post">
                        <div class="prof_image">
                            
                            <div class="add_job_name">
                                <h2>Add New Job</h2>
                            </div>
                            
                        </div>

                        <div class="form_content">
                            <div class="field">
                                <label for="job_title">Job Title :</label>
                                <input type="text" name="job_title" required>
                            </div>

                            <div class="field">
                                <label for="job_type">Job Type :</label>
                                <select name="job_type">
                                    <option value="">Select Job Type</option>
                                    <option value="part time">Part Time</option>
                                    <option value="full time">Full Time</option>
                                </select>
                            </div>

                            <div class="field">
                                <label for="vacancy">Number of Vacancy :</label>
                                <input type="number" name="vacancy" required>
                            </div>

                            <div class="field">
                                <label for="date">Date :</label>
                                <input type="date" name="date" required>
                            </div>

                            <div class="field">
                                <label for="time">Time :</label>
                                <input type="time" name="time" required>
                            </div>

                            <div class="field">
                                <label for="salary">Salary :</label>
                                <input type="number" step="0.01" name="salary" required>
                            </div>

                            <div class="field description">
                                <label for="description">Description :</label>
                                <textarea class ="description" name="description" required></textarea>
                            </div>

                            <div class="field">
                               <center> <input type="submit" name="addjob" value="SUBMIT"></center>
                            </div>

                            
                        </div>

                        
                    </form>

                </div>
            </div>
		
		</div>
	 </section>

    <script src="js/sidebar_script.js"></script>
    
</body>
</html>