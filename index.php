<?php session_start();?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trao đổi tài liệu</title>
	<link rel="stylesheet" type="text/css" href="Public/css/style.css">
	<script type="text/javascript">
		function signin() {
			document.getElementById('login').style = "display: none;";
			document.getElementById('signin').style = "display: block;";
			document.getElementById('forgot').style = "display: none;";
		}
		function login() {
			document.getElementById('login').style = "display: block;";
			document.getElementById('signin').style = "display: none;";
			document.getElementById('forgot').style = "display: none;";
		}
		function forgot() {
			document.getElementById('login').style = "display: none;";
			document.getElementById('signin').style = "display: none;";
			document.getElementById('forgot').style = "display: block;";
		}
	</script>
</head>
<body>

	<?php if(isset($_SESSION['incorrect']) && $_SESSION['incorrect']) {
		                
		echo "<script>
			alert(\"Đăng nhập thất bại! Xin thử lại!\");
			                
		</script>"; 
			             
		unset($_SESSION['incorrect']); 
		}
		if(isset($_SESSION['username_exist']) && $_SESSION['username_exist']) {
		                
		echo "<script>
			alert(\"Tên tài khoản đã tồn tại! Đăng ký thất bại!\");
			signin();                
		</script>"; 
			             
		unset($_SESSION['username_exist']); 
		}
		if(isset($_SESSION['sucess']) && $_SESSION['sucess']) {
		                
		echo "<script>
			alert(\"Đăng ký thành công!!\");
			signin();                
		</script>"; 
			             
		unset($_SESSION['sucess']); 
		}
	?>

	<div id="footer">
		<div id="footer-logo">
			<img src="Public/images/logo ctu.png">
		</div>
		<div id="footer-text">
			<b>KHOA CÔNG NGHỆ THÔNG TIN VÀ TRUYỀN THÔNG - ĐẠI HỌC CẦN THƠ</b><br>
			Khu 2 - Đường 3/2 - Q.Ninh Kiều - TP.Cần Thơ<br>
			Học phần: Niên luận cơ sở mạng máy tính và truyền thông - CT226<br>
			Sinh viên thực hiện: Nguyễn Minh Luân - ĐT: 0378 367 310 - Email: luanb1807648@student.ctu.edu.vn
		</div>
	</div>

	<div id="main">
		

		

		<div id="content">
						
			<div id="login">
				<div class="form">
					<form method="POST" action="Form/login.php">
						<h1 style="margin-top: 130px; margin-left: 120px;">Đăng nhập</h1>
						<div class="input-box"><input class="form-input" type="text" name="username" id="username"  placeholder="Tên đăng nhập hoặc email" maxlength="32" required></div>
						<div class="input-box"><input class="form-input" type="password" name="password" id="password" placeholder="●●●●●●●●" maxlength="32" required></div>
						<div class="input-box"><input class="form-input" type="submit" name="submit" value="Đăng nhập" id="submit-button"></div>
					</form>

				</div>

				<div class="a-box"><a id="forgotpass" onclick="forgot()">Quên mật khẩu?</a></div>
				<div class="a-box"><a id="newaccount" onclick="signin()">Đăng ký tài khoản mới</a></div>
				<div class="a-box"><a id="terms">Điều khoản sử dụng</a></div>
			</div>



			<div id="signin">
				<div class="form">
					<form method="POST" action="form/signin.php">
						<div class="button-box">
							<div class="button" onclick="login()">X</div>
							<div class="button">?</div>
						</div>
						<h1 style="margin-top: 40px; margin-left: 120px;">Đăng ký</h1>
						
						<div class="input-box">
							<input class="form-input" type="text" name="new-surname" id="new-surname"  placeholder="Họ của bạn" maxlength="12" required style="width: 80px;">
							<input class="form-input" type="text" name="new-name" id="new-name"  placeholder="Tên của bạn" maxlength="32" required style="width: 100px; margin-left: 20px;" title="Bao gồm tên đệm và tên.">
						</div>
						
						<div class="input-box">
							<input class="form-input" type="text" name="new-username" id="new-username"  placeholder="Tên đăng nhập" maxlength="32" required title="Bắt đầu bằng 1 kí tự và không chứa khoảng trắng.">
						</div>
						<div class="input-box">
							<input class="form-input" type="text" name="new-mail" id="new-mail"  placeholder="Địa chỉ email" maxlength="32" required title="Địa chỉ email của bạn.">
						</div>
						<div class="input-box">
							<input class="form-input" type="password" name="new-password" id="new-password" placeholder="Mật khẩu" maxlength="32" required title="Gồm 8-16 kí tự, phải chứa: chữ hoa, chữ thường, số, kí tự đặc biệt và không trùng tên đăng nhập.">
						</div>
						<div class="input-box">
							<input class="form-input" type="password" name="new-repassword" id="new-repassword" placeholder="Nhập lại mật khẩu" maxlength="32" required title="Nhập lại mật khẩu phía trên.">
						</div>
						<div id="checkbox" style="margin-left: 120px; margin-right: 120px;">
							<input type="checkbox" name="terms" required title="Vui lòng đọc kỹ điều khoản trước khi đăng ký." >
							<label for="terms" style="font-size: 14px;">Tôi đồng ý với những điều khoản và chính sách khi đăng ký.</label>
						</div>
						<div class="input-box">
							<input class="form-input" type="submit" name="submit" value="Đăng ký" id="submit-button">
						</div>
					</form>
				</div>					
			</div>

			<div id="forgot">
				<div class="form">
					<form method="POST" action="###">
						<div class="button-box">
							<div class="button" onclick="login()">X</div>
							
						</div>
						<h1 style="margin-top: 80px; margin-left: 120px;">Quên mật khẩu</h1>
						<div class="input-box">
							<input class="form-input" type="text" name="f-username" id="f-username"  placeholder="Tên đăng nhập" maxlength="32" required>
						</div>
						<div class="input-box">
							<input class="form-input" type="text" name="f-email" id="f-email"  placeholder="Email" maxlength="32" required>
						</div>

						<div class="input-box">
							<input class="form-input" type="password" name="f-password" id="f-password" placeholder="Mật khẩu mới" maxlength="32" required title="Gồm 8-16 kí tự, phải chứa: chữ hoa, chữ thường, số, kí tự đặc biệt và không trùng tên đăng nhập.">
						</div>
						<div class="input-box">
							<input class="form-input" type="password" name="f-repassword" id="f-repassword" placeholder="Nhập lại mật khẩu" maxlength="32" required title="Nhập lại mật khẩu phía trên.">
						</div>
						<div class="input-box">
							<div style=" height: 35px; position: absolute; margin-left: 240px; margin-top: 3.5px;">
								<img src="Public/images/mail-button.png" style="width: 50px; height: 25px; cursor: pointer;">
							</div>
							<input class="form-input" type="text" name="f-code" id="f-code"  placeholder="Mã xác minh" maxlength="6" required style="width: 80px;">						
						</div>						
						<div class="input-box">
							<input class="form-input" type="submit" name="submit" value="Xác nhận" id="submit-button">
						</div>
					</form>	
				</div>
			</div>

		</div>
	</div>

</body>
</html>