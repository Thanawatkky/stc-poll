
<h2 style="padding: 0 2rem; color: gray; margin-bottom: 1rem;">สร้างคำตอบสำหรับแบบสอบถาม</h2>
<form action="../api/ac_poll.php?ac=add_semi" method="post">
    <div class="form-group">
        <label for="section">เลือกหัวข้อ</label>
        <select name="se_section" id="se_section" class="form-control" required>
            <option value="" selected disabled>เลือกหัวข้อ</option>
            <?php 
                $sql = $conn->query("SELECT * FROM tb_poll");
                while($fet = $sql->fetch_object()) {
                    $sql_choice = $conn->query("SELECT * FROM tb_semi_poll WHERE se_section='".$fet->p_id."' ");
                    $num_choice = $sql_choice->num_rows;
                    if($num_choice <= 0) {

                    
            ?>
            <option value="<?= $fet->p_id; ?>"><?= $fet->p_section; ?></option>
            <?php 
                    }
        } 
        ?> 
        </select>
    </div>
    <div class="form-group">
        <label for="se_header">คำถาม</label>
        <input type="text" name="se_header" id="se_header" placeholder="ป้อนคำถามที่คุณต้องการ..." class="form-control" required>
    </div>
    <div class="form-group">
        <label for="se_description">คำอธิบาย</label>
        <textarea name="se_description" id="se_description" rows="5" cols="72" placeholder="ป้อนคำอธิบายสำหรับคำถาม.."></textarea>
    </div>
    <div class="form-group">
        <label for="choice">เลือกรูปแบบคำตอบ</label>
        <select name="se_choice" id="se_choice" class="form-control" required>
            <option value="" selected disabled>เลือกรูปแบบคำตอบ</option>
            <?php 
                $choices = ["มากที่สุด-น้อยที่สุด", "บ่อยที่สุด-ไม่เคย"];
                foreach ($choices as $choice => $val) {
                    
            ?>
            <option value="<?= $choice+1; ?>"><?= $val; ?></option>
            <?php } ?>
           
        </select>
    </div>
    <div class="text-center" style="text-align: center;">
        <button type="submit" class="btn-submit">ยืนยัน</button>
    </div>
</form>
