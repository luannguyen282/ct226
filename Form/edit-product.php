<?php 
    session_start();
    require 'conn.php';
    echo $m = $_POST['matailieu'];
    $dsh = mysqli_query($con, "SELECT * FROM `hinhtailieu` WHERE `hinhtailieu`.`matailieu` = $m;");
    if (isset($_POST['delete'])) {
        mysqli_query($con, "DELETE FROM `tailieu` WHERE `tailieu`.`matailieu` = $m");
    }
    if (isset($_POST['unlock'])) {
        if(mysqli_num_rows($dsh)!=0)
            mysqli_query($con,"UPDATE `tailieu` SET `matrangthai` = 'sharing' WHERE `tailieu`.`matailieu` = $m;");
        else
            $_SESSION['unlock_fail']=true;
    }
    if (isset($_POST['lock'])) {
        mysqli_query($con,"UPDATE `tailieu` SET `matrangthai` = 'lock' WHERE `tailieu`.`matailieu` = $m;");
    }
    if (isset($_POST['edit'])) {
        $m = $_POST['matailieu'];
        $t = $_POST['t'];
        $hp = $_POST['hp'];
        $kh = $_POST['kh'];
        $tg = $_POST['tg'];
        $ml = $_POST['ml'];
        $st = $_POST['st'];
        $cl = $_POST['cl'];
        $mt = $_POST['mt'];
        if ($_POST['ht']==0) {
            $g=0;
        }else $g=$_POST['g'];
       $sql = "UPDATE `tailieu` SET `tentailieu` = '$t', `hocphan` = '$hp', `makhoa` = '$kh', `tacgia` = '$tg', `sotrang` = '$st', `maloai` = '$ml', `chatluong` = '$cl', `gia` = '$g', `mota` = '$mt' WHERE `tailieu`.`matailieu` = $m;";
       $r = mysqli_query($con, $sql);

       $dir = "C:\\xampp\htdocs\CT226\Database\photo/";
   for ($i=1; $i <=3 ; $i++) { 
        echo $tf = 'pp'.$i;
    if (isset($_FILES['pp'.$i])) {
        $file = $_FILES['pp'.$i];
        print_r($file);
        echo "Error: ".$file['error'];
        if ($file['error']==0) {
            $pp_tmp = $file['tmp_name'];
            $sql = "SELECT MAX(`mahinh`) as mh FROM `hinhtailieu`;";
            $htl = mysqli_fetch_array(mysqli_query($con, $sql)); 
            $mh = $htl['mh']+=1;
            $pp_name = $mh.".".pathinfo($file['name'],PATHINFO_EXTENSION);
            if (getimagesize($pp_tmp) !== false) {
                if (move_uploaded_file($file['tmp_name'], $dir.$pp_name)) { 
                    if(isset($_POST['mh'.$i]))                       
                        mysqli_query($con, "UPDATE `hinhtailieu` SET `mahinh` = '$mh', `tenhinh` = '$pp_name' WHERE `hinhtailieu`.`mahinh` = ".$_POST['mh'.$i].";");
                    
                    else mysqli_query($con, "INSERT INTO `hinhtailieu` (`mahinh`, `tenhinh`, `matailieu`) VALUES ('$mh', '$pp_name', '$m');");
                    }else{
                        $_SESSION['e_error_pp']=true;
                        $_SESSION['e_error']=true;
                        echo "lưu thất bại";
                        }
                }else {
                    $_SESSION['e_error_not_img']=true;
                    $_SESSION['e_error']=true;
                    echo "not img";
                    }
            }else{
                $_SESSION['e_error_upload']=true;
                $_SESSION['e_error']=true;
                echo "upload fail";
            }
        }else echo "noisset";
        }
    }
    header("Location: ../Public/info.php");
 ?>