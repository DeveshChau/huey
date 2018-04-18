<?php
$response = '{"message":"number_verified_successfully","type":"success"}';
$response1 = json_decode($response);

$response1 = $response1->{'type'};

echo json_encode($response1);
?>