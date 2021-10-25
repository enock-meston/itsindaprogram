<?php require_once('../../config/config.php'); 

<<<<<<< HEAD
if(isset($_POST['register'])){
    $cek = mysqli_query($con,"SELECT * FROM users WHERE email='".trim($_POST['email'])."' OR phonenumber='".trim($_POST['phonenumber'])."' ") or die(mysqli_error($con));
    $password1=mysqli_real_escape_string($con,$_POST['pass1']);
   $password2=mysqli_real_escape_string($con,$_POST['pass2']);
 
      if($password1 == $password2){
    if(mysqli_num_rows($cek) == 0){
    $reference=rand(1000,9999); // token reference
    $pass=password_hash($password1, PASSWORD_BCRYPT);
     $insert=mysqli_query($con,"INSERT INTO `users`(`reference`, `fname`, `lname`, `gender`, `email`, `phonenumber`, `password`, `province`, `District`, `sector`) VALUES (
    '".$reference."',
     '".mysqli_real_escape_string($con, trim($_POST['fname']))."',
     '".mysqli_real_escape_string($con, trim($_POST['lname']))."',
     '".mysqli_real_escape_string($con, trim($_POST['gender']))."',
     '".mysqli_real_escape_string($con, trim($_POST['email']))."',
     '".mysqli_real_escape_string($con, trim($_POST['phonenumber']))."',
     '".mysqli_real_escape_string($con, trim($pass))."',
     '".mysqli_real_escape_string($con, trim($_POST['Province']))."',
     '".mysqli_real_escape_string($con, trim($_POST['District']))."',
     '".mysqli_real_escape_string($con, trim($_POST['Sector']))."')") or die(mysqli_error($con));
     if($insert){
        message("Account password created  successfully. Please login to continue!", "success");
        redirect($_SERVER['REQUEST_URI']);
       exit();
     }else{
        message("Error occured while proccessing this request. Please try again later!", "error");
        redirect($_SERVER['REQUEST_URI']);
       exit();
     }   




    }else{
        // user already exist
        message("User with specified email already exist. Please try again later!","error");
        redirect($_SERVER['REQUEST_URI']);
        exit();
    }

}else{ // empty mail
    message("Passwords doesn't match. Please try again later!", "alert");
           redirect($_SERVER['REQUEST_URI']);
          exit();
    }

}

=======


>>>>>>> 0ef47d06d51556a791f86bd12e45419f473b30b9
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
</head>
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">

			<div class="wrap-login100">
				<form class="login100-form form-control  validate-form" method="post" id="register-form">
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
                        <select class="wrap-input100 validate-input" name="gender">
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
						<input class="input100" type="password" name="pass1">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass2">
						<span class="focus-input100"></span>
						<span class="label-input100">Confirm Password</span>
					</div>

					<div class="container-login100-form-btn">
						<input type="hidden" name="register">
						<button class="login100-form-btn" type="submit" name="register">
							Register
						</button>
					</div>
					<br>
					<a class="btn login100-form-btn" href="<?php echo BASE_URL; ?>/index.php">Back to Login</a>
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