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

$usermobile = mysqli_real_escape_string($link,$_POST['usermobile']);
$mobile = mysqli_real_escape_string($link,$_POST['mobile']);
$otp = mysqli_real_escape_string($link,$_POST['otp']);
$dusername = mysqli_real_escape_string($link,$_POST['username']);
$useremail = mysqli_real_escape_string($link,$_POST['useremail']);
$pickupLocationApartment = mysqli_real_escape_string($link,$_POST['pickupLocationApartment']);
$pickupfloor = mysqli_real_escape_string($link,$_POST['pickupfloor']);
$pickuplift = mysqli_real_escape_string($link,$_POST['pickuplift']);
$dropLocationApartment = mysqli_real_escape_string($link,$_POST['dropLocationApartment']);
$dropfloor = mysqli_real_escape_string($link,$_POST['dropfloor']);
$droplift = mysqli_real_escape_string($link,$_POST['droplift']);
$pickupdate = date("Y-m-d", strtotime(mysqli_real_escape_string($link,$_POST['pickupdate'])));


/*
$curl = curl_init();

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
*/

	$useridsearch = "SELECT * from pmusers where pmusermobile = '$usermobile'";
	$useridsearchresult = mysqli_query($link, $useridsearch);

	if(mysqli_num_rows($useridsearchresult)==NULL){
	  	
	  	$usercreation = "INSERT INTO pmusers (pmusername, pmusermobile, pmuseremail, pmusertimestamp)
	 	VALUES ('$dusername', '$usermobile', '$useremail', CURRENT_TIMESTAMP)";
		if(mysqli_query($link, $usercreation)){    
	    	$_SESSION["sessionvariable"] = "set";
	 		$_SESSION["usermobile"] = $usermobile;    
		}
		$useridsearchresult = mysqli_query($link, $useridsearch);
		if(mysqli_num_rows($useridsearchresult)!=NULL){

		$row = mysqli_fetch_assoc($useridsearchresult);

		$userid = $row["pmuserid"];

		$orders = "INSERT INTO pmorders (pmorderdate, pmorderpickuplocation, pmorderpickupfloor, pmorderpickuplift, pmorderdroplocation, pmorderdropfloor, pmorderdroplift, pmuserid, statuslist) VALUES ('$pickupdate', '$pickupLocationApartment', '$pickupfloor', '$pickuplift', '$dropLocationApartment', '$dropfloor', '$droplift', '$userid', 'Move Booked')";
		$ordersresult = mysqli_query($link, $orders);
		/*$curl = curl_init();

		curl_setopt_array($curl, array(

		  CURLOPT_URL => ""	

		  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=PCMOVE&route=4&mobiles=".$mobile."&authkey=197006ATdvNQWOL5a79d7ea&message=Dear%20".$dusername.",%0AYour%20Move%20has%20been%20Booked%20with%20reference%20number%20-".$orderid.".%0A We%20 will%20 contact%20 you%20 at%20 the%20 earliest%20.%0A #HappyMoving.%0A PaceMove.",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_SSL_VERIFYHOST => 0,
		  CURLOPT_SSL_VERIFYPEER => 0,
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}*/
		}
	}

	else {
	/*$useridsearchresult = mysqli_query($link, $useridsearch);*/

		if(mysqli_num_rows($useridsearchresult)!=NULL){

		$row = mysqli_fetch_assoc($useridsearchresult);

		$userid = $row["pmuserid"];
		$_SESSION["sessionvariable"] = "set";
		$_SESSION["usermobile"] = $usermobile;
		}


		$orders = "INSERT INTO pmorders (pmorderdate, pmorderpickuplocation, pmorderpickupfloor, pmorderpickuplift, pmorderdroplocation, pmorderdropfloor, pmorderdroplift, pmuserid, statuslist) VALUES ('$pickupdate', '$pickupLocationApartment', '$pickupfloor', '$pickuplift', '$dropLocationApartment', '$dropfloor', '$droplift', '$userid', 'Move Booked')";
		$ordersresult = mysqli_query($link, $orders);

	/*	$curl = curl_init();

		curl_setopt_array($curl, array(

		  CURLOPT_URL => ""	

		  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=PCMOVE&route=4&mobiles=".$mobile."&authkey=197006ATdvNQWOL5a79d7ea&message=Dear%20".$dusername.",%0AYour%20Move%20has%20been%20Booked%20with%20reference%20number%20-".$orderid.".%0A We%20 will%20 contact%20 you%20 at%20 the%20 earliest%20.%0A #HappyMoving.%0A PaceMove.",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_SSL_VERIFYHOST => 0,
		  CURLOPT_SSL_VERIFYPEER => 0,
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}*/

	}

	  echo json_encode($usermobile);
/*}*/

?>