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
	$dbname = "test_db";
	// Create connection
	$link = mysqli_connect($servername, $username, $password, $dbname);

	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$addresspickupid = "";
	$userid = "";
	$addressdropid = "";
	//echo $usermobile;
	$useridsearch = "SELECT * from users where dusermobile = $usermobile";
	$useridsearchresult = mysqli_query($link, $useridsearch);

	if(mysqli_num_rows($useridsearchresult)!=NULL){

	$row = mysqli_fetch_assoc($useridsearchresult);

	$userid = $row["user_id"];
	//echo $userid;
	}

	$pickup = "INSERT INTO address (daddress, dfloor, dlift, dremark, duser_id, dtimestamp)
	 VALUES ('$pickupLocationApartment', '$pickupfloor', '$pickuplift', 'Pickup', '$userid', CURRENT_TIMESTAMP)";
	$pickupresult = mysqli_query($link, $pickup);
	//echo $pickupresult;

	$drop = "INSERT INTO address (daddress, dfloor, dlift, dremark, duser_id, dtimestamp)
	 VALUES ('$dropLocationApartment', '$dropfloor', '$droplift', 'Drop', '$userid', CURRENT_TIMESTAMP)";
	$dropresult = mysqli_query($link, $drop);

	//echo $usermobile;
	$pickupid = "SELECT * from address where (duser_id = $userid AND dremark = 'Pickup')
	ORDER BY address_id DESC LIMIT 1";
	$pickupidresult = mysqli_query($link, $pickupid);

	if(mysqli_num_rows($pickupidresult)!=NULL){

	$row = mysqli_fetch_assoc($pickupidresult);
	$addresspickupid = $row["address_id"];
	//echo $addresspickupid;
	}
	


	$dropid = "SELECT * from address where (duser_id = $userid AND dremark = 'Drop')
	ORDER BY address_id DESC LIMIT 1";
	$dropidresult = mysqli_query($link, $dropid);

	if(mysqli_num_rows($dropidresult)!=NULL){

	$row2 = mysqli_fetch_assoc($dropidresult);

	$addressdropid = $row2["address_id"];
	}
	echo $addressdropid;

	$orders = "INSERT INTO orders (dpickup_date, dpickup_id, ddrop_id, duser_id, dstatus, dtimestamp) 
	VALUES ('$pickupdate', '$addresspickupid', '$addressdropid', '$userid', 'picked_up', CURRENT_TIMESTAMP)";

	$ordersresult = mysqli_query($link, $orders);
?>