<?php
$arr=array();
require_once('/var/www/html/fleet/defaults/config.php');

$owner_id = $_POST["owner_id"];
$name = $_POST["name"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$address3 = $_POST["address3"];
$photo_id = $_POST["photo_id"];
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

$sql = "INSERT INTO owner_info(owner_id,name,address1,address2,address3,photo_id,contact1,contact2,created_datetime) 
	 VALUES ('$owner_id','$name','$address1','$address2','$address3','$photo_id','$contact1','$contact2','$created_datetime')";
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