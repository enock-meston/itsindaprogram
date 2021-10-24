<?php  session_start();
/*  Just settings and db import and global variables..
*/
require_once(__DIR__."/db_config.php"); // this file will conatin all those configurations for the database
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
