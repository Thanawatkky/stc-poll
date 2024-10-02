<?php 
    if(isset($_REQUEST['p_id'])) {
        $sql = $conn->query("SELECT * FROM tb_poll WHERE p_id='".$_REQUEST['p_id']."' ");
        $fet = $sql->fetch_object();
?>
<h2 style="padding: 0 2rem; color: gray; margin-bottom: 1rem;">แก้ไขแบบสอบถาม</h2>
<form action="../api/ac_poll.php?ac=edit" method="post">
    <input type="hidden" name="p_id" value="<?= $fet->p_id; ?>" id="p_id">
    <div class="form-group">
        <label for="section">หัวข้อ</label>
        <input type="text" name="p_section" class="form-confrol" id="p_section" placeholder="กรอกหัวข้อแบบสอบถาม..." value="<?= $fet->p_section; ?>" required>
    </div>
    <div class="form-group">
        <label for="detail">รายละเอียด</label>
        <textarea name="p_detail" id="p_detail" rows="5" cols="72" placeholder="กรอกรายละเอียดแบบสอบถาม..."><?= $fet->p_detail; ?></textarea>
    </div>
    <div class="text-center" style="text-align: center;">
        <button type="submit" class="btn-submit">ยืนยัน</button>
    </div>
</form>
<?php 
    }else{
?>
<h2 style="padding: 0 2rem; color: gray; margin-bottom: 1rem;">เพิ่มแบบสอบถาม</h2>
<form action="../api/ac_poll.php?ac=add" method="post">
    <div class="form-group">
        <label for="section">หัวข้อ</label>
        <input type="text" name="p_section"  id="p_section" placeholder="กรอกหัวข้อแบบสอบถาม..."  class="form-confrol" required>
    </div>
    <div class="form-group">
        <label for="detail">รายละเอียด</label>
        <textarea name="p_detail" id="p_detail" rows="5" cols="72" placeholder="กรอกรายละเอียดแบบสอบถาม..."></textarea>
    </div>
    <div class="text-center" style="text-align: center;">
        <button type="submit" class="btn-submit">ยืนยัน</button>
    </div>
</form>
<?php } ?>