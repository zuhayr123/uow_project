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

date_default_timezone_set('Asia/Kolkata');
$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];
$created_datetime = "$year-$month-$date $hour:$min:$sec";

$sql = "INSERT INTO location_info(entry_id,driver_id,lat,lon,timestamp,trip_id,speed,created_datetime) 
	 VALUES ('$entry_id','$driver_id','$lat','$lon','$timestamp','$trip_id','$speed','$created_datetime')";
$result = $conn->query($sql);
$row=$result->num_rows;
if ($row >= 0) {
	$arr['code']="0";
	$arr['message']="success";
}
else {
	$arr['code']="1";
	$arr['message']="fail";
}
echo json_encode($arr);
?>