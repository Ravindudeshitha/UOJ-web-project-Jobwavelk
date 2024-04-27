<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="css/side_navigation.css">
    <link rel="stylesheet" href="css/admin_msg.css">



    
    <!-- Boxicons CSS -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


</head>

<body>

<?php
    session_start();

    include('sidebar.php');
?>


    <div class="home_section">
        <div class="home_content">

            <div class="form_box">
                <form action="msg_mail_com_work.php" method="post">
                    <h3>Send Your Problem To Admin</h3>
                    <hr>
                    <div class="field">
                        <label for="subject">Subject : </label>
                        <input type="text" name="subject" required>
                    </div>

                    <div class="field">
                        <label for="message">Message : </label>
                        <textarea name="message"></textarea required>
                    </div>

                    <div class="field">
                        <input type="submit" name="send">
                    </div>
                </form>
            </div>

        </div>
    </div>


    <script src="js/sidebar_script.js"></script>

</body>
</html>