<?php
session_start();
if(isset($_SESSION['sessionvariable'])){
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pm_huey";

$link = mysqli_connect($servername, $username, $password, $dbname);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$dusername = mysqli_real_escape_string($link,$_POST['username']);
$useremail = mysqli_real_escape_string($link,$_POST['useremail']);

$usermobile = $_SESSION["usermobile"];
$useridsearch = "SELECT * from pmusers where pmusermobile = '$usermobile'";
$useridsearchresult = mysqli_query($link, $useridsearch);

if(mysqli_num_rows($useridsearchresult)==NULL){
  	
  	$usercreation = "INSERT INTO pmusers (pmusername, pmusermobile, pmuseremail, pmusertimestamp)
 	VALUES ('$dusername', '$usermobile', '$useremail', CURRENT_TIMESTAMP)";
	mysqli_query($link, $usercreation);
	echo json_encode($usermobile);
}
}else {
	header('location: index.php');
}