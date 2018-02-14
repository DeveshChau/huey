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
// Create connection
$link = mysqli_connect($servername, $username, $password, $dbname);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$usercreation = "INSERT INTO pmusers (pmusername, pmusermobile, pmuseremail, pmusertimestamp)
 VALUES ('$dusername', '$usermobile', '$useremail', CURRENT_TIMESTAMP)";
if(mysqli_query($link, $usercreation)){
    //echo "Records added successfully.";
    session_start();
 	$_SESSION["usermobile"] = $usermobile;
    echo $usermobile;
} 
/*$useridsearch = "SELECT * from pmusers where pmusermobile = $usermobile";
$useridsearchresult = mysqli_query($link, $useridsearch);

if(mysqli_num_rows($useridsearchresult)!=NULL){

$row = mysqli_fetch_assoc($useridsearchresult);

$userid = $row["user_id"];
echo $userid;
}
//echo $userid;
$pickup = "INSERT INTO address (daddress, dfloor, dlift, dremark, duser_id, dtimestamp)
 VALUES ('$pickupLocationApartment', '$pickupfloor', '$pickuplift', 'Pickup', '$userid', CURRENT_TIMESTAMP)";
$pickupresult = mysqli_query($link, $pickup);

$drop = "INSERT INTO address (daddress, dfloor, dlift, dremark, duser_id, dtimestamp)
 VALUES ('$dropLocationApartment', '$dropfloor', '$droplift', 'Drop', '$userid', CURRENT_TIMESTAMP)";
$dropresult = mysqli_query($link, $drop);*/

/*$pickupid = "SELECT * from address where (duser_id = $userid AND dremark = 'Pickup')";
$pickupidresult = mysqli_query($link, $pickupid);

if(mysqli_num_rows($pickupidresult)!=NULL){

$row = mysqli_fetch_assoc($pickupidresult);

$addresspickupid = $row["address_id"];
}
//echo $addresspickupid;


$dropid = "SELECT * from address where (duser_id = $userid AND dremark = 'Drop')";
$dropidresult = mysqli_query($link, $dropid);

if(mysqli_num_rows($dropidresult)!=NULL){

$row2 = mysqli_fetch_assoc($dropidresult);

$addressdropid = $row2["address_id"];
}
echo $addressdropid;*/

/*$orders = "INSERT INTO pmorders (pmorderdate, pmorderpickuplocation, pmorderpickupfloor, pmorderpickuplift, pmorderdroplocation, pmorderdropfloor, pmorderdroplift, pmuserid) VALUES ('$pickupdate', '$pickupLocationApartment', '$pickupfloor', '$pickuplift', '$dropLocationApartment', '$dropfloor', '$droplift', '$userid')";
	$ordersresult = mysqli_query($link, $orders);
echo $userid;*/
?>