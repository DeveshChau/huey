<?php
$usermobile = $_POST['usermobile'];
$mobile = $_POST['mobile'];
$otp = $_POST['otp'];
$dusername = $_POST['username'];
$useremail = $_POST['useremail'];
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

$link = mysqli_connect($servername, $username, $password, $dbname);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
session_start();

$useridsearch = "SELECT * from pmusers where pmusermobile = '$usermobile'";
$useridsearchresult = mysqli_query($link, $useridsearch);

if(mysqli_num_rows($useridsearchresult)==NULL){
	$usercreation = "INSERT INTO pmusers (pmusername, pmusermobile, pmuseremail, pmusertimestamp)
	 VALUES ('$dusername', '$usermobile', '$useremail', CURRENT_TIMESTAMP)";
	if(mysqli_query($link, $usercreation)){    
	    
	 	$_SESSION["usermobile"] = $usermobile;    
	}
	$useridsearchresult = mysqli_query($link, $useridsearch);
	if(mysqli_num_rows($useridsearchresult)!=NULL){

	$row = mysqli_fetch_assoc($useridsearchresult);

	$userid = $row["pmuserid"];

	$orders = "INSERT INTO pmorders (pmorderdate, pmorderpickuplocation, pmorderpickupfloor, pmorderpickuplift, pmorderdroplocation, pmorderdropfloor, pmorderdroplift, pmuserid, statuslist) VALUES ('$pickupdate', '$pickupLocationApartment', '$pickupfloor', '$pickuplift', '$dropLocationApartment', '$dropfloor', '$droplift', '$userid', 'Booked')";
	$ordersresult = mysqli_query($link, $orders);
	}
}else{
	$useridsearchresult = mysqli_query($link, $useridsearch);

	if(mysqli_num_rows($useridsearchresult)!=NULL){

	$row = mysqli_fetch_assoc($useridsearchresult);

	$userid = $row["pmuserid"];
	$_SESSION["usermobile"] = $usermobile;
	}


$orders = "INSERT INTO pmorders (pmorderdate, pmorderpickuplocation, pmorderpickupfloor, pmorderpickuplift, pmorderdroplocation, pmorderdropfloor, pmorderdroplift, pmuserid, statuslist) VALUES ('$pickupdate', '$pickupLocationApartment', '$pickupfloor', '$pickuplift', '$dropLocationApartment', '$dropfloor', '$droplift', '$userid', 'Booked')";
	$ordersresult = mysqli_query($link, $orders);

}
/*
if(isset($username)){
	$usercreation = "INSERT INTO pmusers (pmusername, pmusermobile, pmuseremail, pmusertimestamp)
	 VALUES ('$dusername', '$usermobile', '$useremail', CURRENT_TIMESTAMP)";
	if(mysqli_query($link, $usercreation)){    
	    
	 	$_SESSION["usermobile"] = $usermobile;    
	}
}*/
/*
$useridsearch = "SELECT * from pmusers where pmusermobile = '$usermobile'";
$useridsearchresult = mysqli_query($link, $useridsearch);

if(mysqli_num_rows($useridsearchresult)!=NULL){

$row = mysqli_fetch_assoc($useridsearchresult);

$userid = $row["pmuserid"];
}


$orders = "INSERT INTO pmorders (pmorderdate, pmorderpickuplocation, pmorderpickupfloor, pmorderpickuplift, pmorderdroplocation, pmorderdropfloor, pmorderdroplift, pmuserid) VALUES ('$pickupdate', '$pickupLocationApartment', '$pickupfloor', '$pickuplift', '$dropLocationApartment', '$dropfloor', '$droplift', '$userid')";
$ordersresult = mysqli_query($link, $orders);*/
echo json_encode($servername);
?>