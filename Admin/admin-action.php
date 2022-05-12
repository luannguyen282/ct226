<?php 
	session_start();
    require '../Form/conn.php';
    //Quản lí người dùng
    if(isset($_GET['cb1'])){
    	$users=mysqli_query($con,"SELECT `username`,`role`,`trangthai` FROM `taikhoan`;");
	    while($user=mysqli_fetch_array($users)){
	    	$username=$user['username'];
	    	$tt=$user['trangthai'];
	    	if (isset($_GET[$user['username']]) && $user['role']==2 && $tt<=3) {
	    		$tt++;
	    		$r1=mysqli_query($con,"UPDATE `taikhoan` SET `trangthai` = '$tt' WHERE `taikhoan`.`username` = '$username';");
	    		$r2=mysqli_query($con,"INSERT INTO `thongbao` (`username`, `thoigian`, `noidung`) VALUES ('$username', current_timestamp(), 'Bạn vừa bị cảnh cáo. Tổng số lần bị cảnh cáo: $tt. Nếu bị cảnh cáo quá 3 lần tài khoản sẽ bị khoá!');");
	    	}
	    	if (isset($_GET['d-'.$user['username']]) && $user['role']==2 && $tt>0) {
	    		$tt--;
	    		$r1=mysqli_query($con,"UPDATE `taikhoan` SET `trangthai` = '$tt-1' WHERE `taikhoan`.`username` = '$username';");
	    		$r2=mysqli_query($con,"INSERT INTO `thongbao` (`username`, `thoigian`, `noidung`) VALUES ('$username', current_timestamp(), 'Bạn vừa được gỡ cảnh cáo. Tổng số lần bị cảnh cáo: $tt. Nếu bị cảnh cáo quá 3 lần tài khoản sẽ bị khoá!');");
	    	}
	    }
	    if ($r1 && $r2) header("Location: ../Admin/admin.php?cb1=");
    }
    //Quản lí tài liệu
    if (isset($_GET['cb2'])) {
    	$docs=mysqli_query($con,"SELECT `matailieu`,`matrangthai`,`username` FROM `tailieu` WHERE `matrangthai`='sharing';");
    	while($doc=mysqli_fetch_array($docs)){
    		$mtl=$doc['matailieu'];
    		$username=$doc['username'];
    		if (isset($_GET[$mtl]) && $_GET[$mtl]='on') {
    			$r1=mysqli_query($con,"UPDATE `tailieu` SET `matrangthai` = 'lock' WHERE `tailieu`.`matailieu` = $mtl;");
    			$r2=mysqli_query($con,"INSERT INTO `thongbao` (`username`, `thoigian`, `noidung`) VALUES ('$username', current_timestamp(), 'Tài liệu của bạn vừa bị tố cáo và được tạm ẩn. Bạn có thể kiểm tra lại thông tin và bỏ ẩn trong danh sách tạm ẩn ở trang hồ sơ.');");    		
    		}
    	}
    	if ($r1 && $r2) header("Location: ../Admin/admin.php?cb2=");
    }
 ?>