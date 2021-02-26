<?php
$arr=array();
require_once('/var/www/html/fleet/defaults/config.php');

$entry_id = $_POST["entry_id"];
$driver_id = $_POST["driver_id"];
$lat = $_POST["lat"];
$lon = $_POST["lon"];
$timestamp = $_POST["timestamp"];
$trip_id = $_POST["trip_id"];
$speed = $_POST["speed"];
$created_datetime = $_POST["created_datetime"];

$sql = "SELECT * from location_info WHERE (entry_id='$entry_id' OR '$entry_id'='') AND (driver_id='$driver_id' OR '$driver_id'='') AND (lat='$lat' OR '$lat'='') AND (lon='$lon' OR '$lon'='') AND (timestamp='$timestamp' OR '$timestamp'='') AND (trip_id='$trip_id' OR '$trip_id'='') AND (speed='$speed' OR '$speed'='') AND (created_datetime='$created_datetime' OR '$created_datetime'='') AND 1=1";
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