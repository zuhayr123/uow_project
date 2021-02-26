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

$sql = "SELECT * from owner_info WHERE (owner_id='$owner_id' OR '$owner_id'='') AND (name='$name' OR '$name'='') AND (address1='$address1' OR '$address1'='') AND (address2='$address2' OR '$address2'='') AND (address3='$address3' OR '$address3'='') AND (photo_id='$photo_id' OR '$photo_id'='') AND (contact1='$contact1' OR '$contact1'='') AND (contact2='$contact2' OR '$contact2'='') AND (created_datetime='$created_datetime' OR '$created_datetime'='') AND 1=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {	
$arr['code']="0";
	$arr['message']="success";
	while($row = $result->fetch_assoc()) {
	
	$arr['list'][]=$row;
	}
}
else {
	$arr['code']="2";
	$arr['message']="fail";
}
echo json_encode($arr);
?>