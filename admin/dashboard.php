<div class="poll-chart">
    <div class="card">
        <?php 
                    $sql_alluser = $conn->query("SELECT COUNT(user_id) AS user_count FROM tb_user WHERE user_role <> 1 ");
                    $fet_alluser = $sql_alluser->fetch_object();
                    
                    $sql_userInSection = $conn->query("SELECT COUNT(res_user) AS user_section FROM tb_result ");
                    $fet_userInSection  = $sql_userInSection->fetch_object();
            
                    $sql_check = $conn->query("SELECT * FROM tb_result ");
                    if($sql_check->num_rows <= 0) {
                        $sum_user = 0;
                    }else{
                        
                    $sum_user = ($fet_userInSection->user_section / $fet_alluser->user_count)*100;
                    }
        ?>
        <h2 style="margin-left: 1rem;">จำนวนคนที่เข้าร่วมทั้งหมด</h2>
        <p style="text-align: end; margin-right: 1rem;" id="persent"><?=  $sum_user; ?>%</p>
        <div class="border-chart">
            <div class="inline-chart" id="inline-chart"></div>
        </div>
        <p style="text-align: end; margin-right: 1rem;"><?= $fet_userInSection->user_section; ?> จาก <?= $fet_alluser->user_count; ?> คน</p>
    </div>
</div>
<?php 
    $sql_user = $conn->query("SELECT * FROM tb_user WHERE user_role <> 1");

    $sql_poll = $conn->query("SELECT * FROM tb_poll");

    $sql_result = $conn->query("SELECT * FROM tb_result");

    $num_report = [$sql_user->num_rows, $sql_poll->num_rows, $sql_result->num_rows];
?>
<div class="col-3">
    <div class="card">
        <div class="card-header">
            <h3>แบบสอบถามทั้งหมด</h3>       
        </div>
        <div class="card-body">
            <p><?= $num_report[1]; ?></p>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>ผู้ใช้งานทั้งหมด</h3>       
        </div>
        <div class="card-body">
            <p><?= $num_report[0]; ?></p>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>จำนวนการตอบแบบสอบถาม</h3>       
        </div>
        <div class="card-body">
            <p><?= $num_report[2]; ?></p>
        </div>
    </div>
</div>
<table>
        <thead>
            <tr> 
                <th>#</th>
                <th>หัวข้อ</th>
                <th>รายละเอียด</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = $conn->query("SELECT * FROM tb_poll");
                $i=0;
                while($fet = $sql->fetch_object()) {
                    $i++;
            ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $fet->p_section; ?></td>
                <td><?= $fet->p_detail; ?></td>
                <td>
                  <a href="index.php?p=result&p_id=<?= $fet->p_id; ?>" class="btn-add">ผลสำรวจ</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php 
        if($sql->num_rows <= 0) {
    ?>
    <div class="text-center" style="text-align: center;">
        <h2 style="color: gray; margin: 1rem;">Not Found!</h2>
    </div>
    <?php } ?>
    <script>
        let persent = document.getElementById('persent').textContent;
        document.getElementById('inline-chart').style.width = persent;
    </script>