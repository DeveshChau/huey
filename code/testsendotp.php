<?php	
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "pm_huey";
	// Create connection
	$link = mysqli_connect($servername, $username, $password, $dbname);

	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	

	/*$otp = rand(1000,9999);
	$mobile = $_POST['mobile'];

	$curl = curl_init();

	curl_setopt_array($curl, array(

	    CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?authkey=197006ATdvNQWOL5a79d7ea&mobile=".$mobile."&message=Your%20OTP%20is%20".$otp."&sender=PACEMOVE&otp=".$otp,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_MAXREDIRS => 10,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => "POST",
	    CURLOPT_POSTFIELDS => "",
	    CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_SSL_VERIFYPEER => 0,
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo json_encode("cURL Error #:" . $err);

	} else {  */
	  echo json_encode($servername);
	/*}*/

?>
