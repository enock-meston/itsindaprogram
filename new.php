<?php
include('include/config.php');

if (isset($_POST['add'])) {
    $firstname= $_POST['fname'];
    $lastname = $_POST['lname'];
    $phone =$_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

        $status=1;

        $quert = mysqli_query($con,"INSERT INTO `membertbl`(`Firstname`, `Lastname`, 
        `phoneNumber`, `UserName`, `Password`, `status`) 
        VALUES ('$firstname','$lastname','$phone','$username','$password',1)");

        if($quert){
            echo "<script>alert('now you registered you can be Login ');</script>";
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        }else{
            echo "<script>alert('There is samething went Wrong...');</script>";
        }



}


?>