<?php require_once('../../../config/config.php'); 
// defoult variables
$groupname='';
$groupdetails='';
$grouptype=0;


if(isset($_POST['rowid'])){

$record=explode(',', $_POST['rowid']);
$action=$record[0];
if($action=='update'){
$group_id=$record[1];
        $sql = mysqli_query($con, "SELECT * FROM `group_tbl` WHERE group_id='$group_id'") or die(mysqli_error($con));
        if(mysqli_num_rows($sql) ==1){
            $row = mysqli_fetch_array($sql);

       $groupname=$row['group_name'];
$groupdetails=$row['group_details'];
$grouptype=$row['group_type'];


}else{
  echo  '<div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-exclamation-triangle"></i> Invalid request!</h5> IRequested resource could not be found, Please try again later! </div>';
              exit();

}
}

 }else{
    // not iiset row id
       echo  '<div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5> Invalid parameter, Please try again later! </div>';
              exit();
}
// lets add the form
?>
   <form class="form-horizontal"  method="POST">
                
                        <div class="form-group">
                                    <label for="text">Group Name:</label>
                                    <input type="text" class="form-control" id="email" 
                                    placeholder="Enter Group Name" value="<?php echo $groupname; ?>" name="groupName">
                        </div>
                    
                        <div class="form-group">
                                    <label for="exampleTextarea1">Group Details</label>
                                    <textarea class="form-control" id="exampleTextarea1" 
                                    rows="4" name="groupDetails"><?php echo $groupdetails; ?></textarea>
                                </div>

                                    <div class="form-group">
                                    <label for="exampleTextarea1">Group Type</label>
                                    <select required="" name="group_type" class="form-control" >
                                        <option value="">--PLease select---</option>
                                        <option value="Public" <?php if($grouptype=='Public'){ echo "selected";} ?>>Public</option>
                                        <option value="Private"  <?php if($grouptype=='Private'){ echo "selected";} ?>>Private</option>
                                    </select>
                                </div>
                 <?php if($action=='update'){?>
                    <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
                    <div class="form-group">
                    <button class="btn bg-primary" type="submit" name="groupupdatebtn">
                       Update
                    </button>
                </div>
               <?php  } else{ ?>
                <div class="form-group">
                    <button class="btn bg-primary" type="submit" name="groupsavebtn">
                        Save
                    </button>
                </div>
<?php } ?>
            </form>
