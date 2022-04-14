<?php 
    
	session_start();
    require 'conn.php';
   echo  $matailieu=$_GET['matailieu'];
    $check1=mysqli_num_rows(mysqli_query($con, "SELECT * FROM `giohang` WHERE `username` LIKE '".$_SESSION['username']."' AND `matailieu` = '".$matailieu."';"));
    	$check2=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `tailieu` WHERE `matailieu` = '".$matailieu."' AND `username` LIKE '".$_SESSION['username']."';"));
    	if ($check1==0 && $check2==0) {
    		$result=mysqli_query($con, "INSERT INTO `giohang` (`magiohang`, `username`, `matailieu`) VALUES (NULL, '".$_SESSION['username']."', '".$matailieu."');");
    	}


 ?>