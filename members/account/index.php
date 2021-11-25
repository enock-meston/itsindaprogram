<?php require_once('../../config/config.php'); 
                        
$action='';
if(isset($_GET['action'])){
  $action=trim($_GET['action']);
     }

if($action=='home'){
    $page='pages/home.php';
    $title='Home';
}elseif($action=='add_group'){
    $page='groups/add-group.php';
    $title='Add Group';
}elseif($action=='join_group'){
    $page='groups/join-group.php';
    $title='Join Group';
}elseif($action=='group_request'){
    $page='groups/group_request.php';
    $title='Join Group';
}elseif($action=='group'){
    $page='groups/group.php';
    $title='My Groups';
}elseif ($action == 'add_member') {
    $page='member/add-member.php';
    $title='Add Member';
}elseif ($action == 'member_list') {
    $page='member/list-member.php';
    $title='Members';
}elseif ($action == 'logout') {
    $page='logout.php';
}
else{
    $page='pages/home.php';
    $title='Home';
}



?>
<!doctype html>
<html lang="en">
    <head>
        <title>User-ITSINDA | <?php echo $title; ?></title>
        <meta charset="utf-8">
     
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?php echo BASE_URL; ?>externalfiles/css/style.css">
<!--          <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
     <script src="<?php echo BASE_URL; ?>externalfiles/js/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
   
    

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
            <nav id="sidebar" style="background-color:  #044598;">
                <div class="p-4 pt-5">
                    <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php echo BASE_URL; ?>externalfiles/images/itsinda.png);"></a>
                    <ul class="list-unstyled components mb-5">
                       
                        <li class="active">
                            <a href="index.php">DashBoard</a>
                        </li>

                        <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Group</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="?action=group">My Groups</a>
                </li>

                <li>
                    <a href="?action=join_group">Join Group</a>
                </li>

                <li>
                    <a href="?action=group_request">Group requests</a>
                </li>
                </ul>
              </li>


              <li>
                <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Group rwequest</a>
                <ul class="collapse list-unstyled" id="homeSubmenu1">
                    <li>
                    <a href="?action=add_member">Group Member</a>
                </li>
                
                </ul>
              </li>

                        <li class="nav-item">
                                <a class="nav-link" href="?action=logout">Logout</a>
                        </li>
                    </ul>
                    <div class="footer">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="icon-heart" aria-hidden="true"></i> by <a href="https://nigoote.com" target="_blank">nigoote.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </nav>
            <!-- end of sidbar -->
            <!-- Page Content  -->
            <div id="content" class="p-0 p-md-12">
                <!-- topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="members/account/index.php">DashBoard</a>
                                </li>
                                

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container">

<?php

check_message(); // display messages...

if(!@include($page)){
    
}

                ?>
                           <!-- list Approved Request -->
                     
                     
                          
</div>
                       </div>

            </div>
        </div>
    </div>
        </div>
   
        <script src="<?php echo BASE_URL; ?>externalfiles/js/popper.js"></script>
        <script src="<?php echo BASE_URL; ?>externalfiles/js/bootstrap.min.js"></script>
        <script src="<?php echo BASE_URL; ?>externalfiles/js/main.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
    } );
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
    </body>
</html>

