<?php
require_once('../../config/config.php'); 
session_start();

if (isset($_POST['savebtn'])) {
    $groupname= mysqli_real_escape_string($con,$_POST['groupName']);
    $groupdetails= mysqli_real_escape_string($con,$_POST['groupDetails']);
    $checkquery = mysqli_query($con,"SELECT `group_name` FROM `grouptbl` WHERE group_name='$group_name'");

    if (mysqli_num_rows($checkquery) == 0) {
        $status =1;
        $insert=mysqli_query($con,"INSERT INTO `grouptbl`(`group_name`, `group_details`, `UserId`, `ActiveStatus`) VALUES 
        ('$groupname','$groupdetails','".$_SESSION['user_id']."','$status')");

        if ($insert) {
            message("Group is Successfully Added!!");
            redirect($_SERVER['REQUEST_URI']);
            exit();
        }else {
        // insertion Error
            message("error in Insertion Process. Please try again later!","error");
            redirect($_SERVER['REQUEST_URI']);
            exit();
        }

    }else {
       // group already exist
        message("Group already exist. Please try again later!","error");
        redirect($_SERVER['REQUEST_URI']);
        exit();
    }
}















?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    
</head>
<body>


<div class="container">
    <div class="row">
        <h1>
            My Groups
        </h1>
       
    </div>
    <div class="row">
        <div class="m-b-30">
            <hr>
                    <button  class="btn waves-effect waves-light" style="background-color: #044598;" 
                    data-toggle="modal" data-target="#login">Add Group
                    <i class="mdi mdi-plus-circle-outline"></i></button>
            </div>
            <!-- model -->
 <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-md">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          
          <h4 class="modal-title"><strong> Add Your Group</strong></h4>
          <button type="button" class="close pull-left" data-dismiss="modal">&times</button>
        </div>
        <div class="modal-body">

            <form class="form-horizontal"  method="POST">
                
                        <div class="form-group">
                                    <label for="text">Group Name:</label>
                                    <input type="text" class="form-control" id="email" 
                                    placeholder="Enter Grroup Name" name="groupName">
                        </div>
                    
                        <div class="form-group">
                                    <label for="exampleTextarea1">Group Details</label>
                                    <textarea class="form-control" id="exampleTextarea1" 
                                    rows="4" name="groupDetails"></textarea>
                                </div>
                 
                <div class="form-group">
                    <button class="btn bg-primary" type="submit" name="savebtn">
                        Save
                    </button>
                </div>

            </form>

        </div>
      </div>

    </div>
  </div>
<!-- end of model -->
    </div>


<!-- Group table -->
    <div class="row">
        <h4>Group Table</h4>
        <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Group Name</th>
                                <th>Group Datails</th>
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = mysqli_query($con, "SELECT * FROM `grouptbl` WHERE ActiveStatus='1'");
                                while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['group_id'];?></td>
                                    <td><?php echo $row['group_name'];?></td>
                                    <td><?php echo $row['group_details'];?></td>
                                    <td>Settings <i class="fa fa-cog" aria-hidden="true"></i></td>
                                </tr>
                           <?php
                                }
                               ?>
                        </tbody>
                            
                   
    </div>

    <!-- Ends of Group table -->
    

</div>

<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
    } );
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
