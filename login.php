<?php

session_start();

include("include/db.php");
if (isset($_SESSION['email'])) {

	echo "<script> window.open('index.php','_self'); </script>";
}
?>












<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" enctype="multipart/form-data">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>





					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="Login">
							Login
						</button>
					</div>



					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>





<?php

if (isset($_POST['Login'])) {




	// $email = $_POST['email'];
	// $pass = $_POST['pass'];

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$pass = mysqli_real_escape_string($con, $_POST['pass']);



	$insert_user = "select * from users where pass='$pass' AND email='$email'";
	$run_user = mysqli_query($con, $insert_user);
	$row  = mysqli_fetch_array($run_user);

	if ($row == 0) {
		echo "<script>alert('error')</script>";
	} else {

		$_SESSION['email'] = $row['email'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['id'] = $row['id'];

		echo "<script>alert('One User Has Been Inserted successfully')</script>";

		echo "<script>window.open('index.php','_self')</script>";
	}
}
?>