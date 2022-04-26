<?php 
	session_start();
    require 'conn.php';
    $_SESSION['error']=false;
    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $khoa = $_POST['khoa'];
    $k = $_POST['k'];
    $phone = $_POST['phone'];
    $fb = $_POST['fb'];
    $zl = $_POST['zl'];
    $gm = $_POST['gm'];
    $dc = $_POST['diachi'];
    $dir = "C:\\xampp\htdocs\CT226\Database\avatar/";
     $_SESSION['error']=false;

    echo $sql1 = "UPDATE `nguoidung` SET `ho`='".$ho."',`ten`='".$ten."',`k`='".$k."',`makhoa`='".$khoa."',`diachi`='".$dc."' WHERE `username` LIKE '".$_SESSION['username']."';";
    echo $sql2 = "UPDATE `lienhe` SET `facebook`='".$fb."',`zalo`='".$zl."',`gmail`='".$gm."',`phone`='".$phone."' WHERE `username` LIKE '".$_SESSION['username']."';";

    if (mysqli_query($con, $sql1)==false) {
        $_SESSION['error_info']=true;
        $_SESSION['error']=true;
        echo "sql1 thất bại";
    }
    if ($result=mysqli_query($con, $sql2)==false) {
        $_SESSION['error_info']=true;
        $_SESSION['error']=true;
        echo "sql2 thất bại";
    }
 

    if (isset($_POST['edit-info'])) {
        $file = $_FILES['avatar'];
        echo $file['error'];
        if ($file['error']==0) {
            $avatar_tmp = $file['tmp_name'];
            $avatar_name = md5($_SESSION['username']).".".pathinfo($file['name'],PATHINFO_EXTENSION);
            if (getimagesize($avatar_tmp) !== false) {
                if (move_uploaded_file($file['tmp_name'], $dir.$avatar_name)) {
                    
                    if (mysqli_query($con, "UPDATE `nguoidung` SET `hinhdaidien`='".$avatar_name."' WHERE `username` LIKE '".$_SESSION['username']."';")) {
                        echo "cập nhật thành công";
                        $_SESSION['user_valid']=true;
                    }else echo "cập nhật thất bại";
                }else  {
                    $_SESSION['error_avatar']=true;
                    $_SESSION['error']=true;
                    echo "lưu thất bại";
                    }
            }else  {
                $_SESSION['error_not_img']=true;
                $_SESSION['error']=true;
                echo "not img";
                }
        }else{
            $_SESSION['error_upload']=true;
            $_SESSION['error']=true;
            echo "upload fail";
        }
    }
    header("Location: ../Public/info.php");
    echo $sql1.$sql2;
    $con->close();
 ?>