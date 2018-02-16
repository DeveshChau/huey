<?php
	$usermobile = $_POST['usermobile'];
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
	$useridsearch = "SELECT * from pmusers where pmusermobile = '$usermobile'";
	$useridsearchresult = mysqli_query($link, $useridsearch);
	
	if(mysqli_num_rows($useridsearchresult)!=NULL){
		$row = mysqli_fetch_assoc($useridsearchresult);
		$userid = $row["pmuserid"];		
		$_SESSION["usermobile"] = $usermobile;
		echo json_encode($usermobile);
	}
?>
