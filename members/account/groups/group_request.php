<?php
session_start();
require_once('../../config/config.php'); 
$reference='';
 

if (isset($_POST['groupsavebtn'])) {
   $reference=date("i").rand(9999, 100000000);
    $groupname= mysqli_real_escape_string($con,$_POST['groupName']);
    $groupdetails= mysqli_real_escape_string($con,$_POST['groupDetails']);
    $checkquery = mysqli_query($con,"SELECT * FROM `group_tbl` WHERE group_name='".mysqli_real_escape_string($con,$_POST['groupName'])."' OR reference='$reference'") or die(mysqli_error($con));

    if (mysqli_num_rows($checkquery) <=0) {
        $status =1;


     $insert=mysqli_query($con,"INSERT INTO `group_tbl`(`reference`,`group_name`, `group_details`,`group_type`, `Status`) VALUES 
        ('$reference','".mysqli_real_escape_string($con, $groupname)."','".mysqli_real_escape_string($con, $groupdetails)."','".$_POST['group_type']."','$status')") or die(mysqli_error($con));

        if ($insert) {
            //
                 $findquery = mysqli_query($con,"SELECT * FROM `group_tbl` WHERE reference='$reference'") or die(mysqli_error($con));
        if(mysqli_num_rows($findquery)==1){
            $findquery_data=mysqli_fetch_array($findquery);
            $group_id=$findquery_data['group_id'];
                  // automaticaly insert to the mebership table as the owner of the group
              mysqli_query($con," INSERT INTO `group_members`(`userID`, `group_id`, `join_date`, `membership`, `m_status`) VALUES('".$_SESSION['user_id']."', '".trim($group_id)."', '".date('Y-m-d')."', 'Owner', '1')") or die(mysqli_error($con));

        }else{
             message("Something went wrong while creating group. Please try again later!","error");
            redirect($_SERVER['REQUEST_URI']);
            exit(); 
        }
        //
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
        message("Group with reference: ".$reference." (".$groupname.") already exist. Please try again later!","error");
        redirect($_SERVER['REQUEST_URI']);
        exit();
    }
}

if (isset($_POST['groupupdatebtn'])) {
       $reference=date("Y").rand(9999, 10000);
    $groupname= mysqli_real_escape_string($con,$_POST['groupName']);
    $groupdetails= mysqli_real_escape_string($con,$_POST['groupDetails']);
    $checkquery1 = mysqli_query($con,"SELECT * FROM group_tbl WHERE group_id ='".$_POST['group_id']."'") or die(mysqli_error($con));

    if(mysqli_num_rows($checkquery1) ==1){

    // group resource existe


    $checkquery = mysqli_query($con,"SELECT * FROM `group_tbl` WHERE group_name LIKE '%$group_name%' AND group_id !='".$_POST['group_id']."'") or die(mysqli_error($con));

    if (mysqli_num_rows($checkquery) == 0) {
        $status =1;
        $update=mysqli_query($con,"UPDATE `group_tbl` SET 
            `group_name`='".mysqli_real_escape_string($con, $groupname)."',
         `group_details`='".mysqli_real_escape_string($con, $groupdetails)."',
          `group_type`='".$_POST['group_type']."' WHERE group_id='".$_POST['group_id']."'") or die(mysqli_error($con));

        if ($update) {
            message("Group was Successfully updated!!", "success");
            redirect($_SERVER['REQUEST_URI']);
            exit();
        }else {
        // insertion Error
            message("error occured while updating group. Please try again later!","error");
            redirect($_SERVER['REQUEST_URI']);
            exit();
        }

    }else {
       // group already exist
        message("Group already exist. Please try again later!","error");
        redirect($_SERVER['REQUEST_URI']);
        exit();
    }


}else{// group found==1 
    message("Group not found. Please try again later!","alert");
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
//die($_POST['weekamount']);


 $update=mysqli_query($con,"UPDATE `group_settings` SET `max_members` = '".trim($_POST['maxmembers'])."', `ini_amount` = '".trim($_POST['iniamount'])."',
    `daily_amount`= '".trim($_POST['dayamount'])."',
    `weekly_amount`='".$_POST['weekamount']."',
     `monthly_amount` = '".trim($_POST['monthamount'])."',
      `annual_amount` = '".trim($_POST['annualamount'])."' WHERE sett_id='".trim($_POST['group_id'])."' AND sett_id='".trim($_POST['sett_id'])."'") or die(mysqli_error($con));

        if ($update) {

            message("Group settings was Successfully updated!!", "success");
            redirect($_SERVER['REQUEST_URI']);
            exit();
        }else {
        // insertion Error
            message("error while updating. Please try again later!","error");
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


// // update 
if(isset($_POST['invitebtn'])){

  $message="Hello, <br> You have bin invited by ".$_SESSION['fname']." ".$_SESSION['lname']." from ITSINDA PROGRAM to join group ".$_POST['reference']."";
  $title='Itsinda program join group '.$_POST['reference'];
    if(send_mail($title,$message,trim($_POST['email']))==1){

            message("Invitation email was Successfully sent to ".trim($_POST['email'])."!", "success");
            redirect($_SERVER['REQUEST_URI']);
            exit();
    }else{
       message("Sorry it seems that something went wrong. Please try again later!","alert");
        redirect($_SERVER['REQUEST_URI']);
        exit(); 
    }


}









?>


  


<!-- Group table -->
    <div class="row">
             <div class="col-12">
        <h4>Group requests</h4>
  <table id="example">
          <thead>
    <tr>
  
    <th>#</th><th>Join date</th><th>Names</th> <th>Email</th> <th>Group</th><th>Action</th>

</tr>
    </thead>
    <tbody>
                            <?php
 $sql = mysqli_query($con, "SELECT * FROM `users`,`group_tbl`, `group_members` WHERE users.userID=group_members.userID AND group_members.group_id=group_tbl.group_id ") or die(mysqli_error($con));
                                $number=1;
                                while ($row = mysqli_fetch_array($sql)) {
                            ?>
                           <tr>
                            <td><?php echo $number; ?></td>
                               <td><?php echo $row['join_date']; ?></td>
                                  <td><?php echo $row['fname']; ?> &nbsp; <?php echo $row['fname']; ?></td>

                     <td><?php echo $row['email']; ?> </td>
                         <td><?php echo $row['group_name']; ?> </td>



    <?php if($row['membership']=='Owner' && $row['userID']==$_SESSION['user_id']){ 

        if($row['m_status']==1){ ?>
<a href="?action=group_request"><i class="fa fa-thumb-down"></i> Disapprove</a>
      <?php  }else{ ?>
<a href="?action=group_request"><i class="fa fa-thumb-up"></i> Approve</a>
     <?php   } 
 } ?>
</tr>


                           <?php
                           $number+=1;
                                }
                               ?>
            </tbody>

    </div>
</div>
    <!-- Ends of Group table -->
    

    <div class="modal fade" id="GroupModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Manage member</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>          
            <div class="modal-body">

      <div class="fetched-data-group"></div> 
            </div>
          </div>
          </div>
        </div> 


           <script>

 
   $(document).ready(function(){
        $('#GroupModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
             
            $.ajax({
                type : 'post',
                url : 'groups/group_form.php', //Here you will fetch records 
                data :  'rowid='+ rowid, //Pass $id
                success : function(data){
                $('.fetched-data-group').html(data);//Show fetched data from database
                }
            });
         });
    });
 // all
</script>