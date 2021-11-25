<?php
session_start();
require_once('../../config/config.php'); 
$reference='';

// // update 
if(isset($_GET['app_id']) && $_GET['app_id']!=''){

  $message="Hello, <br> Your request to join itsinda program was approved successfully";

  $query=mysqli_query($con," UPDATE `group_members` SET m_status='1' WHERE id='".trim($_GET['app_id'])."'") or die(mysqli_error($con));
    if(send_mail('Request Approve',$message,trim($_GET['m']))==1){

            message("Notification email was Successfully sent to ".trim($_GET['m'])."!", "success");
            redirect('?action=group_request');
            exit();
    }else{
       message("Sorry it seems that something went wrong. Please try again later!","alert");
        redirect('?action=group_request');
        exit(); 
    }


}




if(isset($_GET['dis_id']) && $_GET['dis_id']!=''){

  $message="Hello, <br> Your request to join itsinda program was dis-approved successfully!";

  $query=mysqli_query($con," DELETE FROM `group_members`  WHERE id='".trim($_GET['dis_id'])."'") or die(mysqli_error($con));
    if(send_mail('Request dis-approve',$message,trim($_GET['m']))==1){

            message("Notification email was Successfully sent to ".trim($_GET['m'])."!", "success");
            redirect('?action=group_request');
            exit();
    }else{
       message("Sorry it seems that something went wrong. Please try again later!","alert");
        redirect('?action=group_request');
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
 $sql = mysqli_query($con, "SELECT * FROM `users`,`group_tbl`, `group_members` WHERE users.userID=group_members.userID AND group_members.group_id=group_tbl.group_id AND group_members.userID!='".$_SESSION['user_id']."' AND group_tbl.guserID='".$_SESSION['user_id']."'") or die(mysqli_error($con));
                                $number=1;
                                while ($row = mysqli_fetch_array($sql)) {
                            ?>
                           <tr>
                            <td><?php echo $number; ?></td>
                               <td><?php echo $row['join_date']; ?></td>
                                  <td><?php echo $row['fname']; ?> &nbsp; <?php echo $row['fname']; ?></td>

                     <td><?php echo $row['email']; ?> </td>
                         <td><?php echo $row['group_name']; ?> </td>

<td>

    <?php

     if($row['guserID']==$_SESSION['user_id']){ 

        if($row['m_status']==1){ ?>
<a href="?action=group_request&dis_id=<?php echo $row['id']; ?>&m=<?php echo $row['email']; ?>&encry=<?php echo md5($row['id']); ?>"><i class="fa fa-thumb-down"></i> Disapprove</a>
      <?php  }else{ ?>
<a href="?action=group_request&app_id=<?php echo $row['id']; ?>&m=<?php echo $row['email']; ?>&encry=<?php echo md5($row['id']); ?>"><i class="fa fa-thumb-up"></i> Approve</a>
     <?php   } 
 } ?>
 <td>
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