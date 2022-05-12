<?php 
	session_start();
	include_once('../Form/conn.php');
	if(empty($_SESSION['username'])) header("Location: ../index.php");
	$sql = "SELECT * FROM `nguoidung` WHERE `username` LIKE '".$_SESSION['username']."';";
	$user = mysqli_query($con, $sql);
	$nguoidung = mysqli_fetch_array($user);
	$sql = "SELECT * FROM `tailieu` WHERE `username` LIKE '".$nguoidung['username']."';";
	$stl = mysqli_query($con, $sql);
	$sl = mysqli_num_rows($stl);
	if(isset($_SESSION['error']) && $_SESSION['error']){
		$error="Chú ý: ";
		if(isset($_SESSION['error_info']) && $_SESSION['error_info']){
		$error=$error."Cập nhật thông tin thất bại!\\n";
		}else $error=$error."Cập nhật ảnh đại diện thất bại\\nChi tiết:";;
		if(isset($_SESSION['error_upload']) && $_SESSION['error_upload']){
		$error=$error."\\n  + Không có ảnh hoặc upload ảnh thất bại!";
		unset($_SESSION['error_upload']);		
		}
		if(isset($_SESSION['error_not_img']) && $_SESSION['error_not_img']){
		$error=$error."\\n  + Tệp tải lên không hợp lệ!";	
		unset($_SESSION['error_not_img']);	
		}
		if(isset($_SESSION['error_avatar']) && $_SESSION['error_avatar']){
		$error=$error."\\n  + Lưu trữ ảnh thất bại!";
		unset($_SESSION['error_avatar']);		
		}
		echo "<script>alert('".$error."');</script>";
		unset($_SESSION['error']);
	}else{
		if(isset($_SESSION['error']) && $_SESSION['error']==false) {
			unset($_SESSION['error']);
			echo "<script>alert('Cập nhật thông tin thành công!');</script>";
		}
	}
	if(isset($_SESSION['a_error']) && $_SESSION['a_error']){
		$error="Chú ý: ";
		if(isset($_SESSION['a_error_sql']) && $_SESSION['a_error_sql']){
		$error=$error."Thêm tài liệu thất bại!\\n";
		}else $error=$error."Thêm ảnh tài liệu thất bại\\n--> Tài liệu này sẽ được lưu ở mục Tạm khoá!\\nChi tiết:";;
		if(isset($_SESSION['a_error_upload']) && $_SESSION['a_error_upload']){
		$error=$error."\\n  + Không có ảnh hoặc upload ảnh thất bại!";
		unset($_SESSION['a_error_upload']);		
		}
		if(isset($_SESSION['a_error_not_img']) && $_SESSION['a_error_not_img']){
		$error=$error."\\n  + Tệp tải lên không hợp lệ!";	
		unset($_SESSION['a_error_not_img']);	
		}
		if(isset($_SESSION['a_error_pp']) && $_SESSION['a_error_pp']){
		$error=$error."\\n  + Lưu trữ ảnh thất bại!";
		unset($_SESSION['a_error_pp']);		
		}
		echo "<script>alert('".$error."');</script>";
		unset($_SESSION['a_error']);
	}else{
		if(isset($_SESSION['a_error']) && $_SESSION['a_error']==false) {
			echo "<script>alert('Cập nhật thông tin tài liệu thành công!');</script>";
			unset($_SESSION['a_error']);
		}
	}
	if (isset($_SESSION['unlock_fail']) && $_SESSION['unlock_fail']) {
		echo "<script>alert('Bỏ ẩn tài liệu thất bại!\\nChi tiết: Tài liệu chưa có ảnh không được phép hiển thị!');</script>";
		unset($_SESSION['unlock_fail']);
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trao đổi tài liệu</title>
	<link rel="stylesheet" type="text/css" href="css/info.css">
	<script type="text/javascript" src="js/info.js"></script>
	<script type="text/javascript" src="js/alert.js"></script>
</head>
<body>
	
		<div id="coat" onclick="button_off();"></div>
	
	<div id="sub-menu">
		<ul>
			<li id="smenu-6"><a href="../Form/logout.php" style="color: blue;">Đăng xuất</a></li>
			<li id="smenu-5" onclick="click_object('smsb-5');"><a>Góp ý và khiếu nại</a><form action="report.php"><input type="submit" class="hidden" id="smsb-5" name="loai" value="gykn"></form></li>
			<li id="smenu-4"><a onclick="report('not_valid');">Tố cáo</a></li>			
			<li id="smenu-3"><a href="policies.html">Điều khoản</a></li>
			<li id="smenu-2"><a href="tutorial.html">Hướng dẫn sử dụng</a></li>
			<li id="smenu-1"><a href="introduce.html">Giới thiệu website</a></li>
		</ul>
	</div>

	<div id="header">
		<a href="home.php"><img src="images/banner.png"></a>
		<div id="search">
			<form>
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
				<span class="button-title"><?php $nd=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `nguoidung` WHERE `username` = '".$_SESSION['username']."';")); echo $nd['ten'] ?></span>
			</div>
			</a>
			<a id="button-noti" onclick="noti();">
				<div class="button-container">
					<svg fill="none" viewBox="0 0 24 24" class="header-button" size="40" color="textSecondary" height="40" width="40" xmlns="http://www.w3.org/2000/svg"><path d="M5.99398 13V9C5.99398 5.686 8.68298 3 12 3C12.7883 2.99961 13.569 3.15449 14.2975 3.4558C15.0259 3.75712 15.6879 4.19897 16.2456 4.75612C16.8033 5.31327 17.2458 5.97481 17.5479 6.70298C17.8499 7.43115 18.0056 8.21168 18.006 9V13C18.006 13.986 18.454 14.919 19.223 15.537L19.532 15.785C20.449 16.521 19.928 18 18.752 18H5.24798C4.07198 18 3.55098 16.521 4.46798 15.785L4.77698 15.537C5.15686 15.2322 5.46344 14.846 5.67408 14.4069C5.88472 13.9678 5.99404 13.487 5.99398 13V13Z" stroke="#82869E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.5 21H13.5" stroke="#82869E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
				<span class="button-title">Thông báo</span>
			</div>

			<div id="noti">
				<ul>
					<?php $notis=mysqli_query($con,"SELECT * FROM `thongbao` WHERE `username`='".$_SESSION['username']."'"); 
						
						$now = time();
						while($noti=mysqli_fetch_array($notis)){
							date_default_timezone_set('Asia/Ho_Chi_Minh');
   							 

					?>
					<li><span class="noti-time"><?php 
						$time=$now-strtotime($noti['thoigian']); 
						if($time/(24*60*60) > 1) echo floor($time/(24*60*60))." ngày trước: ";
						else{
							if($time/(60*60) > 1) echo floor($time/(60*60))." giờ trước: ";
								else echo floor($time/60)." phút trước: ";
							}
					?></span><span class="noti-text"><?php echo $noti['noidung']; ?></span></li>
					<?php } ?>
				</ul>
				<div class="noti-but-con" <?php if(mysqli_num_rows($notis)==0) echo "style=\"display: none;\""; ?>>
					<input type="submit" class="button-2" name="readall" value="Đã đọc hết" onclick="readall();">
				</div>
				<?php if(mysqli_num_rows($notis)==0) echo "<div class=\"noti-no\">Không có thông báo mới!</div>"; ?>
			</div>
		</a>	
		</div>
	</div>



	<div id="main">
		
		<div id="left">	
			<h3>THÔNG TIN NGƯỜI DÙNG</h3>
			
			<div id="seller-1">
				<div id="avatar-container">
					<img src="../Database/avatar/<?php echo $nguoidung['hinhdaidien']; ?>">				
				</div>
				<div id="seller">
					<div class="name"><?php echo $nguoidung['ho']." ".$nguoidung['ten']; ?></div>
					<p><span>Khoa: </span><?php
						$kh = mysqli_query($con, "SELECT * FROM `khoa` WHERE `makhoa` LIKE '".$nguoidung['makhoa']."';");
						if (mysqli_num_rows($kh)!=0) {
							$khoa = mysqli_fetch_array($kh);
							echo $khoa['tenkhoa'];
						}
					 ?></p>
					<p><span>Khoá: </span><?php echo $nguoidung['k']; ?></p>
					<p><span>Tài liệu đã đăng: </span><?php echo $sl; ?></p>
					<p><span>Liên hệ: </span></p>
					<?php $lienhe = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `lienhe` WHERE `username` LIKE '".$_SESSION['username']."';")) ?>
					<p class="subp"><span>SĐT: </span><?php echo $lienhe['phone']; ?></p>
					<p class="subp"><span>Facebook: </span><?php echo $lienhe['facebook']; ?></p>
					<p class="subp"><span>Zalo: </span><?php echo $lienhe['zalo']; ?></p>
					<p class="subp"><span>Gmail: </span><?php echo $lienhe['gmail']; ?></p>
					<p><span>Địa chỉ: </span><?php echo $nguoidung['diachi']; ?></p>
				</div>
				<div id="but-container">
					<input type="button" class="button-2" name="edit-info" value="Chỉnh sửa" onclick="editInfo();">
				</div>
			</div>
			<div id="seller-2" style="display: none;">
				<form action="../form/change-info.php" method="POST" enctype="multipart/form-data">
				<div id="avatar-container">
						<img src="../Database/avatar/<?php if($nguoidung['hinhdaidien']==NULL) echo "avatar.png"; else echo $nguoidung['hinhdaidien']; ?>">
						<input type="file" name="avatar" id="avatar" style="display: none;">
						
						<div id="change-avatar" onclick="changeAvatar();">
							<div id="svg-container">
								
									<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 viewBox="0 0 487 487" style="enable-background:new 0 0 487 487;" xml:space="preserve">
									
											<path d="M308.1,277.95c0,35.7-28.9,64.6-64.6,64.6s-64.6-28.9-64.6-64.6s28.9-64.6,64.6-64.6S308.1,242.25,308.1,277.95z
												 M440.3,116.05c25.8,0,46.7,20.9,46.7,46.7v122.4v103.8c0,27.5-22.3,49.8-49.8,49.8H49.8c-27.5,0-49.8-22.3-49.8-49.8v-103.9
												v-122.3l0,0c0-25.8,20.9-46.7,46.7-46.7h93.4l4.4-18.6c6.7-28.8,32.4-49.2,62-49.2h74.1c29.6,0,55.3,20.4,62,49.2l4.3,18.6H440.3z
												 M97.4,183.45c0-12.9-10.5-23.4-23.4-23.4c-13,0-23.5,10.5-23.5,23.4s10.5,23.4,23.4,23.4C86.9,206.95,97.4,196.45,97.4,183.45z
												 M358.7,277.95c0-63.6-51.6-115.2-115.2-115.2s-115.2,51.6-115.2,115.2s51.6,115.2,115.2,115.2S358.7,341.55,358.7,277.95z" fill="white"/>
									
									</svg>
							</div>
						</div>	
								
					</div>

				<div id="seller">
					<div class="name">Họ: <input type="text" name="ho" value="<?php echo $nguoidung['ho'] ?>" size="3" required> Tên: <input type="text" name="ten" value="<?php echo $nguoidung['ten'] ?>" size="6"  required></div>
					<p><span>Khoa: </span><select name="khoa">
						<?php 
							$dsk = mysqli_query($con, "SELECT * FROM `khoa`;");
							while($dskhoa = mysqli_fetch_array($dsk)){
						 ?>
						 <option <?php if($dskhoa['makhoa']==$nguoidung['makhoa']) echo "selected";?> value="<?php echo $dskhoa['makhoa']; ?>"><?php echo $dskhoa['tenkhoa']; ?></option>
						<?php } ?>
						</select>
					</p>
					<p><span>Khoá: </span><input type="text" name="k" id="k" size="1" <?php if($nguoidung['k']==NULL) echo "placeholder=\"vd: 44\""; else echo "value=\"".$nguoidung['k']."\""; ?>></p>
					<p><span>Tài liệu đã đăng: </span><?php echo $sl; ?></p>
					<p><span>Liên hệ: </span></p>
					<?php $lienhe = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `lienhe` WHERE `username` LIKE '".$_SESSION['username']."';")) ?>
					<p class="subp"><span>SĐT: </span><input type="text" name="phone" <?php if($lienhe['phone']==NULL) echo "placeholder=\"Số điện thoại của bạn.\""; else echo "value=\"".$lienhe['phone']."\""; ?>></p>
					<p class="subp"><span>Facebook: </span><input type="text" name="fb" <?php if($lienhe['facebook']==NULL) echo "placeholder=\"Địa chỉ Facebook của bạn.\""; else echo "value=\"".$lienhe['facebook']."\""; ?>></p>
					<p class="subp"><span>Zalo: </span><input type="text" name="zl" <?php if($lienhe['zalo']==NULL) echo "placeholder=\"Sđt Zalo của bạn.\""; else echo "value=\"".$lienhe['zalo']."\""; ?>></p>
					<p class="subp"><span>Gmail: </span><input type="text" name="gm" value="<?php echo $lienhe['gmail'] ?>"></p>
					<p><span>Địa chỉ: </span><input type="text" name="diachi" <?php if($nguoidung['diachi']==NULL) echo "placeholder=\"Ví dụ: KTX B, Đại học Cần Thơ\""; else echo "value=\"".$nguoidung['diachi']."\""; ?>></p>
				</div>
				<div id="but-container">
					<input type="button" class="button-1" name="edit-info-cancel" value="Huỷ thay đổi" onclick="editInfoC();">
					<input type="submit" class="button-2" name="edit-info" value="Lưu thay đổi">
				</div>
			</div>
			</form>
		</div>
		<div id="right">
			<ul id="tag">
				<li id="li1" onclick="sharing(); page('first','a');">Đang chia sẻ</li>
				<li id="li2" onclick="shared(); page('first','b');">Đã chia sẻ</li>
				<li id="li3" onclick="exchanging(); page('first','c');">Đang trao đổi</li>
				<li id="li4" onclick="lock(); page('first','d');">Tạm ẩn</li>
			</ul>
			<div id="seller-pro">
				<div id="sharing">
					
					<div class="product" id="add-new-1">
						<button id="but-add-new" onclick="<?php if ($_SESSION['user_valid']==false) echo "updateInfo();"; else echo "addPro();"; ?>">Thêm tài liệu</button>			
					</div>
					<form method="POST" action="../Form/new-product.php" enctype="multipart/form-data">
						<div class="product" id="add-new-2">
							<div class="new-pro-photo-container">
								<input type="file" id="pp1" name="pp1" class="add-pro-photo">
								<input type="file" id="pp2" name="pp2" class="add-pro-photo">
								<input type="file" id="pp3" name="pp3" class="add-pro-photo">
								<img src="../Database/photo/no_image.png" id="pps1" class="new-pro-photo" onclick="addProPhoto(1);">
								<img src="../Database/photo/no_image.png" id="pps2" class="new-pro-photo" onclick="addProPhoto(2);">
								<img src="../Database/photo/no_image.png" id="pps3" class="new-pro-photo" onclick="addProPhoto(3);">
							</div>
							<div class="pro-info">
							<div class="pro-name"><p>Tên:</p><input type="text" name="t" required></div>
							<div class="pro-name"><p>Học phần:</p><input type="text" name="hp" size="3" required></div>
							<div class="pro-name"><p>Khoa: </p><select name="kh" style="padding: 2px;">
								<?php 
									$dsk = mysqli_query($con, "SELECT * FROM `khoa`;");
									while($dskhoa = mysqli_fetch_array($dsk)){
								 ?>
								 <option value="<?php echo $dskhoa['makhoa']; ?>"><?php echo $dskhoa['tenkhoa']; ?></option>
								<?php } ?>
								</select></div>
							<div class="pro-name"><p>Tác giả:</p><input type="text" name="tg" required></div>
							<div class="pro-name"><p>Loại tài liệu: </p><select name="ml">
								<?php 
									$ltl = mysqli_query($con, "SELECT * FROM `loaitailieu`;");
									while($dsltl = mysqli_fetch_array($ltl)){
								 ?>
								 <option value="<?php echo $dsltl['maloai']; ?>"><?php echo $dsltl['tenloai']; ?></option>
								<?php } ?>
								</select></div>
							<div class="pro-name"><p>Số trang:</p><input type="number" name="st" min="1" max="9999" required> trang</div>
							<div class="pro-name"><p>Chất lượng:</p><input type="number" name="cl" min="1" max="100" required> %</div>
							<div class="pro-name"><p>Mô tả:</p><input type="text" name="mt" required></div>
							<div class="pro-name"><p>Hình thức: </p><input type="radio" name="ht" value="0" onclick="radio1();" class="radio1" checked> Tặng<input type="radio" name="ht" value="1" onclick="radio2();" class="radio2"> Bán</div>
							<div class="pro-name" id="new-pro-price"><p>Giá:</p><input type="number" name="g" min="1000" max="999999"  step="1000"> vnđ</div>
							<div class="pro-button" style="margin-top: 20px;">
								<input type="button" class="button-1" value="Huỷ bỏ" onclick="addProC();">
								<input type="submit" class="button-2" name="submit" value="Thêm tài liệu">
							</div>	
							</div>
						</div>			
					</form>
					
					<?php 
						$sql = "SELECT * FROM `tailieu` WHERE `matrangthai` LIKE 'sharing' AND `username` LIKE '".$_SESSION['username']."';";
						$tailieu = mysqli_query($con, $sql);
						$pid=0;
						while($dstl = mysqli_fetch_array($tailieu)){
							
							$matailieu = $dstl['matailieu'];
							$hinh = mysqli_query($con, "SELECT * FROM `hinhtailieu` WHERE `matailieu` = ".$matailieu.";");
							$tenhinh = mysqli_fetch_array($hinh);
							$pid+=1;
						?>	
							
								<form method="POST" action="../Form/edit-product.php">
									<div class="product" id="product-a<?php echo $pid;?>" <?php if($pid>2) echo "style=\"display: none;\""; ?>>
										<a href="../Public/product.php?matailieu=<?php echo $matailieu; ?>" >
											<div class="photo-container">
												<img src="../Database/photo/<?php echo $tenhinh['tenhinh']; ?>" style="width: 290px; height: 340px;">
											</div>
										</a>
										<div class="pro-info">
											<input type="text" name="matailieu" value="<?php echo $matailieu; ?>" style="display: none;">
											<div class="pro-name"><p>Tên:</p> <?php echo $dstl['tentailieu']; ?></div>
											<div class="pro-description"><p>Học phần:</p> <?php echo $dstl['hocphan']; ?></div>
											<div class="pro-quality"><p>Chất lượng:</p> <?php echo $dstl['chatluong']; ?>%</div>
											<div class="pro-price"><p>Giá:</p> <?php echo $dstl['gia']; ?> vnđ</div>
											<div class="pro-button">
												<input type="submit" class="button-1" name="lock" value="Tạm ẩn">
												<input type="button" class="button-2" value="Chỉnh sửa" onclick="editProa(<?php echo $pid; ?>);">
											</div>	
										</div>
										
									</div>
								</form>
								<form method="POST" action="../Form/edit-product.php" enctype="multipart/form-data">
									<div class="product" id="product-aE<?php echo $pid; ?>" style="display: none;">
										<div class="new-pro-photo-container">
											<input type="file" id="ppe1" name="pp1" class="add-pro-photo">
											<input type="file" id="ppe2" name="pp2" class="add-pro-photo">
											<input type="file" id="ppe3" name="pp3" class="add-pro-photo">
											<?php 
												$dsh = mysqli_query($con, "SELECT * FROM `hinhtailieu` WHERE `matailieu` = ".$dstl['matailieu'].";");
												$c=0;
												while($htl=mysqli_fetch_array($dsh)){
													$c++;

													echo "<img src=\"../Database/photo/".$htl['tenhinh']."\" id=\"pps$c\" class=\"new-pro-photo\" onclick=\"addProPhoto('e".$c."');\">";
													echo "<input type=\"hidden\" name=\"mh".$c."\" value=\"".$htl['mahinh']."\">";
												}
												while($c<3){
													$c++;
													echo "<img src=\"../Database/photo/no_image.png\" id=\"pps$c\" class=\"new-pro-photo\" onclick=\"addProPhoto('e".$c."');\">";
												}
											 ?>
												
										</div>
										<div class="pro-info">
										<input type="hidden" name="matailieu" value="<?php echo $dstl['matailieu']; ?>">
										<div class="pro-name"><p>Tên:</p><input type="text" name="t" value="<?php echo $dstl['tentailieu']; ?>" required></div>
										<div class="pro-name"><p>Học phần:</p><input type="text" name="hp" size="3" value="<?php echo $dstl['hocphan']; ?>" required></div>
										<div class="pro-name"><p>Khoa: </p><select name="kh" style="padding: 2px;">
											<?php 
												$dsk = mysqli_query($con, "SELECT * FROM `khoa`;");
												while($dskhoa = mysqli_fetch_array($dsk)){
											 ?>
											 <option value="<?php echo $dskhoa['makhoa']; ?>" <?php if($dskhoa['makhoa']==$dstl['makhoa']){echo "selected";} ?>><?php echo $dskhoa['tenkhoa']; ?></option>
											<?php } ?>
											</select></div>
										<div class="pro-name"><p>Tác giả:</p><input type="text" name="tg" value="<?php echo $dstl['tacgia']; ?>" required></div>
										<div class="pro-name"><p>Loại tài liệu: </p><select name="ml">
											<?php 
												$ltl = mysqli_query($con, "SELECT * FROM `loaitailieu`;");
												while($dsltl = mysqli_fetch_array($ltl)){
											 ?>
											 <option value="<?php echo $dsltl['maloai']; ?>" <?php if($dsltl['maloai']==$dstl['maloai']){echo "selected";} ?>><?php echo $dsltl['tenloai']; ?></option>
											<?php } ?>
											</select></div>
										<div class="pro-name"><p>Số trang:</p><input type="number" name="st" min="1" max="9999" value="<?php echo $dstl['sotrang']; ?>" required> trang</div>
										<div class="pro-name"><p>Chất lượng:</p><input type="number" name="cl" min="1" max="100" value="<?php echo $dstl['chatluong']; ?>" required> %</div>
										<div class="pro-name"><p>Mô tả:</p><input type="text" name="mt" value="<?php echo $dstl['mota']; ?>" required></div>
										<div class="pro-name"><p>Hình thức: </p><input type="radio" name="ht" value="0" onclick="eradio1();" class="radio1" <?php if($dstl['gia']==0){echo "checked";} ?>> Tặng<input type="radio" name="ht" value="1" onclick="eradio2();" class="radio2" <?php if($dstl['gia']!=0){echo "checked";} ?>> Bán</div>
										<div class="pro-name" id="edit-pro-price" <?php if ($dstl['gia']==0) echo "style=\"display: none;\""; ?>><p>Giá:</p><input type="number" name="g" min="0" max="999999" step="1000" value="<?php echo $dstl['gia']; ?>" > vnđ</div>
										<div class="pro-button" style="margin-top: 20px;">
											<input type="button" class="button-1" value="Huỷ bỏ" onclick="editProaC(<?php echo $pid; ?>);">
											<input type="submit" class="button-2" name="edit" value="Lưu thay đổi">
										</div>	
										</div>
									</div>			
								</form>
							
						<?php
						}
						echo "<script>sumpagea=$pid; currentpagea=1;</script>";
					?>

					<div class="page-num">
						<?php 
							if (mysqli_num_rows($tailieu) == 0) {
								echo "Bạn hiên không chia sẻ tài liệu nào cả!";
							}else{
								if(mysqli_num_rows($tailieu) > 3){
						 ?>
						<input type="button" class="page-num-button" name="first" value="<<" onclick="page('first','a');">
						<input type="button" class="page-num-button" name="pre" value="<" onclick="page('pre','a');">
						<input type="button" class="page-num-button" id="pagenuma" name="1" value="1">
						<input type="button" class="page-num-button" name="next" value=">" onclick="page('next','a');">
						<input type="button" class="page-num-button" name="last" value=">>" onclick="page('last','a');">
						<?php }} ?>
					</div>		
				</div>
				<div id="shared">
					<?php 
						$sql = "SELECT * FROM `tailieu` WHERE `matrangthai` LIKE 'shared' AND `username` LIKE '".$_SESSION['username']."';";
						$tailieu = mysqli_query($con, $sql);
						$pid=0;
						while($dstl = mysqli_fetch_array($tailieu)){
							$pid+=1;
							$matailieu = $dstl['matailieu'];
							$hinh = mysqli_query($con, "SELECT * FROM `hinhtailieu` WHERE `matailieu` = ".$matailieu.";");
							$tenhinh = mysqli_fetch_array($hinh);

						?>	
							
								<form method="POST" action="../Form/edit-product.php">
									<div class="product" id="product-b<?php echo $pid;?>" <?php if($pid>3) echo "style=\"display: none;\""; ?>>
										<a href="../Public/product.php?matailieu=<?php echo $matailieu; ?>" >
											<div class="photo-container">
												<img src="../Database/photo/<?php echo $tenhinh['tenhinh']; ?>" style="width: 290px; height: 340px;">
											</div>
										</a>	
										<div class="pro-info">
											<input type="text" name="matailieu" value="<?php echo $matailieu; ?>" style="display: none;">
											<div class="pro-name"><p>Tên:</p> <?php echo $dstl['tentailieu']; ?></div>
											<div class="pro-description"><p>Học phần:</p> <?php echo $dstl['hocphan']; ?></div>
											<div class="pro-quality"><p>Chất lượng:</p> <?php echo $dstl['chatluong']; ?>%</div>
											<div class="pro-price"><p>Giá:</p> <?php echo $dstl['gia']; ?> vnđ</div>
											<div class="pro-button">
												<input type="hidden" name="matailieu" value="<?php echo $matailieu; ?>">
												<input type="submit" class="button-1" id="button-remove" name="delete" value="Gỡ bỏ">
											</div>	
										</div>
										
									</div>
								</form>
							
						<?php
						}
						echo "<script>sumpageb=$pid; currentpageb=1;</script>";
					?>
					<div class="page-num">
						<?php 
							if (mysqli_num_rows($tailieu) == 0) {
								echo "Bạn chưa chia sẻ thành công tài liệu nào cả!";
							}else{
								if(mysqli_num_rows($tailieu) > 3){
						 ?>
						<input type="button" class="page-num-button" name="first" value="<<" onclick="page('first','b');">
						<input type="button" class="page-num-button" name="pre" value="<" onclick="page('pre','b');">
						<input type="button" class="page-num-button" id="pagenumb" name="1" value="1">
						<input type="button" class="page-num-button" name="next" value=">" onclick="page('next','b');">
						<input type="button" class="page-num-button" name="last" value=">>" onclick="page('last','b');">
						<?php }} ?>
					</div>	
				</div>
				<div id="exchanging">
					<?php 
						$sql = "SELECT * FROM `tailieu` WHERE `matrangthai` LIKE 'exchanging' AND `username` LIKE '".$_SESSION['username']."';";
						$tailieu = mysqli_query($con, $sql);
						$pid=0;
						while($dstl = mysqli_fetch_array($tailieu)){
							$pid++;
							$matailieu = $dstl['matailieu'];
							$hinh = mysqli_query($con, "SELECT * FROM `hinhtailieu` WHERE `matailieu` = ".$matailieu.";");
							$tenhinh = mysqli_fetch_array($hinh);

						?>	
							
								<form method="GET" action="../Public/order-detail.php">
									<div class="product" id="product-c<?php echo $pid; ?>" <?php if($pid>3) echo "style=\"display: none;\""; ?>>
										<a href="../Public/product.php?matailieu=<?php echo $matailieu; ?>" >
											<div class="photo-container">
												<img src="../Database/photo/<?php echo $tenhinh['tenhinh']; ?>" style="width: 290px; height: 340px;">
											</div>
										</a>
										<div class="pro-info">
											<?php $donhang = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `donhang` WHERE `matailieu`='$matailieu';")) ?>
											<input type="hidden" name="madonhang" value="<?php echo $donhang['madonhang']; ?>">
											<div class="pro-name"><p>Tên:</p> <?php echo $dstl['tentailieu']; ?></div>
											<div class="pro-description"><p>Học phần:</p> <?php echo $dstl['hocphan']; ?></div>
											<div class="pro-quality"><p>Chất lượng:</p> <?php echo $dstl['chatluong']; ?>%</div>
											<div class="pro-price"><p>Giá:</p> <?php echo $dstl['gia']; ?> vnđ</div>
											<div class="pro-button">
												<input type="hidden" name="user" value="nguoiban">
												<input type="submit" class="button-1" name="submit" value="Chi tiết">

											</div>	
										</div>
										
									</div>
								</form>
							
						<?php
						}
						echo "<script>sumpagec=$pid; currentpagec=1;</script>";
					?>
					<div class="page-num">
						<?php 
							if (mysqli_num_rows($tailieu) == 0) {
								echo "Bạn hiện đang không trao đổi tài liệu nào cả!";
							}else{
								if(mysqli_num_rows($tailieu) > 3){
						 ?>
						<input type="button" class="page-num-button" name="first" value="<<" onclick="page('first','c');">
						<input type="button" class="page-num-button" name="pre" value="<" onclick="page('pre','c');">
						<input type="button" class="page-num-button" id="pagenumc" name="1" value="1">
						<input type="button" class="page-num-button" name="next" value=">" onclick="page('next','c');">
						<input type="button" class="page-num-button" name="last" value=">>" onclick="page('last','c');">
						<?php }} ?>
					</div>	
				</div>
				<div id="lock">
					<?php 
						$sql = "SELECT * FROM `tailieu` WHERE `matrangthai` LIKE 'lock' AND `username` LIKE '".$_SESSION['username']."';";
						$tailieu = mysqli_query($con, $sql);
						$pid=0;
						while($dstl = mysqli_fetch_array($tailieu)){
							$pid++;
							$matailieu = $dstl['matailieu'];
							$hinh = mysqli_query($con, "SELECT * FROM `hinhtailieu` WHERE `matailieu` = ".$matailieu.";");
							$tenhinh = mysqli_fetch_array($hinh);
							

						?>	
							
							<form method="POST" action="../Form/edit-product.php">
								<div class="product" id="product-d<?php echo $pid; ?>" <?php if($pid>3) echo "style=\"display: none;\""; ?>>
									<div class="photo-container">
										<img src="../Database/photo/<?php if(mysqli_num_rows($hinh)!=0) {echo $tenhinh['tenhinh'];}else echo "no_image.png"; ?>" >
									</div>
									<div class="pro-info">
										<input type="hidden" name="matailieu" value="<?php echo $matailieu; ?>">
										<div class="pro-name"><p>Tên:</p> <?php echo $dstl['tentailieu']; ?></div>
										<div class="pro-description"><p>Học phần:</p> <?php echo $dstl['hocphan']; ?></div>
										<div class="pro-quality"><p>Chất lượng:</p> <?php echo $dstl['chatluong']; ?>%</div>
										<div class="pro-price"><p>Giá:</p> <?php echo $dstl['gia']; ?> vnđ</div>
										<div class="pro-button">
											<input type="submit" class="button-1" name="delete" value="Xoá">
											<input type="button" class="button-2" value="Sửa" onclick="editPro(<?php echo $pid; ?>);">
											<input type="submit" class="button-2" name="unlock" value="Bỏ ẩn">
										</div>	
									</div>
										
								</div>
							</form>
							
							<form method="POST" action="../Form/edit-product.php" enctype="multipart/form-data">
								<div class="product" id="product-dE<?php echo $pid; ?>" style="display: none;">
									<div class="new-pro-photo-container">
										<input type="file" id="ppee1" name="pp1" class="add-pro-photo">
										<input type="file" id="ppee2" name="pp2" class="add-pro-photo">
										<input type="file" id="ppee3" name="pp3" class="add-pro-photo">
										<?php 
											$dsh = mysqli_query($con, "SELECT * FROM `hinhtailieu` WHERE `matailieu` = ".$dstl['matailieu'].";");
											$c=0;
											while($htl=mysqli_fetch_array($dsh)){
												$c++;

												echo "<img src=\"../Database/photo/".$htl['tenhinh']."\" id=\"pps$c\" class=\"new-pro-photo\" onclick=\"addProPhoto('ee".$c."');\">";
												echo "<input type=\"hidden\" name=\"mh".$c."\" value=\"".$htl['mahinh']."\">";
											}
											while($c<3){
												$c++;
												echo "<img src=\"../Database/photo/no_image.png\" id=\"pps$c\" class=\"new-pro-photo\" onclick=\"addProPhoto('ee".$c."');\">";
											}
										 ?>
											
									</div>
									<div class="pro-info">
									<input type="hidden" name="matailieu" value="<?php echo $dstl['matailieu']; ?>">
									<div class="pro-name"><p>Tên:</p><input type="text" name="t" value="<?php echo $dstl['tentailieu']; ?>" required></div>
									<div class="pro-name"><p>Học phần:</p><input type="text" name="hp" size="3" value="<?php echo $dstl['hocphan']; ?>" required></div>
									<div class="pro-name"><p>Khoa: </p><select name="kh" style="padding: 2px;">
										<?php 
											$dsk = mysqli_query($con, "SELECT * FROM `khoa`;");
											while($dskhoa = mysqli_fetch_array($dsk)){
										 ?>
										 <option value="<?php echo $dskhoa['makhoa']; ?>" <?php if($dskhoa['makhoa']==$dstl['makhoa']){echo "selected";} ?>><?php echo $dskhoa['tenkhoa']; ?></option>
										<?php } ?>
										</select></div>
									<div class="pro-name"><p>Tác giả:</p><input type="text" name="tg" value="<?php echo $dstl['tacgia']; ?>" required></div>
									<div class="pro-name"><p>Loại tài liệu: </p><select name="ml">
										<?php 
											$ltl = mysqli_query($con, "SELECT * FROM `loaitailieu`;");
											while($dsltl = mysqli_fetch_array($ltl)){
										 ?>
										 <option value="<?php echo $dsltl['maloai']; ?>" <?php if($dsltl['maloai']==$dstl['maloai']){echo "selected";} ?>><?php echo $dsltl['tenloai']; ?></option>
										<?php } ?>
										</select></div>
									<div class="pro-name"><p>Số trang:</p><input type="number" name="st" min="1" max="9999" value="<?php echo $dstl['sotrang']; ?>" required> trang</div>
									<div class="pro-name"><p>Chất lượng:</p><input type="number" name="cl" min="1" max="100" value="<?php echo $dstl['chatluong']; ?>" required> %</div>
									<div class="pro-name"><p>Mô tả:</p><input type="text" name="mt" value="<?php echo $dstl['mota']; ?>" required></div>
									<div class="pro-name"><p>Hình thức: </p><input type="radio" name="ht" value="0" onclick="eradio1();" class="radio1" <?php if($dstl['gia']==0){echo "checked";} ?>> Tặng<input type="radio" name="ht" value="1" onclick="eradio2();" class="radio2" <?php if($dstl['gia']!=0){echo "checked";} ?>> Bán</div>
									<div class="pro-name" id="edit-pro-price" ><p>Giá:</p><input type="number" name="g" min="0" max="999999" step="1000" value="<?php echo $dstl['gia']; ?>" > vnđ</div>
									<div class="pro-button" style="margin-top: 20px;">
										<input type="button" class="button-1" value="Huỷ bỏ" onclick="editProC(<?php echo $pid; ?>);">
										<input type="submit" class="button-2" name="edit" value="Lưu thay đổi">
									</div>	
									</div>
								</div>			
							</form>
						<?php
						
						}
						echo "<script>sumpaged=$pid; currentpaged=1;</script>";
					?>
					<div class="page-num">
						<?php 
							if (mysqli_num_rows($tailieu) == 0) {
								echo "Danh sách tạm ẩn của bạn đang trống!";
							}else{
								if(mysqli_num_rows($tailieu) > 3){
						 ?>
						<input type="button" class="page-num-button" name="first" value="<<" onclick="page('first','d');">
						<input type="button" class="page-num-button" name="pre" value="<" onclick="page('pre','d');">
						<input type="button" class="page-num-button" id="pagenumd" name="1" value="1">
						<input type="button" class="page-num-button" name="next" value=">" onclick="page('next','d');">
						<input type="button" class="page-num-button" name="last" value=">>" onclick="page('last','d');">
						<?php }} ?>
					</div>	
				</div>
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
