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

date_default_timezone_set('Asia/Kolkata');
$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];
$created_datetime = "$year-$month-$date $hour:$min:$sec";

$sql = "INSERT INTO driver_info(driver_id,name,photo_id,dl_id,dl_number,truck_id,contact1,contact2,created_datetime) 
	 VALUES ('$driver_id','$name','$photo_id','$dl_id','$dl_number','$truck_id','$contact1','$contact2','$created_datetime')";
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