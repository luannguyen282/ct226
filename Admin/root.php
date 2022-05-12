<?php 
	session_start();
    require '../Form/conn.php';
    $u=mysqli_fetch_array(mysqli_query($con,"SELECT `role` FROM `taikhoan` WHERE `username` = '".$_SESSION['username']."';"));
    if($u['role']!=0) {
    	unset($_SESSION['username']);
    	header("Location: ../index.php");
    }
    if (isset($_GET['submit'])) {
    	$users=mysqli_query($con, "SELECT `username`,`role` FROM `taikhoan`;");
    	while($user=mysqli_fetch_array($users)){
    		if ($user['role']!=0) {
    			mysqli_query($con,"UPDATE `taikhoan` SET `role` = '".$_GET[$user['username']]."' WHERE `taikhoan`.`username` = '".$user['username']."';");
    		}
    	}
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trao đổi tài liệu</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}

		h1{
			text-align: center;
			margin: 20px 0 20px 0;
			color: blue;
		}
		#tb{
			width: inherit;
			height: inherit;
			display: flex;
			justify-content: center;
		}
		table{
			border: 1px solid black;
			border-collapse: collapse;
		}
		th,td{
			border: 1px solid black;
			padding: 5px 7px 5px 7px;
		}
		th{
			text-align: center;
		}
		.button-container{
			margin-top: 20px;
			width: inherit;
			display: flex;
			justify-content: center;
		}
		.button{
			padding: 7px 10px 7px 10px;
			font-size: 16px;
			font-weight: bold;
			color: white;
			background: blue;
			border: none;
			border-radius: 2px;
			cursor: pointer;
		}
		.center{
			text-align: center;
		}
	</style>
</head>
<body>
	<form action="root.php">
		<h1>ROOT</h1>
		<div id="tb">
			<table>
			<th>STT</th>
			<th>username</th>
			<th>Vai trò</th>
			<th>Họ & tên</th>
			<th>Khoá</th>
			<th>Khoa</th>
			<th>Địa chỉ</th>
			<th>Số điện thoại</th>
			<th>Gmail</th>
			<th>Facebook</th>
			<th>Zalo</th>
			<?php 
				 $user=mysqli_query($con, "SELECT `taikhoan`.`username`,`ho`,`ten`,`k`,`makhoa`,`diachi`,`phone`,`gmail`,`facebook`,`zalo`,`role` FROM `nguoidung` INNER JOIN `lienhe` ON `nguoidung`.`username`=`lienhe`.`username` INNER JOIN `taikhoan` ON `nguoidung`.`username`=`taikhoan`.`username` ORDER BY `taikhoan`.`role`;");
				$stt=0;
				while($nguoidung=mysqli_fetch_array($user)){
					$stt++;
			 ?>

			 <tr>
			 	<td class="center"><?php echo $stt; ?></td>
			 	<td><?php echo $nguoidung['username'] ?></td>
			 	<td><?php if($nguoidung['role']==0) echo "Root"; else {
			 		?>
			 		<select name="<?php echo $nguoidung['username'] ?>">
				 		<option value="1" <?php if($nguoidung['role']==1) echo " selected"; ?>>Admin</option>
				 		<option value="2" <?php if($nguoidung['role']==2) echo " selected"; ?>>User</option>
				 	</select>
			 		<?php
			 	}?></td>
			 	<td><?php echo $nguoidung['ho']." ".$nguoidung['ten'] ?></td>
			 	<td class="center"><?php echo $nguoidung['k'] ?></td>
			 	<td><?php $khoa=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `khoa` WHERE `khoa`.`makhoa`='".$nguoidung['makhoa']."';")); if(isset($khoa['tenkhoa'])) echo $khoa['tenkhoa']; ?></td>
			 	<td><?php echo $nguoidung['diachi'] ?></td>
			 	<td><?php echo $nguoidung['phone'] ?></td>
			 	<td><?php echo $nguoidung['gmail'] ?></td>
			 	<td><?php echo $nguoidung['facebook'] ?></td>
			 	<td><?php echo $nguoidung['zalo'] ?></td>
			 </tr>

			<?php } ?>
		</table>
		</div>
		<div class="button-container">
			<input type="submit" class="button" name="submit" value="Lưu thay đổi">
		</div>
	</form>
</body>
</html>