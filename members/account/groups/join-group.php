
 <?php if(isset($_POST['joinbtn'])){

 $checkquery = mysqli_query($con,"SELECT * FROM `group_members` WHERE userID='".trim($_SESSION['user_id'])."' AND group_id='".trim($_POST['group_id'])."' ") or die(mysqli_error($con));
 if (mysqli_num_rows($checkquery) == 0) {


   $join=mysqli_query($con," INSERT INTO `group_members`(`userID`, `group_id`, `join_date`, `membership`, `m_status`) VALUES('".$_SESSION['user_id']."', '".trim($_POST['group_id'])."', '".date('Y-m-d')."', 'Standard', '1')") or die(mysqli_error($con));
    if($join){
        message("Joining group was done successfully!", "success");
            redirect($_SERVER['REQUEST_URI']);
            exit();
        }else {
        // insertion Error
            message("error occured while joining this group. Please try again later!","error");
            redirect($_SERVER['REQUEST_URI']);
            exit();
        }


}else{
        message("You have already joined this group. Please try again later!","info");
        redirect($_SERVER['REQUEST_URI']);
        exit();
}




 }
 ?>
               
                
         
 
<!-- Group table -->
    <div class="row">
             <div class="col-12">
        <h4>Join groups</h4>
     <div class="row">
                            <?php
                                $sql = mysqli_query($con, "SELECT * FROM `group_tbl` WHERE  group_type='Public' AND status='1'") or die(mysqli_error($con));
                                $number=1;
                                while ($row = mysqli_fetch_array($sql)) {
                            ?>
                            <div class="col-4">
 <div class="card">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['group_name']; ?> - <?php echo $row['reference']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['group_type']; ?> </h6>
    <p class="card-text"><?php echo $row['group_details']; ?></p>
    <br>
    <h6 class="card-subtitle mb-2 text-muted"><i class="fa fa-users"></i> <?php echo $row['membership']; ?></h6>
<a href="#" title="Click here to join group" data-toggle="modal" data-target="#JoinModal" data-id="<?php echo $row['group_id']; ?>">

    <i class="fa fa-plus" aria-hidden="true"></i> Join group</a> 

  </div>
</div>
</div>


                           <?php
                           $number+=1;
                                }
                               ?>
                   </div>
                            
                   
    </div>
</div>
 <div class="modal fade" id="JoinModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Join group</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>          
            <div class="modal-body">

      <div class="fetched-data-join"></div> 
            </div>
          </div>
          </div>
        </div> 


           <script>

 
   $(document).ready(function(){
        $('#JoinModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
             
            $.ajax({
                type : 'post',
                url : 'groups/join_group_form.php', //Here you will fetch records 
                data :  'rowid='+ rowid, //Pass $id
                success : function(data){
                $('.fetched-data-join').html(data);//Show fetched data from database
                }
            });
         });
    });
 // all
</script>