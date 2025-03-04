<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Menu</title>

    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/dashboard_form_style.css">

    <!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    

</head>
<body>

<!--############sidebar menu #############-->

<?php
    session_start();

    include('include/connection.php');
    include ('sidebar.php');
    
 
        $reg_id = $_SESSION['reg_id'];


        //retrive company data from user table
        $query1 = "SELECT * FROM user WHERE reg_id = '$reg_id'";
        $result1 = mysqli_query($con,$query1);
        $row1 = mysqli_fetch_array($result1);

        $user_name = $row1['user_name'];
        $user_type = $row1['user_type'];
        $email = $row1['email'];
        $phone = $row1['phone_number'];

        
        
    

        //retrive company data from company table

        $query2 = "SELECT * FROM work_profile WHERE reg_id = '$reg_id'";
        $result2 = mysqli_query($con,$query2);
        $row2 = mysqli_fetch_array($result2);

        $description = $row2['description'];
        $work_image = "uploads/$row2[work_image]";

        

        if(isset($_POST['work_update']) && isset($_FILES['update_image'])){
            
            $user_name = $_POST['user_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone_number'];
            $address = $_POST['address'];
            $description = $_POST['description'];

            //image file
            $image_name = $_FILES['update_image']['name'];
            $size = $_FILES['update_image']['size'];
            $tmp_name = $_FILES['update_image']['tmp_name'];
            
            if($size < 2000000){
                $extention = pathinfo($image_name, PATHINFO_EXTENSION);
                $extention_lower = strtolower($extention);
                $allow_extention = array("jpg", "png", "jpeg");

                if(in_array($extention, $allow_extention)){
                    $new_name = uniqid("IMG-", true).'.'.$extention_lower;
                    $img_path = 'uploads/'.$new_name;

                    move_uploaded_file($tmp_name,$img_path);
                }
            }
            
            if(empty($_FILES['update_image']['name'])){
                $update_work_image = $row2['work_image'];
            }
            else{
                $update_work_image = $new_name;
            }

            $update1 = "UPDATE work_profile SET description = '$description', work_image = '$update_work_image' WHERE reg_id = '$reg_id'";
            $result1 = mysqli_query($con, $update1);

            $update2 = "UPDATE user SET user_name = '$user_name', email = '$email', phone_number = '$phone' WHERE reg_id = '$reg_id'";
            $result2 = mysqli_query($con, $update2);

            $_SESSION['user_name'] = $_POST['user_name'];
            $_SESSION['user_type'] = $user_type;

            header("Location: workers_dashboard.php");

        }


   ?>
<!--############# hom body #############-->


    <section class="home_section">
		<div class="home_content">

            <div class="profile_update">
                <div class="update_form">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="prof_image">
                            <div class="con_1">
                                <img src="<?php echo $image_path?>" alt="profile image">

                                <i class='bx bxs-camera'></i>

                                <input type="file" name="update_image">
                            </div>

                            <div class="con_2">
                                <h2>Update Worker Profile</h2>
                            </div>
                            
                        </div>

                        <div class="form_content">
                            <div class="field">
                                <label for="user_name">Name :</label>
                                <input type="text" name="user_name" value="<?php echo $user_name ?>"required>
                            </div>

                            <div class="field">
                                <label for="email">Email :</label>
                                <input type="text" name="email" value="<?php echo $email ?>" required>
                            </div>

                            <div class="field">
                                <label for="phone_number">Phone :</label>
                                <input type="number" name="phone_number" value="<?php echo $phone ?>"required>
                            </div>

                            <div class="field">
                                <label for="description">Description :</label>
                                <textarea name="description" required><?php echo $description ?></textarea>
                            </div>
                            <input type="hidden" name="reg_id" value="<?php echo $id; ?>">

                            <div class="field">
                                <input type="submit" name="work_update" value="update">
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