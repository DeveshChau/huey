<?php
session_start();
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
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card" id="inquiry-form">
				  	<div class="card-header" >
						<ul class="nav nav-pills nav-fill" role="tablist" id="details-tab">
						  <li class="nav-item active">
						    <a class="nav-link active" href="#pickup" data-toggle="tab">Pickup</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" href="#drop" data-toggle="tab">Drop</a>
						  </li>
						  <?php
						  if(!isset($_SESSION['usermobile'])	
							){
							?>
						  <li class="nav-item">
						    <a class="nav-link" href="#profile" data-toggle="tab">Profile</a>
						  </li>
						  <?php } ?>
						</ul>
				  	</div>

				  	<div class="card-body">
						<div class="tab-content" id="bookingTabContent">
					  		<div class="tab-pane fade show active" id="pickup" role="tabpanel" aria-labelledby="pickup-tab">
						
								<form>

								  <div class="form-group">
									<label for="date">Date</label>
									<select class="form-control" id="Date">
									  <option disabled>Select Date</option>
									</select>
								  </div>

								  <div class="form-group">
									<label for="pickup-LocationApartment">Location / Apartment</label>
									<input type="text" class="form-control" id="PickupLocationApartment" placeholder="Enter your Location / Apartment">
								  </div>

								  <div class="form-group">
									<label for="pickup-floor">Floor</label>
									<select class="form-control" id="floor">
									  <option>1</option>
									  <option>2</option>
									  <option>3</option>
									  <option>4</option>
									  <option>5</option>
									</select>
								  </div>

								  <div class="form-group">
									<label for="pickup-lift">Lift available for moving</label>
									<select class="form-control" id="lift">
									  <option>Yes</option>
									  <option>No</option>
									</select>
								  </div>

								  <br>

								  <div class="form-group" style="text-align: center;">
									<button type="button" class="btn btn-primary  btn-lg " id="pickup-next">Next</button>
								  </div>	

								</form>

					  		</div>

					  		<div class="tab-pane fade" id="drop" role="tabpanel" aria-labelledby="drop-tab">
								<form>

								  <div class="form-group">
									<label for="drop-LocationApartment">Location / Apartment</label>
									<input type="text" class="form-control" id="DropLocationApartment" placeholder="Enter your Location / Apartment">
								  </div>

								  <div class="form-group">
									<label for="drop-floor">Floor</label>
									<select class="form-control" id="floor">
									  <option>1</option>
									  <option>2</option>
									  <option>3</option>
									  <option>4</option>
									  <option>5</option>
									</select>
								  </div>

								  <div class="form-group">
									<label for="drop-lift">Lift available for moving</label>
									<select class="form-control" id="lift">
									  <option>Yes</option>
									  <option>No</option>
									</select>
								  </div>

								  <br>								
								  <div class="form-group" style="text-align: center;">
									<button type="button" class="btn btn-primary  btn-lg " id="drop-previous">Previous</button>
									<?php 
										if(!isset($_SESSION['usermobile'])	
										){
									?>
									<button type="button" class="btn btn-primary  btn-lg " id="drop-next">Next</button>
									<?php } else { ?>
									<!-- <button type="button" class="btn btn-primary  btn-lg " id="track-drop-next"  data-toggle="modal" data-target="#otpModal">Next</button> -->
									<a class="btn btn-primary  btn-lg" id="track-drop-next" href="movables.php">Next</a>
									<?php } ?>
								  </div>	
								
									
																	  
								</form>
					 		</div>
					  		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							  	<form id="profileinfo" name="profileinfo">

								  <div class="form-group">
									<label for="username">Name</label>
									<input type="text" class="form-control" id="username" placeholder="Enter your Name">
								  </div>

								  <div class="form-group">
									<label for="useremail">Email</label>
									<input type="text" class="form-control" id="useremail" placeholder="Enter your Email">
								  </div>

								  <div class="form-group">
									<label for="usermobile">Mobile</label>							
									<input type="text" name="" id="usermobile" class="form-control" >
								  </div>

								  <br>

								  <div class="form-group" style="text-align: center;">
								  	<button type="button" class="btn btn-primary  btn-lg " id="profile-previous">Previous</button>
									<button type="button" class="btn btn-primary  btn-lg " id="profile-next"  data-toggle="modal" data-target="#otpModal">Next</button>
								  </div>	

								</form>
					  		</div>
						</div>
				  	</div>

				</div>

			</div>

			<div class="col-md-2"></div>

		</div>
	  </div>

	</main><!-- /.container -->

	<!-- Modal -->
	<div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true" data-backdrop="static">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        <div class="form-group">
				<label for="otp">Enter OTP</label>
				<input type="text" class="form-control" id="otp" placeholder="Enter 4 Digit OTP">
			</div>	        

			<div class="form-group">
				<button type="button" class="btn btn-primary" id="btn-otp-submit">Submit</button>
				<a class="float-right" id="retry-otp" href="#">Resend OTP</a>
			</div>
			
	      </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="http://ajax.cdnjs.com/ajax/libs/json2/20110223/json2.js"></script>
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="./js/main.js"></script>
	<script type="text/javascript">
      function activatePlacesSearch(){
        var input1 = document.getElementById('PickupLocationApartment');
        var autoComplete1 = new google.maps.places.Autocomplete(input1);
        var input2 = document.getElementById('DropLocationApartment');
       	var autoComplete2 = new google.maps.places.Autocomplete(input2);
      }         
   </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZTJTA-s7jJHmEL0I720ztSf9vNFZj42U&libraries=places&callback=activatePlacesSearch"></script>
  </body>
</html>