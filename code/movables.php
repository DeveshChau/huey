<?php
/*session_start();*/

if(/*isset($_SESSION['sessionvariable'])*/1){	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "pm_huey";

	$link = mysqli_connect($servername, $username, $password, $dbname);

	if($link === false){
	    die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$usermobile = $_SESSION['usermobile'];

	$useridsearch = "SELECT * from pmusers where pmusermobile = '$usermobile'";
	
	$useridsearchresult = mysqli_query($link, $useridsearch);

	if(mysqli_num_rows($useridsearchresult)!=NULL){

		$row = mysqli_fetch_assoc($useridsearchresult);

		$userid = $row["pmuserid"];
	}
	

	$ordersearch = "SELECT pmorderid FROM pmorders 
	WHERE pmuserid = $userid ORDER BY pmorderid DESC LIMIT 1";
	$orderid = mysqli_query($link, $ordersearch);
	if(mysqli_num_rows($orderid)!=NULL){

		$row = mysqli_fetch_assoc($orderid);

		$orderid = $row["pmorderid"];
	}
	if(isset($_POST['btnSubmit'])){
		$otheritems = $_POST['otheritems'];        
	    $checkbox = $_POST['movable'];
	    $chk = $_POST['movable[0]'];
	    echo $otheritems;
	    foreach($checkbox as $chk1) {
	      $items.=$chk1.",";
	    }
	    $movableitems = "INSERT INTO pmmovables (pmorderid,pmuserid,pmitems,pmothermovables,pmmovablestimestamp) 
        VALUES ('$orderid', '$userid', '$items', '$otheritems',CURRENT_TIMESTAMP)";
    	$movableresult = mysqli_query($link, $movableitems);
    	header('location: userdashboard.php');
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
	</head>
	<body class="child-page">
	<?php
		include 'header.php';
	?>

	<main role="main" >
		<br><br>
		<div class="container">
			<div class="row">
				<!-- <div class="col-md-1"></div> -->
				<div class="col-md-12">
					<div class="card">
				  		<div class="card-header" >
				  			You can help us by describing your movables
				  		</div>
				  		<div class="card-body">
				  			<form id="movablesform" method="POST">
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/wardrobe.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Wardrobe</small>
								      	
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Wardrobe" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/chair.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Chair</small>
								      	
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Chair" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
  									<div class="card-footer">
								    	<img class="" src="./img/table.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Table</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Table" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
  									<div class="card-footer">
								    	<img class="" src="./img/single-bed.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Single Bed</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Single-bed" style="margin-top: 12px;">
								    </div>
  								</div>
  								
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cupboard.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cupboard</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cupboard" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/sofa.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Sofa</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Sofa">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/dining-table.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Dining Table</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Dining-table" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/double-bed.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Double Bed</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Double-bed" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/tv.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Television</small>
								      	
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Television" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/ac.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">A.C.</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="A.C." style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/computer.png" alt="Card image cap" style="height: 40px;width: 60px;">
								      	<small class="text-muted">Computer</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Computer" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/owen.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Owen</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Owen" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/washingmachine.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">washing machine</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="WashingMachine" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/refrigerator.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Refrigerator</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Refrigerator" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/treadmill.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Treadmill</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Treadmill" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/water-purifier.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Water Purifier</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Water-purifier" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cooler.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cooler</small>
								      	
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cooler" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/home-theatre.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Home Theatre</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Home-theatre" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/inverter-battery.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Inverter Battery</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Inverter-battery" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/ceiling-fan.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Ceiling Fan</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Ceiling-fan" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/sewing-machine.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Sewing Machine</small>
								      	
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Sewing-machine" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/temple.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Temple</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Temple" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cylinder.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cylinder</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cylinder" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/crockery-shelf.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Crockery Shelf</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Crockery-shelf" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/mattress.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Mattress</small>
								      	
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Mattress" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cycle.png" alt="Card image cap" style="height: 40px;width: 50px;">
								      	<small class="text-muted">Cycle</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cycle" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/two-wheeler.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Two Wheeler</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Two-wheeler" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/four-wheelar.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Four Wheelar</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Four-wheelar" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
				  		<!-- 	<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/pets.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Pets</small>
								      	
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Pets" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/sofa.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Sofa</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Sofa">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cupboard.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cupboard</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cupboard">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cupboard.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cupboard</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cupboard">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cycle.png" alt="Card image cap" style="height: 40px;width: 50px;">
								      	<small class="text-muted">Cycle</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cycle">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/chair.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Chair</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Chair">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/refrigerator.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Refrigerator</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Refrigerator">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/washingmachine.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">washing machine</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="WashingMachine">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/ac.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">A.C.</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="A.C.">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/owen.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Owen</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Owen ">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cot.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cot</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cot">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/table.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Table</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Table">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/computer.png" alt="Card image cap" style="height: 40px;width: 60px;">
								      	<small class="text-muted">Computer</small>
								      	<input class="float-right" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Computer">
								    </div>
  								</div>
				  			</div> -->
				  			<div class="input-group" style="margin-bottom: 10px;">
								<div class="input-group-prepend">
									<span class="input-group-text">Other Movables</span>
								</div>
								<textarea class="form-control" aria-label="With textarea" placeholder="Something Important you want to mention" name="otheritems"></textarea>
							</div>
							<div class="form-group" style="text-align: center;">
								<input type="submit" name="btnSubmit" value="Save" class="btn btn-submit" />
							</div>
						</form>
						</div>
					</div>
				<!-- <div class="col-md-1"></div> -->
			</div>
		</div>
		</div>
	<?php include 'footer.php';?>
  </body>
</html>
<?php
	}
	else{
		header('location: index.php');
	}
?>