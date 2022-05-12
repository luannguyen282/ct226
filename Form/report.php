<?php 
	session_start();
    require 'conn.php';

    $loai=$_GET['loai'];
    $ntc=$_GET['ntc'];
    $mota=$_GET['mota'];
    $max = mysqli_fetch_array(mysqli_query($con, "SELECT MAX(`ma`) as `max` FROM `gopyvakhieunai`;"));
	    echo $ma=$max['max']+1;

    if($loai=='tcnd' || $loai=='tctl'){
	    $dtbtc=$_GET['dtbtc'];

	    if($loai=='tctl'){
	    	echo $sql = "INSERT INTO `gopyvakhieunai` (`ma`, `username`, `loai`, `manguoidung`, `matailieu`, `mota`) VALUES ($ma, '$ntc', '$loai', NULL, '$dtbtc', '$mota');";
	    }else{
	    	echo $sql = "INSERT INTO `gopyvakhieunai` (`ma`, `username`, `loai`, `manguoidung`, `matailieu`, `mota`) VALUES ($ma, '$ntc', '$loai', '$dtbtc', NULL, '$mota');";
	    }
	}else{

		
	    echo $sql = "INSERT INTO `gopyvakhieunai` (`ma`, `username`, `loai`, `manguoidung`, `matailieu`, `mota`) VALUES ($ma, '$ntc', '$loai', NULL, NULL, '$mota');";
	    
	}
	$result1=mysqli_query($con, $sql);
	$result2=mysqli_query($con, "INSERT INTO `chitietgyvkn` (`ma`, `dagui`, `xuli`, `ketqua`) VALUES ($ma, NULL, NULL, NULL);");
	if ($result1 && $result2) {
		echo "Thành công";
	}else echo "Thất bại";
	if ($loai=='tcnd' || $loai=='tctl') $_SESSION['rp']="Cảm ơn đã gửi tố cáo!";
	else $_SESSION['rp']="Cảm ơn đã gửi góp ý và khiếu nại!";
	header("Location: ../Public/home.php");
 ?>