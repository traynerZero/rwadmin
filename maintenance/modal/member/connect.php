<?php


function addData($object){

	include "../../func/dbconnect.php";

	$mname = mysqli_real_escape_string($con,$object['mname']);

	$sql = "INSERT INTO `tbl_member` (`member_type`, `member_status`) VALUES ('".$mname."', '1')";
	$result = mysqli_query($con,$sql);
	if($result){
		return "Member Type Added!";
	}else{
		echo "Operation Failed! e:".mysqli_error($con);
	}
}
function editData($object){

	include "../../func/dbconnect.php";
	session_start();

	$id = $_SESSION['editid'];
	$mname = mysqli_real_escape_string($con,$object['mname']);

	$sql = "UPDATE `tbl_member` SET `member_type` = '".$mname."' WHERE `tbl_member`.`member_id` = '$id'";

	$result = mysqli_query($con,$sql);
	if($result){
		return "Member Type Updated!";
		// session_destroy();
	}else{
		echo "Operation Failed! e: ".mysqli_error($con);
		// session_destroy();
	}
}
function deleteData($id){

	include "../../func/dbconnect.php";
	session_start();


	$sql = "UPDATE `tbl_member` SET `member_status` = '0' WHERE `tbl_member`.`member_id` = '$id'";

	$result = mysqli_query($con,$sql);
	if($result){
		return "Member Type Deleted!";
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