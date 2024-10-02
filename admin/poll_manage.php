    <h1 style="color: gray; margin: 2rem; text-align: start;">จัดการแบบสอบถาม</h1>
    <div class="text-end" style="text-align: end; margin: 1rem;">
        <a href="index.php?p=add_poll" class="btn-add">เพิ่ม</a>
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
                    <a href="index.php?p=add_poll&p_id=<?= $fet->p_id; ?>" class="btn-edit">Edit</a>
                    <a href="../api/ac_poll.php?ac=del&p_id=<?= $fet->p_id;  ?>" onclick="return confirm('ต้องการลบแบบสอบถามรายการนี้หรือไม่ ?');" class="btn-del">Del</a>
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