<?php
$usermobile = $_POST['usermobile'];
$mobile = $_POST['mobile'];
$otp = $_POST['otp'];
session_start();
 $_SESSION["usermobile"] = $usermobile;
echo $usermobile;
?>