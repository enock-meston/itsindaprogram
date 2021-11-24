<?php require_once('../../config/config.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>externalfiles/loginfiles/images/icons/favicon.ico"/>
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
				<form class="login100-form form-control  validate-form">
					<span class="login100-form-title p-b-43">
						Register to continue Login
					</span>
					
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="fname">
						<span class="focus-input100"></span>
						<span class="label-input100">First Name</span>
					</div>

                    <div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="lname">
						<span class="focus-input100"></span>
						<span class="label-input100">Last Name</span>
					</div>
                    <div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="phonenumber">
						<span class="focus-input100"></span>
						<span class="label-input100">Phone Number</span>
					</div>
					
                    <div class="form-group">
                        <label for="sel1">Select Gender</label>
                        <select class="form-control" id="sel1" name="gender">
                        <option>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div> 

                    <div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="Province">
						<span class="focus-input100"></span>
						<span class="label-input100">Province</span>
					</div>
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="District">
						<span class="focus-input100"></span>
						<span class="label-input100">District</span>
					</div>
                    <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="Sector">
						<span class="focus-input100"></span>
						<span class="label-input100">Sector</span>
					</div>

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
						<button class="login100-form-btn">
							Register
						</button>
					</div>
					<br>
					<a class="btn login100-form-btn" href="<?php echo BASE_URL; ?>members/index.php">Back to Login</a>
				</form>

				<div class="login100-more" style="background-image: url('externalfiles/loginfiles/images/bg-01.jpg');">
					
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