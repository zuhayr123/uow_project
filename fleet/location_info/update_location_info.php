<?php
$arr=array();
require_once('/var/www/html/fleet/defaults/config.php');

$driver_id = $_POST["driver_id"];
$lat = $_POST["lat"];
$lon = $_POST["lon"];
$timestamp = $_POST["timestamp"];
$trip_id = $_POST["trip_id"];
$speed = $_POST["speed"];
$rowid=$_POST["rowid"];

date_default_timezone_set('Asia/Kolkata');
$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];
$created_datetime = "$year-$month-$date $hour:$min:$sec";

$sql = "UPDATE location_info SET driver_id='$driver_id',lat='$lat',lon='$lon',timestamp='$timestamp',trip_id='$trip_id',speed='$speed', WHERE rid='$rowid'";
$result = $conn->query($sql);
if ($result === TRUE) {
	$arr['code']="0";
	$arr['message']="success";
}
else {
	$arr['code']="2";
	$arr['message']="fail";
}
echo json_encode($arr);
?>