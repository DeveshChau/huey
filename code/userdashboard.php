<?php
	session_start();
	$usermobile = $_SESSION["usermobile"];
	if(isset($_SESSION['usermobile'])){	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "pm_huey";
	
	$link = mysqli_connect($servername, $username, $password, $dbname);

	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$useridsearch = "SELECT * from pmusers where pmusermobile = '$usermobile'";
	$useridsearchresult = mysqli_query($link, $useridsearch);

	if(mysqli_num_rows($useridsearchresult)!=NULL){

	$row = mysqli_fetch_assoc($useridsearchresult);

	$userid = $row["pmuserid"];	
	}
	
	$order = "SELECT * FROM pmorders WHERE pmuserid = '$userid' ORDER BY pmorderdate desc";
	$orderresult = mysqli_query($link, $order);
	$row = mysqli_fetch_all($orderresult,MYSQLI_ASSOC);		
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
		<style type="text/css">
			hr {
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, 0.1);
}
		</style>
		
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
					  					<br>
										<div class="col-md-2">
							 			<h5>Number</h5>
							 			</div>
							 			<div class="col-md-2">
							 			<h5>Date</h5>
							 			</div>
							 			<div class="col-md-4">
							 			<h5>Pick Up address</h5>
							 			</div>
								 		<div class="col-md-4">
										<h5>Drop Location</h5>
							 			</div>
							 			<br>
								 	</div>
					  				<?php foreach ($row as $key => $value) {?>
									<div class="row">
										<div class="col-md-2">
							 			<?php echo  $key;?>
							 			</div>
							 			<div class="col-md-2">
							 			<?php echo  $value['pmorderdate'];?>
							 			</div>
							 			<div class="col-md-4">
							 			<?php echo  $value['pmorderpickuplocation'];?>
							 			</div>
							 			<div class="col-md-4">
							 			<?php echo  $value['pmorderdroplocation'];?>
							 			<?php echo $value['pmuserid'];?>
							 			</div>
							 			<br>
								 	</div>		
								 	<br>					 			
									<div class="row">
								 		<div class="col-md-6">
								 			<?php 
								 			$user = $value['pmuserid'];
								 			$order = $value['pmorderid'];											
											$movable = "SELECT * FROM pmmovables WHERE pmuserid ='$user' 
											AND pmorderid = '$order'";
											$movableresult = mysqli_query($link, $movable);
								 			if(mysqli_num_rows($movableresult)!=NULL){

												$row = mysqli_fetch_assoc($movableresult);
												$itemother = $row["pmothermovables"];	
												$item = $row["pmitems"];

											}
											echo "<h5>Movables :</h5>";
											echo $item;
											?>
										</div>
										<div class="col-md-6">
											<?php
											echo "<h5> Your Special Mention : </h5> ";
											echo $itemother;
								 			?>
								 		</div>
								 		<hr>
								 	</div>
								 	
								 	<?php }?>									 
									
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
				</div><!-- card -->
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
</html>
<?php
	}
	else{
		header('location: index.php');
	}
?>