<?php
$arr=array();
require_once('/var/www/html/fleet/defaults/config.php');

$truck_id = $_POST["truck_id"];
$company = $_POST["company"];
$make = $_POST["make"];
$tonnage = $_POST["tonnage"];
$details = $_POST["details"];
$photo_id = $_POST["photo_id"];
$reg_no = $_POST["reg_no"];
$owner_id = $_POST["owner_id"];
$created_datetime = $_POST["created_datetime"];

$sql = "SELECT * from truck_info WHERE (truck_id='$truck_id' OR '$truck_id'='') AND (company='$company' OR '$company'='') AND (make='$make' OR '$make'='') AND (tonnage='$tonnage' OR '$tonnage'='') AND (details='$details' OR '$details'='') AND (photo_id='$photo_id' OR '$photo_id'='') AND (reg_no='$reg_no' OR '$reg_no'='') AND (owner_id='$owner_id' OR '$owner_id'='') AND (created_datetime='$created_datetime' OR '$created_datetime'='') AND 1=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {	
$arr['code']="0";
	$arr['message']="success";
	while($row = $result->fetch_assoc()) {
	
	$arr['list'][]=$row;
	}
}
else {
	$arr['code']="2";
	$arr['message']="fail";
}
echo json_encode($arr);
?>