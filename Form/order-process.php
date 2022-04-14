<?php 

	session_start();
    require 'conn.php';
    $madonhang=$_GET['madonhang'];
    $donhang=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `donhang` WHERE `madonhang` = '$madonhang'"));

    if (isset($_GET['decline'])) {

    	$result1=mysqli_query($con, "UPDATE `chitietdonhang` SET `huy` = (SELECT CURRENT_TIMESTAMP) WHERE `madonhang` = $madonhang;");
        mysqli_query($con, "UPDATE `tailieu` SET `matrangthai` = 'lock' WHERE `matailieu` = '".$donhang['matailieu']."';");
    }

    if (isset($_GET['accept'])) {
    	$trangthai=$_GET['accept'];
    	if ($trangthai=="Chấp nhận yêu cầu"){
    		$result2=mysqli_query($con, "UPDATE `chitietdonhang` SET `chapnhan` = (SELECT CURRENT_TIMESTAMP) WHERE `madonhang` = $madonhang;");
            mysqli_query($con, "UPDATE `tailieu` SET `matrangthai` = 'exchanging' WHERE `matailieu` = '".$donhang['matailieu']."';");
        }

    	else{
    		if ($trangthai=="Xác nhận đã liên hệ") 
    			$result3=mysqli_query($con, "UPDATE `chitietdonhang` SET `lienhe` = (SELECT CURRENT_TIMESTAMP) WHERE `madonhang` = $madonhang;");
    		else{
    			if($trangthai=="Xác nhận hoàn tất"){
    			$result4=mysqli_query($con, "UPDATE `chitietdonhang` SET `hoantat` = (SELECT CURRENT_TIMESTAMP) WHERE `madonhang` = $madonhang;");
                mysqli_query($con, "UPDATE `tailieu` SET `matrangthai` = 'shared' WHERE `matailieu` = '".$donhang['matailieu']."';");
                }
    		}
    	}
    }

    if (isset($result1) && $result1) $_SESSION['order']="huy";
    if (isset($result2) && $result2) $_SESSION['order']="chapnhan";
    if (isset($result3) && $result3) $_SESSION['order']="lienhe";
    if (isset($result4) && $result4) $_SESSION['order']="hoantat";

 ?>