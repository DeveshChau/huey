<?php
	session_start();
	$usermobile = $_SESSION["usermobile"];
	if(isset($_SESSION['usermobile'])) {	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "test_db";
	
	// Create connection
	$link = mysqli_connect($servername, $username, $password, $dbname);

	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$useridsearch = "SELECT user_id from users where dusermobile = $usermobile";
	$useridsearchresult = mysqli_query($link, $useridsearch);

	if(mysqli_num_rows($useridsearchresult)!=NULL){
		$row = mysqli_fetch_assoc($useridsearchresult);
		$userid = $row["user_id"];	
		echo $userid;
	}






/*		
//echo $userid;
		$order = "SELECT * from orders where duser_id = $userid";
		$useridsearchresult = mysqli_query($link, $order);
		$row = mysqli_fetch_all($useridsearchresult,MYSQLI_ASSOC);

		$sql = "SELECT address.daddress from address INNER JOIN orders on (orders.dpickup_id = address.address_id or orders.ddrop_id = address.address_id)"; 
		$addresssearch = mysqli_query($link, $sql);
		$row = mysqli_fetch_all($addresssearch,MYSQLI_ASSOC);*/

		//echo sizeof($row);
		/*foreach ($row as $key => $value) {
 			echo $value['dpickup_date']; echo "<br>";
 			echo  $value['dpickup_id'];echo "<br>";
 			
 			$test = $value['dpickup_id'];
 			
 			
			$addresssearch = "SELECT * from address where address_id = $test";
			echo $addresssearch;echo "<br>";
			$addresssearchresult = mysqli_query($link, $addresssearch);

			if(mysqli_num_rows($useridsearchresult)!=NULL){
				$row = mysqli_fetch_assoc($useridsearchresult);
				echo $row["daddress"];					
			}
		}*/
		
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8">
		<title>PaceMove</title>
		<meta name="description" content="Packers and Movers">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="./css/style.css">
	</head>
	<body class="child-page"> 

	<?php
		include 'header.php';
	?>

	<main role="main" >
		<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
				  	<div class="card-header" >
						<ul class="nav nav-pills" role="tablist" id="details-tab">
					  		<li class="nav-item active">
				    			<a class="nav-link active" href="#current-order" data-toggle="tab" id="currentorder">Current Order</a>
					  		</li>
					  		<li class="nav-item">
					    		<a class="nav-link" href="#previous-order" data-toggle="tab">Previous Order</a>
					  		</li>				  
						</ul>
						<a class="float-right" href="trackdetails.php" id="new_order">New Order</a>
			  		</div>

				  	<div class="card-body">
						<div class="tab-content">
					  		<div class="tab-pane fade show active" id="current-order" role="tabpanel" aria-labelledby="pickup-tab">
					  			<div class="container">
									<div class="row">
										<div class="col-md-1">Number</div>
										<div class="col-md-1">Date</div>
										<div class="col-md-4">Pick up address</div>	
										<div class="col-md-4">Drop Address</div>	
										<div class="col-md-2">Add Movalbles</div>
									</div>
									<div class="col-md-12">Movables</div>
								</div>
					  		</div>

					  		<div class="tab-pane fade" id="previous-order" role="tabpanel" aria-labelledby="drop-tab">
								<div class="tab-pane fade show active" id="current-order" role="tabpanel" aria-labelledby="pickup-tab">
					  			<div class="container">
									<div class="row">
										<div class="col-md-1">col-md-1</div>
										<div class="col-md-1">col-md-1</div>
										<div class="col-md-4">col-md-4</div>	
										<div class="col-md-4">col-md-4</div>	
										<div class="col-md-2">col-md-2</div>
									</div>									
								</div>
					  		</div>
					 		</div>					  		
					  	</div>
					</div>
				</div><!-- /.card -->
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
	</main><!-- /.main container -->
	<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="http://ajax.cdnjs.com/ajax/libs/json2/20110223/json2.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="./js/main.js"></script>
  </body>
</body>
<?php
	}
	else{
		header('location: index.php');
	}
?>