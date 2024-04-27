<!--side navigation bar -->


<?php
    //include connection.php
    include ('include/connection.php');

    
    if(isset($_SESSION['reg_id'])){

        $id = $_SESSION['reg_id'];

        // get the image path
        $query = "SELECT work_image as image_name FROM work_profile WHERE reg_id = $id UNION ALL SELECt com_image as image_name FROM com_profile WHERE reg_id = $id";

        $query_result = mysqli_query($con, $query);
        $image_row = mysqli_fetch_assoc($query_result);

        //image path
        $num_row = mysqli_num_rows($query_result);

            if($num_row > 0){
                $image_path = "uploads/$image_row[image_name]";
            }
            else{
                $image_path ="uploads/logo.png";
            }

        //get user type and user name
        $user_query= "SELECT user_name, user_type FROM user WHERE reg_id = $id";

        $result = mysqli_query($con, $user_query);
        $user_row = mysqli_fetch_assoc($result);

        //user type
        $user_type = $user_row['user_type'];
        

        //user name 
        $user_name = $user_row['user_name'];

        //navigation bar for admin
        if($user_type == 'admin'){
        ?>
            <!-- admin panel -->

            <div class="sidebar">
                <div class="user_details">
                    <div class="user_img">
                        <img src="uploads/logo.png" >
                    </div>
                    
                    <div class="data_line">
                        <span class="user_data"><?php echo $user_name ?></span>
                        <span class="user_data2">UOJ Project Group</span>
                    </div>
                    
                </div>
                <div class="open_close">
                    <i class='bx bxs-chevrons-left icon' ></i>
                </div>

                <ul class="nav_list">

                    <li>
                        <a href="home.php">
                            <i class='bx bxs-home' ></i>
                        <span class="link_name">Home</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="home.php">Home</a></li>
                        </ul>
                    </li>
                
                    <li>
                        <a href="admin_dashboard.php">
                            <i class='bx bxs-layout'></i>
                        <span class="link_name">Dashboard</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="#">Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="admin_company.php">
                            <i class='bx bxs-buildings'></i>
                        <span class="link_name">Company</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="#">Company</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="admin_worker.php">
                            <i class='bx bxs-hard-hat' ></i>
                        <span class="link_name">Workers</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="#">Workers</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="admin_jobs.php">
                            <i class='bx bxs-briefcase' ></i>
                        <span class="link_name">Jobs</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="#">Jobs</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="iocn_link">
                        <a href="#">
                            <i class='bx bxs-envelope'></i>
                            <span class="link_name">Mails</span>
                        </a>
                        <i class='bx bxs-down-arrow arrow'></i>
                        </div>
                        <ul class="sub_menu">
                        <li><a class="link_name" href="#">Mails</a></li>
                        <li><a href="admin_company_mail.php?contact_mails">Contacts Mails</a></li>
                        <li><a href="admin_company_mail.php?com_mails">Company Mails</a></li>
                        <li><a href="admin_company_mail.php?work_mails">Worker Mails</a></li>
                        </ul>
                    </li>
                    

                    
                </ul>

                <div class="log">
                    <div class="iocn_link">
                        <a href="logout.php">
                            <i class='bx bx-power-off'></i>
                            <span class="link_name">Log Out</span>
                        </a>
                    </div>
                </div>
                
            </div>

        <?php
        }

        //navigation bar for company
        elseif($user_type == 'company'){
        ?>
            <!-- company panel -->

            <div class="sidebar" id="blur2">
                <div class="user_details">
                    <div class="user_img">
                        <img src="<?php echo $image_path?>" >
                    </div>
                    
                    <div class="data_line">
                        <span class="user_data"><?php echo $user_name ?></span>
                        <!-- <span class="user_data2">Web developer</span> -->
                    </div>
                    
                </div>
                <div class="open_close">
                    <i class='bx bxs-chevrons-left icon' ></i>
                </div>

                <ul class="nav_list">

                    <li>
                        <a href="home.php">
                            <i class='bx bxs-home' ></i>
                        <span class="link_name">Home</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="home.php">Home</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="company_dashboard.php">
                            <i class='bx bxs-layout'></i>
                        <span class="link_name">Dashboard</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="#">Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="iocn_link">
                        <a href="#">
                            <i class='bx bxs-briefcase' ></i>
                            <span class="link_name">Jobs</span>
                        </a>
                        <i class='bx bxs-down-arrow arrow'></i>
                        </div>
                        <ul class="sub_menu">
                        <li><a class="link_name" href="#">Jobs</a></li>
                        <li><a href="add_job_form.php">Add Job</a></li>
                        <li><a href="job_list.php">Job List</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="iocn_link">
                        <a href="#">
                            <i class='bx bxs-cog' ></i>
                            <span class="link_name">Settings</span>
                        </a>
                        <i class='bx bxs-down-arrow arrow'></i>
                        </div>
                        <ul class="sub_menu">
                        <li><a class="link_name" href="#">Settings</a></li>
                        <li><a href="company_profile_update.php">Edit Profile</a></li>
                        <li><a href="add_terms.php">Add Terms</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="message_admin.php">
                            <i class='bx bxs-face'></i>
                        <span class="link_name">Admin Panel</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="#">Admin Panel</a></li>
                        </ul>
                    </li>

                    
                </ul>

                <div class="log">
                    <div class="iocn_link">
                        <a href="logout.php">
                            <i class='bx bx-power-off'></i>
                            <span class="link_name">Log Out</span>
                        </a>
                    </div>
                </div>
                
            </div>

        <?php
        }

        //navigation for workers
        elseif($user_type == 'worker'){
        ?>
            <!-- worker panel -->

            <div class="sidebar">
                <div class="user_details">
                    <div class="user_img">
                        <img src="<?php echo $image_path?>" >
                    </div>
                    
                    <div class="data_line">
                        <span class="user_data"><?php echo $user_name ?></span>
                        <!-- <span class="user_data2">Web developer</span> -->
                    </div>
                    
                </div>
                <div class="open_close">
                    <i class='bx bxs-chevrons-left icon' ></i>
                </div>

                <ul class="nav_list">

                    <li>
                        <a href="home.php">
                            <i class='bx bxs-home' ></i>
                        <span class="link_name">Home</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="home.php">Home</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class='bx bxs-layout'></i>
                        <span class="link_name">Dashboard</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="#">Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="worker_jobs.php">
                            <i class='bx bxs-briefcase' ></i>
                        <span class="link_name">Jobs</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="worker_jobs.php">Jobs</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <div class="iocn_link">
                        <a href="#">
                            <i class='bx bxs-cog' ></i>
                            <span class="link_name">Settings</span>
                        </a>
                        <i class='bx bxs-down-arrow arrow'></i>
                        </div>
                        <ul class="sub_menu">
                        <li><a class="link_name" href="#">Settings</a></li>
                        <li><a href="worker_profile_update.php">Edit Profile</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="message_admin.php">
                            <i class='bx bxs-face'></i>
                        <span class="link_name">Admin Panel</span>
                        </a>
                        <ul class="sub_menu blank">
                            <li><a class="link_name" href="#">Admin Panel</a></li>
                        </ul>
                    </li>

                    
                </ul>

                <div class="log">
                    <div class="iocn_link">
                        <a href="logout.php">
                            <i class='bx bx-power-off'></i>
                            <span class="link_name">Log Out</span>
                        </a>
                    </div>
                </div>
                
            </div>
        
        <?php
        }
        
    }
    else{

        header("Location: home.php");

    }

?>

