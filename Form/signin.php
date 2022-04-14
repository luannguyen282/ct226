<?php
	session_start();
	include_once('conn.php');
	$surname = $_POST['new-surname'];
	$name = $_POST['new-name'];
	$username = $_POST['new-username'];
	$mail = $_POST['new-mail'];
	$password = md5($_POST['new-password']);
	$sql = "SELECT *  FROM `taikhoan` WHERE `username` LIKE '".$username."';";
	$check = mysqli_query($con, $sql);
	$sql2 = "INSERT INTO `nguoidung` (`username`, `ho`, `ten`, `k`, `makhoa`, `diachi`, `hinhdaidien`) VALUES ('".$username."', '".$surname."', '".$name."', NULL, NULL, NULL, 'avatar.png');";
	$sql3 = "INSERT INTO `lienhe` (`username`,`gmail`,`phone`,`facebook`,`zalo`) VALUES ('".$username."','".$mail."', NULL, NULL, NULL);";
	$sql1 = "INSERT INTO `taikhoan` (`username`, `password`) VALUES ('".$username."', '".$password."');";
	if ( mysqli_num_rows($check)==0) {
		mysqli_query($con, $sql1);
		mysqli_query($con, $sql2);
		mysqli_query($con, $sql3);

		$_SESSION['sucess']=true;
	}else{
		$_SESSION['username_exist']=true;
	}
	header("Location: ../index.php");
?>