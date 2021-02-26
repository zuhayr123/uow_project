<?php
$arr=array();
require_once('/var/www/html/fleet/defaults/config.php');

$trip_id = $_POST["trip_id"];
$loc_from = $_POST["loc_from"];
$loc_to = $_POST["loc_to"];
$distance = $_POST["distance"];
$start_time = $_POST["start_time"];
$end_time = $_POST["end_time"];
$driver_id = $_POST["driver_id"];
$created_datetime = $_POST["created_datetime"];

$sql = "SELECT * from trip_info WHERE (trip_id='$trip_id' OR '$trip_id'='') AND (loc_from='$loc_from' OR '$loc_from'='') AND (loc_to='$loc_to' OR '$loc_to'='') AND (distance='$distance' OR '$distance'='') AND (start_time='$start_time' OR '$start_time'='') AND (end_time='$end_time' OR '$end_time'='') AND (driver_id='$driver_id' OR '$driver_id'='') AND (created_datetime='$created_datetime' OR '$created_datetime'='') AND 1=1";
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