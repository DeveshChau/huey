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

	$updatestatus = $_POST['statuslist'];
	$pmorderid = $_POST['pmorderid'];

	$updatequery = "UPDATE pmorders SET statuslist='$updatestatus' WHERE pmorderid = '$pmorderid'";
	$updatequeryresult = mysqli_query($link, $updatequery);
	if($updatequeryresult){
		echo json_encode("$updatestatus");
	}else{
		echo json_encode("$pmorderid");
	}
?>