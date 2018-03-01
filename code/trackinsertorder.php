<?php	
	session_start();
	if(isset($_SESSION['sessionvariable'])){	
	$usermobile = $_SESSION["usermobile"];
 	$pickupLocationApartment = $_POST['pickupLocationApartment'];
	$pickupfloor = $_POST['pickupfloor'];
	$pickuplift = $_POST['pickuplift'];
	$dropLocationApartment = $_POST['dropLocationApartment'];
	$dropfloor = $_POST['dropfloor'];
	$droplift = $_POST['droplift'];	
	$pickupdate = date("Y-m-d", strtotime($_POST['pickupdate']));
	$servername = "localhost";
	$username = "huey_pacemove";
	$password = "huey_PM@1";
	$dbname = "pm_huey";
	// Create connection
	$link = mysqli_connect($servername, $username, $password, $dbname);

	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$useridsearch = "SELECT * from pmusers where pmusermobile = '$usermobile'";
	$useridsearchresult = mysqli_query($link, $useridsearch);

	if(mysqli_num_rows($useridsearchresult)!=NULL){

	$row = mysqli_fetch_assoc($useridsearchresult);

	$userid = $row["pmuserid"];
	$dusername = $row["pmusername"];
	}


	$orders = "INSERT INTO pmorders (pmorderdate, pmorderpickuplocation, pmorderpickupfloor, pmorderpickuplift, pmorderdroplocation, pmorderdropfloor, pmorderdroplift, pmuserid, statuslist) VALUES ('$pickupdate', '$pickupLocationApartment', '$pickupfloor', '$pickuplift', '$dropLocationApartment', '$dropfloor', '$droplift', '$userid', 'Move Booked')";
	$ordersresult = mysqli_query($link, $orders);
	
	$curl = curl_init();

	curl_setopt_array($curl, array(


	  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=PCMOVE&route=4&mobiles=".$usermobile."&authkey=197006ATdvNQWOL5a79d7ea&country=91&message=Dear%20".$dusername."%0AYour%20Move%20has%20been%20Booked.%0A We%20 will%20 contact%20 you%20 at%20 the%20 earliest%20.%0A #HappyMoving.%0A PaceMove.",
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
	  echo json_encode("cURL Error #:" . $err);
	} else {
	  echo json_encode($userid);
	}	
}
?>