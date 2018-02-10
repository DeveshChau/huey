<?php
session_start();
unset($_SESSION["usermobile"]);
session_destroy();
header("Location:index.php");
?>