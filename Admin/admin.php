<?php 
	session_start();
    require '../Form/conn.php';
    $u=mysqli_fetch_array(mysqli_query($con,"SELECT `role` FROM `taikhoan` WHERE `username` = '".$_SESSION['username']."';"));
    if($u['role']!=1) {
    	unset($_SESSION['username']);
    	header("Location: ../index.php");
    }
    $check=0;
    for ($i=1; $i<=5 ; $i++) { 
    	
    	if (isset($_GET['cb'.$i])) {
    		$_SESSION['tab']=$i;
    		$check=1;
    	}  	
    }

    if ($check==0) $_SESSION['tab']=1;

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
		h3{
			text-align: center;
		}
		#c21{
			display: none;
		}
		#c22{
			display: none;
		}
		.h1{
			width: inherit;
			margin: 20px 0 20px 0;
			text-align: center;
			color: blue;
			cursor: pointer;
		}
		#menu{
			width: inherit;
			height: 38px;
			background: #3A454B;
		}
		#menu li{
			list-style: none;
			float: left;
			padding: 10px 15px 10px 15px;
			font-weight: bold;
			color: white;
			cursor: pointer;
		}
		.tb{
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
			text-align: center;
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
		
		.filter{
			width: inherit;
			text-align: center;
			margin: 15px;
		}
		.filter span{
			margin-left: 10px;
		}
		.filter input{
			margin: 0 5px 0 10px;
		}
		.filter-button{
			padding: 2px 10px 2px 10px;
			font-weight: bold;
		}
		.filter-input{
			padding: 2px 7px 2px 7px;
		}
	</style>
	<script type="text/javascript">
		function tab(num) {
			for(var i=1; i<=5; i++){
				if (i==num) {
					document.getElementById('m'+i).style='background: #FFAE00;';
					document.getElementById('c'+i).style='display: block';
				}
				else{
					document.getElementById('m'+i).style='background: #3A454B;';
					document.getElementById('c'+i).style='display: none;';
				}
			}
		}
		//tab(1);
	</script>
</head>
<body>
	<div class="h1" onclick="location.href = 'admin.php'"><h1>ADMIN</h1></div>
	<div id="menu">
		<ul>
			<li id="m1" onclick="tab(1);">Quản lý người dùng</li>
			<li id="m2" onclick="tab(2);">Quản lý tài liệu</li>
			<li id="m3" onclick="tab(3);">Tố cáo và khiếu nại</li>
			<li id="m4" onclick="tab(4);">Thư Góp ý</li>
			<li id="m5" onclick="tab(5);">Lịch sử giải quyết</li>
		</ul>
	</div>
	<div id="content">
		<div id="c1">
			<div class="h1"><h2>QUẢN LÝ NGƯỜI DÙNG</h2></div>
			<div class="filter">
				<form >
					<input type="text" class="filter-input" name="sc1"  placeholder="Nhập username">
					<input type="submit" class="filter-button" name="cb1" value="Tìm">
				</form>
			</div>
			<form action="admin-action.php">
				<div class="tb">
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
					<th>Số lần bị<br> cảnh cáo</th>
					<th>Cảnh cáo</th>
					<th>Gỡ bỏ 1 <br>cảnh cáo</th>
					<?php 
						$str1='';
						if (isset($_GET['sc1']) && $_GET['sc1']!=NULL) {
						$str1=" WHERE `taikhoan`.`username` LIKE '".$_GET['sc1']."'";
						//$_SESSION['tab']=1;
						}
						 $user=mysqli_query($con, "SELECT `taikhoan`.`username`,`ho`,`ten`,`k`,`makhoa`,`diachi`,`phone`,`gmail`,`facebook`,`zalo`,`role`,`trangthai` FROM `nguoidung` INNER JOIN `lienhe` ON `nguoidung`.`username`=`lienhe`.`username` INNER JOIN `taikhoan` ON `nguoidung`.`username`=`taikhoan`.`username` $str1 ORDER BY `taikhoan`.`role`;");
						$stt=0;
						while($nguoidung=mysqli_fetch_array($user)){
							$stt++;
					 ?>

					 <tr>
					 	<td ><?php echo $stt; ?></td>
					 	<td><?php echo $nguoidung['username'] ?></td>
					 	<td><?php if($nguoidung['role']==0) echo "Root"; else{if($nguoidung['role']==1) echo "Admin"; else echo "User";}?></td>
					 	<td><?php echo $nguoidung['ho']." ".$nguoidung['ten'] ?></td>
					 	<td ><?php echo $nguoidung['k'] ?></td>
					 	<td><?php $khoa=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `khoa` WHERE `khoa`.`makhoa`='".$nguoidung['makhoa']."';")); if(isset($khoa['tenkhoa'])) echo $khoa['tenkhoa']; ?></td>
					 	<td><?php echo $nguoidung['diachi'] ?></td>
					 	<td><?php echo $nguoidung['phone'] ?></td>
					 	<td><?php echo $nguoidung['gmail'] ?></td>
					 	<td><?php echo $nguoidung['facebook'] ?></td>
					 	<td><?php echo $nguoidung['zalo'] ?></td>
					 	<td ><?php echo $nguoidung['trangthai'] ?></td>
					 	<td ><?php if($nguoidung['role']==2) {?>
					 		<input type="checkbox" name="<?php echo $nguoidung['username'] ?>">
					 	<?php }?></td>
					 	<td ><?php if($nguoidung['role']==2) {?>
					 		<input type="checkbox" name="d-<?php echo $nguoidung['username'] ?>">
					 	<?php }?></td>
					 </tr>

					<?php } ?>

				</table>
				</div>
				<div class="button-container">
					<input type="submit" class="button" name="cb1" value="Lưu thay đổi">
				</div>
			</form>
		</div>
		<div id="c2">
			<div class="h1"><h2>QUẢN LÝ TÀI LIỆU</h2></div>
			<div class="filter">
				<form>
					<input type="text" class="filter-input" name="sc2"  placeholder="Nhập mã tài liệu">
					<input type="submit" class="filter-button" name="cb2" value="Tìm">
				</form>
			</div>
			<form action="admin-action.php">
				<div class="tb">
					<table>
						<th>Mã</th>
						<th>Tên tài liệu</th>
						<th>Học phần</th>
						<th>Loại</th>
						<th>Khoa</th>
						<th>Tác giả</th>
						<th>Số trang</th>
						<th>Chất lượng</th>
						<th>Giá</th>
						<th>Mô tả</th>
						<th>Người đăng</th>
						<th>Trạng thái</th>
						<th>Cảnh cáo và <br>ẩn tài liệu</th>
						<?php 
							$str2='';
							if (isset($_GET['sc2']) && $_GET['sc2']!=NULL) {
							$str2=" WHERE `tailieu`.`matailieu` = '".$_GET['sc2']."'";
							//$_SESSION['tab']=2;
							}
							$dstl=mysqli_query($con, "SELECT * FROM `tailieu` INNER JOIN `loaitailieu` ON `tailieu`.`maloai`=`loaitailieu`.`maloai` INNER JOIN `khoa` ON `tailieu`.`makhoa`=`khoa`.`makhoa` $str2 ORDER BY `matrangthai`,`tailieu`.`matailieu`");
							while($tl=mysqli_fetch_array($dstl)){?>
								<tr>
									<td ><?php echo $tl['matailieu'] ?></td>
									<td><?php echo $tl['tentailieu'] ?></td>
									<td ><?php echo $tl['hocphan'] ?></td>
									<td ><?php echo $tl['tenloai'] ?></td>
									<td><?php echo $tl['tenkhoa'] ?></td>
									<td><?php echo $tl['tacgia'] ?></td>
									<td ><?php echo $tl['sotrang'] ?></td>
									<td ><?php echo $tl['chatluong']."%" ?></td>
									<td ><?php echo $tl['gia'] ?></td>
									<td><?php echo $tl['mota'] ?></td>
									<td ><?php echo $tl['username'] ?></td>
									<td><?php if($tl['matrangthai']=='sharing') echo "Đang chia sẻ";
										if($tl['matrangthai']=='shared') echo "Đã chia sẻ";
										if($tl['matrangthai']=='exchanging') echo "Đang trao đổi";
										if($tl['matrangthai']=='lock') echo "Tạm ẩn";
										 ?></td>
										 <td >
										 	<?php if($tl['matrangthai']=="sharing") {?>
										 		<input type="checkbox" name="<?php echo $tl['matailieu'] ?>">
										 	<?php }?>
										 </td>
								</tr>
							<?php }
						 ?>
					</table>
				</div>
				<div class="button-container">
					<input type="submit" class="button" name="cb2" value="Lưu thay đổi">
				</div>
			</form>
		</div>
		<div id="c3">
			<div class="h1"><h2>TỐ CÁO VÀ KHIẾU NẠI</h2></div>
			<form>
				<div class="filter">
					<span>Lọc: </span>
					<select name="sc31">
						<option>Tất cả</option>
						<option>Thư tố cáo</option>
						<option>Thư khiếu nại</option>
					</select>
					<span>Sắp xếp theo: </span>
					<input type="checkbox" name="sc32"><label>Loại</label>
					<input type="checkbox" name="sc33"><label>Thời gian</label>
					<input type="checkbox" name="sc34"><label>Người gửi</label>
					<input type="submit" class="filter-button" name="cb3" value="Lọc">
				</div>
				<div class="tb">
					<table>
						<th>Mã</th>
						<th>Thời gian</th>
						<th>Loại</th>
						<th>Người gửi</th>
						<th>Mô tả</th>
						<th>Đối tượng</th>
						<th>Đã xử lí</th>
						<th>Kết quả</th>
						<th>Ghi chú</th>
						<?php 
							$str3='';
							if (isset($_GET['cb3'])) {
								if(isset($_GET['sc31'])){
									if($_GET['sc31']=="Thư tố cáo") $str3=" AND `gopyvakhieunai`.`loai` LIKE 'tc%'";
									else {
										if($_GET['sc31']=="Thư khiếu nại") $str3=" AND `gopyvakhieunai`.`loai` LIKE 'kn'";
									}
								}
								//$_SESSION['tab']=3;
							}
							
							$rp=mysqli_query($con, "SELECT DISTINCT * FROM `gopyvakhieunai` INNER JOIN `chitietgyvkn` ON `gopyvakhieunai`.`ma`=`chitietgyvkn`.`ma` WHERE `gopyvakhieunai`.`loai`!='gy' $str3;");
							while($rps=mysqli_fetch_array($rp)){?>
						<tr>
							<td ><?php echo $rps['ma']; ?></td>
							<td ><?php echo $rps['dagui']; ?></td>
							<td ><?php if($rps['loai']=="tctl") echo "Tố cáo tài liệu"; 
							else {
								if($rps['loai']=="tcnd") echo "Tố cáo người dùng";
								else echo "Khiếu nại";
							} ?></td>
							<td ><?php echo $rps['username'] ?></td>
							<td><?php echo $rps['mota'] ?></td>
							<td ><?php if($rps['manguoidung']!=null) echo "Người dùng: ".$rps['manguoidung']; else echo "Tài liệu: ".$rps['matailieu']  ?></td>
							<td ><input type="checkbox" name=""></td>
							<td><select>
								<option>Đã áp dụng cảnh cáo người dùng</option>
								<option>Tố cáo sai, không áp dụng phạt</option>
								<option>Khiếu nại được chấp nhận, cảnh cáo được gỡ bỏ</option>
								<option>Khiếu nại không được chấp nhận</option>
							</select></td>
							<td><input type="" name=""></td>
						</tr>
							<?php }
						 ?>
					</table>
				</div>
				<div class="button-container">
					<input type="submit" class="button" name="submit2" value="Lưu thay đổi">
				</div>
			</form>
		</div>
		<div id="c4">
			<div class="h1"><h2>THƯ GÓP Ý</h2></div>
			<?php 
				$rpg=mysqli_query($con, "SELECT DISTINCT * FROM `gopyvakhieunai` INNER JOIN `chitietgyvkn` ON `gopyvakhieunai`.`ma`=`chitietgyvkn`.`ma` WHERE `gopyvakhieunai`.`loai`='gy';");
				if (mysqli_num_rows($rpg)==0) {
					echo "<h3>Tất cả thư góp ý đã được đọc!</h3>";
				}else{
					 ?>
			<form>
				<div class="tb">
					<table>
						<th>Mã</th>
						<th>Thời gian</th>
						<th>Người gửi</th>
						<th>Nội dung</th>
						<th>Đã xử lí</th>
						<?php 
							
							while($rpgs=mysqli_fetch_array($rpg)){?>
						<tr>
							<td ><?php echo $rpgs['ma']; ?></td>
							<td ><?php echo $rpgs['dagui']; ?></td>
							<td ><?php echo $rpgs['username'] ?></td>
							<td><?php $rpgs['mota'] ?></td>
							<td ><input type="checkbox" name=""></td>
						</tr>
							<?php }
						 ?>
					</table>
				</div>
				<div class="button-container">
					<input type="submit" class="button" name="submit2" value="Lưu thay đổi">
				</div>
			</form>
		<?php } ?>
		</div>
		<div id="c5">
			<div class="h1"><h2>LỊCH SỬ GIẢI QUYẾT</h2></div>
			
				<div class="tb">
					<table>
						<th>Mã</th>
						<th>Đã gửi</th>
						<th>Đã xử lí</th>
						<th>Loại</th>
						<th>Người gửi</th>
						<th>Mô tả</th>
						<th>Đối tượng</th>
						<th>Kết quả</th>
						<?php 
							$rp=mysqli_query($con, "SELECT DISTINCT * FROM `gopyvakhieunai` INNER JOIN `chitietgyvkn` ON `gopyvakhieunai`.`ma`=`chitietgyvkn`.`ma` WHERE `chitietgyvkn`.`ketqua`!='';");
							while($rps=mysqli_fetch_array($rp)){?>
						<tr>
							<td ><?php echo $rps['ma']; ?></td>
							<td ><?php echo $rps['dagui']; ?></td>
							<td ><?php echo $rps['xuli'] ?></td>
							<td ><?php if($rps['loai']=="tctl") echo "Tố cáo tài liệu"; 
							else {
								if($rps['loai']=="tcnd") echo "Tố cáo người dùng";
								else {
									if($rps['loai']=='kn') echo "Khiếu nại";
									else echo "Góp ý";
								}
							} ?></td>
							<td ><?php echo $rps['username'] ?></td>
							<td><?php echo $rps['mota'] ?></td>
							<td ><?php if($rps['manguoidung']!=null) echo "Người dùng: ".$rps['manguoidung']; else echo "Tài liệu: ".$rps['matailieu']  ?></td>
							<td ><?php echo $rps['ketqua'];  ?></td>
							
							
						</tr>
							<?php }
						 ?>
					</table>
				</div>
				
			
		</div>
	</div>
	<?php 
		if (isset($_SESSION['tab'])) {
			//$_SESSION['tab']=1;
			echo "<script>tab(".$_SESSION['tab'].");</script>";
		}
	 ?>
</body>
</html>