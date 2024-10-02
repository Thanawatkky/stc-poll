<div class="content-poll">
    <?php 
        $sql = $conn->query("SELECT * FROM tb_semi_poll");
        while($fet = $sql->fetch_object()) {
    ?>
    <div class="card">
        <div class="card-header">
            <h1><?= $fet->se_header; ?></h1>
        </div>
        <div class="card-body">
            <small><?= $fet->se_description; ?></small>
        </div>
        <div class="card-footer">
                <form action="api/ac_poll.php?ac=result" method="post">
                    <input type="hidden" name="res_section" value="<?= $fet->se_section; ?>">
                    <?php 
                    $choices = [];
                        if($fet->se_choice == 1) {
                            $choices = ["น้อยที่สุด", "น้อย", "ปานกลาง", "มาก", "มากที่สุด"];
                        }else if($fet->se_choice == 2) {
                            $choices = ["ไม่เคย", "แทบไม่เคย", "นานๆครั้ง", "บ่อยครั้ง", "บ่อยที่สุด"];
                        }
                        
                        foreach ($choices as $choice => $val) {
                    ?>
                    <div class="form-group">
                        <input type="radio" name="choice" id="choice" value="<?= $choice+1; ?>" class="form-control">
                        <label for="five"><?=  $val; ?></label>
                    </div>
                    <?php } ?>
                    <div style="text-align: center;">
                        <button class="btn-submit">ส่ง</button>
                    </div>
                </form>
        </div>
    </div>
    <?php } ?>
</div>