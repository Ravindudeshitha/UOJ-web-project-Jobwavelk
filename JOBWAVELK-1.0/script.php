<?php
include('include/connection.php');


// delete the job in dashbord 
if(isset($_GET['id']) && isset($_GET['action'])=="delete"){
    $id = $_GET['id'];

    $sql = "DELETE FROM add_job WHERE job_id='$id'";
    $result = mysqli_query($con,$sql);
    header("location:company_dashboard.php");
}

// update the job in dashboard
if(isset($_GET['id']) && isset($_GET['action'])=="update"){
    $id = $_GET['id'];

    $sql = "UPDATE add_job SET job_title=' WHERE job_id='$id'";
    $result = mysqli_query($con,$sql);
    header("location:company_dashboard.php");
}
?>