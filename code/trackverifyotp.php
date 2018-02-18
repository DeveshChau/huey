<?php
session_start();
$usermobile = $_POST['usermobile'];
$mobile = $_POST['mobile'];
$otp = $_POST['otp'];

$_SESSION["sessionvariable"] = "set";
$_SESSION["usermobile"] = $usermobile;
echo json_encode($usermobile);
?>