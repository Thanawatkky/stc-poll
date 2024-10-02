<div class="content-history">
    <h2 style="margin: 1rem; color: gray;">ประวัติการทำแบบสอบถาม</h2>
<table>
        <thead>
            <tr> 
                <th>#</th>
                <th>หัวข้อ</th>
                <th>รายละเอียด</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = $conn->query("SELECT * FROM tb_result LEFT JOIN tb_poll ON tb_result.res_section = tb_poll.p_id WHERE tb_result.res_user = '".$_SESSION['user_id']."' ");
                $i=0;
                while($fet = $sql->fetch_object()) {
                    $i++;
            ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $fet->p_section; ?></td>
                <td><?= $fet->p_detail; ?></td>
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
</div>