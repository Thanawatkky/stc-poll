<?php 
    session_start();
    include '../connect.php';
    $sql = $conn->query("SELECT * FROM tb_user WHERE email='".$_REQUEST['email']."' ");
    if($sql->num_rows <= 0) {
        $_SESSION['error'] = "Email ไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง";
        header("Location: ../login.php");
    }else{
        $fet = $sql->fetch_object();
        if(md5($_REQUEST['password']) == $fet->password) {
            
            $_SESSION['user_id'] = $fet->user_id;

            if($fet->user_role == 1) {
                header("Location: ../admin/index.php");
            }else{
                header("Location: ../index.php");
            }
        }else{
            $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง";
            header("Location: ../login.php");
        }
    }
?>