<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Terms</title>

    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/dashboard_form_style.css">

    <!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>


<body>

<?php
    session_start();

    include('include/connection.php');
    include ('sidebar.php');


    $query = "SELECT terms FROM com_profile WHERE reg_id = $_SESSION[reg_id]";

    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($result);

    $terms = $row['terms'];

?>


<div class="home_section">
    <div class="home_content">
        <div class="profile_update">
            <div class="update_form">
                <form action="" method="post">
                    <div class="prof_image">
                        <div class="con_1">
                            <img src="<?php echo $image_path ?>" alt="profile image">

                            
                        </div>

                            
                        <div class="con_2">
                               
                            <h2>Update Terms</h2>
                            
                        </div>
                            
                    </div>

                    <div class="form_content">
                        <div class="field">
                            <label for="terms">Edit your terms :</label>

                            <textarea  class="terms_area" name="terms" value="" required ><?php echo $terms ?></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 <script src="js/sidebar_script.js"></script>
</body>
</html>