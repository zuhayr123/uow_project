<?php
$arr=array();
require_once('/var/www/html/fleet/defaults/config.php');

$loc_from = $_POST["loc_from"];
$loc_to = $_POST["loc_to"];
$distance = $_POST["distance"];
$start_time = $_POST["start_time"];
$end_time = $_POST["end_time"];
$driver_id = $_POST["driver_id"];
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

$sql = "UPDATE trip_info SET loc_from='$loc_from',loc_to='$loc_to',distance='$distance',start_time='$start_time',end_time='$end_time',driver_id='$driver_id', WHERE rid='$rowid'";
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