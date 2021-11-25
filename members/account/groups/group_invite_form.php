<?php require_once('../../../config/config.php'); 
// defoult variables
$max_members=250;
$ini_amount=0;
$daily_amount=0;
$weekly_amount=0;
$monthly_amount=0;
$annual_amount=0;

if(isset($_POST['rowid'])){
        $group_id=trim($_POST['rowid']);
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


// lets add the form
?>
<form method="POST" action="?action=group">
  <div class="form-group">
   <label for="text">Member email:</label>
    <input type="email" class="form-control" name="email" placeholder=" Member Email" required="">
                        </div>
                    <input type="hidden" name="reference" value="<?php echo $row['reference']; ?>">
 

                          <div class="form-group">
                    <button class="btn bg-primary" type="submit" name="invitebtn">
                       Send Links
                    </button>
                </div>
</form>

<?php
 }else{
    // not iiset row id
       echo  '<div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5> Invalid parameter, Please try again later! </div>';
              exit();
}
// lets add the form
?>