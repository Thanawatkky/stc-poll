
<div class="content-profile">
    <div class="logo">
        <h1 class="txt-logo">Poll</h1>
    </div>
    <form action="api/ac_change_password.php?ac=user" method="post">
        <div class="form-group">
            <label for="current_password">รหัสผ่านปัจจุบัน</label>
            <input type="password" name="current_password" id="current_password" placeholder="กรอกรหัสผ่านปัจจุบัน..."  class="form-control" required>
        </div>
        <div class="form-group">
            <label for="new_pass">รหัสผ่านใหม่</label>
            <input type="password" name="new_pass" id="new_pass"  class="form-control" placeholder="กรอกรหัสผ่านใหม่..." required>
        </div>
        <div class="form-group">
            <label for="confirm_pass">ยืนยันรหัสผ่าน</label>
            <input type="password" name="confirm_pass" id="confirm_pass" class="form-control" placeholder="ยืนยันรหัสผ่าน..." required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn-submit">ดำเนินการ</button>
        </div>
    </form>
</div>