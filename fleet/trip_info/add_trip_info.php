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

date_default_timezone_set('Asia/Kolkata');
$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];
$created_datetime = "$year-$month-$date $hour:$min:$sec";

$sql = "INSERT INTO trip_info(trip_id,loc_from,loc_to,distance,start_time,end_time,driver_id,created_datetime) 
	 VALUES ('$trip_id','$loc_from','$loc_to','$distance','$start_time','$end_time','$driver_id','$created_datetime')";
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