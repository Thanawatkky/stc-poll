<div class="content-dashboard">
    <h2 class="txt-header">แบบสอบถามทั้งหมด</h2>
    <div class="col-4">
        <?php 
        
            $sql = $conn->query("SELECT * FROM tb_poll");
            while($fet = $sql->fetch_object()) {
                $sql_chack = $conn->query("SELECT * FROM tb_result WHERE res_user='".$_SESSION['user_id']."' AND res_section='".$fet->p_id."' ");
                if($sql_chack->num_rows <= 0) {

                
        ?>
        <div class="card">
            <div class="card-header">
                <h3><?= $fet->p_section; ?></h3>
            </div>
            <div class="card-body">
                <p><?= $fet->p_detail; ?></p>
            </div>
            <div class="card-footer">
                <a href="index.php?p=poll_res" class="btn-select">เลือก</a>
            </div>
        </div>
        <?php
                }
     }
      ?>
    </div>
</div>