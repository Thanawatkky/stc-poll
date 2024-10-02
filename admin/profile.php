<?php 
    $sql = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
    $fet = $sql->fetch_object();
?>
<div class="content-profile">
    <div class="logo">
        <h1 class="txt-logo">Poll</h1>
    </div>
    <form action="../api/ac_profile.php?ac=admin" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $fet->email; ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="fname">ชื่อ</label>
            <input type="text" name="fname" id="fname" value="<?= $fet->fname; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lname">นามสกุล</label>
            <input type="text" name="lname" id="lname" value="<?= $fet->lname; ?>" class="form-control" required>
        </div>
        <div style="text-align: end; margin-right: 1rem;">
            <a href="index.php?p=change_password" style="text-decoration: none; font-size: medium;">เปลี่ยนรหัสผ่าน</a>
        </div>
        <div class="text-center">
            <button type="submit" class="btn-submit">ดำเนินการ</button>
        </div>
    </form>
</div>