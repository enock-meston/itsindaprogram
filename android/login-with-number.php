<?php
include('includes/config.php');
$phone=$_POST['phonenumber'];
// $phone="0783982872";

if ($con) {
		
		$status=2;
		$sqlCheckPhoneNumber=mysqli_query($con,"SELECT * FROM `tblcitizen` 
			WHERE `phoneNumber` LIKE '$phone' AND ActiveStatus='$status'");
		$response = array();
		if (mysqli_num_rows($sqlCheckPhoneNumber)>0) {
		  	$status=2; // approved client
		  	$sql_check= mysqli_query($con,"SELECT phoneNumber FROM `tblcitizen` WHERE phoneNumber='$phone' AND ActiveStatus='$status'");
		  	while($row = mysqli_fetch_array($sql_check)){
		  		$response[] = $row;
		  	}
		  } 

		  header('Content-Type: application/json');
    echo json_encode(array("phoneNumber"=>$response));

}else{
		echo "Connetion Error";
	}
?>