<?php
session_start();
unset($_SESSION["usermobile"]);
unset($_SESSION["sessionvariable"]);
session_destroy();
header("Location:index.php");
?>