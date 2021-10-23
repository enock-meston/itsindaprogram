<?php
include('includes/config.php');
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$phone=$_POST['phonenumber'];
$UPI=$_POST['UPI'];
$EUCL_Branch=$_POST['EUCL_Branch'];
$cell=$_POST['cell'];
$Sector=$_POST['Sector'];

// $fname="enock";
// $lname="enock1";
// $phone="0783982872";
// $UPI="124112";
// $EUCL_Branch="kabuga";
// $cell="kabutare";
// $Sector="rusororo";


if ($con) {

		$sqlCheckPhoneNumber=mysqli_query($con,"SELECT * FROM `tblcitizen` 
			WHERE `phoneNumber` LIKE '$phone'");
		if (mysqli_num_rows($sqlCheckPhoneNumber)>0) {
		  	// code...
		  	echo "Phone Number is Allready used!";
		  }else{
		  	// inserting new user query
		  	$status=1;
		  	$sql_register= mysqli_query($con,"INSERT INTO `tblcitizen`(`Firstname`, `Lastname`, `phoneNumber`, `UPI`, `EUCL_Branch`, `cell`, `Sector`, `ActiveStatus`) VALUES ('$fname','$lname','$phone','$UPI','$EUCL_Branch','$cell','$Sector','$status')");

		  	if ($sql_register) {
		  		echo "Successfully_Registered";
		  	}else{
		  		echo "Failed to register";
		  	}
		  }  
	}
else{
		echo "Connetion Error";
	}
?>