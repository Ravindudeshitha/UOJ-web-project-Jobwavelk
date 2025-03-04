<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SignIn and SignUp</title>

	<link rel="stylesheet" href="css/signup.css?=<?php echo time(); ?>">
</head>


<body>


<?php

	//include connection php
	include ('include/connection.php');
		session_start();
	//start session



	//for sigin
	if(isset($_POST['signin'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		$query="SELECT * FROM user WHERE user_name='$username'";
		$result = mysqli_query($con,$query);
		$num_of_row = mysqli_num_rows($result);	

		if($result){
			if($num_of_row != 0){
				$row=mysqli_fetch_assoc($result);
			// print_r($row);
				if(password_verify($password,$row['password'])){
					$_SESSION['reg_id'] = $row['reg_id'];

					if($row['user_type'] == 'worker'){
						$q1 = "SELECT * FROM work_profile WHERE reg_id=$row[reg_id]";

						$r1 = mysqli_query($con,$q1);

						$rows = mysqli_fetch_assoc($r1);
						$_SESSION['work_id'] = $rows['work_id'];
					}
					else{
						$q2 = "SELECT * FROM com_profile WHERE reg_id=$row[reg_id]";

						$r2 = mysqli_query($con,$q2);

						$rows = mysqli_fetch_assoc($r2);
						$_SESSION['com_id'] = $rows['com_id'];
					}
					
					header("Location: home.php");

					// if($row['user_type'] == 'company'){
					//     header("Location: companyDashboard.php");
					// }
					// else{
					//     header("Location: home.php");
					// }
				}
				else{
					$error = "Your Password is incorrect!";
					display($error);
				}
			}
			else{
				$error = "Your User Name is incorrect!";
				display($error);
			}
			
		}else{
			$error = "error 101s";
				display($error);
		}
	}




	//for sign up details
	elseif(isset($_POST['signup'])){

		$username = $_POST['username'];
		$email = $_POST['email'];
		$phonenumber = $_POST['phonenumber'];
		$userType = $_POST['userType'];
		$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
		$confirmPassword = $_POST['confirmPassword'];


		if($_POST['password'] == $confirmPassword){
			$query = "SELECT * FROM user WHERE user_name='$username' OR email='$email'";
			$result = mysqli_query($con, $query);

			if(mysqli_num_rows($result) == 1){
					$error = "User name or Email is already taken !";
					display2($error);
				
			}
			else{
				
				//insert data to user table
				$query = "INSERT INTO user(user_name,user_type,email,phone_number,password) VALUES('$username','$userType','$email','$phonenumber','$password')";

				$result = mysqli_query($con,$query);


				$query2 = "SELECT reg_id FROM user WHERE user_name = '$username'";
				$result2 = mysqli_query($con, $query2);

				$reg_row = mysqli_fetch_assoc($result2);
				print_r($reg_row);
				$reg_id = $reg_row['reg_id'];

				//choose user
				if($userType == 'company'){
					$com_description = "Update Company Description";
					$com_address = "Update Company Address";
					$terms = "Punctuality imperative. Deliver courteous service. Prioritize conflict resolution. Foster seamless collaboration with colleagues for a harmonious work environment.";
					$com_image = "company_avatar.jpg";

					$company_query ="INSERT INTO com_profile(com_description,address,terms,reg_id,com_image) VALUES('$com_description', '$com_address','$terms','$reg_id','$com_image')";

					$com_result = mysqli_query($con,$company_query);
				}
				elseif($userType == 'worker'){
					$work_description = "Update Company Description";
					$work_image = "worker_avatar.jpg";

					$work_query ="INSERT INTO work_profile(reg_id,description,work_image) VALUES('$reg_id','$work_description','$work_image')";

					$work_result = mysqli_query($con,$work_query);
				}

				if($result){
					
					$error = "Registration Succesfully..";
					display($error);
				}
				else{
					echo "connection Error " .mysqli_connect_error();
				}
			}
		}else{
			$error = "Your Confirm password is incorrect!";
				display2($error);
		}

	}

	//default display and error display
	else{
		if(isset($_GET['signup'])){
			$error = "none";
			display2($error);
		}
		else{
			$error = "none";
			display($error);
		}
		
	}

	
	// else{
	// 	echo "<div class='container' id='container'>";
	// }

	//display function

	function display2($error){


	// elseif(isset($_GET['signin'])){
	// 	echo "<div class='container' id='container'>";
	// }
	//chech the link is for sign up or sign in

	
	 	
	 	
?>

<div class="right-panel-active container" id="container">

	<!-- sign up -->

	<div class="form-container sign-up-container">
		<form action="" method="post">
			<h1>Create Account</h1>
			<?php
				if($error == "Your Confirm password is incorrect!"){
					echo "<h3>Your Confirm password is incorrect!</h3>";
				}
				if($error == "User name or Email is already taken !"){
					echo "<h3>User name or Email is already taken !</h3>";
				}
				if($error == "Registration Succesfully.."){
					echo "<h4>Registration Succesfully..</h4>";
				}
			?>
			
			<input type="text"  name="username" placeholder="Username" required />
			<input type="email" name="email" placeholder="Email" required/>
			<input type="text" name="phonenumber" placeholder="Phone number" required>
			<select id="" name="userType" placeholder="Account Type">
				<option value="worker">Worker</option>
				<option value="company">Company</option>
			</select>
			<input type="password" class="password" name="password" placeholder="Password" required />
			<input type="password" class="confirmPassword" name="confirmPassword" placeholder="Confirm" required/>
			<button class="signup" type="submit" name="signup">Sign Up</button>
		</form>
	</div>

	<!-- sign in -->

	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h1>Sign in</h1><br><br>
			
			<?php
				if($error == "Your User Name is incorrect!"){
					echo "<h3>Your User Name is incorrect!</h3>";
				}
				if($error == "Your Password is incorrect!"){
					echo "<h3>Your Password is incorrect!</h3>";
				}
			?>
			
			<input type="text" name="username" placeholder="User Name" required/>
			<input type="password" name="password" placeholder="Password" required/>
			<a href="#">Forgot your password?</a>
			<button type="submit" name="signin">Sign In</button>
		</form>
	</div>



	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<img src="image/logo5_white.png" alt="">
				<h1 ></h1>
				<p></p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<img src="image/logo5_white.png" alt="">
				
				<p>Enter your personal details and find jobs</p>
				<button class="ghost" id="signup">Sign Up</button>
			</div>
		</div>
	</div>
</div>


<?php
		
	}

 function display($error){

 
?>

<div class="container" id="container">

	<!-- sign up -->

	<div class="form-container sign-up-container">
		<form action="" method="post">
			<h1>Create Account</h1>
			<?php
				if($error == "Your Confirm password is incorrect!"){
					echo "<h3>Your Confirm password is incorrect!</h3>";
				}
				if($error == "User name or Email is already taken !"){
					echo "<h3>User name or Email is already taken !</h3>";
				}
				if($error == "Registration Succesfully.."){
					echo "<h4>Registration Succesfully..</h4>";
				}
			?>
			
			<input type="text"  name="username" placeholder="Username" required />
			<input type="email" name="email" placeholder="Email" required/>
			<input type="text" name="phonenumber" placeholder="Phone number" required>
			<select id="" name="userType" placeholder="Account Type">
				<option value="worker">Worker</option>
				<option value="company">Company</option>
			</select>
			<input type="password" class="password" name="password" placeholder="Password" required />
			<input type="password" class="confirmPassword" name="confirmPassword" placeholder="Confirm" required/>
			<button class="signup" type="submit" name="signup">Sign Up</button>
		</form>
	</div>

	<!-- sign in -->

	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h1>Sign in</h1><br><br>
			
			<?php
				if($error == "Your User Name is incorrect!"){
					echo "<h3>Your User Name is incorrect!</h3>";
				}
				if($error == "Your Password is incorrect!"){
					echo "<h3>Your Password is incorrect!</h3>";
				}
			?>
			
			<input type="text" name="username" placeholder="User Name" required/>
			<input type="password" name="password" placeholder="Password" required/>
			<a href="#">Forgot your password?</a>
			<button type="submit" name="signin">Sign In</button>
		</form>
	</div>



	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<img src="image/logo5_white.png" alt="">
				<h1 ></h1>
				<p></p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<img src="image/logo5_white.png" alt="">
				
				<p>Enter your personal details and find jobs</p>
				<button class="ghost" id="signup">Sign Up</button>
			</div>
		</div>
	</div>
</div>


<?php
 }

?>



<script type="text/javascript" src="js/script.js"></script>


</body>
</html>