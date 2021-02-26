<?php
$arr=array();
require_once('/var/www/html/fleet/defaults/config.php');

$driver_id = $_POST["driver_id"];
$name = $_POST["name"];
$photo_id = $_POST["photo_id"];
$dl_id = $_POST["dl_id"];
$dl_number = $_POST["dl_number"];
$truck_id = $_POST["truck_id"];
$contact1 = $_POST["contact1"];
$contact2 = $_POST["contact2"];
$created_datetime = $_POST["created_datetime"];

$sql = "SELECT * from driver_info WHERE (driver_id='$driver_id' OR '$driver_id'='') AND (name='$name' OR '$name'='') AND (photo_id='$photo_id' OR '$photo_id'='') AND (dl_id='$dl_id' OR '$dl_id'='') AND (dl_number='$dl_number' OR '$dl_number'='') AND (truck_id='$truck_id' OR '$truck_id'='') AND (contact1='$contact1' OR '$contact1'='') AND (contact2='$contact2' OR '$contact2'='') AND (created_datetime='$created_datetime' OR '$created_datetime'='') AND 1=1";
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