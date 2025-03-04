<Html>
	<head>
		<Title></Title>
		<link rel="stylesheet" href="css/sign.css">
	</head>
	<body class="container">

	<?php
	
	include ('include/connection.php');

	if(isset($_POST['SignUp'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$phonenumber = $_POST['phonenumber'];
		$userType = $_POST['userType'];
		$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
		$confirmPassword = $_POST['confirmPassword'];


		$query = "INSERT INTO user(user_name,user_type,email,phone_number,password) VALUES('$username','$userType','$email','$phonenumber','$password')";

            $result = mysqli_query($con,$query);

            if($result){
                
                echo "<script type='text/javascript'>alert('Registration Succesfully..');
                document.location='signup.php'</script>";
            }
            else{
                echo "connection Error " .mysqli_connect_error();
            }
	}

	?>
		
		<div class="form_box">
			<h1>Sign Up</h1>
			<form method="post" action="">
				<div class="field">
					<label for="username">User Name : </label>
					<input type="text" name="username" value="">
				</div>
				
				<div class="field">
					<label for="username">E-mail : </label>
					<input type="text" name="email" value="">
				</div>
			
				
				<div class="field">
					<label for="phoneNo">Phone number : </label>
					<input type="number" name="phoneNo" value="">
				</div>

				<select name="userType">
					<option value="admin">admin</option>
				</select>
				
				<div class="field">
					<label for="password">Password : </label>
					<input type="password" name="password" value="">
				</div>
				
				<div class="field">
					<label for="confirm">Confirm : </label>
					<input type="password" name="confirm" value="">
				</div>
				
				<div class="field">
					<input class="btn" type="submit" name="SignUp" value="Sign Up">
				</div>

				<div class="field">
					<label>Already have account <a href="signIn.php">SIGN IN</a> </label>
				</div>
			</form>
		</div>
	</body>
</Html>