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
	    foreach($checkbox as $chk1) {
	      $items.=$chk1.",";
	    }

	    $drop = $_POST['movableQuantity'];
		foreach($drop as $drop1) {
	      $quantity.=$drop1.",";
		}

	    $movableitems = "INSERT INTO pmmovables (pmorderid,pmuserid,pmitems,pmquantity,pmothermovables,pmmovablestimestamp) 
        VALUES ('$orderid', '$userid', '$items', '$quantity', '$otheritems',CURRENT_TIMESTAMP)";
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
								      	<select id="wordrobe" name="movableQuantity[]" disabled="" >
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="wordrobe1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Wardrobe" style="margin-top: 12px;">								      	
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/chair.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Chair</small>
								      	<select id="chair" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="chair1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Chair" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/table.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Table</small>
								      	<select id="table" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="table1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Table" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
  									<div class="card-footer">
								    	<img class="" src="./img/single-bed.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Single Bed</small>
								      	<select id="single-bed" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="single-bed1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Single-bed" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
				  			
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cupboard.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cupboard</small>
								      	<select id="cupboard" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="cupboard1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cupboard" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/sofa.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Sofa</small>
								      	<select id="sofa" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="sofa1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Sofa" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/dining-table.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Dining Table</small>
								      	<select id="dining-table" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="dining-table1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Dining-table" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/double-bed.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Double Bed</small>
								      	<select id="double-bed" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="double-bed1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Double-bed" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
				  			
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/tv.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Television</small>
								      	<select id="tv" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="tv1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Television" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/ac.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">A.C.</small>
								      	<select id="ac" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="ac1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="A.C." style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/computer.png" alt="Card image cap" style="height: 40px;width: 60px;">
								      	<small class="text-muted">Computer</small>
								      	<select id="computer" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="computer1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Computer" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/owen.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Owen</small>
								      	<select id="owen" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="owen1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Owen" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>

				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/washingmachine.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">washing machine</small>
								      	<select id="washingmachine" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="washingmachine1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="WashingMachine" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/refrigerator.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Refrigerator</small>
								      	<select id="refrigerator" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="refrigerator1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Refrigerator" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/treadmill.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Treadmill</small>
								      	<select id="treadmill" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="treadmill1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Treadmill" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/water-purifier.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Water Purifier</small>
								      	<select id="water-purifier" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="water-purifier1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Water-purifier" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>

				  			
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cooler.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cooler</small>
								      	<select id="cooler" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="cooler1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cooler" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/home-theatre.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Home Theatre</small>
								      	<select id="home-theatre" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="home-theatre1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Home-theatre" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/inverter-battery.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Inverter Battery</small>
								      	<select id="inverter-battery" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="inverter-battery1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Inverter-battery" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/ceiling-fan.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Ceiling Fan</small>
								      	<select id="ceiling-fan" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="ceiling-fan1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Ceiling-fan" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/sewing-machine.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Sewing Machine</small>
								      	<select id="sewing-machine" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="sewing-machine1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Sewing-machine" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/temple.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Temple</small>
								      	<select id="temple" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="temple1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Temple" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cylinder.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cylinder</small>
								      	<select id="cylinder" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="cylinder1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cylinder" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/crockery-shelf.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Crockery Shelf</small>
								      	<select id="crockery-shelf" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="crockery-shelf1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Crockery-shelf" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/mattress.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Mattress</small>
								      	<select id="mattress" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="mattress1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Mattress" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cycle.png" alt="Card image cap" style="height: 40px;width: 50px;">
								      	<small class="text-muted">Cycle</small>
								      	<select id="cycle" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="cycle1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cycle" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/two-wheeler.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Two Wheeler</small>
								      	<select id="two-wheeler" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="two-wheeler1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Two-wheeler" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/four-wheelar.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Four Wheelar</small>
								      	<select id="four-wheelar" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="four-wheelar1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Four-wheelar" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
				  			<div class="card-deck" style="margin-bottom: 10px;">
				  				<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/pets.png" alt="Card image cap" style="height: 40px;width: 50px;">
								      	<small class="text-muted">Pets</small>
								      	<select id="pets" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="pets1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="pets" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/utensils-box.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Utensils Box</small>
								      	<select id="utensils-box" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="utensils-box1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Utensils-box" style="margin-top: 12px;">
								    </div>
  								</div>  								
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/cloths-box.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Cloths Box</small>
								      	<select id="cloths-box" name="movableQuantity[]" disabled="">
		  									<option value="1">1</option>
		  									<option value="2">2</option>
		  									<option value="3">3</option>
		  									<option value="4">4</option>
		  									<option value="5">5</option>
		  									<option value="6">6</option>
		  									<option value="7">7</option>
		  									<option value="8">8</option>
		  									<option value="9">9</option>
	  									</select>
								      	<input class="float-right" id="cloths-box1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Cloths-Box" style="margin-top: 12px;">
								    </div>
  								</div>
  								<div class="card">
								    <div class="card-footer">
								    	<img class="" src="./img/carton-box.png" alt="Card image cap" style="height: 40px;width: 40px;">
								      	<small class="text-muted">Carton box</small>
								      	<select id="carton-box" name="movableQuantity[]" disabled="">
		  									<option value="10">10</option>
		  									<option value="20">20</option>
		  									<option value="30">30</option>
		  									<option value="40">40</option>
		  									<option value="50">50</option>
		  									<option value="60">60</option>
		  									<option value="70">70</option>
		  									<option value="80">80</option>
		  									<option value="90">90</option>
		  									<option value="100">100</option>
	  									</select>
								      	<input class="float-right" id="carton-box1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Four-wheelar" style="margin-top: 12px;">
								    </div>
  								</div>
				  			</div>
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