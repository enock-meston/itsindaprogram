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
		$sql = mysqli_query($con, "SELECT * FROM `group_settings` WHERE group_id='$group_id'") or die(mysqli_error($con));
      	if(mysqli_num_rows($sql) ==1){
     		$row = mysqli_fetch_array($sql);

				$id=$row['sett_id']; 
				$max_members=$row['max_members']; 
				$ini_amount=$row['ini_amount']; 
				$daily_amount=$row['daily_amount']; 
				$weekly_amount=$row['weekly_amount']; 
				$monthly_amount=$row['monthly_amount']; 
				$annual_amount=$row['annual_amount']; 

}
// }else{
// 	 echo  '<div class="alert alert-warning alert-dismissible">
//               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
//               <h5><i class="icon fas fa-exclamation-triangle"></i> Invalid request!</h5> IRequested resource could not be found, Please try again later! </div>';
//               exit();

// }


 }else{
	// not iiset row id
	   echo  '<div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5> Invalid parameter, Please try again later! </div>';
              exit();
}
// lets add the form
?>
<form method="POST" action="?action=group">
	<input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
  <div class="form-group">
   <label for="text">Maximum group members:</label>
    <input type="number" class="form-control" value="<?php echo $max_members; ?>" min="1" placeholder="Maximum group members..." name="maxmembers" required="">
                        </div>
                    
  <div class="form-group">
   <label for="text">Initial payment:</label>
    <input type="number" class="form-control" value="<?php echo $ini_amount; ?>" placeholder="Enter initial payment anount" name="iniamount" required="">
                        </div>


                          <div class="form-group">
   <label for="text">Daily payment:</label>
    <input type="number" class="form-control" value="<?php echo $daily_amount; ?>" placeholder="Enter daily payment anount" name="dayamount" required="">
                        </div>

          <div class="form-group">
   <label for="text">Weekly payment:</label>
    <input type="number" class="form-control" value="<?php echo $weekly_amount; ?>" placeholder="Enter weekly payment anount" name="weekamount" required="">
                        </div>

          <div class="form-group">
   <label for="text">Monthly payment:</label>
    <input type="number" class="form-control" value="<?php echo $monthly_amount; ?>" placeholder="Enter monthly payment anount" name="monthamount" required="">
                        </div>

          <div class="form-group">
   <label for="text">Annualy payment:</label>
    <input type="number" class="form-control" value="<?php echo $annual_amount; ?>" placeholder="Enter Annualy payment anount" name="annualamount" required="">
                        </div>


                          <div class="form-group">
                    <button class="btn bg-primary" type="submit" name="updatebtn">
                        Update
                    </button>
                </div>
</form>