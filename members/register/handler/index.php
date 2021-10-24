<?php require_once('../../../config/config.php'); 
if(isset($_POST['register'])){
    $cek = mysqli_query($con,"SELECT * FROM users WHERE email='".trim($_POST['email'])."' OR phonenumber='".trim($_POST['phonenumber'])."')  ");
    $password1=mysqli_real_escape_string($con,$_POST['pass1']);
   $password2=mysqli_real_escape_string($con,$_POST['pass2']);
 
      if($password1 == $password2){
    if(mysqli_num_rows($cek) == 0){
    $reference=mrand(1000,9999); // token reference
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
        message("Account password created  successfully. Please login to continue!", "error");
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

?>