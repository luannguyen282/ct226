<?php 
    
	session_start();
    require 'conn.php';
   $matailieu=$_GET['matailieu'];
   $sql = "DELETE FROM `giohang` WHERE `matailieu` = '".$matailieu."' AND `username` LIKE '".$_SESSION['username']."';";
    $check=mysqli_query($con, $sql);
    if ($check) {
        echo "thành công";
    }else echo "thất bại";
    header("Location: ../Public/cart.php");
 ?>