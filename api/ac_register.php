<?php 
    session_start();
    include '../connect.php';
    $sql = $conn->query("SELECT email FROM tb_user WHERE email='".$_REQUEST['email']."' ");
    if($sql->num_rows <= 0) {
        $sql_insert = $conn->query("INSERT INTO tb_user(email, password, fname, lname, user_role) VALUES('".$_REQUEST['email']."','".md5($_REQUEST['password'])."','".$_REQUEST['fname']."','".$_REQUEST['lname']."',2) ");
        if($sql_insert) {
            $_SESSION['success'] = "สมัครสมาชิกสำเร็จ";
            header("Location: ../login.php");
        }else{
            echo $conn->error;
        }
    }else{
        $_SESSION['error'] = "Email นี้มีบัญชีอยู่ในระบบแล้ว กรุณาเข้าสู่ระบบหรือใช้ Email อื่น";
        header("Location: ../register.php");
    }
?>