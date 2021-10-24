<?php  session_start();
/*  Just settings and db import and global variables..
*/
require_once(__DIR__."/main_config.php"); // this file will conatin all those configurations for the database
require_once SITE_ROOT.'vendor/autoload.php'; // composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function check_message(){
	
    if(isset($_SESSION['message'])){
        if(isset($_SESSION['msgtype'])){
            if ($_SESSION['msgtype']=="info"){
                 echo  '   <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-info"></i> Info!</h5>'. $_SESSION['message'] . '</div>';
                  
            }elseif($_SESSION['msgtype']=="error"){
                echo  ' <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Error!</h5>
' . $_SESSION['message'] . '</div>';
                                
            }elseif($_SESSION['msgtype']=="success"){
                echo  '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i>Success!</h5>' . $_SESSION['message'] . '</div>';
            }
            elseif($_SESSION['msgtype']=="alert"){
                echo  '<div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>' . $_SESSION['message'] . '</div>';
            }	
            unset($_SESSION['message']);
             unset($_SESSION['msgtype']);
           }

    }	

}

function redirect($location=Null){ // just to redirect to specific location
    if($location!=Null){
        echo "<script>
                window.location='{$location}'
            </script>";	
    }else{
        echo 'error location';
    }
     
}

	function send_mail($subject,$content,$to){
		global $con; 
		$countfiles='';
		$date=date("Y-m-d H:i:s");
		$send_status=0;
			// connect db
		
//////////////////////////////////////////////////////// SEND Mail
//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'ssl://smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = trim(NOTIFY_MAIL);                     //SMTP username
    $mail->Password   = NOTIFY_KEY;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom(mysqli_real_escape_string($con, NOTIFY_MAIL));
    $mail->addAddress(mysqli_real_escape_string($con, $to));               //Name is optional
    $mail->addReplyTo('kics@nigoote.com', 'Itsinda program');


    $body = mysqli_real_escape_string($con, $content);
  
    // strip backslashes
    $body = preg_replace('/\\\\/','', $body);
    // mail settings below including these:
    $mail->MsgHTML($body);
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = mysqli_real_escape_string($con, $subject);

  
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
	return $send_status=1;
} catch (Exception $e) {
  return  $send_status=0;
}
	}