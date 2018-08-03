<?php


function addData($object){

	include "../../func/dbconnect.php";

	$aname = mysqli_real_escape_string($con,$object['aname']);
	$acode = mysqli_real_escape_string($con,$object['acode']);

	$sql = "INSERT INTO `tbl_area` (`area_name`, `area_code`, `area_status`) VALUES ('".$aname."', '".$acode."', '1')";
	$result = mysqli_query($con,$sql);
	if($result){
		return "Area Added!";
	}else{
		echo "Operation Failed! e:".mysqli_error($con);
	}
}
function editData($object){

	include "../../func/dbconnect.php";
	session_start();

	$id = $_SESSION['editid'];
	$aname = mysqli_real_escape_string($con,$object['aname']);
	$acode = mysqli_real_escape_string($con,$object['acode']);

	$sql = "UPDATE `tbl_area` SET `area_name` = '".$aname."', `area_code` = '".$acode."' WHERE `tbl_area`.`area_id` = '$id'";

	$result = mysqli_query($con,$sql);
	if($result){
		return "Area Updated!";
		// session_destroy();
	}else{
		echo "Operation Failed! e: ".mysqli_error($con);
		// session_destroy();
	}
}
function deleteData($id){

	include "../../func/dbconnect.php";
	session_start();


	$sql = "UPDATE `tbl_area` SET `area_status` = '0' WHERE `tbl_area`.`area_id` = '$id'";

	$result = mysqli_query($con,$sql);
	if($result){
		return "Area Deleted!";
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