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
	$dusername = $_POST['username'];
	$curl = curl_init();

	curl_setopt_array($curl, array(

	    CURLOPT_URL => "https://control.msg91.com/api/sendotp.php?authkey=197006ATdvNQWOL5a79d7ea&mobile=".$mobile."&message=Dear%20".$dusername."%2C%0AYour%20PaceMove%20verification%20code%20is%20".$otp."%0AWe%20are%20excited%20to%20move%20you.%0AHave%20a%20nice%20day%21%0A%23HappyMoving.%0A%20PaceMove.&sender=PCMOVE&otp=".$otp,
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

	} else {  
	  echo json_encode($servername);
	}*/

	echo json_encode("localhost");

?>
