<?php
session_start();
require_once('../../config/config.php'); 


if (isset($_POST['savebtn'])) {
    $reference=date("Y").rand(9999, 10000);
    $groupname= mysqli_real_escape_string($con,$_POST['groupName']);
    $groupdetails= mysqli_real_escape_string($con,$_POST['groupDetails']);
    $checkquery = mysqli_query($con,"SELECT `group_name` FROM `group_tbl` WHERE group_name LIKE '%$group_name%' OR reference='$reference'") or die(mysqli_error($con));

    if (mysqli_num_rows($checkquery) == 0) {
        $status =1;
        $insert=mysqli_query($con,"INSERT INTO `group_tbl`(`reference`,`group_name`, `group_details`, `UserId`, `Status`) VALUES 
        ('$reference','".mysqli_real_escape_string($con, $groupname)."','".mysqli_real_escape_string($con, $groupdetails)."','".$_SESSION['user_id']."','$status')") or die(mysqli_error($con));

        if ($insert) {
            message("Group was Successfully Added!!", "success");
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

