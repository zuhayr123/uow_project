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

date_default_timezone_set('Asia/Kolkata');
$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];
$created_datetime = "$year-$month-$date $hour:$min:$sec";

$sql = "INSERT INTO truck_info(truck_id,company,make,tonnage,details,photo_id,reg_no,owner_id,created_datetime) 
	 VALUES ('$truck_id','$company','$make','$tonnage','$details','$photo_id','$reg_no','$owner_id','$created_datetime')";
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