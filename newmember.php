<?php
include('include/config.php');

if (isset($_POST['add'])) {
    $firstname= $_POST['fname'];
    $lastname = $_POST['lname'];
    $phone =$_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

        $status=1;

// select_check query used to check if member is alread exist$result = mysqli_query($con,$sql);

        $select_chech= mysqli_query($con,"SELECT  * FROM membertbl WHERE phoneNumber='".$_POST['phone']."'");

            if (mysqli_num_rows($select_chech)>0) {
                echo "<script>alert('user is areald exist');</script>";
            }else {
                
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




}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Member</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
    .note {
        text-align: center;
        height: 80px;
        background: -webkit-linear-gradient(left, #215A68, #223B42);
        color: #fff;
        font-weight: bold;
        line-height: 80px;
    }

    .form-content {
        padding: 5%;
        border: 1px solid #ced4da;
        margin-bottom: 2%;
    }

    .form-control {
        border-radius: 1.5rem;
    }

    .btnSubmit {
        border: none;
        border-radius: 1.5rem;
        padding: 1%;
        width: 20%;
        cursor: pointer;
        background: #0062cc;
        color: #fff;
    }
    </style>

</head>

<body>




    <!-- /////////////////////sample -->
    <div class="container-fluid">
        <h1>Add New Account</h1>
    </div>




    <div class="container register-form">

        <div class="form-content">
            <div class="card-body">
                <div class="form">
                    <div class="note">
                        <p>This is a the Form that help you to Create account in KMN system.</p>
                    </div>
                    <h2>Fill this Form</h2>

                    <form method="POST" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- <div class="input-group"> -->
                                <div class="form-group">
                                    <label for="uname">First Name:</label>
                                    <input type="text" class="form-control" id="uname" placeholder="Enter First Name"
                                        name="fname" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <!-- </div> -->
                            </div>



                            <div class="col-md-6">
                                <!-- <div class="input-group"> -->
                                <div class="form-group">
                                    <label for="uname">Last Name:</label>
                                    <input type="text" class="form-control" id="uname" placeholder="Enter Last Name"
                                        name="lname" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <!-- <div class="input-group"> -->
                                <div class="form-group">
                                    <label for="uname">Phone Number:</label>
                                    <input type="text" class="form-control" id="uname" placeholder="Enter Phone Number"
                                        name="phone" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                    <!-- </div> -->
                                </div>
                            </div>






                            <div class="col-md-6">
                                <!-- <div class="input-group"> -->
                                <div class="form-group">
                                    <label for="uname">User Name:</label>
                                    <input type="text" class="form-control" id="uname" placeholder="Enter User Name"
                                        name="username" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <!-- <div class="input-group"> -->
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                        name="password" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>


                        <input type="submit" name="add" class="btn btn-primary" style="background-color:#223B42;"
                            value="Add Me"><br><br>
                        <a href="index.php">Back to Login</a>
                    </form>

                </div>
            </div>
        </div>
    </div>










    <script>
    // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>




    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>

</html>