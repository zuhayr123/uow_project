<?php
$arr=array();
require_once('/var/www/html/fleet/defaults/config.php');

$name = $_POST["name"];
$photo_id = $_POST["photo_id"];
$dl_id = $_POST["dl_id"];
$dl_number = $_POST["dl_number"];
$truck_id = $_POST["truck_id"];
$contact1 = $_POST["contact1"];
$contact2 = $_POST["contact2"];
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

$sql = "UPDATE driver_info SET name='$name',photo_id='$photo_id',dl_id='$dl_id',dl_number='$dl_number',truck_id='$truck_id',contact1='$contact1',contact2='$contact2', WHERE rid='$rowid'";
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