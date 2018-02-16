<?php	
	session_start();
	$usermobile = $_SESSION["usermobile"];
 	$pickupLocationApartment = $_POST['pickupLocationApartment'];
	$pickupfloor = $_POST['pickupfloor'];
	$pickuplift = $_POST['pickuplift'];
	$dropLocationApartment = $_POST['dropLocationApartment'];
	$dropfloor = $_POST['dropfloor'];
	$droplift = $_POST['droplift'];	
	$pickupdate = date("Y-m-d", strtotime($_POST['pickupdate']));
	$servername = "localhost";
	$username = "root";
	$password = "root";
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
	}


	$orders = "INSERT INTO pmorders (pmorderdate, pmorderpickuplocation, pmorderpickupfloor, pmorderpickuplift, pmorderdroplocation, pmorderdropfloor, pmorderdroplift, pmuserid, statuslist) VALUES ('$pickupdate', '$pickupLocationApartment', '$pickupfloor', '$pickuplift', '$dropLocationApartment', '$dropfloor', '$droplift', '$userid', 'Booked')";
	$ordersresult = mysqli_query($link, $orders);
	echo json_encode($userid);	
?>