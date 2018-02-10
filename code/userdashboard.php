<?php
session_start();
if(isset($_SESSION['usermobile'])	
){
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
				    			<a class="nav-link active" href="#current-order" data-toggle="tab">Current Order</a>
					  		</li>
					  		<li class="nav-item">
					    		<a class="nav-link" href="#previous-order" data-toggle="tab">Previous Order</a>
					  		</li>				  
						</ul>
						<a class="float-right" href="details.php" >New Order</a>
			  		</div>

				  	<div class="card-body">
						<div class="tab-content">
					  		<div class="tab-pane fade show active" id="current-order" role="tabpanel" aria-labelledby="pickup-tab">
								<div class="card">				  		
							  		<div class="card-body">
							  			<div class="card-deck" style="margin-bottom: 10px;">
			  								<div class="card">
											    <div class="card-footer">				      		
											      	<small class="text-muted">Pick Up Address</small>
											      	<p>14-02-2018</p> 
											    </div>
			  								</div>
			  								<div class="card">
											    <div class="card-footer">
											    	<small class="text-muted">Pick Up Address</small>
											      	<p>C706, Krishna Aeropolis, POrwal Road, Lohegaon, Pune 422037</p>	
											    </div>
			  								</div>
			  								<div class="card">
											    <div class="card-footer">
											    	<small class="text-muted">Drop Address</small>
											      	<p>C706, Krishna Aeropolis, POrwal Road, Lohegaon, Pune 422037</p>	
											    </div>
			  								</div>  								
							  			</div>
							  			<div class="jumbotron">		
							  				<h1 class="">Movables</h1>
											<!-- Dynamic table-->
											<table class="table">
												<tbody>
													<tr>
													  	<td>Mark</td>
													  	<td>Mark</td>
													  	<td>Otto</td>
													  	<td>@mdo</td>
													</tr>
													<tr>
												  		<td>Mark</td>
													  	<td>Mark</td>
													  	<td>Otto</td>
													  	<td>@mdo</td>
													</tr>
													<tr>
														<td>Mark</td>
													  	<td>Mark</td>
													  	<td>Otto</td>
													  	<td>@mdo</td>
													</tr>
												</tbody>
											</table>
											<hr class="my-4">
											<p>Dynamic movalbes </p>
											<p class="lead"></p>							
										</div>
									</div>
								</div>
					  		</div>

					  		<div class="tab-pane fade" id="previous-order" role="tabpanel" aria-labelledby="drop-tab">
								<table class="table">
								  <thead class="thead-dark">
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">First</th>
								      <th scope="col">Last</th>
								      <th scope="col">Handle</th>
								      <th scope="col">Details</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row">1</th>
								      <td>Mark</td>
								      <td>Otto</td>
								      <td>@mdo</td>
								      <td><img src="./img/show.png"></td>
								    </tr>
								    <tr>
								      <th scope="row">2</th>
								      <td>Jacob</td>
								      <td>Thornton</td>
								      <td>@fat</td>
								      <td><img src="./img/show.png"></td>
								    </tr>
								    <tr>
								      <th scope="row">3</th>
								      <td>Larry</td>
								      <td>the Bird</td>
								      <td>@twitter</td>
								      <td><img src="./img/show.png"></td>
								    </tr>
								  </tbody>
								</table>
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