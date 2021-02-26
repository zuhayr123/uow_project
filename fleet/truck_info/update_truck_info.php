<?php
$arr=array();
require_once('/var/www/html/fleet/defaults/config.php');

$company = $_POST["company"];
$make = $_POST["make"];
$tonnage = $_POST["tonnage"];
$details = $_POST["details"];
$photo_id = $_POST["photo_id"];
$reg_no = $_POST["reg_no"];
$owner_id = $_POST["owner_id"];
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

$sql = "UPDATE truck_info SET company='$company',make='$make',tonnage='$tonnage',details='$details',photo_id='$photo_id',reg_no='$reg_no',owner_id='$owner_id', WHERE rid='$rowid'";
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