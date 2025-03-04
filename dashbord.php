<?php
    session_start();
    include ('include/connection.php');

    if(isset($_SESSION['reg_id'])){
        $user_query= "SELECT user_type FROM user WHERE reg_id = $_SESSION[reg_id]";

        $result = mysqli_query($con, $user_query);
        $user_row = mysqli_fetch_assoc($result);

        $user_type = $user_row['user_type'];
        

        if($user_type == 'admin'){
            $_SESSION['admin'] = 'admin';
            header("Location: admin_dashboard.php");
        }
        elseif($user_type == 'company'){

            $company_query= "SELECT com_id FROM com_profile WHERE reg_id = $_SESSION[reg_id]";

            $result = mysqli_query($con, $company_query);
            $company_row = mysqli_fetch_assoc($result);

            $com_id = $company_row['com_id'];
            $_SESSION['com_id'] = $com_id;      

            $_SESSION['company'] = 'company';
            header("Location: company_dashboard.php");
        }
        elseif($user_type == 'worker'){

            $work_query= "SELECT work_id FROM work_profile WHERE reg_id = $_SESSION[reg_id]";

            $result = mysqli_query($con, $work_query);
            $work_row = mysqli_fetch_assoc($result);

            $work_id = $work_row['work_id'];
            $_SESSION['work_id'] = $work_id;


            $_SESSION['workers'] = 'worker';
            header("Location: workers_dashboard.php");
        }

    }
    else{
        header('Location: home.php');
    }
    

?>