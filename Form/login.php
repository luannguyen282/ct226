<?php
    session_start();
    require 'conn.php';
    if(isset($_POST['username']) && isset($_POST['password'])) {

        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $password = md5($password);
       $check = "SELECT * FROM taikhoan WHERE `username`='".$username."' AND `password`='".$password."'";
   
       $result = mysqli_query($con, $check);
       if(mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['page']=1;
            header("Location: ../Public/home.php");
        } else {

            header("Location: ../index.php");
            $_SESSION['incorrect'] = true;
        }
        $con->close();
        
    }

?>
