<?php 
	session_start();
    require 'conn.php';
    $_SESSION['a_error']=false;
   $sql = "SELECT MAX(`matailieu`) as mmtl FROM `tailieu`;";
   $mmtl = mysqli_fetch_array(mysqli_query($con, $sql)); 
   $m = $mmtl['mmtl']+=1;
   $t = $_POST['t'];
   $hp = $_POST['hp'];
   $kh = $_POST['kh'];
   $tg = $_POST['tg'];
   $st = $_POST['st'];
   $ml = $_POST['ml'];
   $cl = $_POST['cl'];
   $ht = $_POST['ht'];
   $mt = $_POST['mt'];
   $username = $_SESSION['username'];
   if ($ht==0) {
   	$g=0;
   }else $g=$_POST['g'];

   echo $sql = "INSERT INTO `tailieu` (`matailieu`, `tentailieu`, `hocphan`, `makhoa`, `tacgia`, `sotrang`, `maloai`, `chatluong`, `gia`, `mota`, `username`, `matrangthai`) VALUES ('$m', '$t', '$hp', '$kh', '$tg', '$st', '$ml', '$cl', '$g', '$mt', '$username', 'sharing');";
   $result = mysqli_query($con, $sql);
   if ($result!=false) {
   	$dir = "C:\\xampp\htdocs\CT226\Database\photo/";
   for ($i=1; $i <=3 ; $i++) { 
   		echo $tf = 'pp'.$i;
   	if (isset($_FILES['pp'.$i])) {
        $file = $_FILES['pp'.$i];
        echo "Error: ".$file['error'];
        $counter=3;
        if ($file['error']==0) {
            $pp_tmp = $file['tmp_name'];
            $sql = "SELECT MAX(`mahinh`) as mh FROM `hinhtailieu`;";
			$htl = mysqli_fetch_array(mysqli_query($con, $sql)); 
			$mh = $htl['mh']+=1;
            $pp_name = $mh.".".pathinfo($file['name'],PATHINFO_EXTENSION);
            if (getimagesize($pp_tmp) !== false) {
                if (move_uploaded_file($file['tmp_name'], $dir.$pp_name)) {
                    echo "INSERT INTO `hinhtailieu` (`mahinh`, `tenhinh`, `matailieu`) VALUES ('$mh', '$pp_name', '$m');";
                    if (mysqli_query($con, "INSERT INTO `hinhtailieu` (`mahinh`, `tenhinh`, `matailieu`) VALUES ('$mh', '$pp_name', '$m');")) {
                        echo "cập nhật thành công";
                    }else echo "cập nhật thất bại";
                }else  {
                    $_SESSION['a_error_pp']=true;
                    $_SESSION['a_error']=true;
                    echo "lưu thất bại";
                    }
            }else  {
                $_SESSION['a_error_not_img']=true;
                $_SESSION['a_error']=true;
                echo "not img";
                }
        }else{
            $counter--;
        }
        if ($counter==0) {
            $_SESSION['a_error_upload']=true;
         $_SESSION['a_error']=true;
         echo "upload fail";
        }
        
    }else echo "noisset";
    echo "Thêm 1 hình tài liệu!";
   	}
   }else{
   	$_SESSION['a_error']=true;
   	$_SESSION['a_error_sql']=true;
   }
//   if (isset($_SESSION['a_error']) && $_SESSION['a_error']) {
    if($_FILES['pp1']['error']!=0 && $_FILES['pp2']['error']!=0 && $_FILES['pp3']['error']!=0){
   	echo "test";
   	echo "UPDATE `tailieu` SET `matrangthai` = 'lock' WHERE `tailieu`.`matailieu` = $m;";
   	mysqli_query($con,"UPDATE `tailieu` SET `matrangthai` = 'lock' WHERE `tailieu`.`matailieu` = $m;");
    $_SESSION['a_error_upload']=true;
    $_SESSION['a_error']=true;
   }
  
   header("Location: ../Public/info.php");
   $con->close();
 ?>