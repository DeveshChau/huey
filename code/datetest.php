<?php


$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect:' . mysqli_error($conn));
   }

   if (!empty($_POST)) {
   	$datee = $_POST['datee'];
   }


	echo $datee;
    //$nice_date = date('Y-m-d', strtotime($datee));	
   
   echo 'Connected successfully<br>';
$sql5  = "INSERT INTO pm_da (pm_date) VALUES ('$datee')";
  
	mysqli_select_db($conn, 'test_db');
  $retval2 = mysqli_query($conn, $sql5);



?>

<form action="datetest.php" method="post">
	<input type="date" id="datee" name="datee">
	<input type="submit" name="submit">

	</form>