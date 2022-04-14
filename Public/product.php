<?php 
	session_start(); 
	include_once('../Form/conn.php');
	$matailieu = $_GET['matailieu'];
	$sql = "SELECT * FROM `tailieu` WHERE `matailieu` = ".$matailieu.";";
	$tl = mysqli_query($con, $sql);
	$tailieu = mysqli_fetch_array($tl);
	$sql = "SELECT * FROM `nguoidung` WHERE `username` LIKE '".$tailieu['username']."';";
	$user = mysqli_query($con, $sql);
	$nguoidung = mysqli_fetch_array($user);
	$sql = "SELECT * FROM `tailieu` WHERE `username` LIKE '".$nguoidung['username']."';";
	$stl = mysqli_query($con, $sql);
	$sl = mysqli_num_rows($stl);
	if (isset($_SESSION['taodonhang']) && $_SESSION['taodonhang']) {
		echo "<script>if(confirm('Đã yêu cầu trao đổi. Xem ngay?')) location.assign('order.php');</script>";
		unset($_SESSION['taodonhang']);
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trao đổi tài liệu</title>
	<link rel="stylesheet" type="text/css" href="css/product.css">
	<script type="text/javascript" src="js/product.js"></script>
	<script type="text/javascript" src="js/alert.js"></script>
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>

</head>
<body>
	
	<div id="sub-menu">
		<ul>
			<li id="smenu-6"><a href="../index.php" style="color: blue;">Đăng xuất</a></li>
			<li id="smenu-5"><a href="">Hỗ trợ</a></li>
			<li id="smenu-4"><a href="">Thông tin liên hệ</a></li>			
			<li id="smenu-3"><a href="">Điều khoản</a></li>
			<li id="smenu-2"><a href="">Hướng dẫn sử dụng</a></li>
			<li id="smenu-1"><a href="">Giới thiệu website</a></li>
		</ul>
	</div>

	<div id="header">
		<a href="home.php"><img src="images/banner.png"></a>
		<div id="search">
			<form action="home.php">
				<div id="search-box">
					<input type="text" name="search-input" id="search-input" placeholder="Nhập từ khoá cần tìm...">
					<button type="submit"><img src="images/search-button.png"></button>
					
				</div>
			</form>
		</div>
		<div id="header-button-box" >
			<a href="cart.php">
				<div class="button-container">
					<svg fill="none" viewBox="0 0 24 24" size="40" class="header-button" color="textSecondary" height="40" width="40" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M3 3.75C3 3.33579 3.33579 3 3.75 3H6.00033C6.41455 3 6.75033 3.33579 6.75033 3.75V6.00035H18.7522C18.9832 6.00035 19.2012 6.10676 19.3434 6.28879C19.4855 6.47083 19.5358 6.7082 19.4798 6.93225L17.9796 12.9331C17.8961 13.267 17.5961 13.5012 17.252 13.5012H6.75033V14.2516C6.75033 14.4505 6.82937 14.6413 6.97007 14.782C7.11076 14.9227 7.30158 15.0018 7.50055 15.0018H19.5023C19.9165 15.0018 20.2523 15.3376 20.2523 15.7518C20.2523 16.166 19.9165 16.5018 19.5023 16.5018H7.50055C6.90376 16.5018 6.33141 16.2647 5.90941 15.8427C5.48741 15.4207 5.25033 14.8483 5.25033 14.2516V12.7544C5.25033 12.7534 5.25033 12.7523 5.25033 12.7512C5.25033 12.7502 5.25033 12.7491 5.25033 12.748V6.75355C5.25033 6.75249 5.25033 6.75142 5.25033 6.75035C5.25033 6.74929 5.25033 6.74822 5.25033 6.74715V4.5H3.75C3.33579 4.5 3 4.16421 3 3.75ZM6.75033 7.50035V12.0012H16.6664L17.7916 7.50035H6.75033ZM6.0006 19.5024C6.0006 18.6739 6.67222 18.0023 7.50071 18.0023C8.3292 18.0023 9.00082 18.6739 9.00082 19.5024C9.00082 20.3309 8.3292 21.0025 7.50071 21.0025C6.67222 21.0025 6.0006 20.3309 6.0006 19.5024ZM18.0021 18.0023C17.1736 18.0023 16.502 18.6739 16.502 19.5024C16.502 20.3309 17.1736 21.0025 18.0021 21.0025C18.8306 21.0025 19.5022 20.3309 19.5022 19.5024C19.5022 18.6739 18.8306 18.0023 18.0021 18.0023Z" fill="#82869E">
								
						</path>
					</svg>
				<span class="button-title">Đánh dấu</span>
			</div>
			</a>
			<a href="order.php">
				<div class="button-container">
					<svg fill="none" viewBox="0 0 24 24" size="40" class="header-button" color="textSecondary" height="40" width="40" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M7.5328 3.5625C7.5328 3.14829 7.86859 2.8125 8.2828 2.8125H15.2308C15.645 2.8125 15.9808 3.14829 15.9808 3.5625V3.80501H19.201C19.6152 3.80501 19.951 4.14079 19.951 4.55501V20.4361C19.951 20.8503 19.6152 21.1861 19.201 21.1861H4.3125C3.89829 21.1861 3.5625 20.8503 3.5625 20.4361V4.55501C3.5625 4.14079 3.89829 3.80501 4.3125 3.80501H7.5328V3.5625ZM15.9808 7.53276V5.30501H18.451V19.6861H5.0625V5.30501H7.5328V7.53276C7.5328 7.94698 7.86859 8.28276 8.2828 8.28276H10.0198C10.434 8.28276 10.7698 7.94698 10.7698 7.53276C10.7698 7.30843 11.0628 6.87111 11.7568 6.87111C12.4508 6.87111 12.7438 7.30843 12.7438 7.53276C12.7438 7.94698 13.0796 8.28276 13.4938 8.28276H15.2308C15.645 8.28276 15.9808 7.94698 15.9808 7.53276ZM9.0328 4.3125V6.78276H9.41784C9.7871 5.89836 10.7889 5.37111 11.7568 5.37111C12.7247 5.37111 13.7265 5.89836 14.0957 6.78276H14.4808V4.3125H9.0328ZM15.4476 12.0333C15.7405 11.7404 15.7405 11.2655 15.4476 10.9726C15.1547 10.6797 14.6798 10.6797 14.3869 10.9726L11.0384 14.3211L9.80564 13.0883C9.51275 12.7954 9.03787 12.7954 8.74498 13.0883C8.45209 13.3812 8.45209 13.8561 8.74498 14.149L10.5081 15.9121C10.6487 16.0527 10.8395 16.1318 11.0384 16.1318C11.2373 16.1318 11.4281 16.0527 11.5688 15.9121L15.4476 12.0333Z" fill="#82869E">
								
						</path>
					</svg>
				<span class="button-title">Đang trao đổi</span>
			</div>
			</a>
			<a href="info.php">
				<div class="button-container">
					<svg fill="none" viewBox="0 0 24 24" size="40" class="header-button" color="textSecondary" height="40" width="40" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 13.9895 4.18351 15.8194 5.32851 17.2676C5.58317 16.4856 6.12054 15.8107 6.85621 15.3914L8.76361 14.2968C8.1448 13.5615 7.772 12.6122 7.772 11.5759V9.83689C7.772 7.50167 9.66479 5.60889 12 5.60889C14.3349 5.60889 16.229 7.50139 16.229 9.83689V11.5759C16.229 12.6132 15.8554 13.5631 15.2354 14.2986L17.1437 15.3908L17.1444 15.3912C17.8805 15.8106 18.4173 16.4856 18.6716 17.2674C19.8165 15.8192 20.5 13.9894 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM10.0133 15.3091C10.6056 15.6249 11.2819 15.8039 12 15.8039C12.7169 15.8039 13.3922 15.6255 13.984 15.3106L16.3999 16.6934L16.4013 16.6942C16.9789 17.0231 17.3365 17.6396 17.3365 18.3075V18.6164C16.8532 19.0067 16.3263 19.3451 15.7642 19.6232C14.9127 19.9671 13.6909 20.2625 12.0005 20.2625C10.3078 20.2625 9.08478 19.9663 8.23289 19.6217C7.67189 19.3439 7.14595 19.006 6.6635 18.6164V18.3075C6.6635 17.6402 7.0216 17.0234 7.59965 16.6942L7.6018 16.693L10.0133 15.3091ZM13.4184 13.9069C14.2043 13.428 14.729 12.5631 14.729 11.5759V9.83689C14.729 8.33038 13.5071 7.10889 12 7.10889C10.4932 7.10889 9.272 8.3301 9.272 9.83689V11.5759C9.272 12.5628 9.79594 13.4273 10.5809 13.9062C10.6523 13.9484 10.7542 14.0035 10.8812 14.0593C11.1657 14.1842 11.5558 14.3035 12.0005 14.3035C12.445 14.3035 12.8341 14.1846 13.1176 14.0602C13.2451 14.0042 13.3472 13.9489 13.4184 13.9069ZM2 12C2 14.9959 3.31741 17.684 5.40452 19.5168L5.42841 19.5438C5.49553 19.6189 5.59114 19.7182 5.71841 19.8332C5.97322 20.0636 6.35385 20.3562 6.88471 20.6435C7.10268 20.7615 7.34486 20.878 7.6128 20.9888C8.93735 21.6364 10.4262 22 12 22C13.5724 22 15.06 21.6371 16.3837 20.9905C16.6532 20.8792 16.8968 20.7621 17.1159 20.6435C17.6466 20.3561 18.0271 20.0635 18.2819 19.8331C18.4091 19.7181 18.5047 19.6187 18.5718 19.5437L18.5956 19.5167C20.6826 17.6839 22 14.9958 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12Z" fill="#82869E">
								
						</path>
					</svg>
				<span class="button-title"><?php $nd=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `nguoidung` WHERE `username` LIKE '".$_SESSION['username']."';")); echo $nd['ten'] ?></span>
			</div>
			</a>
			<a href="">
				<div class="button-container">
					<svg fill="none" viewBox="0 0 24 24" class="header-button" size="40" color="textSecondary" height="40" width="40" xmlns="http://www.w3.org/2000/svg"><path d="M5.99398 13V9C5.99398 5.686 8.68298 3 12 3C12.7883 2.99961 13.569 3.15449 14.2975 3.4558C15.0259 3.75712 15.6879 4.19897 16.2456 4.75612C16.8033 5.31327 17.2458 5.97481 17.5479 6.70298C17.8499 7.43115 18.0056 8.21168 18.006 9V13C18.006 13.986 18.454 14.919 19.223 15.537L19.532 15.785C20.449 16.521 19.928 18 18.752 18H5.24798C4.07198 18 3.55098 16.521 4.46798 15.785L4.77698 15.537C5.15686 15.2322 5.46344 14.846 5.67408 14.4069C5.88472 13.9678 5.99404 13.487 5.99398 13V13Z" stroke="#82869E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.5 21H13.5" stroke="#82869E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
				<span class="button-title">Thông báo</span>
			</div>
		</a>	
		</div>
	</div>



	<div id="main">
		
		<div id="left">

			<div id="pro-photo-container">
				<?php 
					$sql = "SELECT * FROM `hinhtailieu` WHERE `matailieu` = ".$matailieu.";";
					$htl = mysqli_query($con, $sql); 
					$c=0;
					while($hinhtailieu = mysqli_fetch_array($htl)){
						$c++;
				?>
				<div class="pro-photo-show" id="pps<?php echo $c;?>">
					<img src="../Database/photo/<?php echo $hinhtailieu['tenhinh'];?>" style="width: inherit; height: inherit;">
				</div>
				<?php } ?>
				<div id="pro-photo-button-container">
					<?php 
						$sql = "SELECT * FROM `hinhtailieu` WHERE `matailieu` = ".$matailieu.";";
						$htl = mysqli_query($con, $sql); 
						$c=0;
						while($hinhtailieu = mysqli_fetch_array($htl)){
						$c++;
					 ?>
					 	<div  class="pro-photo-button" id="ppb<?php echo $c; ?>" onclick="ppb<?php echo $c; ?>()">
							<img src="../Database/photo/<?php echo $hinhtailieu['tenhinh'];?>" style="width: inherit; height: inherit;">
						</div>
					<?php } ?>
					
					
				</div>
			</div>
		</div>

		<div id="center">
			<div id="info-header">
				<div id="marker">
				
				</div>
				<h3>Thông tin chi tiết</h3>
			</div>
			<div id="info">
				<p><span>Tên:  </span> <?php echo $tailieu['tentailieu']; ?></p>
				<p><span>Học phần:  </span><?php echo $tailieu['hocphan']; ?></p>
				<p><span>Khoa:  </span><?php
					$khoa = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `khoa` WHERE `makhoa` LIKE '".$tailieu['makhoa']."';"));
					echo $khoa['tenkhoa'];
				 ?></p>
				<p><span>Tác giả:  </span><?php echo $tailieu['tacgia']; ?></p>
				<p><span>Loại tài liệu:  </span><?php
					$loaitailieu = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `loaitailieu` WHERE `maloai` LIKE '".$tailieu['maloai']."';"));
					echo $loaitailieu['tenloai'];
				 ?></p>
				<p><span>Số trang:  </span><?php echo $tailieu['sotrang']; ?> trang</p>
				<p><span>Chất lượng:  </span><?php echo $tailieu['chatluong']; ?>%</p>
				<p><span>Mô tả: </span><?php echo $tailieu['mota']; ?></p>
				<p><span>Giá: </span><?php echo $tailieu['gia']; ?> VNĐ</p>
			</div>
			<?php if($tailieu['matrangthai']=='sharing' && $tailieu['username']!=$_SESSION['username']){ ?>
			<div class="pro-button">
				<form method="GET" action="../Form/exchange.php">
					<input type="hidden" name="matailieu" value="<?php echo $matailieu; ?>">
					<input type="button" class="button-1" id="b3" name="add-to-cart" value="Đánh dấu" onclick="addToCart(<?php echo $matailieu; ?>);">
					<input type="button" class="button-2" id="b2" name="submit" value="Trao đổi ngay" onclick="<?php if ($_SESSION['user_valid']==false) echo "updateInfo();"; else echo "fexchange()"; ?>">
					<input type="submit" name="exchange" id="exchange" value="exchange" class="hidden">			
				</form>
			</div>
			<div id="cart<?php echo $matailieu;?>" class="hidden">
				<form method="GET" action="../Form/add-to-cart.php" id="form<?php echo $matailieu;?>">
					<input type="text" name="matailieu" value="<?php echo $matailieu; ?>">
					<input type="button" name="cart" id="cart<?php echo $matailieu; ?>">
				</form>
			</div>
			<?php } ?>					
		</div>

		<div id="right">
			<h3>THÔNG TIN NGƯỜI ĐĂNG</h3>
			<div id="avatar-container">
				<img src="../Database/avatar/<?php echo $nguoidung['hinhdaidien']; ?>">				
			</div>
			<div id="seller">
				<div class="name"><?php echo $nguoidung['ho']." ".$nguoidung['ten']; ?></div>
				<p><span>Khoa: </span><?php
					$khoa = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `khoa` WHERE `makhoa` LIKE '".$nguoidung['makhoa']."';"));
					echo $khoa['tenkhoa'];
				 ?></p>
				<p><span>Khoá: </span><?php echo $nguoidung['k']; ?></p>
				<p><span>Tài liệu đã đăng: </span><?php echo $sl; ?></p>
				<p><span>Liên hệ: </span>Facebook, Zalo, Gmail</p>
				<p><span>Địa chỉ: </span><?php echo $nguoidung['diachi']; ?></p>
			</div>
			
			<div id="seller-button">
				<form action="seller.php" method="POST">
					<input type="hidden" name="username" value="<?php echo $nguoidung['username']; ?>">
					<input type="submit" class="button-2" id="more-info" name="seller-info" value="Xem tài liệu">
				</form>
			</div>
		
		</div>		


	</div>




	<div id="footer">
		<div id="footer-logo">
			<img src="images/logo ctu.png">
		</div>
		<div id="footer-text">
			<b>KHOA CÔNG NGHỆ THÔNG TIN VÀ TRUYỀN THÔNG - ĐẠI HỌC CẦN THƠ</b><br>
			Khu 2 - Đường 3/2 - Q.Ninh Kiều - TP.Cần Thơ<br>
			Học phần: Niên luận cơ sở mạng máy tính và truyền thông - CT226<br>
			Sinh viên thực hiện: Nguyễn Minh Luân - ĐT: 0378 367 310 - Email: luanb1807648@student.ctu.edu.vn
		</div>
	</div>
</body>
</html>