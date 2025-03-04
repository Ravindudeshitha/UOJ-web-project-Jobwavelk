<?php 
include ('include/connection.php');

if(isset($_POST['work_update'])){

    $id = $_POST['reg_id'];
    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];

    $updateBasicQuery = "UPDATE user SET user_name='$user_name',email='$email',phone_number='$phone_number' WHERE reg_id=$id";
	$resultBasicinfo=mysqli_query($con,$updateBasicQuery);

    $description = $_POST['description'];

    $updateDescriptionQuery = "UPDATE work_profile SET description = '$description' WHERE reg_id = $id";
    $resultdescription=mysqli_query($con, $updateDescriptionQuery);

    if($resultBasicinfo && $resultdescription){
        header("location: worker_profile_update.php");
    }
    else{
       echo "Error updating data: "  .mysqli_connect_error();
    }
}

if(isset($_POST['com_update'])){

    $id = $_POST['reg_id'];
    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];

    $updateBasicQuery = "UPDATE user SET user_name='$user_name',email='$email',phone_number='$phone_number' WHERE reg_id=$id";
	$resultBasicinfo=mysqli_query($con,$updateBasicQuery);

    $com_description = $_POST['com_description'];
    $address=$_POST['address'];

    $updateDescriptionQuery = "UPDATE com_profile SET com_description='$com_description',address='$address' WHERE reg_id = $id";
    $resultdescription=mysqli_query($con, $updateDescriptionQuery);

    if($resultBasicinfo && $resultdescription){
        header("location: company_profile_update.php");
    }
    else{
       echo "Error updating data: "  .mysqli_connect_error();
    }
}

?>