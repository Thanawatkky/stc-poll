<div class="poll-chart">
<div class="card">
<?php 
        
        $sql_alluser = $conn->query("SELECT COUNT(user_id) AS user_count FROM tb_user WHERE user_role <> 1 ");
        $fet_alluser = $sql_alluser->fetch_object();
        
        $sql_userInSection = $conn->query("SELECT COUNT(res_user) AS user_section FROM tb_result WHERE res_section = '".$_REQUEST['p_id']."' ");
        $fet_userInSection  = $sql_userInSection->fetch_object();

        $sum_user = ($fet_userInSection->user_section / $fet_alluser->user_count)*100;
        $sql_check = $conn->query("SELECT * FROM tb_result WHERE res_section='".$_REQUEST['p_id']."' ");
    ?>
        <h2 style="margin-left: 1rem;">จำนวนคนที่ตอบแบบสอบถาม</h2>
        <p style="text-align: end; margin-right: 1rem;" id="persent"><?= $sum_user; ?>%</p>
        <div class="border-chart">
            <div class="inline-chart" id="inline-chart"></div>
        </div>
        <p style="text-align: end; margin-right: 1rem;"><?= $fet_userInSection->user_section; ?> จาก <?= $fet_alluser->user_count; ?> คน</p>
    </div>

    <div class="card" style="margin-top: 1rem;">
        <h2 style="margin-left: 1rem;">ช่วงคะแนนแบบสอบถาม</h2>
        <div class="col-5">
            <?php 
           $txt_points = ['one', 'two', 'three', 'four', 'five'];
           $sum_point = 0;
           foreach ($txt_points as $point => $val) {
                $sql_point = $conn->query("SELECT COUNT(res_user) AS user_point FROM tb_result WHERE res_point='".($point+1)."' AND res_section='".$_REQUEST['p_id']."' ");
                $fet_point = $sql_point->fetch_object();

                if($sql_check->num_rows <= 0) {
                    $sum_point = 0;
                }else{
                    $sum_point = ($fet_point->user_point / $fet_userInSection->user_section)*100;
                }
            ?>
            <div class="border-vertical">
                <div class="border-vertical-inline" id="percent-vartical-<?= $val; ?>"><small><p id="txt-<?= $val; ?>"  style="text-align: center; margin-top: 1rem; color: white;"><?= number_format($sum_point,0); ?>%</p></small></div>       
            </div>
            <?php } ?>
        </div>
        <hr>
        <div class="col-5">
            <?php 
                $points = ['1', '2', '3', '4', '5'];
                foreach ($points as $point => $val) {
                    
            ?>
            <p style="text-align: center; margin-top: 1rem;"><?= $val; ?></p>
            <?php } ?>
        </div>
    </div>
</div>
<script>
        let persent = document.getElementById('persent').textContent;
        document.getElementById('inline-chart').style.width = persent;

                const points = ['one', 'two', 'three', 'four', 'five'];
                points.forEach(point => {
                    let point_five = document.getElementById('txt-'+point).textContent;
                    document.getElementById('percent-vartical-'+point).style.height = point_five;
                        
                        
                    });
        
    </script>