<?php
$checkbox = $_POST['movable'];
foreach($checkbox as $chk1) {
	      $items.=$chk1.",";
}
echo $items;
$drop = $_POST['movableQut'];
foreach($drop as $drop1) {
	      $qyt.=$drop1.",";
}
echo $qyt;

$mov = explode(",",$items);
$movqty = explode(",",$qyt);
echo "<br>";
$n = sizeof($mov);
for($i=0 ;$i<$n;$i++){
    echo $mov[$i] ." ". $movqty[$i]. "<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="#" method="post">
<div>
<img class="" src="./img/wardrobe.png" alt="Card image cap" style="height: 40px;width: 40px;">
<small class="text-muted">Wardrobe</small>
<select class="form-control" id="wordrobe" disabled="" name="movableQut[]">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
</select>
<input class="float-right" id="wordrobe1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="Wardrobe" style="margin-top: 12px;">

</div>
<div>
<img class="" src="./img/wardrobe.png" alt="Card image cap" style="height: 40px;width: 40px;">
<small class="text-muted">Wardrobe</small>
<select class="form-control" id="tv" disabled="" name="movableQut[]">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
</select>
<input class="float-right" id="tv1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="tv" style="margin-top: 12px;">
</div>
<div>
<img class="" src="./img/wardrobe.png" alt="Card image cap" style="height: 40px;width: 40px;">
<small class="text-muted">Wardrobe</small>
<select class="form-control" id="bed" disabled="" name="movableQut[]">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
</select>
<input class="float-right" id="bed1" type="checkbox" aria-label="Checkbox for following text input" name="movable[]" value="bed" style="margin-top: 12px;">
</div>
<input type="submit" name="btnSubmit" value="Save" class="btn btn-submit" />
</form>
</body>
</html>

<?php
include 'footer.php';
?>