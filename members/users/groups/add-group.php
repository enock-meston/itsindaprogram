<?php require_once('../../../config/config.php'); 



?>
<!doctype html>
<html lang="en">
    <head>
        <title>Add -Group</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>externalfiles/css/style.css">

        <!-- / -->
           <!-- Custom fonts for this template-->
    <link href="<?php echo BASE_URL; ?>externalfiles/addd/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo BASE_URL; ?>externalfiles/addd/css/sb-admin-2.min.css" rel="stylesheet">

    </head>
    <body>
        
        <div class="wrapper d-flex align-items-stretch">
            <!-- sidebar -->
            <?php include('../includes/sidebar.php'); ?>
            <!-- end of sidbar -->
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5">
                <h4>Add -Group </h4>
                <!-- topbar -->
                <?php include('../includes/topbar.php'); ?>
                <!-- end of topbar -->
                <h2 class="mb-4">Add -Group</h2>
               
                <div class="row">
                    
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="text">:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter Grroup Name" name="groupName">
                        </div>
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
        </div>
        <script src="<?php echo BASE_URL; ?>externalfiles/js/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>externalfiles/js/popper.js"></script>
        <script src="<?php echo BASE_URL; ?>externalfiles/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>externalfiles/js/main.js"></script>
    </body>
</html>

