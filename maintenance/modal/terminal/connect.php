<?php


function addData($object){

	include "../../func/dbconnect.php";

	$tname = mysqli_real_escape_string($con,$object['tname']);
	$tip = mysqli_real_escape_string($con,$object['tip']);
	$tarea = mysqli_real_escape_string($con,$object['tarea']);

	$sql = "INSERT INTO `tbl_terminal` (`term_name`, `term_ip`, `term_area` , `term_status`) VALUES ('".$tname."', '".$tip."', '".$tarea."',  '1')";
	$result = mysqli_query($con,$sql);
	if($result){
		return "Terminal Added!";
	}else{
		echo "Operation Failed! e:".mysqli_error($con);
	}
}
function editData($object){

	include "../../func/dbconnect.php";
	session_start();

	$id = $_SESSION['editid'];
	$tname = mysqli_real_escape_string($con,$object['tname']);
	$tip = mysqli_real_escape_string($con,$object['tip']);
	$tarea = mysqli_real_escape_string($con,$object['tarea']);

	$sql = "UPDATE `tbl_terminal` SET `term_name` = '".$tname."', `term_ip` = '".$tip."' , `term_area` = '".$tarea."' WHERE `tbl_terminal`.`terminal_id` = '$id'";

	$result = mysqli_query($con,$sql);
	if($result){
		return "Terminal Updated!";
		// session_destroy();
	}else{
		echo "Operation Failed! e: ".mysqli_error($con);
		// session_destroy();
	}
}
function deleteData($id){

	include "../../func/dbconnect.php";
	session_start();


	$sql = "UPDATE `tbl_terminal` SET `term_status` = '0' WHERE `tbl_terminal`.`term_id` = '$id'";

	$result = mysqli_query($con,$sql);
	if($result){
		return "Terminal Deleted!";
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