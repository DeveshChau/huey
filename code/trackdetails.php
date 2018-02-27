<?php
session_start();
if(isset($_SESSION['sessionvariable'])){
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" />
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
						<ul class="nav nav-pills nav-fill" role="tablist">
						  <li class="nav-item active">
						    <a class="nav-link active" href="#pickup">Pickup</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" href="#drop">Drop</a>
						  </li>						  
						</ul>
				  	</div>

				  	<div class="card-body">
						<div class="tab-content" id="bookingTabContent">
					  		<div class="tab-pane fade show active" id="pickup" role="tabpanel" aria-labelledby="pickup-tab">
						
								<form data-toggle="validator" role="form">

								  	<div class="form-group">
										<label for="trackpickupdate">Date</label>
									  	<div class="input-group date">
											<input type="text" class="form-control" id="trackpickupdate" placeholder="MM/DD/YYYY" required>											
										</div>
										<div class="help-block with-errors"></div>
								  	</div>

								  	<div class="form-group">
										<label for="trackpickupLocationApartment">Location / Apartment</label>
										<input type="text" class="form-control" id="trackpickupLocationApartment" placeholder="Enter your Location / Apartment" required>				
										<div class="help-block with-errors"></div>
								  	</div>


								  	<div class="form-group">
										<label for="trackpickupfloor">Floor</label>
										<select class="form-control" id="trackpickupfloor">
										  <option value="1">1</option>
										  <option value="2">2</option>
										  <option value="3">3</option>
										  <option value="4">4</option>
										  <option value="5">5</option>
										</select>
								  	</div>

								  	<div class="form-group">
										<label for="trackpickuplift">Lift available for moving</label>
										<select class="form-control" id="trackpickuplift">
										  <option value="Yes">Yes</option>
										  <option value="No">No</option>
										</select>
								  	</div>

								  <br>

								  <div class="form-group" style="text-align: center;">
									<button type="button" class="btn btn-primary  btn-lg " id="trackpickupnext">Next</button>
								  </div>

								</form>
					  		</div>

					  		<div class="tab-pane fade" id="drop" role="tabpanel" aria-labelledby="drop-tab">
								<form data-toggle="validator" role="form">

								  <div class="form-group">
									<label for="trackdropLocationApartment">Location / Apartment</label>
									<input type="text" class="form-control" id="trackdropLocationApartment" placeholder="Enter your Location / Apartment" required>
									<div class="help-block with-errors"></div>
								  </div>

								  <div class="form-group">
									<label for="trackdropfloor">Floor</label>
									<select class="form-control" id="trackdropfloor">
									  <option value="1">1</option>
									  <option value="2">2</option>
									  <option value="3">3</option>
									  <option value="4">4</option>
									  <option value="5">5</option>
									</select>
								  </div>

								  <div class="form-group">
									<label for="trackdroplift">Lift available for moving</label>
									<select class="form-control" id="trackdroplift">
									  <option value="Yes">Yes</option>
									  <option value="No">No</option>
									</select>
								  </div>

								  <br>								
								  <div class="form-group" style="text-align: center;">
									<button type="button" class="btn btn-primary  btn-lg " id="trackdropprevious">Previous</button>
																		
									<button type="button" class="btn btn-primary  btn-lg" id="trackdropnext">Next</a>									
								  </div>	
																	  
								</form>

					 		</div>					  		
				  	</div>

				</div>

			</div>

			<div class="col-md-2"></div>

		</div>
	  </div>

	</main><!-- /.container -->

	
	<?php include 'footer.php';?>
	<script type="text/javascript">
      function activatePlacesSearch(){
        var input1 = document.getElementById('trackpickupLocationApartment');
        var autoComplete1 = new google.maps.places.Autocomplete(input1);
        var input2 = document.getElementById('trackdropLocationApartment');
       	var autoComplete2 = new google.maps.places.Autocomplete(input2);
      }         
   </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZTJTA-s7jJHmEL0I720ztSf9vNFZj42U&libraries=places&callback=activatePlacesSearch"></script>
  </body>
</html>
<?php
	}
	else{
		header('location: index.php');
	}
?>