<?php 
	session_start();
    require '../Form/conn.php';
    $username=$_SESSION['username'];
    if (isset($_GET['submit'])) {
    	mysqli_query($con,"DELETE FROM `thongbao` WHERE `thongbao`.`username` = '$username'");
    }

 ?>