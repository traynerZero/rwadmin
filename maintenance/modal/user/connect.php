<?php


function addData($object){

	include "../../func/dbconnect.php";
	$uname = mysqli_real_escape_string($con,$object['uname']);
	$pword = mysqli_real_escape_string($con,$object['pword']);
	$fname = mysqli_real_escape_string($con,$object['fname']);
	$lname = mysqli_real_escape_string($con,$object['lname']);
	$level = mysqli_real_escape_string($con,$object['level']);

	$sql = "INSERT INTO `tbl_user` (`username`, `password`, `firstname`, `lastname`, `userlevel`, `status`) VALUES ('".$uname."', '".$pword."', '".$fname."', '".$lname."', '".$level."', '1')";
	
	$result = mysqli_query($con,$sql);
	if($result){
		return "User Added!";
	}else{
		echo "Operation Failed! e:".mysqli_error($con);
	}
}
function editData($object){

	include "../../func/dbconnect.php";
	session_start();

	$id = $_SESSION['editid'];
	$uname = mysqli_real_escape_string($con,$object['uname']);
	$pword = mysqli_real_escape_string($con,$object['pword']);
	$fname = mysqli_real_escape_string($con,$object['fname']);
	$lname = mysqli_real_escape_string($con,$object['lname']);
	$level = mysqli_real_escape_string($con,$object['level']);

	$sql = "UPDATE `tbl_user` SET `username` = '".$uname."', `password` = '".$pword."', `firstname` = '".$fname."', `lastname` = '".$lname."', `userlevel` = '".$level."' WHERE `tbl_user`.`userid` = '$id'";
	$result = mysqli_query($con,$sql);
	if($result){
		return "User Updated!";
		session_destroy();
	}else{
		echo "Operation Failed! e: ".mysqli_error($con);
		session_destroy();
	}
}
function deleteData($id){

	include "../../func/dbconnect.php";
	session_start();


	$sql = "UPDATE `tbl_user` SET `status` = '0' WHERE `tbl_user`.`userid` = '$id'";

	$result = mysqli_query($con,$sql);
	if($result){
		return "User Deleted!";
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