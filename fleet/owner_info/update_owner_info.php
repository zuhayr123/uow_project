<?php
$arr=array();
require_once('/var/www/html/fleet/defaults/config.php');

$name = $_POST["name"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$address3 = $_POST["address3"];
$photo_id = $_POST["photo_id"];
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

$sql = "UPDATE owner_info SET name='$name',address1='$address1',address2='$address2',address3='$address3',photo_id='$photo_id',contact1='$contact1',contact2='$contact2', WHERE rid='$rowid'";
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