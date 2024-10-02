<?php 
    session_start();
    include '../connect.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'add':
                $sql = $conn->query("SELECT * FROM tb_poll WHERE p_section='".$_REQUEST['p_section']."' ");
                if($sql->num_rows <= 0) {
                    $sql_insert = $conn->query("INSERT INTO tb_poll(p_section,p_detail) VALUES('".$_REQUEST['p_section']."','".$_REQUEST['p_detail']."') ");
                    if($sql_insert) {
                        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
                        header("Location: ../admin/index.php?p=poll_manage");
                    }else{
                        echo $conn->error;
                    }
                }else{
                    $_SESSION['error'] = "มีหัวข้อแบบสอบถามดังกล่าวอยู่ในระบบแล้ว!";
                    header("Location: ../admin/index.php?p=add_poll");
                }
                break;
                case 'edit':
                    $sql = $conn->query("UPDATE tb_poll SET p_section='".$_REQUEST['p_section']."', p_detail='".$_REQUEST['p_detail']."' WHERE p_id='".$_REQUEST['p_id']."' ");
                    if($sql) {
                        $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
                        header("Location: ../admin/index.php?p=poll_manage");
                    }else{
                        echo $conn->error;
                    }
                    break;
                    case 'del':
                        $sql = $conn->query("DELETE FROM tb_poll WHERE p_id='".$_REQUEST['p_id']."' ");
                        if($sql) {
                            $_SESSION['success'] = "ลบข้อมูลสำเร็จ";
                            header("Location: ../admin/index.php?p=poll_manage");
                        }else{
                            echo $conn->error;
                        }
                        break;
                    case 'add_semi':
                        $sql = $conn->query("INSERT INTO tb_semi_poll(se_header, se_description, se_choice, se_section) VALUES('".$_REQUEST['se_header']."','".$_REQUEST['se_description']."','".$_REQUEST['se_choice']."','".$_REQUEST['se_section']."')");
                        if($sql) {
                            $_SESSION['success'] = "สร้างคำตอบสำเร็จ";
                            header("Location: ../admin/index.php?p=semi_poll");
                        }else{
                            echo $conn->error;
                        }
                        break;
                    case 'result':
                            $choice = $_REQUEST['choice'];
                        $sql = $conn->query("INSERT INTO tb_result(res_point, res_section, res_user) VALUES('".$choice."','".$_REQUEST['res_section']."','".$_SESSION['user_id']."') ");
                        if($sql) {
                            $_SESSION['success'] = "ส่งคำตอบสำเร็จ";
                            header("Location: ../index.php");
                        }else{
                            echo $conn->error;
                        }
                        break;
        }
    }
?>