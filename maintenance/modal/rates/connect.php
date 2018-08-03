<?php


function addData($object){

	include "../../func/dbconnect.php";
	$mtype = mysqli_real_escape_string($con,$object['mtype']);
	$rcode = mysqli_real_escape_string($con,$object['rcode']);
	$area = mysqli_real_escape_string($con,$object['area']);
	$incharge = mysqli_real_escape_string($con,$object['incharge']);
	$scharge = mysqli_real_escape_string($con,$object['scharge']);
	$ocharge = mysqli_real_escape_string($con,$object['ocharge']);
	$lcharge = mysqli_real_escape_string($con,$object['lcharge']);

	$sql = "INSERT INTO `tbl_rate` (`member_type`, `rate_code`, `area_id`, `initcharge`, `succharge`, `oncharge`, `lostcharge`, `rate_status`) VALUES ('".$mtype."', '".$rcode."', '".$area."', '".$incharge."', '".$scharge."', '".$ocharge."', '".$lcharge."', '1')";
	
	$result = mysqli_query($con,$sql);
	if($result){
		return "Rate Added!";
	}else{
		echo "Operation Failed! e:".mysqli_error($con);
	}
}
function editData($object){

	include "../../func/dbconnect.php";
	session_start();

	$id = $_SESSION['editid'];
	$mtype = mysqli_real_escape_string($con,$object['mtype']);
	$rcode = mysqli_real_escape_string($con,$object['rcode']);
	$area = mysqli_real_escape_string($con,$object['area']);
	$incharge = mysqli_real_escape_string($con,$object['incharge']);
	$scharge = mysqli_real_escape_string($con,$object['scharge']);
	$ocharge = mysqli_real_escape_string($con,$object['ocharge']);
	$lcharge = mysqli_real_escape_string($con,$object['lcharge']);

	$sql = "UPDATE `tbl_rate` SET `member_type` = '".$mtype."', `rate_code` = '".$rcode."', `area_id` = '".$area."', `initcharge` = '".$incharge."', `succharge` = '".$scharge."', `oncharge` = '".$ocharge."', `lostcharge` = '".$lcharge."' WHERE `tbl_rate`.`rate_id` = '$id'";
	$result = mysqli_query($con,$sql);
	if($result){
		return "Rate Updated!";
		session_destroy();
	}else{
		echo "Operation Failed! e: ".mysqli_error($con);
		session_destroy();
	}
}
function deleteData($id){

	include "../../func/dbconnect.php";
	session_start();


	$sql = "UPDATE `tbl_rate` SET `rate_status` = '0' WHERE `tbl_rate`.`rate_id` = '$id'";

	$result = mysqli_query($con,$sql);
	if($result){
		return "Rate Deleted!";
		session_destroy();
	}else{
		echo "Operation Failed! e:".mysqli_error($con);
		session_destroy();
	}
}

if($_POST['action'] == "add"){
	echo addData($_POST['data']);
}else if($_POST['action'] == "edit"){
	echo editData($_POST['data']);
}else if($_POST['action'] == "delete"){
	echo deleteData($_POST['data']);
}


?>