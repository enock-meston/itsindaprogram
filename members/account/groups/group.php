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



if(isset($_POST['updatebtn'])){


   $checkquery = mysqli_query($con,"SELECT * FROM `group_settings` WHERE group_id='".trim($_POST['group_id'])."' ") or die(mysqli_error($con));

    if (mysqli_num_rows($checkquery) == 0) {

 $insert=mysqli_query($con,"INSERT INTO `group_settings`(`group_id`,
  `max_members`,
   `ini_amount`,
    `daily_amount`, 
    `weekly_amount`,
     `monthly_amount`,
      `annual_amount`, 
      `sett_status`) VALUES 
        ('".trim($_POST['group_id'])."',
            '".trim($_POST['maxmembers'])."',
            '".trim($_POST['iniamount'])."',
            '".trim($_POST['dayamount'])."',
            '".trim($_POST['weekamount'])."',
            '".trim($_POST['monthamount'])."',
            '".trim($_POST['annualamount'])."',
            '1')") or die(mysqli_error($con));

        if ($insert) {
            // automaticaly insert to the mebership table as the owner of the group
              mysqli_query($con," INSERT INTO `group_members`(`userID`, `group_id`, `join_date`, `membership`, `m_status`) VALUES('".$_SESSION['user_id']."', '".trim($_POST['group_id'])."', '".date('Y-m-d')."', 'Owner', '1')") or die(mysqli_error($con));


            message("Group settings was Successfully Added!!", "success");
            redirect($_SERVER['REQUEST_URI']);
            exit();
        }else {
        // insertion Error
            message("error in Insertion Process. Please try again later!","error");
            redirect($_SERVER['REQUEST_URI']);
            exit();
        }


    }else if (mysqli_num_rows($checkquery) == 1) {

//



 $update=mysqli_query($con,"UPDATE `group_settings` SET `max_members` = '".trim($_POST['maxmembers'])."', `ini_amount` = '".trim($_POST['iniamount'])."',
    `daily_amount`= '".trim($_POST['dayamount'])."',
    `weekly_amount`=  '".trim($_POST['weekamount'])."',
     `monthly_amount` = '".trim($_POST['monthamount'])."',
      `annual_amount` = '".trim($_POST['annualamount'])."' WHERE sett_id='".trim($_POST['group_id'])."' AND sett_id='".trim($_POST['sett_id'])."'") or die(mysqli_error($con));

        if ($update) {

            message("Group settings was Successfully updated!!", "success");
            redirect($_SERVER['REQUEST_URI']);
            exit();
        }else {
        // insertion Error
            message("error whole updating. Please try again later!","error");
            redirect($_SERVER['REQUEST_URI']);
            exit();
        }


        //
    } else{
             message("Sorry it seems that something went wrong. Please try again later!","alert");
        redirect($_SERVER['REQUEST_URI']);
        exit();   
    }



}


// update 
if(isset($_POST['updatebtn'])){

  


}









?>


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
                                    placeholder="Enter Group Name" name="groupName">
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
             <div class="col-12">
        <h4>Group Table</h4>
        <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                      <th>Reference</th>

                                <th>Group Name</th>
                                <th>Group Datails</th>
                                <th>Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = mysqli_query($con, "SELECT * FROM `group_tbl` WHERE userID='".$_SESSION['user_id']."' AND Status='1'") or die(mysqli_error($con));
                                $number=1;
                                while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td><?php echo $number;?></td>
                                           <td><?php echo $row['reference']; ?></td>
                                    <td><?php echo $row['group_name']; ?></td>
                                    <td><?php echo $row['group_details']; ?></td>
                                    <td>
<a href="#" title="Click here to edit settings..." data-toggle="modal" data-target="#SettingsModal" data-id="<?php echo $row['group_id']; ?>" style="float: right;">

    <i class="fa fa-cog" aria-hidden="true"></i> Settings</a></td>
                                </tr>
                           <?php
                           $number+=1;
                                }
                               ?>
                        </tbody>
                    </table>

                            
                   
    </div>
</div>
    <!-- Ends of Group table -->
    

    <div class="modal fade" id="SettingsModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Group settings</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>          
            <div class="modal-body">

      <div class="fetched-data-settings"></div> 
            </div>
          </div>
          </div>
        </div> 


           <script>

 
   $(document).ready(function(){
        $('#SettingsModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
             
            $.ajax({
                type : 'post',
                url : 'groups/group_settings_form.php', //Here you will fetch records 
                data :  'rowid='+ rowid, //Pass $id
                success : function(data){
                $('.fetched-data-settings').html(data);//Show fetched data from database
                }
            });
         });
    });
 // all
</script>