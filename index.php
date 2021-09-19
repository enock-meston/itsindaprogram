<?php
// includes('include/config.php');
// session_start();

// if (isset($_POST['login'])) {
    
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>KMN</title>
</head>

<body>



    <div class="col-sm-12">
        <div class="wrapper-page">

            <div class="row">
                <div class="container">

                </div>

                <div class="container col-sm-3 col-md-4 col-md-offset-6" id="newmodel">
                    <h2>Login Form</h2>

                    <form class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="uname">Username:</label>
                            <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname"
                                required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                name="pswd" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Login" name="login"><br><br>
                        <a href="newmember.php">Create New Account</a>
                    </form>
                </div>
            </div>
        </div>
    </div>































    <script>
        // Disable form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
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
</body>

</html>