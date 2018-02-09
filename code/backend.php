<?php
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect:' . mysqli_error($conn));
   }
   
   echo 'Connected successfully<br>';

   if (!empty($_POST)) {
   	$date = $_POST['date'];
   	$pickupaddress = $_POST['pickupaddress'];
   	$pickupfloor = $_POST['pickupfloor'];
   	$pickuplift = $_POST['pickuplift'];
   	$dropaddress = $_POST['dropaddress'];
   	$dropfloor = $_POST['dropfloor'];
   	$droplift = $_POST['droplift'];
   	$username = $_POST['username'];
   	$email = $_POST['email'];
   	$mobile = $_POST['mobile'];

    $checkbox = $_POST['movable'];
    $chk = "";
    foreach($checkbox as $chk1) {
      $chk.=$chk1.",";
    } 
  

   	echo $date;
   	echo '<br>';
   	echo $pickupaddress;
   	echo '<br>';
   	echo $pickupfloor;
   	echo '<br>';
   	echo $pickuplift;
   	echo '<br>';   	
   	echo $dropaddress;
   	echo '<br>';
   	echo $dropfloor;
   	echo '<br>';
   	echo $droplift;
   	echo '<br>';
   	echo $username;
   	echo '<br>';
   	echo $email;
   	echo '<br>';
   	echo $mobile;
   	echo '<br>';

	$sql = "INSERT INTO pm_test (pmdate, pmaddress, pickupfloor, dropfloor,
          pickuplift, droplift, dropaddress)
          VALUES ('$date', '$pickupaddress', '$pickupfloor', '$dropfloor', '$pickuplift', 
          '$droplift', '$dropaddress')";

	$sql2 = "INSERT INTO pm_user (username,email,mobile) VALUES ('$username','$email','$mobile')";

  $sql3 = "SELECT TOP 1 id FROM pm_user ORDER BY ID DESC";

	mysqli_select_db($conn, 'pm_test');
  $retval = mysqli_query($conn, $sql);
  $retval2 = mysqli_query($conn, $sql2);
  $retval3 = mysqli_query($conn, $sql3);
    /*if(! $retval ) {
                 die('Could not get data: ' . mysqli_error($conn));
              }   
   }*/
?>

<form action="index.php" method="post">
	<label>date</label>
	<input name="date" type="date"><br>
	<label>pick up address</label>
	<input type="text" name="pickupaddress" id="auto-complete"><br>
	<label>pick up floor</label>
	<select name="pickupfloor">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
	</select><br>
	<label>pickup lift</label>
	<select name="pickuplift">
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select><br>
	<label>drop address</label>
	<input type="text" name="dropaddress" id="auto-complete1"><br>
	<label>drop floor</label>
	<select name="dropfloor">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
	</select><br>
	<label>drop lift</label>
	<select name="droplift">
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select><br>
	<label>username</label>
	<input type="text" name="username"><br>
	<label>email</label>
	<input type="text" name="email"><br>
	<label>mobile</label>
	<input type="text" name="mobile"><br>
  <input type="checkbox" name="movable[]" value="chair">chair <br>
  <input type="checkbox" name="movable[]" value="table">table <br>
  <input type="checkbox" name="movable[]" value="cupboard">cupboard <br>
	<input type="submit" name="submit">
</form>

<script type="text/javascript">
      function activatePlacesSearch(){
        var input = document.getElementById('auto-complete');
        var autoComplete = new google.maps.places.Autocomplete(input);
        var input = document.getElementById('auto-complete1');
        var autoComplete = new google.maps.places.Autocomplete(input);
      }
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZTJTA-s7jJHmEL0I720ztSf9vNFZj42U&libraries=places&callback=activatePlacesSearch"></script>