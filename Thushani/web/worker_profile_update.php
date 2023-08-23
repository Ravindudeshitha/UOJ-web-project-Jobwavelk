<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Menu</title>

    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/dashboard_form.css">

    <!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    

</head>
<body>

<!--############sidebar menu #############-->

<?php
    include ('sidebar.php');
    
    

?>
<?php
    include('connection.php');
    if(isset($_GET['reg_id'])){
        $id = $_GET['reg_id'];
        // Retrieve worker's basic info from the first table
    $queryBasicInfo = "SELECT user_name, phone_number,email FROM user WHERE reg_id = $id";
    $resultBasicInfo = mysqli_query($con, $queryBasicInfo);
    $rowBasicInfo = mysqli_fetch_assoc($resultBasicInfo);


    
    // Retrieve worker's description from the second table
    $queryDescription = "SELECT description FROM work_profile WHERE reg_id = $id";
    $resultDescription = mysqli_query($con, $queryDescription);
    $rowDescription = mysqli_fetch_assoc($resultDescription);


    }
   ?>
<!--############# hom body #############-->


    <section class="home_section">
		<div class="home_content">

            <div class="profile_update">
                <div class="update_form">
                    <form action="update.php" methode="post">
                        <div class="prof_image">
                            <div class="con_1">
                                <img src="image/logo.png" alt="profile image">

                                <i class='bx bxs-camera'></i>

                                <input type="file" name="update_image">
                            </div>

                            <div class="con_2">
                                <h2>Update Worker Profile</h2>
                            </div>
                            
                        </div>

                        <div class="form_content">
                            <div class="field">
                                <label for="name">Name :</label>
                                <input type="text" name="name" value="<?php if(isset($_GET['reg_id'])){echo $rowBasicInfo['user_name'];} ?>"required>
                            </div>

                            <div class="field">
                                <label for="email">Email :</label>
                                <input type="text" name="email" value="<?php if(isset($_GET['reg_id'])){echo $rowBasicInfo['email'];} ?>" required>
                            </div>

                            <div class="field">
                                <label for="phone">Phone :</label>
                                <input type="number" name="phone" value="<?php if(isset($_GET['reg_id'])){echo $rowBasicInfo['phone_number'];} ?>"required>
                            </div>

                            <div class="field">
                                <label for="description">Description :</label>
                                <textarea name="description" <?php if(isset($_GET['reg_id'])){echo $rowDescription['description'];} ?>required></textarea>
                            </div>
                            <input type="hidden" name="reg_id" value="<?php echo $id; ?>">

                            <div class="field">
                                <input type="submit" name="Work_UPDATE" value="UPDATE">
                            </div>

                            
                        </div>

                        
                    </form>

                </div>
            </div>
		
		</div>
	 </section>

    <script src="js/script.js"></script>
    
</body>
</html>