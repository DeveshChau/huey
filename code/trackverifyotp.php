<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pm_huey";

$link = mysqli_connect($servername, $username, $password, $dbname);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$usermobile = $_POST['usermobile'];
$mobile = $_POST['mobile'];
$otp = $_POST['otp'];
$response1 = "success";

/*$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://control.msg91.com/api/verifyRequestOTP.php?authkey=197006ATdvNQWOL5a79d7ea&mobile=".$mobile."&otp=".$otp,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => "",
CURLOPT_SSL_VERIFYHOST => 0,
CURLOPT_SSL_VERIFYPEER => 0,
CURLOPT_HTTPHEADER => array(
"content-type: application/x-www-form-urlencoded"
),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


if ($err) {
	echo json_encode("cURL Error #:" . $err);
} 

else {
	$response1 = json_decode($response);

  	$response1 = $response1->{'type'};
  
  	if ($response1 == 'success') {
		$_SESSION["sessionvariable"] = "set";
		$_SESSION["usermobile"] = $usermobile;
		echo json_encode($usermobile);
	}
	else{*/
		$_SESSION["sessionvariable"] = "set";
		$_SESSION["usermobile"] = $usermobile;
  		echo json_encode($response1);
	/*}*/
/*}*/
?>