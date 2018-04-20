
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

	$usermobile = $_SESSION["usermobile"];
	$useridsearch = "SELECT * from pmusers where pmusermobile = '$usermobile'";
	$useridsearchresult = mysqli_query($link, $useridsearch);

	if(mysqli_num_rows($useridsearchresult)!=NULL){

	$row = mysqli_fetch_assoc($useridsearchresult);

	$userid = $row["pmuserid"];	
	}
	
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
					  				
					  				<?php $order = "SELECT * FROM pmorders LEFT outer join pmusers on pmorders.pmuserid = pmusers.pmuserid WHERE pmorders.pmuserid = '$userid' AND pmorders.statuslist != 'Order Delivered' ORDER BY pmorders.pmorderdate";
	$orderresult = mysqli_query($link, $order);
	while ($row = $orderresult->fetch_assoc()) { ?>
             
      
									<div class="row">
							 			<div class="col-md-3">
							 				<p><b>Date</b></p>
							 			<?php echo  $row['pmorderdate'];?>
							 			</div>
							 			<div class="col-md-5">
							 				<p><b>Pickup Location</b></p>
							 			<?php echo  $row['pmorderpickuplocation'];?>
							 			<div><?php echo "Lift: ". $row['pmorderpickuplift'];?></div>
							 			<div><?php echo "Floor: ". $row['pmorderpickupfloor'];?></div>
							 			</div>
							 			<div class="col-md-4">
							 				<p><b>Drop Location</b></p>
							 			<?php echo  $row['pmorderdroplocation'];?>
							 			<div><?php echo "Lift: ". $row['pmorderpickuplift'];?></div>
							 			<div><?php echo "Floor: ". $row['pmorderpickupfloor'];?></div>
							 			</div>
							 		</div>
							 		<hr>
							 		<div class="row">
							 			<div class="col-md-3">
							 				<P><b>Refference Number</b></P>
							 			<?php echo  $row['pmrefference'];?>
							 			</div>
							 			<div class="col-md-5">
							 				<p><b>Movable Item List</b></p>
								 			<?php 
								 			$user = $row['pmuserid'];
								 			$order = $row['pmorderid'];											
											$movable = "SELECT * FROM pmmovables WHERE pmuserid ='$user' 
											AND pmorderid = '$order'";
											$movableresult = mysqli_query($link, $movable);
								 			if(mysqli_num_rows($movableresult)!=NULL){

												$row1 = mysqli_fetch_assoc($movableresult);
												$itemother = $row1["pmothermovables"];	
												$item = $row1["pmitems"];
												$qauntity = $row1["pmquantity"];
											}

											$mov = explode(",",$item);
											$movqty = explode(",",$qauntity);
											
											$n = sizeof($mov);
											for($i=0 ;$i<($n-1);$i++){
											    echo $mov[$i] ."-". $movqty[$i].", ";
											}
											echo $itemother;
											/*echo $item;
											echo $itemother;*/
											?>
										</div>
										<div class="col-md-4">
											<p><b>Order Status</b></p>
											<div><?php echo $row['statuslist'];?></div>
										</div>
								 	</div>	
								 	<hr style=" border-width: 2px; border-color: red;">							 	
								 	<?php  } ?>
					  			</div>
							</div>
					  		<div class="tab-pane fade show" id="previous-order" role="tabpanel" aria-labelledby="previous-order">
					  			<div class="container">
					  				
					  				<?php $previousorder = "SELECT * FROM pmorders WHERE pmuserid = '$userid' AND statuslist = 'Order Delivered' ORDER BY pmorderdate desc";
	$previousorderresult = mysqli_query($link, $previousorder);
	while ($row2 = $previousorderresult->fetch_assoc()) {?>
									<div class="row">
							 			<div class="col-md-3">
							 				<p><b>Date</b></p>
							 			<?php echo  $row2['pmorderdate'];?>
							 			</div>
							 			<div class="col-md-5">
							 				<p><b>Pickup Location</b></p>
							 			<?php echo  $row2['pmorderpickuplocation'];?>
							 			<div><?php echo "Lift: ". $row2['pmorderpickuplift'];?></div>
							 			<div><?php echo "Floor: ". $row2['pmorderpickupfloor'];?></div>
							 			</div>
							 			<div class="col-md-4">
							 				<p><b>Drop Location</b></p>
							 			<?php echo  $row2['pmorderdroplocation'];?>
							 			<div><?php echo "Lift: ". $row2['pmorderpickuplift'];?></div>
							 			<div><?php echo "Floor: ". $row2['pmorderpickupfloor'];?></div>
							 			</div>
							 			</div>
							 		<hr>
							 		<div class="row">
							 			<div class="col-md-3">
							 				<P><b>Refference Number</b></P>
							 				<?php echo  $row['pmrefference'];?>
							 			</div>
							 			<div class="col-md-5">
							 				<p><b>Movable Item List</b></p>
								 			<?php 
								 			$user = $row2['pmuserid'];
								 			$order = $row2['pmorderid'];											
											$movable = "SELECT * FROM pmmovables WHERE pmuserid ='$user' 
											AND pmorderid = '$order'";
											$movableresult = mysqli_query($link, $movable);
								 			if(mysqli_num_rows($movableresult)!=NULL){

												$row = mysqli_fetch_assoc($movableresult);
												$itemother = $row["pmothermovables"];	
												$item = $row["pmitems"];
												$qauntity = $row["pmquantity"];
											}

											$mov = explode(",",$item);
											$movqty = explode(",",$qauntity);
											echo "<br>";
											$n = sizeof($mov);
											for($i=0 ;$i<($n-1);$i++){
											    echo $mov[$i] ."-". $movqty[$i].", ";
											}
											echo $itemother;
											/*echo $item;
											echo $itemother;*/
											?>
										</div>
										<div class="col-md-4">
											<p><b>Order Status</b></p>
											<div><?php echo $row2['statuslist'];?></div>
										</div>
								 	</div>	
								 	<hr style=" border-width: 2px; border-color: red;">
								 	<?php }?>
					  			</div>
					  	</div> <!-- tab content -->
					</div><!-- card body-->
				</div><!-- card -->
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</main><!-- /.main container -->
<?php include 'footer.php';?>
</body>
</html>
<?php
	}
	else{
		header('location: index.php');
	}
?>