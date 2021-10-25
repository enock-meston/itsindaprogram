
<?php require_once('config/config.php'); 

if (isset($_POST['loginbtn'])) {
	$emailtxt = $_POST['email'];
	$passtxt = $_POST['pass'];
	$hashespas = password_hash($passtxt, PASSWORD_BCRYPT);

		$select = mysqli_query($con,"SELECT password FROM usertbl Where password='$hashespas'");
		$row = mysqli_fetch_array($select);
		while ($row>0) {
			$pass = password_verify($passtxt,$row['password']);
			
			$query = mysqli_query($con,"SELECT email,password from usertbl WHERE email='$emailtxt' AND password='$pass'");
			$row1 = mysqli_fetch_array($query);
			if ($row1) {
				echo $pass."<br><br>";
			}else {
				echo "not";
			}
		}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>externalfiles/images/itsinda.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>externalfiles/loginfiles/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>externalfiles/loginfiles/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>externalfiles/loginfiles/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>externalfiles/loginfiles/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="loginbtn">
							Login
						</button>
					</div>
					<br>
					<a class="btn login100-form-btn" href="members/register/">New Account</a>
				</form>

				<div class="login100-more" style="background-image: url('<?php echo BASE_URL; ?>externalfiles/images/logo1.jpg');">
					
			</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo BASE_URL; ?>externalfiles/loginfiles/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo BASE_URL; ?>externalfiles/loginfiles/js/main.js"></script>

</body>
</html>