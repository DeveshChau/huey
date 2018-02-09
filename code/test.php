<?php
	


  /*$dbhost = 'localhost:3306';
	$dbuser = 'root';
	$dbpass = 'root';
   	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   	if(! $conn ) {
		die('Could not connect:' . mysqli_error($conn));
   	}

   	$username = $_POST['username'];
   	$useremail = $_POST["useremail"];
   	$mobile = $_POST["usermobile"];
   	$sql2 = "INSERT INTO pm_user (username,email,mobile) VALUES ('$username','$useremail','$mobile')";
   	mysqli_select_db($conn, 'pm_test');  	
  	$retval2 = mysqli_query($conn, $sql2);
    if($retval2){
    	echo '{"status":"success"}';
	} else{
    	echo '{"status":"error","message":"error in enquiry data."}';
	}  */    
/*
$mobile = $_POST['mobile'];
$otp = rand(1000,9999);

$data = 'https://control.msg91.com/api/sendotp.php?authkey=197006ATdvNQWOL5a79d7ea&mobile='.$mobile.'&message=Your%20OTP%20is%20'.$otp.'&sender=PACEMOVE&otp='.$otp.'';
	echo json_encode($data);*/
$mobile = 9175;
  echo $mobile;
?>
