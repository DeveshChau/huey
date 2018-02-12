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
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="card">
				  		<div class="card-header" >
				  			You can help us by describing your movables
				  		</div>
				  		<div class="card-body">
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/tv.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Television</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/sofa.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Sofa</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cupboard.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cupboard</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cycle.png" alt="Card image cap" style="height: 40px;width: 50px;">
								      	<small class="text-muted">Cycle</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/chair.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Chair</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/refrigerator.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Refrigerator</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/washingmachine.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">washing machine</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/ac.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">A.C.</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/owen.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Owen</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cot.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cot</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/table.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Table</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/computer.png" alt="Card image cap" style="height: 40px;width: 60px;">
								      	<small class="text-muted">Computer</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input">
								    </div>
  								</div>
				  			</div>
				  			<div class="input-group" style="margin-bottom: 10px;">
								<div class="input-group-prepend">
									<span class="input-group-text">Other Movables</span>
								</div>
								<textarea class="form-control" aria-label="With textarea" placeholder="Something Important you want to mention"></textarea>
							</div>
							<div class="form-group" style="text-align: center;">
								<a class="btn btn-primary" href="userdashboard.php" role="button">Next</a>
							</div>
						</div>
					</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		</div>
	</main>
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
