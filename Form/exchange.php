<?php 
	session_start();
    require 'conn.php';

    $tailieu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `tailieu` WHERE `matailieu` = '".$_GET['matailieu']."';"));
    $nguoimua=$_SESSION['username'];
    $nguoiban=$tailieu['username'];
    if($nguoimua!=$nguoiban){$max=mysqli_fetch_array(mysqli_query($con, "SELECT MAX(`madonhang`) as `max` FROM `donhang`;"));
        $madonhang=$max['max']+1;
        $result1=mysqli_query($con, "INSERT INTO `donhang` (`madonhang`, `manguoimua`, `manguoiban`, `matailieu`) VALUES ('$madonhang', '$nguoimua', '$nguoiban', '".$_GET['matailieu']."');");
        $result2=mysqli_query($con, "INSERT INTO `chitietdonhang` (`madonhang`, `dathang`, `chapnhan`, `lienhe`, `huy`, `hoantat`) VALUES ('$madonhang', (SELECT CURRENT_TIMESTAMP), NULL, NULL, NULL, NULL);");
        	if ($result1 && $result2) {
        		$_SESSION['taodonhang']=true;
        	}else $_SESSION['taodonhang']=false;}

   header("Location: ../Public/home.php");
   $con->close();
 ?>